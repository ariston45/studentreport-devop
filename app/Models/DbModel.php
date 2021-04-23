<?php

namespace App\Models;

use CodeIgniter\Model;

class DbModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'dbs';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [];

	function __construct(){
		parent::__construct();
		$this->db = \Config\Database::connect();
	}

	public function DataTenant($id)
	{
		$builder = $this->db->table('ext_tenant');
		$builder->where('ID',$id);
		$query  = $builder->get();
		return $query->getResultArray();
	}

	public function DataTenantMeta($id)
	{
		$builder = $this->db->table('ext_tenant_meta');
		$builder->where('id_tenant',$id);
		$query  = $builder->get();
		return $query->getResultArray();
	}

	public function Connector_key($key_access)
	{
		$builder = $this->db->table('ext_connector');
		$builder->where('key_access',$key_access);
		$query  = $builder->get();
		return $query->getResultArray();
	}

	public function Connector($connector)
	{
		UNSET($connector['key_access']);
		UNSET($connector['num_id']);
		$db = \Config\Database::connect($connector,TRUE);
		return $db;
	}

	public function Connector_test($db)
	{
		$builder = $db->table('students');
		$query  = $builder->get();
		return $query->getResultArray();
	}

}
