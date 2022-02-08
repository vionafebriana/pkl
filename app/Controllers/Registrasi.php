<?php

namespace App\Controllers;

use App\Models\InfoPesertaModel;
use App\Models\UserModel;

class Registrasi extends BaseController
{
    public function index()
    {
        if(!session()->regist){
            return redirect()->to(base_url('Home'));
        }
        $data = [
            'judul' => 'PENDAFTARAN PKL'
        ];

        if (isset($_POST['submit'])) {

            if (! $this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'nama harus diisi'
                    ]
                ],
                'JK' => 'required',
                'tglLahir' => 'required',
                'email'    => 'required|valid_email',
                'password' => 'required',
                'rePassword' => 'required',
                'instansi'    => 'required',
                'startDate' => 'required',
                'endDate' => 'required',
                'pengantar' => 'uploaded[pengantar]',
                'proposal' => 'uploaded[proposal]',
            ])) {
                return redirect()->to(base_url('Registrasi'))->withInput();
            }

            $user = [
                'nama' => $this->request->getPost('nama'),
                'jenisKelamin' => $this->request->getPost('JK'),
                'tglLahir' => $this->request->getPost('tglLahir'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'role' => 3,
                'status' => 1
            ];
            $userModel = new UserModel();
            $userModel->save($user);
            $user_id = $userModel->getInsertID();

            $pengantar = $this->request->getFile('pengantar');
            $proposal = $this->request->getFile('proposal');
            $nama_pengantar = $pengantar->getName();
            $nama_proposal = $proposal->getName();

            $info_peserta = [
                'instansi' => $this->request->getPost('instansi'),
                'startDate' => $this->request->getPost('startDate'),
                'endDate' => $this->request->getPost('endDate'),
                'userId' => $user_id,
                'pengantar' => $nama_pengantar,
                'proposal' => $nama_proposal
            ];
            
            //Menyimpan file yang diupload kedalam file assets
            $pengantar->move('./assets/dokumen pengantar/', $nama_pengantar);
            $proposal->move('./assets/dokumen proposal/', $nama_proposal);

            $infoPesertaModel = new InfoPesertaModel();
            $infoPesertaModel->save($info_peserta);
            session()->destroy();
            return redirect()->to(base_url('Home'));
        }
        echo view('templates/header', $data);
        echo view('auth/registrasi');
    }
}
