<?php

namespace App\Controllers\Customers;
use App\Models\AuthModel;
use App\Models\TenantModel;
use App\Models\DbModel;
use App\Models\UserModel;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\BaseController;

class Customers extends BaseController
{	
	public function __construct() 
	{
    $this->AuthModel = new AuthModel();
		$this->TenantModel = new TenantModel();
		$this->DbModel = new DbModel();
		$this->UserModel = new UserModel();
		$this->session = \Config\Services::session();
		$this->logged_in = $this->session->get('logged_in');
		$this->id_access = $this->session->get('id_access');
  }

  public function index()
  {
		$schools = $this->TenantModel->DataTenant();
		switch ($this->session->get('user_management')) {
			case 'MGNT_SUPERADMIN':
				$this->partial = [	
					'title' => 'Customers',
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
					'data' => $tenants
				];
				return view('layout/main_layout',$this->partial);
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
					'data' => $tenants
				];
				return view('layout/main_layout',$this->partial);
				break;
			case 'EX_ADMIN':
				# code...
				break;	
			case 'EX_MANAGER':
				# code...
				break;

			case 'EX_PROCTOR':
				# code...
				break;	

			default:
				return redirect()->to(base_url('/login'));
				break;
		}
  }

	public function ManageCustomer($stri)
	{
		$tenant = $this->TenantDatabases($stri);
		$this->partial = [
			'style' => [
				0 => 'plugins/datatables/scr_style',
			],
			'javascript' => [
				0 => 'plugins/datatables/scr_javascript',
				1 => 'plugins/uploadinput/scr_javascript',
			], 	
			'title' => 'helo',
			'menu' => 'view_features/listmenu/menus_mgnt_admin',
			'pagetitle' => '',
			'segments' => [
				1 => $this->request->uri->getSegment(1),
				2 => $this->request->uri->getSegment(2),
				3 => $this->request->uri->getSegment(3)
			],
			'heading' => 'view_features/listmenu/heading',
			'breadcrumb' => [
				'customers' => 'Customers',
				'customers/'.$stri => $tenant['data'][0]['tnt_name']
			],
			'content'	=> [
				'content_menu' => 'view_features/customers/rls_mgnt_admin/pg_customers_menu',
				'content_body' => 'view_features/customers/rls_mgnt_admin/pg_customers_mgnt'
			],
			'data' => [
				'url' => 'customers/'.strtolower($tenant['data'][0]['ID']),
				'subpagetitle' => $tenant['data'][0]['tnt_name'],
				'metas' => $tenant['datameta'],
			]
		];
		return view('layout/main_layout',$this->partial);
	}

	public function ManageStudent()
	{
		echo 'hide';
	}

	public function ManageUser($stri)
	{
		$tenant = $this->TenantDatabases($stri);
		$tenant_list = $this->TenantModel->ListTenant();
		$data_user = $this->UserModel->ListUser($stri,$tenant['db']);
		$this->partial = [
			'style' => [
				0 => 'plugins/datatables/scr_style',
			],
			'javascript' => [
				0 => 'plugins/datatables/scr_javascript',
				1 => 'plugins/uploadinput/scr_javascript',
			], 
			'title' => 'helo',
			'menu' => 'view_features/listmenu/menus_mgnt_admin',
			'pagetitle' => '',
			'segments' => [
				1 => $this->request->uri->getSegment(1),
				2 => $this->request->uri->getSegment(2),
				3 => $this->request->uri->getSegment(3)
			],
			'heading' => 'view_features/listmenu/heading',
			'breadcrumb' => [
				'customers' => 'Customers',
				'customers/'.$stri => $tenant['data'][0]['tnt_name']
			],
			'content'	=> [
				'content_menu' => 'view_features/customers/rls_mgnt_admin/pg_customers_menu',
				'content_body' => 'view_features/customers/rls_mgnt_admin/pg_customers_mgnt_user'
			],
			'modal'=> '',
			'data' => [
				'id_access' => $tenant['data'][0]['ID'],
				'url' => 'customers/'.strtolower($tenant['data'][0]['ID']),
				'subpagetitle' => $tenant['data'][0]['tnt_name'],
				'metas' => '',
				'user' => $data_user,
				'tenant' => $tenant_list,
				'tenant_group_id' => strtoupper($this->request->uri->getSegment(2))
			]
		];
		return view('layout/main_layout',$this->partial);
	}

	public function ManageUserDetail($stri,$stra)
	{
		$tenant = $this->TenantDatabases($stri);
		$metas = $this->UserModel->ListUserMeta($stra,$tenant['db']);
		$ar_userdata =  $this->UserModel->ListUserDetail($stra,$tenant['db']);
		$ar_meta = array();
		foreach ($metas as $key => $value) {
			$ar_meta[$value['parameter']] = $value['value'];
		}
		$user = [
			'data' =>[
					'Username' => $ar_userdata[0]['user_login'],
					'Full Name' => $ar_userdata[0]['user_fullname'],
					'Email' => $ar_userdata[0]['user_email'],
					'User Rules' => $ar_userdata[0]['user_management_rules'],
					'Access Tenant' => $ar_userdata[0]['user_access_id']
				],
			'datameta' => [
				'Phone' => $ar_meta['Phone'],
				'Address' => $ar_meta['Address'],
				'Birthday' => $ar_meta['Birthday'],
				'Notes' => $ar_meta['Notes']
			]
		];
		$this->partial = [
			'style' => 'plugins/datatables/scr_style',
			'javascript' => 'plugins/datatables/scr_javascript',	
			'title' => 'helo',
			'menu' => 'view_features/listmenu/menus_mgnt_admin',
			'pagetitle' => '',
			'segments' => [
				1 => $this->request->uri->getSegment(1),
				2 => $this->request->uri->getSegment(2),
				3 => $this->request->uri->getSegment(3)
			],
			'heading' => 'view_features/listmenu/heading',
			'breadcrumb' => [
				'customers' => 'Customers',
				'customers/'.$stri => $tenant['data'][0]['tnt_name']
			],
			'content'	=> [
				'content_menu' => 'view_features/customers/rls_mgnt_admin/pg_customers_menu',
				'content_body' => 'view_features/customers/rls_mgnt_admin/pg_customers_mgnt_user_view'
			],
			'data' => [
				'url' => 'customers/'.strtolower($tenant['data'][0]['ID']),
				'subpagetitle' => $tenant['data'][0]['tnt_name'],
				'user' => $user['data'],
				'meta' => $user['datameta'],
			]
		];
		return view('layout/main_layout',$this->partial);
	}

	public function ExeAdduserCustomer($stri)
	{
		// if (!$this->validate([
		// 	'pics' => [
		// 		'rules' => 'uploaded[pics]|mime_in[pics,image/jpg,image/jpeg,image/gif,image/png]|max_size[pics,2048]',
		// 		'errors' => [
		// 			'uploaded' => 'Harus Ada File yang diupload',
		// 			'mime_in' => 'File Extention Harus Berupa jpg,jpeg,gif,png',
		// 			'max_size' => 'Ukuran File Maksimal 2 MB'
		// 		]
		// 	]
		// ])) {
		// 	session()->setFlashdata('error', $this->validator->listErrors());
		// 	return redirect()->back()->withInput();
		// }
		// session()->setFlashdata('success', 'Berkas Berhasil diupload');
		$dataBerkas = $this->request->getFile('pics');
		$fileName = $dataBerkas->getRandomName();
		$dataBerkas->move('uploads/images/', $fileName);
	
		$db = $this->TenantDatabases($stri);
		if (!$_POST['username']) {
			echo'
			<script type="text/javascript">
        alert("Please first input your username.");
				window.history.back();
      </script>';
		}
		if ($_POST['user-access'] == false) {
			echo'
			<script type="text/javascript">
        alert("Please give `rule-access` for the user.");
				window.history.back();
      </script>';
		}
		if ($_POST['password'] != $_POST['confirm-password']) {
			echo'
			<script type="text/javascript">
        alert("Your password does not validation");
				window.history.back();
      </script>';
		}
		$birthday = DATE('Y-m-d',strtotime($_POST['birthday']));
		$id = $this->UserModel->Maxid($db['db']);
		$gen_id = $id[0]['id'] + 1;
		$datauser = [
			'id' => $gen_id,
			'user_password' => $_POST['password'],
			'user_email'=>$_POST['email'],
			'user_login'=>$_POST['username'],
			'user_fullname'=>$_POST['fullname'],
			'user_status'=>'true',
			'user_management_rules'=>$_POST['user-access'],
			'user_tenant_group' => $_POST['tenant-group'],
			'user_access_id' => implode(',',$_POST['tenant-access']),
		];
		$metapost = array($_POST['phone_number'],$_POST['address'],$birthday,$_POST['job'],$fileName);
		$metaparam = array('Phone','Address','Birthday','Job Rule','Picture');
		foreach ($metaparam as $key => $param) {
			$datausermeta[$key] = [
				'id_user' => $gen_id,
				'parameter'=> $param,
				'value' => $metapost[$key]
			];
		}
		$a = $this->UserModel->StoreUser($datauser,$db['db']);
		$b = $this->UserModel->StoreUserMeta($datausermeta,$db['db']);
		if ($a == TRUE and $b == TRUE) {
			echo '
			<script type="text/javascript">
        alert("Creating a user account has been successful.");
      </script>';
			return redirect()->to('/customers//'.strtolower( $_POST['tenant-group']).'/user-manager');
		}else {
			echo '
			<script type="text/javascript">
        alert("Creating a user account didn`t work.");
      </script>';
			return redirect()->to('/customers//'.strtolower( $_POST['tenant-group']).'/user-manager');
		}
	}
}