<?php

use App\Core\Controller;
use App\Helpers\Auth as Authentication;
use App\Core\DB;
use App\Helpers\Flash;
use App\Helpers\Redirect;
use App\Core\Session;

class Auth extends Controller
{
    protected $db;

    public function __construct()
    {
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


        $admin = $this->db
            ->select('*')
            ->from('admin')
            ->where('email', '=', $_POST['email'])
            ->andWhere('password', '=', md5($_POST['password']))
            ->first();

        if ($admin) {
            Session::set(
                ['is_admin' => $admin]
            );
            Redirect::to('admin');
        }

        Redirect::to('admin/auth');
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

            if (Authentication::register('admin')) {
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
        Session::destroy();
        Redirect::to('admin/auth/login');
    }
}
