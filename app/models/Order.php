<?php

namespace App\Models;

use App\Core\DB;

class Order
{


    protected $db;


    public function __construct()
    {
        $this->db = new DB;
    }


    public function getOrderByCustId($id, $status)
    {
        $order_info = $this->db
            ->select(
                'order.id as o_id',
                'order.invoice as o_invoice',
                'order.subtotal as o_total',
                'order.alasan_pembatalan as o_alasan_pembatalan',
                'order.kurir as o_kurir',
                'order.nomor_resi as o_no_resi',
                'rekening_bank.nama as r_bank',
                'rekening_bank.nomor as r_norek',
                'status_order.nama as s_nama'
            )
            ->from('`order`')
            ->join('rekening_bank', 'order.rekening_bank_id', '=', 'rekening_bank.id')
            ->join('status_order', 'order.status_order_id', '=', 'status_order.id')
            ->where('order.customer_id', '=', $id)
            ->andWhere('order.status_order_id', '=', $status)
            ->get();

        $order = $this->db
            ->select(
                'order.id as o_id',
                'order.invoice as o_invoice',
                'order.subtotal as o_total',
                'produk.harga as p_harga',
                'produk.nama as p_nama',
                'produk.gambar as p_gambar',
                'order_detail.kuantitas as od_qty'
            )
            ->from('`order`')
            ->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('produk', 'order_detail.produk_id', '=', 'produk.id')
            ->where('order.customer_id', '=', $id)
            ->andWhere('order.status_order_id', '=', $status)
            ->get();

        return [
            'detail' => $order_info,
            'order' => $order
        ];
    }

    public function getOrder($id, $status)
    {

        return $this->db
            ->select(
                'order.id as o_id',
                'order.invoice as o_invoice',
                'order.subtotal as o_total',
                'produk.nama as p_nama',
                'produk.gambar as p_gambar',
                'order_detail.kuantitas as od_qty'
            )
            ->from('`order`')
            ->where('order.customer_id', '=', $id)
            ->get();
    }
    public function getOrderByInvoice($invoice, $status)
    {

        return $this->db
            ->select(
                'order.id as o_id',
                'order.invoice as o_invoice',
                'order.subtotal as o_total',
                'rekening_bank.nama as r_bank',
                'rekening_bank.nomor as r_norek'
            )
            ->from('`order`')
            ->join('rekening_bank', 'order.rekening_bank_id', '=', 'rekening_bank.id')
            ->where('order.invoice', '=', $invoice)
            ->andWhere('order.status_order_id', '=', $status)
            ->get();
    }


    public function getAllOrderByStatus($status)
    {
        return $this->db
            ->select(
                'order.id as o_id',
                'order.invoice as o_invoice',
                'order.subtotal as o_total',
                'order.bukti_transfer as o_bukti',
                'order.status_order_id as o_status_id',
                'produk.harga as p_harga',
                'produk.nama as p_nama',
                'produk.gambar as p_gambar',
                'order_detail.kuantitas as od_qty',
                'customer.nama as c_nama',
                'status_order.nama as s_nama'
            )
            ->from('`order`')
            ->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('produk', 'order_detail.produk_id', '=', 'produk.id')
            ->join('customer', 'order.customer_id', '=', 'customer.id')
            ->join('status_order', 'order.status_order_id', '=', 'status_order.id')
            ->where('order.status_order_id', '=', $status)
            ->groupBy('order.invoice')
            ->get();
    }
}
