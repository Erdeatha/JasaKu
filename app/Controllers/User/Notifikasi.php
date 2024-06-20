<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\NotifikasiModel;

class Notifikasi extends BaseController
{
    protected $notifikasiModel;

    public function __construct()
    {
        $this->notifikasiModel = new NotifikasiModel();
    }

    public function index()
    {
        $session = session();
        $id_akun = $session->get('user_id');

        $data = [
            'title' => 'Notifikasi | Jasaku',
            'notifikasi' => $this->notifikasiModel->getNotifikasi($id_akun)
        ];

        return view('user/notifikasi', $data);
    }
}
