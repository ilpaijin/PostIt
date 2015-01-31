<?php

namespace PostIt;

/**
* A very basic DI Container
*
* @package    PostIt
* @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
* @copyright  Ilpaijin
* @license
* @version    Release: @package_version@
*/
class Container
{
    /**
     * Services
     *
     * @var array
     */
    protected $services = array();

    /**
     * Values
     * @var array
     */
    protected $values = array();

    /**
     * Set a service into the container
     *
     * @param string $serviceName
     * @param object $service
     */
    public function setService($serviceName, $service)
    {
        $this->services[$serviceName] = $service;
    }

    /**
     * Get a service from the container
     *
     * @param string $serviceName
     * @return object|bool
     */
    public function getService($serviceName)
    {
        return isset($this->services[$serviceName]) ? $this->services[$serviceName] : false;
    }

    /**
    * Set a value into the container
    *
    * @param string $name
    * @param string $value
    */
    public function setValue($name, $value)
    {
        $this->values[$name] = $value;
    }

    /**
    * Get a value from the container
    *
    * @param string $serviceName
    * @return object|bool
    */
    public function getValue($name)
    {
        return isset($this->values[$name]) ? $this->values[$name] : false;
    }
}
