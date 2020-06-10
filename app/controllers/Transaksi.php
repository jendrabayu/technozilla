<?php

use App\Core\Controller;
use App\Core\DB;
use App\Core\Redirect;
use App\Helpers\Image;

class Transaksi extends Controller
{
    protected $db;

    public function __construct()
    {
        \App\Core\Authentication::auth('customer');
        $this->db = new DB;
    }

    public function index()
    {
        $data['judul'] = 'Transaksi';
        $data['one'] = $this->getOrderByCustId(getUserId('customer'), 1);
        $data['two'] = $this->getOrderByCustId(getUserId('customer'), 2);
        $data['three'] = $this->getOrderByCustId(getUserId('customer'), 3);
        $data['four'] = $this->getOrderByCustId(getUserId('customer'), 4);
        $data['five'] = $this->getOrderByCustId(getUserId('customer'), 5);
        $data['six'] = $this->getOrderByCustId(getUserId('customer'), 6);
        $this->view('templates/header', $data);
        $this->view('transaksi/index', $data);
        $this->view('templates/footer');
    }


    public function payment($invoice)
    {
        $data['judul'] = 'Pembayaran ' . $invoice;
        $data['order'] = $this->db
            ->select(
                'order.id as o_id',
                'order.invoice as o_invoice',
                'order.subtotal as o_total',
                'rekening_bank.nama as r_bank',
                'rekening_bank.nomor as r_norek'
            )
            ->from('`order`')
            ->join('rekening_bank', 'order.rekening_bank_id', '=', 'rekening_bank.id')
            ->where([
                ['order.invoice', '=', $invoice],
                ['order.status_order_id', '=', 1]
            ])
            ->first();

        if (!$data['order']) {
            Redirect::error(404, 'customer');
        }

        $this->view('templates/header', $data);
        $this->view('transaksi/pembayaran', $data);
        $this->view('templates/footer');
    }

    public function uploadbuktitransfers($invoice)
    {
        $image = new Image;
        $bukti = $image->upload('bukti_transfer');
        if ($image) {
            $this->db->update(
                '`order`',
                [
                    'bukti_transfer' => $bukti,
                    'status_order_id' => 2
                ],
                'invoice',
                '=',
                $invoice
            );
            $data['judul'] = 'Terima Kasih';
            $this->view('templates/header', $data);
            $this->view('transaksi/thanks');
            $this->view('templates/footer');
        } else {
            Redirect::to('transaksi');
        }
    }


    public function detail($invoice)
    {

        $data['order'] = $this->db
            ->select(
                'order.id as o_id',
                'order.invoice as o_invoice',
                'order.subtotal as o_total',
                'order.invoice as o_invoice',
                'order.bukti_transfer as o_bukti_transfer',
                'order.kurir as o_kurir',
                'order.nomor_resi as o_nomor_resi',
                'order.pesan as o_pesan',
                'order.status_order_id as o_status_id',
                'order.alasan_pembatalan as o_batal',
                'DATE(order.created_at ) as o_date',
                'status_order.nama as s_status',
                'alamat.nama as a_nama',
                'alamat.no_telp as a_no_telp',
                'alamat.alamat as a_alamat',
                'rekening_bank.nama as r_nama',
                'rekening_bank.atas_nama as r_atas_nama',
                'rekening_bank.nomor as r_nomor'

            )
            ->from('`order`')
            ->join('customer', 'order.customer_id', '=', 'customer.id')
            ->join('status_order', 'order.status_order_id', '=', 'status_order.id')
            ->join('alamat', 'customer.id', '=', 'alamat.customer_id')
            ->join('rekening_bank', 'order.rekening_bank_id', '=', 'rekening_bank.id')
            ->where([
                ['order.invoice', '=', $invoice],
                ['order.customer_id', '=', getUserId('customer')]
            ])
            ->first();

        if (!$data['order']) {
            Redirect::error(404, 'customer');
        }

        $data['produk'] = $this->db
            ->select('produk.nama as nama', 'order_detail.kuantitas as qty', 'order_detail.harga_satuan as harga')
            ->from('order_detail')
            ->join('produk', 'order_detail.produk_id', '=', 'produk.id')
            ->where('order_detail.order_id', '=', $data['order']['o_id'])
            ->get();

        $data['judul'] = 'Invoice ' . $data['order']['o_invoice'];
        $this->view('templates/header', $data);
        $this->view('transaksi/detail', $data);
        $this->view('templates/footer');
    }


    public function getOrderByCustId($id = null, $status = null)
    {
        if ($id == null && $status == null) {
            Redirect::error(404, 'customer');
        }
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
            ->where([
                ['order.customer_id', '=', $id],
                ['order.status_order_id', '=', $status]
            ])
            ->get();

        $order = $this->db
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
            ->where([['order.customer_id', '=', $id], ['order.status_order_id', '=', $status]])
            ->get();

        return [
            'detail' => $order_info,
            'order' => $order
        ];
    }
}
