<?php

namespace App\Controllers;

class Absensi extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Homepage'
        ];


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('absensi');
        echo view('templates/footer');
    }
}
