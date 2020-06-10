<?php

use App\Core\Controller;
use App\Core\DB;
use App\Core\Redirect;

class Home extends Controller
{
    protected $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    public function index($slug = null)
    {
        if ($slug) {
            $data['produk'] =
                $this->db->select(
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
                ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
                ->join('merk', 'produk.merk_id', '=', 'merk.id')
                ->whereIsNull('produk.deleted_at')
                ->andWhere('produk.slug', '=', $slug)
                ->first();

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
                Redirect::error(404, 'customer');
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
