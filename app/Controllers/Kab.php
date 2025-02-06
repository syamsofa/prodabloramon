<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\API\ResponseTrait;
use Firebase\JWT\JWT;
use App\Models\UserModel;

class Kab extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $db      = \Config\Database::connect();
        $sql = "SELECT kab.Kode,kab.Kab,TargetL3,TargetL4,TargetL5,IFNULL( real_l0,0) AS real_l0,IFNULL( real_l1,0) AS real_l1,IFNULL( real_l2,0) AS real_l2,IFNULL( real_l3,0) AS real_l3,IFNULL( real_l4,0) AS real_l4,IFNULL( real_l5,0) AS real_l5 FROM kab
LEFT JOIN
(
SELECT 751898X1X38 AS Kode,
SUM(751898X3X9jumlahsiswa) AS real_l0,
SUM(751898X3X458jumlahsiswa) AS real_l1,
SUM(751898X3X461jumlahsiswa) AS real_l2,

sum(CASE
  when 751898X1X3 = ? THEN 1 ELSE 0 END
) AS real_l3,
sum(CASE
  WHEN 751898X1X3 = ? THEN 1 ELSE 0 END
) AS real_l4
,
sum(CASE
  WHEN 751898X1X3 = ? THEN 1 ELSE 0 END
) AS real_l5


FROM lsb8_survey_751898
where submitdate is not null and hide is null GROUP BY 751898X1X38
)
AS rekap
ON kab.Kode=rekap.Kode
order by kab.kab
";
        $query=$db->query($sql, ['l3', 'l4', 'l5']);
        // print_r($query->getResultArray());

        // echo json_encode($query->getResultArray());
        return $this->respond($query->getResultArray(), 200);
    }

}
