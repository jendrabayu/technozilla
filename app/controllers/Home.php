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

                // produk terkait merk & kategori
                $data['produk_terkait'] =
                    $this->db->select(
                        'produk.nama',
                        'produk.harga',
                        'produk.slug',
                        'produk.gambar'
                    )
                    ->from('produk')
                    ->join('kategori', 'produk.kategori_id', '=', 'kategori.id')
                    ->join('merk', 'produk.merk_id', '=', 'merk.id')
                    ->whereIsNull('produk.deleted_at')
                    ->andWhere('kategori.nama', '=',   $data['produk']['k_nama'])
                    ->andWhere('merk.nama', '=',   $data['produk']['m_nama'])
                    ->get();

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
                ->orderBy('produk.created_at', 'DESC')
                ->limit(0, 6)
                ->get();
            $data['merk'] = $this->db->get('merk');

            // penjualan terbanyak bulan ini
            $data['produk_terlaris'] = $this->db
                ->select('produk.nama', 'produk.harga', 'produk.slug', 'produk.gambar', 'order_detail.produk_id', 'SUM(order_detail.kuantitas) as terjual')
                ->from('`order`')
                ->join('order_detail', 'order_detail.order_id', '=', 'order.id')
                ->join('produk', 'order_detail.produk_id', '=', 'produk.id')
                ->whereDate('MONTH(order.updated_at)', '=', 'MONTH(CURRENT_DATE())')
                ->andWhere('order.status_order_id', '=', 5)
                ->andWhereNull('produk.deleted_at')
                ->groupBy('order_detail.produk_id, produk.id')
                ->orderBy('SUM(order_detail.kuantitas)', 'DESC')
                ->limit(0, 6)
                ->get();

            $this->view('templates/header', $data);
            $this->view('home', $data);
            $this->view('templates/footer');
        }
    }
}
