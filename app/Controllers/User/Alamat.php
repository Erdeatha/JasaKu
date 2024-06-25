<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
// use App\Models\AlamatModel;

class Alamat extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }
        $session = session();
        $id_akun = $session->get('user_id');

        $data = [
            'title' => 'Daftar Alamat | Jasaku',
            // 'data' => $this->akunModel->getUserById($id_akun)
        ];

        return view('user/alamat', $data);
    }
}
