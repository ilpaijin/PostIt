<?php

namespace PostIt\Application\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation;

/**
 *
 * @package    PostIt
 * @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
 * @copyright  Ilpaijin
 * @license
 * @version    Release: @package_version@
 */
class LoginController extends Controller
{
    public function loginAction(Request $request)
    {
        if ($request->getMethod() !== 'POST') {
            header('Location: /');
        }

        var_dump($request->request->all());

        return new HttpFoundation\RedirectResponse('/', 301);
    }
}
