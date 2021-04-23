<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
	protected $DBGroup              = 'default';
	protected $table                = 'user';
	protected $primaryKey           = 'ID';
	protected $useAutoIncrement     = true;
	protected $insertID             = 0;
	protected $returnType           = 'array';
	protected $useSoftDelete        = false;
	protected $protectFields        = true;
	protected $allowedFields        = [];

	/* =========================================== */ 
  // Tenant database model
	function __construct(){
		parent::__construct();
		$this->db = \Config\Database::connect();
	}

  public function tenant_database()
	{
    $this->scndb['database'] = 'sample';
    $scndb = \Config\Database::connect($this->scndb);
    $query = $scndb->query(
      'SELECT * FROM payments;'
    );
    $data = $query->getResultArray();
    return $data;
	}

  public function AuthUser($data)
  {
		$builder = $this->db->table('user');
    $builder->select('*');
    $builder->where('u_email',$data['username']);
		$builder->where('u_password',$data['password']);
    $query = $builder->get();
    return $query->getResultArray();
  }

	public function AuthToken($id)
  {
		$builder = $this->db->table('tnt_school');
    $builder->select('sch_token_id');
    $builder->where('sch_id',$id);
    $query = $builder->get();
    return $query->getResultArray();
  }

}
