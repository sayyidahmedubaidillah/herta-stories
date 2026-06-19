<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

define('LARAVEL_START', microtime(true));

require __DIR__ . '/../vendor/autoload.php';

echo "Autoload OK<br>";

$app = require __DIR__ . '/../bootstrap/app.php';

echo "App OK<br>";