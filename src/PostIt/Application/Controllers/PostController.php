<?php

namespace PostIt\Application\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation;

use PostIt\Repositories\PostRepository;
use PostIt\Repositories\ImageRepository;
use PostIt\Application\Session;

/**
*
* @package    PostIt
* @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
* @copyright  Ilpaijin
* @license
* @version    Release: @package_version@
*/
class PostController extends Controller
{
    public function createPostAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return new HttpFoundation\Response('Method Not Allowed', 405);
        }

        if (!Session::get('user')) {
            return new HttpFoundation\Response('Unauthorized', 401);
        }

        $postRepo = new PostRepository($this->container->get('db'));


        //This should be a service
        if ($postId = $postRepo->create($request->request->all(), Session::get('user_id'))) {

            $post = $postRepo->findOne($postId);
            $imageRepo = new ImageRepository($this->container->get('db'));

            $imageRepo->update($request->request->get('post_image_preview'), $postId);

            return new HttpFoundation\RedirectResponse('/', 302);
        }


    }
}
