<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Master.php';

class Ctr_filiere extends Master
{
    function __construct()
    {
      parent::__construct();
      date_default_timezone_set('Africa/Casablanca');
      $this->load->library('session');
    }

    public function index($id='',$lang = '')
    {
      $this->display($id,$lang,"Créer une filiére");
      $this->template->set_partial('container', 'filiere/creer_filiere',array());
    	$this->template->build('body');
    }

    public function filiere($data = '',$id = NULL)
  	{
      //$this->display($id,$data,"Liste année inscription","Année inscription",'Liste année inscription');
	    switch($data){
		    case 'add':
		    case 'ajouter':
          $this->display($id,$data,"Créer une filiére");
          $this->template->set_partial('container', 'filiere/creer_filiere',array('data' => $data));
		    break;
        case 'liste':
          $this->display($id,$data,"Liste des filiéres");
          $this->template->set_partial('container', 'filiere/liste_filiere',array('data' => $data));
        break;
		    default:
          //Errour 404
		  }
		  $this->template->build('body');
	  }
}
/* End of file home.php */
/* Location: ./application/controllers/home.php */
