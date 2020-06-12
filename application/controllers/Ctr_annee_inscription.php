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
          $listeAnneeInscription = $this->annee_Inscription->getallanneeinscription();
          $this->display($id,$data,"Liste des années inscription");
          $this->template->set_partial('container', 'anneeInscription/list_anneeInscription',array('data' => $data, 'listeAnneeInscription' => $listeAnneeInscription));
        break;
		    default:
          //Errour 404
		  }
		  $this->template->build('body');
	  }

    public function ajouterAnneeInscription($value='')
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('anneeInscription', 'Le champ année inscription est obligatoire', 'required|trim',
                                array('required' => 'Le champ année inscription est obligatoire'));

      if ($this->form_validation->run()) {

        $id                = $this->input->post('anneeInscriptionI');
        $anneeInscription  = $this->input->post('anneeInscription');
        $dateNow = date_create('now')->format('Y-m-d H:i:s');

        if (isset($id)) {//update
          $conditions             = array('idAnneeInscription' => $id);
          $anneeInscriptionData = array (
            'libelle_annee_inscription' => $anneeInscription.'/'.($anneeInscription+1),
            'uby_annee_inscription'     => '1',
            'udate_annee_inscription'   => $dateNow,
            'code_annee_inscription'    => $anneeInscription
            );
          $result = $this->annee_Inscription->update($anneeInscriptionData,$conditions);
          if ($result) {
            echo json_encode(array( 'status'   => '1',
                                    'location' => 'url',
                                    'message'  => "vos informations été modifiées avec succés"));
          }else {
            echo json_encode(array( 'status'   => '0',
                                    'location' => 'url',
                                    'message'  => "Erreur de traitement"));
          }
        }else {// create
          //check if année existe ou non
          $countAnneeInsc    = $this->annee_Inscription->chackExisteAnneeInscription($anneeInscription);
          $countAnneeInsc    = count($countAnneeInsc);
          if ($countAnneeInsc == 0) {
          //END check if année existe ou non
            $options = array (
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
         } else {
           $message = "Année inscription deja exsiste.";
           echo json_encode(array( 'status' => '0',
                                   'location' => 'url',
                                   'message' => $message));
         }
        }
      } else {
         $errors = validation_errors();
         echo json_encode(array( 'status' => '0',
                                 'location' => 'url',
                                 'message' => $errors));
       }
    }

    public function deleteAnneeInscription()
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('anneeInscriptionI', 'Erreur d\'obtenire l\'année inscription', 'required|trim',
                                array('required' => 'Erreur d\'obtenire l\'année inscription'));

      if ($this->form_validation->run()) {
        $id                = $this->input->post('anneeInscriptionI');
        $anneeInscription  = $this->input->post('anneeInscription');
        $dateNow           = date_create('now')->format('Y-m-d H:i:s');

        $conditions           = array('idAnneeInscription' => $id);
        $anneeInscriptionData = array (
          'deleted_annee_inscription' => '1',
          'dby_annee_inscription'     => '1',
          'ddate_annee_inscription'   => $dateNow
          );
        $result = $this->annee_Inscription->update($anneeInscriptionData,$conditions);
        if ($result) {
          echo json_encode(array( 'status'   => '1',
                                  'location' => 'url',
                                  'message'  => "vos informations été supprimer avec succés"));
        }else {
          echo json_encode(array( 'status'   => '0',
                                  'location' => 'url',
                                  'message'  => "Erreur de traitement"));
        }

      }else {
         $errors = validation_errors();
         echo json_encode(array( 'status' => '0',
                                 'location' => 'url',
                                 'message' => $errors));
       }
    }

    public function activerAnneeInscription()
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('annee', 'Impossible d\'obtenire l\'année d\'inscriptin', 'required|trim',
                               array('required' => 'Impossible d\'obtenire l\'année d\'inscriptin'));

      if ($this->form_validation->run()) {
        $this->annee_Inscription->disactiver_toutAnneeInscription();
        $id       = $this->input->post('annee');
        $dateNow  = date_create('now')->format('Y-m-d H:i:s');

        $conditions        = array('idAnneeInscription' => $id);
        $anneeInscriptionData = array (
          'active_anneeinscription' => '1'
          );
        $result = $this->annee_Inscription->update($anneeInscriptionData,$conditions);
        if ($result) {
          $message = "Vos année inscriptin ont été activé avec succès.";
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
        echo json_encode(array('status' => '0',
                               'location' => 'url',
                               'message' => $errors));
      }
    }


}


/* End of file home.php */
/* Location: ./application/controllers/home.php */
