<?php

namespace App\Controllers;
use App\Helpers\JwtHelper;
use App\Libraries\Vars;
use App\Models\KabModel;
use Firebase\JWT\JWT;

use CodeIgniter\API\ResponseTrait;

class Home extends BaseController
{
    public $arr = ['judul' => null];
    use ResponseTrait;
    public function index()
    {
        
        $session = session();


        if (!$session->get('Username')) {
            header("Location: " . base_url() . "/login");
            die();
        } else {
            header("Location: " . base_url() . "/dashboard");
            die();
        }
    }
    public function token()
    {
        $varsLib = new Vars();
        $header = $this->request->getServer('HTTP_AUTHORIZATION');
        if (!$header) return $this->failUnauthorized('Token Required');

        // echo $header;
        try {

            $jwt = new JwtHelper();
            $jwt->SetAlgoHash('HS256');
            $jwt->SetPrivateKey($varsLib::SEC_KEY);


            $data = $jwt->BacaToken($header);

            return $data;
        } catch (\Throwable $th) {
            return $this->fail('Invalid Token');
        }
    }
    public function login()
    {
        $session = session();
        if ($session->get('Username')) {
            header("Location: " . base_url() . "/dashboard");
            die();
        }
        return view('login');
    }
    public function main()
    {
        $session = session();


        if (!$session->get('Username')) {
            header("Location: " . base_url() . "/login");
            die();
        } 

        return view('main');
    }
    public function dashboard()
    {
        $this->arr['judul'] = "DASHBOARD";
        $this->arr['caption'] = "A good dashboard to display your statistics";
        return view('main', $this->arr);
    }
    public function relawan()
    {
        $this->arr['judul'] = "RELAWAN";
        $this->arr['caption'] = "Mengelola Data Relawan";
        return view('main', $this->arr);
    }
    public function lihat()
    {
        $kabMo=new KabModel();
        $listKab = $kabMo->orderBy('Kab', 'ASC')->findAll();

        $this->arr['judul'] = "LIHAT DATA";
        $this->arr['caption'] = "Lihat Data Masuk";
        $this->arr['kab'] = $listKab;
        return view('main', $this->arr);
    }
    public function unduh()
    {
        $this->arr['judul'] = "UNDUH DATA";
        $this->arr['caption'] = "Unduh Data";
        return view('main', $this->arr);
    }
    public function user()
    {
        $this->arr['judul'] = "USER";
        $this->arr['caption'] = "Mengelola Data User Sistem";
        return view('main', $this->arr);
    }
    public function logout()
    {
        $session = session();
        // $array_items = ['username', 'password'];
        // $session->remove('Username');
        // $session->remove('Password');
        $session->destroy();

        header("Location: ".base_url()."/login");
        die();
    }
}
