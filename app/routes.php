<?php

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;


$routes = new RouteCollection();

$routes->add('/', new Route('/', array(
    '_controller' => array('PostIt\Application\Controllers\IndexController', 'newsFeedAction')
)));

$routes->add('/login', new Route('login', array(
    '_controller' => array('PostIt\Application\Controllers\LoginController', 'loginAction'),
    // array(), array(), '', array(), array('POST')
)));

return $routes;
