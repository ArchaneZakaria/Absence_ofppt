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
      $sql="select *
      FROM anneeinscription
      where deleted_annee_inscription = '0'";
      $query = $this->db->query($sql);
      return $query->result();
    }

    //fonction qui permet de retourner l'etablissement activé
    public function getAnneeInscriptionActive()
    {
      $sql="select *
      FROM anneeinscription
      where deleted_annee_inscription = '0'
      AND active_anneeinscription = '1'";
      $query = $this->db->query($sql);
      return $query->result();
    }

    public function chackExisteAnneeInscription()
    {
      $sql="SELECT *
            FROM anneeinscription
            WHERE anneeinscription.code_annee_inscription ='2020'
            AND deleted_annee_inscription='0'";
      $query = $this->db->query($sql);
      return $query->result();
    }
}
