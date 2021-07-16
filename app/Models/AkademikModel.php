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
	public function DetMapel($id)
	{
		$builder = $this->db->table('tnt_subject');
		$builder->select('*');
		$builder->where('suc_subject_id',$id);
		$query = $builder->get();
		return $query->getResultArray();
	}
	// 
	public function UpdateMapel($data,$id)
	{
		$builder = $this->db->table('tnt_subject');
		$builder->where('suc_subject_id',$id);
		$builder->update($data);
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
	public function KategoriEvaluasiThActive($id)
	{
		$builder = $this->db->table('tnt_acad_years');
		$builder->select('*');
		$builder->join('tnt_assesment_category','tnt_acad_years.aca_id = tnt_assesment_category.cat_acad_id');
		$builder->where('aca_tnt_id',$id);
		$builder->where('ach_status', 'AKTIF');
		$query   = $builder->get();
		return $query->getResultArray();
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
	public function FormulaEvaluasi($id)
	{
		$builder = $this->db->table('tnt_assesment_category');
		$builder->select('cat_formula_asses');
		$builder->where('cat_id',$id);
		$query   = $builder->get();
		return $query->getResultArray();
	}
	// 
	public function DetailEvaluasi($id)
	{
		$builder = $this->db->table('tnt_assesment_category');
		$builder->select('*');
		$builder->where('cat_id',$id);
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
	public function MaxAcaId()
	{
		$builder = $this->db->table('tnt_acad_years');
		$builder->select('MAX(CAST(SUBSTRING(aca_id,3)as INT)) as maxid');
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
	function MaxIdFixNilai()
	{
		$builder = $this->db->table('tnt_fixdata_asses');
		$builder->select("MAX(CAST(SUBSTRING_INDEX(fds_id,'.',-1) as INT)) as id");
		$query  = $builder->get();
		return $query->getResultArray();
	}
	//  
	public function StoreNilai($data)
	 {
		$builder = $this->db->table('tnt_rawdata_assesment');
		$builder->insertBatch($data);
		return TRUE;
	 }
	//
	public function StoreFixNilai($data)
	{
	 $builder = $this->db->table('tnt_fixdata_asses');
	 $builder->insertBatch($data);
	 return TRUE;
	}
	// 
	public function FiltrasiRawData($data)
	{
		$builder = $this->db->table('tnt_rawdata_assesment');
		$builder->select('*');
		$builder->where('raw_years_id',$data['tahun']);
		$builder->where('raw_cat_id',$data['evaluasi']);
		$builder->where('raw_mapel',$data['mapel']);
		$builder->where('raw_class_id',$data['kelas']);
		$query  = $builder->get();
		return $query->getResultArray();
	}
	// 
	public function FiltrasiRawDataSiswa($data,$id)
	{
		$builder = $this->db->table('tnt_rawdata_assesment');
		$builder->select('*');
		$builder->where('raw_years_id',$data['tahun']);
		$builder->where('raw_cat_id',$data['evaluasi']);
		$builder->where('raw_mapel',$data['mapel']);
		$builder->where('raw_class_id',$data['kelas']);
		$builder->where('raw_stu_num',$id);
		$query  = $builder->get();
		return $query->getResultArray();
	}
	// 
	public function PerbaruiRawNilai($id,$nilai)
	{
		$builder = $this->db->table('tnt_rawdata_assesment');
		$builder->where('raw_id',$id);
		$builder->update($nilai);
	}
	// 
	public function UpdateFixNilai($ids,$data)
	{
		$builder = $this->db->table('tnt_fixdata_asses');
		$builder->where('fds_cat_id',$ids['fds_cat_id']);
		$builder->where('fds_aca_id',$ids['fds_aca_id']);
		$builder->where('fds_class',$ids['fds_class']);
		$builder->where('fds_std_number',$ids['fds_std_number']);
		$builder->update($data);
	}
	// 
	public function DetailKelas($id)
	{
		$builder = $this->db->table('tnt_class');
		$builder->select('*');
		$builder->where('cls_id',$id);
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
	public function DetailTahun($id)
	{
		$builder = $this->db->table('tnt_acad_years');
		$builder->select('*');
		$builder->where('aca_id',$id);
		$query   = $builder->get();
		return $query->getResultArray();
	}
	//
	public function StoreThAsessment($data)
	{
		$builder = $this->db->table('tnt_assesment_category');
		$builder->insertBatch($data);
		return TRUE;
	}
	// 
	public function StoreTahunAkademik($data)
	{
		$builder = $this->db->table('tnt_acad_years');
		$builder->insert($data);
		return TRUE;
	} 
	
}
