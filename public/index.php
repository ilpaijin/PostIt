<?php

use Symfony\Component\HttpFoundation\Request;

require '../vendor/autoload.php';

session_name('postit');
session_start();

$app = require '../app/app.php';

$request = Request::createFromGlobals();

$response = $app->handle($request);

$response->send();
