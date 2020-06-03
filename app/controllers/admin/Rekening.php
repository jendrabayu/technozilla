<?php

use App\Core\Controller;
use App\Helpers\Auth as Authentication;
use App\Helpers\DB;
use App\Helpers\Redirect;
use App\Helpers\Flash;

class Rekening extends Controller
{

    protected $db;

    public function __construct()
    {
        Authentication::auth('admin');
        $this->db = new DB;
    }

    public function index()
    {
        $data['judul'] = 'Rekening Bank';
        $data['rekening'] = $this->db
            ->select('*')
            ->from('rekening_bank')
            ->whereIsNull('deleted_at')
            ->get();
        $this->view('admin/templates/header', $data);
        $this->view('admin/rekening/index', $data);
        $this->view('admin/templates/footer');
    }

    public function create()
    {
        $data['judul'] = 'Tambah Rekening Bank';
        $this->view('admin/templates/header', $data);
        $this->view('admin/rekening/tambah');
        $this->view('admin/templates/footer');
    }

    public function store()
    {
        $this->db->insert('rekening_bank', [
            'id' => null,
            'nama' => $_POST['nama_bank'],
            'atas_nama' => $_POST['atas_nama'],
            'nomor' => $_POST['no_rekening'],
            'slug' => textToSlug($_POST['no_rekening'] . '' . date('yds')),
            'created_at' => date("Y-m-d h:i:sa"),
            'updated_at' => date("Y-m-d h:i:sa"),
            'deleted_at' => null
        ]);
        Flash::setFlash('Berhasil menambahkan rekening bank baru', 'success');
        Redirect::to('admin/rekening');
    }

    public function edit($slug)
    {
        $data['judul'] = 'Edit Rekening Bank';
        $data['rekening'] = $this->db
            ->select('*')
            ->from('rekening_bank')
            ->whereIsNull('deleted_at')
            ->andWhere('slug', '=', $slug)
            ->first();
        $this->view('admin/templates/header', $data);
        $this->view('admin/rekening/edit', $data);
        $this->view('admin/templates/footer');
    }

    public function update($id)
    {
        $this->db->update('rekening_bank', [
            'nama' => $_POST['nama_bank'],
            'atas_nama' => $_POST['atas_nama'],
            'nomor' => $_POST['no_rekening'],
            'slug' => textToSlug($_POST['no_rekening'] . '' . date('yds')),
            'updated_at' => date('Y-m-d H:i:s')
        ], 'id', '=', $id);
        Flash::setFlash('Rekening bank berhasil diupdate', 'success');
        Redirect::to('admin/rekening');
    }

    public function destroy()
    {
        $this->db->update('rekening_bank', ['deleted_at' => date("Y-m-d h:i:sa")], 'id', '=', $_POST['id']);
        Flash::setFlash('Rekening bank berhasil dihapus', 'success');
        Redirect::to('admin/rekening');
    }
}
