<?php
namespace App\Controllers\General;
use App\Models\AuthModel;
use CodeIgniter\Router\RouteCollection;
use App\Controllers\BaseController;
use App\Libraries\Breadcrumb;

class Mainpage extends BaseController
{	
	public function __construct() 
	{
    $this->AuthModel = new AuthModel();
		$this->session = \Config\Services::session();
		$this->logged_in = $this->session->get('logged_in');
		if ($this->logged_in == TRUE) {
			return redirect()->to(base_url('/home'));
		}else {
			return redirect()->to(base_url('/login'));
		}	
  }

	public function index()
	{
		switch ($this->session->get('u_rules_access')) {
			case 'MGNT_SUPERADMIN':
				$this->partial = array(	
					'title' => 'Dashboard',
					'style' => FALSE,
					'javascript' => FALSE,
					'segments' => [
						1 => $this->request->uri->getSegment(1),
						2 => $this->request->uri->getSegment(2)
					],
					'heading' => 'view_features/listmenu/heading',
					'breadcrumb' => [
						'home' => 'Home'
					],
					'menu' => 'view_features/listmenu/menus_mgnt_superadmin',
					'content'	=> [
						'content_menu' => '',
						'content_body' => 'view_features/dashboard/rls_mgnt_superadmin/main_content'
					],
					'data' => []
				);
				return view('layout/main_layout',$this->partial);
				break;

			case 'MGNT_MARKETING':
				# code...
				break;

			case 'MGNT_ADMIN':
				$this->partial = array(	
					'title' => 'helo',
					'style' => FALSE,
					'javascript' => FALSE,
					'segments' => [
						1 => $this->request->uri->getSegment(1),
						2 => $this->request->uri->getSegment(2)
					],
					'heading' => 'view_features/listmenu/heading',
					'breadcrumb' => [
						'home' => 'Home'
					],
					'menu' => 'view_features/listmenu/menus_mgnt_admin',
					'content'	=> [
						'content_menu' => '',
						'content_body' => 'view_features/dashboard/rls_mgnt_admin/main_content'
					],
					'data' => []
				);
				return view('layout/main_layout',$this->partial);
				break;

			case 'TNT_SUPERADMIN':
				$this->partial = array(	
					'title' => 'helo',
					'style' => FALSE,
					'javascript' => FALSE,
					'segments' => [
						1 => $this->request->uri->getSegment(1),
						2 => $this->request->uri->getSegment(2)
					],
					'heading' => 'view_features/listmenu/heading',
					'breadcrumb' => [
						'home' => 'Home'
					],
					'menu' => 'view_features/listmenu/menus_ex_admin',
					'content'	=> [
						'content_menu' => '',
						'content_body' => 'view_features/dashboard/rls_ex_admin/main_content'
					],
					'data' => []
				);
				return view('layout/main_layout',$this->partial);
				break;

			case 'TNT_ADMIN':
				# code...
				break;

			case 'TNT_TEACHER':
					# code...
				break;

			case 'value':
				# code...
				break;

			default:
				return redirect()->to(base_url('/login'));
				break;
		}
	}

	
}
