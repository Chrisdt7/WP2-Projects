<?php

namespace App\Controllers\Customer;

use App\Controllers\BaseController;
use App\Models\ModelPanel;
use Config\Services;

class Panel extends BaseController
{
	protected $session;
	protected $validation;
	protected $pager;

    public function __construct()
    {
		helper('form', 'url');
        $this->load = service('load');
        $this->modelPanel = new ModelPanel();
		$this->session = session();
    }

    public function index()
    {
		$data['session'] = session();
		$db = \Config\Database::connect();

        $data['judul'] = 'Dashboard Customer';
        $data['customer'] = $db->table('customer')->getWhere(['username' => session('username')])->getRowArray();
        $data['notif'] = $db->table('transaksi')->where(['status_pembayaran' => '0', 'status_rental' => 'Belum Selesai', 'id_customer' => session('id_customer')])->countAllResults();
        $data['artikel'] = $this->modelPanel->countAllArtikel();
        $data['transaksi'] = $this->modelPanel->countAllTransaksi();
        
		echo view('templates/header', $data)
             . view('customer/panel/index', $data)
             . view('templates/footer');
    }

    public function artikel()
    {
		$session = session();
		$data['session'] = session();
		$db = \Config\Database::connect();

        $data['judul'] = 'Artikel';
        $data['customer'] = $db->table('customer')->getWhere(['username' => session('username')])->getRowArray();
        $data['notif'] = $db->table('transaksi')->where(['status_pembayaran' => '0', 'status_rental' => 'Belum Selesai', 'id_customer' => session('id_customer')])->countAllResults();

        // Pencarian
        if ($this->request->getPost('submit')) {
            $data['keyword'] = $this->request->getPost('keyword');
            $this->session->set('keyword', $data['keyword']);
        } elseif (!$this->request->getPost('submit')) {
            $data['keyword'] = $this->session->remove('keyword');
        } else {
            $data['keyword'] = $this->session->get('keyword');
        }

        // Konfigurasi Pagination
        $config['baseURL'] = site_url('customer/panel/artikel');
        $config['totalRows'] = $this->modelPanel->countAllArtikel();
        $config['per_page'] = 2;

        // STYLE
        $config['fullTagOpen'] = '<nav><ul class="pagination ok">';
        $config['fullTagClose'] = '</ul></nav>';

        $config['firstLink'] = 'First';
        $config['firstTagOpen'] = '<li class="page-item">';
        $config['firstTagClose'] = '</li>';

        $config['lastLink'] = 'Last';
        $config['lastTagOpen'] = '<li class="page-item">';
        $config['lastTagClose'] = '</li>';

        $config['nextLink'] = '&raquo';
        $config['nextTagOpen'] = '<li class="page-item">';
        $config['nextTagClose'] = '</li>';

        $config['prevLink'] = '&laquo';
        $config['prevTagOpen'] = '<li class="page-item">';
        $config['prevTagClose'] = '</li>';

        $config['curTagOpen'] = '<li class="page-item active"><a class="page-link" href="#">';
        $config['curTagClose'] = '</a></li>';

        $config['numTagOpen'] = '<li class="page-item">';
        $config['numTagClose'] = '</li>';

        $config['attributes'] = ['class' => 'page-link'];

        $data['start'] = $this->request->getGet('page') ? $this->request->getGet('page') : 0;
        $data['artikel'] = $this->modelPanel->getAllByUser($config['per_page'], $data['start'], $data['keyword']);
		$data['pager'] = $data['artikel']['pager'];
	    $data['artikel'] = $data['artikel']['result'];

		echo view('templates/header', $data)
             . view('customer/panel/artikel', $data)
             . view('templates/footer');
    } 

