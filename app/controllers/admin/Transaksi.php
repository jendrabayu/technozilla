<?php

use App\Core\Controller;
use App\Core\DB;
use App\Core\Redirect;
use App\Core\Session;

class Transaksi extends Controller
{

    protected $db;

    /* status
        1. Belum Dibayar
        2. Perlu Dicek
        3. Sudah Dibayar
        4. Barang Dikirim
        5. Barang telah Tiba
        6. Pesanan Dibatalkan
    */

    public function __construct()
    {
        App\Core\Authentication::auth('admin');
        $this->db = new DB;
    }

    public function pesananbaru()
    {
        $data['judul'] = 'Pesanan Baru - Belum Dibayar';
        $data['order'] = $this->db
            ->select(
                'DATE(order.created_at) as o_date',
                'order.invoice as o_invoice',
                'order.subtotal as o_total',
                'order.status_order_id as o_status_id',
                'customer.nama as c_nama',
                'status_order.nama as s_nama'
            )
            ->from('`order`')
            ->join('customer', 'order.customer_id', '=', 'customer.id')
            ->join('status_order', 'order.status_order_id', '=', 'status_order.id')
            ->where('order.status_order_id', '=', 1)
            ->get();

        $data['status_id'] = 1;

        $this->view('admin/templates/header', $data);
        $this->view('admin/transaksi/index', $data);
        $this->view('admin/templates/footer');
    }

    public function perludicek()
    {
        $data['judul'] = 'Pembayaran Perlu Dicek';
        $data['order'] = $this->db
            ->select(
                'DATE(order.created_at) as o_date',
                'order.invoice as o_invoice',
                'order.subtotal as o_total',
                'order.bukti_transfer as o_bukti_transfer',
                'order.status_order_id as o_status_id',
                'customer.nama as c_nama',
                'status_order.nama as s_nama'
            )
            ->from('`order`')
            ->join('customer', 'order.customer_id', '=', 'customer.id')
            ->join('status_order', 'order.status_order_id', '=', 'status_order.id')
            ->where('order.status_order_id', '=', 2)
            ->get();

        $data['status_id'] = 2;

        $this->view('admin/templates/header', $data);
        $this->view('admin/transaksi/index', $data);
        $this->view('admin/templates/footer');
    }

    public function perludikirim()
    {
        $data['judul'] = 'Pesanan Perlu Dikirim';
        $data['order'] = $this->db
            ->select(
                'DATE(order.created_at) as o_date',
                'order.invoice as o_invoice',
                'order.subtotal as o_total',
                'order.status_order_id as o_status_id',
                'customer.nama as c_nama',
                'status_order.nama as s_nama'
            )
            ->from('`order`')
            ->join('customer', 'order.customer_id', '=', 'customer.id')
            ->join('status_order', 'order.status_order_id', '=', 'status_order.id')
            ->where('order.status_order_id', '=', 3)
            ->get();

        $data['status_id'] = 3;

        $this->view('admin/templates/header', $data);
        $this->view('admin/transaksi/index', $data);
        $this->view('admin/templates/footer');
    }
    public function barangdikirim()
    {
        $data['judul'] = 'Pesanan Sedang Dikirim';
        $data['order'] = $this->db
            ->select(
                'DATE(order.created_at) as o_date',
                'order.invoice as o_invoice',
                'order.subtotal as o_total',
                'order.status_order_id as o_status_id',
                'customer.nama as c_nama',
                'status_order.nama as s_nama'
            )
            ->from('`order`')
            ->join('customer', 'order.customer_id', '=', 'customer.id')
            ->join('status_order', 'order.status_order_id', '=', 'status_order.id')
            ->where('order.status_order_id', '=', 4)
            ->get();
        $data['status_id'] = 4;
        $this->view('admin/templates/header', $data);
        $this->view('admin/transaksi/index', $data);
        $this->view('admin/templates/footer');
    }

    public function selesai()
    {
        $data['judul'] = 'Pesanan Selesai - Pesanan Telah Tiba';
        $data['order'] = $this->db
            ->select(
                'DATE(order.created_at) as o_date',
                'order.invoice as o_invoice',
                'order.subtotal as o_total',
                'order.status_order_id as o_status_id',
                'customer.nama as c_nama',
                'status_order.nama as s_nama'
            )
            ->from('`order`')
            ->join('customer', 'order.customer_id', '=', 'customer.id')
            ->join('status_order', 'order.status_order_id', '=', 'status_order.id')
            ->where('order.status_order_id', '=', 5)
            ->get();

        $data['status_id'] = 5;
        $this->view('admin/templates/header', $data);
        $this->view('admin/transaksi/index', $data);
        $this->view('admin/templates/footer');
    }

