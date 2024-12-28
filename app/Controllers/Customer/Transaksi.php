<?php

namespace App\Controllers\Customer;

use App\Models\ModelTransaksi;
use App\Models\ModelCustomer;
use App\Models\ModelType;
use CodeIgniter\Controller;
use Config\Services;

class Transaksi extends Controller
{		
	protected $session;

    public function __construct()
    {
        helper('form');
        $this->modelTransaksi = new ModelTransaksi();
		$this->modelCustomer = new ModelCustomer();
		$this->modelType = new ModelType();
		$this->session = session();
    }

    public function index()
    {
        $data['judul'] = 'Transaksi Customer';
		$data['session'] = session();

        if (!$this->session->get('id_role') == 2) {
            return redirect()->to('auth');
        }

        $id_customer = $this->session->get('username');
        $data['transaksi'] = $this->modelTransaksi->getAllCustomerJoin($id_customer);
        // echo $this->modelTransaksi->getLastQuery();

        $data['customer'] = $this->modelCustomer->where('username', $this->session->get('username'))->first();
        $data['notif'] = $this->modelTransaksi->where(['status_pembayaran' => '0', 'status_rental' => 'Belum Selesai', 'id_customer' => $this->session->get('id_customer')])->countAllResults();
        $data['kategori'] = $this->modelType->findAll();
        
        echo view('templates/header', $data)
         . view('customer/transaksi', $data)
         . view('templates/footer');
    }

    public function pembayaran($id)
    {
        $data['session'] = session();

        $data['judul'] = 'Pembayaran Customer';
        if (!$this->session->get('id_role') == 2) {
            return redirect()->to('auth');
        }

        $db = \Config\Database::connect();
        $data['notif'] = $db->table('transaksi')->where(['status_pembayaran' => '0', 'status_rental' => 'Belum Selesai', 'id_customer' => $this->session->get('id_customer')])->countAllResults();
        $data['customer'] = $db->table('customer')->where(['username' => $this->session->get('username')])->get()->getRowArray();
        $data['transaksi'] = $this->modelTransaksi->getAllCustomerPembayaran($id);
        $data['kategori'] = $db->table('type')->get()->getResultArray();
        $data['bank'] = $db->table('bank')->get()->getResultArray();

        echo view('templates/header', $data)
         . view('customer/pembayaran', $data)
         . view('templates/footer');
    }

    public function uploadbuktii()
    {
        $db = \Config\Database::connect();
        $data['notif'] = $db->table('transaksi')->where(['status_pembayaran' => '0', 'status_rental' => 'Belum Selesai', 'id_customer' => $this->session->get('id_customer')])->countAllResults();

        $id_rental = $this->request->getPost('id_rental');
        $uploadBukti = $this->request->getFile('bukti');

        $this->modelTransaksi->uploadBuktiPembayaran($id_rental, $uploadBukti);

        session()->setFlashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Bukti Sudah Terkirim.</div>');
        return redirect()->to('customer/transaksi');
    }

    public function cetakInvoice($id)
    {
        $data['transaksi'] = $this->modelTransaksi->getAllCustomerPembayaran($id);
        return view('customer/cetak_invoice', $data);
    }

    public function batal($id)
    {
        $db = \Config\Database::connect();

        $data = $db->table('transaksi')->getWhere(['id_rental' => $id])->getRowArray();
        $id_mobil = $data['id_mobil'];

        $db->table('mobil')->set('status', '1')->where('id_mobil', $id_mobil)->update();
        $db->table('transaksi')->where('id_rental', $id)->delete();

        session()->setFlashdata('pesan', '<div class="alert alert-success"><i class="fa fa-info-circle" aria-hidden="true"></i> Transaksi Berhasil Di Batalkan.</div>');
        return redirect()->to('customer/transaksi');
    }
}
