<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\DitandaiModel;
use App\Models\JasaModel;

class Ditandai extends BaseController
{
    protected $ditandaiModel;
    protected $jasaModel;

    public function __construct()
    {
        $this->ditandaiModel = new DitandaiModel();
        $this->jasaModel = new JasaModel();
    }

    public function index()
    {

        $session = session();
        $id_akun = $session->get('user_id');
        $ditandaiList = $this->ditandaiModel->getDitandai($id_akun);
        $list =[];
        foreach($ditandaiList as $ditandai){
            $jasa = $this->jasaModel-> getJasaById($ditandai['id_jasa']);
            if($jasa){
                $list[] = $jasa;
            }
        }

        $data = [
            'title' => 'Ditandai | Jasaku',
            'ditandai' => $list
        ];

        return view('user/ditandai', $data);
    }
}
