<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Master.php';

class Ctr_absence extends Master
{
    function __construct()
    {
      parent::__construct();
      date_default_timezone_set('Africa/Casablanca');
      $this->load->library('session');
      $this->load->model('stagiaire_model','stagiaire');
      $this->load->model('groupe_model','groupe');
      $this->load->model('filiere_model','filiere');
      $this->load->model('etablissement_model','etablissement');
      $this->load->model('anneeinscription_model','anneeinscription');
      $this->load->model('inscription_model','inscription');
      $this->load->model('absence_model','absence');
      $this->load->model('enseigner_model','enseigner');
      $this->load->model('seance_model','seance');
    }

    public function index($id='',$lang = '')
    {
      $this->display($id,$lang,"Noter absence");
      $this->template->set_partial('container', 'absence/noter_absence',array());
    	$this->template->build('body');
    }

    public function absence($data = '',$id = NULL)
  	{
      //$this->display($id,$data,"Liste année inscription","Année inscription",'Liste année inscription');
	    switch($data){
		    case 'add':
		    case 'ajouter':
          $AllEnseigner = $this->enseigner->getEnseigner('1');// 1 prendra l'id de la session
          $this->display($id,$data,"Noter absence");
          $this->template->set_partial('container', 'absence/noter_absence',array('data' => $data, 'AllEnseigner' =>$AllEnseigner));
		    break;
        case 'liste':
        $GroupeAbsents = $this->enseigner->getGroupeAbsent();
          $this->display($id,$data,"Liste des absences");
          $this->template->set_partial('container', 'absence/liste_absence',array('data' => $data, 'GroupeAbsents' =>$GroupeAbsents));
        break;
		    default:
          //Errour 404
		  }
		  $this->template->build('body');
	  }
    //retoune tous les seances de ce groupe
        public function getSeancesByGroupe()
        {
          $id_groupe = $this->input->post("id_groupe");
          echo json_encode($this->seance->getseancebygroupe($id_groupe));
        }
//retoune tous les seances du formateur avec ce groupe
    public function getSeances()
    {
      $id_enseigner = $this->input->post("id_enseigner");
      echo json_encode($this->seance->getseance($id_enseigner));
    }
//retourne les stagiaire absent durant une seance
    public function getStagiaireAbsent()
    {
      $id_seance = $this->input->post("id_seance");
      echo json_encode($this->seance->getstagiaireabsent($id_seance));
    }
//retourne les stagiaires concerner par un cours
    public function getStagiaireaEnseigner()
    {
      $id_enseigner = $this->input->post("id_enseigner");
      echo json_encode($this->enseigner->getstagiaireaenseigner($id_enseigner));
    }

    //fonction qui permet de retourner tous les stagiaires inscrits dans un groupe
        public function getStagiairesGroupe()
        {
          $id_groupe = $this->input->post("id_groupe");
          echo json_encode($this->groupe->getStagiairesGroupe($id_groupe));
        }
    //retourne le nombre d'absence non justifié d'un stagiaire
        public function getAbsenceNJ()
        {
          $stagiaireI = $this->input->post("stagiaireI");
          echo json_encode($this->absence->getabsenceNJ($stagiaireI));
        }

