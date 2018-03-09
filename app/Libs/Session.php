<?php

/**
*
*/
class Session
{

    function __construct()
    {
        Session::start();
    }

    static function start()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    static function logged()
    {
        if (Session::get(['user', 'login_status'])){
            return true;
        }
    }

    static function setLoginStatus($status)
    {
        $_SESSION['user']['login_status'] = $status;
        $_SESSION['account'] = [];
    }

    static function getLoginStatus()
    {
        return $_SESSION['user']['login_status'];
    }

    static function get($what)
    {
        Session::start();

        if (is_array($what)){
            return $_SESSION[$what[0]][$what[1]];
        }
        return $_SESSION[$what];
    }

    static function set($what, $where)
    {
        if (is_array($what)){
            return $_SESSION[$what[0]][$what[1]];
        }
        return $_SESSION[$where] = $what;
    }

    static function destroy()
    {
        unset($_SESSION); // will delete just the name data
        session_destroy(); // will delete ALL data associated with that user.

        header('Location: /login');
    }
}
