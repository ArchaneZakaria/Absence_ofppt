<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Master.php';

class Ctr_stagiaire extends Master
{
    function __construct()
    {
      parent::__construct();
      date_default_timezone_set('Africa/Casablanca');
      $this->load->model('stagiaire_model','stagiaire');
      $this->load->model('groupe_model','groupe');
      $this->load->model('filiere_model','filiere');
      $this->load->model('etablissement_model','etablissement');
      $this->load->model('anneeinscription_model','anneeinscription');
      $this->load->model('inscription_model','inscription');
      $this->load->model('absence_model','absence');
    }

    public function index($id='',$lang = '')
    {
      $this->display($id,$lang,"Créer un stagiaire");
      $this->template->set_partial('container', 'stagiaire/creer_stagiaire',array());
    	$this->template->build('body');
    }

    public function stagiaire($data = '',$id = NULL)
  	{
      //$this->display($id,$data,"Liste année inscription","Année inscription",'Liste année inscription');
	    switch($data){
		    case 'add':
		    case 'ajouter':
          $AllFiliere = $this->filiere->getallfiliere();
          $this->display($id,$data,"Créer un stagiaire");
          $this->template->set_partial('container', 'stagiaire/creer_stagiaire',array('data' => $data, 'AllFiliere' =>$AllFiliere));
		    break;
        case 'liste':
          $AllInscription=$this->inscription->getAllInscriptionActive();
          $AllFiliere = $this->filiere->getallfiliere();
          $this->display($id,$data,"Liste des stagiaires");
          $this->template->set_partial('container', 'stagiaire/liste_stagiaires',array('data' => $data, 'AllFiliere' => $AllFiliere, 'AllInscription' => $AllInscription));
        break;
		    default:
          //Errour 404
		  }
		  $this->template->build('body');
	  }

