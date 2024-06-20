<?php

namespace App\Models;

use CodeIgniter\Model;

class PaketJasaModel extends Model
{
    protected $table = 'paket_jasa';
    protected $primaryKey = 'id';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_jasa', 'nama', 'rincian', 'harga', 'estimasi'];
}
