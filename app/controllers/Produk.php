<?php

use App\Core\Controller;
use App\Core\DB;
use App\Core\Redirect;

class Produk extends Controller
{
    protected $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    public function index()
    {
        $data['judul'] = 'Semua Produk';
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
            ->get();

        $this->view('templates/header', $data);
        $this->view('produk', $data);
        $this->view('templates/footer');
    }

    public function kategori($slug = null)
    {
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
            ->andWhere('kategori.slug', '=', $slug)
            ->get();

        if ($data['produk']) {
            $data['judul'] = 'Kategori ' . $data['produk'][0]['k_nama'];
            $this->view('templates/header', $data);
            $this->view('produk', $data);
            $this->view('templates/footer');
        } else {
            Redirect::error(404, 'customer');
        }
    }

    public function merk($slug = null)
    {
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
            ->andWhere('merk.slug', '=', $slug)
            ->get();

        if ($data['produk']) {
            $data['judul'] = 'Merk ' . $data['produk'][0]['m_nama'];
            $this->view('templates/header', $data);
            $this->view('produk', $data);
            $this->view('templates/footer');
        } else {
            Redirect::error(404, 'customer');
        }
    }


    public function cari()
    {
        $q = $_SERVER['REQUEST_URI'];
        $q = explode('?', $q);
        $q = end($q);
        $q = explode('=', $q);
        $q = end($q);

        if ($q) {
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
                ->whereIsNull('produk.deleted_at')
                ->andLike('produk.nama', $q)
                ->orWhereIsNull('produk.deleted_at')
                ->andLike('kategori.nama', $q)
                ->orWhereIsNull('produk.deleted_at')
                ->andLike('merk.nama', $q)
                ->get();

            if ($data['produk']) {
                $data['judul'] = sprintf("Pencarian untuk <i>%s</i> <small> %s hasil</small>", $q, count($data['produk']));
            } else {
                $data['judul'] = 'Produk Tidak Tersedia';
            }

            $this->view('templates/header', $data);
            $this->view('produk', $data);
            $this->view('templates/footer');
        }
    }
}
