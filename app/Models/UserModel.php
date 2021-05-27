<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	function __construct(){
		parent::__construct();
		$this->db = \Config\Database::connect();
	}

	public function StoreUser($data)
	{
		$builder = $this->db->table('user');
		$builder->insertBatch($data);
		return TRUE;
	}

	public function StoreUserv1($data)
	{
		$builder = $this->db->table('user');
		$builder->insert($data);
		return TRUE;
	}

	public function StoreUserMeta($data)
	{
		$builder = $this->db->table('user_meta');
		$builder->insert($data);
		return TRUE;
	}

	public function TenantUser($stri)
	{
		$builder = $this->db->table('user');
		$builder->select('*');
		$builder->where('u_id_access',$stri);
		$query  = $builder->get();
		return $query->getResultArray();
	}

	public function MaxIdUser()
	{
		$builder = $this->db->table('user');
		$builder->select('MAX(u_id) as id');
		$query  = $builder->get();
		return $query->getResultArray();
	}

	public function UserChekId($data,$stri)
	{
		$builder = $this->db->table('user');
		$builder->where('u_id_access',$stri);
		$builder->whereIn('u_email', $data);
		$query  = $builder->get();
		return $query->getResultArray();
	}

	public function StoreUserWali($data)
	{
		$builder = $this->db->table('user');
		$builder->ignore(true)->insertBatch($data);
		return TRUE;
	}

	public function StoreUserWaliMeta($data)
	{
		$builder = $this->db->table('user_meta');
		$builder->ignore(true)->insertBatch($data);
		return TRUE;
	}

	public function UpdateUser($data,$id)
	{
		$builder = $this->db->table('user');
		$builder->where('u_id',$id);
		$builder->update($data);
		return TRUE;
	}

	public function UpdateuserMeta($data,$id)
	{
		$builder = $this->db->table('user_meta');
		$builder->where('u_id',$id);
		$builder->update($data);
		return TRUE;
	}

}
