<?php

namespace App\Models;

use CodeIgniter\Model;

class NotifikasiModel extends Model
{
    protected $table = 'notifikasi';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_akun', 'head', 'deskripsi', 'timestamp'];

    public function getNotifikasi($id_akun)
    {
        return $this->where('id_akun', $id_akun)->findAll();
    }
}
