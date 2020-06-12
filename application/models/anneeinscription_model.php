<?php defined('BASEPATH') or exit('No direct script access allowed');

class anneeinscription_model extends MY_Model {

 function __construct() {
        parent::__construct();
        $this->table = 'anneeinscription';
        $this->table_id = 'idAnneeInscription';
    }

    //fonction qui permet de retourner tous les etablissement
    public function getallanneeinscription()
    {
      $sql="SELECT *
            FROM anneeinscription
            WHERE anneeinscription.deleted_annee_inscription = '0'";
      $query = $this->db->query($sql);
      return $query->result();
    }

    //fonction qui permet de retourner l'etablissement activé
    public function getAnneeInscriptionActive()
    {
      $sql="SELECT *
            FROM anneeinscription
            WHERE anneeinscription.deleted_annee_inscription = '0'
            AND anneeinscription.active_anneeinscription = '1'";
      $query = $this->db->query($sql);
      return $query->result();
    }

    public function chackExisteAnneeInscription($anneeInscription)
    {
      $sql="SELECT *
            FROM anneeinscription
            WHERE anneeinscription.code_annee_inscription ='$anneeInscription'
            AND deleted_annee_inscription='0'";
      $query = $this->db->query($sql);
      return $query->result();
    }

    public function disactiver_toutAnneeInscription()
    {
      $sql="UPDATE anneeinscription
            SET anneeinscription.active_anneeinscription ='0'";
      $query = $this->db->query($sql);
    }
}
