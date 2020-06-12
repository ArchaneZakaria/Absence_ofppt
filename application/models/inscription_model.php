<?php defined('BASEPATH') or exit('No direct script access allowed');

class inscription_model extends MY_Model {

 function __construct() {
        parent::__construct();
        $this->table = 'inscription';
        $this->table_id = 'idInscription';
    }

    //fonction qui permet de retourner tous les inscriptions
    public function getallinscription()
    {
      $sql="SELECT *
            FROM inscription
            WHERE deleted_inscription = '0'";
      $query = $this->db->query($sql);
      return $query->result();
    }

    //fonction qui permet de retourner tous les inscriptions de l'annee et l'établissement active
    public function getAllInscriptionActive()
    {
      $sql="SELECT *
	      FROM inscription, etablissement, anneeinscription, stagiaire, filiere, groupe
	      where inscription.AnneeInscription_idAnneeInscription=anneeinscription.idAnneeInscription
	      and inscription.Stagiaire_idStagiaire=stagiaire.idStagiaire
	      and inscription.Groupe_idGroupe=groupe.idGroupe
	      and groupe.Filiere_idFiliere=filiere.idFiliere
	      and  inscription.Etablissement_idEtablissement = etablissement.idEtablissement
	      and anneeinscription.active_anneeinscription ='1'
	      and etablissement.active_etablissement ='1'
	      and inscription.deleted_inscription = '0'
	      and stagiaire.deleted_stagiaire = '0'
      ";
      $query = $this->db->query($sql);
      return $query->result();
    }
}
