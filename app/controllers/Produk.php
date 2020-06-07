<?php

use App\Core\Controller;
use App\Core\DB;
use App\Helpers\Redirect;
use App\Models\Produk as ProdukModel;

class Produk extends Controller
{
    protected $db;
    protected $produkModel;

    public function __construct()
    {
        $this->db = new DB;
        $this->produkModel = new ProdukModel;
    }

    public function index()
    {

        $data['judul'] = 'Semua Produk';
        $data['produk'] = $this->produkModel->getAllProduk();
        $this->view('templates/header', $data);
        $this->view('produk', $data);
        $this->view('templates/footer');
    }

    public function kategori($slug = null)
    {
        $data['produk'] = $this->produkModel->getAllProdukByKategori($slug);
        if ($data['produk']) {
            $data['judul'] = 'Kategori ' . $data['produk'][0]['k_nama'];
            $this->view('templates/header', $data);
            $this->view('produk', $data);
            $this->view('templates/footer');
        } else {
            Redirect::to('produk');
        }
    }

    public function merk($slug = null)
    {
        $data['produk'] = $this->produkModel->getAllProdukByMerk($slug);
        if ($data['produk']) {
            $data['judul'] = 'Merk ' . $data['produk'][0]['m_nama'];
            $this->view('templates/header', $data);
            $this->view('produk', $data);
            $this->view('templates/footer');
        } else {
            Redirect::to('produk');
        }
    }
}
