<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\AkunModel;

class Profil extends BaseController
{
    protected $akunModel;

    public function __construct()
    {
        $this->akunModel = new AkunModel();
    }

    public function index()
    {
        $session = session();
        $id_akun = $session->get('user_id');
        $data = [
            'title' => 'Profil | Jasaku',
            'validation' => \Config\Services::validation(),
            'data' => $this->akunModel->getUserById($id_akun)
        ];

        return view('user/profil', $data);
    }

    public function update($id)
    {
        $oldUsername = $this->akunModel->getUserById($id);
        if($oldUsername['username'] == $this->request->getVar('username')){
            $rule = 'required';
        }else{
            $rule ='required|is_unique[akun.username]';
        }
        $rules = [
            'username' => [
                'rules' => $rule,
                'errors' => [
                    'required' => 'Username tidak boleh kosong',
                    'is_unique' => 'Username sudah terdaftar'
                ]
            ],
            'email' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Email tidak boleh kosong',
                    'valid_email' => 'Email harus berupa email yang valid',
                    'is_unique' => 'Email sudah terdaftar'
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong'
                ]
            ],
            'nomor_telepon' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nomor Telepon tidak boleh kosong'
                ]
            ],
            'jenis_kelamin' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Jenis Kelamin tidak boleh kosong'
                ]
            ],
            'tanggal_lahir' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tanggal Lahir tidak boleh kosong'
                ]
            ]
        ];

        if (!$this->validate($rules)) {
            return redirect()->to('/profil')->withInput()->with('validation', $this->validator);
        }

        $this->akunModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'nomor_telepon' => $this->request->getVar('nomor_telepon'),
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir')
        ]);

        return redirect()->to('/profil');
    }
}
