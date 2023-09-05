<?php

/**
 * PKCS#8 Formatted DH Key Handler
 *
 * PHP version 5
 *
 * Processes keys with the following headers:
 *
 * -----BEGIN ENCRYPTED PRIVATE KEY-----
 * -----BEGIN PRIVATE KEY-----
 * -----BEGIN PUBLIC KEY-----
 *
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2015 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://phpseclib.sourceforge.net
 */
namespace PostSMTPMailTester\Vendor\phpseclib3\Crypt\DH\Formats\Keys;

use PostSMTPMailTester\Vendor\phpseclib3\Common\Functions\Strings;
use PostSMTPMailTester\Vendor\phpseclib3\Crypt\Common\Formats\Keys\PKCS8 as Progenitor;
use PostSMTPMailTester\Vendor\phpseclib3\File\ASN1;
use PostSMTPMailTester\Vendor\phpseclib3\File\ASN1\Maps;
use PostSMTPMailTester\Vendor\phpseclib3\Math\BigInteger;
/**
 * PKCS#8 Formatted DH Key Handler
 *
 * @author  Jim Wigginton <terrafrost@php.net>
 */
abstract class PKCS8 extends \PostSMTPMailTester\Vendor\phpseclib3\Crypt\Common\Formats\Keys\PKCS8
{
    /**
     * OID Name
     *
     * @var string
     */
    const OID_NAME = 'dhKeyAgreement';
    /**
     * OID Value
     *
     * @var string
     */
    const OID_VALUE = '1.2.840.113549.1.3.1';
    /**
     * Child OIDs loaded
     *
     * @var bool
     */
    protected static $childOIDsLoaded = \false;
    /**
     * Break a public or private key down into its constituent components
     *
     * @param string $key
     * @param string $password optional
     * @return array
     */
    public static function load($key, $password = '')
    {
        if (!\PostSMTPMailTester\Vendor\phpseclib3\Common\Functions\Strings::is_stringable($key)) {
            throw new \UnexpectedValueException('Key should be a string - not a ' . \gettype($key));
        }
        $isPublic = \strpos($key, 'PUBLIC') !== \false;
        $key = parent::load($key, $password);
        $type = isset($key['privateKey']) ? 'privateKey' : 'publicKey';
        switch (\true) {
            case !$isPublic && $type == 'publicKey':
                throw new \UnexpectedValueException('Human readable string claims non-public key but DER encoded string claims public key');
            case $isPublic && $type == 'privateKey':
                throw new \UnexpectedValueException('Human readable string claims public key but DER encoded string claims private key');
        }
        $decoded = \PostSMTPMailTester\Vendor\phpseclib3\File\ASN1::decodeBER($key[$type . 'Algorithm']['parameters']->element);
        if (empty($decoded)) {
            throw new \RuntimeException('Unable to decode BER of parameters');
        }
        $components = \PostSMTPMailTester\Vendor\phpseclib3\File\ASN1::asn1map($decoded[0], \PostSMTPMailTester\Vendor\phpseclib3\File\ASN1\Maps\DHParameter::MAP);
        if (!\is_array($components)) {
            throw new \RuntimeException('Unable to perform ASN1 mapping on parameters');
        }
        $decoded = \PostSMTPMailTester\Vendor\phpseclib3\File\ASN1::decodeBER($key[$type]);
        switch (\true) {
            case !isset($decoded):
            case !isset($decoded[0]['content']):
            case !$decoded[0]['content'] instanceof \PostSMTPMailTester\Vendor\phpseclib3\Math\BigInteger:
                throw new \RuntimeException('Unable to decode BER of parameters');
        }
        $components[$type] = $decoded[0]['content'];
        return $components;
    }
    /**
     * Convert a private key to the appropriate format.
     *
     * @param \phpseclib3\Math\BigInteger $prime
     * @param \phpseclib3\Math\BigInteger $base
     * @param \phpseclib3\Math\BigInteger $privateKey
     * @param \phpseclib3\Math\BigInteger $publicKey
     * @param string $password optional
     * @param array $options optional
     * @return string
     */
    public static function savePrivateKey(\PostSMTPMailTester\Vendor\phpseclib3\Math\BigInteger $prime, \PostSMTPMailTester\Vendor\phpseclib3\Math\BigInteger $base, \PostSMTPMailTester\Vendor\phpseclib3\Math\BigInteger $privateKey, \PostSMTPMailTester\Vendor\phpseclib3\Math\BigInteger $publicKey, $password = '', array $options = [])
    {
        $params = ['prime' => $prime, 'base' => $base];
        $params = \PostSMTPMailTester\Vendor\phpseclib3\File\ASN1::encodeDER($params, \PostSMTPMailTester\Vendor\phpseclib3\File\ASN1\Maps\DHParameter::MAP);
        $params = new \PostSMTPMailTester\Vendor\phpseclib3\File\ASN1\Element($params);
        $key = \PostSMTPMailTester\Vendor\phpseclib3\File\ASN1::encodeDER($privateKey, ['type' => \PostSMTPMailTester\Vendor\phpseclib3\File\ASN1::TYPE_INTEGER]);
        return self::wrapPrivateKey($key, [], $params, $password, null, '', $options);
    }
    /**
     * Convert a public key to the appropriate format
     *
     * @param \phpseclib3\Math\BigInteger $prime
     * @param \phpseclib3\Math\BigInteger $base
     * @param \phpseclib3\Math\BigInteger $publicKey
     * @param array $options optional
     * @return string
     */
    public static function savePublicKey(\PostSMTPMailTester\Vendor\phpseclib3\Math\BigInteger $prime, \PostSMTPMailTester\Vendor\phpseclib3\Math\BigInteger $base, \PostSMTPMailTester\Vendor\phpseclib3\Math\BigInteger $publicKey, array $options = [])
    {
        $params = ['prime' => $prime, 'base' => $base];
        $params = \PostSMTPMailTester\Vendor\phpseclib3\File\ASN1::encodeDER($params, \PostSMTPMailTester\Vendor\phpseclib3\File\ASN1\Maps\DHParameter::MAP);
        $params = new \PostSMTPMailTester\Vendor\phpseclib3\File\ASN1\Element($params);
        $key = \PostSMTPMailTester\Vendor\phpseclib3\File\ASN1::encodeDER($publicKey, ['type' => \PostSMTPMailTester\Vendor\phpseclib3\File\ASN1::TYPE_INTEGER]);
        return self::wrapPublicKey($key, $params);
    }
}
