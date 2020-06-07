<?php

use App\Core\Controller;

class Kontak extends Controller
{

    public function index()
    {
        $data['judul'] = 'Kontak';
        $this->view('templates/header', $data);
        $this->view('kontak',);
        $this->view('templates/footer');
    }
}
