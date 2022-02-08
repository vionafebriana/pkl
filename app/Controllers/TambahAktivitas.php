<?php

namespace App\Controllers;

class TambahAktivitas extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Homepage'
        ];


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('tambahaktivitas');
        echo view('templates/footer');
    }
}
