<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelType extends Model
{
    protected $table = 'type';
    protected $primaryKey = 'id_type'; // Change this to the primary key of your 'type' table

    public function getAllType()
    {
        return $this->db->table('type')->get()->getResultArray();
    }

    public function getTypeById($id)
    {
        $result = $this->db->table('type')->getWhere(['id_type' => $id])->getRowArray();
        return $result;
    }

    public function aksiTypeTambah()
    {
        $data = [
            'kode_type' => $this->request->getPost('kode_type'),
            'nama_type' => $this->request->getPost('nama_type')
        ];

        $this->db->table('type')->insert($data);
    }

    public function aksiTypeEdit()
    {
        $id = $this->request->getPost('id');
        $data = [
            'kode_type' => $this->request->getPost('kode_type'),
            'nama_type' => $this->request->getPost('nama_type')
        ];

        $this->db->table('type')->where('id_type', $id)->update($data);
    }

    public function getAllTypeLimit($limit, $start, $keyword = null)
    {
        if ($keyword) {
            $this->db->like('nama_type', $keyword);
        }
        return $this->db->table('type')->get($limit, $start)->getResultArray();
    }

    public function countAllType()
    {
        return $this->db->table('type')->countAllResults();
    }
}
