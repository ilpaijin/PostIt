<?php

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;


$routes = new RouteCollection();

$routes->add('home', new Route('/', array(
    '_controller' => array('PostIt\Application\Controllers\IndexController', 'welcomeAction'),
    // array(), array(), '', array(), array('GET')
)));

$routes->add('p', new Route('/p/{page}', array(
    '_controller' => array('PostIt\Application\Controllers\IndexController', 'welcomeAction'),
    // array(), array(), '', array(), array('GET')
)));

$routes->add('login', new Route('/login', array(
    '_controller' => array('PostIt\Application\Controllers\LoginController', 'loginAction'),
    // array(), array(), '', array(), array('POST')
)));

$routes->add('logout', new Route('/logout', array(
    '_controller' => array('PostIt\Application\Controllers\LoginController', 'logoutAction'),
    // array(), array(), '', array(), array('POST')
)));

$routes->add('posts', new Route('/posts', array(
    '_controller' => array('PostIt\Application\Controllers\PostController', 'createPostAction'),
    // array(), array(), '', array(), array('POST')
)));

$routes->add('files', new Route('/files', array(
    '_controller' => array('PostIt\Application\Controllers\FileController', 'createImageAction'),
    // array(), array(), '', array(), array('POST')
)));

$routes->add('admin_section', new Route('/admin/{page}', array(
    '_controller' => array('PostIt\Application\Controllers\AdminController', 'sectionAction')
    // array(), array(), '', array(), array('GET')
), array(
    'page' => '\w+',
)));

$routes->add('admin', new Route('/admin', array(
    '_controller' => array('PostIt\Application\Controllers\AdminController', 'welcomeAction')
    // array(), array(), '', array(), array('GET')
)));

return $routes;
