<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use App\Models\UserModel;

class Users extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $users = new UserModel();
        return $this->respond($users->findAll(), 200);
    }
}
