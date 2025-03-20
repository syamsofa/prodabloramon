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

    public function ubahwilpembinaan()
    {
        $db      = \Config\Database::connect();
        $idtalent = $this->request->getVar('idtalent');

        $wilpembinaan = $this->request->getVar('wilpembinaan');
        // print_r($this->request->getVar());

        $sql = "update  lsb8_survey_751898 set 751898X1X38=? where id =?";
        $query1 = $db->query($sql, [$wilpembinaan, $idtalent]);

        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data  berhasil diubah.'
            ]
        ];
        return $this->respond($response);
    }
    public function tambahinisial()
    {
        $varEn = new Vars();
        $db      = \Config\Database::connect();
        $inisial = $this->request->getVar('inisial');
        $kodekab = $this->request->getVar('kodekab');
        $nama = $this->request->getVar('nama');

        // $wilpembinaan = $this->request->getVar('wilpembinaan');
        print_r($this->request->getVar());

        $namaTerenkripsi = $varEn->enkripsi($nama, 'merahputih2023');
        print_r(["ok" => $namaTerenkripsi]);

        $sql = "insert into inisial_enkripsi (Inisial,NamaTerenkripsi,KodeKab) values (?,?,?)";
        $query = $db->query($sql, [$inisial, $namaTerenkripsi, $kodekab]);

        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data  berhasil ditambah.'
            ]
        ];
        return $this->respond($response);
    }
    public function ubahkerja()
    {
        $idtalent = $this->request->getVar('idtalent');
        $statusbekerja = $this->request->getVar('statusbekerja');
        $pekerjaan = $this->request->getVar('pekerjaan');
        $instansi = $this->request->getVar('instansi');
        $pangkat = $this->request->getVar('pangkat');
        // print_r($kab);
        // idtalent:idtalent,
        // statusbekerja: $("#751898X9X6").val(),
        // pekerjaan: $("#751898X9X11").val(),
        // instansi: $("#751898X9X12").val(),
        // pangkat: $("#751898X8X32").val(),
        // print_r($this->request->getVar());
        $db      = \Config\Database::connect();
        $sql = "update lsb8_survey_751898 set 751898X9X6=?,751898X9X11=?,751898X9X12=?,751898X8X32=? where id =?";
        $query = $db->query($sql, [$statusbekerja, $pekerjaan, $instansi, $pangkat, $idtalent]);
        // } else {
        //     $sql2 = "insert into inisial (inisial,idtalent) values (?,?)";
        //     $query1 = $db->query($sql2, [$inisialrevisi, $idtalent]);
        // }
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data inisial berhasil diubah.'
            ]
        ];
        return $this->respond($response);
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
    public function individu()
    {
        $session = session();

        $varEn = new Vars();
        $idtalent = $this->request->getVar('idtalent');
        $db      = \Config\Database::connect();
        $sql = "SELECT 
751898X1X1 as inisial ,
inisial_enkripsi.NamaTerenkripsi AS NamaTerenkripsi,
751898X1X53 as gender ,
751898X1X506 as tahunlahir ,
751898X1X33 as kab ,
751898X1X34 as kec ,
751898X1X37 as statusmenikah ,
751898X1X3 as level ,
751898X1X4 as tahunlantik3 ,
751898X1X54 as tahunlantik4 ,
751898X1X55 as tahunlantik5 ,
751898X1X38 as wilayahkelas ,
751898X1X5 as pendidikanterakhir ,
751898X1X20 as prodi ,
751898X1X21 as masihsekolah ,
751898X1X22 as pendidikansekarang ,
751898X1X23 as prodisekarang ,
751898X9X11 as pekerjaan ,
751898X9X12 as instansi ,
751898X9X13 as tempatkerjaasnpusat ,
751898X9X13other as tempatkerjaasnpusat_other ,
751898X9X36 as tempatkerjanonasnpus ,
751898X9X24 as pendapatan ,
751898X7X30 as pengeluaran_keluarga ,
751898X2X7SQ001_SQ001 as organisasi_nasional ,
751898X2X7SQ001_SQ002 as jabatan_organisasi_nasional ,
751898X2X7SQ002_SQ001 as organisasi_provinsi ,
751898X2X7SQ002_SQ002 as jabatan_organisasi_provinsi ,
751898X2X7SQ003_SQ001 as organisasi_kabkot ,
751898X2X7SQ003_SQ002 as jabatan_organisasi_kabkot ,
751898X2X7SQ004_SQ001 as organisasi_masyarakat ,
751898X2X7SQ004_SQ002 as jabatan_organisasi_masyarakat ,
751898X3X458jumlahkelas as l1_jumlahkelas ,
751898X3X458jumlahsiswa as l1_jumlahsiswa ,
751898X3X461jumlahkelas as l2_jumlahkelas ,
751898X3X461jumlahsiswa as l2_jumlahsiswa ,
751898X3X464jumlahkelas as l3_jumlahkelas ,
751898X3X464jumlahsiswa as l3_jumlahsiswa ,
751898X3X467jumlahkelas as l4_jumlahkelas ,
751898X3X467jumlahsiswa as l4_jumlahsiswa ,
751898X3X8 as jabataninternal ,
751898X3X9jumlahkelas as l0_jumlahkelas ,
751898X3X9jumlahsiswa as l0_jumlahsiswa ,
751898X4X10 as namapasangan ,
751898X4X25 as kabpasangan ,
751898X4X26 as kecpasangan ,
751898X4X27 as nopasangan ,
751898X4X28 as kelaspasangan ,
751898X4X29 as tahunlantikpasangan3 ,
751898X4X56 as tahunlantikpasangan4 ,
751898X4X57 as tahunlantikpasangan5 ,
751898X5X14 as namasekolah ,
751898X5X15 as tugastambahan ,
751898X5X15other as tugastambahan_lainnya ,
751898X5X16 as pernahnarasumber ,
751898X5X17 as materinarsum ,
751898X5X18fasilitator as sertifikat_fasilitator ,
751898X5X18gurupenggerak as sertifikat_gurupenggerak ,
751898X5X18instruktur as sertifikat_instruktur ,
751898X5X18pengajarpraktik as sertifikat_pengajarpraktik ,
751898X6X39 as jumanak ,
751898X6X40keterangan_kelaspembinaan as anak2_kelaspembinaan ,
751898X6X40keterangan_kelassaatini as anak2_kelassaatini ,
751898X6X40keterangan_nama as anak2_nama ,
751898X6X40keterangan_pendidikansaatini as anak2_pendidikansaatini ,
751898X6X40keterangan_pendidikantamat as anak2_pendidikantamat ,
751898X6X40keterangan_statusmarital as anak2_statusmarital ,
751898X6X40keterangan_statuspembinaan as anak2_statuspembinaan ,
751898X6X40keterangan_tahunlahir as anak2_tahunlahir ,
751898X6X58keterangan_kelaspembinaan as anak1_kelaspembinaan ,
751898X6X58keterangan_kelassaatini as anak1_kelassaatini ,
751898X6X58keterangan_nama as anak1_nama ,
751898X6X58keterangan_pendidikansaatini as anak1_pendidikansaatini ,
751898X6X58keterangan_pendidikantamat as anak1_pendidikantamat ,
751898X6X58keterangan_statusmarital as anak1_statusmarital ,
751898X6X58keterangan_statuspembinaan as anak1_statuspembinaan ,
751898X6X58keterangan_tahunlahir as anak1_tahunlahir ,
751898X6X59keterangan_kelaspembinaan as anak3_kelaspembinaan ,
751898X6X59keterangan_kelassaatini as anak3_kelassaatini ,
751898X6X59keterangan_nama as anak3_nama ,
751898X6X59keterangan_pendidikansaatini as anak3_pendidikansaatini ,
751898X6X59keterangan_pendidikantamat as anak3_pendidikantamat ,
751898X6X59keterangan_statusmarital as anak3_statusmarital ,
751898X6X59keterangan_statuspembinaan as anak3_statuspembinaan ,
751898X6X59keterangan_tahunlahir as anak3_tahunlahir ,
751898X6X60keterangan_kelaspembinaan as anak4_kelaspembinaan ,
751898X6X60keterangan_kelassaatini as anak4_kelassaatini ,
751898X6X60keterangan_nama as anak4_nama ,
751898X6X60keterangan_pendidikansaatini as anak4_pendidikansaatini ,
751898X6X60keterangan_pendidikantamat as anak4_pendidikantamat ,
751898X6X60keterangan_statusmarital as anak4_statusmarital ,
751898X6X60keterangan_statuspembinaan as anak4_statuspembinaan ,
751898X6X60keterangan_tahunlahir as anak4_tahunlahir ,
751898X6X61keterangan_kelaspembinaan as anak5_kelaspembinaan ,
751898X6X61keterangan_kelassaatini as anak5_kelassaatini ,
751898X6X61keterangan_nama as anak5_nama ,
751898X6X61keterangan_pendidikansaatini as anak5_pendidikansaatini ,
751898X6X61keterangan_pendidikantamat as anak5_pendidikantamat ,
751898X6X61keterangan_statusmarital as anak5_statusmarital ,
751898X6X61keterangan_statuspembinaan as anak5_statuspembinaan ,
751898X6X61keterangan_tahunlahir as anak5_tahunlahir ,
751898X6X62keterangan_kelaspembinaan as anak6_kelaspembinaan ,
751898X6X62keterangan_kelassaatini as anak6_kelassaatini ,
751898X6X62keterangan_nama as anak6_nama ,
751898X6X62keterangan_pendidikansaatini as anak6_pendidikansaatini ,
751898X6X62keterangan_pendidikantamat as anak6_pendidikantamat ,
751898X6X62keterangan_statusmarital as anak6_statusmarital ,
751898X6X62keterangan_statuspembinaan as anak6_statuspembinaan ,
751898X6X62keterangan_tahunlahir as anak6_tahunlahir ,
751898X6X63keterangan_kelaspembinaan as anak7_kelaspembinaan ,
751898X6X63keterangan_kelassaatini as anak7_kelassaatini ,
751898X6X63keterangan_nama as anak7_nama ,
751898X6X63keterangan_pendidikansaatini as anak7_pendidikansaatini ,
751898X6X63keterangan_pendidikantamat as anak7_pendidikantamat ,
751898X6X63keterangan_statusmarital as anak7_statusmarital ,
751898X6X63keterangan_statuspembinaan as anak7_statuspembinaan ,
751898X6X63keterangan_tahunlahir as anak7_tahunlahir ,
751898X6X64keterangan_kelaspembinaan as anak8_kelaspembinaan ,
751898X6X64keterangan_kelassaatini as anak8_kelassaatini ,
751898X6X64keterangan_nama as anak8_nama ,
751898X6X64keterangan_pendidikansaatini as anak8_pendidikansaatini ,
751898X6X64keterangan_pendidikantamat as anak8_pendidikantamat ,
751898X6X64keterangan_statusmarital as anak8_statusmarital ,
751898X6X64keterangan_statuspembinaan as anak8_statuspembinaan ,
751898X6X64keterangan_tahunlahir as anak8_tahunlahir ,
751898X6X65keterangan_kelaspembinaan as anak9_kelaspembinaan ,
751898X6X65keterangan_kelassaatini as anak9_kelassaatini ,
751898X6X65keterangan_nama as anak9_nama ,
751898X6X65keterangan_pendidikansaatini as anak9_pendidikansaatini ,
751898X6X65keterangan_pendidikantamat as anak9_pendidikantamat ,
751898X6X65keterangan_statusmarital as anak9_statusmarital ,
751898X6X65keterangan_statuspembinaan as anak9_statuspembinaan ,
751898X6X65keterangan_tahunlahir as anak9_tahunlahir ,
751898X6X66keterangan_kelaspembinaan as anak10_kelaspembinaan ,
751898X6X66keterangan_kelassaatini as anak10_kelassaatini ,
751898X6X66keterangan_nama as anak10_nama ,
751898X6X66keterangan_pendidikansaatini as anak10_pendidikansaatini ,
751898X6X66keterangan_pendidikantamat as anak10_pendidikantamat ,
751898X6X66keterangan_statusmarital as anak10_statusmarital ,
751898X6X66keterangan_statuspembinaan as anak10_statuspembinaan ,
751898X6X66keterangan_tahunlahir as anak10_tahunlahir ,
751898X6X67keterangan_kelaspembinaan as anak11_kelaspembinaan ,
751898X6X67keterangan_kelassaatini as anak11_kelassaatini ,
751898X6X67keterangan_nama as anak11_nama ,
751898X6X67keterangan_pendidikansaatini as anak11_pendidikansaatini ,
751898X6X67keterangan_pendidikantamat as anak11_pendidikantamat ,
751898X6X67keterangan_statusmarital as anak11_statusmarital ,
751898X6X67keterangan_statuspembinaan as anak11_statuspembinaan ,
751898X6X67keterangan_tahunlahir as anak11_tahunlahir,
751898X9X6 as statusbekerja ,

751898X8X32 as pangkat ,

IFNULL(lsb8_survey_751898.751898X9X36,IFNULL(instansipusat.answer,'-')) AS tempatbekerja
  from lsb8_survey_751898 
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
where lsb8_survey_751898.id=?";


        $query = $db->query($sql, [$idtalent]);

        $outputData = null;
        $outputData = $query->getResultArray()[0];

        $outputData['NamaAsli'] = $varEn->dekripsi($outputData['NamaTerenkripsi'], $session->get('Kode_enkripsi'));
        if (strlen($outputData['tempatbekerja']) >= 13)
            $outputData['tempatbekerja_samar'] = $outputData['tempatbekerja'];
        else
            $dt['tempatbekerja_samar'] = $outputData['tempatbekerja'];

        if ($outputData) {
            return $this->respond($outputData);
        } else {
            return $this->failNotFound('Data tidak ditemukan.');
        }
        // return $this->respond($dtk, 200);
    }
    public function byproda()
    {
        $session = session();
        $kab = $this->request->getVar('kodekab');
        $varEn = new Vars();
        $search = $this->request->getVar('search');
        $db      = \Config\Database::connect();
        $sql = "SELECT 751898X9X31
as keahlian,751898X1X20
as prodi, 751898X1X38 as wilayahkelas , IF(inisial_enkripsi.Inisial IS null,'tidaksesuai','sesuai') AS status_inisial,lsb8_survey_751898.id, kab.Kab AS kab_domisili, IFNULL( inisial.inisial,lsb8_survey_751898.751898X1X1) AS inisial_revisi,IFNULL( inisial.time,'-') AS waktu_perubahan, lsb8_survey_751898.751898X1X1,751898X9X6 as statusbekerja ,751898X1X53 from lsb8_survey_751898 
LEFT JOIN kab
ON kab.Kode=lsb8_survey_751898.751898X1X33
LEFT JOIN inisial
ON inisial.idtalent=lsb8_survey_751898.id
LEFT JOIN inisial_enkripsi
ON inisial_enkripsi.KodeKab=751898X1X38
AND (inisial_enkripsi.Inisial=lsb8_survey_751898.751898X1X1 OR inisial_enkripsi.Inisial=inisial.inisial)

where submitdate is not NULL and 751898X1X38=? and hide is null and (inisial.inisial like '%" . $search . "%' or lsb8_survey_751898.751898X1X1 like '%" . $search . "%')
ORDER BY inisial_revisi asc";

        $query = $db->query($sql, [$kab]);

        return $this->respond($query->getResultArray(), 200);
    }
    public function masterinisial()
    {
        $session = session();
        $kab = $this->request->getVar('kodekab');
        $varEn = new Vars();
        $search = $this->request->getVar('search');
        $db      = \Config\Database::connect();
        $sql = "SELECT * from inisial_enkripsi where KodeKab=? and Inisial like '%" . $search . "%'";

        $query = $db->query($sql, [$kab]);
        $dtk = [];
        foreach ($query->getResultArray() as $dt) {
            $dt['NamaAsli'] = $varEn->dekripsi($dt['NamaTerenkripsi'], $session->get('Kode_enkripsi'));

            $dtk[] = $dt;
        }
        return $this->respond($dtk, 200);
    }

    public function byproda_ori()
    {
        $session = session();
        $kab = $this->request->getVar('kodekab');
        $varEn = new Vars();
        $search = $this->request->getVar('search');
        $db      = \Config\Database::connect();
        $sql = "SELECT 751898X9X31
as keahlian,751898X1X20
as prodi, 751898X1X38 as wilayahkelas , IF(inisial_enkripsi.Inisial IS null,'tidaksesuai','sesuai') AS status_inisial,  submitdate,lsb8_survey_751898.id,IFNULL(lsb8_survey_751898.751898X9X36,IFNULL(instansipusat.answer,'-')) AS tempatbekerja, kab.Kab AS kab_domisili, IFNULL( inisial.inisial,lsb8_survey_751898.751898X1X1) AS inisial_revisi,inisial_enkripsi.NamaTerenkripsi, IFNULL( inisial.time,'-') AS waktu_perubahan, lsb8_survey_751898.751898X1X1,751898X9X6 as statusbekerja ,751898X1X53, YEAR(CURRENT_DATE())-lsb8_survey_751898.751898X1X506 AS umur from lsb8_survey_751898 
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
            $dt['NamaAsli'] = substr($varEn->dekripsi($dt['NamaTerenkripsi'], $session->get('Kode_enkripsi')), 0, 4) . "***";
            if (strlen($dt['tempatbekerja']) >= 10)
                $dt['tempatbekerja_samar'] = substr($dt['tempatbekerja'], 0, 9) . "***";
            else
                $dt['tempatbekerja_samar'] = substr($dt['tempatbekerja'], 0, 8) . "***";
            $dtk[] = $dt;
        }
        return $this->respond($dtk, 200);
    }

    public function inisialbyproda()
    {
        $session = session();
        $kab = $this->request->getVar('kodekab');
        $varEn = new Vars();
        $db      = \Config\Database::connect();
        $sql = "SELECT * FROM inisial_enkripsi WHERE KodeKab=? order by NamaTerenkripsi";


        $query = $db->query($sql, [$kab]);
        $dtk = [];
        foreach ($query->getResultArray() as $dt) {
            $dt['NamaAsli'] = $varEn->dekripsi($dt['NamaTerenkripsi'], $session->get('Kode_enkripsi'));
            $dtk[] = $dt;
        }
        return $this->respond($dtk, 200);
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
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load("C:\Users\Syamsofa\prodablora\masterinisial.xlsx");
        $worksheet = $spreadsheet->getActiveSheet();
        $dataArray = $worksheet->toArray();
        foreach ($dataArray as $row) {

            $no = 1;
            // echo "baris <br>";
            $kolom = 1;
            $dataPerBaris = [];
            foreach ($row as $cellValue) {

                // echo $kolom;
                if ($kolom == 2) {
                    $namaTerenkripsi = $varEn->enkripsi($cellValue, 'merahputih2023');
                    $dataPerBaris[] = $namaTerenkripsi;
                }


                // echo $cellValue;
                $kolom++;

                $dataPerBaris[] = $cellValue;
            }
            echo $no;
            $no++;
            $query = $db->query("insert into inisial_enkripsi (KodeKab,Inisial,NamaTerenkripsi) values (?,?,?)", [$dataPerBaris[0], $dataPerBaris[3], $dataPerBaris[1]]);
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
