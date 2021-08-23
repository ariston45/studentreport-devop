<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;
use App\Models\TenantModel;
use App\Models\DbModel;
use App\Models\UserModel;
use App\Models\StudentModel;
use App\Models\AkademikModel;

class PusatData extends BaseController
{
	#
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
	public function NewUserIds()
	{
		$maxid = $this->UserModel->MaxIdUser();
		foreach ($maxid as $key => $value) {
			$i = $value['id'] + 1;
		}
		return $i;
	}
	#####
	public function NewSiswaIds()
	{
		$maxid = $this->StudentModel->MaxIdStudent();
		foreach ($maxid as $key => $value) {
			$i = $value['id'] + 1;
		}
		return $i;
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
						'content_body' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_pusat_data'
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
	public function ProfilSekolah($stri)
	{
		switch ($this->session->get('u_rules_access')) {
			case 'MGNT_SUPERADMIN':
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
					'pgtitle' => $this->session->get('sch_name'),
					'breadcrumb' => [
						'customers' => 'Customers'
					],
					'content'	=> [
						'pg_menu_url' => 'pusat-data/' . strtolower($school[0]['sch_id']),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
						'content_menu' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_menu',
						'content_body' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_profil_sekolah'
					],
					'data' => [
						'school' => $school,
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
	public function Siswa($stri)
	{
		switch ($this->session->get('u_rules_access')) {
			case 'MGNT_SUPERADMIN':
				$siswa = $this->StudentModel->SiswaTenant($stri);
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
					'pgtitle' => $this->session->get('sch_name'),
					'breadcrumb' => [
						'customers' => 'Customers'
					],
					'content'	=> [
						'pg_menu_url' => 'pusat-data/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
						'content_menu' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_menu',
						'content_body' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_siswa'
					],
					'data' => [
						'siswa' => $siswa,
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
	public function TambahSiswa($stri)
	{
		$siswa = $this->StudentModel->SiswaTenant($stri);
		$school = $this->TenantModel->DataTenant($stri);
		$jurusan = $this->TenantModel->DataJurusan($stri);

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
				'pg_menu_url' => 'pusat-data/' . strtolower($stri),
				'pg_title' => $school[0]['sch_name'],
				'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
				'content_menu' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_menu',
				'content_body' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_tambah_siswa'
			],
			'data' => [
				'siswa' => $siswa,
				'sekolah' => $school,
				'jurusan' => $jurusan
			]
		];
		return view('layout/main_layout', $this->partial);
	}

	public function EksekusiTambahSiswa($stri)
	{
		$file_name = $_FILES['file_excel']['name'];
		$file_tmp = $_FILES['file_excel']['tmp_name'];
		$path = pathinfo($file_name);
		$extention = $path['extension'];

		$kelas = $_POST['kelas'];
		$jurusan = $_POST['jurusan'];

		if (empty($jurusan)) {
			$e[0] = true;
			session()->setFlashdata('notif_jurusan', 'Jurusan harus di pilih.');
		}
		if (empty($kelas)) {
			$e[1] = true;
			session()->setFlashdata('notif_kelas', 'Kelas harus di pilih.');
		}
		if (!empty($e)) {
			session()->setFlashdata('error', 'Gagal Upload.');
			return redirect()->back()->withInput();
		}

		if ($extention == 'xls') {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
		} else if ($extention == 'xlsx') {
			$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
		} else {
			session()->setFlashdata('error', 'Gagal Upload.');
			session()->setFlashdata('notif_filetype', 'Format file tidak didukung, harap upload file sesuai template dan dan format yang sudah disediakan.');
			return redirect()->back()->withInput();
		}
		
		$spreadsheet = $reader->load($file_tmp);
		$sheet = $spreadsheet->getActiveSheet()->toArray();
		$id_user = $this->NewUserIds();
		$id_siswa = $this->NewSiswaIds();

		foreach ($sheet as $key => $value) {
			if (strtolower($value[3]) == strtolower($value[8])) {
				$e['email'] = true;
				$cek_email[$key] = $value[3];
			}
		}
		if (isset($e['email'])) {
			session()->setFlashdata('notif_sameemail', 'Email siswa tidak sama dengan email wali murid, mohon wali murid menggunakan alamat email yang berbeda. Email yang sama : ' . implode(', ', $cek_email));
		}
		
		foreach ($sheet as $key => $value) {
			if ($key != 0) {
				$field_user[$key]['u_id'] = $id_user;
				$field_user[$key]['u_name'] = $value[7];
				$field_user[$key]['u_rules_access'] = 'TNT_PARENT';
				$field_user[$key]['u_id_access'] = strtoupper($stri);
				$field_user[$key]['u_email'] = $value[8];
				$field_user[$key]['u_password'] = date('dmY', strtotime($value[5]));
				$field_user_meta[$key]['u_id'] = $id_user;
				$field_user_meta[$key]['u_fullname'] = $value[7];
				$field_user_meta[$key]['u_address'] = $value[10];
				$field_user_meta[$key]['u_phone'] = $value[9];
				$field_user_meta[$key]['u_scnd_email'] = NULL;
				$field_user_meta[$key]['u_job_position'] = 'Wali Siswa';
				$field_student[$key]['stu_tnt_id'] = strtoupper($stri);
				$field_student[$key]['stu_num'] = $id_siswa;
				$field_student[$key]['stu_id'] = $value[1];
				$field_student[$key]['stu_fullname'] = $value[2];
				$field_student[$key]['stu_email'] = $value[3];
				$field_student[$key]['stu_id_parents'] = $id_user;
				$field_student[$key]['stu_birthplace'] = $value[5];
				$field_student[$key]['stu_birthday'] = DATE('Y-m-d', strtotime($value[4]));
				$field_student[$key]['stu_gender'] = $value[6];
				$field_student[$key]['stu_class'] = $kelas;
				$id_user++;
				$id_siswa++;
			}
		}

		$ar_email = array_column($field_user, 'u_email');
		$uniq_email = array_unique(array_column($field_user, 'u_email'));
		$ar_nis = array_column($field_student, 'stu_id');
		$uniq_nis = array_unique(array_column($field_student, 'stu_id'));

		$diff_nis = array_diff_key($ar_nis, $uniq_nis);
		$diff_email = array_diff_key($ar_email, $uniq_email);

		$check_nis = $this->StudentModel->StudentChekId($ar_nis, $stri);
		foreach ($check_nis as $key => $value) {
			$stu_exist[$key] = $value['stu_fullname'] . '(' . $value['stu_id'] . ')';
		}

		$check_email = $this->UserModel->UserChekId($ar_email, $stri);
		foreach ($check_email as $key => $value) {
			$email_exist[$key] = $value['u_email'];
		}

		if (!empty($diff_nis)) {
			$ar[0] = true;
			session()->setFlashdata('notif_dup_nis', 'Nomor induk siswa tidak boleh ada yang duplikat. Data duplikat : ' . implode(', ', $diff_nis));
		}
		if (!empty($diff_email)) {
			$ar[1] = true;
			session()->setFlashdata('notif_dup_email', 'Email tidak boleh ada yang duplikat. Data duplikat : ' . implode(', ', $diff_email));
		}
		if (!empty($stu_exist)) {
			$ar[1] = true;
			session()->setFlashdata('notif_id_exist', 'Data siswa sudah terdaftar di sistem. Data siswa : ' . implode(', ', $stu_exist));
		}

		if (!empty($ar)) {
			session()->setFlashdata('error', 'Gagal Upload.');
			return redirect()->back()->withInput();
		} else {
			$this->UserModel->StoreUserWali($field_user);
			$this->StudentModel->StoreSiswa($field_student);
			$this->UserModel->StoreUserWaliMeta($field_user_meta);
			session()->setFlashdata('success', 'Data siswa dan wali murid telah berhasil ditambahkan.');
			return redirect()->back()->withInput();
		}
	}
	#####
	public function Kelas_json()
	{
		$id_jurusan = $_POST['id_jurusan'];
		$kelas = $this->TenantModel->ListKelas($id_jurusan);
		$option = '<option value="' . FALSE . '">Pilih kelas...</option>';
		foreach ($kelas as $key => $value) {
			$option .= '<option value="' . $value['cls_id'] . '">' . $value['cls_name'] . '</option>';
		}
		$callback = array('list_kelas' => $option);
		echo json_encode($callback);
	}
	#####
	public function KelasSiswa_json()
	{
		$id_kelas = $_POST['id_kelas'];
		$kelas = $this->StudentModel->ListKelasSiswa($id_kelas);
		$option = '<option value="' . FALSE . '">Pilih siswa ... </option>';
		foreach ($kelas as $key => $value) {
			$option .= '<option value="' . $value['stu_num'] . '">' . $value['stu_fullname'] . '</option>';
		}
		$callback = array('list_siswa' => $option);
		echo json_encode($callback);
	}
	#####
	public function Mapel_json()
	{
		$id_kelas = $_POST['id_kelas'];
		$mapel = $this->TenantModel->ListMapel($id_kelas);
		$option = '<option value="' . FALSE . '">Pilih mata pelajaran...</option>';
		foreach ($mapel as $key => $value) {
			$option .= '<option value="' . $value['suc_subject_id'] . '">' . $value['suc_name'] . '</option>';
		}
		$callback = array('list_mapel' => $option);
		echo json_encode($callback);
	}
	#####
	public function Guru($stri)
	{
		switch ($this->session->get('u_rules_access')) {
			case 'MGNT_SUPERADMIN':
				$guru = $this->TenantModel->GuruTenant($stri);
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
					'pgtitle' => $this->session->get('sch_name'),
					'breadcrumb' => [
						'customers' => 'Customers'
					],
					'content'	=> [
						'pg_menu_url' => 'pusat-data/' . strtolower($stri),
						'pg_detail_guru_url' => 'pusat-data/' . strtolower($stri) . '/guru',
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
						'content_menu' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_menu',
						'content_body' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_guru'
					],
					'data' => [
						'guru' => $guru,
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
	public function GuruDetail($stri,$stra)
	{
		$guru = $this->TenantModel->GuruTenant($stri);
		$school = $this->TenantModel->DataTenant($stri);
		$mapel = $this->TenantModel->DataMapelGuru($stri,$stra);
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
				'pg_menu_url' => 'pusat-data/' . strtolower($stri),
				'pg_tambah_mapel_url' =>'pusat-data/'.strtolower($stri).'/guru'.'/'.$stra,
				'pg_title' => $school[0]['sch_name'],
				'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
				'content_menu' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_menu',
				'content_body' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_guru_detail'
			],
			'data' => [
				'school' => $school,
				'guru' => $guru,
				'mapel' => $mapel
			]
		];
		return view('layout/main_layout', $this->partial);
	}
	#####
	public function GuruTambahPelajaran($stri,$stra)
	{
		$school = $this->TenantModel->DataTenant($stri);
		$semuamapel = $this->TenantModel->DataTenantMapel($stri);
		$jurusan = $this->TenantModel->DataJurusan($stri);
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
				'pg_menu_url' => 'pusat-data/' . strtolower($stri),
				'pg_tambah_mapel_url' =>'pusat-data/'.strtolower($stri).'/guru'.'/'.$stra,
				'pg_title' => $school[0]['sch_name'],
				'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
				'content_menu' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_menu',
				'content_body' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_guru_tambah_mapel'
			],
			'data' => [
				'school' => $school,
				'semuamapel' => $semuamapel,
				'jurusan' => $jurusan
			]
		];
		return view('layout/main_layout', $this->partial);
	}
	#####
	public function EksekusiTambahMapelGuru($stri,$stra)
	{
		$data = [
			'ted_tch_id' => $stra,
			'ted_subject_id' => $_POST['mapel'],
			'ted_class_id' => $_POST['kelas']
		];
		$cek_mapel_kelas = $this->TenantModel->CekMapelKelas($data);
		if (!empty($cek_mapel_kelas)) {
			print_r($cek_mapel_kelas);
			session()->setFlashdata('error', 'Mata Pelajaran sudah di tambahkan di kelas tersebut.');
			return redirect()->back()->withInput();
		}else{
			$this->TenantModel->StoreMapelGuru($data);
			session()->setFlashdata('success', 'Data mata pelajaran telah berhasil ditabahkan.');
			return redirect()->back()->withInput();
		}
	}
	#####
	public function TambahGuru($stri)
	{
		$school = $this->TenantModel->DataTenant($stri);
		$semuamapel = $this->TenantModel->DataTenantMapel($stri);
		$jurusan = $this->TenantModel->DataJurusan($stri);
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
				'pg_menu_url' => 'pusat-data/'.strtolower($stri).'/',
				'pg_title' => $school[0]['sch_name'],
				'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
				'content_menu' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_menu',
				'content_body' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_guru_tambah_guru'
			],
			'data' => [
				'school' => $school,
				'semuamapel' => $semuamapel,
				'jurusan' => $jurusan
			]
		];
		return view('layout/main_layout', $this->partial);
	}
	#####
	public function EksekusiTambahGuru($a)
	{
		$stri = strtoupper($a);
		$id = $this->NewUserIds();
		if ($_POST['email'] != $_POST['konfirmasi_email']) {
			session()->setFlashdata('notif_email_error', 'Konfirmasi data email tidak sama, harap masukan email dengan benar.');
			return redirect()->back()->withInput();
		}
		if ($_POST['password'] != $_POST['konfirmasi_password']) {
			session()->setFlashdata('notif_password_error', 'Konfirmasi password tidak sama, harap masukan email dengan benar.');
			return redirect()->back()->withInput();
		}
		$user = [
			'u_id' => $id,
			'u_name' => $_POST['nama'],
			'u_rules_access' => 'TNT_TEACHER',
			'u_id_access' => $stri,
			'u_email' => $_POST['email'],
			'u_password' => $_POST['password'],
		];
		$user_meta = [
			'u_id' => $id,
			'u_fullname' => $_POST['nama'],
			'u_address' => $_POST['alamat'],
			'u_phone' => $_POST['telepon'],
			'u_scnd_email' => false,
			'u_job_position' => 'Guru'
		];
		$tnt_teacher = [
			'tch_id' => $id,
			'tch_tnt_id' => $stri
		];
		$this->UserModel->StoreUserv1($user);
		$this->UserModel->StoreUserMeta($user_meta);
		$this->TenantModel->StoreGuru($tnt_teacher);
		session()->setFlashdata('success', 'Data guru telah berhasil ditambahkan.');
		return redirect()->back()->withInput();
	}
	#####
	public function WaliMurid($stri)
	{
		$idi = strtoupper($stri); 
		switch ($this->session->get('u_rules_access')) {
			case 'MGNT_SUPERADMIN':
				$wali = $this->StudentModel->ListWaliMurid($idi);
				$school = $this->TenantModel->DataTenant($idi);
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
						'pg_menu_url' => 'pusat-data/'.strtolower($stri),
						'pg_edit_url' =>  'pusat-data/'.strtolower($stri).'/wali-murid',
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
						'content_menu' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_menu',
						'content_body' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_walimurid'
					],
					'data' => [
						'siswa' => $wali,
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
	######
	public function EditWaliMurid($stri,$stra)
	{
		$school = $this->TenantModel->DataTenant($stri);
		$wali = $this->StudentModel->WaliMurid($stra);
		$this->partial = [
			'title' => 'Trust Academyc Solution | ',
			'menu' => 'view_features/listmenu/menus_mgnt_superadmin',
			'style' => [
				0 => 'plugins/datatables/scr_style',
			],
			'javascript' => [
				0 => 'plugins/datatables/scr_javascript',
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
				'pg_menu_url' => 'pusat-data/'.strtolower($stri).'/',
				'pg_exe_edit' => 'pusat-data/'.strtolower($stri).'/wali-murid'.'/'.$stra.'/edit-exe',
				'pg_title' => $school[0]['sch_name'],
				'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
				'content_menu' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_menu',
				'content_body' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_edit_walimurid'
			],
			'data' => [
				'school' => $school,
				'wali' => $wali
			]
		];
		return view('layout/main_layout', $this->partial);
	}
	#####
	public function AksiEditWaliMurid($stri,$stra)
	{
		if ($_POST['password'] != '') {
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
		$this->UserModel->UpdateUser($user,$stra);
		$this->UserModel->UpdateuserMeta($user_meta,$stra);
		return redirect()->back()->withInput();
	}
	#####
	public function Kelas($stri)
	{
		switch ($this->session->get('u_rules_access')) {
			case 'MGNT_SUPERADMIN':
				$siswa = $this->StudentModel->SiswaTenant($stri);
				$school = $this->TenantModel->DataTenant($stri);
				$kelas = $this->TenantModel->KelasTenant($stri);
				foreach ($kelas as $key => $value) {
					$n = $this->TenantModel->JumlahSiswa($value['cls_id']);
					$cls[$key]['id'] = $value['cls_id'];
					$cls[$key]['kelas'] = $value['cls_name'];
					$cls[$key]['jurusan'] = $value['mo_name'];
					$cls[$key]['jml'] = $n[0]['jumlah'];
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
						'pg_menu_url' => 'pusat-data/' . strtolower($stri),
						'pg_title' => $school[0]['sch_name'],
						'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
						'content_menu' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_menu',
						'content_body' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_kelas'
					],
					'data' => [
						'siswa' => $siswa,
						'kelas' => $cls
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
	######
	public function TambahKelas($stri)
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
					'pgtitle' => $this->session->get('sch_name'),
			'breadcrumb' => [
				'customers' => 'Customers'
			],
			'content'	=> [
				'pg_menu_url' => 'pusat-data/'.strtolower($stri).'/',
				'pg_title' => $school[0]['sch_name'],
				'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
				'content_menu' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_menu',
				'content_body' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_tambah_kelas'
			],
			'data' => [
				'school' => $school,
				'semuamapel' => $semuamapel,
				'jurusan' => $jurusan,
				'lambel' => $lambel[0]['lambel']
			]
		];
		return view('layout/main_layout', $this->partial);
	}
	#####
	public function EksekusiTambahKelas($stri)
	{
		$id = $this->TenantModel->MaxIdClass();
		$number = $id[0]['id'] + 1;
		$new_id = 'cls.'.$number;
		$data =[
			'cls_id' => $new_id,
			'cls_id_major' => $_POST['jurusan'],
			'cls_name' => $_POST['nama'],
			'cls_level' => $_POST['tingkat']
		];
		$this->TenantModel->StoreKelas($data);
		return redirect()->back()->withInput();
	}
	#####
	public function TambahJurusan($stri)
	{
		$school = $this->TenantModel->DataTenant($stri);
		$semuamapel = $this->TenantModel->DataTenantMapel($stri);
		$jurusan = $this->TenantModel->DataJurusan($stri);
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
				'pg_menu_url' => 'pusat-data/'.strtolower($stri).'/',
				'pg_title' => $school[0]['sch_name'],
				'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
				'content_menu' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_menu',
				'content_body' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_tambah_jurusan'
			],
			'data' => [
				'school' => $school,
				'semuamapel' => $semuamapel,
				'jurusan' => $jurusan
			]
		];
		return view('layout/main_layout', $this->partial);
	}
	#####
	public function EksekusiTambahJurusan($stri)
	{
		$id = $this->TenantModel->MaxIdMajors();
		$number = $id[0]['id'] + 1;
		$new_id = 'cls.'.$number;
		$data =[
			'mo_id' => $new_id,
			'mo_tnt_id' => strtoupper($stri), 
			'mo_name' => $_POST['nama']
		];
		$this->TenantModel->StoreJurusan($data);
		return redirect()->back()->withInput();
	}
	#####
	public function UserAdmin($stri)
	{
		$idi = strtoupper($stri);
		$admin = $this->TenantModel->AdminSekolah($idi);
		$school = $this->TenantModel->DataTenant($idi);
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
				'pg_menu_url' => 'pusat-data/' . strtolower($stri),
				'pg_edit_url' =>  'pusat-data/' . strtolower($stri) . '/user-admin',
				'pg_title' => $school[0]['sch_name'],
				'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
				'content_menu' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_menu',
				'content_body' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_useradmin'
			],
			'data' => [
				'admin' => $admin,
			]
		];
		return view('layout/main_layout', $this->partial);		
	}
	#####
	public function EditUserAdmin($stri,$stra)
	{
		$school = $this->TenantModel->DataTenant($stri);
		$admin = $this->TenantModel->IdentifikasiUser($stra);
		$this->partial = [
			'title' => 'Trust Academyc Solution | ',
			'menu' => 'view_features/listmenu/menus_mgnt_superadmin',
			'style' => [
				0 => 'plugins/datatables/scr_style',
			],
			'javascript' => [
				0 => 'plugins/datatables/scr_javascript',
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
				'pg_menu_url' => 'pusat-data/'.strtolower($stri).'/',
				'pg_exe_edit' => 'pusat-data/'.strtolower($stri).'/user-admin'.'/'.$stra.'/edit-exe',
				'pg_title' => $school[0]['sch_name'],
				'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
				'content_menu' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_menu',
				'content_body' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_edit_useradmin'
			],
			'data' => [
				'school' => $school,
				'admin' => $admin
			]
		];
		return view('layout/main_layout', $this->partial);
	}
	#####
	public function AksiEditUserAdmin($stri,$stra)
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
		$this->UserModel->UpdateUser($user,$stra);
		$this->UserModel->UpdateuserMeta($user_meta,$stra);
		session()->setFlashdata('success', 'Data user telah berhasil diperbarui.');
		return redirect()->back()->withInput();
	}
	#####
	public function TambahAdmin($stri)
	{
		$school = $this->TenantModel->DataTenant($stri);
		$semuamapel = $this->TenantModel->DataTenantMapel($stri);
		$jurusan = $this->TenantModel->DataJurusan($stri);
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
				'pg_menu_url' => 'pusat-data/'.strtolower($stri).'/',
				'pg_title' => $school[0]['sch_name'],
				'pg_subtitle' => 'Pusat pengolahan data siswa, guru, wali murid, dan user administrasi sekolah.',
				'content_menu' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_menu',
				'content_body' => 'view_features/pusat-data/rls_mgnt_superadmin/pg_tambah_admin'
			],
			'data' => [
				'school' => $school,
				'semuamapel' => $semuamapel,
				'jurusan' => $jurusan
			]
		];
		return view('layout/main_layout', $this->partial);
	}
	#####
	public function EksekusiTambahAdmin($stri)
	{
		$stri = strtoupper($stri);
		$id = $this->NewUserIds();
		if ($_POST['akses'] == '') {
			session()->setFlashdata('notif_akses_error', 'User Belum di beri hak akses.');
			return redirect()->back()->withInput();
		}

		$user = [
			'u_id' => $id,
			'u_name' => $_POST['nama'],
			'u_rules_access' => $_POST['akses'],
			'u_id_access' => $stri,
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
}
