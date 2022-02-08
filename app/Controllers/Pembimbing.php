<?php

namespace App\Controllers;

class Pembimbing extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Homepage'
        ];


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('index/pembimbing');
        echo view('templates/footer');
    }
}
