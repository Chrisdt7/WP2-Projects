<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use Config\Services;

class Artikel extends BaseController
{
    public function __construct()
    {
        $this->artikelModel = new \App\Models\ModelArtikel();
        $this->session = session();
    }

    public function index()
    {
        $data['session'] = session();
		$db = \Config\Database::connect();
        $this->form_validation = \Config\Services::validation();

        $data['judul'] = 'Data Artikel';
        $data['customer'] = $db->table('customer')
            ->getWhere(['username' => $this->session->get('username')])
            ->getRowArray();

        if ($this->request->getPost('submit')) {
            $data['keyword'] = $this->request->getPost('keyword');
            $this->session->set('keyword', $data['keyword']);
        } elseif ($this->request->getPost('reset')) {
            $this->session->remove('keyword');
        } else {
            $data['keyword'] = $this->session->get('keyword');
        }

        $builder = $db->table('berita');

        if ($data['keyword'] !== null) {
            $builder->like('judul_berita', $data['keyword']);
        }

        $data['total_rows'] = $builder->countAllResults();

        $config['use_page_numbers'] = true;
        $pager = \Config\Services::pager();
        $pager->setSegment(3);

        $config['base_url'] = site_url('admin/artikel');
        $config['total_rows'] = $data['total_rows'];
        $config['per_page'] = 2;
        $config['num_links'] = 2;

        // ... (pagination configuration)
        $sql = $builder->getCompiledSelect();
        $data['start'] = (int) $this->request->getGet('page') ?: 0;
        $data['artikel'] = $this->artikelModel->getBeritaKategori($config['per_page'], $data['start'], $data['keyword']);
        $data['pager'] = $this->artikelModel->pager;
        $data['pager'] = $pager;
        $data['kategori'] = $db->table('kategori')->get()->getResultArray();

        $this->aturanForm();

        if ($this->form_validation->run() == FALSE) {
            echo view('templates/header-admin', $data)
             . view('templates/sidebar-admin', $data)
             . view('admin/artikel/index', $data)
             . view('templates/footer-admin');
        } else {
            $this->artikelModel->tambahArtikel();
            session()->setFlashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Artikel Berhasil Di Tambahkan.</div>');
            return redirect()->to('admin/artikel');
        }
    }

    public function getubah()
    {
        $data['session'] = session();
		$db = \Config\Database::connect();

        $id = $this->request->getPost('id');
        echo json_encode($this->artikelModel->getArtikelUbah($id));
    }

    public function ubahartikel()
    {
        $data['session'] = session();
		$db = \Config\Database::connect();

        $this->artikelModel->ubahDataArtikel($this->request->getPost());
        session()->setFlashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Artikel Berhasil Di Ubah.</div>');
        return redirect()->to('admin/artikel');
    }

    public function hapus($id)
    {
        $data['session'] = session();
		$db = \Config\Database::connect();

        $row = $db->table('berita')->where('id_berita', $id)->get()->getRowArray();
        unlink(ROOTPATH . 'public/assets/berita/' . $row['foto_berita']);
        $db->table('berita')->where('id_berita', $id)->delete();
        session()->setFlashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Data Artikel Berhasil Di Hapus.</div>');
        return redirect()->to('admin/artikel');
    }

    public function aturanForm()
    {
        $data['session'] = session();
		$db = \Config\Database::connect();
        $validation = \Config\Services::validation();

        $rules = [
            'judul' => [
                'label' => 'Judul Berita',
                'rules' => 'required|trim',
                'errors' => ['required' => 'Judul Berita Wajib Isi!']
            ],
            'kategori' => [
                'label' => 'Kategori',
                'rules' => 'required|trim',
                'errors' => ['required' => 'Kategori Wajib Isi!']
            ],
            'deskripsi' => [
                'label' => 'Deskripsi',
                'rules' => 'required|trim',
                'errors' => ['required' => 'Deskripsi Wajib Isi!']
            ],
        ];
        
        $validation->setRules($rules);        
    }

    public function review($id)
    {
        $data['session'] = session();
		$db = \Config\Database::connect();

        $data['judul'] = 'Review Artikel';
        $data['review'] = $db->table('berita')->getWhere(['id_berita' => $id])->getRowArray();

        $validation = \Config\Services::validation();

        $validation->setRules('terbit', 'Terbit', 'required|trim', ['required' => 'Terbit Wajib Di Isi!']);

        if ($validation->run() == FALSE) {
            echo view('themeplates_admin/header', $data)
             . view('admin/artikel/review', $data)
             . view('themeplates_admin/footer', $data);
        } else {
            $this->terbit($id);
        }
    }

    public function terbit($id)
    {
        $data['session'] = session();
		$db = \Config\Database::connect();

        $db->table('berita')->set('terbit', '1')->where('id_berita', $id)->update();
        session()->setFlashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Artikel Berhasil Di Publikasikan.</div>');
        return redirect()->to('admin/artikel');
    }

    public function ubahdeskripsi()
    {
        $data['session'] = session();
		$db = \Config\Database::connect();
        
        $deskripsi = $this->request->getPost('deskripsi', true);
        $id_berita = $this->request->getPost('id_berita', true);
        $db->table('berita')->set('deskripsi', $deskripsi)->where('id_berita', $id_berita)->update();
        session()->setFlashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Deskripsi Artikel Berhasil Di Ubah.</div>');
        return redirect()->to('admin/artikel');
    }
}
