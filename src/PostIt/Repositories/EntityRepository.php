<?php

namespace PostIt\Repositories;

use \Exception;

/**
*
* @package    PostIt
* @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
* @copyright  Ilpaijin
* @license
* @version    Release: @package_version@
*/
class EntityRepository
{
    /**
     * Connection handler
     *
     * @var \Doctrine\DBAL\Connection
     */
    protected $dbHandler;

    /**
     *
     * @param \Doctrine\DBAL\Connection $dbHandler
     */
    public function __construct($dbHandler)
    {
        $this->dbHandler = $dbHandler;
    }

    /**
     * [findAll description]
     */
    public function findAll()
    {
        try
        {
            $qrb = $this->dbHandler->createQueryBuilder();

            $qrb->select('*')->from($this->table);
            $stmt = $qrb->execute();

            return $stmt->fetchAll();

        } catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
}


// //$qb->add('select', 'u')
// ->add('from', 'User u')
// ->add('orderBy', 'u.name ASC')
// ->setFirstResult( $offset )
// ->setMaxResults( $limit );
