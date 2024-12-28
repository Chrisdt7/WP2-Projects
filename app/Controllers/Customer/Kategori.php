<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;

class Kategori extends BaseController
{
    protected $ModelType;
    protected $ModelKategori;

    public function __construct()
    {
        $this->ModelType = new \App\Models\ModelType();
        $this->ModelKategori = new \App\Models\ModelKategori();
        $this->session = session();
    }

    public function index($id = null)
    {
        $data['judul'] = 'Kategori';

        $session = session();
        $db = \Config\Database::connect();
        $customerModel = $db->table('customer');
        $data['customer'] = $customerModel->getWhere(['username' => session('username')])->getRowArray();

        $data['mobil'] = $this->ModelKategori->getMobilTypeJoin($id);
        $data['kateid'] = $this->ModelType->getTypeById($id);

        // Access the database service for 'type' table
        $modelType = $db->table('type');
        $data['kategori'] = $modelType->get()->getResultArray();

        // Access the database service for 'transaksi' table
        $transaksiModel = $db->table('transaksi');
        $data['notif'] = $transaksiModel->getWhere(['status_pembayaran' => '0', 'status_rental' => 'Belum Selesai', 'id_customer' => session('id_customer')])->getNumRows();

        // Include the session in the $data array
        $data['session'] = $session;

        return view('templates/header', $data)
         . view('customer/kategori', $data)
         . view('templates/footer');
    }
}
