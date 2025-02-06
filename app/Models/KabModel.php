<?php

namespace App\Models;

use CodeIgniter\Model;

class KabModel extends Model
{
    protected $table = 'kab';
    protected $primaryKey = 'Kode';
    protected $allowedFields = ['Kab'];
}
