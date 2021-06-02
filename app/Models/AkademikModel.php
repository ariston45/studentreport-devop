<?php

namespace App\Models;

use CodeIgniter\Model;

class AkademikModel extends Model
{
	function __construct(){
		parent::__construct();
		$this->db = \Config\Database::connect();
	}
	// 
	function DataMapel($id)
	{
		$builder = $this->db->table('tnt_subject');
		$builder->select('*');
		$builder->where('suc_tnt_id',$id);
		$query   = $builder->get();
		return $query->getResultArray();
	}
	//
	public function LamaBelajar($id)
	{
		$builder = $this->db->table('tnt_school');
		$builder->select('sch_longtime_learning as lambel');
		$builder->where('sch_id',$id);
		$query   = $builder->get();
		return $query->getResultArray();
	}
	// 
	function MaxIdMapel()
	{
		$builder = $this->db->table('tnt_subject');
		$builder->select("MAX(CAST(SUBSTRING_INDEX(suc_subject_id,'.',-1) as INT)) as id");
		$query  = $builder->get();
		return $query->getResultArray();
	}
	// 
	public function StoreMapel($data)
	{
		$builder = $this->db->table('tnt_subject');
		$builder->insert($data);
		return TRUE;
	}
	//
	public function ThAkademik($id)
	{
		$builder = $this->db->table('tnt_acad_years');
		$builder->select('*');
		$builder->where('aca_tnt_id',$id);
		$query   = $builder->get();
		return $query->getResultArray();
	}
	// 
	public function ThAkademikActive($id)
	{
		$builder = $this->db->table('tnt_acad_years');
		$builder->select('*');
		$builder->where('aca_tnt_id',$id);
		$builder->where('ach_status', 'AKTIF');
		$query   = $builder->get();
		return $query->getResultArray();
	}
	// 
	public function TahunAkademikDet($id_t,$id_aca)
	{
		$builder = $this->db->table('tnt_acad_years');
		$builder->select('*');
		$builder->where('aca_tnt_id',$id_t);
		$builder->where('aca_id', $id_aca);
		$query   = $builder->get();
		return $query->getResultArray();
	}
	//
	public function UpdateThAkad($data,$id)
	{
		$builder = $this->db->table('tnt_acad_years');
		$builder->where('aca_id',$id);
		$builder->update($data);
	}
	//  
	public function KategoriNilai($id_aktif)
	{
		$builder = $this->db->table('tnt_assesment_category');
		$builder->select('*');
		$builder->where('cat_acad_id',$id_aktif);
		$query   = $builder->get();
		return $query->getResultArray();
	}
	// 
	public function DetailCategory($id)
	{
		$builder = $this->db->table('tnt_assesment_category');
		$builder->select('*');
		$builder->where('cat_id',$id);
		$query   = $builder->get();
		return $query->getResultArray();
	}
	// 
	public function StoreKategori($data)
	{
		$builder = $this->db->table('tnt_assesment_category');
		$builder->insert($data);
		return TRUE;
	}
	// 
	public function DeleteKategori($id)
	{
		$builder = $this->db->table('tnt_assesment_category');
		$builder->where('cat_id', $id);
		$builder->delete();
	}
	// 
	public function UpdateKategoriModel($data,$id)
	{
		$builder = $this->db->table('tnt_assesment_category');
		$builder->where('cat_id',$id);
		$builder->update($data);
	}
	// 
	public function VariabelPenilaian($id)
	{
		$builder = $this->db->table('tnt_variable');
		$builder->select('*');
		$builder->where('var_tnt_id',$id);
		$query   = $builder->get();
		return $query->getResultArray();
	}
	// 
	public function VariabelPenilaianA($id)
	{
		$builder = $this->db->table('tnt_variable');
		$builder->select('*');
		$builder->where('var_id',$id);
		$query   = $builder->get();
		return $query->getResultArray();
	}
	// 
	public function MaxVarId($id)
	{
		$builder = $this->db->table('tnt_variable');
		$builder->select('MAX(CAST(SUBSTRING(var_code,4)as INT)) as maxid');
		$builder->where('var_tnt_id',$id);
		$query   = $builder->get();
		return $query->getResultArray();
	} 
	// 
	public function ThsetNonActive($id)
	{
		$data = [
			'ach_status' => 'NONAKTIF'
		];
		$builder = $this->db->table('tnt_acad_years');
		$builder->where('aca_tnt_id',$id);
		$builder->update($data);
	}
	// 
	public function ThsetActive($id)
	{
		$data = [
			'ach_status' => 'AKTIF'
		];
		$builder = $this->db->table('tnt_acad_years');
		$builder->where('aca_id',$id);
		$builder->update($data);
	}
	// 
	public function StoreVariable($data)
	{
		$builder = $this->db->table('tnt_variable');
		$builder->insert($data);
		return TRUE;
	}
	// 
	public function Updatevariable($data,$id)
	{
		$builder = $this->db->table('tnt_variable');
		$builder->where('var_id',$id);
		$builder->update($data);
	}
	//
	public function UpdateRumus($data)
	{
		$builder = $this->db->table('tnt_assesment_category');
		$builder->where('cat_id',$data['cat_id']);
		$builder->update($data);
	}
	// 
	 
	
}
