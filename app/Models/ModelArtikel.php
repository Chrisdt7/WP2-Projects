<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelArtikel extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';
    protected $allowedFields = ['judul_berita', 'deskripsi', 'id_kategori', 'tgl_post', 'updateby', 'terbit', 'foto_berita'];

    public function getBeritaKategori($limit, $start, $keyword = null)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('kategori', 'kategori.id_kategori = berita.id_kategori');
        $builder->orderBy('berita.id_berita', 'DESC');

        if ($keyword) {
            $builder->like('judul_berita', $keyword);
        }

        return $builder->get($limit, $start)->getResultArray();
    }

    public function getAllBeritaKategori()
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('kategori', 'kategori.id_kategori = berita.id_kategori');
        $builder->orderBy('berita.id_berita', 'DESC');

        return $builder->get()->getResultArray();
    }

    public function tambahArtikel()
    {
        $fotoBerita = $this->request->getFile('foto');

        if ($fotoBerita->isValid() && !$fotoBerita->hasMoved()) {
            $fotoBerita->move('./assets/berita/');
            $data = [
                'judul_berita' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'id_kategori' => $this->request->getPost('kategori'),
                'tgl_post' => date('Y-m-d'),
                'updateby' => session()->get('id_customer'),
                'terbit' => '0',
                'foto_berita' => $fotoBerita->getName(),
            ];

            $this->insert($data);
        }
    }

    public function getArtikelUbah($id)
    {
        return $this->find($id);
    }

    public function ubahDataArtikel($pos)
    {
        $fotoBerita = $this->request->getFile('foto');

        if ($fotoBerita->isValid() && !$fotoBerita->hasMoved()) {
            $fotoBerita->move('./assets/berita/');
            $data = [
                'judul_berita' => $pos['judul'],
                'deskripsi' => $pos['deskripsi'],
                'id_kategori' => $pos['kategori'],
                'foto_berita' => $fotoBerita->getName(),
            ];

            $this->update($pos['id_berita'], $data);
        }
    }

    public function count_all_artikel()
    {
        return $this->countAll();
    }

    public function joinBeritaCustomer($id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('customer', 'customer.id_customer = berita.updateby');
        $builder->join('kategori', 'kategori.id_kategori = berita.id_kategori');
        $builder->where('berita.id_berita', $id);

        return $builder->get()->getRowArray();
    }

    public function joinArtikelKategori()
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('kategori', 'kategori.id_kategori = berita.id_kategori');
        $builder->where('berita.id_kategori', 'kategori.id_kategori');

        return $builder->get()->getResultArray();
    }

    public function joinBeritaKategoriById($id)
    {
        $builder = $this->db->table($this->table);
        $builder->select('*');
        $builder->join('kategori', 'kategori.id_kategori = berita.id_kategori');
        $builder->where('berita.id_kategori', $id);

        return $builder->get()->getResultArray();
    }
}