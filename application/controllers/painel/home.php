<?php

	class Home extends CI_Controller {
		
		function index() {
			$data['message'] = "";
			$data['itens'] = array(
				array("nome" => 'Dashboard', 'icone' => 'glyphicon glyphicon-home', 'url' => "painel")
			);
			$data['base_url'] = base_url();
		    $data['contentPage'] = "painel/index";
		    if (($title = $this->session->userdata('site_titulo')) != NULL)
		    	$data['pageTitle'] = $title;
		    else
		    	$data['pageTitle'] = 'Painel de Controle';
		    $data['nome'] = $this->session->userdata('nome');
			$data['avatar'] = $this->session->userdata('avatar');
			$data['menu_avatar'] = $this->session->userdata('menu_avatar');
			$this->parser->parse('shared/index', $data);
		}
		
		function login() {
			$data['base_url'] = base_url();
			$data['pageTitle'] = "Painel de Controle - Login";
			$this->parser->parse('painel/login',$data);
		}
	}