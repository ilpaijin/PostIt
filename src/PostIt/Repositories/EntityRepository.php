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
    protected $dbHandler;

    public function __construct($dbHandler)
    {
        $this->dbHandler = $dbHandler;
    }

    public function findAll()
    {
        try
        {
            $stmt = $this->dbHandler->prepare("SELECT * FROM {$this->table}");
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (Exception $e)
        {
            return $e->getMessage();
        }
    }
}
