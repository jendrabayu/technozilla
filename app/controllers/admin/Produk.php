<?php

use App\Core\Controller;
use App\Helpers\Auth as Authentication;
use App\Core\DB;
use App\Core\Session;
use App\Helpers\Image;
use App\Helpers\Redirect;
use App\Models\Produk as ProdukModel;

class Produk extends Controller
{
    protected $db;
    protected $produkModel;

    public function __construct()
    {
        Authentication::auth('admin');
        $this->db = new DB;
        $this->produkModel = new ProdukModel;
    }

    public function index()
    {
        $data['judul'] = 'Produk';
        $data['produk'] = $this->produkModel->getAllProduk();
        $this->view('admin/templates/header', $data);
        $this->view('admin/produk/index', $data);
        $this->view('admin/templates/footer');
    }

    public function create()
    {
        $data['judul'] = 'Tambah Produk';
        $data['merk'] = $this->db->select('*')->from('merk')->whereIsNull('deleted_at')->get();
        $data['kategori'] = $this->db->select('*')->from('kategori')->whereIsNull('deleted_at')->get();
        $this->view('admin/templates/header', $data);
        $this->view('admin/produk/tambah', $data);
        $this->view('admin/templates/footer');
    }

    public function store()
    {
        $image = new Image();
        $gambar = $image->upload('gambar');
        if ($gambar) {
            $this->db->insert('produk', [
                'id' => null,
                'merk_id' => $_POST['merk'],
                'kategori_id' => $_POST['kategori'],
                'nama' => $_POST['nama'],
                'slug' => textToSlug($_POST['nama'] . date('sdy')),
                'harga' => $_POST['harga'],
                'stok' => $_POST['stok'],
                'deskripsi' => $_POST['deskripsi'],
                'gambar' => $gambar,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null
            ]);
        }

        Session::setFlash('Berhasil menambahkan produk baru', 'success');
        Redirect::to('admin/produk');
    }


    public function edit($slug)
    {
        $data['judul'] = 'Edit Produk';
        $data['produk'] = $this->produkModel->getProdukBySlug($slug);
        $data['merk'] = $this->db->select('*')->from('merk')->whereIsNull('deleted_at')->get();
        $data['kategori'] = $this->db->select('*')->from('kategori')->whereIsNull('deleted_at')->get();

        $this->view('admin/templates/header', $data);
        $this->view('admin/produk/edit', $data);
        $this->view('admin/templates/footer');
    }

    public function update($id)
    {
        $image = new Image;
        $gambarLama = $this->db
            ->select('gambar')
            ->from('produk')
            ->where('id', '=', $id)
            ->first()['gambar'];
        $gambarBaru = $image->upload('p_gambar');
        $gambar = '';
        if ($gambarBaru != false && $gambarBaru != null) {
            $gambar = $gambarBaru;
            unlink('images/' . $gambarLama);
        } else {
            $gambar = $gambarLama;
        }

        $this->db->update('produk', [
            'merk_id' => $_POST['m_id'],
            'kategori_id' => $_POST['k_id'],
            'nama' => $_POST['p_nama'],
            'slug' => textToSlug($_POST['p_nama'] . date('sdy')),
            'harga' => $_POST['p_harga'],
            'stok' => $_POST['p_stok'],
            'deskripsi' => $_POST['deskripsi'],
            'gambar' => $gambar,
            'updated_at' => date('Y-m-d H:i:s')
        ], 'id', '=', $id);

        Session::setFlash('Produk berhasil di update', 'success');
        Redirect::to('admin/produk');
    }


    public function destroy()
    {
        if ($this->db->update(
            'produk',
            ['deleted_at' => date('Y-m-d H:i:s')],
            'id',
            '=',
            $_POST['id']
        )) {
            $gambar = $this->db
                ->select('gambar')
                ->from('produk')
                ->where('id', '=', $_POST['id'])
                ->first();
            unlink('images/' . $gambar['gambar']);
            Session::setFlash('Produk Berhasil Dihapus', 'success');
        } else {
            Session::setFlash('Produk Gagal Dihapus', 'danger');
        }
        Redirect::to('admin/produk');
    }
}
