<?php

use App\Core\Controller;
use App\Core\DB;

class Rekap extends Controller
{

    protected $db;

    public function __construct()
    {
        App\Core\Authentication::auth('admin');
        $this->db = new DB;
    }

    public function index()
    {
        $data['rekap_harian'] =
            $this->db->select(
                'customer.nama as cust',
                'DATE(order.created_at) as tgl',
                'DATE(order.updated_at) as terkirim',
                'order.invoice as inv',
                'order.subtotal as total'
            )
            ->from('`order`')
            ->join('customer', 'order.customer_id', '=', 'customer.id')
            ->whereDate('DATE(order.updated_at)', '=', 'CURRENT_DATE()')
            ->andWhere('status_order_id', '=', 5)
            ->get();
        $data['rekap_bulanan'] =
            $this->db->select(
                'customer.nama as cust',
                'DATE(order.created_at) as tgl',
                'DATE(order.updated_at) as terkirim',
                'order.invoice as inv',
                'order.subtotal as total'
            )
            ->from('`order`')
            ->join('customer', 'order.customer_id', '=', 'customer.id')
            ->whereDate('MONTH(order.updated_at)', '=', 'MONTH(CURRENT_DATE())')
            ->andWhere('status_order_id', '=', 5)
            ->get();
        $data['rekap_tahunan'] =
            $this->db->select(
                'customer.nama as cust',
                'DATE(order.created_at) as tgl',
                'DATE(order.updated_at) as terkirim',
                'order.invoice as inv',
                'order.subtotal as total'
            )
            ->from('`order`')
            ->join('customer', 'order.customer_id', '=', 'customer.id')
            ->whereDate('YEAR(order.updated_at)', '=', 'YEAR(CURRENT_DATE())')
            ->andWhere('order.status_order_id', '=', 5)
            ->get();

        $data['rekap'] =
            $this->db->select(
                'customer.nama as cust',
                'DATE(order.created_at) as tgl',
                'DATE(order.updated_at) as terkirim',
                'order.invoice as inv',
                'order.subtotal as total'
            )
            ->from('`order`')
            ->join('customer', 'order.customer_id', '=', 'customer.id')
            ->where('status_order_id', '=', 5)
            ->get();;

        $data['judul'] = 'Rekap Data Penjualan';
        $this->view('admin/templates/header', $data);
        $this->view('admin/rekap/index', $data);
        $this->view('admin/templates/footer');
    }



    public function detail($invoice)
    {
        $data['judul'] = 'Order ' . $invoice;

        $data['order'] = $this->db
            ->select(
                'customer.nama as c_nama',
                'customer.email as c_email',
                'rekening_bank.nama as r_nama_bank',
                'rekening_bank.atas_nama as r_atas_nama',
                'rekening_bank.nomor as r_no_rekening',
                'alamat.nama as a_nama',
                'alamat.no_telp as a_no_telp',
                'alamat.alamat as a_alamat',
                'order.invoice as o_invoice',
                'order.alasan_pembatalan as o_alasan_pembatalan',
                'order.subtotal as o_total',
                'order.bukti_transfer as o_bukti_transfer',
                'order.kurir as o_kurir',
                'order.nomor_resi as o_no_resi',
                'order.pesan as o_pesan',
                'order.created_at as o_date',
                'order.status_order_id as o_status_id',
                'status_order.nama as s_nama'
            )
            ->from('`order`')
            ->join('rekening_bank', 'order.rekening_bank_id', '=', 'rekening_bank.id')
            ->join('customer', 'order.customer_id', '=', 'customer.id')
            ->join('alamat', 'customer.id', '=', 'alamat.customer_id')
            ->join('status_order', 'order.status_order_id', '=', 'status_order.id')
            ->where([
                ['order.invoice', '=', $invoice],
                ['order.status_order_id', '=', 5]
            ])
            ->first();

        $data['produk'] =  $this->db
            ->select(
                'produk.nama as p_nama',
                'produk.harga as p_harga',
                'order_detail.kuantitas as od_qty',
                'order_detail.harga_satuan as od_harga'

            )
            ->from('`order`')
            ->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('produk', 'order_detail.produk_id', '=', 'produk.id')
            ->where([
                ['order.invoice', '=', $invoice],
                ['order.status_order_id', '=', 5]
            ])
            ->groupBy('produk.id, order_detail.produk_id')
            ->get();
        $this->view('admin/templates/header', $data);
        $this->view('admin/rekap/detail', $data);
        $this->view('admin/templates/footer');
    }
}
