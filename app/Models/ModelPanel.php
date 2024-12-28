<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPanel extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['judul_berita', 'deskripsi', 'id_kategori', 'tgl_post', 'updateby', 'terbit', 'foto_berita'];

    public function getAllByUser($limit, $offset, $keyword = null)
	{
		$builder = $this->db->table('berita');
		$builder->select('*');
		$builder->join('customer', 'customer.id_customer = berita.updateby');
		$builder->join('kategori', 'kategori.id_kategori = berita.id_kategori');
		$builder->where('berita.updateby', session('id_customer'));

		if ($keyword) {
			$builder->like('judul_berita', $keyword);
		}

		$totalRows = $builder->countAllResults(false); // Count total rows without limiting the query
		$builder->orderBy('berita.id_berita', 'DESC');
		
		$builder->limit($limit, $offset);

		$result = $builder->get()->getResultArray();

		$pager = \Config\Services::pager();

		$config = [
			'baseURL' => site_url('customer/panel/artikel'),
			'totalRows' => $totalRows,
			'per_page' => $limit,
			'uri_segment' => 5,
			'num_links' => 2,
		];

		$pager->makeLinks($offset, $limit, $totalRows, 'default_full');

		return ['result' => $result, 'pager' => $pager];
	}

    public function aksiTambahArtikel()
    {
        $uploadPath = 'assets/berita/';

        try {
            $foto = $this->request->getFile('foto');

            if ($foto && $foto->isValid() && !$foto->hasMoved()) {
                $config['allowedTypes'] = 'gif|png|jpg|jpeg';
                $config['maxSize'] = 2048;
                $config['uploadPath'] = $uploadPath;

                $foto->setRules($config);

                if ($foto->isValid() && $foto->move(ROOTPATH . '/' . $uploadPath)) {
                    $data = [
                        'judul_berita' => $this->request->getPost('judul'),
                        'deskripsi' => $this->request->getPost('deskripsi'),
                        'id_kategori' => $this->request->getPost('kategori'),
                        'tgl_post' => date('Y-m-d'),
                        'updateby' => session('id_customer'),
                        'terbit' => '0',
                        'foto_berita' => $foto->getName()
                    ];

                    $this->insert($data);
                    return $this->db->insertID();
                } else {
                    echo $foto->getErrorString();
                }
            } else {
                echo "No file uploaded with the name 'foto'";
            }
        } catch (\Throwable $th) {
            echo "Error: " . $th->getMessage();
        }
    }

    public function aksiUbahArtikel()
    {
        $foto = $this->request->getFile('foto');

        if ($foto->isValid() && !$foto->hasMoved()) {
            $config['allowedTypes'] = 'gif|png|jpg';
            $config['maxSize'] = 2048;
            $config['uploadPath'] = 'assets/berita/';

            $foto->setRules($config);

            if ($foto->isValid() && $foto->move()) {
                $fotoLama = $this->request->getPost('fotoLama');
                if ($fotoLama != 'default.jpg') {
                    unlink(FCPATH . 'assets/berita/' . $fotoLama);
                }

                $fotoBaru = $foto->getName();
                $this->set('foto_berita', $fotoBaru);
            } else {
                echo $foto->getErrorString();
            }
        }

        $id_berita = $this->request->getPost('id_berita', true);
        $data = [
            'judul_berita' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'id_kategori' => $this->request->getPost('kategori')
        ];

        $this->where('id_berita', $id_berita)->update($data);
    }

    public function getArtikelById($id)
    {
        return $this->where('id_berita', $id)->first();
    }

    public function countAllArtikel()
    {
        return $this->where('updateby', session('id_customer'))->countAllResults();
    }

    public function countAllTransaksi()
    {
        $status_pembayaran = '0';
        return $this->db->table('transaksi')->where(['id_customer' => session('id_customer'), 'status_pembayaran' => $status_pembayaran])->countAllResults();
    }
}
