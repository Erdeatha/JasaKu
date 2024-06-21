<?php

namespace App\Controllers;

use App\Models\AkunModel;

class Login extends BaseController
{
    protected $akunModel;

    public function __construct()
    {
        $this->akunModel = new AkunModel();
    }

    public function index()
    {
        return view('auth/login');
    }

    public function auth()
    {
        $session = session();

        //mengambil data dari form login
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');

        //mengambil data dari database
        $data = $this->akunModel->getUserByUsername($username);

        if ($data) {
            // Tidak perlu menggunakan password_verify karena tidak di-hash saat register
            if ($password === $data['password']) {
                $ses_data = [
                    'user_id'       => $data['id'],
                    'user_name'     => $data['nama'],
                    'user_username' => $data['username'],
                    'user_password' => $data['password'], // Simpan password dalam bentuk plain text untuk contoh ini
                    'role'          => $data['role'],
                    'logged_in'     => TRUE
                ];
                $session->set($ses_data);

                //masuk ke menu home
                return redirect()->to(base_url('/'));
            } else {
                $session->setFlashdata('msg', 'Username dan Password Tidak Sesuai');
                return redirect()->to(base_url('/login'));
            }
        } else {
            $session->setFlashdata('msg', 'Username Tidak Ditemukan');
            return redirect()->to(base_url('/login'));
        }
    }

    //untuk logout
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}