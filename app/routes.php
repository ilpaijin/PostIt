<?php

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;


$routes = new RouteCollection();

$routes->add('/', new Route('/', array(
    '_controller' => array('PostIt\Application\Controllers\IndexController', 'welcomeAction')
)));

$routes->add('/login', new Route('login', array(
    '_controller' => array('PostIt\Application\Controllers\LoginController', 'loginAction'),
    // array(), array(), '', array(), array('POST')
)));

$routes->add('/posts', new Route('posts', array(
    '_controller' => array('PostIt\Application\Controllers\PostController', 'createPostAction'),
    // array(), array(), '', array(), array('POST')
)));

$routes->add('/files', new Route('files', array(
    '_controller' => array('PostIt\Application\Controllers\FileController', 'createImageAction'),
    // array(), array(), '', array(), array('POST')
)));

return $routes;
