<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RelawanModel;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use App\Models\UserModel;

class Relawan extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $relawan = new RelawanModel();
        return $this->respond($relawan->findAll(), 200);
    }
    public function tambah()
    {
        $relawan = new RelawanModel();
        return $this->respond($relawan->findAll(), 200);
    }
}
