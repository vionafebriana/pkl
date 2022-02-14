<?php

namespace App\Controllers;

use App\Models\AbsenModel;

class Absensi extends BaseController
{
    public function index()
    {
        $absenModel = new AbsenModel();
        $user = session()->id;
        $absen = $absenModel->where('user_id', $user)->get()->getResultArray();

        $data = [
            'judul' => 'ABSENSI',
            'absen' => $absen
        ];


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('absensi');
        echo view('templates/footer');
    }
}
