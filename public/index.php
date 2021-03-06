<?php

use Symfony\Component\HttpFoundation\Request;

require '../vendor/autoload.php';

$app = require '../app/app.php';

$request = Request::createFromGlobals();

$response = $app->handle($request);

$response->send();
