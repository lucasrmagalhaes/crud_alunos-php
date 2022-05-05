<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home',
            'text' => 'Sistema feito em PHP com CodeIgniter e Bootstrap.',
            'link' => 'Acessar'
        ];

        echo view('templates/header', $data);
        echo view('pages/home');
        echo view('templates/footer');
    }
}