	public function tambahartikel()
	{
		$session = session();
		$data['session'] = session();
		$db = \Config\Database::connect();
		$validation = Services::validation();

		$data['judul'] = 'Tambah Artikel';
		$data['customer'] = $db->table('customer')->getWhere(['username' => $session->get('username')])->getRowArray();
		$data['notif'] = $db->table('transaksi')->where(['status_pembayaran' => '0', 'status_rental' => 'Belum Selesai', 'id_customer' => $session->get('id_customer')])->countAllResults();
		$data['kategori'] = $db->table('kategori')->get()->getResultArray();

		if ($this->request->getPost()) {
			$rules = [
				'judul' => [
					'label' => 'judul',
					'rules' => 'required|trim',
					'errors' => [
						'required' => 'Judul Artikel Wajib Di Isi!'
					]
				],
				'kategori' => [
					'label' => 'kategori',
					'rules' => 'required|trim',
					'errors' => [
						'required' => 'Kategori Wajib Di Isi!'
					]
				],
				'deskripsi' => [
					'label' => 'deskripsi',
					'rules' => 'required|min_length[15]',
					'errors' => [
						'required' => 'Deskripsi Wajib di isi',
						'min_length' => 'Deskripsi terlalu singkat',					
					]
				]
			];

			$validation->setRules($rules);
			
			if ($validation->run($this->request->getPost()) === FALSE) {

				$data['validation'] = $validation;

				return view('templates/header', $data)
				. view('customer/panel/tambahartikel', $data)
				. view('templates/footer');
			} else {
				$this->modelPanel->aksiTambahArtikel();
				
				$this->session->setFlashdata('pesan', '<div class="alert alert-success mt-1"><i class="fa fa-check-circle" aria-hidden="true"></i> Artikel Berhasil Di Tambahkan, Silahkan Tunggu Persetujuan Admin.</div>');
				return redirect()->to('customer/panel/artikel');
			}
		} else {
			
			echo view('templates/header', $data)
            . view('customer/panel/tambahartikel', $data)
            . view('templates/footer');
		}
	}

	public function ubahartikel($id)
	{
		$session = session();
		$db = \Config\Database::connect();

		$data['judul'] = 'Ubah Artikel';
		$data['customer'] = $db->where('customer', ['username' => $this->session->userdata('username')])->row_array();
		$data['notif'] = $db->where('transaksi', ['status_pembayaran' => '0', 'status_rental' => 'Belum Selesai', 'id_customer' => $this->session->userdata('id_customer')])->num_rows();
		$data['berita'] = $this->modelPanel->getArtikelById($id);
		$data['kategori'] = $db->get('kategori')->result_array();

		$this->validation->set_rules('judul', 'Judul Artikel', 'required|trim', ['required' => 'Judul Artikel Wajib Di Isi!']);
		$this->validation->set_rules('kategori', 'Kategori', 'required|trim', ['required' => 'Judul Kategori Wajib Di Isi!']);
		$this->validation->set_rules('deskripsi', 'Deskripsi', 'required|trim', ['required' => 'Deskripsi Wajib Di Isi!']);
		
		if($this->validation->run() == FALSE) {
			$this->load->view('templates/header', $data);
			$this->load->view('customer/panel/ubahartikel', $data);
			$this->load->view('templates/footer');
		} else {
			$this->Panel_model->aksiUbahArtikel();
			$this->session->setFlashdata('pesan', '<div class="alert alert-success mt-1"><i class="fa fa-check-circle" aria-hidden="true"></i> Artikel Berhasil Di Ubah, Silahkan Tunggu Persetujuan Admin.</div>');
			return redirect('customer/panel/artikel');
		}
	}

	public function hapusartikel($id)
	{
		$session = session();
		$db = \Config\Database::connect();

		$db->delete('berita', ['id_berita' => $id]);
		$this->session->setFlashdata('pesan', '<div class="alert alert-success mt-1"><i class="fa fa-check-circle" aria-hidden="true"></i> Artikel Berhasil Di Hapus.</div>');
		redirect('customer/panel/artikel');
	}

	public function lihat($id)
	{
		$session = session();
		$db = \Config\Database::connect();

		$data['judul'] = 'Lihat Artikel';
		$data['customer'] = $db->where('customer', ['username' => $this->session->userdata('username')])->row_array();
		$data['notif'] = $db->where('transaksi', ['status_pembayaran' => '0', 'status_rental' => 'Belum Selesai', 'id_customer' => $this->session->userdata('id_customer')])->num_rows();
		$data['berita'] = $this->modelPanel->getArtikelById($id);
		$this->load->view('templates/header', $data);
		$this->load->view('customer/panel/lihat', $data);
		$this->load->view('templates/footer');
	}
}