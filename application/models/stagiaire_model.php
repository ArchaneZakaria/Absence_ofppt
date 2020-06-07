<?php defined('BASEPATH') or exit('No direct script access allowed');

class stagiaire_model extends MY_Model {

 function __construct() {
        parent::__construct();
        $this->table = 'stagiaire';
        $this->table_id = 'idStagiaire';
    }
}
