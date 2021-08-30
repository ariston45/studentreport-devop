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
		$query = $builder->get();
		return $query->getResultArray();
	}
	// 
	public function KelasEvaluasi($id_siswa,$id_tahun)
	{
		$builder = $this->db->table('tnt_fixdata_asses');
		$builder->select('fds_cat_id,ach_years,cat_category_name,cls_id,cls_name');
		$builder->join('tnt_acad_years','tnt_fixdata_asses.fds_aca_id=tnt_acad_years.aca_id');
		$builder->join('tnt_assesment_category','tnt_fixdata_asses.fds_cat_id=tnt_assesment_category.cat_id');
		$builder->join('tnt_class','tnt_fixdata_asses.fds_class=tnt_class.cls_id');
		$builder->where('fds_std_number',$id_siswa);
		$builder->where('fds_aca_id',$id_tahun);
		$builder->groupBy('fds_cat_id');
		$query = $builder->get();
		return $query->getResultArray();
	}
	// 
	public function RaporEvaluasi($id)
	{
		$builder = $this->db->table('tnt_assesment_category');
		$builder->select(
			'tnt_assesment_category.cat_id,
			tnt_assesment_category.cat_acad_id,
			tnt_assesment_category.cat_category_name,
			tnt_assesment_category.cat_value_form,
			tnt_acad_years.ach_years'
		);
		$builder->join('tnt_acad_years','tnt_assesment_category.cat_acad_id = tnt_acad_years.aca_id ');
		$builder->where('tnt_assesment_category.cat_id',$id);
		$query = $builder->get();
		return $query->getResultArray();
	}
	//
	public function NilaiEvaluasiSiswa($idsis,$idcat)
	{
		$builder = $this->db->table('tnt_fixdata_asses');
		$builder->select(
			'tnt_fixdata_asses.fds_id,
			tnt_fixdata_asses.fds_class,
			tnt_subject.suc_name,
			tnt_fixdata_asses.fds_score,
			tnt_subject.suc_minimum_score,
			tnt_subject_group.gp_id,
			tnt_subject_group.gp_name'
		);
		$builder->join('tnt_subject','tnt_fixdata_asses.fds_subject_id = tnt_subject.suc_subject_id');
		$builder->join('tnt_subject_group','tnt_subject.suc_group = tnt_subject_group.gp_id');
		$builder->where('fds_std_number',$idsis);
		$builder->where('fds_cat_id',$idcat);
		$query = $builder->get();
		return $query->getResultArray();
	}
	// 
	public function NilaiEvaluasiKelasSiswa($ids)
	{
		$builder = $this->db->table('tnt_fixdata_asses');
		$builder->select('*');
		$builder->where('fds_cat_id',$ids['evaluasi']);
		$builder->where('fds_aca_id',$ids['tahun']);
		$builder->where('fds_class',$ids['kelas']);
		$query = $builder->get();
		return $query->getResultArray();
	}
}
