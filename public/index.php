<?php

use Symfony\Component\HttpFoundation\Request;

require '../vendor/autoload.php';

$app = require '../app/app.php';

$request = Request::createFromGlobals();

$response = $app->handle($request);

var_dump(session_id());
exit;

$response->send();
