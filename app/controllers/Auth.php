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
            Session::setFlash('Email atau Password Salah', 'danger');
            Redirect::back();
        }
    }


    public function store()
    {
        if ($_POST['password'] != $_POST['repassword']) {
            Session::setFlash('Password Harus Sama!', 'danger');
            Redirect::back();
        } else {
            if ($this->auth->register('customer')) {
                Session::setFlash('Registrasi Berhasil Silahkan Login', 'primary');
                Redirect::to('auth');
            } else {
                Session::setFlash('Registrasi Gagal', 'danger');
                Redirect::back();
            }
        }
    }

    public function do_logout()
    {
        $this->auth->logout('customer');
    }


    public function resetpassword()
    {
        $data['judul'] = 'Ubah Password';
        $this->view('templates/header', $data);
        $this->view('auth/reset_password');
        $this->view('templates/footer');
    }


    public function updatepassword()
    {
        $currentPassword = Session::get('is_customer');
        $currentPassword = $currentPassword['password'];

        if ($_POST['new_password'] != $_POST['re_newpassword']) {
            Session::setFlash('Password Baru Anda Tidak Sama', 'warning');
            Redirect::back();
        } else if ($currentPassword != md5($_POST['old_password'])) {
            Session::setFlash('Password Lama Anda Salah', 'warning');
            Redirect::back();
        } else {
            if ($this->db->update(
                'customer',
                [
                    'password' => md5($_POST['new_password']),
                    'updated_at' => currentTimeStamp()
                ],
                'id',
                '=',
                getUserId('customer')
            )) {
                Session::setFlash('Password Berhasil Diubah Silahkan Login Ulang', 'primary');
                Session::remove('is_customer');
                Redirect::to('auth');
            } else {
                Session::setFlash('Password Gagal Diubah', 'danger');
            }
        }
    }
}
