<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\AbsenModel;

class Admin extends BaseController
{
    public function index()
    {
        $userModel = new UserModel();
        $pesertaAktif = $userModel->where('role', 3)->where('status', 1)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('info_peserta.endDate>', date('Y-m-d'))->countAllResults();
        $pesertaDeaktif = $userModel->where('role', 3)->where('status', 1)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('info_peserta.endDate<=', date('Y-m-d'))->countAllResults();
        $pendaftar = $userModel->where('role', 3)->where('status', 0)->countAllResults();
        $pembimbing = $userModel->where('role', 2)->countAllResults();

        $data = [
            'pesertaAktif' => $pesertaAktif,
            'pesertaDeaktif' => $pesertaDeaktif,
            'pembimbing' => $pembimbing,
            'pendaftar' => $pendaftar
        ];


        echo view('templates/header', $data);
        echo view('templates/sidebarAdmin');
        echo view('templates/topbar');
        echo view('index/admin');
        echo view('templates/footer');
    }

    // Master data pembimbing
    public function dataPembimbing()
    {
        $userModel = new UserModel();
        $detail = $userModel->where('role', 2)->get()->getResultArray();

        $data = [
            'detail' => $detail
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebarAdmin');
        echo view('templates/topbar');
        echo view('admin/datapembimbing.php');
        echo view('templates/footer');
    }

    public function tambahPembimbing()
    {
        $user = session()->id;
        if (isset($_POST['submit'])) {
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required', 'errors' => ['required' => 'nama harus diisi']
                ],
                'JK' => [
                    'rules' => 'required', 'errors' => ['required' => 'Jenis Kelamin harus diisi']
                ],
                'tglLahir' => [
                    'rules' => 'required', 'errors' => ['required' => 'tanggal lahir harus diisi']
                ],
                'email'    => [
                    'required', 'valid_email', 'errors' => ['required' => 'email harus diisi', 'valid_email' => 'email tidak valid']
                ]
            ])) {
                return redirect()->to(base_url('Admin/tambahPembimbing'))->withInput();
            }

            $data = [
                'nama' => $this->request->getPost('nama'),
                'jenisKelamin' => $this->request->getPost('JK'),
                'tglLahir' => $this->request->getPost('tglLahir'),
                'email' => $this->request->getPost('email'),
                'role' => 2,
                'status' => 1
            ];
            $userModel = new UserModel();
            $userModel->save($data);
            return redirect()->to(base_url('Admin/dataPembimbing'));
        }
        echo view('templates/header');
        echo view('templates/sidebarAdmin');
        echo view('templates/topbar');
        echo view('admin/tambahPembimbing');
        echo view('templates/footer');
    }

    public function editPembimbing($id)
    {
        $userModel = new UserModel();
        $data = $userModel->find($id);
        if (isset($_POST['submit'])) {
            if (!$this->validate([
                'nama' => [
                    'rules' => 'required', 'errors' => ['required' => 'nama harus diisi']
                ],
                'JK' => [
                    'rules' => 'required', 'errors' => ['required' => 'Jenis Kelamin harus diisi']
                ],
                'tglLahir' => [
                    'rules' => 'required', 'errors' => ['required' => 'tanggal lahir harus diisi']
                ],
                'email'    => [
                    'required', 'valid_email', 'errors' => ['required' => 'email harus diisi', 'valid_email' => 'email tidak valid']
                ]
            ])) {
                return redirect()->to(base_url('Admin/editPembimbing'))->withInput();
            }
            $data = [
                'nama' => $this->request->getPost('nama'),
                'jenisKelamin' => $this->request->getPost('JK'),
                'tglLahir' => $this->request->getPost('tglLahir'),
                'email' => $this->request->getPost('email'),
                'role' => 2,
                'status' => 1
            ];
            $userModel->update($id, $data);
            return redirect()->to(base_url('Admin/dataPembimbing'));
        }
        echo view('templates/header', $data);
        echo view('templates/sidebarAdmin');
        echo view('templates/topbar');
        echo view('admin/editpembimbing');
        echo view('templates/footer');
    }

    public function hapusPembimbing($id)
    {
        $userModel = new UserModel();
        $userModel->where('id', $id)->delete();
        return redirect()->to(base_url('Admin/dataPembimbing'));
    }

    // Master data peserta
    public function dataPeserta()
    {
        $userModel = new UserModel();
        $aktif = $userModel->where('role', 3)->where('status', 1)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('info_peserta.endDate>', date('Y-m-d'))->get()->getResultArray();
        $deaktif = $userModel->where('role', 3)->where('status', 1)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('info_peserta.endDate<=', date('Y-m-d'))->get()->getResultArray();
        $pendaftar = $userModel->where('role', 3)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('status', 0)->get()->getResultArray();

        $data = [
            'pendaftar' => $pendaftar,
            'aktif' => $aktif,
            'deaktif' => $deaktif,
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebarAdmin');
        echo view('templates/topbar');
        echo view('admin/datapeserta.php');
        echo view('templates/footer');
    }

    public function terimaPeserta($id)
    {
        $userModel = new UserModel();
        $data = [
            'status' => 1
        ];
        $userModel->update($id, $data);
        return redirect()->to(base_url('Admin/dataPeserta'));
    }

    public function hapusPeserta($id)
    {
        $userModel = new UserModel();
        $userModel->where('id', $id)->delete();
        return redirect()->to(base_url('Admin/dataPeserta'));
    }

    public function detailPeserta($id)
    {
        $userModel = new UserModel();
        $user = $userModel->join('info_peserta', 'user.id=info_peserta.userId')->where('info_peserta.userId', $id)->first();
        $data = [
            'user' => $user
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebarAdmin');
        echo view('templates/topbar');
        echo view('admin/detailpeserta');
        echo view('templates/footer');
    }

    // Data Absensi
    public function dataAbsen()
    {
        $absenModel = new AbsenModel();
        $absen = $absenModel->join('user', 'absen.user_id=user.id')->get()->getResultArray();

        $data = [
            'absen' => $absen
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebarAdmin');
        echo view('templates/topbar');
        echo view('admin/dataabsen');
        echo view('templates/footer');
    }
}
