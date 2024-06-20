<?php

namespace App\Controllers;

use App\Models\AkunModel;

class Register extends BaseController
{
	protected $AkunModel;
	public function __construct()
	{
		$this->AkunModel = new AkunModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Register',
			'validation' => \Config\Services::validation()
		];

		return view('auth/register', $data);
	}

	public function save()
	{
		// //melakukan validasi
		if (!$this->validate([
			'username' => [
				'rules' => 'is_unique[akun.username]',
				'errors' => [
					'is_unique' => '{field} sudah ada.',
				]
			],
			'password' => [
				'rules' => 'min_length[5]',
				'errors' => [
					'min_length' => '{field} minimal 5 karakter.'
				]
			],
		])) {

			return redirect()->to(base_url('/register'))->withInput();
		}

		$this->AkunModel->save([
			'nama' => $this->request->getVar('nama'),
			'username' => $this->request->getVar('username'),
			'password' => $this->request->getVar('password'), // Tidak menggunakan password_hash
      		'nomor_telepon' => $this->request->getVar('nomor_telepon'),
      		'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
      		'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
      		'role' => 'user'
		]);

		return redirect()->to(base_url('/login'));
	}
	//--------------------------------------------------------------------

}
