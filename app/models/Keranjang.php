<?php


namespace App\Models;

use App\Core\DB;

class Keranjang
{

    protected $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    public function getAllKeranjang()
    {
        return $this->db->select(
            'keranjang.id as k_id',
            'keranjang.kuantitas as k_qty',
            'produk.id as p_id',
            'produk.nama as p_nama',
            'produk.slug as p_slug',
            'produk.harga as p_harga',
            'produk.stok as p_stok',
            'produk.deskripsi as p_desk',
            'produk.gambar as p_gambar'
        )
            ->from('keranjang')
            ->join('produk', 'keranjang.produk_id', '=', 'produk.id')
            ->get();
    }

    public function getKeranjangByCustId($cust_id)
    {
        return $this->db->select(
            'keranjang.id as k_id',
            'keranjang.kuantitas as k_qty',
            'produk.id as p_id',
            'produk.nama as p_nama',
            'produk.slug as p_slug',
            'produk.harga as p_harga',
            'produk.stok as p_stok',
            'produk.deskripsi as p_desk',
            'produk.gambar as p_gambar'
        )
            ->from('keranjang')
            ->join('produk', 'keranjang.produk_id', '=', 'produk.id')
            ->where('keranjang.customer_id', '=', $cust_id)
            ->get();
    }
}
