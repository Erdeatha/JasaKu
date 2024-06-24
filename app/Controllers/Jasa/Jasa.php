<?php

namespace App\Controllers\Jasa;

use App\Controllers\BaseController;
use App\Models\JasaModel;

class Jasa extends BaseController
{
    public function index()
    {
        $session = session();
        $id_akun = $session->get('user_id');

        $data = [
            'title' => 'Layanan Jasa Saya | Jasaku',
        ];

        return view('jasa/main', $data);
    }
}
