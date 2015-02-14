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
 * @copyright  2015 Ilpaijin
 * @license
 * @version    Release: @package_version@
 */
class IndexController extends Controller
{
    public function welcomeAction(Request $request, $page)
    {
        $paginator = $this->getPaginator();
        $paginator->set($page);

        $this->postRepository = new PostRepository($this->container->get('db'));
        $posts_count = $this->postRepository->countAll();

        if ($paginator->getOffset() && $paginator->getOffset() > ($posts_count['count']-1)) {
            return $this->render('error',array('status' => '404 HTTP_NOT_FOUND'), 404);
        }
        
        return $this->render('front/welcome', array(
            'posts' => $this->postRepository->findPaged($paginator),
            'posts_count' => $posts_count,
            'current_page' => $paginator->getOffset(),
            'user' => Session::get('user'),
            'img_path' => $this->container->get('config')->get('cdn_static')
        ));
    }
}
