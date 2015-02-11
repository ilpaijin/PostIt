<?php

use \Exception;

namespace PostIt\Repositories;

/**
*
* @package    PostIt
* @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
* @copyright  2015 Ilpaijin
* @license
* @version    Release: @package_version@
*/
class ImageRepository extends EntityRepository
{
    /**
    * Entity table
    *
    * @var string
    */
    public $table = 'images';

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

    public function save($image)
    {
        try
        {
            $qrb = $this->dbHandler->createQueryBuilder();

            $qrb
                ->insert($this->table)
                ->values(
                    array(
                        'name' => '?',
                        'title' => '?',
                        'status' => '?'
                    )
                )
                ->setParameter(0, $image['newName'])
                ->setParameter(1, $image['name'])
                ->setParameter(2, 'unused');

            $stmt = $qrb->execute();

            return $this->dbHandler->lastInsertId();

        } catch (Exception $e)
        {
            return false;
        }
    }

    public function update($targetId, $data)
    {
        try
        {
            $qrb = $this->dbHandler->createQueryBuilder();

            $qrb
                ->update($this->table, 'i')
                ->set('i.status', '?')
                ->set('i.post_id', '?')
                ->where('id = ?')
                ->setParameter(0, 'active')
                ->setParameter(1, $data)
                ->setParameter(2, $targetId);

            $stmt = $qrb->execute();

            return true;

        } catch (Exception $e)
        {
            return false;
        }
    }
}
