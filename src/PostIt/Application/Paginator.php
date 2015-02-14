<?php

namespace PostIt\Application;

/**
*
* @package    PostIt
* @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
* @copyright  2015 Ilpaijin
* @license
* @version    Release: @package_version@
*/
class Paginator
{
    public $offset = 0;
    public $limit = 1;

    public function set($page)
    {
        if ($page) {
            $this->offset = $page['page'];
        }
    }

    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * Get the value of Limit
     *
     * @return mixed
     */
    public function getLimit()
    {
        return $this->limit;
    }
}
