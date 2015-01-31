<?php

namespace PostIt;

use PostIt\Contracts\Containerable;

use InvalidArgumentException;

/**
* A very basic DI Container
*
* @package    PostIt
* @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
* @copyright  Ilpaijin
* @license
* @version    Release: @package_version@
*/
class Container implements Containerable
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
     * {@inheritdoc}}
     */
    public function set($name, $value)
    {
        if (is_object($value) || is_callable($value) || method_exists($value, '__invoke')) {
            $this->setService($name, $value);
        } else {
            $this->setValue($name, $value);
        }
    }

    /**
    * {@inheritdoc}}
    */
    public function get($name)
    {
        if (isset($this->services[$name])) {
            return $this->getService($name);
        }

        if (isset($this->values[$name])) {
            return $this->getValue($name);
        }

        throw new InvalidArgumentException("The container doesn't have the requested value: {$name}");
    }

    /**
     * Set a service into the container
     *
     * @param string $serviceName
     * @param object $service
     */
    protected function setService($serviceName, $service)
    {
        $this->services[$serviceName] = $service;
    }

    /**
     * Get a service from the container
     *
     * @param string $serviceName
     * @return object|bool
     */
    protected function getService($serviceName)
    {
        return isset($this->services[$serviceName]) ? $this->services[$serviceName] : false;
    }

    /**
    * Set a value into the container
    *
    * @param string $name
    * @param string $value
    */
    protected function setValue($name, $value)
    {
        $this->values[$name] = $value;
    }

    /**
    * Get a value from the container
    *
    * @param string $serviceName
    * @return object|bool
    */
    protected function getValue($name)
    {
        return isset($this->values[$name]) ? $this->values[$name] : false;
    }
}
