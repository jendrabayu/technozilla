<?php

use App\Core\Controller;
use App\Helpers\DB;
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


    public function cari()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uri = explode('?', $uri);
        $uri = end($uri);
        $uri = explode('=', $uri);
        $uri = end($uri);
        $uri = explode('+', $uri);
        $uri = implode(' ', $uri);
        $keyword = $uri;

        if ($keyword == null) {
            Redirect::to('produk');
        }

        $data['produk'] =  $this->db
            ->select(
                'produk.id as p_id',
                'produk.nama as p_nama',
                'produk.slug as p_slug',
                'produk.harga as p_harga',
                'produk.stok as p_stok',
                'produk.deskripsi as p_desk',
                'produk.gambar as p_gambar',
                'kategori.id as k_id',
                'kategori.nama as k_nama',
                'kategori.slug as k_slug',
                'merk.id as m_id',
                'merk.nama as m_nama',
                'merk.slug as m_slug'
            )
            ->from('produk')
            ->join('kategori', 'kategori.id', '=', 'produk.kategori_id')
            ->join('merk', 'produk.merk_id', '=', 'merk.id')
            ->like('produk.nama', $keyword)
            ->orLike('kategori.nama', $keyword)
            ->orLike('merk.nama', $keyword)
            ->get();

        $data['judul'] = sprintf("Pencarian untuk <i>%s</i> <small> %s hasil</small>", $keyword, count($data['produk']));
        $this->view('templates/header', $data);
        $this->view('produk', $data);
        $this->view('templates/footer');
    }
}
