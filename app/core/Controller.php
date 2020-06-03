<?php

namespace App\Core;

class Controller
{
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    public function error($code)
    {
        $data['judul'] = 'Error ' . $code;
        $this->view('templates/header', $data);
        $this->view('errors/' . $code);
        $this->view('templates/footer');
        die;
    }
}
