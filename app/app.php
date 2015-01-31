<?php

require __DIR__."/../vendor/autoload.php";

use PostIt\Container;

$app = new PostIt\Application(new PostIt\Container());

require __DIR__.'/global.php';

$env = getenv('ENV') ? getenv('ENV') : 'production';

$app->containerSet('env', $env);
$app->containerSet('template_path', __DIR__.'/../src/PostIt/views');
$app->containerSet('config', new PostIt\Config(__DIR__."/../config/".$env.".json"));

$db = \Doctrine\DBAL\DriverManager::getConnection(
    $app->containerGet('config')->get('db'),
    new \Doctrine\DBAL\Configuration()
);

$app->containerSet('db', $db);

return $app;
