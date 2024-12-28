<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelRental extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id_rental';
    protected $allowedFields = ['id_customer', 'id_mobil', 'tgl_rental', 'tgl_kembali', 'harga_mobil', 'denda', 'total_denda', 'tgl_penggembalian', 'status_penggembalian', 'status_rental'];

    // Add a property to hold the ModelMobil instance
    protected $modelMobil;

    public function __construct()
    {
        parent::__construct();
        $this->modelMobil = new ModelMobil();
    }

    public function aksiTambahRental($id, $data)
    {
        $statusMobil = '0';

        // Set 'status' field in the data array
        $data['status'] = $statusMobil;

        // Update 'status' in the 'mobil' table
        $this->modelMobil->set('status', $statusMobil);
        $this->modelMobil->where('id_mobil', $id)->update();

        // Insert rental data into the 'transaksi' table
        $this->insert($data);
    }
}
