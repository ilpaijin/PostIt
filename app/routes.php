<?php

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;


$routes = new RouteCollection();

$routes->add('/', new Route('/', array(
    '_controller' => array('PostIt\Controllers\IndexController', 'welcomeAction')
)));

return $routes;
