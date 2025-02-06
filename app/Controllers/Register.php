<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use App\Models\UserModel;

class Register extends BaseController
{
    use ResponseTrait;
 
    public function index()
    {
        $rules = [
            'username' => ['rules' => 'required|min_length[3]|max_length[255]'],
            'password' => ['rules' => 'required|min_length[3]|max_length[255]'],
            'confirm_password'  => [ 'label' => 'confirm password', 'rules' => 'matches[password]']
        ];
            
  
        if($this->validate($rules)){
            $model = new UserModel();
            $data = [
                'Username'    => $this->request->getVar('username'),
                'Password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT)
            ];
            $model->save($data);
             
            return $this->respond(['message' => 'Registered Successfully'], 200);
        }else{
            $response = [
                'errors' => $this->validator->getErrors(),
                'message' => 'Invalid Inputs'
            ];
            return $this->fail($response , 409);
             
        }
            
    }
}