<?php

use App\Core\Controller;
use App\Helpers\Auth as Authentication;
use App\Helpers\Redirect;
use App\Helpers\Session;
use App\Helpers\DB;
use App\Helpers\Flash;

class Auth extends Controller
{

    protected $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    public function index()
    {
        if (Session::get('is_customer')) {
            Redirect::to('');
        }
        $this->view('templates/header');
        $this->view('auth/login');
        $this->view('templates/footer');
    }

    public function register()
    {
        if (Session::get('is_customer')) {
            Redirect::to('');
        }
        $this->view('templates/header');
        $this->view('auth/register');
        $this->view('templates/footer');
    }

    public function do_login()
    {
        if (Session::get('is_customer')) {
            Redirect::to('');
        }


        $customer = $this->db
            ->select('*')
            ->from('customer')
            ->where('email', '=', $_POST['email'])
            ->andWhere('password', '=', md5($_POST['password']))
            ->first();

        if ($customer) {
            Session::set(
                ['is_customer' => $customer]
            );
            Redirect::to('');


            //set session qty keranjang
            $qty = $this->db
                ->select('SUM(kuantitas) as qty')
                ->from('keranjang')
                ->where('customer_id', '=', $_SESSION['is_customer']['id'])
                ->first();


            Session::set(
                ['is_keranjang' => [
                    'qty' => $qty['qty']
                ]]
            );
            Redirect::to('');
        } else {
            Flash::setFlash('Email / Password Salah', 'danger');
            Redirect::to('auth');
        }
    }


    public function store()
    {
        Authentication::register('customer');
        Redirect::to('auth/login');
    }

    public function do_logout()
    {
        Session::destroy();
        Redirect::to('');
    }
}
