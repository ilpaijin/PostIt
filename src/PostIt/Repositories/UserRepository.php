<?php

namespace PostIt\Repositories;

/**
*
* @package    PostIt
* @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
* @copyright  Ilpaijin
* @license
* @version    Release: @package_version@
*/
class UserRepository extends EntityRepository
{
    /**
    * Entity table
    *
    * @var string
    */
    public $table = 'users';

    /**
    * Retrieve all users
    *
    * @return mixed
    */
    public function findAll()
    {
        try
        {
            $qrb = $this->dbHandler->createQueryBuilder();

            $qrb
            ->select('u.*')
            ->from($this->table, 'u');

            $stmt = $qrb->execute();

            return $stmt->fetchAll();

        } catch (Exception $e)
        {
            throw $e;
        }
    }

    /**
     * To be moved from here
     *
     * @param  string $username
     * @param  string $password
     * @return mixed
     */
    public function authenticate($username, $password)
    {
        try
        {
            $qrb = $this->dbHandler->createQueryBuilder();

            $qrb
                ->select('u.id', 'u.username')
                ->from($this->table, 'u')
                ->where('username =' . $qrb->createNamedParameter($username))
                ->andWhere('password =' . $qrb->createNamedParameter(hash('sha256', $password)));

            $stmt = $qrb->execute();

            return $stmt->fetch();

        } catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
}
