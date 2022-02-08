<?php

namespace App\Controllers;

class AktivitasHarian extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Homepage'
        ];


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('aktivitasharian.php');
        echo view('templates/footer');
    }
}
