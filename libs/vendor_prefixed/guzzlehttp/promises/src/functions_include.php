<?php

namespace PostSMTPMailTester\Vendor;

// Don't redefine the functions if included multiple times.
if (!\function_exists('PostSMTPMailTester\\Vendor\\GuzzleHttp\\Promise\\promise_for')) {
    require __DIR__ . '/functions.php';
}
