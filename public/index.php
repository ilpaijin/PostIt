<?php

use Symfony\Component\HttpFoundation\Request;

// error_reporting(-1);
date_default_timezone_set('Europe/Amsterdam');

require '../vendor/autoload.php';

$app = require '../app/app.php';

//cli-server = built-in server php5.4, otherwise cli
$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

$request = Request::createFromGlobals();

$response = $app->handle($request);

$response->send();
