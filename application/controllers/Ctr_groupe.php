<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Master.php';

class Ctr_groupe extends Master
{
    function __construct()
    {
      parent::__construct();
      date_default_timezone_set('Africa/Casablanca');
      $this->load->library('session');
      $this->load->model('groupe_model','groupe');
    }

    public function index($id='',$lang = '')
    {
      $this->display($id,$lang,"Créer un groupe");
      $this->template->set_partial('container', 'groupe/creer_groupe',array());
    	$this->template->build('body');
    }

    public function groupe($data = '',$id = NULL)
  	{
      //$this->display($id,$data,"Liste année inscription","Année inscription",'Liste année inscription');
	    switch($data){
		    case 'add':
		    case 'ajouter':
          $this->display($id,$data,"Créer un groupe");
          $this->template->set_partial('container', 'groupe/creer_groupe',array('data' => $data));
		    break;
        case 'liste':
          $this->display($id,$data,"Liste des groupes");
          $this->template->set_partial('container', 'groupe/liste_groupe',array('data' => $data));
        break;
		    default:
          //Errour 404
		  }
		  $this->template->build('body');
	  }

    public function getGroupsFiliere()
    {
      $filiere = $this->input->post("filiere");
      echo json_encode($this->groupe->getallgroupe($filiere));
    }



}
/* End of file home.php */
/* Location: ./application/controllers/home.php */
