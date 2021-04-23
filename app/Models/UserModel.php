<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'ext_user';
	protected $primaryKey           = 'ID';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [];

	public function StoreUser($data,$db)
	{
		$builder = $db->table('ext_user');
		$builder->insert($data);
		return TRUE;
	}

	public function StoreUserMeta($data,$db)
	{
		$builder = $db->table('ext_user_meta');
		$builder->insertBatch($data);
		return TRUE;
	}

	public function ListUser($stri,$db)
	{
		$builder = $db->table('ext_user');
		$builder->select('ID,user_login,user_fullname,user_email,user_management_rules,created_at');
		$builder->where('user_tenant_group',$stri);
		$query  = $builder->get();
		return $query->getResultArray();
	}

	public function ListUserDetail($stra,$db)
	{
		$builder = $db->table('ext_user');
		$builder->select('user_login,user_email,user_fullname,user_status,user_management_rules,user_tenant_group,user_access_id,created_at');
		$builder->where('ID',$stra);
		$query  = $builder->get();
		return $query->getResultArray();
	}

	public function ListUserMeta($stra,$db)
	{
		$builder = $db->table('ext_user_meta');
		$builder->select('*');
		$builder->where('id_user',$stra);
		$query  = $builder->get();
		return $query->getResultArray();
	}

	public function Maxid($db)
	{
		$builder = $db->table('ext_user');
		$builder->select('MAX(ID) as id');
		$query  = $builder->get();
		return $query->getResultArray();
	}

}
