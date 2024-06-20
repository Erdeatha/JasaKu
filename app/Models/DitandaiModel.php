<?php

namespace App\Models;

use CodeIgniter\Model;

class DitandaiModel extends Model
{
    protected $table = 'ditandai';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_akun', 'id_jasa'];

    public function getDitandai($id_akun)
    {
        return $this->where('id_akun', $id_akun)->findAll();
    }
}
