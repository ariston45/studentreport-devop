<?php

namespace App\Models;

use CodeIgniter\Model;

class RaporModel extends Model
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

	public function CariNama($data)
	{
		$builder = $this->db->table('tnt_student');
		$builder->select('*');
		$builder->where('stu_tnt_id',$data['param']);
		$builder->like('stu_fullname',$data['keywords']);
		$query  = $builder->get();
		return $query->getResultArray();
	}
	// 
	public function CariNis($data)
	{
		$builder = $this->db->table('tnt_student');
		$builder->select('*');
		$builder->where('stu_tnt_id',$data['param']);
		$builder->like('stu_id',$data['keywords']);
		$query  = $builder->get();
		return $query->getResultArray();
	}
	// 
	public function CariEmail($data)
	{
		$builder = $this->db->table('tnt_student');
		$builder->select('*');
		$builder->where('stu_tnt_id',$data['param']);
		$builder->like('stu_email',$data['keywords']);
		$query  = $builder->get();
		return $query->getResultArray();
	}
	// 
	public function ThAkademikSiswa($id)
	{
		$builder = $this->db->table('tnt_fixdata_asses');
		$builder->select('fds_aca_id');
		$builder->where('fds_std_number',$id);
		$builder->groupBy('fds_aca_id');
		$query = $builder->get();
		return $query->getResultArray();
	}
	// 
	public function FixNilaiAkademik($id)
	{
		$builder = $this->db->table('tnt_fixdata_asses');
		$builder->select('*');
		$builder->where('fds_std_number',$id);
		$query = $builder->get();
		return $query->getResultArray();
	}
	// 
	public function ThAkademikEvaluasi($id)
	{
		$builder = $this->db->table('tnt_assesment_category');
		$builder->select('*');
		$builder->where('cat_acad_id',$id);
		$query   = $builder->get();
		return $query->getResultArray();
	}
}
