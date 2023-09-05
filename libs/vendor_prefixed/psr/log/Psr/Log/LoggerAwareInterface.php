<?php

namespace PostSMTPMailTester\Vendor\Psr\Log;

/**
 * Describes a logger-aware instance.
 */
interface LoggerAwareInterface
{
    /**
     * Sets a logger instance on the object.
     *
     * @param LoggerInterface $logger
     *
     * @return void
     */
    public function setLogger(\PostSMTPMailTester\Vendor\Psr\Log\LoggerInterface $logger);
}
