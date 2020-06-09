<?php

namespace App\Core;

use App\Core\DB;
use App\Core\Session;

class Authentication
{
    protected $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    public static function auth($user)
    {
        if ($user == 'admin') {
            if (!Session::get('is_admin')) {
                Session::setFlash('Anda Harus Login', 'warning');
                Redirect::to('admin/auth/login');
            }
        } else if ($user == 'customer') {
            if (!Session::get('is_customer')) {
                Session::setFlash('Anda Harus Login', 'warning');
                Redirect::to('auth/login');
            }
        }
    }

    public function register($user)
    {
        return   $this->db->insert($user, [
            'id' => null,
            'nama' => $_POST['nama'],
            'email' => $_POST['email'],
            'password' => md5($_POST['password']),
            'created_at' => currentTimeStamp(),
            'updated_at' => currentTimeStamp()
        ]);
    }

    public function login($user)
    {
        $data = $this->db->select('*')->from($user)->where([['email', '=', $_POST['email']], ['password', '=', md5($_POST['password'])]])->first();

        if ($data) {
            Session::set(["is_$user" => $data]);
            return true;
        }
        return false;
    }

    public function logout($user)
    {
        Session::remove("is_$user");
        Redirect::to('');
    }
}
