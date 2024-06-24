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
        } else {
            $newName = $this->akunModel->getUserById($id)['foto_profil'];
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

    public function uploadFoto()
    {
        $id = session()->get('user_id');

        // Handle file upload
        $file = $this->request->getFile('foto_profil');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/assets/images/profile', $newName);

            // Simpan nama file baru ke dalam database
            $this->akunModel->updateProfilePicture($id, $newName);
        }

        // Handle delete foto profil
        if ($this->request->getPost('delete_foto_profil')) {
            $user = $this->akunModel->getUserById($id);
            if ($user['foto_profil']) {
                // Hapus file foto profil dari folder
                unlink(ROOTPATH . 'public/assets/images/profile/' . $user['foto_profil']);
            }
            // Hapus nama file foto profil dari database
            $this->akunModel->updateProfilePicture($id, null);
            return redirect()->to('/profil');
        }

        return redirect()->to('/profil');
    }
}
