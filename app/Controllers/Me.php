<?php

namespace App\Controllers;

use App\Libraries\Vars;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use Firebase\JWT\JWT;
use App\Helpers\JwtHelper;

class Me extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    use ResponseTrait;
    public function index()
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

            return $this->respond($data);
        } catch (\Throwable $th) {
            return $this->fail('Invalid Token');
        }
    }
}
