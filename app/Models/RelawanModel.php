<?php

namespace App\Models;

use CodeIgniter\Model;

class RelawanModel extends Model
{
    protected $table = 'relawan';
    protected $primaryKey = 'Id';
    protected $allowedFields = ['Nama', 'JenisKelamin','Level'];
}
