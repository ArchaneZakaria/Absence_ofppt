<?php defined('BASEPATH') or exit('No direct script access allowed');

class enseigner_model extends MY_Model {

 function __construct() {
        parent::__construct();
        $this->table = 'enseigner';
        $this->table_id = 'idEnseigner';
    }

    //fonction qui permet l'historique d'un stagiaire
    public function getEnseigner($idutilisateur)
    {
      $sql="SELECT * FROM enseigner ,groupe ,filiere ,formation ,module ,anneeinscription ,etablissement
                WHERE enseigner.Utilisateur_idUtilisateur='$idutilisateur'
                and enseigner.Groupe_idGroupe=groupe.idGroupe
                and enseigner.Etablissement_idEtablissement=etablissement.idEtablissement
                and groupe.Filiere_idFiliere=filiere.idFiliere
                and enseigner.formation_id_formation=formation.id_formation
                and formation.Module_idModule=module.idModule
                and enseigner.AnneeInscription_idAnneeInscription=anneeinscription.idAnneeInscription
                and enseigner.deleted_enseigner='0'
                and groupe.deleted_groupe='0'
                and filiere.deleted_filiere='0'
                and formation.deleted_formation='0'
                and module.deleted_module='0'
                and anneeinscription.deleted_annee_inscription='0'
                and anneeinscription.active_anneeinscription='1'
                and etablissement.active_etablissement='1'";
      $query = $this->db->query($sql);
      return $query->result();
    }
    public function getstagiaireaenseigner($id_enseigner)
    {
      $sql="SELECT * FROM enseigner ,inscription ,groupe ,stagiaire ,anneeinscription ,etablissement
                  where enseigner.idEnseigner='$id_enseigner'
                  and enseigner.Groupe_idGroupe=groupe.idGroupe
                  AND inscription.Groupe_idGroupe=groupe.idGroupe
                  and inscription.Stagiaire_idStagiaire=stagiaire.idStagiaire
                  and enseigner.deleted_enseigner='0'
                  and inscription.deleted_inscription='0'
                  and groupe.deleted_groupe='0'
                  and stagiaire.deleted_stagiaire='0'
                  and enseigner.AnneeInscription_idAnneeInscription=anneeinscription.idAnneeInscription
                  and inscription.AnneeInscription_idAnneeInscription=anneeinscription.idAnneeInscription
                  and enseigner.Etablissement_idEtablissement=etablissement.idEtablissement
                  and inscription.Etablissement_idEtablissement=etablissement.idEtablissement
                  and anneeinscription.active_anneeinscription='1'
                  and etablissement.active_etablissement='1'
                  order by stagiaire.NomStagiaire ASC";
      $query = $this->db->query($sql);
      return $query->result();
    }
    //fonction qui permet de retourner tous les groupes qui ont des stagiaires absents sans justification
    public function getGroupeAbsent()
    {
      $sql="SELECT DISTINCT groupe.* ,filiere.*
      FROM groupe ,filiere ,anneeinscription ,etablissement ,inscription
      WHERE groupe.Filiere_idFiliere=filiere.idFiliere and groupe.deleted_groupe='0'
      and filiere.deleted_filiere='0' and anneeinscription.deleted_annee_inscription='0'
      and anneeinscription.active_anneeinscription='1'
      and etablissement.active_etablissement='1'
      AND inscription.Groupe_idGroupe=groupe.idGroupe
      and inscription.Stagiaire_idStagiaire in
      (SELECT absence.Stagiaire_idStagiaire
        from absence , stagiaire
        WHERE absence.etat_absence='NJ'
        AND absence.Stagiaire_idStagiaire=stagiaire.idStagiaire)";
      $query = $this->db->query($sql);
      return $query->result();
    }
}
