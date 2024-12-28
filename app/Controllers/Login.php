<?php

namespace App\Controllers;
// namespace App\Helpers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use App\Models\UserModel;
use App\Libraries\Vars;
use App\Helpers\JwtHelper;

class Login extends BaseController
{
    use ResponseTrait;
    // const SECRET_KEY = 'prodablora@bangkit';
    // const CIPHERING = 'AES-128-CTR';
    // const ENCRYPTION_IV='192837465';
    public function index()
    {
        $userModel = new UserModel();
        $varsLib = new Vars();
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        $user = $userModel->where('Username', $username)->first();

        if (is_null($user)) {
            return $this->respond(['error' => 'Invalid username .'], 401);
        }

        $pwd_verify = password_verify($password, $user['Password']);

        if (!$pwd_verify) {
            return $this->respond(['error' => 'Invalid username or password.'], 401);
        }

        // Buat objek jwt
        // helper('JwtHelper');
        $jwt = new JwtHelper();
        $jwt->SetAlgoHash('HS256');
        $jwt->SetPrivateKey($varsLib::SEC_KEY);

        $response = array(
            "code" => 401,
            "message" => "Not Allowed!",
            "token" => null,
            "status" => false
        );

        $session = session();

        $session->set($user);

        // semua data $_POST akan dimasukan kedalam token
        $token = $jwt->BuatToken($_POST); // proses membuat token
        $response["code"] = 200;
        $response["message"] = "Ok";
        $response["token"] = $token;
        $response["status"] = true;

        return $this->respond($response);
    }
}
