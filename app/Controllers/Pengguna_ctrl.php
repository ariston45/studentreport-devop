<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;
use App\Models\TenantModel;
use App\Models\DbModel;
use App\Models\UserModel;
use App\Models\StudentModel;

class Pengguna_ctrl extends BaseController
{
	public function __construct()
	{
		$this->AuthModel = new AuthModel();
		$this->TenantModel = new TenantModel();
		$this->DbModel = new DbModel();
		$this->UserModel = new UserModel();
		$this->StudentModel = new StudentModel();
		$this->session = \Config\Services::session();
		$this->logged_in = $this->session->get('logged_in');
		$this->id_access = $this->session->get('u_id');
	}
	#####
	public function SwitchExample()
	{
		switch ($this->session->get('u_rules_access')) {
			case 'MGNT_SUPERADMIN':
				# code...
				break;

			case 'MGNT_ADMIN':
				# code...
				break;

			case 'MGNT_MARKETING':
				# code...
				break;

			case 'TNT_SUPERADMIN':
				# code...
				break;

			case 'TNT_ADMIN':
				# code...
				break;

			case 'TNT_TEACHER':
				# code...
				break;

			case 'TNT_PARENT':
				# code...
				break;

			default:
				# code...
				break;
		}
	}
	#####
	public function index()
	{
		$pengguna = $this->UserModel->ListUserMGNT();
		switch ($this->session->get('u_rules_access')) {
			case 'MGNT_SUPERADMIN':
				$this->partial = [
					'title' => 'Customers',
					'menu' => 'view_features/listmenu/menus_mgnt_superadmin',
					'style' => [
						0 => 'plugins/datatables/scr_style',
					],
					'javascript' => [
						0 => 'plugins/datatables/scr_javascript',
						1 => 'plugins/uploadinput/scr_javascript',
					],
					'segments' => [
						1 => $this->request->uri->getSegment(1),
						2 => $this->request->uri->getSegment(2)
					],
					'heading' => 'view_features/listmenu/heading',
					'pgtitle' => $this->session->get('sch_name'),
					'breadcrumb' => [
						'customers' => 'Customers'
					],
					'content'	=> [
						'content_menu' => '',
						'content_body' => 'view_features/pengguna/rls_mgnt_superadmin/pg_pengguna'
					],
					'data' => [
						"pengguna" => $pengguna
					]
				];
				return view('layout/main_layout', $this->partial);
				break;

			case 'MGNT_MARKETING':
				# code...
				break;

			case 'MGNT_ADMIN':
				
				break;
			case 'TNT_SUPERADMIN':
				# code...
				break;
			case 'TNT_ADMIN':
				# code...
				break;

			case 'TNT_TEACHER':
				# code...
				break;

			case 'TNT_PARENT':
				# code...
				break;

			default:
				// return redirect()->to(base_url('/login'));
				break;
		}
	}
	#####
	public function TambahUserMgnt()
	{
		$pengguna = $this->UserModel->ListUserMGNT();
		$this->partial = [
			'title' => 'Customers',
			'menu' => 'view_features/listmenu/menus_mgnt_superadmin',
			'style' => [
				0 => 'plugins/datatables/scr_style',
			],
			'javascript' => [
				0 => 'plugins/datatables/scr_javascript',
				1 => 'plugins/uploadinput/scr_javascript',
			],
			'segments' => [
				1 => $this->request->uri->getSegment(1),
				2 => $this->request->uri->getSegment(2)
			],
			'heading' => 'view_features/listmenu/heading',
			'pgtitle' => $this->session->get('sch_name'),
			'breadcrumb' => [
				'customers' => 'Customers'
			],
			'content'	=> [
				'content_menu' => '',
				'content_body' => 'view_features/pengguna/rls_mgnt_superadmin/pg_tambah_pengguna'
			],
			'data' => [
				"pengguna" => $pengguna
			]
		];
		return view('layout/main_layout', $this->partial);
	}
	#####
	public function NewUserIds()
	{
		$maxid = $this->UserModel->MaxIdUser();
		foreach ($maxid as $key => $value) {
			$i = $value['id'] + 1;
		}
		return $i;
	}
	#####
	public function EksekusiTambahUserMgnt()
	{
		if ($_POST['akses'] == '') {
			session()->setFlashdata('notif_akses_error', 'User Belum di beri hak akses.');
			return redirect()->back()->withInput();
		}
		$id = $this->NewUserIds();
		$user = [
			'u_id' => $id,
			'u_name' => $_POST['nama'],
			'u_rules_access' => $_POST['akses'],
			'u_id_access' => 'MGNT',
			'u_email' => $_POST['email'],
			'u_password' => $_POST['password'],
		];

		$user_meta = [
			'u_id' => $id,
			'u_fullname' => $_POST['nama'],
			'u_address' => $_POST['alamat'],
			'u_phone' => $_POST['telepon'],
			'u_scnd_email' => false,
			'u_job_position' => $_POST['jabatan'],
		];

		$this->UserModel->StoreUserv1($user);
		$this->UserModel->StoreUserMeta($user_meta);
		session()->setFlashdata('success', 'Data user telah berhasil ditambahkan.');
		return redirect()->back()->withInput();
	}
	#####
	public function UpdateUserMgnt($id)
	{
		$pengguna = $this->UserModel->ListUserDetMGNT($id);
		$this->partial = [
			'title' => 'Customers',
			'menu' => 'view_features/listmenu/menus_mgnt_superadmin',
			'style' => [
				0 => 'plugins/datatables/scr_style',
			],
			'javascript' => [
				0 => 'plugins/datatables/scr_javascript',
				1 => 'plugins/uploadinput/scr_javascript',
			],
			'segments' => [
				1 => $this->request->uri->getSegment(1),
				2 => $this->request->uri->getSegment(2)
			],
			'heading' => 'view_features/listmenu/heading',
			'pgtitle' => $this->session->get('sch_name'),
			'breadcrumb' => [
				'customers' => 'Customers'
			],
			'content'	=> [
				'content_menu' => '',
				'content_body' => 'view_features/pengguna/rls_mgnt_superadmin/pg_update_pengguna'
			],
			'data' => [
				'pengguna' => $pengguna,
				'id' => $id
			]
		];
		return view('layout/main_layout', $this->partial);
	}
	#####
	public function EksekusiUpdateUserMgnt($id)
	{
		if($_POST['password'] != '') {
			$user = [
				'u_name' => $_POST['nama'],
				'u_email' => $_POST['email'],
				'u_password' => $_POST['password']
			];
		}else {
			$user = [
				'u_name' => $_POST['nama'],
				'u_email' => $_POST['email'],
			];
		}
		$user_meta = [
			'u_fullname' => $_POST['nama'],
			'u_address' => $_POST['alamat'],
			'u_phone' => $_POST['telepon']
		];
		$this->UserModel->UpdateUser($user,$id);
		$this->UserModel->UpdateuserMeta($user_meta,$id);
		session()->setFlashdata('success', 'Data user telah berhasil diperbarui.');
		return redirect()->back()->withInput();
	}

}
