<?php

namespace App\Controllers;

class Peserta extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Homepage'
        ];


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('index/peserta');
        echo view('templates/footer');
    }
}
