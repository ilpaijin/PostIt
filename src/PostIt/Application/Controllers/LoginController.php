<?php

namespace PostIt\Application\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation;

use PostIt\Application\Session;

/**
 *
 * @package    PostIt
 * @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
 * @copyright  2015 Ilpaijin
 * @license
 * @version    Release: @package_version@
 */
class LoginController extends Controller
{
    /**
    * Dependencies
    *
    * @var array
    */
    protected $dependencies = array(
        'userrepository' => 'PostIt\\Repositories\\UserRepository'
    );

    public function loginAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            $this->render('error', array('status' => '405 HTTP_METHOD_NOT_ALLOWED'), 405);
        }

        $authenticated = $this->getUserrepository()->authenticate($request->request->get('username'), $request->request->get('password'));

        if ($authenticated) {

            if ($request->request->get('remember-me')) {

                Session::set('user_logged', true);
                Session::set('user_id', $authenticated['id']);
                Session::set('userAgent', $_SERVER['HTTP_USER_AGENT']);

                setcookie('pitpit', hash('sha256', $_SERVER['HTTP_USER_AGENT']), (time()+(60*60*24*14)), '/', '', false, true);
            }

            return new HttpFoundation\JsonResponse(array('username' => $authenticated['username']));
        }

        return HttpFoundation\JsonResponse(array('error', array('status' => '401 HTTP_UNAUTHORIZED'), 401));
    }

    public function logoutAction(Request $request)
    {
        setcookie('pitpit', '', time() - 1, '/', '', false, true);

        //this should be a logout service
        Session::end();

        return $this->redirect('/');
    }
}
