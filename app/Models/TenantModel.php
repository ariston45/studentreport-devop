<?php

namespace App\Models;

use CodeIgniter\Model;

class TenantModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'ext_tenant';
	protected $primaryKey           = 'id';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [];

	// Dates
	protected $useTimestamps        = false;
	protected $dateFormat           = 'datetime';
	protected $createdField         = 'created_at';
	protected $updatedField         = 'updated_at';
	protected $deletedField         = 'deleted_at';

	// Validation
	protected $validationRules      = [];
	protected $validationMessages   = [];
	protected $skipValidation       = false;
	protected $cleanValidationRules = true;

	// Callbacks
	protected $allowCallbacks       = true;
	protected $beforeInsert         = [];
	protected $afterInsert          = [];
	protected $beforeUpdate         = [];
	protected $afterUpdate          = [];
	protected $beforeFind           = [];
	protected $afterFind            = [];
	protected $beforeDelete         = [];
	protected $afterDelete          = [];
	
	function __construct(){
		parent::__construct();
		$this->db = \Config\Database::connect();
	}

	public function DataTenant()
	{
		$builder = $this->db->table('tnt_school');
		$builder->select('*');
		$query   = $builder->get();
		return $query->getResultArray();
	}

	public function ListTenant()
	{
		$builder = $this->db->table('ext_tenant');
		$builder->select('*');
		$query   = $builder->get();
		return $query->getResultArray();
	}

	public function MetaTenant($str_id,$db)
	{
		$builder = $db->table('ext_tenant_meta');
		$builder->select('parameter,value');
		$builder->where('id_tenant',$str_id);
		$query  = $builder->get();
		return $query->getResultArray();
	}

	

}
