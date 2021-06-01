<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;
use App\Models\TenantModel;
use App\Models\DbModel;
use App\Models\UserModel;
use App\Models\StudentModel;

class Pengguna extends BaseController
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
		print_r($pengguna);
		die();
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
					'linkmap' => 'view_features/listmenu/LinksMap',
					'segments' => [
						1 => $this->request->uri->getSegment(1),
						2 => $this->request->uri->getSegment(2)
					],
					'heading' => 'view_features/listmenu/heading',
					'breadcrumb' => [
						'customers' => 'Customers'
					],
					'content'	=> [
						'content_menu' => '',
						'content_body' => 'view_features/pengguna/rls_mgnt_superadmin/pg_pengguna'
					],
					'data' => ""
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
}
