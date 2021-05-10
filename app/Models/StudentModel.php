<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentModel extends Model
{
	function __construct(){
		parent::__construct();
		$this->db = \Config\Database::connect();
	}

	public function MaxIdStudent()
	{
		$builder = $this->db->table('tnt_student');
		$builder->select('MAX(stu_num) as id');
		$query  = $builder->get();
		return $query->getResultArray();
	}

	public function SiswaTenant($id)
	{
		$builder = $this->db->table('tnt_student');
		$builder->select(
			'stu_id,
			stu_email,
			stu_fullname,
			u_name,
			cls_name,
			mo_name,
			u_email');
		$builder->join('tnt_class','tnt_student.stu_class = tnt_class.cls_id', 'left');
		$builder->join('tnt_majors','tnt_majors.mo_id = tnt_class.cls_id_major','left');
		$builder->join('user','user.u_id = tnt_student.stu_id_parents ','left');
		$builder->where('tnt_student.stu_tnt_id',$id);
		$query   = $builder->get();
		return $query->getResultArray();
	}

	public function StudentChekId($data,$stri)
	{
		$builder = $this->db->table('tnt_student');
		$builder->where('stu_tnt_id',$stri);
		$builder->whereIn('stu_id', $data);
		$query  = $builder->get();
		return $query->getResultArray();
	}

	public function DataTenantParent($id)
	{
		$builder = $this->db->table('user');
		$builder->select('u_name');
		$builder->where('u_id',$id);
		$query   = $builder->get();
		return $query->getResultArray();
	}

	public function StoreSiswa($data)
	{
		$builder = $this->db->table('tnt_student');
		$builder->insertBatch($data);
		return TRUE;
	}

}
