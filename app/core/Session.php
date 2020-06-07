<?php

namespace App\Core;

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

    public static function setFlash($message, $type = null)
    {
        self::set([
            'flash_data' => [
                'message' => $message,
                'type' => $type == null ? $type = 'primary' : $type
            ]
        ]);
    }

    public static function getFlash()
    {
        $flash = self::get('flash_data');
        if (!empty($flash)) {
            echo sprintf(
                '<div class="alert alert-%s alert-dismissible show fade">
                      <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                       %s
                      </div>
                </div>',
                $flash['type'],
                $flash['message']
            );

            self::remove('flash_data');
        }
    }
}
