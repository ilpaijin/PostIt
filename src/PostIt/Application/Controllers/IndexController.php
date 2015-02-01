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
class IndexController extends Controller
{
    public function welcomeAction(Request $request)
    {
        $this->postRepository = new PostRepository($this->container->get('db'));

        return $this->render('welcome', array(
            'posts' => $this->postRepository->findAll(),
            'user' => Session::get('user'),
            'img_path' => $this->container->get('config')->get('cdn_static')
        ));
    }
}
