<?php defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/Master.php';

class Ctr_statistic extends Master
{
    function __construct()
    {
      parent::__construct();
      date_default_timezone_set('Africa/Casablanca');
      $this->load->library('session');
    }

    public function index($id='',$lang = '')
    {
      $this->display($id,$lang,"Statistic");
      $this->template->set_partial('container', 'home_view',array());
    	$this->template->build('body');
    }

}
/* End of file home.php */
/* Location: ./application/controllers/home.php */
