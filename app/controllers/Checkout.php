<?php

use App\Core\Controller;
use App\Core\DB;
use App\Core\Redirect;
use App\Core\Session;

class Checkout extends Controller
{

    protected $db;

    public function __construct()
    {
        App\Core\Authentication::auth('customer');
        $this->db = new DB;
    }

    public function index()
    {
        $data['judul'] = 'Checkout';


        //pengecekkan stok
        $keranjang =
            $this->db->select(
                'keranjang.id as k_id',
                'keranjang.kuantitas as k_qty',
                'produk.id as p_id',
                'produk.harga as p_harga',
                'produk.stok as p_stok',
            )
            ->from('keranjang')
            ->join('produk', 'keranjang.produk_id', '=', 'produk.id')
            ->where('keranjang.customer_id', '=', getUserId('customer'))
            ->get();

        foreach ($keranjang as $keranjang) {
            if ($keranjang['k_qty'] > $keranjang['p_stok']) {
                Session::setFlash('Kuantitas' . $keranjang['p_nama'] . 'melebihi batas, silahkan update Kembali keranjang Anda', 'warning');
                Redirect::back();
            }
        }

        $data['order'] = $this->db
            ->select(
                'produk.nama',
                'produk.harga',
                'keranjang.kuantitas as qty'
            )
            ->from('keranjang')
            ->join('produk', 'keranjang.produk_id', '=', 'produk.id')
            ->where('customer_id', '=', getUserId('customer'))
            ->get();
        if (!$data['order']) {
            Session::setFlash('Keranjang Anda Kosong!', 'warning');
            Redirect::to('keranjang');
        }
        $data['alamat'] = $this->db
            ->select('*')
            ->from('alamat')
            ->where('customer_id', '=', getUserId('customer'))
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
        // get data keranjang
        $keranjang =
            $this->db->select(
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
            ->where('keranjang.customer_id', '=', getUserId('customer'))
            ->get();



        //generate invoice
        $invoice = 'INV' . date('mYdihs');

        // update alamat
        $this->db->update('alamat', [
            'nama' => $_POST['c_nama'],
            'no_telp' => $_POST['c_no_telp'],
            'alamat' => $_POST['c_alamat']
        ], 'customer_id', '=', getUserId('customer'));

        // get alamat id
        $alamat_id = $this->db->select('id')->from('alamat')->where('customer_id', '=', getUserId('customer'))->first();
        $alamat_id = $alamat_id['id'];

        //total
        $total = 0;
        foreach ($keranjang as $k) {
            $total += $k['k_qty'] * $k['p_harga'];
        }

        // insert ke table order
        $insertToOrder = $this->db->insert('`order`', [
            'id' => null,
            'customer_id' => getUserId('customer'),
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
            'created_at' =>  currentTimeStamp(),
            'updated_at' =>  currentTimeStamp()
        ]);

        if ($insertToOrder) {
            // get order id
            $order_id = $this->db
                ->select('id')
                ->from('`order`')
                ->where('customer_id', '=', getUserId('customer'))
                ->orderBy('created_at', 'DESC')
                ->first()['id'];

            //insert to table order_detail
            foreach ($keranjang as $k) {
                $this->db->insert(
                    'order_detail',
                    [
                        'id' => null,
                        'order_id' => $order_id,
                        'produk_id' => $k['p_id'],
                        'kuantitas' => $k['k_qty'],
                        'harga_satuan' => $k['p_harga'],
                        'created_at' =>  currentTimeStamp(),
                        'updated_at' =>  currentTimeStamp()
                    ]
                );

                //kurangi stok
                $this->db->update('produk', [
                    'stok' => $k['p_stok'] - $k['k_qty']
                ], 'id', '=', $k['p_id']);
            }

            // hapus keranjang
            $this->db->delete('keranjang', 'customer_id', '=',  getUserId('customer'));
        }
        Redirect::to('transaksi/payment/' . $invoice);
    }
}
