<?php

use App\Core\Controller;
use App\Helpers\Auth as Authentication;
use App\Helpers\DB;
use App\Helpers\Flash;
use App\Helpers\Redirect;
use App\Models\Order as OrderModel;

class Transaksi extends Controller
{

    protected $db;
    protected $orderModel;

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
        Authentication::auth('admin');
        $this->db = new DB;
        $this->orderModel = new OrderModel;
    }

    public function pesananbaru()
    {
        $data['judul'] = 'Belum Dibayar';
        $data['order'] = $this->orderModel->getAllOrderByStatus(1);
        $this->view('admin/templates/header', $data);
        $this->view('admin/transaksi/pesananbaru/index', $data);
        $this->view('admin/templates/footer');
    }

    public function perludicek()
    {
        $data['judul'] = 'Perlu Dicek';
        $data['order'] = $this->orderModel->getAllOrderByStatus(2);

        $this->view('admin/templates/header', $data);
        $this->view('admin/transaksi/perludicek/index', $data);
        $this->view('admin/templates/footer');
    }

    public function perludikirim()
    {
        $data['judul'] = 'Perlu Dikirim';
        $data['order'] = $this->orderModel->getAllOrderByStatus(3);
        $this->view('admin/templates/header', $data);
        $this->view('admin/transaksi/perludikirim/index', $data);
        $this->view('admin/templates/footer');
    }
    public function barangdikirim()
    {
        $data['judul'] = 'Barang Dikirim';
        $data['order'] = $this->orderModel->getAllOrderByStatus(4);
        $this->view('admin/templates/header', $data);
        $this->view('admin/transaksi/barangdikirim/index', $data);
        $this->view('admin/templates/footer');
    }

    public function selesai()
    {
        $data['judul'] = 'Pesanan Selesai';
        $data['order'] = $this->orderModel->getAllOrderByStatus(5);
        $this->view('admin/templates/header', $data);
        $this->view('admin/transaksi/selesai/index', $data);
        $this->view('admin/templates/footer');
    }

    public function pembatalan()
    {
        $data['judul'] = 'Pesanan Dibatalkan';
        $data['order'] = $this->orderModel->getAllOrderByStatus(6);
        $this->view('admin/templates/header', $data);
        $this->view('admin/transaksi/pembatalan/index', $data);
        $this->view('admin/templates/footer');
    }



    public function detail($invoice, $folder, $status)
    {
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
            ->where('order.invoice', '=', $invoice)
            ->andWhere('order.status_order_id', '=', $status)
            ->first();


        $data['produk'] =  $this->db
            ->select(
                'produk.nama as p_nama',
                'produk.harga as p_harga',
                'order_detail.kuantitas as od_qty'

            )
            ->from('`order`')
            ->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('produk', 'order_detail.produk_id', '=', 'produk.id')
            ->where('order.invoice', '=', $invoice)
            ->andWhere('order.status_order_id', '=', $status)
            ->groupBy('produk.id')
            ->get();

        $data['judul'] = 'Pesanan ' . $invoice;
        $this->view('admin/templates/header', $data);
        $this->view('admin/transaksi/' . $folder . '/detail', $data);
        $this->view('admin/templates/footer');
    }


    public function batal()
    {
        $invoice = $_POST['invoice'];
        $status = 1;

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
            ->where('order.invoice', '=', $invoice)
            ->andWhere('order.status_order_id', '=', $status)
            ->first();


        $data['produk'] =  $this->db
            ->select(
                'produk.nama as p_nama',
                'produk.harga as p_harga',
                'order_detail.kuantitas as od_qty'

            )
            ->from('`order`')
            ->join('order_detail', 'order.id', '=', 'order_detail.order_id')
            ->join('produk', 'order_detail.produk_id', '=', 'produk.id')
            ->where('order.invoice', '=', $invoice)
            ->andWhere('order.status_order_id', '=', $status)
            ->groupBy('produk.id')
            ->get();

        $data['judul'] = 'Pesanan ' . $invoice;
        $this->view('admin/templates/header', $data);
        $this->view('admin/transaksi/pembatalan', $data);
        $this->view('admin/templates/footer');
    }

    public function storepembatalan()
    {
        $alasan = $_POST['alasan'];
        $invoice = $_POST['invoice'];
        if ($this->db->update('`order`', [
            'status_order_id' => 6,
            'alasan_pembatalan' => $alasan
        ], 'invoice', '=', $invoice)) {
            Flash::setFlash("Pesanan Berhasil Dibatalkan", "primary");
            Redirect::to('admin/transaksi/pesananbaru');
        } else {

            Redirect::to('admin/transaksi/pesananbaru');
        }
    }


    public function updatepembayaran()
    {
        $invoice = $_POST['invoice'];
        if ($this->db->update('`order`', [
            'status_order_id' => 3,
        ], 'invoice', '=', $invoice)) {
            Flash::setFlash("Pembayaran Berhasil Dikonfirmasi", "primary");
            Redirect::to('admin/transaksi/perludicek');
        } else {

            Redirect::to('admin/transaksi/perludicek');
        }
    }



    public function updateresi()
    {
        $invoice = $_POST['invoice'];
        $kurir = $_POST['kurir'];
        $resi = $_POST['resi'];
        if ($this->db->update('`order`', [
            'status_order_id' => 4,
            'kurir' => $kurir,
            'nomor_resi' => $resi
        ], 'invoice', '=', $invoice)) {
            Flash::setFlash("Resi Berhasil Diinput", "primary");
            Redirect::to('admin/transaksi/perludikirim');
        } else {

            Redirect::to('admin/transaksi/perludikirim');
        }
    }

    public function updatebarangtiba()
    {
        $invoice = $_POST['invoice'];
        if ($this->db->update('`order`', [
            'status_order_id' => 5,
        ], 'invoice', '=', $invoice)) {
            Flash::setFlash("Pembayaran Berhasil Dikonfirmasi", "primary");
            Redirect::to('admin/transaksi/barangdikirim');
        } else {
            Redirect::to('admin/transaksi/barangdikirim');
        }
    }
}
