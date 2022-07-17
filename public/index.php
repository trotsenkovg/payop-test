<?php

/*
|--------------------------------------------------------------------------
| Register The Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so that we do not have to worry about the
| loading of any our classes "manually". Feels great to relax.
|
*/
require_once __DIR__ . '/../vendor/autoload.php';
$config = require_once __DIR__ . '/../src/config/main.php';

if (!in_array($_SERVER['REMOTE_ADDR'], $config['trusted_proxy'])) {
    exit('Unsecure IP');
}

//TODO IPN Service
