<?php

namespace App\Controllers;

use App\Models\AktivitasModel;
use App\Models\UserModel;
use App\Models\AbsenModel;
use App\Models\InfoPesertaModel;
use CodeIgniter\API\ResponseTrait;
use Google\Service\AdExchangeBuyerII\Proposal;

class Pembimbing extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $userModel = new UserModel();
        $aktivitasModel = new AktivitasModel();

        $pesertaAktif = $userModel->where('role', 3)->where('status', 1)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('info_peserta.endDate>', date('Y-m-d'))->countAllResults();
        $pendaftar = $userModel->where('role', 3)->where('status', 0)->countAllResults();
        $belumsetuju = $aktivitasModel->select('aktivitas.id as acid, aktivitas.*,user.*')->join('user', 'aktivitas.userId=user.id')->where('aktivitas.status', 0)->countAllResults();
        $riwayat = $userModel->where('role', 3)->where('status', 1)->join('info_peserta', 'user.id=info_peserta.userId')->countAllResults();
        $daftar = $userModel->limit(10)->where('role', 3)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('status', 0)->get()->getResultArray();
        $aktivitas = $aktivitasModel->limit(10)->select('aktivitas.id as acid, aktivitas.*,user.*')->join('user', 'aktivitas.userId=user.id')->where('aktivitas.status', 0)->get()->getResultArray();
        $pesAktif = $userModel->where('role', 3)->where('status', 1)->join('info_peserta', 'user.id=info_peserta.userId')
            ->where('info_peserta.endDate>', date('Y-m-d'))->get()->getResultArray();;
        $peserta = $userModel->where('role', 3)->where('status', 1)->join('info_peserta', 'user.id=info_peserta.userId')->get()->getResultArray();;

        $data = [
            'pendaftar' => $pendaftar,
            'laporan' => $belumsetuju,
            'aktif' => $pesertaAktif,
            'riwayat' => $riwayat,
            'daftar' => $daftar,
            'aktivitas' => $aktivitas,
            'pesAktif' => $pesAktif,
            'peserta' => $peserta
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebarPembimbing');
        echo view('templates/topbar');
        echo view('pembimbing/pembimbing.php');
        echo view('templates/footer');
    }

    // Data peserta
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
        echo view('templates/sidebarPembimbing');
        echo view('templates/topbar');
        echo view('pembimbing/datapeserta.php');
        echo view('templates/footer');
    }

    public function terimaPeserta($id)
    {
        $userModel = new UserModel();
        $data = [
            'status' => 1
        ];
        $userModel->update($id, $data);
        return redirect()->to(base_url('Pembimbing/dataPeserta'));
    }

    public function hapusPeserta($id)
    {
        $userModel = new UserModel();
        $userModel->where('id', $id)->delete();
        return redirect()->to(base_url('Pembimbing/dataPeserta'));
    }

    public function terimaPesertaDash($id)
    {
        $userModel = new UserModel();
        $data = [
            'status' => 1
        ];
        $userModel->update($id, $data);
        return redirect()->to(base_url('Pembimbing'));
    }

    public function hapusPesertaDash($id)
    {
        $userModel = new UserModel();
        $userModel->where('id', $id)->delete();
        return redirect()->to(base_url('Pembimbing'));
    }

    public function detailPeserta($id)
    {
        $userModel = new UserModel();
        $user = $userModel->join('info_peserta', 'user.id=info_peserta.userId')->where('info_peserta.userId', $id)->first();
        $data = [
            'user' => $user
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebarPembimbing');
        echo view('templates/topbar');
        echo view('pembimbing/detailpeserta');
        echo view('templates/footer');
    }

    // Data Absensi
    public function dataAbsen()
    {
        $absenModel = new AbsenModel();
        $absen = $absenModel->select('absen.id as acid, absen.*,user.*')->join('user', 'absen.user_id=user.id')->get()->getResultArray();

        $data = [
            'absen' => $absen
        ];

        echo view('templates/header', $data);
        echo view('templates/sidebarPembimbing');
        echo view('templates/topbar');
        echo view('pembimbing/dataabsen.php');
        echo view('templates/footer');
    }

    public function detailAbsen($id)
    {
        $absenModel = new AbsenModel();
        $absen = $absenModel->where('id', $id)->first();
        $data = [
            'absen' => $absen
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebarPembimbing');
        echo view('templates/topbar');
        echo view('pembimbing/detailAbsen.php');
        echo view('templates/footer');
    }

    public function getAbsenKoordinat($id)
    {
        $absenModel = new AbsenModel();
        $respond = $absenModel->where('id', $id)->get()->getRowArray();
        if ($respond) {
            return $this->respond($respond);
        }
        return $this->respond([]);
    }
    // Data Laporan Aktivitas Harian
    public function dataAktivitas()
    {
        $aktivitasModel = new AktivitasModel();
        $setuju = $aktivitasModel->select('aktivitas.id as acid, aktivitas.*,user.*')->join('user', 'aktivitas.userId=user.id')->where('aktivitas.status', 1)->get()->getResultArray();
        $belumsetuju = $aktivitasModel->select('aktivitas.id as acid, aktivitas.*,user.*')->join('user', 'aktivitas.userId=user.id')->where('aktivitas.status', 0)->get()->getResultArray();

        $data = [
            'setuju' => $setuju,
            'belumsetuju' => $belumsetuju
        ];
        echo view('templates/header', $data);
        echo view('templates/sidebarPembimbing');
        echo view('templates/topbar');
        echo view('pembimbing/dataaktivitas.php');
        echo view('templates/footer');
    }

    public function terimaAktivitas($id)
    {
        $aktivitasModel = new AktivitasModel();
        $data = [
            'status' => 1
        ];
        $aktivitasModel->update($id, $data);
        return redirect()->to(base_url('Pembimbing/dataAktivitas'));
    }

    public function hapusAktivitas($id)
    {
        $aktivitasModel = new AktivitasModel();
        $data = [
            'status' => 3
        ];
        $aktivitasModel->update($id, $data);
        return redirect()->to(base_url('Pembimbing/dataAktivitas'));
    }
    public function terimaAktivitasDash($id)
    {
        $aktivitasModel = new AktivitasModel();
        $data = [
            'status' => 1
        ];
        $aktivitasModel->update($id, $data);
        return redirect()->to(base_url('Pembimbing'));
    }

    public function hapusAktivitasDash($id)
    {
        $aktivitasModel = new AktivitasModel();
        $data = [
            'status' => 3
        ];
        $aktivitasModel->update($id, $data);
        return redirect()->to(base_url('Pembimbing'));
    }

    // Buka file proposal
    public function bukaProposal($id)
    {
        $infoPeserta = new InfoPesertaModel();
        $file = $infoPeserta->where('id', $id)->get()->getRow();
        $data = [
            'link' => $file->proposal
        ];
        echo view('templates/header', $data);
        echo view('templates/topbar');
        echo view('templates/file.php');
        echo view('templates/footer');
    }

    // Buka file pengantar
    public function bukaPengantar($id)
    {
        $infoPeserta = new InfoPesertaModel();
        $file = $infoPeserta->where('id', $id)->get()->getRow();
        $data = [
            'link' => $file->pengantar
        ];
        echo view('templates/header', $data);
        echo view('templates/topbar');
        echo view('templates/file.php');
        echo view('templates/footer');
    }
}
