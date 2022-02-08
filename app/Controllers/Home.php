<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    use ResponseTrait;
    public function index()
    {
        $userModel = new UserModel();
        $user = $userModel->join('info_peserta', 'user.id=info_peserta.userId')->where('info_peserta.endDate>', date('Y-m-d'))->get()->getResultArray();
        $now = date('Y-m-d');
        foreach ($user as $index => $u) {
            $user[$index]['sisaHari'] = (strtotime($u['endDate']) - strtotime($now)) / 86400;
        }

        $data = [
            'judul' => 'HALAMAN UTAMA',
            'user' => $user
        ];

        echo view('templates/header', $data);
        echo view('halamanutama');
        echo view('templates/footer');
    }

    public function getJumlahTerisi()
    {
        $userModel = new UserModel();
        $user = $userModel->join('info_peserta', 'user.id=info_peserta.userId')->where('info_peserta.endDate>', date('Y-m-d'))->countAllResults();
        //kirim ke js
        return $this->respond($user);
    }
}
