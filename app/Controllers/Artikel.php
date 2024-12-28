<?php

namespace App\Controllers;

use App\Models\ModelArtikel;
use CodeIgniter\Controller;

class Artikel extends Controller
{
    private $db;

    public function __construct()
    {
        $this->ModelArtikel = new ModelArtikel();
        $this->session = session();
    }

    public function index()
    {
        $db = \Config\Database::connect();
        $session = session();
        $data = [
            'judul' => 'Semua Artikel',
            'customer' => $db->table('customer')->getWhere(['username' => session()->get('username')])->getRowArray(),
            'kategori' => $db->table('type')->get()->getResultArray(),
            'notif' => $db->table('transaksi')->where([
                'status_pembayaran' => '0',
                'status_rental' => 'Belum Selesai',
                'id_customer' => session()->get('id_customer')
            ])->countAllResults(),
            'session' => $session,
            'berita' => $this->ModelArtikel->getAllBeritaKategori(),
        ];

        return view('templates/header', $data) .
            view('customer/artikel', $data) .
            view('templates/footer');
    }

    public function baca($id)
    {
        $db = \Config\Database::connect();
        $session = session();
        $data = [
            'judul' => 'Detail Artikel',
            'customer' => $db->table('customer')->getWhere(['username' => session()->get('username')])->getRowArray(),
            'kategori' => $db->table('type')->get()->getResultArray(),
            'berita' => $this->ModelArtikel->joinBeritaCustomer($id),
            'notif' => $db->table('transaksi')->where([
                'status_pembayaran' => '0',
                'status_rental' => 'Belum Selesai',
                'id_customer' => session()->get('id_customer')
            ])->countAllResults(),
            'session' => $session,
        ];

        return view('templates/header', $data) .
            view('customer/baca_artikel', $data) .
            view('templates/footer');
    }

    public function kategori($id)
    {
        $db = \Config\Database::connect();
        $data = [
            'judul' => 'Kategori Artikel',
            'customer' => $db->table('customer')->getWhere(['username' => session()->get('username')])->getRowArray(),
            'kategori' => $db->table('type')->get()->getResultArray(),
            'berita' => $this->ModelArtikel->joinBeritaKategoriById($id),
            'notif' => $db->table('transaksi')->where([
                'status_pembayaran' => '0',
                'status_rental' => 'Belum Selesai',
                'id_customer' => session()->get('id_customer')
            ])->countAllResults(),
            'session' => $session,
        ];

        return view('templates/header', $data) .
            view('customer/kategori_artikel', $data) .
            view('templates/footer');
    }
}
