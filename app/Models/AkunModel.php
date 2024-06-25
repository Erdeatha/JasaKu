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
}
