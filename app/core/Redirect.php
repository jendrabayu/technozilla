<?php

namespace App\Core;

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

        header('Location:' . $link . '/' . $url);
        die();
    }

    public static function back()
    {
        if (isset($_SERVER['HTTP_REFERER'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }
    }

    public static function error($code, $user)
    {

        if ($user == 'customer') {
            $data['judul'] = 'Error ' . $code;
            require_once 'app/views/templates/header.php';
            require_once 'app/views/errors/' . $code . '.php';
            require_once 'app/views/templates/footer.php';
            die;
        } else if ($user == 'admin') {
            require_once 'app/views/admin/errors/' . $code . '.php';
            die;
        } else {
            self::to('');
        }
    }
}
