<?php

use App\Core\Controller;
use App\Helpers\DB;
use App\Helpers\Redirect;
use App\Models\Produk as  ProdukModel;

class Home extends Controller
{

    protected $db;
    protected $produkModel;

    public function __construct()
    {
        $this->db = new DB;
        $this->produkModel = new ProdukModel;
    }


    public function index($slug = null)
    {
        if ($slug) {
            try {
                $data['produk'] = $this->produkModel->getProdukBySlug($slug);
                if ($data['produk']) {
                    $data['foto'] = $this->db
                        ->select('nama')
                        ->from('gambar_produk')
                        ->where('produk_id', '=', $data['produk']['p_id'])
                        ->get();
                    $data['judul'] = $data['produk']['p_nama'];
                    $this->view('templates/header', $data);
                    $this->view('detail_produk', $data);
                    $this->view('templates/footer');
                } else {
                    $this->error('404');
                }
            } catch (\Throwable $th) {
                $this->error('404');
            }
        } else {
            $data['judul'] = 'Home';
            $data['produk_baru'] = $this->db
                ->select('produk.nama', 'produk.harga', 'produk.slug', 'produk.gambar', 'merk.nama as brand')
                ->from('produk')
                ->join('merk', 'merk.id', '=', ' produk.merk_id')
                ->whereIsNull('produk.deleted_at')
                ->orderBy('produk.created_at')
                ->limit(0, 6)
                ->get();
            $this->view('templates/header', $data);
            $this->view('home', $data);
            $this->view('templates/footer');
        }
    }
}
