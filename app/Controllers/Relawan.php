<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RelawanModel;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use App\Libraries\Vars;
use App\Models\UserModel;

class Relawan extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        // $session = session();

        $var = new Vars();
        $relawan = new RelawanModel();
        $outputRe=[];
        foreach ($relawan->findAll() as $re) {
            $nama = $var->dekripsi($re['Nama'], $this->request->getVar('kodeenkripsi'));
            $re['Nama']=$nama;
            $outputRe[]=$re;
        }
        return $this->respond($outputRe, 200);
    }
    public function tambah()
    {
        $relawan = new RelawanModel();
        $var = new Vars();
        $key = $this->request->getVar('kodeenkripsi');
        $data = [
            'Nama'  => $var->enkripsi($this->request->getVar('nama'), $key),
            'JenisKelamin'  => $this->request->getVar('jeniskelamin'),
            'Level' =>  $this->request->getVar('level')
        ];
        $relawan->save($data);
        $response = [
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'Data  berhasil ditambahkan.'
            ]
        ];
        return $this->respondCreated($response);
    }
}
