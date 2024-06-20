<?php

namespace App\Controllers;

use App\Models\JasaModel;

class Home extends BaseController
{
    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }

        $jasaModel = new JasaModel();
        $jasa = $jasaModel->findAll();

        $data = [
            'jasa' => $jasa
        ];

        return view('user/home', $data);
    }

    public function detail($slug)
    {
        $jasaModel = new JasaModel();
        $jasa = $jasaModel->getJasa($slug);

        if (!$jasa) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Jasa ' . $slug . ' tidak ditemukan.');
        }

        $data = [
            'jasa' => $jasa
        ];

        return view('user/detail', $data);
    }
}
