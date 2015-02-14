<?php

namespace PostIt\Application\Controllers;

use Symfony\Component\HttpFoundation\Request;

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
    /**
     * Dependencies
     *
     * @var array
     */
    protected $dependencies = array(
        'postrepository' => 'PostIt\\Repositories\\PostRepository'
    );

    /**
     * Home page
     *
     * @param Symfony\Component\HttpFoundation\Request $request
     * @param Symfony\Component\HttpFoundation\Response $page
     */
    public function welcomeAction(Request $request, $page)
    {
        $this->postRepository = $this->getPostrepository($this->container->get('db'));

        $paginator = $this->getPaginator();
        $paginator->set($page);
        $paginator->setCounts($this->postRepository->countAll());

        if (!$paginator->hasPage()) {
            return $this->render('error',array('status' => '404 HTTP_NOT_FOUND'), 404);
        }

        return $this->render('front/welcome', array(
            'posts' => $this->postRepository->findPaged($paginator),
            'posts_count' => $paginator->getCounts(),
            'current_page' => $paginator->getOffset(),
            'user' => $this->container->get('user'),
            'img_path' => $this->container->get('config')->get('cdn_static')
        ));
    }
}
