<?php defined('BASEPATH') or exit('No direct script access allowed');

class groupe_model extends MY_Model {

 function __construct() {
        parent::__construct();
        $this->table = 'groupe';
        $this->table_id = 'idGroupe';
    }

    //fonction qui permet de retourner tous les groupes by filière
    public function getallgroupe($idFiliere)
    {
      $sql="SELECT *
            FROM groupe
            where groupe.deleted_groupe = '0'
            AND groupe.Filiere_idFiliere='$idFiliere'";
      $query = $this->db->query($sql);
      return $query->result();
    }
    
    //fonction qui permet de retourner tous les stagiaires inscrits dans un groupe
    public function getStagiairesGroupe($idGroupe)
    {
      $sql="SELECT * FROM groupe ,inscription ,stagiaire ,etablissement ,anneeinscription
      where groupe.idGroupe=inscription.Groupe_idGroupe
      and inscription.Stagiaire_idStagiaire=stagiaire.idStagiaire
      and etablissement.idEtablissement=inscription.Etablissement_idEtablissement
      and anneeinscription.idAnneeInscription=inscription.AnneeInscription_idAnneeInscription
      and stagiaire.deleted_stagiaire='0'
      and groupe.deleted_groupe='0'
      and etablissement.active_etablissement='1'
      and anneeinscription.active_anneeinscription='1'
      and groupe.idGroupe='$idGroupe' ";
      $query = $this->db->query($sql);
      return $query->result();
    }
}
