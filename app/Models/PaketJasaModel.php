<?php 

namespace App\Models;

use CodeIgniter\Model;

class PaketJasaModel extends Model
{
    protected $table = 'paket_jasa';
    protected $primaryKey = 'id';
    protected $useTimestamps = false;
    protected $allowedFields = ['id_jasa', 'nama', 'rincian', 'harga', 'estimasi'];

    public function getPaketJasaWithJasa($idJasa)
    {
        return $this->select('paket_jasa.*, jasa.nama as jasa_nama')
                    ->join('jasa', 'jasa.id = paket_jasa.id_jasa')
                    ->where('paket_jasa.id_jasa', $idJasa)
                    ->findAll();
    }
}
