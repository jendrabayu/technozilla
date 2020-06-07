<?php

use App\Core\Controller;
use App\Helpers\Auth;
use App\Core\DB;
use App\Core\Redirect;
use App\Core\Session;

class Alamat extends Controller

{
    protected $db;

    public function __construct()
    {
        $this->db = new DB;
        Auth::auth('customer');
    }

    public function index()
    {
        $data['judul'] = 'Alamat';
        $data['alamat'] = $this->db
            ->select('*')
            ->from('alamat')
            ->where('customer_id', '=', Session::get('is_customer')['id'])
            ->first();
        $this->view('templates/header', $data);
        if ($data['alamat']) {
            $this->view('alamat/index', $data);
        } else {
            $this->view('alamat/edit', $data);
        }
        $this->view('templates/footer');
    }

    public function edit()
    {
        $data['judul'] = 'Edit Alamat';
        $data['alamat'] = $this->db
            ->select('*')
            ->from('alamat')
            ->where('customer_id', '=', Session::get('is_customer')['id'])
            ->first();
        $this->view('templates/header', $data);
        $this->view('alamat/edit', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        $this->db->insert('alamat', [
            'id' => '',
            'customer_id' => Session::get('is_customer')['id'],
            'nama' => $_POST['nama'],
            'no_telp' => $_POST['no_telp'],
            'alamat' => $_POST['alamat'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        Redirect::to('alamat');
    }

    public function update()
    {
        $this->db->update(
            'alamat',
            [
                'nama' => $_POST['nama'],
                'no_telp' => $_POST['no_telp'],
                'alamat' => $_POST['alamat'],
                'updated_at' => date('Y-m-d H:i:s')
            ],
            'customer_id',
            '=',
            Session::get('is_customer')['id']
        );
        Session::setFlash('Alamat berhasil di update', 'primary');
        Redirect::to('alamat');
    }
}
