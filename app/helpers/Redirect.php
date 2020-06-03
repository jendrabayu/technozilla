<?php

namespace App\Helpers;

class Redirect
{

    public static function to($url)
    {

        $link = 'http://' . $_SERVER['HTTP_HOST'] .
            str_replace(
                $_SERVER['DOCUMENT_ROOT'],
                '',
                str_replace('\\', '/', INC_ROOT)
            );

        header("Location:" . $link . '/public/' . $url);
        die();
    }

    public static function back()
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            echo $_SERVER['HTTP_REFERER'];
        }
    }
}
