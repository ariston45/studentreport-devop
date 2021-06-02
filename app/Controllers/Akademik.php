<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AkademikModel;
use App\Models\AuthModel;
use App\Models\TenantModel;
use App\Models\DbModel;
use App\Models\UserModel;
use App\Models\StudentModel;

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
					'breadcrumb' => [
						'customers' => 'Customers'
					],
					'content'	=> [
						'content_menu' => '',
						'content_body' => 'view_features/akademik/rls_mgnt_superadmin/pg_customers'
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
		// $thaktif = $this->AkademikModel->ThAkademikActive($stri);
		// print_r($thaktif);
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
					'breadcrumb' => [
						'customers' => 'Customers'
					],
					'content'	=> [
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
						'content_menu' => 'view_features/akademik/rls_mgnt_superadmin/pg_menu',
						'content_body' => 'view_features/akademik/rls_mgnt_superadmin/pg_th_akademik'
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
	public function UpdateTahunAkad($stri,$stra)
	{
		$akad = $this->AkademikModel->TahunAkademikDet($stri,$stra);
		$school = $this->TenantModel->DataTenant($stri);
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
			'breadcrumb' => [
				'customers' => 'Customers'
			],
			'content'	=> [
				'pg_menu_url' => 'akademik/' . strtolower($stri),
				'pg_title' => $school[0]['sch_name'],
				'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
				'content_menu' => 'view_features/akademik/rls_mgnt_superadmin/pg_menu',
				'content_body' => 'view_features/akademik/rls_mgnt_superadmin/pg_update_th_akad'
			],
			'data' => [
				'akad' => $akad,
			]
		];
		return view('layout/main_layout', $this->partial);
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
		switch ($this->session->get('u_rules_access')) {
			case 'MGNT_SUPERADMIN':
				$mapel = $this->AkademikModel->DataMapel($stri);
				$school = $this->TenantModel->DataTenant($stri);
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
					'breadcrumb' => [
						'customers' => 'Customers'
					],
					'content'	=> [
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
						'content_menu' => 'view_features/akademik/rls_mgnt_superadmin/pg_menu',
						'content_body' => 'view_features/akademik/rls_mgnt_superadmin/pg_mapel'
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
	public function TambahMapel($stri)
	{
		$school = $this->TenantModel->DataTenant($stri);
		$semuamapel = $this->TenantModel->DataTenantMapel($stri);
		$jurusan = $this->TenantModel->DataJurusan($stri);
		$lambel = $this->AkademikModel->LamaBelajar($stri);
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
			'breadcrumb' => [
				'customers' => 'Customers'
			],
			'content'	=> [
				'pg_menu_url' => 'akademik/'.strtolower($stri).'/',
				'pg_title' => $school[0]['sch_name'],
				'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
				'content_menu' => 'view_features/akademik/rls_mgnt_superadmin/pg_menu',
				'content_body' => 'view_features/akademik/rls_mgnt_superadmin/pg_tambah_mapel'
			],
			'data' => [
				'school' => $school,
				'semuamapel' => $semuamapel,
				'jurusan' => $jurusan,
				'lambel' =>$lambel[0]['lambel']
			]
		];
		return view('layout/main_layout', $this->partial);
	}
	#####
	public function EksekusiTambahMapel($stri)
	{
		$id = $this->NewMapelIds();
		$data = [
			'suc_subject_id' => $id,
			'suc_name' => $_POST['nama'],
			'suc_level' => $_POST['tingkatan'],
			'suc_tnt_id' => strtoupper($stri)
		];
		$this->AkademikModel->StoreMapel($data);
		return redirect()->back()->withInput();
	}
	#####
	public function KategoriPenilaian($stri)
	{
		$thaktif = $this->AkademikModel->ThAkademikActive($stri);
		$idaktif = $thaktif[0]['aca_id'];
		$nmactif = $thaktif[0]['ach_years'];
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
					'breadcrumb' => [
						'customers' => 'Customers'
					],
					'content'	=> [
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
						'content_menu' => 'view_features/akademik/rls_mgnt_superadmin/pg_menu',
						'content_body' => 'view_features/akademik/rls_mgnt_superadmin/pg_kategori_penilaian'
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
	public function HapusKategori($stri)
	{
		$id = $_POST['id'];
		$this->AkademikModel->DeleteKategori($id);
		return redirect()->back()->withInput();
	}
	#####
	public function UpdateKategori($stri,$stra)
	{
		$cat = $this->AkademikModel->DetailCategory($stra);
		$school = $this->TenantModel->DataTenant($stri);
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
			'breadcrumb' => [
				'customers' => 'Customers'
			],
			'content'	=> [
				'pg_menu_url' => 'akademik/' . strtolower($stri),
				'pg_title' => $school[0]['sch_name'],
				'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
				'content_menu' => 'view_features/akademik/rls_mgnt_superadmin/pg_menu',
				'content_body' => 'view_features/akademik/rls_mgnt_superadmin/pg_update_kategori'
			],
			'data' => [
				'kategori' => $cat[0],
			]
		];
		return view('layout/main_layout', $this->partial);
	}
	public function EksekusiUpdateKategori($stri,$stra)
	{
		$data['cat_category_name'] = $_POST['nama'];
		$id = $stra;
		$this->AkademikModel->UpdateKategoriModel($data,$id);
		return redirect()->back()->withInput();
	}
	#####
	public function VariablePenilaian($stri)
	{
		switch ($this->session->get('u_rules_access')) {
			case 'MGNT_SUPERADMIN':
				$var = $this->AkademikModel->VariabelPenilaian($stri);
				$school = $this->TenantModel->DataTenant($stri);
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
					'breadcrumb' => [
						'customers' => 'Customers'
					],
					'content'	=> [
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
						'content_menu' => 'view_features/akademik/rls_mgnt_superadmin/pg_menu',
						'content_body' => 'view_features/akademik/rls_mgnt_superadmin/pg_variable'
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
			'breadcrumb' => [
				'customers' => 'Customers'
			],
			'content'	=> [
				'pg_menu_url' => 'akademik/' . strtolower($stri),
				'pg_title' => $school[0]['sch_name'],
				'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
				'content_menu' => 'view_features/akademik/rls_mgnt_superadmin/pg_menu',
				'content_body' => 'view_features/akademik/rls_mgnt_superadmin/pg_update_variable'
			],
			'data' => [
				'variable' => $var[0],
			]
		];
		return view('layout/main_layout', $this->partial);
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
					'breadcrumb' => [
						'customers' => 'Customers'
					],
					'content'	=> [
						'pg_menu_url' => 'akademik/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
						'content_menu' => 'view_features/akademik/rls_mgnt_superadmin/pg_menu',
						'content_body' => 'view_features/akademik/rls_mgnt_superadmin/pg_setrumus_penilaian'
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
					'breadcrumb' => [
						'customers' => 'Customers'
					],
					'content'	=> [
						'pg_menu_url' => 'akademik/' . strtolower($school[0]['sch_id']),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
						'content_menu' => 'view_features/akademik/rls_mgnt_superadmin/pg_menu',
						'content_body' => 'view_features/akademik/rls_mgnt_superadmin/pg_rumus_penilaian'
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
	public function EksekusiRumus($stri)
	{
		$data = [
			'cat_id' => $_POST['idcat'],
			'cat_formula_asses' => $_POST['rumus']
		] ;
		$this->AkademikModel->UpdateRumus($data);
		return redirect()->back()->withInput();
	}
}
