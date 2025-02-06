<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use App\Models\UserModel;

class Talent extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $db      = \Config\Database::connect();
        $sql = "SELECT *,YEAR(CURRENT_DATE())-lsb8_survey_751898.751898X1X506 AS umur from lsb8_survey_751898 
LEFT JOIN kab
ON kab.Kode=lsb8_survey_751898.751898X1X33
LEFT JOIN kec
ON kec.KodeKec=lsb8_survey_751898.751898X1X34
where submitdate is not NULL
ORDER BY lsb8_survey_751898.751898X1X38,lsb8_survey_751898.751898X1X3";
        $query = $db->query($sql, []);
        // print_r($query->getResultArray());

        // echo json_encode($query->getResultArray());
        return $this->respond($query->getResultArray(), 200);
    }
    public function ubahinisial()
    {
        $idtalent = $this->request->getVar('idtalent');
        $inisialawal = $this->request->getVar('inisialawal');
        $inisialrevisi = $this->request->getVar('inisialrevisi');
        // print_r($kab);
        $db      = \Config\Database::connect();
        $sql1 = "select * from inisial where idtalent =?";
        $query1 = $db->query($sql1, [$idtalent]);
        if ($query1->getNumRows() > 0) {
            $sql2 = "update  inisial set inisial=? where idtalent =?";
            $query1 = $db->query($sql2, [$inisialrevisi, $idtalent]);
        } else {
            $sql2 = "insert into inisial (inisial,idtalent) values (?,?)";
            $query1 = $db->query($sql2, [$inisialrevisi, $idtalent]);
        }
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data inisial berhasil diubah.'
            ]
        ];
        return $this->respond($response);
    }
    public function update()
    {
        $id = $this->request->getVar('id');
        $db      = \Config\Database::connect();
        $sql1 = "update  lsb8_survey_751898 set hide=? where id=?";
        $query1 = $db->query($sql1, [1, $id]);
        if ($db->affectedRows() > 0) {
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Status data berhasil di-hide.'
                ]
            ];
            // return $this->respond($response);
        } else {
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data gagal di-hide.'
                ]
            ];
            // return $this->respond($response);
        }
        // $response = [
        //     'status'   => 200,
        //     'error'    => null,
        //     'messages' => [
        //         'success' => 'Data sampel berhasil diubah.'
        //     ]
        // ];
        return $this->respond($response);
    }
    public function restore()
    {
        $id = $this->request->getVar('id');
        $db      = \Config\Database::connect();
        $sql1 = "update  lsb8_survey_751898 set hide=? where id=?";
        $query1 = $db->query($sql1, [null, $id]);
        if ($db->affectedRows() > 0) {
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Status data berhasil dikembalikan.'
                ]
            ];
            // return $this->respond($response);
        } else {
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'Data gagal di-kembalikan.'
                ]
            ];
            // return $this->respond($response);
        }
        // $response = [
        //     'status'   => 200,
        //     'error'    => null,
        //     'messages' => [
        //         'success' => 'Data sampel berhasil diubah.'
        //     ]
        // ];
        return $this->respond($response);
    }
    public function byproda()
    {
        $kab = $this->request->getVar('kodekab');
        $db      = \Config\Database::connect();
        $sql = "SELECT submitdate,lsb8_survey_751898.id,IFNULL(lsb8_survey_751898.751898X9X36,IFNULL(instansipusat.answer,'-')) AS tempatbekerja, kab.Kab AS kab_domisili, IFNULL( inisial.inisial,lsb8_survey_751898.751898X1X1) AS inisial_revisi,IFNULL( inisial.time,'-') AS waktu_perubahan, lsb8_survey_751898.751898X1X1,751898X9X6,751898X1X53, YEAR(CURRENT_DATE())-lsb8_survey_751898.751898X1X506 AS umur from lsb8_survey_751898 
LEFT JOIN kab
ON kab.Kode=lsb8_survey_751898.751898X1X33
LEFT JOIN kec
ON kec.KodeKec=lsb8_survey_751898.751898X1X34
LEFT JOIN inisial
ON inisial.idtalent=lsb8_survey_751898.id
LEFT JOIN (SELECT CODE,answer FROM lsb8_answers a left join lsb8_answer_l10ns b on a.aid=b.aid where a.qid=13) AS instansipusat
ON lsb8_survey_751898.751898X9X13=instansipusat.code
where submitdate is not NULL and 751898X1X38=? and hide is null
ORDER BY submitdate desc";
        $query = $db->query($sql, [$kab]);
        // print_r($query->getResultArray());

        // echo json_encode($query->getResultArray());
        return $this->respond($query->getResultArray(), 200);
    }
    public function byproda_hide()
    {
        $kab = $this->request->getVar('kodekab');
        $db      = \Config\Database::connect();
        $sql = "SELECT submitdate,lsb8_survey_751898.id,IFNULL(lsb8_survey_751898.751898X9X36,IFNULL(instansipusat.answer,'-')) AS tempatbekerja, kab.Kab AS kab_domisili, IFNULL( inisial.inisial,lsb8_survey_751898.751898X1X1) AS inisial_revisi,IFNULL( inisial.time,'-') AS waktu_perubahan, lsb8_survey_751898.751898X1X1,751898X9X6,751898X1X53, YEAR(CURRENT_DATE())-lsb8_survey_751898.751898X1X506 AS umur from lsb8_survey_751898 
LEFT JOIN kab
ON kab.Kode=lsb8_survey_751898.751898X1X33
LEFT JOIN kec
ON kec.KodeKec=lsb8_survey_751898.751898X1X34
LEFT JOIN inisial
ON inisial.idtalent=lsb8_survey_751898.id
LEFT JOIN (SELECT CODE,answer FROM lsb8_answers a left join lsb8_answer_l10ns b on a.aid=b.aid where a.qid=13) AS instansipusat
ON lsb8_survey_751898.751898X9X13=instansipusat.code
where submitdate is not NULL and 751898X1X38=? and hide=1
ORDER BY lsb8_survey_751898.751898X1X38,lsb8_survey_751898.751898X1X3";
        $query = $db->query($sql, [$kab]);
        // print_r($query->getResultArray());

        // echo json_encode($query->getResultArray());
        return $this->respond($query->getResultArray(), 200);
    }
}
