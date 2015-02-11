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
class Environment
{
    /**
     * Detect the Environment
     *
     * @return string
     */
    public static function detect()
    {
        if (in_array(php_sapi_name(), array('cli', 'cli-server'))) {
            return 'testing';
        }

        return getenv('ENV') ? getenv('ENV') : 'production';
    }

    /**
     * Is Development?
     */
    public static function isDevelopment()
    {
        return static::detect() === 'development';
    }
}
