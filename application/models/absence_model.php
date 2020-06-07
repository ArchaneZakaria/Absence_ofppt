<?php defined('BASEPATH') or exit('No direct script access allowed');

class absence_model extends MY_Model {

 function __construct() {
        parent::__construct();
        $this->table = 'absence';
        $this->table_id = 'idAbsence';
    }

    //fonction qui permet l'historique d'un stagiaire
    public function gethistorique($idStagiaire)
    {
      $sql="SELECT * FROM
      absence ,stagiaire ,seance ,enseigner ,utilisateur ,formation
      where absence.Stagiaire_idStagiaire=stagiaire.idStagiaire
      and absence.seance_id_seance=seance.id_seance
      and seance.Enseigner_idEnseigner=enseigner.idEnseigner
      and enseigner.Utilisateur_idUtilisateur=utilisateur.idUtilisateur
      and formation.id_formation=enseigner.formation_id_formation
      AND stagiaire.idStagiaire='$idStagiaire'
      ORDER BY absence.idAbsence DESC";
      $query = $this->db->query($sql);
      return $query->result();
    }
    public function getabsenceNJ($stagiaireI)
    {
      $sql="SELECT count(*) as counta from stagiaire ,absence ,seance ,enseigner ,anneeinscription
              WHERE absence.Stagiaire_idStagiaire=stagiaire.idStagiaire
              and stagiaire.idStagiaire='$stagiaireI'
              and absence.etat_absence='NJ'
              and stagiaire.deleted_stagiaire='0'
              AND absence.deleted_absence='0'
              AND absence.seance_id_seance=seance.id_seance
              AND seance.Enseigner_idEnseigner=enseigner.idEnseigner
              and enseigner.AnneeInscription_idAnneeInscription=anneeinscription.idAnneeInscription
              and anneeinscription.active_anneeinscription='1'";
      $query = $this->db->query($sql);
      return $query->result();
    }
    public function createabsence($options,$cdate_absence = 'cdate_absence ') {
     return parent::create($options,$cdate_absence );
 }
}
