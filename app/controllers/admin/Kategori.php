<?php

use App\Core\Controller;
use App\Helpers\Auth as Authentication;
use App\Core\DB;
use App\Core\Session;
use App\Core\Redirect;


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
            'created_at' =>  currentTimeStamp(),
            'updated_at' =>  currentTimeStamp(),
            'deleted_at' => null
        ])) {
            Session::setFlash('Berhasil Menambahkan Kategori Baru', 'success');
        } else {
            Session::setFlash('Gagal Menambahkan Kategori Baru', 'danger');
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
            Session::setFlash('Kategori Berhasil Diupdate', 'success');
        } else {
            Session::setFlash('Kategori Gagal Diupdate', 'danger');
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
            Session::setFlash('Kategori Berhasil Dihapus', 'success');
        } else {
            Session::setFlash('Kategori Gagal Dihapus', 'danger');
        }
        Redirect::to('admin/kategori');
    }
}
