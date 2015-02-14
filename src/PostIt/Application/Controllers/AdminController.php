<?php

namespace PostIt\Application\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use PostIt\Repositories\PostRepository;
use PostIt\Repositories\UserRepository;
use PostIt\Application\Session;
use PostIt\Application\Config;

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
            header("Location: /", 302);
            exit(0);
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

        $posts = $this->getPostrepository()->findAll();

        $users = $this->getUserrepository()->findAll();

        return $this->render('back/admin', array(
            'posts' => $posts,
            'users' => $users,
            'user' => $this->containerGet('user'),
            'page' => end($page),
            'img_path' => $this->containerGet('config')->get('cdn_static')
        ));
    }

}
