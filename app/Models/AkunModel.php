<?php

namespace App\Models;

use CodeIgniter\Model;

class AkunModel extends Model
{
    protected $table = 'akun';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'email', 'username', 'password', 'nomor_telepon', 'jenis_kelamin', 'tanggal_lahir', 'role', 'foto_profil'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function getUserByUsername($username)
    {
        return $this->where(['username' => $username])->first();
    }

    public function getUserById($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function updateProfilePicture($id, $filename)
    {
        $this->where('id', $id)->set('foto_profil', $filename)->update();
    }

    public function deleteProfilePicture($id)
    {
        // Ambil nama file foto profil yang akan dihapus
        $user = $this->find($id);
        $filename = $user['foto_profil'];

        // Hapus file dari direktori
        if ($filename != null) {
            $path = ROOTPATH . 'public/assets/images/profile/' . $filename;
            if (file_exists($path)) {
                unlink($path); // Hapus file dari direktori
            }
        }

        // Update field foto_profil menjadi null di database
        $this->where('id', $id)->set('foto_profil', null)->update();
    }
}
