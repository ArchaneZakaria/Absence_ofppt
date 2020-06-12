<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Master.php';

class Ctr_administrateur extends Master
{
    function __construct()
    {
      parent::__construct();
      date_default_timezone_set('Africa/Casablanca');
      $this->load->model("Utilisateurs_model","Utilisateurs");
      $this->load->model("Role_model","Role");
      $this->load->model("etablissement_model","etablissement");
    }

    public function index($id='',$lang = '')
    {
      $this->display($id,$lang,"Créer un administrateur");
      $this->template->set_partial('container', 'administration/cree_administrateur',array());
    	$this->template->build('body');
    }

    public function administrateur($data = '',$id = NULL)
  	{
	    switch($data){
		    case 'add':
		    case 'ajouter':
          $listEtablissement       = $this->etablissement->getalletablissement();
          $this->display($id,$data,"Créer un administrateur");
          $this->template->set_partial('container', 'administration/cree_administrateur',array('data' => $data, 'listEtablissement' => $listEtablissement));
		    break;
        case 'liste':
          $listAdministrateurs = $this->Utilisateurs->getUsersByType('admin');
          $listEtablissement       = $this->etablissement->getalletablissement();
          $this->display($id,$data,"Liste des administrateurs");
          $this->template->set_partial('container', 'administration/list_administrateur',array('data' => $data, 'listEtablissement' => $listEtablissement ,'listAdministrateurs' => $listAdministrateurs));
        break;
		    default:
          //Errour 404
		  }
		  $this->template->build('body');
	  }

    public function createAdministrateur()
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('cin', 'Le champs cin/Matricule est obligatoire', 'required|trim',
                           array('required' => 'Le champs cin/Matricule est obligatoire'));
      $this->form_validation->set_rules('dateNaissance', 'Le champs date de naissance est obligatoire', 'required|trim',
                           array('required' => 'Le champs date de naissance est obligatoire'));
      $this->form_validation->set_rules('etablissement', 'Le champs etablissement est obligatoire', 'required|trim',
                           array('required' => 'Le champs etablissement est obligatoire'));
      $this->form_validation->set_rules('nom', 'Le champs nom est obligatoire', 'required|trim',
                           array('required' => 'Le champs nom est obligatoire'));
      $this->form_validation->set_rules('prenom', 'Le champs prénom est obligatoire', 'required|trim',
                           array('required' => 'Le champs prénom est obligatoire'));
      $this->form_validation->set_rules('email', 'Le champs email est obligatoire', 'required|trim|valid_email',
                           array('required' => 'Le champs email est obligatoire'));
      $this->form_validation->set_rules('sexe', 'Le champs sexe est obligatoire', 'required|trim',
                           array('required' => 'Le champs sexe est obligatoire'));

      if ($this->form_validation->run()) {
        //check if administrateur role existe ou non
        $role = $this->Role->getRoleId("admin");
        if (count($role)>0) {
          $role = $role[0]->idRole;

          $id            = $this->input->post('admin');
          $dateNaissance = $this->input->post('dateNaissance');
          $etablissement = $this->input->post('etablissement');
          $cin           = $this->input->post('cin');
          $nom           = $this->input->post('nom');
          $prenom        = $this->input->post('prenom');
          $email         = $this->input->post('email');
          $sexe          = $this->input->post('sexe');
          $dateNow       = date_create('now')->format('Y-m-d H:i:s');

          /*
          //Test
          echo "id:$id, dateNaissance:$dateNaissance, etablissement:$etablissement, cin:$cin, nom:$nom, prenom:$prenom, email:$email, sexe:$sexe";
          die;
          */

          if(isset($id)){//update
            $conditions             = array('idUtilisateur' => $id);
            $administrateurData = array (
              'matricule_utilisateur'          => $cin,
              'Nom'                            => $nom,
              'Prenom'                         => $prenom,
              'Email'                          => $email,
              'sexe_utilisateur'               => $sexe,
              'DateNaissance'                  => $dateNaissance,
              'udate_utilisateur'              => $dateNow,
              'uby_utilisateur'                => '1',
              'Etablissement_idEtablissement'  => $etablissement
              );
            $result = $this->Utilisateurs->update($administrateurData,$conditions);
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
            $existeUser = $this->Utilisateurs->checkExisteUser('admin',$email,$etablissement);
            if (count($existeUser) == 0) {
              $passeword          = random_string('alnum', 8);
              $administrateurData = array(
                'matricule_utilisateur'          => $cin,
                'Nom'                            => $nom,
                'Prenom'                         => $prenom,
                'Email'                          => $email,
                'sexe_utilisateur'               => $sexe,
                'cdate_utilisateur'              => $dateNow,
                'Password'                       => $passeword,
                'cby_utilisateur'                => '1',
                'deleted_utilisateur'            => '0',
                'DateNaissance'                  => $dateNaissance,
                'Role_idRole'                    => $role,
                'Etablissement_idEtablissement'  => $etablissement
              );
              $result = $this->Utilisateurs->create($administrateurData);
              if($result){
                $this->load->model('Mail_model');
                $resultMail = $this->Mail_model->mailPasseword($nom, $prenom, $passeword,$email);
                if ($resultMail) {
                  $message = "Le compte administrateur été créer avec succès.";
                  echo json_encode(array( 'status' => '1',
                                          'message' => $message));
                } else {
                    $message = "Le compte administrateur été créer avec succès.<br>Erreur d'envoi de mot de passe à l'email de l'administrateur.";
                    echo json_encode(array( 'status' => '0',
                                            'message' => $message));
                }
              } else {
                  $message = "Erreur de creation de l'administrateur.";
                  echo json_encode(array( 'status' => '0',
                                          'message' => $message));
              }
            } else {
              $message = "Ce compte administrateur existe déjà !";
              echo json_encode(array( 'status' => '0',
                                      'message' => $message));
            }
          }
        } else {
            $errors = "Le role administrateur n'existe pas";
            echo json_encode(array( 'status'   => '0',
                                    'location' => 'url',
                                    'message'  => $errors));
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
