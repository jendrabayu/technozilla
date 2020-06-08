<?php

use App\Core\Controller;
use App\Helpers\Auth as Authentication;
use App\Core\DB;
use App\Core\Session;
use App\Core\Redirect;
use App\Helpers\Flash;

class Merk extends Controller
{
    protected $db;

    public function __construct()
    {
        Authentication::auth('admin');
        $this->db = new DB;
    }

    public function index()
    {
        $data['judul'] = 'Merk';
        $data['merk']
            = $this->db
            ->select('*')
            ->from('merk')
            ->whereIsNull('deleted_at')
            ->get();
        $this->view('admin/templates/header', $data);
        $this->view('admin/merk/index', $data);
        $this->view('admin/templates/footer');
    }

    public function create()
    {
        $data = ['judul' => 'Tambah merk'];
        $this->view('admin/templates/header', $data);
        $this->view('admin/merk/tambah');
        $this->view('admin/templates/footer');
    }

    public function store()
    {
        if ($this->db->insert('merk', [
            'id' => null,
            'nama' => $_POST['merk'],
            'slug' => textToSlug($_POST['merk'] . '' . date('yds')),
            'created_at' =>  currentTimeStamp(),
            'updated_at' =>  currentTimeStamp(),
            'deleted_at' => null
        ])) {
            Session::setFlash('Berhasil Menambahkan Merk Baru', 'success');
        } else {
            Session::setFlash('Gagal Menambahkan Merk Baru', 'danger');
        }
        Redirect::to('admin/merk');
    }

    public function edit($id)
    {
        $data['judul'] = 'Tambah merk';
        $data['merk'] = $this->db
            ->select('*')
            ->from('merk')
            ->whereIsNull('deleted_at')
            ->andWhere('id', '=', $id)
            ->first();
        if ($data['merk']) {
            $this->view('admin/templates/header', $data);
            $this->view('admin/merk/edit', $data);
            $this->view('admin/templates/footer');
        } else {
            Redirect::to('admin/merk');
        }
    }

    public function update($id)
    {
        if ($this->db->update('merk', [
            'nama' => $_POST['merk'],
            'slug' => textToSlug($_POST['merk']) . '' . date('yds'),
            'updated_at' => date("Y-m-d h:i:s"),
        ], 'id', '=', $id)) {
            Session::setFlash('Merk Berhasil  Diupdate', 'success');
        } else {
            Session::setFlash('Merk Gagal Diupdate', 'danger');
        }
        Redirect::to('admin/merk');
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
            Session::setFlash('Merk Berhasil Dihapus', 'success');
        } else {
            Session::setFlash('Merk Gagal Dihapus', 'danger');
        }
        Redirect::to('admin/merk');
    }
}
