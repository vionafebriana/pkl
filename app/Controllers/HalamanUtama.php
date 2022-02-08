<?php

namespace App\Controllers;

class HalamanUtama extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'HALAMAN UTAMA'
        ];


        echo view('templates/header', $data);
        echo view('halamanutama');
        echo view('templates/footer');
    }
}
