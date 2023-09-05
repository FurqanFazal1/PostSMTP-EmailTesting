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

use PostSMTPMailTester\Vendor\Monolog\Logger;
use PostSMTPMailTester\Vendor\Monolog\Formatter\NormalizerFormatter;
use PostSMTPMailTester\Vendor\Doctrine\CouchDB\CouchDBClient;
/**
 * CouchDB handler for Doctrine CouchDB ODM
 *
 * @author Markus Bachmann <markus.bachmann@bachi.biz>
 */
class DoctrineCouchDBHandler extends \PostSMTPMailTester\Vendor\Monolog\Handler\AbstractProcessingHandler
{
    private $client;
    public function __construct(\PostSMTPMailTester\Vendor\Doctrine\CouchDB\CouchDBClient $client, $level = \PostSMTPMailTester\Vendor\Monolog\Logger::DEBUG, $bubble = \true)
    {
        $this->client = $client;
        parent::__construct($level, $bubble);
    }
    /**
     * {@inheritDoc}
     */
    protected function write(array $record)
    {
        $this->client->postDocument($record['formatted']);
    }
    protected function getDefaultFormatter()
    {
        return new \PostSMTPMailTester\Vendor\Monolog\Formatter\NormalizerFormatter();
    }
}
