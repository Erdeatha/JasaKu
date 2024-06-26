<?php

namespace App\Controllers\Jasa;

use App\Controllers\BaseController;
use App\Models\JasaModel;

class Jasa extends BaseController
{
    protected $jasaModel;

    public function __construct()
    {
        $this->jasaModel = new JasaModel();
    }

    public function index()
    {
        $session = session();
        $id_akun = $session->get('user_id');

        $data = [
            'title' => 'Layanan Jasa Saya | Jasaku',
        ];

        return view('jasa/main', $data);
    }

    public function tambah()
    {
        if ($this->request->getMethod() === 'post') {
            // Validasi dan simpan data
            $file = $this->request->getFile('gambar');
            $fileName = $file->getRandomName();
            $file->move('uploads/', $fileName);

            $this->jasaModel->save([
                'nama' => $this->request->getPost('nama'),
                'kategori' => $this->request->getPost('kategori'),
                'slug' => $this->request->getPost('slug'),
                'gambar' => $fileName,
                'status' => $this->request->getPost('status'),
                'rating' => $this->request->getPost('rating'),
                'total_pesanan' => $this->request->getPost('total_pesanan'),
                'difavoritkan' => $this->request->getPost('difavoritkan')
            ]);

            return redirect()->to('/jasa');
        }

        return view('jasa/tambah');
    }
}
