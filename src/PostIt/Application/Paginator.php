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
    public $counts;

    public function set($page)
    {
        if ($page) {
            $this->setOffset($page['page']);
        }
    }

    public function hasPage()
    {
        return $this->getOffset() <= $this->getCounts();
    }

    /**
    * Get the value of Offset
    *
    * @return mixed
    */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
    * Set the value of Offset
    *
    * @param mixed offset
    *
    * @return self
    */
    public function setOffset($offset)
    {
        $this->offset = $offset;
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


    /**
     * Set the value of Limit
     *
     * @param mixed limit
     *
     * @return self
     */
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }

    /**
     * Get the value of Counts
     *
     * @return mixed
     */
    public function getCounts()
    {
        return $this->counts;
    }

    /**
     * Set the value of Counts
     *
     * @param mixed counts
     *
     * @return self
     */
    public function setCounts($counts)
    {
        $this->counts = (int) $counts['count'];
    }
}
