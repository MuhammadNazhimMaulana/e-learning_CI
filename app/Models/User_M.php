<?php

namespace App\Models;

use CodeIgniter\Model;

class User_M extends Model
{
    protected $table         = 'tbl_user';
    protected $primaryKey    = 'id_user';
    protected $allowedFields = ['username','nama_lengkap', 'tingkat', 'alamat', 'password', 'cookie_token', 'usia', 'foto_user', 'tgl_masuk', 'created_at', 'updated_at'];
    protected $returnType    = 'App\Entities\User_E';
    protected $useTimestamps = true;
}