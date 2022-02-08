<?php

namespace App\Controllers;

use App\Models\UserModel;
use Google_Client;
use Google_Service;
use Google_Service_Oauth2;

class AuthGoogle extends BaseController
{
    public function __construct()
    {
        session();
    }

    public function index()
    {
        $client = new Google_Client();
        $clientId = '605482851070-6iieagmg60dcif8t5da14p9bof1ccr42.apps.googleusercontent.com';
        $clientSecret = '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';
        $redirectUri = base_url('AuthGoogle');

        $client->setClientId($clientId);
        $client->setClientSecret($clientSecret);
        $client->setRedirectUri($redirectUri);
        $client->addScope('profile');
        $client->addScope('email');

        if(isset($_GET['code'])){
            $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
            $client->setAccessToken($token['access_token']);
            $service = new Google_Service_Oauth2($client);
        }else{
            return redirect()->to($client->createAuthUrl());
        }
        $respond = [
            'name' => $service->userinfo->get()->getName(),
            'email' => $service->userinfo->get()->getEmail(),
            'regist' => true
        ];
        $userModel = new UserModel();
        $user = $userModel->where('email' , $respond['email'])->get()->getRowArray();
        if($user){
            if($user['status']==1){
                session()->set($user);
                session()->set('log',true);
                return redirect()->to(base_url(''));
            }
        }else{
            session()->set($respond);
            return redirect()->to(base_url('Registrasi'));
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('Home'));
    }
}