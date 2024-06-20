<?php

namespace App\Models;

use CodeIgniter\Model;

class JasaModel extends Model
{
    protected $table = 'jasa';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'kategori', 'slug', 'gambar', 'status', 'rating', 'total_pesanan', 'difavoritkan'];

    public function getJasa($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }

    public function getJasaById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function getAllJasaWithPrice()
{
    $builder = $this->db->table('jasa');
    $builder->select('jasa.*');
    $query = $builder->get();
    $jasaList = $query->getResultArray();

    foreach ($jasaList as &$jasa) {
        $jasa['paket'] = $this->getPaketJasaById($jasa['id']);
    }

    return $jasaList;
}

    // Model JasaModel.php
    public function getPaketJasaById($idJasa)
    {
        return $this->db->table('paket_jasa')->where('id_jasa', $idJasa)->get()->getResultArray();
    }
}
