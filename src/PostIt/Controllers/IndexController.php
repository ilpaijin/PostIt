<?php

namespace PostIt\Controllers;

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
class IndexController
{
    public function showAction(Request $request)
    {
        var_dump($request->query->all());
        exit;
        return new Response('Nope, this is not a leap year.');
    }
}
