<?php

namespace PostIt\Application;

/**
*
* @package    PostIt
* @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
* @copyright  Ilpaijin
* @license
* @version    Release: @package_version@
*/
class Session
{
    /**
     * Set the session value
     *
     * @param string $key
     * @param string $value
     */
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * Get session value
     *
     * @param  string $key
     * @return mixed
     */
    public static function get($key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : false ;
    }

    /**
     * Destroya session
     * @return void
     */
    public function end()
    {
        session_destroy();
    }
}
