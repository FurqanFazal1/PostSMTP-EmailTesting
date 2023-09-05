<?php

namespace PostSMTPMailTester\Vendor;

// Don't redefine the functions if included multiple times.
if (!\function_exists('PostSMTPMailTester\\Vendor\\GuzzleHttp\\Psr7\\str')) {
    require __DIR__ . '/functions.php';
}
