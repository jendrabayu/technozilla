<?php

use App\Core\Controller;
use App\Helpers\Auth;
use App\Core\DB;
use App\Helpers\Redirect;
use App\Core\Session;
use App\Models\Keranjang as KeranjangModel;

class Checkout extends Controller
{

    protected $db;
    protected $keranjangModel;


    public function __construct()
    {
        $this->db = new DB;
        $this->keranjangModel = new KeranjangModel;
        Auth::auth('customer');
    }

    public function index()
    {
        $data['judul'] = 'Checkout';
        $data['order'] = $this->db
            ->select(
                'produk.nama',
                'produk.harga',
                'keranjang.kuantitas as qty'
            )
            ->from('keranjang')
            ->join('produk', 'keranjang.produk_id', '=', 'produk.id')
            ->get();
        $data['alamat'] = $this->db
            ->select('*')
            ->from('alamat')
            ->where('customer_id', '=', Session::get('is_customer')['id'])
            ->first();
        $data['bank'] = $this->db
            ->select('*')
            ->from('rekening_bank')
            ->whereIsNull('deleted_at')
            ->get();

        $this->view('templates/header', $data);
        $this->view('checkout', $data);
        $this->view('templates/footer');
    }


    public function store()
    {


        $keranjang = $this->keranjangModel->getKeranjangByCustId(Session::get('is_customer')['id']);
        $invoice = 'INV' . date('mYdihs');

        // update alamat
        $this->db->update('alamat', [
            'nama' => $_POST['c_nama'],
            'no_telp' => $_POST['c_no_telp'],
            'alamat' => $_POST['c_alamat']
        ], 'customer_id', '=', Session::get('is_customer')['id']);

        // get alamat id
        $alamat_id = $this->db->select('id')->from('alamat')->where('customer_id', '=', Session::get('is_customer')['id'])->first()['id'];

        //total
        $total = 0;
        foreach ($keranjang as $k) {
            $total += $k['k_qty'] * $k['p_harga'];
        }


        // insert to order
        if ($this->db->insert('`order`', [
            'id' => null,
            'customer_id' => Session::get('is_customer')['id'],
            'rekening_bank_id' => $_POST['bank_id'],
            'alamat_id' => $alamat_id,
            'status_order_id' => 1,
            'alasan_pembatalan' => null,
            'invoice' => $invoice,
            'subtotal' => $total,
            'bukti_transfer' => null,
            'kurir' => null,
            'nomor_resi' => null,
            'pesan' => $_POST['o_pesan'],
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ])) {
            // get order id
            $order_id = $this->db
                ->select('id')
                ->from('`order`')
                ->where('customer_id', '=', Session::get('is_customer')['id'])
                ->orderBy('created_at', 'DESC')
                ->first()['id'];


            //insert to order_detail
            foreach ($keranjang as $k) {
                $this->db->insert(
                    'order_detail',
                    [
                        'id' => null,
                        'order_id' => $order_id,
                        'produk_id' => $k['p_id'],
                        'kuantitas' => $k['k_qty'],
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                    ]
                );

                //kurangi stok
                $this->db->update('produk', [
                    'stok' => $k['p_stok'] - $k['k_qty']
                ], 'id', '=', $k['p_id']);
            }

            // hapus keranjang
            $this->db->delete('keranjang', 'customer_id', '=', Session::get('is_customer')['id']);
        }
        Redirect::to('transaksi/payment/' . $invoice);
    }

    public function sukses()
    {

        $this->view('templates/header');
        $this->view('invoice');
        $this->view('templates/footer');
    }
}
