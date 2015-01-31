<?php

require __DIR__."/../vendor/autoload.php";

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;

date_default_timezone_set('Europe/Amsterdam');

$env = getenv('ENV') ? getenv('ENV') : 'production';

$app = new PostIt\Application;

$app->setValue('debug', $env === 'development' ? true : false);

if ('cli' !== php_sapi_name()) {
    ini_set('display_errors', 0);
    ExceptionHandler::register($app->getValue('debug'));
} elseif (!ini_get('log_errors') || ini_get('error_log')) {
    ini_set('display_errors', 1);
}

ErrorHandler::register();

$app->setValue('env', env);
$app->setValue('template_path', __DIR__.'/../src/PostIt/views');

$app->setService('config', new PostIt\Config(__DIR__."/../config/".$env.".json"));

$db = \Doctrine\DBAL\DriverManager::getConnection(
    $app->getService('config')->get('db'),
    new \Doctrine\DBAL\Configuration()
);

$app->setService('db', $db);

return $app;
