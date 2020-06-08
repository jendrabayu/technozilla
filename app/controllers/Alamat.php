<?php

use App\Core\Controller;
use App\Core\DB;
use App\Core\Redirect;
use App\Core\Session;

class Alamat extends Controller

{
    protected $db;

    public function __construct()
    {
        App\Core\Authentication::auth('customer');
        $this->db = new DB;
    }

    public function index()
    {

        $data['judul'] = 'Alamat';
        $data['alamat'] = $this->db
            ->select('*')
            ->from('alamat')
            ->where('customer_id', '=', getUserId('customer'))
            ->first();

        $this->view('templates/header', $data);
        $data['alamat'] ? $this->view('alamat/index', $data) : $this->view('alamat/edit', $data);
        $this->view('templates/footer');
    }

    public function edit()
    {
        $data['judul'] = 'Edit Alamat';
        $data['alamat'] = $this->db
            ->select('*')
            ->from('alamat')
            ->where('customer_id', '=', getUserId('customer'))
            ->first();

        $this->view('templates/header', $data);
        $this->view('alamat/edit', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        $this->db->insert('alamat', [
            'id' => null,
            'customer_id' => getUserId('customer'),
            'nama' => $_POST['nama'],
            'no_telp' => $_POST['no_telp'],
            'alamat' => $_POST['alamat'],
            'created_at' => currentTimeStamp(),
            'updated_at' => currentTimeStamp()
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
                'updated_at' =>  currentTimeStamp()
            ],
            'customer_id',
            '=',
            Session::get('is_customer')['id']
        );
        Session::setFlash('Alamat berhasil di update', 'primary');
        Redirect::to('alamat');
    }
}
