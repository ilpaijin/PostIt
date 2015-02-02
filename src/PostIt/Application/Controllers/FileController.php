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
* @copyright  Ilpaijin
* @license
* @version    Release: @package_version@
*/
class FileController extends Controller
{
    public function createImageAction(Request $request)
    {
        if (!$request->isXmlHttpRequest()) {
            return new HttpFoundation\Response('Method Not Allowed', 405);
        }

        if (!Session::get('user')) {
            $this->render('error', array('status' => '401 HTTP_UNAUTHORIZED'), 401);
        }

        //This should be a service
        if ($image = $this->uploadImage($_FILES['post_image'])) {
            $imageRepo = new ImageRepository($this->container->get('db'));
            $id = $this->saveImage($image, $imageRepo);

            return new HttpFoundation\JsonResponse($id);
        }

        return new HttpFoundation\JsonResponse(array('response' => 'error'));
    }

    public function uploadImage($image)
    {
        if (is_uploaded_file($image['tmp_name'])) {
            if ($image['error'] === UPLOAD_ERR_OK) {
                $imageNewName = $this->randomName($image['name']);

                if (move_uploaded_file($image["tmp_name"], $this->container->get('config')->get('upload_dir') . $imageNewName)) {
                    $image['newName'] = $imageNewName;
                    return $image;
                }
            }
        }

        return false;
    }

    public function saveImage($image, $imageRepo)
    {
        try {
            return $imageRepo->save($image);
        } catch (Exception $e) {
            //Log here
            return false;
        }
    }

    private function randomName($file)
    {
        return md5(time()).'.'.pathinfo($file, PATHINFO_EXTENSION);
    }
}
