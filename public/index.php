<?php

require '../vendor/autoload.php';


var_dump($_SERVER);

$app = require '../app/app.php';

var_dump($app->getService('db'));

$app->run();
