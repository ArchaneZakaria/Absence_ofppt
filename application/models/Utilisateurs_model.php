<?php defined('BASEPATH') or exit('No direct script access allowed');

class Utilisateurs_model extends MY_Model {

	function __construct() {
  	parent::__construct();
    $this->table = 'Utilisateur';
    $this->table_id = 'idUtilisateur';
  }

	public function login($username,$passeword)
	{
		$query = $this->db->join('role','Utilisateur.Role_idRole = role.idRole')->get_where('Utilisateur', array('Utilisateur.Email' => $username, 'Utilisateur.Password' => $passeword, 'deleted_utilisateur' => '0'));
		return $query->result();
	}

	public function getUsersByType($roleCode)
	{
		$sql = " SELECT *
						 FROM utilisateur,role,etablissement
						 WHERE utilisateur.Role_idRole = role.idRole
             AND etablissement.idEtablissement = utilisateur.Etablissement_idEtablissement
						 AND utilisateur.deleted_utilisateur='0'
						 AND role.code_role='$roleCode'
             AND etablissement.deleted_etablissement='0'
						 AND role.deleted_role='0'";
		$query=$this->db->query($sql);
		return $query->result();
	}

	//check if user existe or not using role and etablissement id and Email
	public function checkExisteUser($roleCode,$email,$etablissement)
	{
		$sql= " SELECT *
						FROM utilisateur,role,etablissement
						WHERE utilisateur.Role_idRole = role.idRole
						AND etablissement.idEtablissement = utilisateur.Etablissement_idEtablissement
						AND utilisateur.deleted_utilisateur='0'
						AND role.code_role='$roleCode'
						AND utilisateur.Email='$email'
						AND etablissement.idEtablissement='$etablissement'
						AND etablissement.deleted_etablissement='0'
						AND role.deleted_role='0' ";
		$query=$this->db->query($sql);
		return $query->result();
	}
}
