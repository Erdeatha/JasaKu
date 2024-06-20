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
    $jasa = $jasaModel->getAllJasaWithPrice();

    $data = [
      'jasa' => $jasa
    ];

    return view('user/home', $data);
  }

  public function detailJasa($slug)
  {
    $jasaModel = new JasaModel();
    $jasa = $jasaModel->getJasa($slug);

    if (!$jasa) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Jasa ' . $slug . ' tidak ditemukan.');
    }

    // Ambil paket jasa berdasarkan id jasa
    $paketJasa = $jasaModel->getPaketJasaById($jasa['id']);

    $data = [
      'jasa' => $jasa,
      'paket_jasa' => $paketJasa
    ];

    return view('user/detailJasa', $data);
  }
}
