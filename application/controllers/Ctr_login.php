<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Master.php';

class Ctr_login extends CI_Controller
{
    function __construct()
    {
      parent::__construct();
      date_default_timezone_set('Africa/Casablanca');
      $this->load->model("Utilisateurs_model","Utilisateurs");
    }

    public function error(){
     $this->load->view('view_404');
    }

    public function index($id='',$lang = '')
    {
      if (empty($_SESSION["idUtilisateur"])) {
        $this->load->view('login_view');
      } else {
        if ($_SESSION["role"]=="admin") {
          header("Location: ".base_url()."administrateur/liste");
        } else if ($_SESSION["role"]=="surveillant") {
          header("Location: ".base_url()."absence/liste");
        } else if ($_SESSION["role"]=="formateur") {
          header("Location: ".base_url()."absence/ajouter");
        }else {
          $this->load->view('login_view');
        }
      }
    }

    public function login()
    {
      $this->load->library('form_validation');
      $this->form_validation->set_rules('username', 'L\'email est obligatoire', 'required|trim',
                                array('required' => 'L\'email est obligatoire'));
      $this->form_validation->set_rules('passeword', 'Le mot de passe est obligatoire', 'required|trim',
                                 array('required' => 'Le mot de passe est obligatoire'));

      if ($this->form_validation->run()) {
        $username  = $this->input->post('username');
        $passeword = $this->input->post('passeword');

        $loginResult = $this->Utilisateurs->login($username,$passeword);
        if (count($loginResult)>0) {
          if (($loginResult[0]->Email == $username) && ($loginResult[0]->Password == $passeword)) {

            $_SESSION = array(
                'email'                         => $loginResult[0]->Email,
                'role'                          => $loginResult[0]->code_role,
                'idUtilisateur'                 => $loginResult[0]->idUtilisateur,
                'Etablissement_idEtablissement' => $loginResult[0]->Etablissement_idEtablissement
              );

            if ($loginResult[0]->code_role=='admin') {
              $url = 'administrateur/liste';
            } else if ($loginResult[0]->code_role=='surveillant') {
              $url = 'absence/liste';
            } else if ($loginResult[0]->code_role=='formateur') {
              $url = 'absence/ajouter';
            }
            echo json_encode(array( 'status'   => '1',
                                    'url'      => $url,
                                    'message'  => 'Connextion succèss'));
          }
        } else {
          echo json_encode(array( 'status'   => '0',
                                  'message'  => 'L\'email ou le mot de passe est incorrect !' ));
        }
      } else {
          $errors = validation_errors();
          echo json_encode(array( 'status'   => '0',
                                  'message'  => $errors));
      }
    }







    /*
    //Test mail function
    public function mail() {
      $this->load->model('Mail_model');
      $passeword = random_string('alnum', 8);
      $this->Mail_model->mailPasseword("chei","mahdi",$passeword,"el.mahdi.cheikh@gmail.com");
    }
    */
}
/* End of file home.php */
/* Location: ./application/controllers/home.php */
