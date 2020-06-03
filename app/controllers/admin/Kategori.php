<?php

use App\Core\Controller;
use App\Helpers\Auth as Authentication;
use App\Helpers\DB;
use App\Helpers\Redirect;
use App\Helpers\Flash;

class Kategori extends Controller
{
    protected $db;

    public function __construct()
    {
        Authentication::auth('admin');
        $this->db = new DB;
    }

    public function index()
    {
        $data['judul'] = 'Kategori';
        $data['kategori'] = $this->db
            ->select('*')
            ->from('kategori')
            ->whereIsNull('deleted_at')
            ->get();
        $this->view('admin/templates/header', $data);
        $this->view('admin/kategori/index', $data);
        $this->view('admin/templates/footer');
    }

    public function create()
    {
        $data = ['judul' => 'Tambah Kategori'];
        $this->view('admin/templates/header', $data);
        $this->view('admin/kategori/tambah');
        $this->view('admin/templates/footer');
    }

    public function store()
    {
        if ($this->db->insert('kategori', [
            'id' => null,
            'nama' => $_POST['kategori'],
            'slug' => textToSlug($_POST['kategori']) . '' . date('yds'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at' => null
        ])) {
            Flash::setFlash('Berhasil Menambahkan Kategori Baru', 'success');
        } else {
            Flash::setFlash('Gagal Menambahkan Kategori Baru', 'danger');
        }
        Redirect::to('admin/kategori');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Kategori';
        $data['kategori'] = $this->db
            ->select('*')
            ->from('kategori')
            ->whereIsNull('deleted_at')
            ->andWhere('id', '=', $id)
            ->first();
        if ($data['kategori']) {
            $this->view('admin/templates/header', $data);
            $this->view('admin/kategori/edit', $data);
            $this->view('admin/templates/footer');
        } else {
            Redirect::to('admin/kategori');
        }
    }

    public function update($id)
    {
        if ($this->db->update('kategori', [
            'nama' => $_POST['kategori'],
            'slug' => textToSlug($_POST['kategori']) . '' . date('yds'),
            'updated_at' => date("Y-m-d h:i:s")
        ], 'id', '=', $id)) {
            Flash::setFlash('Kategori Berhasil Diupdate', 'success');
        } else {
            Flash::setFlash('Kategori Gagal Diupdate', 'danger');
        }
        Redirect::to('admin/kategori');
    }

    public function destroy()
    {
        if ($this->db->update(
            'kategori',
            ['deleted_at' => date("Y-m-d h:i:s")],
            'id',
            '=',
            $_POST['id']
        )) {
            Flash::setFlash('Kategori Berhasil Dihapus', 'success');
        } else {
            Flash::setFlash('Kategori Gagal Dihapus', 'danger');
        }
        Redirect::to('admin/kategori');
    }
}
