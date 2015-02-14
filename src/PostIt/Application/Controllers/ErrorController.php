<?php

namespace PostIt\Application\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
*
* @package    PostIt
* @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
* @copyright  2015 Ilpaijin
* @license
* @version    Release: @package_version@
*/
class ErrorController extends Controller
{
    public function notFound(Request $request, $message)
    {
        return $this->render('error', array('status' => '404 HTTP_NOT_FOUND', 'message' => $message), 404);
    }

    public function server(Request $request, $message)
    {
        return $this->render('error', array('status' => '500 INTERNAL_SERVER_ERROR', 'message' => $message), 500);
    }
}
