<?php

	class Home extends CI_Controller {
		
		function index() { 
			/*if (!isset($_SESSION['Admin']['Login']))
				redirect('painel/home/login');*/
			$data['message'] = "";
			$data['itens'] = array(
				array("nome" => 'Dashboard', 'icone' => 'glyphicon glyphicon-home', 'url' => "painel"),
			);
			$data['base_url'] = base_url();
		    $data['contentPage'] = "painel/index";
		    $data['pageTitle'] = "Painel de Controle";
			$this->parser->parse('shared/index', $data);
		}
		
		function login() {
			$data['base_url'] = base_url();
			$data['pageTitle'] = "Painel de Controle - Login";
			$this->parser->parse('painel/login',$data);
		}
	}