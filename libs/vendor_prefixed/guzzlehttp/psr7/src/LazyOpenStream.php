<?php

namespace PostSMTPMailTester\Vendor\GuzzleHttp\Psr7;

use PostSMTPMailTester\Vendor\Psr\Http\Message\StreamInterface;
/**
 * Lazily reads or writes to a file that is opened only after an IO operation
 * take place on the stream.
 *
 * @final
 */
class LazyOpenStream implements \PostSMTPMailTester\Vendor\Psr\Http\Message\StreamInterface
{
    use StreamDecoratorTrait;
    /** @var string File to open */
    private $filename;
    /** @var string */
    private $mode;
    /**
     * @param string $filename File to lazily open
     * @param string $mode     fopen mode to use when opening the stream
     */
    public function __construct($filename, $mode)
    {
        $this->filename = $filename;
        $this->mode = $mode;
    }
    /**
     * Creates the underlying stream lazily when required.
     *
     * @return StreamInterface
     */
    protected function createStream()
    {
        return \PostSMTPMailTester\Vendor\GuzzleHttp\Psr7\Utils::streamFor(\PostSMTPMailTester\Vendor\GuzzleHttp\Psr7\Utils::tryFopen($this->filename, $this->mode));
    }
}