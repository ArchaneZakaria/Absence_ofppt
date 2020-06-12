<?php defined('BASEPATH') or exit('No direct script access allowed');

class etablissement_model extends MY_Model {

 function __construct() {
        parent::__construct();
        $this->table = 'etablissement';
        $this->table_id = 'idEtablissement';
    }

    //fonction qui permet de retourner tous les etablissement
    public function getalletablissement()
    {
      $sql="SELECT *
            FROM etablissement
            WHERE deleted_etablissement = '0'";
      $query = $this->db->query($sql);
      return $query->result();
    }

    //fonction qui permet de retourner l'etablissement activé
    public function getEtablissementActive()
    {
      $sql="SELECT *
            FROM etablissement
            WHERE deleted_etablissement = '0'
            AND active_etablissement = '1'";
      $query = $this->db->query($sql);
      return $query->result();
    }

    public function disactiver_toutEtablissemment()
    {
      $sql="UPDATE etablissement
            SET etablissement.active_etablissement='0'";
      $query = $this->db->query($sql);
    }
}
