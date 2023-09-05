<?php

namespace PostSMTPMailTester\Vendor;

// Don't redefine the functions if included multiple times.
if (!\function_exists('PostSMTPMailTester\\Vendor\\GuzzleHttp\\uri_template')) {
    require __DIR__ . '/functions.php';
}
