<?php

use App\Core\Controller;
use App\Core\DB;
use App\Core\Redirect;
use App\Core\Session;

class Keranjang extends Controller
{

    protected $db;

    public function __construct()
    {
        $this->db = new DB;
    }

    public function index()
    {
        if (getUserId('customer')) {
            $data['produk'] = $this->db
                ->select(
                    'keranjang.produk_id',
                    'produk.gambar',
                    'produk.nama',
                    'produk.harga',
                    'produk.stok',
                    'keranjang.id',
                    'keranjang.customer_id',
                    'keranjang.kuantitas as qty'
                )
                ->from('keranjang')
                ->join('produk', 'keranjang.produk_id', '=', 'produk.id')
                ->where('keranjang.customer_id', '=', getUserId('customer'))
                ->get();
        } else {
            if (Session::get('is_keranjang')) {
                $keranjang = Session::get('is_keranjang');
                foreach ($keranjang as $key => $value) {
                    $produk = $this->db
                        ->select('*')
                        ->from('produk')
                        ->where('id', '=', $value['produk_id'])
                        ->first();

                    $keranjang[$key] = array_merge($keranjang[$key], $produk);
                }
                $data['produk'] = $keranjang;
            } else {
                $data['produk'] = [];
            }
        }
        $data['judul'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('keranjang', $data);
        $this->view('templates/footer');
    }

    public function store()
    {

        if (getUserId('customer')) {
            $qty = $this->db
                ->select('stok')
                ->from('produk')
                ->where('id', '=', $_POST['produk_id'])
                ->first();

            // jika add to cart produk yang sama
            $produk_sama = $this->db
                ->select('produk_id', 'kuantitas')
                ->from('keranjang')
                ->where([
                    ['produk_id', '=', $_POST['produk_id']],
                    ['customer_id', '=', getUserId('customer')]
                ])
                ->first();

            if ($_POST['kuantitas'] + $produk_sama['kuantitas'] > $qty['stok']) {
                Session::setFlash('Gagal Menambahkan produk, Kuantitas melebihi stok yang tersedia!', 'danger');
                Redirect::back();
            } else {
                if ($produk_sama) {
                    $qty_awal = $this->db
                        ->select('kuantitas')
                        ->from('keranjang')
                        ->where([
                            ['produk_id', '=', $_POST['produk_id']],
                            ['customer_id', '=', $_SESSION['is_customer']['id']]
                        ])
                        ->first();
                    $qty_awal = $qty_awal['kuantitas'];

                    $this->db->update(
                        'keranjang',
                        ['kuantitas' => $qty_awal + $_POST['kuantitas']],
                        'produk_id',
                        '=',
                        $_POST['produk_id']
                    );
                    Redirect::to('keranjang');
                } else {
                    $this->db->insert('keranjang', [
                        'id' => null,
                        'customer_id' => getUserId('customer'),
                        'produk_id' => $_POST['produk_id'],
                        'kuantitas' => $_POST['kuantitas'],
                        'created_at' =>  currentTimeStamp(),
                        'updated_at' =>  currentTimeStamp()
                    ]);
                    Redirect::to('keranjang');
                }
            }
        } else {

            // store keranjang ke session
            $keranjang[] =
                [
                    'produk_id' => $_POST['produk_id'],
                    'qty' => $_POST['kuantitas']
                ];
            $keranjangInSession = Session::get('is_keranjang');
            if ($keranjangInSession) {
                $qty = 0;
                foreach ($keranjangInSession as $key => $value) {
                    if ($value['produk_id'] == $keranjang[0]['produk_id']) {
                        $stok = $this->db
                            ->select('stok')
                            ->from('produk')
                            ->where('id', '=', $value['produk_id'])
                            ->first();

                        $qty =  $value['qty'];
                        if ($qty +  $keranjang[0]['qty'] > $stok['stok']) {
                            Session::setFlash('Gagal Menambahkan produk, Kuantitas melebihi stok yang tersedia!', 'danger');
                            Redirect::back();
                        }
                        unset($keranjangInSession[$key]);
                    }
                }
                $keranjang[0]['qty'] += $qty;
                $keranjang = array_merge($keranjang, $keranjangInSession);
            }

            Session::remove('is_keranjang');
            Session::set(['is_keranjang' => $keranjang]);
            Redirect::to('keranjang');
        }
    }


    public function destroy($id)
    {
        if (getUserId('customer')) {
            if ($this->db->delete('keranjang', 'id', '=', $id)) {
                Session::setFlash('Produk Berhasil Dihapus');
                Redirect::back();
            }
        } else {
            $keranjang = Session::get('is_keranjang');
            foreach ($keranjang as $key => $value) {
                if ($value['produk_id'] == $id) {
                    unset($keranjang[$key]);
                }
            }
            Session::remove('is_keranjang');
            Session::set(['is_keranjang' => $keranjang]);
            Session::setFlash('Produk Berhasil Dihapus');
            Redirect::back();
        }
        Session::setFlash('Produk Gagal Dihapus');
        Redirect::back();
    }

    public function update()
    {
        if (empty($_POST)) {
            Session::setFlash('Keranjang Anda Kosong', 'warning');
            Redirect::back();
        }


        if (getUserId('customer')) {
            $produkId = $_POST['produk_id'];
            $keranjangId = $_POST['id'];
            $qty = $_POST['qty'];


            // ambil stok dari produk
            $stoks = [];
            for ($i = 0; $i < count($produkId); $i++) {
                array_push($stoks, $this->db
                    ->select('stok')
                    ->from('produk')
                    ->where('id', '=', $produkId[$i])
                    ->first()['stok']);
            }

            // pengecekkan stok
            for ($i = 0; $i < count($stoks); $i++) {
                if ($stoks[$i] < $_POST['qty'][$i]) {
                    Session::setFlash('Keranjang gagal diupdate, Kuantitas melebihi stok yang tersedia!', 'danger');
                    Redirect::back();
                }
            }

            //update keranjang
            for ($i = 0; $i < count($keranjangId); $i++) {
                $this->db->update(
                    'keranjang',
                    ['kuantitas' => $qty[$i]],
                    'id',
                    '=',
                    $keranjangId[$i]
                );
            }

            Session::setFlash('Keranjang berhasil diupdate', 'primary');
            Redirect::back();
        } else {

            // update keranjang di session
            $qty = $_POST['qty'];
            $keranjang = Session::get('is_keranjang');
            foreach ($keranjang as $key => $value) {
                $stok = $this->db
                    ->select('stok')
                    ->from('produk')
                    ->where('id', '=', $value['produk_id'])
                    ->first();
                if ($qty[$key] > $stok['stok']) {
                    Session::setFlash('Gagal menambahkan produk, Kuantitas melebihi stok yang tersedia!', 'danger');
                    Redirect::back();
                } else {
                    $keranjang[$key]['qty'] = $qty[$key];
                }
            }

            Session::remove('is_keranjang');
            Session::set(['is_keranjang' => $keranjang]);
            Session::setFlash('Keranjang berhasil diupdate', 'primary');
            Redirect::back();
        }
    }
}
