<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDashboard extends Model
{
    protected $table            = 'transaksi';
    protected $primaryKey       = 'id_rental';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $protectFields    = true;
    protected $allowedFields = [
        'id_rental', 'id_customer', 'id_mobil', 'harga', 'denda', 'total_denda',
        'tgl_penggembalian', 'status_penggembalian', 'status_rental', 'bukti_pembayaran', 'status_pembayaran'
    ];

    public function getTransaksi()
    {
        return $this->select('id_rental, id_customer, id_mobil, harga, denda, total_denda, tgl_penggembalian, status_penggembalian, status_rental, bukti_pembayaran, status_pembayaran')
                ->findAll();
    }
}
