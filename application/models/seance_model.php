<?php defined('BASEPATH') or exit('No direct script access allowed');

class seance_model extends MY_Model {

 function __construct() {
        parent::__construct();
        $this->table = 'seance';
        $this->table_id = 'id_seance';
    }

    //fonction qui permet de retourner tous les séances d'un formateur
    public function getseance($idutilisateur)
    {
      $sql="SELECT * FROM seance ,enseigner
              WHERE seance.Enseigner_idEnseigner=enseigner.idEnseigner
              AND seance.deleted_seance='0'
              AND enseigner.deleted_enseigner='0'
              AND enseigner.idEnseigner='$idutilisateur'
              ORDER BY seance.date_seance DESC";
      $query = $this->db->query($sql);
      return $query->result();
}

      //fonction qui permet de retourner tous les séances d'un groupe
      public function getseancebygroupe($idgroupe)
      {
        $sql="SELECT * from seance, enseigner, groupe , formation ,utilisateur ,etablissement ,anneeinscription
              WHERE groupe.idGroupe=enseigner.Groupe_idGroupe
              and seance.Enseigner_idEnseigner=enseigner.idEnseigner
              and enseigner.formation_id_formation=formation.id_formation
              and enseigner.Utilisateur_idUtilisateur=utilisateur.idUtilisateur
              and enseigner.Etablissement_idEtablissement=etablissement.idEtablissement
              and enseigner.AnneeInscription_idAnneeInscription=anneeinscription.idAnneeInscription
              and etablissement.active_etablissement='1'
              and anneeinscription.active_anneeinscription='1'
              and groupe.idGroupe='$idgroupe'
              ORDER BY seance.date_seance DESC";
        $query = $this->db->query($sql);
        return $query->result();
      }
    public function getstagiaireabsent($idseance)
    {
      $sql="SELECT * FROM seance ,absence ,stagiaire
              where absence.seance_id_seance=seance.id_seance
              AND absence.Stagiaire_idStagiaire=stagiaire.idStagiaire
              AND absence.deleted_absence='0'
              AND seance.deleted_seance='0'
              and stagiaire.deleted_stagiaire='0'
              AND seance.id_seance='$idseance'";
      $query = $this->db->query($sql);
      return $query->result();
    }
    public function createseance($options,$cdate_seance = 'cdate_seance ') {
     return parent::create($options,$cdate_seance );
 }

}
