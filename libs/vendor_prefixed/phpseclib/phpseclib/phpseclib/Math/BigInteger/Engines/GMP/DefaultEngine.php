<?php

/**
 * GMP Modular Exponentiation Engine
 *
 * PHP version 5 and 7
 *
 * @author    Jim Wigginton <terrafrost@php.net>
 * @copyright 2017 Jim Wigginton
 * @license   http://www.opensource.org/licenses/mit-license.html  MIT License
 * @link      http://pear.php.net/package/Math_BigInteger
 */
namespace PostSMTPMailTester\Vendor\phpseclib3\Math\BigInteger\Engines\GMP;

use PostSMTPMailTester\Vendor\phpseclib3\Math\BigInteger\Engines\GMP;
/**
 * GMP Modular Exponentiation Engine
 *
 * @author  Jim Wigginton <terrafrost@php.net>
 */
abstract class DefaultEngine extends \PostSMTPMailTester\Vendor\phpseclib3\Math\BigInteger\Engines\GMP
{
    /**
     * Performs modular exponentiation.
     *
     * @param GMP $x
     * @param GMP $e
     * @param GMP $n
     * @return GMP
     */
    protected static function powModHelper(\PostSMTPMailTester\Vendor\phpseclib3\Math\BigInteger\Engines\GMP $x, \PostSMTPMailTester\Vendor\phpseclib3\Math\BigInteger\Engines\GMP $e, \PostSMTPMailTester\Vendor\phpseclib3\Math\BigInteger\Engines\GMP $n)
    {
        $temp = new \PostSMTPMailTester\Vendor\phpseclib3\Math\BigInteger\Engines\GMP();
        $temp->value = \gmp_powm($x->value, $e->value, $n->value);
        return $x->normalize($temp);
    }
}
