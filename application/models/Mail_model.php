<?php defined('BASEPATH') or exit('No direct script access allowed');

class Mail_model extends MY_Model {

	function __construct() {
  	parent::__construct();
  }

	public function mailPasseword($nom, $prenom, $passeword, $email) {
		$config['protocol']     = 'smtp';
		$config['smtp_host']    = 'ssl://smtp.gmail.com';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '7';
		$config['smtp_user']    = 'sale.al.jadida1@gmail.com';
		$config['smtp_pass']    = 'istaSaj123+/';
		$config['charset']      = 'utf-8';
		$config['newline']      = "\r\n";
		$config['mailtype']     = 'text'; // or html
		$config['validation']   = TRUE;
		$messageGmail           = "bonjour $nom $prenom,\nLe mot de passe de votre compte est: $passeword";
		$this->email->initialize($config);
		$this->email->from('ista.sale.al.jadida@gmail.com', 'ISTA Salé Al Jadida');
		$this->email->to($email);
		$this->email->subject('Mot de passe de G.ABCENCE');
		$this->email->message($messageGmail);
		return $this->email->send();
	}
}