    public function pembatalan()
    {
        $data['judul'] = 'Pesanan Dibatalkan';
        $data['order'] = $this->db
            ->select(
                'DATE(order.created_at) as o_date',
                'order.invoice as o_invoice',
                'order.subtotal as o_total',
                'order.status_order_id as o_status_id',
                'customer.nama as c_nama',
                'status_order.nama as s_nama'
            )
            ->from('`order`')
            ->join('customer', 'order.customer_id', '=', 'customer.id')
            ->join('status_order', 'order.status_order_id', '=', 'status_order.id')
            ->where('order.status_order_id', '=', 6)
            ->get();

        $data['status_id'] = 6;
        $this->view('admin/templates/header', $data);
        $this->view('admin/transaksi/index', $data);
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
                ['order.invoice', '=', $invoice]
            ])
            ->first();

        $data['produk'] =  $this->db
            ->select(
                'order.id as o_id',
                'order.invoice as o_invoice',
                'order.subtotal as o_total',
                'produk.harga as p_harga',
                'produk.nama as p_nama',
                'produk.gambar as p_gambar',
                'order_detail.kuantitas as od_qty',
                'order_detail.harga_satuan as od_harga'
            )
            ->from('`order`')
            ->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('produk', 'order_detail.produk_id', '=', 'produk.id')
            ->where('order.invoice', '=', $invoice)
            ->get();
      
        $this->view('admin/templates/header', $data);
        $this->view('admin/transaksi/detail', $data);
        $this->view('admin/templates/footer');
    }



    public function prosespembatalan($invoice)
    {
        $alasan = $_POST['alasan'];

        //tambahkan stok
        $produk = $this->db
            ->select('order_detail.produk_id', 'order_detail.kuantitas')
            ->from('`order`')
            ->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->where('order.invoice', '=', $invoice)
            ->get();

        if ($this->db->update('`order`', [
            'status_order_id' => 6,
            'alasan_pembatalan' => $alasan,
            'updated_at' =>  currentTimeStamp()
        ], 'invoice', '=', $invoice)) {
            Session::setFlash("Pesanan Berhasil Dibatalkan, Cek di halaman pembatalan", "primary");
            Redirect::back();
        } else {
            Session::setFlash("Pesanan Gagal Dibatalkan", "danger");
            Redirect::back();
        }
    }


    public function proseskonfirmasipembayaran($invoice)
    {
        if ($this->db->update('`order`', [
            'status_order_id' => 3,
            'updated_at' =>  currentTimeStamp()
        ], 'invoice', '=', $invoice)) {
            Session::setFlash("Pembayaran Berhasil Dikonfirmasi, Cek di halaman perlu dikirim", "primary");
            Redirect::back();
        } else {
            Redirect::back();
            Session::setFlash("Pembayaran Gagal Dikonfirmasi", "danger");
        }
    }




    public function prosesinputresi($invoice)
    {
        $kurir = $_POST['kurir'];
        $resi = $_POST['no_resi'];
        if ($this->db->update('`order`', [
            'status_order_id' => 4,
            'kurir' => $kurir,
            'nomor_resi' => $resi,
            'updated_at' =>  currentTimeStamp()
        ], 'invoice', '=', $invoice)) {
            Session::setFlash("No Resi Berhasil Diinput, Cek dihalaman barang dikirim", "primary");
            Redirect::back();
        } else {

            Session::setFlash("No Resi Gagal Diinput", "danger");
            Redirect::back();
        }
    }



    public function prosesselesai($invoice)
    {
        if ($this->db->update('`order`', [
            'status_order_id' => 5,
            'updated_at' => currentTimeStamp()
        ], 'invoice', '=', $invoice)) {
            Session::setFlash("Transaksi Selesai (Barang Telah Tiba), Cek dihalamn selesai", "primary");
            Redirect::back();
        } else {
            Session::setFlash("Transaksi Gagal Diupdate", "danger");
            Redirect::back();
        }
    }
}
