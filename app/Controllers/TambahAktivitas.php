<?php

namespace App\Controllers;

use App\Models\AktivitasModel;

class TambahAktivitas extends BaseController
{
    public function index()
    {
        $user = session()->id;
        $data = [
            'judul' => 'Homepage'
        ];

        if (isset($_POST['submit'])) {
            if (!$this->validate([
                'date' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'tanggal harus diisi'
                    ]
                ],

                'mulai'    => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'Jam Mulai harus diisi'
                    ]
                ],
                'selesai' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'jam selesai harus diisi'
                    ]
                ],
                'keterangan' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => 'keterangan harus diisi'
                    ]
                ]

            ])) {
                return redirect()->to(base_url('TambahAktivitas'))->withInput();
            }

            $aktivitas = [
                'userId' => $user,
                'date' => $this->request->getPost('date'),
                'mulai' => $this->request->getPost('mulai'),
                'selesai' => $this->request->getPost('selesai'),
                'keterangan' => $this->request->getPost('keterangan'),
                'status' => 0
            ];
            $aktivitasModel = new AktivitasModel();
            $aktivitasModel->save($aktivitas);
        }
        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('tambahaktivitas');
        echo view('templates/footer');
    }
}
