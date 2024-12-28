<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelCustomer;
use App\Models\ModelAuth;
use App\Libraries\Hash;
use Config\Services;

class Auth extends BaseController
{
    protected $session;
    protected $modelUser;
    protected $validation;

    public function __construct()
    {
        helper(['form', 'url']);
        $this->session = session();
        // var_dump("Session Status: " . session_status());
        $this->modelCustomer = new ModelCustomer();
        $this->ModelAuth = new ModelAuth();
        $this->validation = Services::validation();
    }

    public function defaultPage()
    {
        // cek sesi role_id
        if (session()->get('id_role') == 1) {
            // jika role_id = 1
            $this->response->redirect(site_url('admin/dashboard'));
        } elseif (session()->get('id_role') == 2) {
            // jika role_id = 2
            $this->response->redirect(site_url('home'));
        }
    }

    public function index()
    {
        $validation = $this->validation;
        $data['judul'] = 'Login';
        $data['session'] = session();
        $data['validation'] = $validation;
        $this->defaultPage();

        if ($this->request->getMethod() === 'post') {
            // set validasi
            $validation->setRules([
                'username' => 'required|trim',
                'password' => 'required|trim',
            ]);

            // cek validasi
            if (!$this->validate($validation->getRules())) {
                // jika validasi sesuai
                echo view('templates/header', $data)
                    . view('auth/login', $data)
                    . view('templates/footer');
            } else {
                // jika validasi tidak sesuai
                $this->login();
            }
        } else {
            // Form not submitted, load the view without validation
            echo view('templates/header', $data)
                . view('auth/login', $data)
                . view('templates/footer');
        }
    }

    private function login()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        // ambil username
        $customer = $this->modelCustomer->where('username', $username)->first();

        // cek customer
        if ($customer != null) {
            // cek password
            if (password_verify($password, $customer['password'])) {
                // jika password benar
                $data = [
                    'username' => $customer['username'],
                    'id_customer' => $customer['id_customer'],
                    'id_role' => $customer['id_role'],
                ];

                session()->set($data);  // record $data kedalam session

                // cek role_id
                if ($customer['id_role'] == 1) {
                    // jika id_role = 1(admin)
                    $this->response->redirect(base_url('admin/dashboard'));
                } else {
                    // jika bukan 1(admin)
                    $this->response->redirect(base_url('home'));
                }
            } else {
                // jika password salah
                session()->setFlashdata('pesan', '<div class="alert alert-danger"><i class="far fa-lightbulb"></i> Password anda salah, coba lagi!.</div>');
                $this->response->redirect(base_url('auth'));
            }
        } else {
            // jika tidak ada akun
            session()->setFlashdata('pesan', '<div class="alert alert-danger"><i class="far fa-lightbulb"></i> Akun Belum Di Daftar, Tidak Bisa Login!.</div>');
            $this->response->redirect(base_url('auth'));
        }
    }

    public function logout()
    {
        session()->destroy();
        session()->setFlashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Berhasil Logout.</div>');

        $this->response->redirect(base_url('auth'));
    }

    public function daftar()
    {
        $this->defaultPage();
        $validation = $this->validation;
        $data['judul'] = 'Daftar';
        $data['session'] = session();
        $data['validation'] = $validation;

        // Check if the form is submitted
        if ($this->request->getMethod() === 'post') {
            // set validasi
            $validation->setRules([
                'nama' => 'required|trim',
                'username' => 'required|trim|min_length[6]|max_length[8]',
                'password' => 'required|trim|min_length[3]|matches[password2]',
                'password2' => 'required|trim|matches[password]',
                'jk' => 'required|trim',
                'ktp' => 'required|trim',
                'telepon' => 'required|trim',
                'alamat' => 'required|trim',
            ]);

            // cek validasi
            if (!$validation->withRequest($this->request)->run()) {
                // Validation failed
                return view('templates/header', $data)
                    . view('auth/daftar', $data)
                    . view('templates/footer');
            } else {
                // Validation passed
                $dataToInsert = [
                    'nama' => $this->request->getPost('nama'),
                    'username' => $this->request->getPost('username'),
                    'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                    'alamat' => $this->request->getPost('alamat'),
                    'kelamin' => $this->request->getPost('jk'),
                    'telepon' => $this->request->getPost('telepon'),
                    'no_ktp' => $this->request->getPost('ktp'),
                    'id_role' => '2'
                ];

                $this->ModelAuth->aksiDaftar($dataToInsert);
                $this->session->setFlashdata('pesan', '<div class="alert alert-success"><i class="far fa-lightbulb"></i> Akun Berhasil Di Buat, Silahkan Login.</div>');
                $this->response->redirect(site_url('auth'));
            }
        } else {
            // Form not submitted, load the view without validation
            return view('templates/header', $data)
                . view('auth/daftar', $data)
                . view('templates/footer');
        }
    }

    public function gantipass()
    {
        $data['judul'] = 'Ganti Password';
        $data['customer'] = $this->db->get_where('customer', ['username' => $this->session->userdata('username')])->row_array();
        $data['kategori'] = $this->db->get('type')->result_array();

        $this->form_validation->set_rules(
            'passlama',
            'Password Lama',
            'required|trim|min_length[3]',
            [
                'required' => 'Password Lama Harus Di Isi!'
            ]
        );

        $this->form_validation->set_rules(
            'passbaru1',
            'Password Baru',
            'required|trim|matches[passbaru2]',
            [
                'required' => 'Password Baru Harus Di Isi!',
                'min_length' => 'Password Minimal 5 Huruf!',
                'matches' => 'Konfirmasi Password Tidak Sama!'
            ]
        );

        $this->form_validation->set_rules(
            'passbaru2',
            'Konfirmasi Password',
            'required|trim|matches[passbaru1]',
            [
                'required' => 'Konfirmasi Password Harus Di Isi!',
                'matches' => 'Konfirmasi Password Tidak Sama!'
            ]
        );

        if ($this->form_validation->run() == FALSE) {
            return view('templates/header', $data)
             . view('auth/gantipass', $data)
             . view('templates/footer');
        } else {
            $passwordLama = $this->input->post('passlama', true);
            $passwordBaru1 = $this->input->post('passbaru1', true);
            $passwordBaru2 = $this->input->post('passbaru2', true);

            if (!password_verify($passwordLama, $data['customer']['password'])) {
                // Jika password lama salah.
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Password Lama Anda Salah, Coba Lagi!.</div>');
                $this->response->redirect(site_url('auth/gantipass'));
            } else {
                if ($passwordLama == $passwordBaru1) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Password Baru, Tidak Boleh Sama Dengan Password Lama!.</div>');
                    $this->response->redirect(site_url('auth/gantipass'));
                } else {
                    $passwordHash = password_hash($passwordBaru1, PASSWORD_DEFAULT);

                    $this->db->set('password', $passwordHash);
                    $this->db->where('username', $this->session->userdata('username'));
                    $this->db->update('customer');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success"><i class="fa fa-bell" aria-hidden="true"></i> Password Berhasil Di Ganti.</div>');
                    $this->response->redirect(site_url('auth/gantipass'));
                }
            }
        }
    }
}