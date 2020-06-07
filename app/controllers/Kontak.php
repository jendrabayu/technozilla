<?php

use App\Core\Controller;
use App\Core\DB;
use App\Helpers\Session;

class Kontak extends Controller
{

    protected $db;

    public function __construct()
    {
        $this->db = new DB;
    }


    public function index()
    {
        $data['judul'] = 'Kontak';
        $this->view('templates/header', $data);
        $this->view('kontak',);
        $this->view('templates/footer');
    }
}
