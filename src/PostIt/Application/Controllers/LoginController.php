<?php

namespace PostIt\Application\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation;

use PostIt\Repositories\UserRepository;
use PostIt\Application\Session;

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
        if (!$request->isXmlHttpRequest()) {
            return new HttpFoundation\Response('Method Not Allowed', 405);
        }

        $userRepo = new UserRepository($this->container->get('db'));

        $user = $userRepo->authenticate($request->request->get('username'), $request->request->get('password'));

        if ($user) {

            if ($request->request->get('remember-me')) {
                Session::set('user', $user);
            }

            return new HttpFoundation\JsonResponse(array('username' => $user['username']));
        }

        return new HttpFoundation\Response('Unauthorized', 401);
    }
}
