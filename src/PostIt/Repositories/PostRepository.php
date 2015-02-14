<?php

namespace PostIt\Repositories;

use \Exception;
use \DateTime;

use PostIt\Application\Paginator;

/**
 *
 * @package    PostIt
 * @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
 * @copyright  2015 Ilpaijin
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
        try {
            $qrb = $this->dbHandler->createQueryBuilder();

            $qrb
                ->select('p.*', 'u.username as author', 'i.title as image_title', 'i.name as image_name')
                ->from($this->table, 'p')
                ->leftJoin('p', 'users', 'u', 'p.user_id = u.id')
                ->leftJoin('p', 'images', 'i', 'p.id = i.post_id');

            $stmt = $qrb->execute();

            return $stmt->fetchAll();

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function findPaged(Paginator $paginator)
    {
        try {
            $qrb = $this->dbHandler->createQueryBuilder();

            $now = new DateTime('now');

            $qrb
            ->select('p.*', 'u.username as author', 'i.title as image_title', 'i.name as image_name')
            ->from($this->table, 'p')
            ->leftJoin('p', 'users', 'u', 'p.user_id = u.id')
            ->leftJoin('p', 'images', 'i', 'p.id = i.post_id')
            ->where('p.published < CURRENT_TIMESTAMP()')
            ->orderBy('p.date_created', 'DESC')
            ->setMaxResults($paginator->getLimit())
            ->setFirstResult($paginator->getOffset());

            // echo $qrb->getSQL(); exit;

            $stmt = $qrb->execute();

            return $stmt->fetchAll();

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function countAll()
    {
        try {
            $qrb = $this->dbHandler->createQueryBuilder();

            $qrb
            ->select('COUNT(p.id) as count')
            ->from($this->table, 'p')
            ->leftJoin('p', 'users', 'u', 'p.user_id = u.id')
            ->leftJoin('p', 'images', 'i', 'p.id = i.post_id')
            ->where('p.published < CURRENT_TIMESTAMP()');

            $stmt = $qrb->execute();

            return $stmt->fetch();

        } catch (Exception $e) {
            throw $e;
        }
    }

    public function create($post, $userId)
    {
        $pub = isset($post['post_published']) ? $post['post_published'] . date('H:i:s') : 'now';
        $pub = new DateTime($pub);

        try {
            $qrb = $this->dbHandler->createQueryBuilder();

            $qrb
                ->insert($this->table)
                ->values(
                    array(
                        'user_id' => '?',
                        'title' => '?',
                        'body' => '?',
                        'date_created' => '?',
                        'published' => '?'
                    )
                )
                ->setParameter(0, $userId)
                ->setParameter(1, $post['post_title'])
                ->setParameter(2, $post['post_body'])
                ->setParameter(3, date('Y:m:d H:i:s', time()))
                ->setParameter(4, $pub->format('Y:m:d H:i:s'));
                // ->setParameter(3, new DateTime(), \Doctrine\DBAL\Types\Type::DATETIME);

            $qrb->execute();

            return $this->dbHandler->lastInsertId();
        } catch (Exception $e) {
            throw $e;
        }
    }
}
