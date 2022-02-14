<?php

namespace App\Controllers;

use App\Models\AktivitasModel;

class AktivitasHarian extends BaseController
{
    public function index()
    {
        $aktivitasModel = new AktivitasModel();
        $user = session()->id;
        $aktivitas = $aktivitasModel->where('userId', $user)->get()->getResultArray();

        $data = [
            'judul' => 'Homepage',
            'aktivitas' => $aktivitas
        ];


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('aktivitasharian.php');
        echo view('templates/footer');
    }
}
