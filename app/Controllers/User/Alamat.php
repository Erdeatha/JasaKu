<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
// use App\Models\AlamatModel;

class Alamat extends BaseController
{
    // protected $akunModel;

    // public function __construct()
    // {
    //     $this->akunModel = new AkunModel();
    // }

    public function index()
    {
        $session = session();
        $id_akun = $session->get('user_id');

        $data = [
            'title' => 'Daftar Alamat | Jasaku',
            // 'data' => $this->akunModel->getUserById($id_akun)
        ];

        return view('user/alamat', $data);
    }
}
