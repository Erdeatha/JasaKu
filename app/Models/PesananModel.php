<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananModel extends Model
{
    protected $table = 'pesanan';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'id_pemesan',
        'id_jasa',
        'id_paket',
        'tanggal_mulai',
        'jam_mulai',
        'alamat',
        'catatan',
        'metode',
        'total_pembayaran',
        'status'
    ];

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
