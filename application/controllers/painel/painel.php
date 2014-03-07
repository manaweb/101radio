<?php
	class Painel extends CI_Controller {	 
		
		//verifica se o usuário estiver logado e redireciona para a tela de login ou para a tela principal do painel
		function index() { 
			$data['base_url'] = base_url();
		    $data['contentPage'] = "painel/index";
		    $data['pageTitle'] = "Painel de Controle";	
			$this->parser->parse('shared/index', $data);
		}

	} 