<?php

namespace App\Controllers;

use App\Models\UserModel;

class Admin extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $pesertaAktif = $userModel->where('role', 3)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('info_peserta.endDate>=', date('Y-m-d'))->countAllResults();
        $pesertaDeaktif = $userModel->where('role', 3)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('info_peserta.endDate<', date('Y-m-d'))->countAllResults();
        $pembimbing = $userModel->where('role', 2)->countAllResults();

        $data = [
            'judul' => 'BERANDA',
            'pesertaAktif' => $pesertaAktif,
            'pesertaDeaktif' => $pesertaDeaktif,
            'pembimbing' => $pembimbing
        ];


        echo view('templates/header', $data);
        echo view('templates/sidebarAdmin');
        echo view('templates/topbar');
        echo view('index/admin');
        echo view('templates/footer');
    }
}
