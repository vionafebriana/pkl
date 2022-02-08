<?php

namespace App\Controllers;

class Login extends BaseController
{
    public function index()
    {
        $data = [
            'judul' => 'Homepage'
        ];


        echo view('templates/header', $data);
        echo view('auth/login');
    }
}
