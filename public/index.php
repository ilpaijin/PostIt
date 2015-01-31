<?php

require '../vendor/autoload.php';

$app = require '../app/app.php';

var_dump($app->getService('db'));

$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

$app->run();
