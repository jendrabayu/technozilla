<?php

use App\Core\Controller;
use App\Helpers\Auth as Authentication;
use App\Helpers\DB;
use App\Helpers\Redirect;
use App\Helpers\Flash;

class Brand extends Controller
{
    protected $db;

    public function __construct()
    {
        Authentication::auth('admin');
        $this->db = new DB;
    }

    public function index()
    {
        $data['judul'] = 'Brand';
        $data['brand']
            = $this->db
            ->select('*')
            ->from('merk')
            ->whereIsNull('deleted_at')
            ->get();
        $this->view('admin/templates/header', $data);
        $this->view('admin/brand/index', $data);
        $this->view('admin/templates/footer');
    }

    public function create()
    {
        $data = ['judul' => 'Tambah Brand'];
        $this->view('admin/templates/header', $data);
        $this->view('admin/brand/tambah');
        $this->view('admin/templates/footer');
    }

    public function store()
    {
        if ($this->db->insert('merk', [
            'id' => null,
            'nama' => $_POST['nama_brand'],
            'slug' => textToSlug($_POST['nama_brand'] . '' . date('yds')),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at' => null
        ])) {
            Flash::setFlash('Berhasil Menambahkan Merk Baru', 'success');
        } else {
            Flash::setFlash('Gagal Menambahkan Merk Baru', 'danger');
        }
        Redirect::to('admin/brand');
    }

    public function edit($id)
    {
        $data['judul'] = 'Tambah Brand';
        $data['brand'] = $this->db
            ->select('*')
            ->from('merk')
            ->whereIsNull('deleted_at')
            ->andWhere('id', '=', $id)
            ->first();
        if ($data['brand']) {
            $this->view('admin/templates/header', $data);
            $this->view('admin/brand/edit', $data);
            $this->view('admin/templates/footer');
        } else {
            Redirect::to('admin/brand');
        }
    }

    public function update($id)
    {
        if ($this->db->update('merk', [
            'nama' => $_POST['nama_brand'],
            'slug' => textToSlug($_POST['nama_brand']) . '' . date('yds'),
            'updated_at' => date("Y-m-d h:i:s"),
        ], 'id', '=', $id)) {
            Flash::setFlash('Merk Gagal Diupdate', 'success');
        } else {
            Flash::setFlash('Merk Berhasil Diupdate', 'danger');
        }
        Redirect::to('admin/brand');
    }

    public function destroy()
    {
        if ($this->db->update(
            'merk',
            ['deleted_at' => date("Y-m-d h:i:s")],
            'id',
            '=',
            $_POST['id']
        )) {
            Flash::setFlash('Merk Berhasil Dihapus', 'success');
        } else {
            Flash::setFlash('Merk Gagal Dihapus', 'danger');
        }
        Redirect::to('admin/brand');
    }
}
