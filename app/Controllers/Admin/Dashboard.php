<?php

namespace App\Controllers\Admin;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function __construct()
    {
        helper('url');
        $this->modelDashboard = new \App\Models\ModelDashboard(); // Adjust the namespace and model name accordingly
		$this->session = session();
    }

    public function index()
    {
		$data['session'] = session();
		$db = \Config\Database::connect();

        if (!session()->get('username')) {
            return redirect()->to('login');
        } else {
            if (session()->get('id_role') === '1') {
                $data['judul'] = 'Dashboard';
                $data['customer']  = $db->table('customer')->getWhere(['username' => session('username')])->getRowArray();
                $data['mobil']     = $db->table('mobil')->countAllResults();
                $data['customers'] = $db->table('customer')->countAllResults();
                $data['transaksi'] = $db->table('transaksi')->countAllResults();
                $data['type'] = $db->table('type')->countAllResults();
                $dataGrafik = $this->modelDashboard->getTransaksi();
                $data['grafik'] = json_encode($dataGrafik);

                return view('templates/header-admin', $data)
                . view('templates/sidebar-admin', $data)
                . view('admin/dashboard', $data)
                . view('templates/footer-admin');
            }
            else {
                session()->setFlashdata('pesan', '<div class="alert alert-danger"><i class="far fa-lightbulb"></i> Maaf anda bukan admin !</div>');
                return redirect()->to('/');
            }
        }
    }
}
