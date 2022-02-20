<?php

namespace App\Controllers;

use App\Models\AktivitasModel;

class Pembimbing extends BaseController
{
    public function index()
    {
        echo view('templates/header');
        echo view('templates/sidebarPembimbing');
        echo view('templates/topbar');
        echo view('index/pembimbing');
        echo view('templates/footer');
    }
}
