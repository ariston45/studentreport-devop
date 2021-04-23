<?php
namespace App\Controllers\General;
use App\Controllers\BaseController;
use App\Models\AuthModel;
use CodeIgniter\Router\RouteCollection;

class Authentification extends BaseController
{
	// Construct
	public function __construct() {
    $this->AuthModel = new AuthModel();
		$this->session = \Config\Services::session();
		if ($this->session->get('logged_in') == TRUE) {
			return redirect()->to(base_url('/home'));
		}else {
			return redirect()->to(base_url('/login'));
		}
  }

	// Index
	public function index()
	{
		if (isset($_POST['username']) == FALSE OR isset($_POST['password']) == FALSE) {
			return redirect()->to(base_url('/login'));
		}
		$data =[
			'username'=>$_POST['username'],
			'password'=>$_POST['password']
		];
		$user_data = $this->AuthModel->AuthUser($data);
		if (isset($user_data[0])) {
			if ($user_data[0]['u_id_access'] === 'MGNT') {
				$ses_data = [
					'u_id' => $user_data[0]['u_id'],
					'u_name' => $user_data[0]['u_name'],
					'u_rules_access' => $user_data[0]['u_rules_access'],
					'logged_in' => TRUE
				];
				$this->session->set($ses_data);
			}else {
				$ses_data = [
					'u_id' => $user_data[0]['u_id'],
					'u_name' => $user_data[0]['u_name'],
					'u_rules_access' => $user_data[0]['u_rules_access'],
					'u_id_access' => $user_data[0]['u_id_access'],
					'logged_in' => TRUE
				];
				$this->session->set($ses_data);
			}
			return redirect()->to(base_url('home'));
		}else {
			return redirect()->to(base_url('login'));
		}
	}

	// D
	public function Directpage()
	{
		return redirect()->to(base_url());			
	}
  
	// E
	public function exp()
	{
		return view('example');
	}

	// G
	public function Loginpage()
	{
		return view('view_gateaway/login_page');
	}

	// I
	public function Identification($ses_data)
	{
		switch ($ses_data['user_management']) {
			case 'MGNT_SUPERADMIN':
				# code...
				break;
			case 'MGNT_MARKETING':
				# code...
				break;
			case 'MGNT_ADMIN':
				// die('echo');
				$dataPart = array(	
					'title' => '',
					'listmenu' => 'view_features/listmenu/menus_mgnt_admin',
					'content'	=> 'view_features/dashboard/rls_mgnt_admin/index'
				);
				return view('layout/main_layout.php');
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
				# code...
				break;
		}
	}

	// L
	public function Logout()
	{
		$this->session->destroy();
		return redirect()->to(base_url('/login'));
	}





}
