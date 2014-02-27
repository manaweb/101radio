<?php
	class Painel extends CI_Controller {	 
		
		//verifica se o usuário estiver logado e redireciona para a tela de login ou para a tela principal do painel
		function index() { 
			//$this->Toolmodel->verificaLogado();
			$data['base_url'] = base_url();
		    $data['contentPage'] = "painel/index";
		    $data['pageTitle'] = "Painel de Controle";	
			$this->parser->parse('shared/index', $data);
		}
		
		function login(){
			$this->Toolmodel->verificaLogado();
			redirect('painel/index');
		}
		
		function logar(){
			$usuario = $this->post->input('txtLogin');
			$senha = $this->post->input('txtSenha');
			if(!$this->Toolmodel->login($usuario, $senha))
				$this->parser->parse('/painel/index');	
			$this->redirect('painel/login');
 		}
	} 