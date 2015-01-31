<?php

// error_reporting(-1);

require '../vendor/autoload.php';

$app = require '../app/app.php';

//cli-server = built-in server php5.4, otherwise cli
$filename = __DIR__.preg_replace('#(\?.*)$#', '', $_SERVER['REQUEST_URI']);
if (php_sapi_name() === 'cli-server' && is_file($filename)) {
    return false;
}

$app->run();
