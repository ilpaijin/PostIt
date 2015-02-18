<?php

namespace PostIt\Application\Controllers;

use Symfony\Component\HttpFoundation\Request;

/**
*
* @package    PostIt
* @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
* @copyright  2015 Ilpaijin
* @license
* @version    Release: @package_version@
*/
class AdminController extends Controller
{
    /**
    * Dependencies
    *
    * @var array
    */
    protected $dependencies = array(
        'postrepository' => 'PostIt\\Repositories\\PostRepository',
        'userrepository' => 'PostIt\\Repositories\\UserRepository'
    );

    public function welcomeAction(Request $request)
    {
        if (!$this->isLoggedUser()) {
            return $this->redirect('/');
        }

        return $this->render('back/admin', array(
            'user' => $this->containerGet('user')
        ));
    }

    public function sectionAction(Request $request, $page)
    {
        if (!$this->isLoggedUser())  {
            return $this->render('error', array('status' => '401 HTTP_UNAUTHORIZED'), 401);
        }

        return $this->render('back/admin', array(
            'posts' => $this->getPostrepository()->findAll(),
            'users' => $this->getUserrepository()->findAll(),
            'user' => $this->containerGet('user'),
            'page' => end($page),
            'img_path' => $this->containerGet('config')->get('cdn_static')
        ));
    }

}
