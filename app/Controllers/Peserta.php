<?php

namespace App\Controllers;

use App\Models\AbsenModel;
use App\Models\UserModel;
use CodeIgniter\API\ResponseTrait;

class Peserta extends BaseController
{
    use ResponseTrait;

    public function __construct()
    {
        session();
    }

    public function index()
    {
        echo view('templates/header');
        echo view('templates/sidebar');
        echo view('templates/topbar');
        echo view('index/peserta');
        echo view('templates/footer');
    }

    public function addAbsen()
    {
        date_default_timezone_set('Asia/Jakarta');
        $dateNow = strtotime(date('Y-m-d'));
        $timeNow = strtotime(date('H:i:s'));

        $pagi = [strtotime('07:00:00'), strtotime('14:00:00')];
        $sore = [strtotime('16:00:00'), strtotime('16:30:00')];

        $user = session()->id;
        $absenModel = new AbsenModel();
        $absen = $absenModel->where('date', date('Y-m-d'))->where('user_id', $user)->get()->getRowArray();
        if ($timeNow > $pagi[0] && $timeNow < $pagi[1]) {
            if (!$absen) {
                $absenModel->insert([
                    'user_id' => $user,
                    'date' => date('Y-m-d'),
                    'datang' => date('H:i:s'),
                ]);
                return $this->respond([
                    'type' => 1,
                    'message' => 'absen pagi'
                ]);
            } else {
                return $this->respond([
                    'type' => 3,
                    'message' => 'sudah absen pagi'
                ]);
            }
        }

        if ($timeNow > $sore[0] && $timeNow < $sore[1]) {
            if ($absen) {
                if ($absen['pulang'] == '00:00:00') {
                    $absenModel->set('pulang', date('H:i:s'))->where('id', $absen['id'])->where('user_id', $user)->update();
                    return $this->respond([
                        'type' => 2,
                        'message' => 'absen sore'
                    ]);
                } else {
                    $absenModel->set('pulang', date('H:i:s'))->where('id', $absen['id'])->where('user_id', $user)->update();
                    return $this->respond([
                        'type' => 4,
                        'message' => 'anda sudah absen sore'
                    ]);
                }
            } else {
                $absenModel->insert([
                    'user_id' => $user,
                    'date' => date('Y-m-d'),
                    'pulang' => date('H:i:s'),
                ]);
                return $this->respond([
                    'type' => 2,
                    'message' => 'absen sore'
                ]);
            }
        }

        if (!$absen) {
            return $this->respond([
                'type' => 5,
                'message' => 'anda terlambat',
                $absen
            ]);
        } else {
            return $this->respond([
                'type' => 6,
                'message' => 'anda sudah absen hari ini'
            ]);
        }
    }

    public function getAbsen()
    {
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');
        $user = session()->userId;
        $absenModel = new AbsenModel();
        $respond = $absenModel->where('date', $date)->where('user_id', $user)->get()->getRowArray();
        if ($respond) {
            return $this->respond($respond);
        }
        return $this->respond([]);
    }
}
