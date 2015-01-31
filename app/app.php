<?php

require __DIR__."/../vendor/autoload.php";
require_once __DIR__.'/../vendor/twig/twig/lib/Twig/Autoloader.php';

use PostIt\Application\Container;
use PostIt\Application\Environment;
use PostIt\Application\Config;

$routes = require __DIR__.'/routes.php';

$app = new PostIt\Application\Application(new PostIt\Application\Container(), $routes);

require __DIR__.'/global.php';

$env = Environment::detect();

$app->containerSet('env', $env);
$app->containerSet('template_path', __DIR__.'/views');
$app->containerSet('config', new Config(__DIR__."/../config/".$env.".json"));

/*
|--------------------------------------------------------------------------
| Doctrine DBAL Service
|--------------------------------------------------------------------------
|
*/
$db = \Doctrine\DBAL\DriverManager::getConnection(
    $app->containerGet('config')->get('db'),
    new \Doctrine\DBAL\Configuration()
);
$app->containerSet('db', $db);

/*
|--------------------------------------------------------------------------
| Twig Service
|--------------------------------------------------------------------------
|
*/
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem($app->containerGet('template_path'));
$twig = new Twig_Environment($loader, array(
    'cache' => __DIR__.'/views/cache',
    'debug' => $app->containerGet('env')
));
$app->containerSet('twig', $twig);

return $app;
