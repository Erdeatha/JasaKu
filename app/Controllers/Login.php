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
            $pass = $data['password'];
            // Tidak perlu menggunakan password_verify lagi karena tidak menggunakan hashing pada password
            // Hanya perlu membandingkan password yang dimasukkan dengan password yang ada di database
            if ($password === $pass) {
                $ses_data = [
                    'user_id'       => $data['id'],
                    'user_name'     => $data['nama'],
                    'user_username' => $data['username'],
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