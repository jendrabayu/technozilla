<?php

use App\Core\Controller;
use App\Helpers\Auth as Authentication;

class Home extends Controller
{

    public function __construct()
    {
        Authentication::auth('admin');
    }

    public function index()
    {
        $data['judul'] = 'Dashboard';
        $this->view('admin/templates/header', $data);
        $this->view('admin/home');
        $this->view('admin/templates/footer');
    }
}
