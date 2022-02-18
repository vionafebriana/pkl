<?php

namespace App\Controllers;

use App\Models\UserModel;

class Profil extends BaseController
{
    public function index()
    {
        $id = session()->id;
        $userModel = new UserModel();
        $user = $userModel->join('info_peserta', 'user.id=info_peserta.userId')->where('info_peserta.userId', $id)->first();
        $data = [
            'user' => $user
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('profil');
        echo view('templates/footer');
    }
}
