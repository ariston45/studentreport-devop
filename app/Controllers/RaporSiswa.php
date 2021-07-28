<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;
use App\Models\TenantModel;
use App\Models\DbModel;
use App\Models\UserModel;
use App\Models\StudentModel;
use App\Models\RaporModel;
use App\Models\AkademikModel;

class RaporSiswa extends BaseController
{
	public function __construct()
	{
		$this->AuthModel = new AuthModel();
		$this->TenantModel = new TenantModel();
		$this->DbModel = new DbModel();
		$this->UserModel = new UserModel();
		$this->StudentModel = new StudentModel();
		$this->RaporModel = new RaporModel();
		$this->AkademikModel = new AkademikModel();
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
		$schools = $this->TenantModel->ListTenant();
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
					'pgtitle' => $this->session->get('sch_name'),
					'breadcrumb' => [
						'customers' => 'Customers'
					],
					'content'	=> [
						'content_menu' => '',
						'content_body' => 'view_features/rapor/rls_mgnt_superadmin/pg_rapor',
						'pg_title' => $schools[0]['sch_name'],
						'pg_subtitle' => 'Laporan hasil evaluasi siswa yang meliputi evaluasi tengah semester satu maupun dua serta evaluasi akhir semester satu dan dua (ganjil/genap).',
					],
					'data' => $schools
				];
				return view('layout/main_layout', $this->partial);
				break;

			case 'MGNT_MARKETING':
				# code...
				break;

			case 'MGNT_ADMIN':
				$this->partial = [
					'title' => 'helo',
					'menu' => 'view_features/listmenu/menus_mgnt_admin',
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
					'pgtitle' => $this->session->get('sch_name'),
					'breadcrumb' => [
						'customers' => 'Customers'
					],
					'content'	=> [
						'content_menu' => '',
						'content_body' => 'view_features/rapor/rls_mgnt_admin/pg_customers'
					],
					'data' => $schools,
				];
				return view('layout/main_layout', $this->partial);
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
	public function CariRapor($stri)
	{
		$sekolah = $this->TenantModel->DataTenant($stri);
		switch ($this->session->get('u_rules_access')) {
			case 'MGNT_SUPERADMIN':
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
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
						2 => $this->request->uri->getSegment(2),
						3 => $this->request->uri->getSegment(3)
					],
					'heading' => 'view_features/listmenu/heading',
					'pgtitle' => $this->session->get('sch_name'),
					'breadcrumb' => [
						'customers' => 'Customers'
					],
					'content'	=> [
						'pg_menu_url' => 'pusat-data/' . strtolower($sekolah[0]['sch_id']),
						'pg_title' => $sekolah[0]['sch_name'],
						'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
						'pg_link' => base_url('rapor-siswa/'.$stri),
						'content_menu' => 'view_features/rapor/rls_mgnt_superadmin/pg_menu',
						'content_body' => 'view_features/rapor/rls_mgnt_superadmin/pg_cari_siswa'
					],
					'data' => [
						'sekolah' => $sekolah,
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function EksekusiCariRapor($stri)
	{
		$data = [
			'keywords' => $_POST['keywords'],
			'param' => $stri
		];
		$ara['nama'] = $this->RaporModel->CariNama($data);
		$ara['nis'] = $this->RaporModel->CariNis($data);
		$ara['email'] = $this->RaporModel->CariEmail($data);
		$new_ara = array_merge($ara['nama'],$ara['nis'],$ara['email']);
		$new_ara = array_map("unserialize", array_unique(array_map("serialize", $new_ara)));
		if (!empty($new_ara)) {
			foreach ($new_ara as $key => $value) {
				$li[$key]['stu_num'] = $value['stu_num'];
				$li[$key]['stu_id'] = $value['stu_id'];
				$li[$key]['nama'] = $value['stu_fullname'];
				$li[$key]['email'] = $value['stu_email'];
			}
			$_SESSION['data_siswa'] = $li;
		}else {
			$_SESSION['data_siswa'] = NULL;
		}
		$_SESSION['keywords'] = $_POST['keywords'];
		return redirect()->back()->withInput();
	}
	#####
	public function ListRaporSiswa($stri,$id)
	{
		$school = $this->TenantModel->DataTenant($stri);
		$th_ajaran = $this->RaporModel->ThAkademikSiswa($id);
		$fixnilai = $this->RaporModel->FixNilaiAkademik($id);
		foreach ($fixnilai as $key => $value) {
			$id_tahun[$key] = $value['fds_aca_id'];
		}
		$id_tahun_uniq = array_unique($id_tahun);
		rsort($id_tahun_uniq);
		print_r($id_tahun_uniq);
		foreach ($id_tahun_uniq as $key => $value) {
			$eva = $this->RaporModel->ThAkademikEvaluasi($value);
			print_r($eva);
			$evaluasi[$key]['tahun'] = $value;
			foreach ($eva as $subkey => $subvalue) {
				$evaluasi[$key][$subkey]['id'] = $subvalue['cat_id'];
				$evaluasi[$key][$subkey]['nama'] = $subvalue['cat_category_name'];
			}
		} 

		print_r($evaluasi);
		die();
		$this->partial = [
			'title' => 'Trust Academic Solution | ',
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
				2 => $this->request->uri->getSegment(2),
				3 => $this->request->uri->getSegment(3)
			],
			'heading' => 'view_features/listmenu/heading',
			'pgtitle' => $this->session->get('sch_name'),
			'breadcrumb' => [
				'customers' => 'Customers'
			],
			'content'	=> [
				'pg_menu_url' => 'pusat-data/' . strtolower($school[0]['sch_id']),
				'pg_title' => $school[0]['sch_name'],
				'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
				'pg_link' => base_url('rapor-siswa/' . $stri),
				'content_menu' => 'view_features/rapor/rls_mgnt_superadmin/pg_menu',
				'content_body' => 'view_features/rapor/rls_mgnt_superadmin/pg_list_rapor_siswa'
			],
			'data' => [
				'school' => $school,
				'thajaran' => $th_ajaran
			]
		];
		return view('layout/main_layout', $this->partial);
	}
}
