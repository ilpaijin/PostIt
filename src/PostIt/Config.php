<?php

namespace PostIt;

use Symfony\Component\HttpFoundation\File\Exception;

/**
* A very basic DI Container
*
* @package    PostIt
* @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
* @copyright  Ilpaijin
* @license
* @version    Release: @package_version@
*/
class Config
{
    /**
     * @var array
     */
    protected $data = array();

    /**
     *
     * @param string $path
     */
    public function __construct($path)
    {
        if (!file_exists($path)) {
            throw new FileNotFoundException($path);
        }

        $json = file_get_contents($path);

        $this->data = json_decode($json, true);
    }

    /**
     * Return the config array for the specified key.
     *
     * @param  string $key
     * @return array|false
     */
    public function get($key)
    {
        return isset($this->data[$key]) ? $this->data[$key] : false;
    }
}
