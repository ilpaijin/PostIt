<?php

require __DIR__."/../vendor/autoload.php";
require_once __DIR__.'/../vendor/twig/twig/lib/Twig/Autoloader.php';

$routes = require __DIR__.'/routes.php';

use PostIt\Application\Session;
use PostIt\Application\Container;

date_default_timezone_set('Europe/Amsterdam');

Session::start();

$app = new PostIt\Application\Application(new PostIt\Application\Container(), $routes);

require __DIR__.'/services.php';

return $app;
