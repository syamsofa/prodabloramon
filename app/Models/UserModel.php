<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'Id';
    protected $allowedFields = ['Username', 'Password','IsAdmin'];
}
