<?php

use App\Core\Controller;
use App\Core\DB;
use App\Core\Session;
use App\Models\Order as OrderModel;
use App\Helpers\Image;

class Transaksi extends Controller
{


    protected $db;
    protected $orderModel;

    public function __construct()
    {
        $this->db = new DB;
        $this->orderModel = new OrderModel;
    }

    public function index()
    {
        $data['one'] = $this->orderModel->getOrderByCustId(Session::get('is_customer')['id'], 1);
        $data['two'] = $this->orderModel->getOrderByCustId(Session::get('is_customer')['id'], 2);
        $data['three'] = $this->orderModel->getOrderByCustId(Session::get('is_customer')['id'], 3);
        $data['four'] = $this->orderModel->getOrderByCustId(Session::get('is_customer')['id'], 4);
        $data['five'] = $this->orderModel->getOrderByCustId(Session::get('is_customer')['id'], 5);
        $data['six'] = $this->orderModel->getOrderByCustId(Session::get('is_customer')['id'], 6);

        $data['judul'] = 'Transaksi';

        $this->view('templates/header', $data);
        $this->view('transaksi/index', $data);
        $this->view('templates/footer');
    }


    public function payment($invoice)
    {

        $data['judul'] = 'Pembayaran ' . $invoice;
        $data['order'] = $this->orderModel->getOrderByInvoice($invoice, 1)[0];

        $this->view('templates/header', $data);
        $this->view('transaksi/pembayaran', $data);
        $this->view('templates/footer');
    }

    public function uploadbuktitransfers($invoice)
    {
        $image = new Image;
        $bukti = $image->upload('bukti_transfer');
        if ($image) {
            $this->db->update('`order`', [
                'bukti_transfer' => $bukti,
                'status_order_id' => 2
            ], 'invoice', '=', $invoice);

            $data['judul'] = 'Terima Kasih';
            $this->view('templates/header', $data);
            $this->view('transaksi/thanks');
            $this->view('templates/footer');
        } else {
            Redirect::to('transaksi');
        }
    }
}
