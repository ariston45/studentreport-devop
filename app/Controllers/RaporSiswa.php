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
	public function KonversiNilai($nilai) 
	{
		$nilai = abs($nilai);
		$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = $this->KonversiNilai($nilai - 10). " Belas";
		} else if ($nilai < 100) {
			$temp = $this->KonversiNilai($nilai/10)." Puluh". $this->KonversiNilai($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " Seratus" . $this->KonversiNilai($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = $this->KonversiNilai($nilai/100) . " Ratus" . $this->KonversiNilai($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " Seribu" . $this->KonversiNilai($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = $this->KonversiNilai($nilai/1000) . " Ribu" . $this->KonversiNilai($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = $this->KonversiNilai($nilai/1000000) . " Juta" . $this->KonversiNilai($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = $this->KonversiNilai($nilai/1000000000) . " Milyar" . $this->KonversiNilai(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = $this->KonversiNilai($nilai/1000000000000) . " Trilyun" . $this->KonversiNilai(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
	#####
	function KonversiKoma($x)
	{
		$str = stristr($x,".");
		$ex = explode('.',$x);
		$a = abs($ex[1]);
		$string = array("Nol", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan","Sembilan","Sepuluh", "Sebelas");
		$temp = "";
		$a2 = $ex[1]/10;
		$pjg = strlen($str);
		$i =1;
		if ($a >= 1 && $a < 12) {
			$temp .= " " . $string[$a];
		} else if ($a > 12 && $a < 20) {
			$temp .= $this->KonversiNilai($a - 10) . " Belas";
		} else if ($a > 20 && $a < 100) {
			$temp .= $this->KonversiNilai($a / 10) . " Puluh" . $this->KonversiNilai($a % 10);
		} else {
			if ($a2 < 1) {
				while ($i < $pjg) {
					$char = substr($str, $i, 1);
					$i++;
					$temp .= " " . $string[$char];
				}
			}
		}
		return $temp;
	}
	#####
	public function KonversiHasil($nilai) 
	{
		$ar_des = explode(".",$nilai);
		if($nilai<0) {
			$hasil = "minus ". trim($this->KonversiNilai($nilai));
		} else {
			if (ISSET($ar_des[1])) {
				$poin = trim($this->KonversiKoma($nilai));
			}
			$hasil = trim($this->KonversiNilai($nilai));
		}
		if (ISSET($poin)) {
			$hasil = $hasil." Koma ".$poin;
		}else {
			$hasil = $hasil;
		}     		
		return $hasil;
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
		sort($id_tahun_uniq, SORT_NUMERIC);
		foreach ($id_tahun_uniq as $i => $value) {
			$kelasAkademik = $this->RaporModel->KelasEvaluasi($id,$value);
			$j = 1 ;
			foreach ($kelasAkademik as $key => $subvalue) {
				$idk[$i][$j] = $subvalue;
				$j++;
			}
		}
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
				'pg_link' => base_url('rapor-siswa/'.$stri.'/detail-rapor-siswa'.'/'.$id),
				'content_menu' => 'view_features/rapor/rls_mgnt_superadmin/pg_menu',
				'content_body' => 'view_features/rapor/rls_mgnt_superadmin/pg_list_rapor_siswa'
			],
			'data' => [
				'school' => $school,
				'thajaran' => $th_ajaran,
				'group_evaluasi' => $idk
			]
		];
		return view('layout/main_layout', $this->partial);
	}
	#####
	public function DetailRaporSiswa($stri,$stra,$stre)
	{
		$sekolah = $this->TenantModel->DataTenant($stri);
		$siswa = $this->StudentModel->ShowNamaSiswa($stra);
		$evaluasi = $this->RaporModel->RaporEvaluasi($stre);
		$kelas = $this->RaporModel->KelasEvaluasi($stra,$evaluasi[0]['cat_acad_id']);
		$nilai = $this->RaporModel->NilaiEvaluasiSiswa($stra,$stre);
		foreach ($nilai as $key => $value) {
			if ($value['fds_score'] >= $value['suc_minimum_score']) {
				$nilai[$key]['keterangan'] = 'Tuntas';
			}else {
				$nilai[$key]['keterangan'] = 'Tidak Tuntas';
			}
			$nilai[$key]['nilai_huruf'] = $this->KonversiHasil($value['fds_score']);
		}
		foreach ($nilai as $key => $value) {
			$group[$value['gp_name']][] = $value; 
		}
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
				'pg_link' => base_url('rapor-siswa/' . $stri),
				'content_menu' => 'view_features/rapor/rls_mgnt_superadmin/pg_menu',
				'content_body' => 'view_features/rapor/rls_mgnt_superadmin/pg_rapor_siswa'
			],
			'data' => [
				'sekolah' => $sekolah,
				'siswa' => $siswa[0],
				'evaluasi' => $evaluasi[0],
				'kelas' => $kelas[0],
				'group' => $group
			]
		];
		return view('layout/main_layout', $this->partial);
	}
	#####

	
}
