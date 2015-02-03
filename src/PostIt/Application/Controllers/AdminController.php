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
        // $this->postRepository = new PostRepository($this->container->get('db'));
        // $posts_count = $this->postRepository->countAll();

        return $this->render('back/admin', array(
            'user' => Session::get('user')
        ));
    }

    public function sectionAction(Request $request, $page)
    {
        return $this->render('back/admin', array(
            'user' => Session::get('user'),
            'page' => end($page)
        ));
    }

}
