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
            $this->render('error', array('status' => '405 HTTP_METHOD_NOT_ALLOWED'), 405);
        }

        $userRepo = new UserRepository($this->container->get('db'));

        $user = $userRepo->authenticate($request->request->get('username'), $request->request->get('password'));

        if ($user) {

            if ($request->request->get('remember-me')) {
                Session::set('user', $user['username']);
                Session::set('user_id', $user['id']);
            }

            return new HttpFoundation\JsonResponse(array('username' => $user['username']));
        }

        return $this->render('error', array('status' => '401 HTTP_UNAUTHORIZED'), 401);
    }

    public function logoutAction(Request $request)
    {
        //this should be a logout service
        Session::end();

        header("Location: /", 301);
        exit(0);
    }
}
