<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Master.php';

class Ctr_etablissement extends Master
{
    function __construct()
    {
      parent::__construct();
      date_default_timezone_set('Africa/Casablanca');
      $this->load->model('etablissement_model','etablissement');

    }

    public function index($id='',$lang = '')
    {
      $this->display($id,$lang,"Créer une Etablissement");
      $this->template->set_partial('container', 'etablissement/cree_etablissement',array());
    	$this->template->build('body');
    }

    public function etablissement($data = '',$id = NULL)
  	{
      //$this->display($id,$data,"Liste année inscription","Année inscription",'Liste année inscription');
	    switch($data){
		    case 'add':
		    case 'ajouter':
          $this->display($id,$data,"Créer une Etablissement");
          $this->template->set_partial('container', 'etablissement/cree_etablissement',array('data' => $data));
		    break;
        case 'liste':
          $this->display($id,$data,"Liste des Etablissements");
          $this->template->set_partial('container', 'etablissement/list_etablissement',array('data' => $data));
        break;
		    default:
          //Errour 404
		  }
		  $this->template->build('body');
	  }


    public function ajouterEtablissement()
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('nom', 'Le nom de l\'etablissement est obligatoire', 'required|trim',
                                array('required' => 'Le nom de l\'etablissement est obligatoire'));

      if ($this->form_validation->run()) {
        $nom      = $this->input->post('nom');
        $adresse  = $this->input->post('adresse');
        $dateNow  = date_create('now')->format('Y-m-d H:i:s');
        $options  = array (
                      'libelle_etablissement' => $nom,
                      'cby_etablissement'     => '1',
                      'cdate_etablissement'   => $dateNow,
                      'deleted_etablissement' => '0',
                      'active_etablissement'  => '0'
                    );
        $result = $this->etablissement->create($options);
        if ($result) {
          $message = "Vos informations ont été ajoutées avec succès.";
                     echo json_encode(array( 'status' => '1',
                                             'location' => 'url',
                                             'message' => $message));
        } else {
          $message = "Errour de traitement.";
                     echo json_encode(array( 'status' => '0',
                                             'location' => 'url',
                                             'message' => $message));
        }
      } else {
        $errors = validation_errors();
        echo json_encode(array( 'status' => '0',
                               'location' => 'url',
                               'message' => $errors));
      }
    }
}
/* End of file home.php */
/* Location: ./application/controllers/home.php */
