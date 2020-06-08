<?php

namespace App\Helpers;

use App\Core\Session;
use App\Core\Redirect;
use App\Core\DB;



class Auth
{

    

    public static function auth($role)
    {
        if ($role == 'admin') {
            if (!Session::get('is_admin')) {
                Redirect::to('admin/auth/login');
            }
        } else if ($role == 'customer') {
            if (!Session::get('is_customer')) {
                Redirect::to('auth/login');
            }
        }
    }

    public static function register($role)
    {
        $db = new DB;
        return $db->insert($role, [
            'id' => null,
            'nama' => $_POST['nama'],
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
            'created_at' => currentTimeStamp(),
            'updated_at' => currentTimeStamp()
        ]);
    }
}
