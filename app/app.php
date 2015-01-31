<?php

require __DIR__."/../vendor/autoload.php";

$app = new PostIt\Application;

date_default_timezone_set('Europe/Amsterdam');

$env = getenv('ENV') ? getenv('ENV') : 'production';

$app->setValue('debug', 'true');
$app->setValue('env', $env);
$app->setValue('template_path', __DIR__.'/../src/PostIt/views');

$app->setService('config', new PostIt\Config(__DIR__."/../config/".$env.".json"));

$db = \Doctrine\DBAL\DriverManager::getConnection(
    $app->getService('config')->get('db'),
    new \Doctrine\DBAL\Configuration()
);

$app->setService('db', $db);

return $app;