        //fonction qui permet de créer une seance et noter l'absence
        public function NoterAbsence()
        {
          $this->load->library('form_validation');
          $this->form_validation->set_rules('date_seance', 'La date de la séance est obligatoire', 'required|trim',
                                       array('required' => 'La date de la séance est obligatoire'));
          $this->form_validation->set_rules('heure_debut', 'L\'heure de début de la séance est obligatoire', 'required|trim',
          array('required' => 'L\'heure de début de la séance est obligatoire'));
          $this->form_validation->set_rules('heure_fin', 'L\'heure de fin de la séance est obligatoire', 'required|trim',
          array('required' => 'L\'heure de fin de la séance est obligatoire'));
                    if ($this->form_validation->run()) {

                    //  $checkbox_value                        = $this->input->post('checkbox_value');
                      $id_enseigner                        = $this->input->post('id_enseigner');
                      $date_seance                        = $this->input->post('date_seance');
                      $heure_debut                      = $this->input->post('heure_debut');
                      $heure_fin                      = $this->input->post('heure_fin');
                      $dateNow = date_create('now')->format('Y-m-d H:i:s');
                      $options     = array (
                                        'Enseigner_idEnseigner'=>$id_enseigner,
                                        'date_seance'   => $date_seance ,
                                        'heure_debut_seance' => $heure_debut ,
                                        'heure_fin_seance' => $heure_fin,
                                        'cby_seance'   => '1',
                                        'cdate_seance' =>$dateNow,
                                        'deleted_seance' =>'0'
                                              );
                      $result      = $this->seance->createseance($options);
                      $insertId = $this->db->insert_id();//get id last insert

                      if($this->input->post('checkbox_value')){

                        $id = $this->input->post('checkbox_value');

                        for ($count=0; $count < count($id) ; $count++) {

                                            $options     = array (
                                            'Stagiaire_idStagiaire'=>$id[$count],
                                            'cby_absence'   => '1' ,
                                            'cdate_absence' => $dateNow ,
                                            'deleted_absence' => '0',
                                            'etat_absence'   => 'NJ',
                                            'seance_id_seance' =>$insertId
                                                  );
                                      $result1      = $this->absence->createabsence($options);
                                      $insertId1 = $this->db->insert_id();//get id last insert
                                                  }
                      }
                      if($result){
                                        $message = "Absence notées avec succés.";
                                        echo json_encode(array( 'status' => '1',
                                                                'message' => $message));
                                        $conditions = array();
                                  }
                      else {
                                        $message = "Erreur de Traitement.";
                                        echo json_encode(array( 'status'  => '0',
                                                                'message' => $message));
                           }
                    }
                    else {
                       $errors = validation_errors();
                       echo json_encode(array( 'status' => '0',
                                               'location' => 'url',
                                               'message' => $errors));
                     }
        }


        public function AutoriserAcces()
        {
          $this->load->library('form_validation');

          $this->form_validation->set_rules('justification_absence', 'La justification de l\'absence est obligatoire', 'required|trim',
                                       array('required' => 'La justification de l\'absence est obligatoire'));

                                       if ($this->form_validation->run()) {
                   $justification_absence                        = $this->input->post('justification_absence');



                   $this->load->library("Word");
                 		$foldertemplate 	= "assets/sample.docx";
                         $document        	= new \PhpOffice\PhpWord\TemplateProcessor(realpath($foldertemplate));
                         $document->setValue("nama","Abdulionel");
                         $document->setValue("pelatihan","Membangun Website dengan CodeIgniter");
                         $filename      		= 'assets/hhhh';
                         $document->saveAs('./'.$filename.".docx");
                         $this->load->library("apiconvertfile");
                         //daftar dulu di https://www.convertapi.com
                         $configconvert["apisecret"] = "secret_api";
                         $configconvert["fromfile"]  = realpath($filename.".docx");
                         $configconvert["todir"]     = realpath('assets/');
                         $configconvert["fromtype"]  = "docx";
                         $configconvert["totype"]    = "pdf";
                         $result                     = $this->apiconvertfile->do_convert($configconvert);
                         if($result[0]!=""){
                             $this->load->helper('download');
                             force_download($result[0], NULL);
                         }else{
                             echo "Gagal membuat sertifikat";
                         }
          /*header("Content-type: application/vnd.ms-word");
           header("Content-Disposition: attachment;Filename=".rand().".doc");
           header("Pragma: no-cache");
           header("Expires: 0");
           echo '<h1>Justification d\'absence</h1>';
           echo $justification_absence;*/

                   $conditions = array();

                                       }
                                       else {
                                          $errors = validation_errors();
                                          echo json_encode(array( 'status' => '0',
                                                                  'location' => 'url',
                                                                  'message' => $errors));
                                        }
        }
}
/* End of file home.php */
/* Location: ./application/controllers/home.php */
