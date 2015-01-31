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
}
