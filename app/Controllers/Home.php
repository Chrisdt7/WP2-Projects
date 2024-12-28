<?php

namespace App\Controllers;

use App\Models\ModelMobil;
use CodeIgniter\Controller;

class Home extends Controller
{
    private $db;

    public function __construct()
    {
        $this->ModelMobil = new ModelMobil();
        $this->session = session();
    }

    public function index()
    {
        $db = \Config\Database::connect();
        $session = session();
        $data = [
            'judul' => 'Rental Mobil Dua Putra',
            'customer' => $db->table('customer')->getWhere(['username' => session()->get('username')])->getRowArray(),
            'mobil' => $this->ModelMobil->getAllMobil(),
            'kategori' => $db->table('type')->get()->getResultArray(),
            'notif' => $db->table('transaksi')->where([
                'status_pembayaran' => '0',
                'status_rental' => 'Belum Selesai',
                'id_customer' => session()->get('id_customer')
            ])->countAllResults(),
            'session' => $session,
        ];

        return view('templates/header', $data) .
            view('customer/dashboard', $data) .
            view('templates/footer');
    }

    public function detail($id)
    {
        $db = \Config\Database::connect();
        $session = session();
        $data = [
            'judul' => 'Detail Mobil',
            'customer' => $db->table('customer')->getWhere(['username' => session()->get('username')])->getRowArray(),
            'detail' => $this->ModelMobil->getMobilTypeJoin($id),
            'notif' => $db->table('transaksi')->where([
                'status_pembayaran' => '0',
                'status_rental' => 'Belum Selesai',
                'id_customer' => session()->get('id_customer')
            ])->countAll(),
            'session' => $session,
            'kategori' => $db->table('type')->get()->getResultArray(),
        ];

        return view('templates/header', $data) .
            view('customer/detail', $data) .
            view('templates/footer');
    }

    public function logout()
    {
        session()->remove(['username', 'id_role', 'id_customer']);
        session()->setFlashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Berhasil Logout.</div>');
        return redirect()->to('auth');
    }

    public function rupiah($uang)
    {
        $rupiah = "Rp. " . number_format($uang, 0, ',', '.');
        return $rupiah;
    }
}
