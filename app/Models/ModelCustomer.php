<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelCustomer extends Model
{
    protected $table            = 'customer';
    protected $primaryKey       = 'id_customer';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields    = ['nama', 'username', 'password', 'alamat', 'jenis_kelamin', 'telepon', 'no_ktp', 'id_role', 'created_at', 'updated_at'];

    // Date
    protected $useTimestamps = true;

    public function getCustomerById($id)
    {
        return $this->where('id_customer', $id)->first();
    }

    public function addCustomer()
    {
        $data = [
            'nama' => $this->request->getPost('nama', true),
            'username' => $this->request->getPost('username', true),
            'password' => password_hash($this->request->getPost('password', true), PASSWORD_DEFAULT),
            'alamat' => $this->request->getPost('alamat', true),
            'jenis_kelamin' => $this->request->getPost('jk', true),
            'telepon' => $this->request->getPost('telepon', true),
            'no_ktp' => $this->request->getPost('ktp', true),
            'id_role' => '2',
        ];

        $this->insert($data);
    }

    public function modifyCustomer()
    {
        $id = $this->request->getPost('id', true);
        $data = [
            'nama' => $this->request->getPost('nama', true),
            'username' => $this->request->getPost('username', true),
            'password' => password_hash($this->request->getPost('password', true), PASSWORD_DEFAULT),
            'alamat' => $this->request->getPost('alamat', true),
            'jenis_kelamin' => $this->request->getPost('jk', true),
            'telepon' => $this->request->getPost('telepon', true),
            'no_ktp' => $this->request->getPost('ktp', true),
            'id_role' => '2',
        ];

        $this->set($data)->where('id_customer', $id)->update();
    }

    public function getCustomer($limit, $start, $keyword)
    {
        if ($keyword) {
            $this->like('nama', $keyword)
                ->orLike('username', $keyword)
                ->orLike('telepon', $keyword)
                ->orLike('no_ktp', $keyword);
        }

        return $this->findAll($limit, $start);
    }

    public function countCustomer()
    {
        return $this->countAllResults();
    }

}