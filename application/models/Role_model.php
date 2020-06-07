<?php defined('BASEPATH') or exit('No direct script access allowed');

class Role_model extends MY_Model {

	function __construct() {
  	parent::__construct();
    $this->table = 'role';
    $this->table_id = 'idRole';
  }

	public function getRoleId($roleLib)
	{
		$sql = " SELECT *
						 FROM role
						 WHERE role.libelle_role = '$roleLib'
						 AND role.deleted_role = '0'
						 LIMIT 1";
		$query=$this->db->query($sql);
		return $query->result();
	}
}
