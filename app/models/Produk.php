<?php

namespace App\Models;

use App\Core\DB;

class Produk
{

    protected $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    public function getAllProduk()
    {
        return $this->db->select(
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
    }

    public function getProdukBySlug($slug)
    {
        return $this->db->select(
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
    }

    public function getAllProdukByKategori($slug)
    {
        return $this->db->select(
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
    }

    public function getAllProdukByMerk($slug)
    {
        return $this->db->select(
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
    }
}
