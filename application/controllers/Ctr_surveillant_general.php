<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Master.php';

class Ctr_surveillant_general extends Master
{
    function __construct()
    {
      parent::__construct();
      date_default_timezone_set('Africa/Casablanca');
      $this->load->model("Surveillant_General_model","Surveillant_General");
      $this->load->model("Role_model","Role");



    }

    public function index($id='',$lang = '')
    {
      $this->display($id,$lang,"Créer un survéillant général");
      $this->template->set_partial('container', 'surveillantGeneral/cree_surveillant_general',array());
    	$this->template->build('body');
    }

    public function surveillant_general($data = '',$id = NULL)
  	{
      //$this->display($id,$data,"Liste année inscription","Année inscription",'Liste année inscription');
	    switch($data){
		    case 'add':
		    case 'ajouter':
          $this->display($id,$data,"Créer un survéillant général");
          $this->template->set_partial('container', 'surveillantGeneral/cree_surveillant_general',array('data' => $data));
		    break;
        case 'liste':
          $listSurveillant_General = $this->Surveillant_General->getAllSurveillant_General();
          $this->display($id,$data,"Liste des survéillants généraux");
          $this->template->set_partial('container', 'surveillantGeneral/list_surveillant_general',array('data' => $data, 'listSurveillant_General' => $listSurveillant_General));
        break;
		    default:
          //Errour 404
		  }
		  $this->template->build('body');
	  }


    public function createSurveillantGeneral()
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('cin', 'Le champs cin/Matricule est obligatoire', 'required|trim',
                              array('required' => 'Le champs cin/Matricule est obligatoire'));
      $this->form_validation->set_rules('nom', 'Le champs nom est obligatoire', 'required|trim',
                              array('required' => 'Le champs nom est obligatoire'));
      $this->form_validation->set_rules('prenom', 'Le champs prénom est obligatoire', 'required|trim',
                              array('required' => 'Le champs prénom est obligatoire'));
      $this->form_validation->set_rules('email', 'Le champs email est obligatoire', 'required|trim|valid_email',
                              array('required' => 'Le champs email est obligatoire'));
      $this->form_validation->set_rules('sexe', 'Le champs sexe est obligatoire', 'required|trim',
                              array('required' => 'Le champs sexe est obligatoire'));


      if ($this->form_validation->run()) {
        //check if survéillant general role existe ou non
        $role = $this->Role->getRoleId("survéillant général");
        if (count($role)>0) {
          $role = $role[0]->idRole;

          $id            = $this->input->post('survGI');
          $cin           = $this->input->post('cin');
          $nom           = $this->input->post('nom');
          $prenom        = $this->input->post('prenom');
          $email         = $this->input->post('email');
          $sexe          = $this->input->post('sexe');
          $dateNow       = date_create('now')->format('Y-m-d H:i:s');

          if(isset($id)){//update
            $conditions             = array('idUtilisateur' => $id);
            $surveillanGeneraleData = array (
              'matricule_utilisateur'  => $cin,
              'Nom'                    => $nom,
              'Prenom'                 => $prenom,
              'Email'                  => $email,
              'sexe_utilisateur'       => $sexe,
              'udate_utilisateur'      => $dateNow,
              'uby_utilisateur'        => '1',
              );
            $result = $this->Surveillant_General->update($surveillanGeneraleData,$conditions);
            if ($result) {
              echo json_encode(array( 'status'   => '1',
                                      'location' => 'url',
                                      'message'  => "vos informations été modifiées avec succés"));
            }else {
              echo json_encode(array( 'status'   => '0',
                                      'location' => 'url',
                                      'message'  => "Erreur de traitement"));
            }
          } else { //create
            $surveillanGeneraleData=array(
                  'matricule_utilisateur'  => $cin,
                  'Nom'                    => $nom,
                  'Prenom'                 => $prenom,
                  'Email'                  => $email,
                  'sexe_utilisateur'       => $sexe,
                  'cdate_utilisateur'      => $dateNow,
                  'Password'               => 'Mm1234//',
                  'cby_utilisateur'        => '1',
                  'deleted_utilisateur'    => '0',
                  'DateNaissance'          => $dateNaissance,
                  'Role_idRole'            => $role
                );
            $result = $this->Surveillant_General->create($surveillanGeneraleData);
            if($result){
              $message = "Votre survéillant général été créer avec succès.";
              echo json_encode(array( 'status' => '1',
                                      'message' => $message));
            } else {
                $message = "Erreur de creation de survéillant général.";
                echo json_encode(array( 'status' => '0',
                                        'message' => $message));
            }
          }
        } else {
            $errors = validation_errors();
            echo json_encode(array( 'status'   => '0',
                                    'location' => 'url',
                                    'message'  => $errors));
        }
      }
    }

    public function deleteSurveillantGeneral()
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('survGI', 'Erreur d\'obtenir le survéillant général', 'required|trim',
                              array('required' => 'Erreur d\'obtenir le survéillant général'));

      if ($this->form_validation->run()) {
        $id                      = $this->input->post('survGI');
        $dateNow                 = date_create('now')->format('Y-m-d H:i:s');
        $conditions              = array('idUtilisateur' => $id);
        $surveillanGeneraleData  = array (
          'deleted_utilisateur'  => '1',
          'dby_utilisateur'      => '1',
          'ddate_utilisateur'    => $dateNow
          );
        $result = $this->Surveillant_General->update($surveillanGeneraleData,$conditions);
        if ($result) {
          echo json_encode(array( 'status'   => '1',
                                  'location' => 'url',
                                  'message'  => "vos informations été supprimer avec succés"));
        }else {
          echo json_encode(array( 'status'   => '0',
                                  'location' => 'url',
                                  'message'  => "Erreur de traitement"));
        }
      } else {
          $errors = validation_errors();
          echo json_encode(array( 'status'   => '0',
                                  'location' => 'url',
                                  'message'  => $errors));
      }
    }




}
/* End of file home.php */
/* Location: ./application/controllers/home.php */
