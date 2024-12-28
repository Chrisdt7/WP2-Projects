<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMobil extends Model
{
    protected $table = 'mobil';
    protected $primaryKey = 'id_mobil';
    protected $allowedFields = ['kode_type', 'merk', 'no_plat', 'warna', 'tahun', 'status', 'harga_mobil', 'denda', 'ac', 'supir', 'mp3_player', 'central_lock', 'gambar'];

    public function getAllMobil()
    {
        $builder = $this->db->table('type');
        $builder->select('*');
        $builder->join('mobil', 'mobil.kode_type = type.id_type');

        return $builder->get()->getResultArray();
    }

    public function getMobilById($id)
    {
        return $this->find($id);
    }

    public function getMobilTypeJoin($id)
    {
        $builder = $this->db->table('mobil');
        $builder->select('*');
        $builder->join('type', 'type.id_type = mobil.kode_type');
        $builder->where('id_mobil', $id);

        return $builder->get()->getRowArray();
    }

    public function aksi_tambah()
    {
        $gambar = $this->request->getFile('gambar');

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $gambar->move('./assets/assets_stisla/img/mobil/');
            $data = [
                'kode_type' => $this->request->getPost('type'),
                'merk' => $this->request->getPost('merk'),
                'no_plat' => $this->request->getPost('no_plat'),
                'warna' => $this->request->getPost('warna'),
                'tahun' => $this->request->getPost('tahun'),
                'status' => $this->request->getPost('status'),
                'harga_mobil' => $this->request->getPost('harga'),
                'denda' => $this->request->getPost('denda'),
                'ac' => $this->request->getPost('ac'),
                'supir' => $this->request->getPost('supir'),
                'mp3_player' => $this->request->getPost('mp3'),
                'central_lock' => $this->request->getPost('lock'),
                'gambar' => $gambar->getName(),
            ];
            $this->insert($data);
        }
    }

    public function aksi_edit()
    {
        $gambar = $this->request->getFile('gambar');

        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $gambar->move('./assets/assets_stisla/img/mobil/');
            $gambarLama = $this->request->getPost('gambarLama');

            if ($gambarLama != 'default.png') {
                unlink(FCPATH . 'assets/assets_stisla/img/mobil/' . $gambarLama);
            }

            $data = [
                'kode_type' => $this->request->getPost('type'),
                'merk' => $this->request->getPost('merk'),
                'no_plat' => $this->request->getPost('no_plat'),
                'warna' => $this->request->getPost('warna'),
                'tahun' => $this->request->getPost('tahun'),
                'status' => $this->request->getPost('status'),
                'harga_mobil' => $this->request->getPost('harga'),
                'denda' => $this->request->getPost('denda'),
                'ac' => $this->request->getPost('ac'),
                'supir' => $this->request->getPost('supir'),
                'mp3_player' => $this->request->getPost('mp3'),
                'central_lock' => $this->request->getPost('lock'),
                'gambar' => $gambar->getName(),
            ];

            $this->update($this->request->getPost('id_mobil'), $data);
        }
    }

    public function getMobil($limit, $start, $keyword = null)
    {
        $builder = $this->db->table('type');
        $builder->select('*');
        $builder->join('mobil', 'mobil.kode_type = type.id_type');

        if ($keyword) {
            $builder->like('merk', $keyword);
            $builder->orLike('no_plat', $keyword);
            $builder->orLike('warna', $keyword);
            $builder->orLike('tahun', $keyword);
        }

        return $builder->get($limit, $start)->getResultArray();
    }

    public function countAllMobil()
    {
        return $this->countAll();
    }
}
