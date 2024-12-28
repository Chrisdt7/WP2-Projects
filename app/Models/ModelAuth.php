<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';

    protected $allowedFields = ['nama', 'username', 'password', 'alamat', 'jenis_kelamin', 'telepon', 'no_ktp', 'id_role'];

    public function aksiDaftar($data)
    {
        $this->insert($data);
    }
}