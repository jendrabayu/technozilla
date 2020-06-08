<?php

use App\Core\Controller;
use App\Core\Redirect;
use App\Core\Session;
use App\Core\DB;
use App\Core\Authentication;

class Auth extends Controller
{
    protected $db;
    protected $auth;

    public function __construct()
    {
        $this->db = new DB;
        $this->auth = new Authentication;
    }

    public function index()
    {
        if (Session::get('is_customer')) {
            Redirect::to('');
        }

        $data['judul'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('auth/login');
        $this->view('templates/footer');
    }

    public function register()
    {
        if (Session::get('is_customer')) {
            Redirect::to('');
        }

        $data['judul'] = 'Register';
        $this->view('templates/header', $data);
        $this->view('auth/register');
        $this->view('templates/footer');
    }

    public function do_login()
    {
        if ($this->auth->login('customer')) {
            Redirect::to('');
        } else {
            Session::setFlash('Email / Password Salah', 'danger');
            Redirect::to('auth');
        }
    }


    public function store()
    {
        if ($_POST['password'] != $_POST['repassword']) {
            Session::setFlash('Password Harus Sama!', 'danger');
            Redirect::to('auth/register');
        } else {
            if ($this->auth->register('customer')) {
                Session::setFlash('Registrasi Berhasil Silahkan Login', 'primary');
                Redirect::to('auth');
            } else {
                Session::setFlash('Registrasi Gagal', 'danger');
                Redirect::to('auth/register');
            }
        }
    }

    public function do_logout()
    {
        $this->auth->logout('customer');
    }
}
