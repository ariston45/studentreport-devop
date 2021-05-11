<?php

namespace App\Models;

use CodeIgniter\Model;

class TenantModel extends Model
{
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
		$builder = $this->db->table('tnt_teach_detail');
		$builder->select('ted_id,suc_name,cls_name,mo_name');
		$builder->join('tnt_subject','tnt_teach_detail.ted_subject_id = tnt_subject.suc_subject_id');
		$builder->join('tnt_class','tnt_teach_detail.ted_class_id = tnt_class.cls_id');
		$builder->join('tnt_majors','tnt_class.cls_id_major = tnt_majors.mo_id');
		$builder->where('tnt_teach_detail.ted_tch_id',$ids);
		$builder->where('tnt_subject.suc_tnt_id',$ida);
		$query   = $builder->get();
		return $query->getResultArray();
	}

	public function DataTenantMapel($id)
	{
		$builder = $this->db->table('tnt_subject');
		$builder->select('*');
		$builder->where('suc_tnt_id',$id);
		$query = $builder->get();
		return $query->getResultArray();
	}

	public function StoreMapelGuru($data)
	{
		$builder = $this->db->table('tnt_teach_detail');
		$builder->insert($data);
		return TRUE;
	}

	public function StoreGuru($data)
	{
		$builder = $this->db->table('tnt_teacher');
		$builder->insert($data);
		return TRUE;
	}

}
