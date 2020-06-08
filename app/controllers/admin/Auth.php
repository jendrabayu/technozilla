<?php

use App\Core\Controller;
use App\Core\Authentication;
use App\Core\DB;
use App\Core\Redirect;
use App\Core\Session;

class Auth extends Controller
{
    protected $db;
    protected $auth;

    public function __construct()
    {
        $this->auth = new Authentication;
        $this->db = new DB;
    }


    public function index()
    {
        if (Session::get('is_admin')) {
            Redirect::to('admin');
        }
        $data['judul'] = 'Login';
        $this->view('admin/auth/login', $data);
    }

    public function do_login()
    {
        if ($this->auth->login('admin')) {
            Redirect::to('admin/');
        } else {
            Session::setFlash('Email / Password Salah', 'danger');
            Redirect::to('admin/auth');
        }
    }

    public function register()
    {
        if (Session::get('is_admin')) {
            Redirect::to('admin');
        }
        $data['judul'] = 'Regsiter';
        $this->view('admin/auth/register', $data);
    }

    public function store()
    {
        if ($_POST['password'] != $_POST['repassword']) {
            Session::setFlash('Password Harus Sama!', 'danger');
            Redirect::to('admin/auth/register');
        } else {

            if ($this->auth->register('admin')) {
                Session::setFlash('Registrasi Berhasil Silahkan Login', 'primary');
                Redirect::to('admin/auth');
            } else {
                Session::setFlash('Registrasi Gagal', 'danger');
                Redirect::to('admin/auth/register');
            }
        }
    }

    public function do_logout()
    {
        $this->auth->logout('admin');
    }
}
