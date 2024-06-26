<?php

namespace App\Controllers\Jasa;

use App\Controllers\BaseController;
use App\Models\JasaModel;

class Jasa extends BaseController
{
    protected $jasaModel, $db;

    public function __construct()
    {
        $this->jasaModel = new JasaModel();
    }

    public function index()
    {
        $session = session();
        $userId = $session->get('user_id');

        if (!$userId) {
            return redirect()->to('/login');
        }

        $jasa = $this->jasaModel->getAllJasaWithPriceByUserId($userId);

        $data = [
            'jasa' => $jasa
        ];

        return view('jasa/main', $data);
    }

    public function tambah()
    {
        if ($this->request->getMethod() === 'post') {
            // Validasi dan simpan data jasa
            $file = $this->request->getFile('gambar');
            $fileName = $file->getRandomName();
            $file->move('uploads/', $fileName);

            $data = [
                'id_akun' => session()->get('user_id'),
                'nama' => $this->request->getPost('nama'),
                'kategori' => $this->request->getPost('kategori'),
                'gambar' => $fileName,
                'alamat' => $this->request->getPost('alamat'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'status' => $this->request->getPost('status'),
                'paket_jasa' => $this->request->getPost('paket_jasa') // Ambil data paket jasa dari form
            ];

            $this->jasaModel->saveJasa($data);

            return redirect()->to('/jasa');
        }

        return view('jasa/tambah');
    }



    public function hapus($id)
    {
        // Inisialisasi database
        $db = \Config\Database::connect();

        // Hapus terlebih dahulu data terkait dari tabel ditandai
        $db->table('ditandai')->where('id_jasa', $id)->delete(  );

        // Hapus data dari tabel jasa
        $this->jasaModel->delete($id);

        session()->setFlashdata('success', 'Jasa berhasil dihapus.');
        return redirect()->to(base_url('/jasa'));
    }
}
