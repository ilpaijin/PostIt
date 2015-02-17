<?php

namespace PostIt\Application\Commands;

use Doctrine\DBAL\Connection;

/**
*
* @package    PostIt
* @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
* @copyright  Paolo Pietropoli
* @license
* @version    Release: @package_version@
*/
class AdminUser
{
    /**
    *
    * @param  Doctrine\DBAL\Connection $conn
    * @return void
    */
    public static function create(Connection $conn)
    {
        $qrb = $conn->createQueryBuilder();

        $qrb
            ->select('*')
            ->from('users', 'u')
            ->where('username = ?')
            ->andWhere('password = ?')
            ->setParameter(0, 'admin')
            ->setParameter(1, hash('sha256', 'admin'));

        $stmt = $qrb->execute();

        if (!$stmt->fetch()) {
            $qrb
                ->insert('users')
                ->values( array(
                    'username' => '?',
                    'password' => '?',
                ))
                ->setParameter(0, 'admin')
                ->setParameter(1, hash('sha256', 'admin'));

            $stmt = $qrb->execute();
        }
    }
}
