<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use PostIt\Application\Environment;

$app->containerSet('debug', Environment::isDevelopment() ? true : false);

if ('cli' !== php_sapi_name()) {
    ini_set('display_errors', 0);
    ExceptionHandler::register($app->containerGet('debug'));
} elseif (!ini_get('log_errors') || ini_get('error_log')) {
    ini_set('display_errors', 1);
}

ErrorHandler::register();

session_start();
