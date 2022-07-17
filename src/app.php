<?php

namespace Src;

use Src\Console\Application;

$config = require_once __DIR__ . '/config/main.php';
$app    = new Application($config);

return $app();