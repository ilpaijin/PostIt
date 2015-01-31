<?php

namespace PostIt;

/**
 *
 * @package    PostIt
 * @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
 * @copyright  Ilpaijin
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
        return getenv('ENV') ? getenv('ENV') : 'production';
    }

    /**
     * Is Development?
     */
    public function isDevelopment()
    {
        return static::detect() === 'development';
    }
}
