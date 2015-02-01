<?php

namespace PostIt\Application\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use PostIt\Repositories\PostRepository;

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
    public function newsFeedAction(Request $request)
    {
        $this->postRepository = new PostRepository($this->container->get('db'));

        return $this->render('newsfeed', array(
            'posts' => $this->postRepository->findAll()
        ));
    }
}