    public function creer_stagiaire(){

      $this->load->library('form_validation');
      $this->form_validation->set_rules('nom_stagiaire', 'Le nom du stagiaire est obligatoire', 'required|trim',
                                array('required' => 'Le nom du stagiaire est obligatoire'));
      $this->form_validation->set_rules('prenom_stagiaire', 'Le prenom du stagiaire est obligatoire', 'required|trim',
                                array('required' => 'Le prenom du stagiaire est obligatoire'));
      $this->form_validation->set_rules('cin_stagiaire', 'La CIN du stagiaire est obligatoire', 'required|trim',
                                array('required' => 'La CIN du stagiaire est obligatoire'));
      $this->form_validation->set_rules('cef_stagiaire', 'La CEF du stagiaire est obligatoire', 'required|trim',
                                array('required' => 'La CEF du stagiaire est obligatoire'));
      $this->form_validation->set_rules('date_naissance_stagiaire', 'La date de naissance du stagiaire est obligatoire', 'required|trim',
                                array('required' => 'La date de naissance du stagiaire est obligatoire'));
      $this->form_validation->set_rules('sexe_stagiaire', 'Le sexe du stagiaire est obligatoire', 'required|trim',
                                array('required' => 'Le sexe du stagiaire est obligatoire'));

       if ($this->form_validation->run()) {
         $id                        = $this->input->post('stagiaireI');
         $idInscription             = $this->input->post('inscriptionI');
         $nom_stagiaire             = $this->input->post('nom_stagiaire');
         $prenom_stagiaire          = $this->input->post('prenom_stagiaire');
         $cin_stagiaire             = $this->input->post('cin_stagiaire');
         $cef_stagiaire             = $this->input->post('cef_stagiaire');
         $date_naissance_stagiaire  = $this->input->post('date_naissance_stagiaire');
         $date_naissance_stagiaire  =  date_create($date_naissance_stagiaire)->format('Y-m-d');
         $sexe_stagiaire            = $this->input->post('sexe_stagiaire');
         $groupe_stagiaire          = $this->input->post('groupe_stagiaire');
         $dateNow                   = date_create('now')->format('Y-m-d H:i:s');


         if(isset($id)){//update
           $conditions    = array('idStagiaire' => $id);
           $stagiaireData = array (
             'uby_stagiaire'    => 1,//prendra le matricule de la personne connecté
             'udate_stagiaire'  => $dateNow,
             'NomStagiaire'     => $nom_stagiaire,
             'PrenomStagiaire'  => $prenom_stagiaire,
             'CniStagiaire'     => $cin_stagiaire,
             'CefStagiaire'     => $cef_stagiaire,
             'DateNaissance'    => $date_naissance_stagiaire,
             'Sexe'             => $sexe_stagiaire
             );
           $result = $this->stagiaire->update($stagiaireData,$conditions);
           if ($result) {
             $etablissementActive=$this->etablissement->getEtablissementActive();
             $anneeInscriptionActive=$this->anneeinscription->getAnneeInscriptionActive();
             $conditions       = array('idInscription' => $idInscription);
             $inscriptionData  = array (
                                 'uby_inscription'        => 1,
                                 'udate_inscription'      => $dateNow,
                                 'Groupe_idGroupe'        => $groupe_stagiaire
                                );
             $resultInscription = $this->inscription->update($inscriptionData,$conditions);
             if ($resultInscription) {
               echo json_encode(array( 'status' => '1',
                                       'location' => 'url',
                                       'message' => "Vos informations ont été ajoutées avec succès"));
             } else {
               echo json_encode(array( 'status' => '0',
                                       'location' => 'url',
                                       'message' => "Errour de traitement"));
             }
           }else {
             echo json_encode(array( 'status'   => '0',
                                     'location' => 'url',
                                     'message'  => "Erreur de traitement"));
           }
         } else {//create
           $options     = array (
                                'cby_stagiaire'=>1,//prendra le matricule de la personne connecté
                                'cdate_stagiaire'=>$dateNow,
                                'NomStagiaire'=>$nom_stagiaire,
                                'PrenomStagiaire'=>$prenom_stagiaire,
                                'CniStagiaire'=>$cin_stagiaire,
                                'CefStagiaire'=>$cef_stagiaire,
                                'DateNaissance'=>$date_naissance_stagiaire,
                                'Sexe'=>$sexe_stagiaire,
                                'deleted_stagiaire'=>'0'
                              );

          $result = $this->stagiaire->create($options);
          if ($result) {
            $insertId = $this->db->insert_id();
            $etablissementActive=$this->etablissement->getEtablissementActive();
            $anneeInscriptionActive=$this->anneeinscription->getAnneeInscriptionActive();
            $inscription  = array (
                               'cby_inscription'=>1,//prendra le matricule de la personne connecté
                               'cdate_inscription'=>$dateNow,
                               'Stagiaire_idStagiaire'=>$insertId,
                               'Groupe_idGroupe'=>$groupe_stagiaire,
                               'Etablissement_idEtablissement'=>$etablissementActive[0]->idEtablissement,
                               'AnneeInscription_idAnneeInscription'=>$anneeInscriptionActive[0]->idAnneeInscription,
                               'deleted_inscription'=>'0'
                               );
            $resultInscription = $this->inscription->create($inscription);
            if ($resultInscription) {
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
            $message = "Errour de traitement.";
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
    public function deperdition_stagiaire(){
                    $this->load->library('form_validation');
                    $this->form_validation->set_rules('date_deperdition_stagiaire', 'La date de déperdition est obligatoire', 'required|trim',
                                              array('required' => 'La date de déperdition est obligatoire'));
                  if ($this->form_validation->run()) {
                        $id      = $this->input->post('stagiaireI');
                        $conditions= array('idStagiaire' => $id);
                        $dateNow                   = date_create('now')->format('Y-m-d H:i:s');
                        $date_deperdition_stagiaire  = $this->input->post('date_deperdition_stagiaire');
                        $date_deperdition_stagiaire  =  date_create($date_deperdition_stagiaire)->format('Y-m-d');

       $options       = array(
                'uby_stagiaire'        => '1',
                'udate_stagiaire'      => $dateNow,
                'deleted_stagiaire'       => '1',
                'ddate_stagiaire' =>$date_deperdition_stagiaire
              );

              $result = $this->stagiaire->update($options,$conditions);
              if($result){
            $message = "Deperdition du stagiaire avec succés.";
            echo json_encode(array( 'status' => '1',
                                    'message' => $message));

          }
          else {
            $message = "Erreur de traitement.";
            echo json_encode(array( 'status' => '0',
                                    'message' => $message));
          }
        }else {
           $errors = validation_errors();
           echo json_encode(array( 'status' => '0',
                                   'location' => 'url',
                                   'message' => $errors));
         }
    }
    public function getHistoriqueStagiaire()
    {
      $idStagiaire = $this->input->post("stagiaireI");
      echo json_encode($this->absence->gethistorique($idStagiaire));
    }
}
/* End of file home.php */
/* Location: ./application/controllers/home.php */
