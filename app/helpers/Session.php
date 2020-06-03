<?php

namespace App\Helpers;

class Session
{

    public static function set($array = [])
    {
        foreach ($array as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }

    public static function get($name)
    {
        if (isset($_SESSION[$name])) {
            return $_SESSION[$name];
        }
        return false;
    }

    public static function remove($name)
    {
        unset($_SESSION[$name]);
    }

    public static function destroy()
    {
        session_destroy();
    }
}
