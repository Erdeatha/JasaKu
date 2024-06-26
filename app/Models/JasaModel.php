<?php

namespace App\Models;

use CodeIgniter\Model;

class JasaModel extends Model
{
    protected $table = 'jasa';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_akun', 'slug', 'nama', 'kategori', 'gambar', 'alamat', 'deskripsi', 'status', 'rating', 'total_pesanan', 'difavoritkan'];

    public function getJasa($slug = false)
    {
        if ($slug === false) {
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
        $builder->select('jasa.*, paket_jasa.harga');
        $builder->join('paket_jasa', 'paket_jasa.id_jasa = jasa.id');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getPaketJasaById($idJasa)
    {
        return $this->db->table('paket_jasa')->where('id_jasa', $idJasa)->get()->getResultArray();
    }

    // JasaModel.php
    public function getAllJasaWithPriceByUserId($userId)
    {
        $builder = $this->db->table('jasa');
        $builder->select('jasa.*, paket_jasa.harga');
        $builder->join('paket_jasa', 'paket_jasa.id_jasa = jasa.id', 'left');
        $builder->where('jasa.id_akun', $userId);
        $query = $builder->get();
        return $query->getResultArray();
    }



    public function getJasaByUserId($userId)
    {
        return $this->where('id_akun', $userId)->findAll();
    }

    public function saveJasa($data)
    {
        $slug = url_title($data['nama'], '-', true); // Generate slug based on nama
        $this->save([
            'id_akun' => $data['id_akun'],
            'slug' => $slug,
            'nama' => $data['nama'],
            'kategori' => $data['kategori'],
            'gambar' => $data['gambar'],
            'alamat' => $data['alamat'],
            'deskripsi' => $data['deskripsi'],
            'status' => $data['status'],
            'rating' => 0, // Default rating
            'total_pesanan' => 0, // Default total_pesanan
            'difavoritkan' => 0 // Default difavoritkan
        ]);

        // Ambil ID jasa yang baru saja disimpan
        $idJasa = $this->insertID();

        // Simpan paket-paket jasa jika ada
        if (!empty($data['paket_jasa'])) {
            $paketJasaData = [];
            foreach ($data['paket_jasa'] as $paket) {
                $paketJasaData[] = [
                    'id_jasa' => $idJasa,
                    'nama' => $paket['nama'],
                    'rincian' => $paket['rincian'],
                    'harga' => $paket['harga'],
                    'estimasi' => $paket['estimasi']
                ];
            }
            $this->db->table('paket_jasa')->insertBatch($paketJasaData);
        }
    }
}
