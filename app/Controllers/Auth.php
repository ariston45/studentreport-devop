<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;

class Auth extends BaseController
{
	public function __construct() {
    $this->AuthModel = new AuthModel();
		$this->session = \Config\Services::session();
		if ($this->session->get('logged_in') == TRUE) {
			return redirect()->to(base_url('beranda'));
		}else {
			return redirect()->to(base_url('login'));
		}
  }
	#####
	public function index()
	{
		if (isset($_POST['username']) == FALSE OR isset($_POST['password']) == FALSE) {
			return redirect()->to(base_url('login'));
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
			return redirect()->to(base_url('beranda'));
		}else {
			return redirect()->to(base_url('login'));
		}
	}
	#####
	public function Logout()
	{
		$this->session->destroy();
		return redirect()->to(base_url('login'));
	}
	#####
	public function Loginpage()
	{
		return view('view_gateaway/login_page');
	}

}
