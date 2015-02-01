<?php

namespace PostIt\Repositories;

use \Exception;
use \DateTime;

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

    public function findPaged($offset, $limit)
    {
        try
        {
            $qrb = $this->dbHandler->createQueryBuilder();

            $qrb
            ->select('p.*', 'u.username as author', 'i.title as image_title', 'i.name as image_name')
            ->from($this->table, 'p')
            ->leftJoin('p', 'users', 'u', 'p.user_id = u.id')
            ->leftJoin('p', 'images', 'i', 'p.id = i.post_id')
            ->orderBy('p.date_created', 'DESC')
            ->setMaxResults($limit)
            ->setFirstResult($offset);

            // echo $qrb->getSQL();

            $stmt = $qrb->execute();

            return $stmt->fetchAll();

        } catch (Exception $e)
        {
            throw $e;
        }
    }

    public function countAll()
    {
        try
        {
            $qrb = $this->dbHandler->createQueryBuilder();

            $qrb
            ->select('COUNT(p.id) as count')
            ->from($this->table, 'p')
            ->leftJoin('p', 'users', 'u', 'p.user_id = u.id')
            ->leftJoin('p', 'images', 'i', 'p.id = i.post_id');

            $stmt = $qrb->execute();

            return $stmt->fetch();

        } catch (Exception $e)
        {
            throw $e;
        }
    }

    public function create($post, $userId)
    {
        try
        {
            $qrb = $this->dbHandler->createQueryBuilder();

            $qrb
                ->insert($this->table)
                ->values(
                    array(
                        'user_id' => '?',
                        'title' => '?',
                        'body' => '?',
                        'date_created' => '?'
                    )
                )
                ->setParameter(0, $userId)
                ->setParameter(1, $post['post_title'])
                ->setParameter(2, $post['post_body'])
                ->setParameter(3, date('Y:m:d H:i:s', time()));
                // ->setParameter(3, new DateTime(), \Doctrine\DBAL\Types\Type::DATETIME);

            $stmt = $qrb->execute();

            return $this->dbHandler->lastInsertId();
        } catch (Exception $e)
        {
            throw $e;
        }
    }
}
