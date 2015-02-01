<?php

use \Exception;

namespace PostIt\Repositories;

/**
 *
 * @package    PostIt
 * @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
 * @copyright  Ilpaijin
 * @license
 * @version    Release: @package_version@
 */
class PostRepository extends EntityRepository
{
    /**
     * Entity table
     *
     * @var string
     */
    public $table = 'posts';

    /**
     * Retrieve data
     *
     * @return mixed
     */
    public function findAll()
    {
        try
        {
            $qrb = $this->dbHandler->createQueryBuilder();

            $qrb
                ->select('p.*', 'u.username as author', 'i.title as image_title', 'i.name as image_name')
                ->from($this->table, 'p')
                ->leftJoin('p', 'users', 'u', 'p.user_id = u.id')
                ->leftJoin('p', 'images', 'i', 'p.id = i.post_id');

            $stmt = $qrb->execute();

            return $stmt->fetchAll();

        } catch (Exception $e)
        {
            throw $e;
        }
    }
}
