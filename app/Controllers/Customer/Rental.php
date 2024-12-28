<?php

namespace App\Controllers\Customer;

use App\Models\ModelMobil;
use App\Models\ModelRental;
use CodeIgniter\Controller;
use Config\Services;

class Rental extends Controller
{
    protected $modelMobil;
    protected $modelRental;
    protected $session;

    public function __construct()
    {
        helper(['form']);
        $this->modelMobil = new ModelMobil();
        $this->modelRental = new ModelRental();
        $this->session = session();
        $validation = Services::validation();
    }

    public function tambahRental($id)
    {
        $session = session();
        $data['session'] = session();

        if (!$session->get('id_role') == 2) {
			session()->setFlashdata('pesan', '<div class="alert alert-danger text-center"><i class="far fa-lightbulb"></i> Anda harus login terlebih dahulu !</div>');
            return redirect()->to('auth');
        }

		$db = \Config\Database::connect();
        $data['customer'] = $db->table('customer')->getWhere(['username' => $session->get('username')])->getRowArray();
        $data['judul'] = 'Pesan Mobil';
        $data['kategori'] = $db->table('type')->get()->getResultArray();
        $data['mobil'] = $this->modelMobil->getMobilById($id);
        $data['notif'] = $db->table('transaksi')->where(['status_pembayaran' => '0', 'status_rental' => 'Belum Selesai', 'id_customer' => $session->get('id_customer')])->countAllResults();
    
        if ($this->request->getMethod() === 'post') {
            $validationRules = [
                'harga' => 'required|trim',
                'denda' => 'required|trim',
                'tgl_rental' => 'required|trim|valid_date',
                'tgl_kembali' => 'required|trim|valid_date',
            ];

            $validationMessages = [
                'harga' => [
                    'required' => 'Harga Sewa Harus Di Isi'
                ],
                'denda' => [
                    'required' => 'Denda Harus Di Isi'
                ],
                'tgl_rental' => [
                    'required' => 'Tanggal Rental Harus Di Isi'
                ],
                'tgl_kembali' => [
                    'required' => 'Tanggal Kembali Harus Di Isi'
                ],
            ];

            $data = [
                'id_customer' => $session->get('id_customer'),
                'id_mobil' => $id,
                'tgl_rental' => $this->request->getPost('tgl_rental'),
                'tgl_kembali' => $this->request->getPost('tgl_kembali'),
                'harga' => $this->request->getPost('harga'),
                'denda' => $this->request->getPost('denda'),
                'total_denda' => '0',
                'tgl_penggembalian' => '-',
                'status_penggembalian' => 'Belum Kembali',
                'status_rental' => 'Belum Selesai'
            ];

            $this->validate($validationRules, $validationMessages);

            if ($this->validator->hasError('harga', 'denda', 'tgl_rental', 'tgl_kembali')) {
                $data['validation'] = $this->validator;
                return view('templates/header', $data)
                    . view('customer/tambahrental', $data)
                    . view('templates/footer');
            } else {
                $this->modelRental->aksiTambahRental($id, $data);
                $session->setFlashdata('pesan', '<div class="alert alert-success mt-1"><i class="fa fa-check-circle" aria-hidden="true"></i> Anda Berhasil Merental Mobil!.</div>');
                return redirect()->to('home');
            }
        } else {
            return view('templates/header', $data)
             . view('customer/tambahrental', $data)
             . view('templates/footer');
        }
    }
}
