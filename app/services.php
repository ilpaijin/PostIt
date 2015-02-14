<?php

use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use PostIt\Application\Environment;
use PostIt\Application\Config;
use PostIt\Application\Session;
use PostIt\Repositories\UserRepository;
use PostIt\Entities\User;

/*
|--------------------------------------------------------------------------
| Debug
|--------------------------------------------------------------------------
|
*/
$app->containerSet('debug', Environment::isDevelopment() ? true : false);

/*
|--------------------------------------------------------------------------
| Errors/Exceptions handling
|--------------------------------------------------------------------------
|
*/
if ('cli' !== php_sapi_name()) {
    ini_set('display_errors', 0);
    ExceptionHandler::register($app->containerGet('debug'));
} elseif (!ini_get('log_errors') || ini_get('error_log')) {
    ini_set('display_errors', 1);
}

ErrorHandler::register();

/*
|--------------------------------------------------------------------------
| Environment
|--------------------------------------------------------------------------
|
*/
$app->containerSet('env', Environment::detect());

/*
|--------------------------------------------------------------------------
| Templating
|--------------------------------------------------------------------------
|
*/
$app->containerSet('template_path', __DIR__.'/views');

/*
|--------------------------------------------------------------------------
| Config
|--------------------------------------------------------------------------
|
*/
$app->containerSet('config', new Config(__DIR__."/config/".Environment::detect().".json"));

/*
|--------------------------------------------------------------------------
| Doctrine DBAL Service
|--------------------------------------------------------------------------
|
*/
$db = \Doctrine\DBAL\DriverManager::getConnection($app->containerGet('config')->get('db'), new \Doctrine\DBAL\Configuration());
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

/*
|--------------------------------------------------------------------------
| USer Service
|--------------------------------------------------------------------------
|
*/
$userRepo = new UserRepository($app->containerGet('db'));
$user = new User();

if (Session::get('user_logged')) {
    // Is this user really valid?
    // check User Agent, check db...

    if (Session::get('userAgent') !== $_SERVER['HTTP_USER_AGENT']) {
        // Are you you?
    }

    if ($userData = $userRepo->findOne(Session::get('user_id'))) {
        $user
            ->setId($userData['id'])
            ->setUsername($userData['username'])
            ->setLogged(true);
    }
}

$app->containerSet('user', $user);
