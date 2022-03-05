<?php

namespace App\Controllers;

use App\Models\AktivitasModel;

class AktivitasHarian extends BaseController
{
    public function index()
    {
        $aktivitasModel = new AktivitasModel();
        $user = session()->userId;
        $aktivitas = $aktivitasModel->where('userId', $user)->get()->getResultArray();

        $data = [
            'aktivitas' => $aktivitas
        ];


        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('aktivitasharian.php');
        echo view('templates/footer');
    }

    public function tambahAktivitas()
    {

        $user = session()->userId;
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
                return redirect()->to(base_url('AktivitasHarian/tambahAktivitas'))->withInput();
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
            return redirect()->to(base_url('AktivitasHarian'));
        }
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('tambahaktivitas');
        echo view('templates/footer');
    }

    public function editAktivitas($id)
    {
        $aktivitasModel = new AktivitasModel();
        $data = $aktivitasModel->find($id);
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
                return redirect()->to(base_url('AktivitasHarian/editAktivitas'))->withInput();
            }

            $aktivitas = [
                'date' => $this->request->getPost('date'),
                'mulai' => $this->request->getPost('mulai'),
                'selesai' => $this->request->getPost('selesai'),
                'keterangan' => $this->request->getPost('keterangan'),
                'status' => 0
            ];
            $aktivitasModel->update($id, $aktivitas);
            return redirect()->to(base_url('AktivitasHarian'));
        }
        echo view('templates/header', $data);
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('editaktivitas');
        echo view('templates/footer');
    }

    public function hapusAktivitas($id)
    {
        $aktivitasModel = new AktivitasModel();
        $aktivitasModel->where('id', $id)->delete();
        return redirect()->to(base_url('AktivitasHarian'));
    }
}
