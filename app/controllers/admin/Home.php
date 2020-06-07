<?php

use App\Core\Controller;
use App\Helpers\Auth as Authentication;
use App\Core\DB;

class Home extends Controller
{

    protected $db;
    public function __construct()
    {
        $this->db = new DB;
        Authentication::auth('admin');
    }

    public function index()
    {
        $data['customer'] = count($this->db->get('customer'));
        $data['perlu_dicek'] = count($this->db->select('*')->from('`order`')->where('status_order_id', '=', 1)->get());
        $data['perlu_dikirim'] = count($this->db->select('*')->from('`order`')->where('status_order_id', '=', 2)->get());

        $data['pendapatan'] = $this->db
            ->select('SUM(order_detail.kuantitas * produk.harga) as total')
            ->from('order_detail')
            ->join('produk', 'order_detail.produk_id', '=', 'produk.id')
            ->join('`order`', 'order_detail.order_id', '=', 'order.id')
            ->where('order.status_order_id', '=', 5)
            ->first()['total'];

        $data['judul'] = 'Dashboard';
        $this->view('admin/templates/header', $data);
        $this->view('admin/home', $data);
        $this->view('admin/templates/footer');
    }
}
