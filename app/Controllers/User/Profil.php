<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\AkunModel;

class Profil extends BaseController
{
    protected $akunModel;

    public function __construct()
    {
        $this->akunModel = new AkunModel();
    }

    public function index()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }
        $session = session();
        $id_akun = $session->get('user_id');
        $data = [
            'title' => 'Profil | Jasaku',
            'validation' => \Config\Services::validation(),
            'data' => $this->akunModel->getUserById($id_akun)
        ];

        return view('user/profil', $data);
    }

    public function update($id)
    {
        $oldUsername = $this->akunModel->getUserById($id);
        $rule = $oldUsername['username'] === $this->request->getVar('username') ? 'required' : 'required|is_unique[akun.username]';

        $rules = [
            'username' => [
                'rules' => $rule,
                'errors' => [
                    'required' => 'Username tidak boleh kosong',
                    'is_unique' => 'Username sudah terdaftar'
                ]
            ],
            'email' => [
                'rules' => 'required|valid_email',
                'errors' => [
                    'required' => 'Email tidak boleh kosong',
                    'valid_email' => 'Email harus berupa email yang valid'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong'
                ]
            ],
            'nomor_telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Telepon tidak boleh kosong'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin tidak boleh kosong'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir tidak boleh kosong'
                ]
            ],
        ];

        // Validasi form
        if (!$this->validate($rules)) {
            return redirect()->to('/profil')->withInput()->with('validation', $this->validator);
        }

        // Handle file upload for profile picture
        $file = $this->request->getFile('foto_profil');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/assets/images/profile', $newName);

            // Hapus foto lama jika ada
            $oldPhoto = $this->request->getVar('foto_profil_lama');
            if ($oldPhoto && file_exists(ROOTPATH . 'public/assets/images/profile/' . $oldPhoto)) {
                unlink(ROOTPATH . 'public/assets/images/profile/' . $oldPhoto);
            }
        } else {
            $newName = $this->request->getVar('foto_profil_lama');
        }

        // Save profile data to database
        $this->akunModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'nomor_telepon' => $this->request->getVar('nomor_telepon'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'foto_profil' => $newName // Update nama file foto profil
        ]);

        return redirect()->to('/profil');
    }
}
