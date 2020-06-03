<?php

use App\Core\Controller;
use App\Helpers\Auth as Authentication;
use App\Helpers\DB;

class Customer extends Controller
{
    protected $db;

    public function __construct()
    {
        Authentication::auth('admin');
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
