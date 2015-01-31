<?php

namespace PostIt\Contracts;

interface Containerable
{
    /**
    * set strategy
    *
    * @param string $name
    * @param mixed $value
    */
    public function set($name, $value);

    /**
    * get strategy
    *
    * @param  string $name
    * @return mixed|false
    */
    public function get($name);
}
