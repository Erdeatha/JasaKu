<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\AkunModel;

class Pengaturan extends BaseController
{
    protected $akunModel;

    public function __construct()
    {
        $this->akunModel = new AkunModel();
    }

    public function index()
    {
        $session = session();
        $userId = $session->get('user_id');

        // Ambil data user berdasarkan ID
        $user = $this->akunModel->find($userId);

        $data = [
            'title' => 'Pengaturan | Jasaku',
            'pass' => $user['password'], // Sisipkan password user ke dalam data
        ];

        return view('user/pengaturan', $data);
    }

    public function hapusAkun()
    {
        $session = session();
        $userId = $session->get('user_id');

        // Verifikasi input dari form
        $confirmInput = $this->request->getPost('confirmInput');
        if ($confirmInput === 'Hapus Akun') {
            if ($this->akunModel->delete($userId)) {
                $session->destroy(); // Menghancurkan sesi setelah menghapus akun
                return $this->response->setJSON(['status' => 'success']);
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal menghapus akun.']);
            }
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Konfirmasi tidak sesuai.']);
        }
    }

    // Pengaturan Controller (Pengaturan.php)
    public function ubahPassword()
    {
        if (!session()->get('logged_in')) {
            return redirect()->to(base_url('/login'));
        }

        $session = session();
        $userId = $session->get('user_id');
        $currentPassword = $this->request->getVar('currentPassword');
        $newPassword = $this->request->getVar('newPassword');

        // Ambil data user berdasarkan ID
        $user = $this->akunModel->find($userId);

        if ($user) {
            // Verifikasi password saat ini dengan nilai yang disimpan di session
            if ($currentPassword === $session->get('user_password')) {
                // Validasi password baru
                $validationRules = [
                    'newPassword' => 'required|min_length[5]|max_length[255]',
                ];

                $validationMessages = [
                    'newPassword' => [
                        'required' => 'Password baru diperlukan.',
                        'min_length' => 'Password harus terdiri dari setidaknya 5 karakter.',
                    ],
                ];

                if ($this->validate($validationRules, $validationMessages)) {
                    // Update password dalam database
                    $data = [
                        'password' => $newPassword, // Simpan password tanpa hashing untuk contoh ini
                    ];

                    if ($this->akunModel->update($userId, $data)) {
                        return $this->response->setJSON(['status' => 'success']);
                    } else {
                        return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal mengubah password.']);
                    }
                } else {
                    $errors = $this->validator->getErrors();
                    return $this->response->setJSON(['status' => 'error', 'message' => $errors['newPassword']]);
                }
            } else {
                return $this->response->setJSON(['status' => 'error', 'message' => 'Password saat ini salah.']);
            }
        } else {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Pengguna tidak ditemukan.']);
        }
    }
}
