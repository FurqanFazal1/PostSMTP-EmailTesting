<?php

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PostSMTPMailTester\Vendor\Monolog\Handler;

use PostSMTPMailTester\Vendor\Monolog\Formatter\NormalizerFormatter;
use PostSMTPMailTester\Vendor\Monolog\Logger;
/**
 * Handler sending logs to Zend Monitor
 *
 * @author  Christian Bergau <cbergau86@gmail.com>
 * @author  Jason Davis <happydude@jasondavis.net>
 */
class ZendMonitorHandler extends \PostSMTPMailTester\Vendor\Monolog\Handler\AbstractProcessingHandler
{
    /**
     * Monolog level / ZendMonitor Custom Event priority map
     *
     * @var array
     */
    protected $levelMap = array();
    /**
     * Construct
     *
     * @param  int                       $level
     * @param  bool                      $bubble
     * @throws MissingExtensionException
     */
    public function __construct($level = \PostSMTPMailTester\Vendor\Monolog\Logger::DEBUG, $bubble = \true)
    {
        if (!\function_exists('PostSMTPMailTester\\Vendor\\zend_monitor_custom_event')) {
            throw new \PostSMTPMailTester\Vendor\Monolog\Handler\MissingExtensionException('You must have Zend Server installed with Zend Monitor enabled in order to use this handler');
        }
        //zend monitor constants are not defined if zend monitor is not enabled.
        $this->levelMap = array(\PostSMTPMailTester\Vendor\Monolog\Logger::DEBUG => \PostSMTPMailTester\Vendor\ZEND_MONITOR_EVENT_SEVERITY_INFO, \PostSMTPMailTester\Vendor\Monolog\Logger::INFO => \PostSMTPMailTester\Vendor\ZEND_MONITOR_EVENT_SEVERITY_INFO, \PostSMTPMailTester\Vendor\Monolog\Logger::NOTICE => \PostSMTPMailTester\Vendor\ZEND_MONITOR_EVENT_SEVERITY_INFO, \PostSMTPMailTester\Vendor\Monolog\Logger::WARNING => \PostSMTPMailTester\Vendor\ZEND_MONITOR_EVENT_SEVERITY_WARNING, \PostSMTPMailTester\Vendor\Monolog\Logger::ERROR => \PostSMTPMailTester\Vendor\ZEND_MONITOR_EVENT_SEVERITY_ERROR, \PostSMTPMailTester\Vendor\Monolog\Logger::CRITICAL => \PostSMTPMailTester\Vendor\ZEND_MONITOR_EVENT_SEVERITY_ERROR, \PostSMTPMailTester\Vendor\Monolog\Logger::ALERT => \PostSMTPMailTester\Vendor\ZEND_MONITOR_EVENT_SEVERITY_ERROR, \PostSMTPMailTester\Vendor\Monolog\Logger::EMERGENCY => \PostSMTPMailTester\Vendor\ZEND_MONITOR_EVENT_SEVERITY_ERROR);
        parent::__construct($level, $bubble);
    }
    /**
     * {@inheritdoc}
     */
    protected function write(array $record)
    {
        $this->writeZendMonitorCustomEvent(\PostSMTPMailTester\Vendor\Monolog\Logger::getLevelName($record['level']), $record['message'], $record['formatted'], $this->levelMap[$record['level']]);
    }
    /**
     * Write to Zend Monitor Events
     * @param string $type Text displayed in "Class Name (custom)" field
     * @param string $message Text displayed in "Error String"
     * @param mixed $formatted Displayed in Custom Variables tab
     * @param int $severity Set the event severity level (-1,0,1)
     */
    protected function writeZendMonitorCustomEvent($type, $message, $formatted, $severity)
    {
        zend_monitor_custom_event($type, $message, $formatted, $severity);
    }
    /**
     * {@inheritdoc}
     */
    public function getDefaultFormatter()
    {
        return new \PostSMTPMailTester\Vendor\Monolog\Formatter\NormalizerFormatter();
    }
    /**
     * Get the level map
     *
     * @return array
     */
    public function getLevelMap()
    {
        return $this->levelMap;
    }
}
