<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    protected $table = 'mobil';
    protected $primaryKey = 'id_mobil';

    public function getMobilTypeJoin($id)
    {
        $builder = $this->db->table('mobil');
        $builder->select('*');
        $builder->join('type', 'type.id_type = mobil.kode_type');
        $builder->where('id_type', $id);

        return $builder->get()->getResultArray();
    }
}
