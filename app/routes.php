<?php

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;


$routes = new RouteCollection();

$routes->add('hello', new Route('/hello', array(
    '_controller' => array(new PostIt\Controllers\IndexController, 'showAction')
)));

return $routes;
