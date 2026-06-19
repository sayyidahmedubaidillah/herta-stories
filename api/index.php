<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

define('LARAVEL_START', microtime(true));

require __DIR__ . '/../vendor/autoload.php';

$app = require __DIR__ . '/../bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$request = Illuminate\Http\Request::capture();

try {
    $response = $kernel->handle($request);
    echo "Response OK<br>";
    $response->send();
} catch (\Throwable $e) {
    echo "Error: " . $e->getMessage() . "<br>";
    echo "File: " . $e->getFile() . "<br>";
    echo "Line: " . $e->getLine() . "<br>";
    echo "Previous: " . ($e->getPrevious() ? $e->getPrevious()->getMessage() : 'none') . "<br>";
    echo "Previous file: " . ($e->getPrevious() ? $e->getPrevious()->getFile() : 'none') . "<br>";
    echo "Previous line: " . ($e->getPrevious() ? $e->getPrevious()->getLine() : 'none') . "<br>";
}