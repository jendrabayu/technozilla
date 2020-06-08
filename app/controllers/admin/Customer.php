<?php

use App\Core\Controller;
use App\Core\DB;

class Customer extends Controller
{
    protected $db;

    public function __construct()
    {
        \App\Core\Authentication::auth('admin');
        $this->db = new DB;
    }

    public function index()
    {
        $data['judul'] = 'Customer';
        $data['customer'] = $this->db->get('customer');
        $this->view('admin/templates/header', $data);
        $this->view('admin/customer', $data);
        $this->view('admin/templates/footer');
    }
}
