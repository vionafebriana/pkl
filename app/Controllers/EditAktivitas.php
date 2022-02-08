<?php

namespace App\Controllers;

class EditAktivitas extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Homepage'
        ];


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('editaktivitas');
        echo view('templates/footer');
    }
}
