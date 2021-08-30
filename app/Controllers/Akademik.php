<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AkademikModel;
use App\Models\AuthModel;
use App\Models\TenantModel;
use App\Models\DbModel;
use App\Models\UserModel;
use App\Models\StudentModel;
use phpDocumentor\Reflection\Types\This;
use PhpParser\Node\Stmt\Echo_;
use PhpParser\Node\Stmt\While_;

class Akademik extends BaseController
{
	public function __construct()
	{
		$this->AuthModel = new AuthModel();
		$this->TenantModel = new TenantModel();
		$this->DbModel = new DbModel();
		$this->UserModel = new UserModel();
		$this->StudentModel = new StudentModel();
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
	public function NewMapelIds()
	{
		$maxid = $this->AkademikModel->MaxIdMapel();
		foreach ($maxid as $key => $value) {
			$i = $value['id'] + 1;
		}
		return 'sub.'.$i;
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
						'content_body' => 'view_features/akademik/pg_akademik'
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
						'content_body' => 'view_features/customers/rls_mgnt_admin/pg_customers'
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
	public function TahunAkademik($stri)
	{
		$school = $this->TenantModel->DataTenant($stri);
		$akad = $this->AkademikModel->ThAkademik($stri);
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_th_akademik'
					],
					'data' => [
						'school' => $school,
						'akademik' =>$akad
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
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_th_akademik'
					],
					'data' => [
						'school' => $school,
						'akademik' =>$akad
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function TambahTahunAkademik($stri)
	{
		$school = $this->TenantModel->DataTenant($stri);
		$akad = $this->AkademikModel->ThAkademik($stri);
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_tambah_thajaran'
					],
					'data' => [
						'school' => $school,
						'akademik' =>$akad
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
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_tambah_thajaran'
					],
					'data' => [
						'school' => $school,
						'akademik' =>$akad
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function EksekusiTambahTahunAkademik($stri)
	{
		$data_tahun = [
			'awal' => $_POST['awal'],
			'akhir' => $_POST['akhir']
		];
		$data_evaluasi = [
			'evaluasi' => $_POST['evaluasi'],
			'bentuk_nilai' => $_POST['bentuk_nilai']
		];
		foreach ($data_evaluasi as $key1 => $value) {
			$n = 0 ;
			foreach ($value as $key2 => $subvalue) {
				$list_evaluasi[$n][$key1] = $subvalue;
				$n++;
			}
		}
		$exp_awal = explode(' ',$data_tahun['awal']);
		$exp_akhir = explode(' ',$data_tahun['akhir']);
		$maxid = $this->AkademikModel->MaxAcaId();
		$num = $maxid[0]['maxid'] + 1;
		$newid = 'a.'.$num;
		$idcat = $this->AkademikModel->MaxIDCategory();
		$new_idcat = 1 + $idcat[0]['maxid'];
		$thajaran = [
			'aca_id' => $newid,
			'aca_tnt_id' => strtoupper($stri),
			'ach_years' => 'Tahun Ajaran '.$exp_awal[1].'/'.$exp_akhir[1],
			'ach_status' => 'NONAKTIF'
		];
		foreach ($list_evaluasi as $key => $value) {
			$evaluasi[$key]['cat_id'] = $new_idcat;
			$evaluasi[$key]['cat_acad_id'] = $newid;
			$evaluasi[$key]['cat_category_name'] = $value['evaluasi'];
			$evaluasi[$key]['cat_formula_asses'] = NULL;
			$evaluasi[$key]['cat_value_form'] = $value['bentuk_nilai'];
			$evaluasi[$key]['cat_month_start'] = $data_tahun['awal'];
			$evaluasi[$key]['cat_month_end'] = $data_tahun['akhir']; 
			$new_idcat++;
		}
		$this->AkademikModel->StoreTahunAkademik($thajaran);
		$this->AkademikModel->StoreThAsessment($evaluasi);
		return redirect()->back()->withInput();
	}
	#####
	public function UpdateTahunAkad($stri,$stra)
	{
		$akad = $this->AkademikModel->TahunAkademikDet($stri,$stra);
		$school = $this->TenantModel->DataTenant($stri);
		switch ($this->session->get('u_rules_access')) {
			case 'MGNT_SUPERADMIN':
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_update_th_akad'
					],
					'data' => [
						'akad' => $akad,
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
	public function EksekusiUpdateThakad($stri,$stra)
	{
		$data = [
			'ach_years' => $_POST['nama']
		];
		$id =  $stra;
		$this->AkademikModel->UpdateThAkad($data,$id);
		return redirect()->back()->withInput();
	}
	#####
	public function ThSetAktive($stri,$stra)
	{
		$this->AkademikModel->ThsetNonActive($stri);
		$this->AkademikModel->ThsetActive($stra);
		return redirect()->back()->withInput();
	}
	#####
	public function MataPelajaran($stri)
	{
		$mapel = $this->AkademikModel->DataMapel($stri);
		$school = $this->TenantModel->DataTenant($stri);
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_mapel'
					],
					'data' => [
						'mapel' => $mapel,
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
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_mapel'
					],
					'data' => [
						'mapel' => $mapel,
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function KelompokMataPelajaran($stri)
	{
		$kelompok = $this->AkademikModel->DataKelompok($stri);
		$school = $this->TenantModel->DataTenant($stri);
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_kelompok_mapel'
					],
					'data' => [
						'kelompok' => $kelompok,
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
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_kelompok_mapel'
					],
					'data' => [
						'kelompok' => $kelompok,
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function TambahKelompokMataPelajaran($stri)
	{
		$kelompok = $this->AkademikModel->DataKelompok($stri);
		$school = $this->TenantModel->DataTenant($stri);
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_tambah_kelompok_mapel'
					],
					'data' => [
						'kelompok' => $kelompok,
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
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_tambah_kelompok_mapel'
					],
					'data' => [
						'kelompok' => $kelompok,
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function EksekusiTambahKelompokMapel($stri)
	{
		$data = [
			'gp_tnt_id' => strtoupper($stri),
			'gp_name' => $_POST['kelompok']
		];
		$this->AkademikModel->StoreKelompok($data);
		return redirect()->to(base_url('akademik/'.'/'.$stri.'/'.'kelompok-mapel'));
	}
	#####
	public function UpdateKelompokMapel($stri,$stra)
	{
		$kelompok = $this->AkademikModel->DataKelompokDet($stra);
		$school = $this->TenantModel->DataTenant($stri);
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_update_kelompok_mapel'
					],
					'data' => [
						'kelompok' => $kelompok[0],
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
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_update_kelompok_mapel'
					],
					'data' => [
						'kelompok' => $kelompok[0],
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function EksekusiUpdateKelompokMapel($stri,$stra)
	{
		$data = [
			'gp_name' => $_POST['kelompok']
		];
		$id = $stra;
		echo $id;
		$this->AkademikModel->UpdateKelompokMapel($data,$id);
		return redirect()->back()->withInput();
	}
	#####
	public function TambahMapel($stri)
	{
		$school = $this->TenantModel->DataTenant($stri);
		$semuamapel = $this->TenantModel->DataTenantMapel($stri);
		$jurusan = $this->TenantModel->DataJurusan($stri);
		$lambel = $this->AkademikModel->LamaBelajar($stri);
		$kelompok = $this->AkademikModel->DataKelompok($stri);
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
						2 => 'plugins/chainselect/chain_kelas'
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
						'pg_menu_url' => 'akademik/'.strtolower($stri).'/',
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_tambah_mapel'
					],
					'data' => [
						'school' => $school,
						'semuamapel' => $semuamapel,
						'jurusan' => $jurusan,
						'lambel' =>$lambel[0]['lambel'],
						'kelompok' => $kelompok
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
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
					'style' => [
						0 => 'plugins/datatables/scr_style',
					],
					'javascript' => [
						0 => 'plugins/datatables/scr_javascript',
						1 => 'plugins/uploadinput/scr_javascript',
						2 => 'plugins/chainselect/chain_kelas'
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
						'pg_menu_url' => 'akademik/'.strtolower($stri).'/',
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_tambah_mapel'
					],
					'data' => [
						'school' => $school,
						'semuamapel' => $semuamapel,
						'jurusan' => $jurusan,
						'lambel' =>$lambel[0]['lambel'],
						'kelompok' => $kelompok
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function EksekusiTambahMapel($stri)
	{
		$id = $this->NewMapelIds();
		$data = [
			'suc_subject_id' => $id,
			'suc_name' => $_POST['nama'],
			'suc_level' => $_POST['tingkatan'],
			'suc_tnt_id' => strtoupper($stri),
			'suc_group' => $_POST['kelompok'],
			'suc_minimum_score' => $_POST['kkm']
		];
		$this->AkademikModel->StoreMapel($data);
		return redirect()->back()->withInput();
	}
	#####
	public function UpdateMapel($stri,$stra)
	{
		$school = $this->TenantModel->DataTenant($stri);
		$semuamapel = $this->TenantModel->DataTenantMapel($stri);
		$lambel = $this->AkademikModel->LamaBelajar($stri);
		$mapel = $this->AkademikModel->DetMapel($stra);
		$kelompok = $this->AkademikModel->DataKelompok($stri);
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
						2 => 'plugins/chainselect/chain_kelas'
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
						'pg_menu_url' => 'akademik/'.strtolower($stri).'/',
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_update_mapel'
					],
					'data' => [
						'school' => $school,
						'semuamapel' => $semuamapel,
						'mapel' => $mapel[0],
						'lambel' =>$lambel[0]['lambel'],
						'kelompok' => $kelompok
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
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
					'style' => [
						0 => 'plugins/datatables/scr_style',
					],
					'javascript' => [
						0 => 'plugins/datatables/scr_javascript',
						1 => 'plugins/uploadinput/scr_javascript',
						2 => 'plugins/chainselect/chain_kelas'
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
						'pg_menu_url' => 'akademik/'.strtolower($stri).'/',
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_update_mapel'
					],
					'data' => [
						'school' => $school,
						'semuamapel' => $semuamapel,
						'mapel' => $mapel[0],
						'lambel' =>$lambel[0]['lambel'],
						'kelompok' => $kelompok
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function EksekusiUpdateMapel($stri,$stra)
	{
		$data = [
			'suc_name' => $_POST['nama'],
			'suc_level' => $_POST['tingkatan'],
			'suc_group' => $_POST['kelompok'],
			'suc_minimum_score' => $_POST['kkm']
		];
		$this->AkademikModel->UpdateMapel($data,$stra);
		return redirect()->back()->withInput();
	}
	#####
	public function KategoriPenilaian($stri)
	{
		$akad = $this->AkademikModel->ThAkademik($stri);
		$school = $this->TenantModel->DataTenant($stri);
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
						1 => 'plugins/Modal_id_kategori/scr_javascript',

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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_th_akademik_kat_evaluasi'
					],
					'data' => [
						'akademik' => $akad,
						'sekolah' => $school
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
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
					'style' => [
						0 => 'plugins/datatables/scr_style',
					],
					'javascript' => [
						0 => 'plugins/datatables/scr_javascript',
						1 => 'plugins/Modal_id_kategori/scr_javascript',
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_th_akademik_kat_evaluasi'
					],
					'data' => [
						'akademik' => $akad,
						'sekolah' => $school
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function DetailKategoriPenilaian($stri,$stra)
	{
		$evaluasi = $this->AkademikModel->ThAkademikEvaluasi($stra);
		$tahun = $this->AkademikModel->ThAkademikDetail($stra);
		$idaktif = $tahun[0]['aca_id'];
		$nmactif = $tahun[0]['ach_years'];
		$kategori = $this->AkademikModel->KategoriNilai($idaktif);
		$school = $this->TenantModel->DataTenant($stri);
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
						1 => 'plugins/Modal_id_kategori/scr_javascript',
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_kategori_penilaian'
					],
					'data' => [
						'tahun' => $tahun,
						'kategori' => $kategori,
						'nmaktif' => $nmactif
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
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
					'style' => [
						0 => 'plugins/datatables/scr_style',
					],
					'javascript' => [
						0 => 'plugins/datatables/scr_javascript',
						1 => 'plugins/Modal_id_kategori/scr_javascript',
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_kategori_penilaian'
					],
					'data' => [
						'tahun' => $tahun,
						'kategori' => $kategori,
						'nmaktif' => $nmactif
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function EksekusiTambahKategori($stri)
	{
		$akad = $this->AkademikModel->ThAkademikActive($stri);
		$data = [
			'cat_acad_id' => $akad[0]['aca_id'],
			'cat_category_name' => $_POST['nama']
		];
		$this->AkademikModel->StoreKategori($data);
		return redirect()->back()->withInput();
	}
	#####
	public function HapusKategori($stri,$stra)
	{
		$id = $_POST['id'];
		$this->AkademikModel->DeleteKategori($id);
		return redirect()->to(base_url('/akademik'.'/'.$stri.'/kategori-penilaian-detail'.'/'.$stra));
	}
	#####
	public function UpdateKategori($stri,$stra)
	{
		$cat = $this->AkademikModel->DetailCategory($stra);
		$school = $this->TenantModel->DataTenant($stri);
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_update_kategori'
					],
					'data' => [
						'kategori' => $cat[0]
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
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_update_kategori'
					],
					'data' => [
						'kategori' => $cat[0]
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function EksekusiUpdateKategori($stri,$stra)
	{
		$data['cat_category_name'] = $_POST['nama'];
		$data['cat_value_form'] = $_POST['bentuk_nilai'];
		$id = $_POST['id'];
		$this->AkademikModel->UpdateKategoriModel($data,$id);
		return redirect()->to(base_url('/akademik'.'/'.$stri.'/kategori-penilaian-detail'.'/'.$stra));
	}
	#####
	public function VariablePenilaian($stri)
	{
		$var = $this->AkademikModel->VariabelPenilaian($stri);
		$school = $this->TenantModel->DataTenant($stri);
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_variable'
					],
					'data' => [
						'variable' => $var,
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
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_variable'
					],
					'data' => [
						'variable' => $var,
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function EksekusiTambahVar($stri)
	{
		$var = $this->AkademikModel->VariabelPenilaianA($stri);
		$maxid = $this->AkademikModel->MaxVarId($stri);
		$num = $maxid[0]['maxid'] + 1;
		$newid = 'var'.$num;
		$data =[
			'var_tnt_id' => strtoupper($stri),
			'var_name' => $_POST['nama'],
			'var_code' => $newid
		];
		$this->AkademikModel->StoreVariable($data);
		return redirect()->back()->withInput();
	}
	#####
	public function UpdateVariable($stri,$stra)
	{
		$var = $this->AkademikModel->VariabelPenilaianA($stra);
		$school = $this->TenantModel->DataTenant($stri);
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_update_variable'
					],
					'data' => [
						'variable' => $var[0],
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
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_update_variable'
					],
					'data' => [
						'variable' => $var[0],
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function EksekusiUpdateVariable($stri,$stra)
	{
		$data =[
			'var_name' => $_POST['nama']
		];
		$this->AkademikModel->Updatevariable($data,$stra);
		return redirect()->back()->withInput();
	}
	#####
	public function RumusPenilaian($stri)
	{
		$school = $this->TenantModel->DataTenant($stri);
		$thaktif = $this->AkademikModel->ThAkademikActive($stri);
		$idaktif = $thaktif[0]['aca_id'];
		$nmactif = $thaktif[0]['ach_years'];
		$kategori = $this->AkademikModel->KategoriNilai($idaktif);
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_setrumus_penilaian'
					],
					'data' => [
						'kategori' => $kategori,
						'nmaktif' => $nmactif
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
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_setrumus_penilaian'
					],
					'data' => [
						'kategori' => $kategori,
						'nmaktif' => $nmactif
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function MembuatRumus($stri,$stra)
	{
		$school = $this->TenantModel->DataTenant($stri);
		$var = $this->AkademikModel->VariabelPenilaian($stri);
		$kategori = $this->AkademikModel->DetailCategory($stra);
		switch ($this->session->get('u_rules_access')) {
			case 'MGNT_SUPERADMIN':
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_mgnt_superadmin',
					'style' => [
						0 => 'plugins/datatables/scr_style',
						1 => 'plugins/taginput/scr_style'
					],
					'javascript' => [
						0 => 'plugins/datatables/scr_javascript',
						1 => 'plugins/uploadinput/scr_javascript',
						2 => 'plugins/taginput/scr_javascript',
						3 => 'plugins/CalculationInput/scr_javascript'
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
						'pg_menu_url' => 'akademik/' . strtolower($school[0]['sch_id']),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_rumus_penilaian'
					],
					'data' => [
						'school' => $school,
						'variable' => $var,
						'idcat' => $stra,
						'kategori' => $kategori
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
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
					'style' => [
						0 => 'plugins/datatables/scr_style',
						1 => 'plugins/taginput/scr_style'
					],
					'javascript' => [
						0 => 'plugins/datatables/scr_javascript',
						1 => 'plugins/uploadinput/scr_javascript',
						2 => 'plugins/taginput/scr_javascript',
						3 => 'plugins/CalculationInput/scr_javascript'
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
						'pg_menu_url' => 'akademik/' . strtolower($school[0]['sch_id']),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_rumus_penilaian'
					],
					'data' => [
						'school' => $school,
						'variable' => $var,
						'idcat' => $stra,
						'kategori' => $kategori
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function EksekusiRumus($stri,$stra)
	{
		$data = [
			'cat_id' => $_POST['idcat'],
			'cat_formula_asses' => $_POST['rumus']
		] ;
		$this->AkademikModel->UpdateRumus($data);
		return redirect()->to(base_url('/akademik'.'/'.$stri.'/kategori-penilaian-detail'.'/'.$stra));
	}
	######
	public function Evaluasi_json()
	{
		$id_tahun = $_POST['id_tahun'];
		$kelas = $this->AkademikModel->ThAkademikEvaluasi($id_tahun);
		$option = '<option value="' . FALSE . '">Pilih evaluasi...</option>';
		foreach ($kelas as $key => $value) {
			$option .= '<option value="' . $value['cat_id'] . '">' . $value['cat_category_name'] . '</option>';
		}
		$callback = array('list_evaluasi' => $option);
		echo json_encode($callback);
	}
	######
	public function UploadNilai($stri)
	{
		$school = $this->TenantModel->DataTenant($stri);
		$semuamapel = $this->TenantModel->DataTenantMapel($stri);
		$jurusan = $this->TenantModel->DataJurusan($stri);
		$tahun = $this->AkademikModel->ThAkademik($stri);
		switch ($this->session->get('u_rules_access')) {
			case 'MGNT_SUPERADMIN':
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_mgnt_superadmin',
					'style' => [
						0 => 'plugins/datatables/scr_style',
					],
					'javascript' => [
						0 => 'plugins/uploadinput/scr_javascript',
						1 => 'plugins/chainselect/chain_kelas',
						2 => 'plugins/chainselect/chain_evaluasi',
						3 => 'plugins/chainselect/chain_mapel'
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_upload_nilai'
					],
					'data' => [
						'sekolah' => $school,
						'jurusan' => $jurusan,
						'mapel' => $semuamapel,
						'tahun' => $tahun
					]
				];
				// print_r($school);die();
				return view('layout/main_layout', $this->partial);
				break;

			case 'MGNT_ADMIN':
				# code...
				break;

			case 'MGNT_MARKETING':
				# code...
				break;

			case 'TNT_SUPERADMIN':
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
					'style' => [
						0 => 'plugins/datatables/scr_style',
					],
					'javascript' => [
						0 => 'plugins/uploadinput/scr_javascript',
						1 => 'plugins/chainselect/chain_kelas',
						2 => 'plugins/chainselect/chain_evaluasi',
						3 => 'plugins/chainselect/chain_mapel'
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_upload_nilai'
					],
					'data' => [
						'sekolah' => $school,
						'jurusan' => $jurusan,
						'mapel' => $semuamapel,
						'tahun' => $tahun
					]
				];
				// print_r($school);die();
				return view('layout/main_layout', $this->partial);
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
	public function EksekusiUploadNilai_part1($stri)
	{
		$_SESSION['fds_aca_id'] = $_POST['thajaran'];
		$file_name = $_FILES['file_excel']['name'];
		$file_tmp = $_FILES['file_excel']['tmp_name'];
		$path = pathinfo($file_name);
		$ext = $path['extension'];
		if ($ext == 'xls') {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else if ($ext == 'xlsx') {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		} else {
			session()->setFlashdata('error', 'Gagal Upload.');
			session()->setFlashdata('notif_filetype', 'Format file tidak didukung, harap upload file sesuai template dan dan format yang sudah disediakan.');
			return redirect()->back()->withInput();
		}
		$spreadsheet = $reader->load($file_tmp);
		$sheet = $spreadsheet->getActiveSheet()->toArray();
		#=============================================================
		if (!$_POST['kategori'] || !$_POST['mapel'] || !$_POST['jurusan'] || !$_POST['kelas']) {
			if (!$_POST['kategori']) {
				session()->setFlashdata('error_kategori', 'Kategori evaluasi harus dipilih, mohon untuk memilih kategori evaluasi penilaian.');
			}
			if (!$_POST['mapel']) {
				session()->setFlashdata('error_mapel', 'Mata pelajaran atau subject harus dipilih, mohon untuk memilih mata pelajaran.');
			}
			if (!$_POST['jurusan']) {
				session()->setFlashdata('error_jurusan', 'Jurusan harus dipilih, mohon untuk memilih jurusan.');
			}
			if (!$_POST['kelas']) {
				session()->setFlashdata('error_kelas', 'Kelas harus dipilih, mohon untuk memilih kelas.');
			}
			session()->setFlashdata('error', 'Unggah Gagal');
			return redirect()->back()->withInput();
		}
		#=============================================================
		$a = 0;
		foreach ($sheet as $key => $value1) {
			if ($key == 0) {
				$n = max(array_keys($value1));
				for ($m=3; $m <= $n ; $m=$m+3) {
					$sub[$a]['key_nilai'] = $m;
					$sub[$a]['key_skor'] =$m+1;
					$sub[$a]['key_feedback'] =$m+2;
					$sub[$a]['val_subject'] = $value1[$m];
					$a++;
				}	
			}
		}
		#=============================================================
		foreach ($sub as $x => $val) {
			foreach ($sheet as $key => $value) {
				if ($key != 0) {
					$tmp[$x][$key]['raw_cat_id'] =  $_POST['kategori'];
					$tmp[$x][$key]['raw_years_id'] = $_POST['thajaran'];
					$tmp[$x][$key]['raw_class_id'] = $_POST['kelas'];
					$tmp[$x][$key]['raw_mapel'] = $_POST['mapel'];
					$tmp[$x][$key]['raw_stu_num'] = NULL;
					$tmp[$x][$key]['raw_email'] = $value[2];
					$tmp[$x][$key]['raw_title'] = $val['val_subject'];
					$tmp[$x][$key]['raw_point'] = $value[$val['key_nilai']];
					$tmp[$x][$key]['raw_score'] = $value[$val['key_skor']];
					$tmp[$x][$key]['raw_feedback'] = $value[$val['key_feedback']];
				}
			}
		}
		#=============================================================
		$p = 0;
		foreach ($tmp as $ka => $value) {
			foreach ($value as $ki => $subvalue) {
				$tmpa[$p] = $subvalue;
				$p++;
			}
		}
		foreach ($tmpa as $key => $value) {
			$id_array = $this->StudentModel->IdStudentByEmail($value['raw_email'],$value['raw_class_id']);
			if (empty($id_array)) {
				$data_taktersedia[$value['raw_email']]['email'] = $value['raw_email'];
			}else {
				$data_tersedia[$value['raw_email']] = $value['raw_email'];
				$tmpa[$key]['raw_stu_num'] = $id_array[0]['stu_num'];
			}
		}
		if (!empty($data_taktersedia)) {
			$nt1 = 'Data siswa dengan email :<br>';
			foreach ($data_taktersedia as $key => $value) {
				$nt1 .= '<li>' . $key . '</li>';
			}
			$nt1 .= 'Tidak tersedia di kelas '.$_POST['kelas'].', mohon cek kembali data siswa yang sudah ad di sistem, apabila data tidak ada anda bisa mengunggahnya terlebih dahulu.<br>';
			$nt1 .= 'Apabila anda ingin melanjutkan unggah nilai anda dapat menghapus data peserta didik dari file excel anda.';
		}
		if (!empty($data_taktersedia)) {
			echo 1;
			session()->setFlashdata('error_data', $nt1 );
			session()->setFlashdata('error', 'Unggah Gagal');
			return redirect()->back()->withInput();
			die('Upload Eror !');
		}
		if (!empty($tmpa)) {
			$_SESSION['nilai_siswa'] = $tmpa;
		}
		#============================================================
		$rumus = $this->AkademikModel->FormulaEvaluasi($_POST['kategori']);
		$tahun = $this->AkademikModel->DetailTahun($_POST['thajaran']);
		$school = $this->TenantModel->DataTenant($stri);
		$var = $this->AkademikModel->VariabelPenilaian($stri);

		switch ($this->session->get('u_rules_access')) {
			case 'MGNT_SUPERADMIN':
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_mgnt_superadmin',
					'style' => [
						0 => 'plugins/datatables/scr_style',
					],
					'javascript' => [
						0 => 'plugins/uploadinput/scr_javascript',
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_upload_nilai_config'
					],
					'data' => [
						'sekolah' => $school,
						'subject' => $sub,
						'variable' => $var,
						'rumus' => $rumus,
						'tahun' => [
							'id' => $tahun[0]['aca_id'],
							'nama' => $tahun[0]['ach_years']
						]
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
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
					'style' => [
						0 => 'plugins/datatables/scr_style',
					],
					'javascript' => [
						0 => 'plugins/uploadinput/scr_javascript',
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_upload_nilai_config'
					],
					'data' => [
						'sekolah' => $school,
						'subject' => $sub,
						'variable' => $var,
						'rumus' => $rumus,
						'tahun' => [
							'id' => $tahun[0]['aca_id'],
							'nama' => $tahun[0]['ach_years']
						]
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function EksekusiUploadNilai_part2($stri)
	{
		if (!empty($_SESSION['nilai_siswa'])) {
			$nilai_siswa = $_SESSION['nilai_siswa'];
			$vardata = $_POST['variable'];
			foreach ($nilai_siswa as $key => $value) {
				$nilai_siswa[$key]['raw_ass_id'] = $vardata[$value['raw_title']];
			}
		}
		foreach ($nilai_siswa as $key => $value) {
			${$value['raw_ass_id']}[$key] = NULL; 
		}
		$result = array();
		foreach ($nilai_siswa as $key => $value) {
			$result[$value['raw_stu_num']]['fds_cat_id'] = $value['raw_cat_id'];
			$result[$value['raw_stu_num']][$value['raw_ass_id']] = $value['raw_point'];
		}

		try {
			foreach ($result as $key => $value) {
				extract($value);
				$formula = $this->AkademikModel->FormulaEvaluasi($fds_cat_id);
				$fo = $formula[0]['cat_formula_asses'];
				if (isset($fo)) {
					eval('$poin = '.$fo.';');
					$nilai[$key] = $poin;
				}
			};
		} catch (\Exception $e) {
			echo 'Mengunggah nilai gagal, variabel yang anda gunakan tidak sesuai rumus penilaian tertera, mohon untuk mengulangi unggah nilai.';
		}

		if (!empty($nilai)) {
			$maxid = $this->AkademikModel->MaxIdFixNilai($stri);
			$num = $maxid[0]['id'] + 1;
			foreach ($nilai_siswa as $key => $value) {
				$datafix[$value['raw_stu_num']]['fds_id'] = 'fds.' . $num;
				$datafix[$value['raw_stu_num']]['fds_cat_id'] = $value['raw_cat_id'];
				$datafix[$value['raw_stu_num']]['fds_aca_id'] =	$_SESSION['fds_aca_id'];
				$datafix[$value['raw_stu_num']]['fds_class'] = $value['raw_class_id'];
				$datafix[$value['raw_stu_num']]['fds_std_number'] = $value['raw_stu_num'];
				$datafix[$value['raw_stu_num']]['fds_subject_id'] = $value['raw_mapel'];
				$datafix[$value['raw_stu_num']]['fds_score'] = $nilai[$value['raw_stu_num']];
				$num++;
			}
		}else {
			echo 'Mengunggah nilai gagal, rumus penilaian belum diatur, mohon untuk mengatur rumus penilaian terlebih dahulu.';
		}
		$store_fixnilai = $this->AkademikModel->StoreFixNilai($datafix);
		$store_nilai = $this->AkademikModel->StoreNilai($nilai_siswa);
		$_SESSION['nilai_siswa'] = NULL;
		$_SESSION['fds_aca_id'] = NULL;
		if ($store_fixnilai == 1 AND $store_nilai == 1) {
			session()->setFlashdata('success_upload', 'Data nilai sudah berhasil diupload.');
		}
		return redirect()->to(base_url('/akademik'.'/'.$stri.'/unggah-nilai'));
	}
	#####
	public function TambahNilaiManual($stri)
	{
		$school = $this->TenantModel->DataTenant($stri);
		$semuamapel = $this->TenantModel->DataTenantMapel($stri);
		$jurusan = $this->TenantModel->DataJurusan($stri);
		$kategori = $this->AkademikModel->KategoriEvaluasiThActive($stri);
		$tahun = $this->AkademikModel->ThAkademik($stri);
		$var = $this->AkademikModel->VariabelPenilaian($stri);
		// die();
		switch ($this->session->get('u_rules_access')) {
			case 'MGNT_SUPERADMIN':
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_mgnt_superadmin',
					'style' => [
						0 => 'plugins/datatables/scr_style',
					],
					'javascript' => [
						0 => 'plugins/uploadinput/scr_javascript',
						1 => 'plugins/chainselect/chain_kelas_siswa',
						2 => 'plugins/customformhide/customformhide',
						3 => 'plugins/chainselect/chain_evaluasi',
						4 => 'plugins/chainselect/chain_mapel'
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_nilai_manual'
					],
					'data' => [
						'sekolah' => $school,
						'jurusan' => $jurusan,
						'mapel' => $semuamapel,
						'kategori' => $kategori,
						'tahun' => $tahun,
						// 'tahunaktif' => $tahunaktif[0],
						'variabel' => $var
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
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
					'style' => [
						0 => 'plugins/datatables/scr_style',
					],
					'javascript' => [
						0 => 'plugins/uploadinput/scr_javascript',
						1 => 'plugins/chainselect/chain_kelas_siswa',
						2 => 'plugins/customformhide/customformhide',
						3 => 'plugins/chainselect/chain_evaluasi',
						4 => 'plugins/chainselect/chain_mapel'
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_nilai_manual'
					],
					'data' => [
						'sekolah' => $school,
						'jurusan' => $jurusan,
						'mapel' => $semuamapel,
						'kategori' => $kategori,
						'tahun' => $tahun,
						// 'tahunaktif' => $tahunaktif[0],
						'variabel' => $var
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function EksekusiNilaiManual($stri)
	{
		$data_siswa = [
			'tahun' => $_POST['thajaran'],
			'evaluasi' => $_POST['kategori'],
			'mapel' => $_POST['mapel'],
			'jurusan' => $_POST['jurusan'],
			'kelas' => $_POST['kelas'],
			'siswa' => $_POST['siswa']
		];
		foreach ($_POST['kriteria'] as $key => $value) {
			$data_nilai[$key]['kriteria'] = $value;
			$data_nilai[$key]['variabel'] = $_POST['variabel'][$key];
			$data_nilai[$key]['nilai'] = $_POST['nilai'][$key];
			$data_nilai[$key]['skor'] = $_POST['skor'][$key];
			$data_nilai[$key]['feedback'] = $_POST['feedback'][$key];
		}
		// ==============================================================================================
		if (!$_POST['kategori'] || !$_POST['mapel'] || !$_POST['jurusan'] || !$_POST['kelas'] || !$_POST['siswa']) {
			if (!$_POST['kategori']) {
				session()->setFlashdata('error_evaluasi', 'Kategori evaluasi harus dipilih, mohon untuk memilih kategori evaluasi penilaian.');
			}
			if (!$_POST['mapel']) {
				session()->setFlashdata('error_mapel', 'Mata pelajaran atau subject harus dipilih, mohon untuk memilih mata pelajaran.');
			}
			if (!$_POST['jurusan']) {
				session()->setFlashdata('error_jurusan', 'Jurusan harus dipilih, mohon untuk memilih jurusan.');
			}
			if (!$_POST['kelas']) {
				session()->setFlashdata('error_kelas', 'Kelas harus dipilih, mohon untuk memilih kelas.');
			}
			if (!$_POST['siswa']) {
				session()->setFlashdata('error_siswa', 'Siswa harus dipilih, mohon untuk memilih nama siswa.');
			}
			session()->setFlashdata('error', 'Unggah Gagal');
			return redirect()->back()->withInput();
		}
		// =============================================================================================
		$siswa = $this->StudentModel->ShowNamaSiswa($data_siswa['siswa']);
	
		foreach ($data_nilai as $key => $value) {
			$tmp[$key]['raw_cat_id'] =  $data_siswa['evaluasi'];
			$tmp[$key]['raw_years_id'] = $data_siswa['tahun'];
			$tmp[$key]['raw_class_id'] = $data_siswa['kelas'];
			$tmp[$key]['raw_mapel'] = $data_siswa['mapel'];
			$tmp[$key]['raw_stu_num'] = $data_siswa['siswa'];
			$tmp[$key]['raw_email'] = $siswa[0]['stu_email'];
			$tmp[$key]['raw_title'] = $value['kriteria'];
			$tmp[$key]['raw_point'] = $value['nilai'];
			$tmp[$key]['raw_score'] = $value['skor'];
			$tmp[$key]['raw_feedback'] = $value['feedback'];
			$tmp[$key]['raw_ass_id'] = $data_siswa['variabel'];
		}
		foreach ($data_nilai as $key => $value) {
			$result[$data_siswa['siswa']]['fds_cat_id'] = $data_siswa['evaluasi'];
			$result[$data_siswa['siswa']][$value['variabel']] = $value['nilai'];
		}
		foreach ($result as $key => $value) {
			extract($value);
			$formula = $this->AkademikModel->FormulaEvaluasi($fds_cat_id);
			$fo = $formula[0]['cat_formula_asses'];
			eval('$poin = '.$fo.';');
			$nilai[$key] = $poin;
		};
		$maxid = $this->AkademikModel->MaxIdFixNilai($stri);
		$num = $maxid[0]['id'] + 1;
		foreach ($tmp as $key => $value) {
			$datafix[$value['raw_stu_num']]['fds_id'] = 'fds.'.$num;
			$datafix[$value['raw_stu_num']]['fds_cat_id'] = $value['raw_cat_id'];
			$datafix[$value['raw_stu_num']]['fds_aca_id'] =	$value['raw_years_id'];
			$datafix[$value['raw_stu_num']]['fds_class'] = $value['raw_class_id'];
			$datafix[$value['raw_stu_num']]['fds_std_number'] = $value['raw_stu_num'] ;
			$datafix[$value['raw_stu_num']]['fds_subject_id'] = $value['raw_mapel'] ;
			$datafix[$value['raw_stu_num']]['fds_score'] = $nilai[$value['raw_stu_num']];
			$num++;
		}
		$store_fixnilai = $this->AkademikModel->StoreFixNilai($datafix);
		$store_nilai = $this->AkademikModel->StoreNilai($tmp);
		return redirect()->back()->withInput();
	}
	#####
	public function PerbaruiNilai($stri)
	{
		$school = $this->TenantModel->DataTenant($stri);
		$semuamapel = $this->TenantModel->DataTenantMapel($stri);
		$jurusan = $this->TenantModel->DataJurusan($stri);
		$kategori = $this->AkademikModel->KategoriEvaluasiThActive($stri);
		$tahun = $this->AkademikModel->ThAkademik($stri);
		$tahunaktif = $this->AkademikModel->ThAkademikActive($stri);
		switch ($this->session->get('u_rules_access')) {
			case 'MGNT_SUPERADMIN':
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_mgnt_superadmin',
					'style' => [
						0 => 'plugins/datatables/scr_style',
					],
					'javascript' => [
						0 => 'plugins/uploadinput/scr_javascript',
						1 => 'plugins/chainselect/chain_kelas'
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_perbarui_nilai'
					],
					'data' => [
						'sekolah' => $school,
						'jurusan' => $jurusan,
						'mapel' => $semuamapel,
						'kategori' => $kategori,
						'tahun' => $tahun,
						'tahunaktif' => $tahunaktif[0]
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
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
					'style' => [
						0 => 'plugins/datatables/scr_style',
					],
					'javascript' => [
						0 => 'plugins/uploadinput/scr_javascript',
						1 => 'plugins/chainselect/chain_kelas'
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_perbarui_nilai'
					],
					'data' => [
						'sekolah' => $school,
						'jurusan' => $jurusan,
						'mapel' => $semuamapel,
						'kategori' => $kategori,
						'tahun' => $tahun,
						'tahunaktif' => $tahunaktif[0]
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function EksekusiPerbaruiNilai($stri)
	{
		$data =[
			'tahun' => $_POST['thajaran'],
			'evaluasi' => $_POST['kategori'],
			'mapel' => $_POST['mapel'],
			'jurusan' => $_POST['jurusan'],
			'kelas' =>$_POST['kelas']
		];
		$kelas = $this->AkademikModel->DetailKelas($data['kelas']);
		$tahun = $this->AkademikModel->DetailTahun($data['tahun']);
		$evaluasi = $this->AkademikModel->DetailEvaluasi($data['evaluasi']);
		$_SESSION['filtertitle'] = [
			'evaluasi' => $evaluasi[0]['cat_category_name'],
			'kelas' => $kelas[0]['cls_name'],
			'tahun' => $tahun[0]['ach_years']
		];
		$filterdata = $this->AkademikModel->FiltrasiRawData($data);
		if (empty($filterdata)) {
			$_SESSION['filterdatanilai'] = NULL;
			return redirect()->back()->withInput();
		}
		$_SESSION['filterparameter'] = $data;
		$result = array();
		foreach ($filterdata as $key => $value) {
			$result[$value['raw_stu_num']]['fds_cat_id'] = $value['raw_cat_id'];
			$result[$value['raw_stu_num']][$value['raw_ass_id']] = $value['raw_point'];
		}
		foreach ($result as $key => $value) {
			extract($value);
			$formula = $this->AkademikModel->FormulaEvaluasi($fds_cat_id);
			$fo = $formula[0]['cat_formula_asses'];
			eval('$poin = '.$fo.';');
			$nilai[$key] = $poin;
		};
		$n = 0  ;
		foreach ($filterdata as $key => $value) {
			$result1[$value['raw_stu_num']][] = $value;
		}
		foreach ($result1 as $key => $value) {
			$i = 0 ;
			foreach ($value as $key => $subvalue) {
				$subitem[$i]['raw_title'] = $subvalue['raw_title'];
				$subitem[$i]['raw_point'] = $subvalue['raw_point'];
				$subitem[$i]['raw_score'] = $subvalue['raw_score'];
				$subitem[$i]['raw_feedback'] = $subvalue['raw_feedback'];
				$subitem_id = $subvalue['raw_id'];
				$subitem_email =  $subvalue['raw_email'];
				$subitem_kelas = $subvalue['raw_class_id'];
				$subitem_evaluasi = $subvalue['raw_cat_id'];
				$subitem_idsiswa = $subvalue['raw_stu_num'];
				$i++;
			}
			$item_nama = $this->StudentModel->ShowNamaSiswa($subitem_idsiswa);
			// $item_kelas = $this->TenantModel->ShowNamaKelasJurusan($subitem_kelas);
			$item[$n]['idraw'] = $subitem_id;
			$item[$n]['idsiswa'] = $subitem_idsiswa;
			$item[$n]['nama'] = $item_nama[0]['stu_fullname'];
			$item[$n]['email'] = $subitem_email;
			$item[$n]['kelas'] = $data['kelas'];
			$item[$n]['jurusan'] = $data['jurusan'];
			$item[$n]['evaluasi'] = $subitem_evaluasi;
			$item[$n]['nilai'] = $subitem;
			$item[$n]['nilaiakhir'] = $nilai[$subitem_idsiswa];
			$n++;
		}
		$_SESSION['filterdatanilai'] = $item;
		return redirect()->back()->withInput();
	}
	#####
	public function FormPerbaruiNilai($stri,$stra)
	{
		$school = $this->TenantModel->DataTenant($stri);
		$param = $_SESSION['filterparameter'];
		$filterdata = $this->AkademikModel->FiltrasiRawDataSiswa($param,$stra);
		switch ($this->session->get('u_rules_access')) {
			case 'MGNT_SUPERADMIN':
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_mgnt_superadmin',
					'style' => [
						0 => 'plugins/datatables/scr_style',
					],
					'javascript' => [
						0 => 'plugins/uploadinput/scr_javascript',
						1 => 'plugins/chainselect/chain_kelas'
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_form_perbarui_nilai'
					],
					'data' => [
						'id' => $stra,
						'sekolah' => $school,
						'filterdata' => $filterdata
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
				$this->partial = [
					'title' => 'Trust Academyc Solution | ',
					'menu' => 'view_features/listmenu/menus_tnt_superadmin',
					'style' => [
						0 => 'plugins/datatables/scr_style',
					],
					'javascript' => [
						0 => 'plugins/uploadinput/scr_javascript',
						1 => 'plugins/chainselect/chain_kelas'
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
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Olah data akademik sekolah meliputi upload nilai, tahun ajaran, mata pelajaran, serta menentukan rumus atau formula penilaian pada masing-masing evaluasi hasil belajar dalam satu tahun akademik.',
						'content_menu' => 'view_features/akademik/pg_menu',
						'content_body' => 'view_features/akademik/pg_form_perbarui_nilai'
					],
					'data' => [
						'id' => $stra,
						'sekolah' => $school,
						'filterdata' => $filterdata
					]
				];
				return view('layout/main_layout', $this->partial);
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
	public function EksekusiFormPerbaruiNilai($stri,$stra)
	{
		$nilai = $_POST['nilai'];
		$feedback = $_POST['feedback'];
		foreach ($nilai as $key => $value) {
			$val['raw_point'] = $value;
			$val['raw_feedback'] = $feedback[$key];
			$this->AkademikModel->PerbaruiRawNilai($key,$val);
		}
		$param = $_SESSION['filterparameter'];
		$nilai_siswa = $this->AkademikModel->FiltrasiRawDataSiswa($param,$stra);
		$result = array();
		foreach ($nilai_siswa as $key => $value) {
			$result[$value['raw_stu_num']]['fds_cat_id'] = $value['raw_cat_id'];
			$result[$value['raw_stu_num']][$value['raw_ass_id']] = $value['raw_point'];
		}
		foreach ($result as $key => $value) {
			extract($value);
			$formula = $this->AkademikModel->FormulaEvaluasi($fds_cat_id);
			$fo = $formula[0]['cat_formula_asses'];
			eval('$poin = ' . $fo . ';');
			$nilai[$key] = $poin;
		};
		foreach ($nilai_siswa as $key => $value) {
			$dataid[$value['raw_stu_num']]['fds_cat_id'] = $value['raw_cat_id'];
			$dataid[$value['raw_stu_num']]['fds_aca_id'] =	$value['raw_years_id'];
			$dataid[$value['raw_stu_num']]['fds_class'] = $value['raw_class_id'];
			$dataid[$value['raw_stu_num']]['fds_std_number'] = $value['raw_stu_num'];
			$dataid[$value['raw_stu_num']]['fds_subject_id'] = $value['raw_mapel'];
			$datafix[$value['raw_stu_num']]['fds_score'] = $nilai[$value['raw_stu_num']];
		}
		foreach ($dataid as $key => $value) {
			$ids = $value;
		}
		foreach ($datafix as $key => $value) {
			$data = $value;
		}
		$this->AkademikModel->UpdateFixNilai($ids,$data);
		$_SESSION['filterdatanilai'] = NULL;
		$_SESSION['filterparameter'] = NULL;
		$_SESSION['filterdatanilai'] = NULL;
		return redirect()->to(base_url("/"."akademik/".$stri."/perbarui-nilai")); 
		// print_r($sd);
	}
	#####
	public function ClearDataFilter($stri)
	{
		$_SESSION['filterdatanilai'] = NULL;
		$_SESSION['filterparameter'] = NULL;
		$_SESSION['filterdatanilai'] = NULL;
		return redirect()->to(base_url("/"."akademik/".$stri."/perbarui-nilai"));
	}
}
