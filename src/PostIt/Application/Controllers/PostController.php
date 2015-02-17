<?php

namespace PostIt\Application\Controllers;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation;

use PostIt\Repositories\ImageRepository;
use PostIt\Application\Session;

/**
*
* @package    PostIt
* @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
* @copyright  2015 Ilpaijin
* @license
* @version    Release: @package_version@
*/
class PostController extends Controller
{
    /**
    * Dependencies
    *
    * @var array
    */
    protected $dependencies = array(
        'postrepository' => 'PostIt\\Repositories\\PostRepository'
    );

    public function createPostAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return $this->render('error', array('status' => '405 HTTP_METHOD_NOT_ALLOWED'), 405);
        }

        if (!$this->isLoggedUser()) {
            return $this->render('error', array('status' => '401 HTTP_UNAUTHORIZED'), 401);
        }

        $postRepo = $this->getPostrepository();

        //This should be a service
        if ($postId = $postRepo->create($request->request->all(), Session::get('user_id'))) {

            $post = $postRepo->findOne($postId);
            $imageRepo = new ImageRepository($this->container->get('db'));

            $imageRepo->update($request->request->get('post_image_preview'), $postId);

            return new HttpFoundation\JsonResponse(array('response'=>true));
        }


    }
}
