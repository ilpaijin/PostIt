<?php

namespace PostIt\Application\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
*
* @package    PostIt
* @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
* @copyright  Ilpaijin
* @license
* @version    Release: @package_version@
*/
class ErrorController
{
    public function notFound(Request $request)
    {
        return new Response('aaa', 404);
    }

    public function server(Request $request)
    {
        return new Response('fff', 500);
    }
}
