<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Libraries\Vars;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use App\Models\UserModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
// use App\Controllers\Ex

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
        $session=session();
        $kab = $this->request->getVar('kodekab');
        $varEn = new Vars();
        $search = $this->request->getVar('search');
        $db      = \Config\Database::connect();
        $sql = "SELECT submitdate,lsb8_survey_751898.id,IFNULL(lsb8_survey_751898.751898X9X36,IFNULL(instansipusat.answer,'-')) AS tempatbekerja, kab.Kab AS kab_domisili, IFNULL( inisial.inisial,lsb8_survey_751898.751898X1X1) AS inisial_revisi,inisial_enkripsi.NamaTerenkripsi, IFNULL( inisial.time,'-') AS waktu_perubahan, lsb8_survey_751898.751898X1X1,751898X9X6,751898X1X53, YEAR(CURRENT_DATE())-lsb8_survey_751898.751898X1X506 AS umur from lsb8_survey_751898 
LEFT JOIN kab
ON kab.Kode=lsb8_survey_751898.751898X1X33
LEFT JOIN kec
ON kec.KodeKec=lsb8_survey_751898.751898X1X34
LEFT JOIN inisial
ON inisial.idtalent=lsb8_survey_751898.id
LEFT JOIN (SELECT CODE,answer FROM lsb8_answers a left join lsb8_answer_l10ns b on a.aid=b.aid where a.qid=13) AS instansipusat
ON lsb8_survey_751898.751898X9X13=instansipusat.code
LEFT JOIN inisial_enkripsi
ON inisial_enkripsi.KodeKab=751898X1X38
AND (inisial_enkripsi.Inisial=lsb8_survey_751898.751898X1X1 OR inisial_enkripsi.Inisial=inisial.inisial)
where submitdate is not NULL and 751898X1X38=? and hide is null and (inisial.inisial like '%" . $search . "%' or lsb8_survey_751898.751898X1X1 like '%" . $search . "%')
ORDER BY submitdate desc";


        $query = $db->query($sql, [$kab]);
        $dtk = [];
        foreach ($query->getResultArray() as $dt) {
            $dt['NamaAsli']=substr($varEn->dekripsi($dt['NamaTerenkripsi'],$session->get('Kode_enkripsi')),0,4)."******";
            $dtk[]=$dt;
        }
        return $this->respond( $dtk, 200);
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
    public function prosesinisial()
    {
        $db      = \Config\Database::connect();

        $varEn = new Vars();
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("C:\Users\Syamsofa\prodablora\inisialgab.xlsx");
        $worksheet = $spreadsheet->getActiveSheet();
        $dataArray = $worksheet->toArray();
        foreach ($dataArray as $row) {
            // echo "baris <br>";
            $kolom = 1;
            $dataPerBaris = [];
            foreach ($row as $cellValue) {

                // echo $kolom;
                if ($kolom == 3) {
                    $namaTerenkripsi = $varEn->enkripsi($cellValue, 'merahputih2023');
                    $dataPerBaris[] = $namaTerenkripsi;
                }


                // echo $cellValue;
                $kolom++;

                $dataPerBaris[] = $cellValue;
            }
            print_r($dataPerBaris);
            $query = $db->query("insert into inisial_enkripsi (KodeKab,Inisial,NamaTerenkripsi) values (?,?,?)", [$dataPerBaris[0], $dataPerBaris[4], $dataPerBaris[2]]);
        }
    }
    public function dekinisial()
    {
        $session = session();
        $varEn = new Vars();
        // $db      = \Config\Database::connect();
        $db      = \Config\Database::connect();
        $sql = "SELECT * from inisial_enkripsi";
        $query = $db->query($sql, []);
        // print_r($query->getResultArray());
        $jebret = [];
        foreach ($query->getResultArray() as $ok) {
            // print_r($ok);
            try {
                $namaAsli = $varEn->dekripsi($ok['NamaTerenkripsi'], $session->get('KodeEnkripsi'));
            }

            //catch exception
            catch (\Exception $e) {
                $namaAsli = 'Gagal Meng-Decrypt Nama';
                // echo 'Message: ' .$e->getMessage();
            }
            // $namaAsli = $varEn->dekripsi($ok['NamaTerenkripsi'], 'maerahputih2023');
            $ok['NamaAsli'] = $namaAsli;
            $jebret[] = $ok;
        }

        // echo json_encode($query->getResultArray());
        return $this->respond($jebret, 200);
    }
}
