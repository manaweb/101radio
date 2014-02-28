
<?php

class Login extends CI_Controller {
	
	function index() {
		$data['pageTitle'] = '101FM - Painel Administrativo';
		$data['base_url'] = base_url();
		$this->parser->parse('painel/login',$data);
	}

}

?>