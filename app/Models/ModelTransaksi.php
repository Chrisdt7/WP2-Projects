<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\I18n\Time;

class ModelTransaksi extends Model
{
    protected $table = 'transaksi';
	protected $primaryKey = 'id_rental';
	protected $useAutoIncrement = true;
	protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields = [
        'id_rental', 'id_customer', 'id_mobil', 'harga', 'denda', 'total_denda',
        'tgl_penggembalian', 'status_penggembalian', 'status_rental', 'bukti_pembayaran', 'status_pembayaran'
    ];

    public function getAll3Table($limit, $start, $keyword = null)
    {
        $builder = $this->db->table('transaksi t');
        $builder->select('*');
        $builder->join('customer c', 'c.id_customer = t.id_customer');
        $builder->join('mobil m', 'm.id_mobil = t.id_mobil');

        if ($keyword) {
            $builder->like('nama', $keyword)
                    ->orLike('merk', $keyword)
                    ->orLike('status_penggembalian', $keyword)
                    ->orLike('status_rental', $keyword);
        }

        $builder->orderBy('t.id_rental', 'DESC');
        return $builder->get($limit, $start)->getResultArray();
    }

    public function getAllCustomerJoin($id_customer)
    {
        $builder = $this->db->table('transaksi t');
        $builder->select('*');
        $builder->join('customer c', 'c.id_customer = t.id_customer');
        $builder->join('mobil m', 'm.id_mobil = t.id_mobil');
        $builder->where('c.username', $id_customer);
        $builder->orderBy('t.id_rental', 'DESC');
        return $builder->get()->getResultArray();
    }

    public function countAllTransaksi()
    {
        return $this->countAll();
    }

    public function getAllCustomerPembayaran($id)
    {
        $builder = $this->db->table('transaksi t');
        $builder->select('*');
        $builder->join('mobil m', 'm.id_mobil = t.id_mobil');
        $builder->join('customer c', 'c.id_customer = t.id_customer');
        $builder->where('t.id_rental', $id);
        return $builder->get()->getResultArray();
    }

    public function uploadBuktiPembayaran($id_rental, $uploadBukti)
    {
        if ($uploadBukti->isValid() && !$uploadBukti->hasMoved()) {
            // Generate a unique filename using the user's name and timestamp
            $username = session('username');
            $timestamp = Time::now()->getTimestamp();
            $nameFotoBaru = $username . '_' . $timestamp . '.' . $uploadBukti->getClientExtension();

            // Move the uploaded file to the desired directory with the unique filename
            $uploadBukti->move(ROOTPATH . 'public/assets/bukti/', $nameFotoBaru);

            // Update the 'bukti_pembayaran' field in the database
            $this->set('bukti_pembayaran', $nameFotoBaru);
            $this->where('id_rental', $id_rental);
            $this->update();
        } else {
            echo $uploadBukti->getErrorString();
        }
    }

    public function getTransaksiById($id)
    {
        return $this->where('id_rental', $id)->get()->getResultArray();
    }

    public function downloadPembayaran($id)
    {
        return $this->where('id_rental', $id)->first();
    }

    public function updateTransaksiSelesai()
    {
        $id_rental = $this->request->getPost('id_rental');
        $id_mobil = $this->request->getPost('id_mobil');

        $tgl_penggembalian = $this->request->getPost('tgl_penggembalian');
        $tgl_kembali = $this->request->getPost('tgl_kembali');
        $denda = $this->request->getPost('denda');

        $x = strtotime($tgl_penggembalian);
        $y = strtotime($tgl_kembali);
        $selisih = floor(abs($x - $y) / (60 * 60 * 24));

        $totalDenda = $selisih * $denda;

        $this->set('status', '1');
        $this->where('id_mobil', $id_mobil);
        $this->update();

        $data = [
            'tgl_penggembalian' => $tgl_penggembalian,
            'status_penggembalian' => $this->request->getPost('status_penggembalian'),
            'status_rental' => $this->request->getPost('status_rental'),
            'total_denda' => $totalDenda
        ];
        $this->where('id_rental', $id_rental);
        $this->update($data);
    }
}
