<?php

namespace App\Filters;

use App\Helpers\JwtHelper;
use App\Libraries\Vars;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Config\Services;

use CodeIgniter\API\ResponseTrait;

class Auth implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    use ResponseTrait;
    public function before(RequestInterface $request, $arguments = null)
    {
        $varsLib = new Vars();
        $jwt = new JwtHelper();
     
        $header = $request->getServer('HTTP_AUTHORIZATION');
        if (!$header) return Services::response()
            ->setJSON(['msg' => 'Token Required'])
            ->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        // $token = explode(' ', $header)[1];

        try {
            echo $header;
            // Buat objek jwt
            $jwt = new JwtHelper();
            $jwt->SetAlgoHash('HS256');
            $jwt->SetPrivateKey($varsLib::SEC_KEY);

          
            $data = $jwt->BacaToken($header);

            return $this->respond($data);
        } catch (\Throwable $th) {
            return Services::response()
                ->setJSON(['msg' => 'Invalid Token ini'])
                ->setStatusCode(ResponseInterface::HTTP_UNAUTHORIZED);
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
