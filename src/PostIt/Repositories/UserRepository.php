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
    public $table = 'users';

    public function findOne($id)
    {
        try
        {
            $qrb = $this->dbHandler->createQueryBuilder();

            $qrb->select('*')->from($this->table)->where($qrb->expr()->eq('id', $id));
            $stmt = $qrb->execute();

            return $stmt->fetchAll();

        } catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
    public function authenticate($username, $password)
    {
        try
        {
            $qrb = $this->dbHandler->createQueryBuilder();

            $qrb
                ->select('u.username')
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
