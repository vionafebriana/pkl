<?php

namespace App\Controllers;

use App\Models\InfoPesertaModel;
use App\Models\UserModel;

class Registrasi extends BaseController
{
    public function index()
    {
        if (!session()->regist) {
            return redirect()->to(base_url('Home'));
        }

        if (isset($_POST['submit'])) {
            // validasi pendaftaran    
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan nama lengkap Anda']
                ],
                'JK' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan jenis kelamin Anda']
                ],
                'tglLahir' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan tanggal lahir Anda']
                ],
                'email'    => 'required|valid_email',
                'instansi'    => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan asal instansi/sekolah Anda']
                ],
                'startDate' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan tanggal mulai magang']
                ],
                'endDate' => [
                    'rules' => 'required',
                    'errors' => ['required' => 'Masukkan tanggal selesai magang']
                ],
                'pengantar' => [
                    'uploaded[pengantar]',
                    'mime_in[pengantar,application/pdf,application/zip,application/msword,application/x-tar]',
                    'max_size[pengantar,10000]',
                    'errors' => [
                        'uploaded' => 'Anda belum memilih file',
                        'mime_in' => 'Format file harus berupa pdf',
                        'max_size' => 'Ukuran maksimal file 10MB'
                    ]
                ],
                'proposal' => [
                    'uploaded[proposal]',
                    'mime_in[proposal,application/pdf,application/zip,application/msword,application/x-tar]',
                    'max_size[proposal,10000]',
                    'errors' => [
                        'uploaded' => 'Anda belum memilih file',
                        'mime_in' => 'Format file harus berupa pdf',
                        'max_size' => 'Ukuran maksimal file 10MB'
                    ]
                ],
            ])) {
                return redirect()->to(base_url('Registrasi'))->withInput();
            }

            $user = [
                'nama' => $this->request->getPost('nama'),
                'jenisKelamin' => $this->request->getPost('JK'),
                'tglLahir' => $this->request->getPost('tglLahir'),
                'email' => $this->request->getPost('email'),
                'role' => 3,
                'status' => 0
            ];
            $userModel = new UserModel();
            $userModel->save($user);
            $user_id = $userModel->getInsertID();

            $pengantar = $this->request->getFile('pengantar');
            $proposal = $this->request->getFile('proposal');
            $nama_pengantar = $pengantar->getName();
            $nama_proposal = $proposal->getName();
            //Menyimpan file yang diupload kedalam file assets
            $pengantar->move('./assets/dokumen pengantar/' . $user_id, $nama_pengantar);
            $proposal->move('./assets/dokumen proposal/' . $user_id, $nama_proposal);
            $info_peserta = [
                'instansi' => $this->request->getPost('instansi'),
                'startDate' => $this->request->getPost('startDate'),
                'endDate' => $this->request->getPost('endDate'),
                'userId' => $user_id,
                'pengantar' => '/assets/dokumen pengantar/' . $user_id . '/' . $nama_pengantar,
                'proposal' => '/assets/dokumen proposal/' . $user_id . '/' . $nama_proposal
            ];

            $infoPesertaModel = new InfoPesertaModel();
            $infoPesertaModel->save($info_peserta);
            session()->setFlashdata('success', 'Sukses! Anda berhasil melakukan pendaftaran.');
            return redirect()->to(base_url('Home'));
        }
        echo view('templates/header');
        echo view('auth/registrasi');
    }
}
