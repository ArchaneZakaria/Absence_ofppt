<?php defined('BASEPATH') or exit('No direct script access allowed');

class filiere_model extends MY_Model {

 function __construct() {
        parent::__construct();
        $this->table = 'filiere';
        $this->table_id = 'idFiliere';
    }

    //fonction qui permet de retourner tous les groupes
    public function getallfiliere()
    {
      $sql="SELECT *
            FROM filiere
            where deleted_filiere = '0'";
      $query = $this->db->query($sql);
      return $query->result();
    }
}
