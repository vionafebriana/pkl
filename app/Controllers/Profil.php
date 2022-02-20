<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\InfoPesertaModel;

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
        $infoModel = new InfoPesertaModel();
        $info = $infoModel->where('userId', $id)->first();
        if (isset($_POST['submit'])) {
            if (!$this->validate([
                'foto' => [
                    'uploaded[foto]',
                    'mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'max_size[foto,1024]',
                    'errors' => [
                        'uploaded' => 'Anda belum memilih foto',
                        'mime_in' => 'Format foto harus jpg/jpeg/png',
                        'max_size' => 'Ukuran maksimal foto 1MB'
                    ]
                ],
            ])) {
                return redirect()->to(base_url('Profil'))->withInput();
            }
            $avatar = $this->request->getFile('foto');
            $randomname = $avatar->getRandomName();
            $avatar->move(ROOTPATH . 'public/assets/fotoprofil/' . $id, $randomname);
            $profil = [
                'foto' => '/assets/fotoprofil/' . $id . '/' . $randomname
            ];
            $infoModel->update($info['id'], $profil);

            return redirect()->to(base_url('Profil'));
        }
        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('profil');
        echo view('templates/footer');
    }
}
