<?php

namespace PostSMTPMailTester\Vendor;

if (\class_exists('PostSMTPMailTester\\Vendor\\Google_Client', \false)) {
    // Prevent error with preloading in PHP 7.4
    // @see https://github.com/googleapis/google-api-php-client/issues/1976
    return;
}
$classMap = ['PostSMTPMailTester\\Vendor\\Google\\Client' => 'Google_Client', 'PostSMTPMailTester\\Vendor\\Google\\Service' => 'Google_Service', 'PostSMTPMailTester\\Vendor\\Google\\AccessToken\\Revoke' => 'Google_AccessToken_Revoke', 'PostSMTPMailTester\\Vendor\\Google\\AccessToken\\Verify' => 'Google_AccessToken_Verify', 'PostSMTPMailTester\\Vendor\\Google\\Model' => 'Google_Model', 'PostSMTPMailTester\\Vendor\\Google\\Utils\\UriTemplate' => 'Google_Utils_UriTemplate', 'PostSMTPMailTester\\Vendor\\Google\\AuthHandler\\Guzzle6AuthHandler' => 'Google_AuthHandler_Guzzle6AuthHandler', 'PostSMTPMailTester\\Vendor\\Google\\AuthHandler\\Guzzle7AuthHandler' => 'Google_AuthHandler_Guzzle7AuthHandler', 'PostSMTPMailTester\\Vendor\\Google\\AuthHandler\\Guzzle5AuthHandler' => 'Google_AuthHandler_Guzzle5AuthHandler', 'PostSMTPMailTester\\Vendor\\Google\\AuthHandler\\AuthHandlerFactory' => 'Google_AuthHandler_AuthHandlerFactory', 'PostSMTPMailTester\\Vendor\\Google\\Http\\Batch' => 'Google_Http_Batch', 'PostSMTPMailTester\\Vendor\\Google\\Http\\MediaFileUpload' => 'Google_Http_MediaFileUpload', 'PostSMTPMailTester\\Vendor\\Google\\Http\\REST' => 'Google_Http_REST', 'PostSMTPMailTester\\Vendor\\Google\\Task\\Retryable' => 'Google_Task_Retryable', 'PostSMTPMailTester\\Vendor\\Google\\Task\\Exception' => 'Google_Task_Exception', 'PostSMTPMailTester\\Vendor\\Google\\Task\\Runner' => 'Google_Task_Runner', 'PostSMTPMailTester\\Vendor\\Google\\Collection' => 'Google_Collection', 'PostSMTPMailTester\\Vendor\\Google\\Service\\Exception' => 'Google_Service_Exception', 'PostSMTPMailTester\\Vendor\\Google\\Service\\Resource' => 'Google_Service_Resource', 'PostSMTPMailTester\\Vendor\\Google\\Exception' => 'Google_Exception'];
foreach ($classMap as $class => $alias) {
    \class_alias($class, 'PostSMTPMailTester\\Vendor\\' . $alias);
}
/**
 * This class needs to be defined explicitly as scripts must be recognized by
 * the autoloader.
 */
class Google_Task_Composer extends \PostSMTPMailTester\Vendor\Google\Task\Composer
{
}
if (\false) {
    class Google_AccessToken_Revoke extends \PostSMTPMailTester\Vendor\Google\AccessToken\Revoke
    {
    }
    class Google_AccessToken_Verify extends \PostSMTPMailTester\Vendor\Google\AccessToken\Verify
    {
    }
    class Google_AuthHandler_AuthHandlerFactory extends \PostSMTPMailTester\Vendor\Google\AuthHandler\AuthHandlerFactory
    {
    }
    class Google_AuthHandler_Guzzle5AuthHandler extends \PostSMTPMailTester\Vendor\Google\AuthHandler\Guzzle5AuthHandler
    {
    }
    class Google_AuthHandler_Guzzle6AuthHandler extends \PostSMTPMailTester\Vendor\Google\AuthHandler\Guzzle6AuthHandler
    {
    }
    class Google_AuthHandler_Guzzle7AuthHandler extends \PostSMTPMailTester\Vendor\Google\AuthHandler\Guzzle7AuthHandler
    {
    }
    class Google_Client extends \PostSMTPMailTester\Vendor\Google\Client
    {
    }
    class Google_Collection extends \PostSMTPMailTester\Vendor\Google\Collection
    {
    }
    class Google_Exception extends \PostSMTPMailTester\Vendor\Google\Exception
    {
    }
    class Google_Http_Batch extends \PostSMTPMailTester\Vendor\Google\Http\Batch
    {
    }
    class Google_Http_MediaFileUpload extends \PostSMTPMailTester\Vendor\Google\Http\MediaFileUpload
    {
    }
    class Google_Http_REST extends \PostSMTPMailTester\Vendor\Google\Http\REST
    {
    }
    class Google_Model extends \PostSMTPMailTester\Vendor\Google\Model
    {
    }
    class Google_Service extends \PostSMTPMailTester\Vendor\Google\Service
    {
    }
    class Google_Service_Exception extends \PostSMTPMailTester\Vendor\Google\Service\Exception
    {
    }
    class Google_Service_Resource extends \PostSMTPMailTester\Vendor\Google\Service\Resource
    {
    }
    class Google_Task_Exception extends \PostSMTPMailTester\Vendor\Google\Task\Exception
    {
    }
    interface Google_Task_Retryable extends \PostSMTPMailTester\Vendor\Google\Task\Retryable
    {
    }
    class Google_Task_Runner extends \PostSMTPMailTester\Vendor\Google\Task\Runner
    {
    }
    class Google_Utils_UriTemplate extends \PostSMTPMailTester\Vendor\Google\Utils\UriTemplate
    {
    }
}
