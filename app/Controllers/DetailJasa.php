<?php

namespace App\Controllers;

use App\Models\JasaModel;
use App\Models\PaketJasaModel;

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
        $paketJasaModel = new PaketJasaModel();
        
        $jasa = $jasaModel->where('slug', $slug)->first();
        
        if (!$jasa) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Jasa ' . $slug . ' tidak ditemukan.');
        }
        
        $paketJasa = $paketJasaModel->getPaketJasaWithJasa($jasa['id']);

        $data = [
            'jasa' => $jasa,
            'paket_jasa' => $paketJasa
        ];

        return view('user/detailJasa', $data);
    }
}
