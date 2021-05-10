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

	public function ListTenant()
	{
		$builder = $this->db->table('tnt_school');
		$builder->select('*');
		$query   = $builder->get();
		return $query->getResultArray();
	}

	public function DataTenant($id)
	{
		$builder = $this->db->table('tnt_school');
		$builder->select('*');
		$builder->where('sch_id',$id);
		$query   = $builder->get();
		return $query->getResultArray();
	}

	public function DataNameTenant($id)
	{
		$builder = $this->db->table('tnt_school');
		$builder->select('sch_name');
		$builder->where('sch_id',$id);
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

	public function DataJurusan($stri)
	{
		$builder = $this->db->table('tnt_majors');
		$builder->select('*');
		$builder->where('mo_tnt_id',$stri);
		$query  = $builder->get();
		return $query->getResultArray();
	}

	public function ListKelas($id)
	{
		$builder = $this->db->table('tnt_class');
		$builder->select('*');
		$builder->where('cls_id_major',$id);
		$query  = $builder->get();
		return $query->getResultArray();
	}

	public function DataTenantMajor($id)
	{
		$builder = $this->db->table('tnt_majors');
		$builder->select('mj_name');
		$builder->where('mj_id',$id);
		$query   = $builder->get();
		return $query->getResultArray();
	}

	public function DataTenantClass($id)
	{
		$builder = $this->db->table('tnt_class');
		$builder->select('cls_name');
		$builder->where('cls_id',$id);
		$query   = $builder->get();
		return $query->getResultArray();
	}

	public function GuruTenant($id)
	{
		$builder = $this->db->table('user');
		$builder->select('user.u_id,u_name,u_email,u_phone,u_address');
		$builder->join('user_meta','user.u_id = user_meta.u_id');
		$builder->where('user.u_id_access',$id);
		$builder->where('user.u_rules_access','TNT_TEACHER');
		$query   = $builder->get();
		return $query->getResultArray();
	}

	public function DataMapelGuru($ida,$ids)
	{
		$builder = $this->db->table('tnt_teacher');
		$builder->select('*');
		$builder->join('tnt_subject','tnt_teacher.tch_subject_id = tnt_subject.suc_subject_id');
		$builder->where('tnt_teacher.u_id_access',$ida);
		$builder->where('tnt_teacher.tch_id',$ids);
		$query   = $builder->get();
		return $query->getResultArray();
	}

	

}
