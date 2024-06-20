<?php

namespace App\Controllers;

use App\Models\PesananModel;
use App\Models\JasaModel;
use App\Models\PaketJasaModel;

class PesananController extends BaseController
{
  public function create()
  {
    $jasaModel = new JasaModel();
    $paketJasaModel = new PaketJasaModel();

    $idJasa = $this->request->getGet('id_jasa');
    $idPaket = $this->request->getGet('id_paket');

    $jasa = $jasaModel->find($idJasa);
    $paket = $paketJasaModel->find($idPaket);

    if (!$jasa || !$paket) {
      return redirect()->to(base_url('/'));
    }

    return view('user/pesan', [
      'jasa' => $jasa,
      'paket' => $paket,
      'id_paket' => $idPaket,
      'harga' => $paket['harga']
    ]);
  }

  public function store()
  {
    $pesananModel = new PesananModel();

    $data = [
      'id_pemesan' => session()->get('user_id'),
      'id_jasa' => $this->request->getPost('id_jasa'),
      'id_paket' => $this->request->getPost('id_paket'),
      'tanggal_mulai' => $this->request->getPost('tanggal_mulai'),
      'jam_mulai' => $this->request->getPost('jam_mulai'),
      'alamat' => $this->request->getPost('alamat'),
      'catatan' => $this->request->getPost('catatan'),
      'metode' => $this->request->getPost('metode'),
      'total_pembayaran' => $this->request->getPost('total_pembayaran'),
      'status' => 'menunggu_konfirmasi'
    ];

    $pesananModel->save($data);

    // Mengirimkan data pesanan yang baru saja disimpan ke view pesanan_success.php
    return redirect()->to(base_url('/pesanan/success'))->with('pesanan', $data);
  }


  public function success()
  {
    // Mengambil data pesanan dari flash data
    $pesanan = session()->getFlashdata('pesanan');

    return view('user/pesanan_success', ['pesanan' => $pesanan]); // Kirim variabel $pesanan ke view
  }


  public function cancel($id)
  {
    $pesananModel = new PesananModel();
    $pesanan = $pesananModel->find($id);

    if (!$pesanan) {
      return redirect()->to(base_url('/'));
    }

    $pesananModel->update($id, ['status' => 'dibatalkan']);

    return redirect()->to(base_url('/pesanan/success'));
  }
}
