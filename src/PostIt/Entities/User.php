<?php

namespace PostIt\Entities;

/**
 *
 * @package    PostIt
 * @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
 * @copyright  2015 Ilpaijin
 * @license
 * @version    Release: @package_version@
 */
class User
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var string
     */
    protected $username;

    /**
     * [$logged description]
     *
     * @var bool
     */
    protected $logged = false;

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Username
     *
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of Username
     *
     * @param mixed username
     *
     * @return self
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * User is logged?
     *
     * @return bool
     */
    public function isLogged()
    {
        return $this->logged;
    }

    /**
     * Set the value of [$logged description]
     *
     * @param bool logged
     *
     * @return self
     */
    public function setLogged($logged)
    {
        $this->logged = $logged;

        return $this;
    }

}
