<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Master.php';

class Ctr_annee_inscription extends Master
{
    function __construct()
    {
      parent::__construct();
      date_default_timezone_set('Africa/Casablanca');
      $this->load->model('anneeinscription_model','annee_Inscription');
    }

    public function index($id='',$lang = '')
    {
      $this->display($id,$lang,"Créer une année inscription");
      $this->template->set_partial('container', 'anneeInscription/cree_anneeInscription',array());
    	$this->template->build('body');
    }

    public function annee_inscription($data = '',$id = NULL)
  	{
      //$this->display($id,$data,"Liste année inscription","Année inscription",'Liste année inscription');
	    switch($data){
		    case 'add':
		    case 'ajouter':
          $this->display($id,$data,"Créer une année inscription");
          $this->template->set_partial('container', 'anneeInscription/cree_anneeInscription',array('data' => $data));
		    break;
        case 'liste':
          $this->display($id,$data,"Liste des années inscription");
          $this->template->set_partial('container', 'anneeInscription/list_anneeInscription',array('data' => $data));
        break;
		    default:
          //Errour 404
		  }
		  $this->template->build('body');
	  }

    public function ajouterAnneeInscription($value='')
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('anneeInscription', 'Le nom du stagiaire est obligatoire', 'required|trim',
                                array('required' => 'Le nom du stagiaire est obligatoire'));

      if ($this->form_validation->run()) {
        $anneeInscription  = $this->input->post('anneeInscription');

        //check if année existe ou non
        $countAnneeInsc    = $this->annee_Inscription->chackExisteAnneeInscription();
        $countAnneeInsc    = count($countAnneeInsc);

        if ($countAnneeInsc < 0) {
        //END check if année existe ou non
          $dateNow           = date_create('now')->format('Y-m-d H:i:s');
          $options           = array (
                               'libelle_annee_inscription' => $anneeInscription.'/'.($anneeInscription+1),
                               'cby_annee_inscription'     => '1',
                               'cdate_annee_inscription'   => $dateNow,
                               'deleted_annee_inscription' => '0',
                               'active_anneeinscription'   => '0',
                               'code_annee_inscription'    => $anneeInscription

                             );
         $result = $this->annee_Inscription->create($options);
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
       }else {
         $message = "Année inscription deja exsiste.";
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
