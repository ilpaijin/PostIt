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
class Session
{
    public static function start()
    {
        session_name('postit');
        session_start();
    }

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
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 1,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
        session_destroy();
    }
}
