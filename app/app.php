<?php

require __DIR__."/../vendor/autoload.php";

$app = new PostIt\Application;

$db = \Doctrine\DBAL\DriverManager::getConnection(
    array(
        'dbname' => 'postit',
        'user' => 'root',
        'password' => '1234',
        'host' => 'localhost',
        'driver' => 'pdo_mysql',
    ),
    new \Doctrine\DBAL\Configuration()
);

$app->setService('db', $db);

return $app;
