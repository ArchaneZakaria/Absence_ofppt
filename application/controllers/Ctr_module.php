<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Master.php';

class Ctr_module extends Master
{
    function __construct()
    {
      parent::__construct();
      date_default_timezone_set('Africa/Casablanca');
      $this->load->library('session');
    }

    public function index($id='',$lang = '')
    {
      $this->display($id,$lang,"Créer un module");
      $this->template->set_partial('container', 'module/creer_module',array());
    	$this->template->build('body');
    }

    public function module($data = '',$id = NULL)
  	{
      //$this->display($id,$data,"Liste année inscription","Année inscription",'Liste année inscription');
	    switch($data){
		    case 'add':
		    case 'ajouter':
          $this->display($id,$data,"Créer un module");
          $this->template->set_partial('container', 'module/creer_module',array('data' => $data));
		    break;
        case 'liste':
          $this->display($id,$data,"Liste des modules");
          $this->template->set_partial('container', 'module/liste_module',array('data' => $data));
        break;
		    default:
          //Errour 404
		  }
		  $this->template->build('body');
	  }
}
/* End of file home.php */
/* Location: ./application/controllers/home.php */
