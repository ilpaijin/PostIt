<?php

namespace PostIt;

use PostIt\Contracts\Containerable;

/**
 *
 * @package    PostIt
 * @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
 * @copyright  Ilpaijin
 * @license
 * @version    Release: @package_version@
 */
class Application
{
    /**
     * @param Containerable $container
     */
    public function __construct(Containerable $container)
    {
        $this->container = $container;
    }

    /**
     * soLid Liskov principle, useful for testing
     *
     * @param string $name
     */
    public function containerGet($name)
    {
        return $this->container->get($name);
    }

    /**
    * soLid Liskov principle, useful for testing
    *
    * @param string $name
    * @param mixed $value $name
    *
    * @return mixed
    */
    public function containerSet($name, $value)
    {
        return $this->container->set($name, $value);
    }

    /**
     * Debug checking
     *
     * @return bool
     */
    public function isInDebug()
    {
        return $this->containerGet('debug') === true;
    }

    /**
     * run the applicaition
     */
    public function run()
    {
        echo 'ok';
    }
}
