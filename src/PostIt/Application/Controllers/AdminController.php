<?php

namespace PostIt\Application\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use PostIt\Repositories\PostRepository;
use PostIt\Application\Session;
use PostIt\Application\Config;

/**
*
* @package    PostIt
* @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
* @copyright  Ilpaijin
* @license
* @version    Release: @package_version@
*/
class AdminController extends Controller
{
    public function welcomeAction(Request $request)
    {
        if (!Session::get('user')) {
            header("Location: /", 302);
            exit(0);
        }

        return $this->render('back/admin', array(
            'user' => Session::get('user')
        ));
    }

    public function sectionAction(Request $request, $page)
    {
        if (!Session::get('user')) {
            return $this->render('error', array('status' => '401 HTTP_UNAUTHORIZED'), 401);
        }

        $this->postRepository = new PostRepository($this->container->get('db'));
        $posts = $this->postRepository->findAll();

        return $this->render('back/admin', array(
            'posts' => $posts,
            'user' => Session::get('user'),
            'page' => end($page),
            'img_path' => $this->container->get('config')->get('cdn_static')
        ));
    }

}
