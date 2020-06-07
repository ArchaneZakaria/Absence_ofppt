<?php defined('BASEPATH') or exit('No direct script access allowed');

class Surveillant_General_model extends MY_Model {

	function __construct() {
  	parent::__construct();
    $this->table = 'Utilisateur';
    $this->table_id = 'idUtilisateur';
  }

	public function getAllSurveillant_General()
	{
		$sql = " SELECT *
						 FROM utilisateur,role
						 WHERE utilisateur.Role_idRole = role.idRole
						 AND utilisateur.deleted_utilisateur='0'
						 AND role.libelle_role='Surveillant général'";
		$query=$this->db->query($sql);
		return $query->result();
	}
}
