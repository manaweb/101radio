<?php

class Video extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	function index() {
		$mensagem = " hidden";
		if($this->session->flashdata('messageType') != null){
			$mensagem = $this->session->flashdata('messageType');
		}
		$data['message'] = '<div class="alert alert-'.$mensagem.'">'.$this->session->flashdata('messageText').'</div>';
		$data['base_url'] = base_url();
	    $data['contentPage'] = "painel/video";
	    $data['pageTitle'] = "Video";
		$data['itens'] = array(
			array("nome" => 'Video', 'icone' => 'glyphicon glyphicon-play', 'url' => "painel/video"),
		);
		$query = "select * from video order by id desc";
		$campos = array(
			array('texto', 'Titulo do video', 'titulo'),
			array('texto', 'URL do video', 'url'),
			array('data-br', 'Data', 'data')
		);
		$acoes = array(1,2,3);
		$data['lista'] = $this->Toolmodel->painelListar($campos,$query,$acoes,'video/acoes','id',true,true);
		$data['nome'] = $this->session->userdata('nome');
		$data['avatar'] = $this->session->userdata('avatar');
		$data['menu_avatar'] = $this->session->userdata('menu_avatar');
		$this->parser->parse('shared/index',$data);
	}

	function cadastrar() {
		// $this->load->library('encrypt');
		$mensagem = " hidden";
		if($this->session->flashdata('messageType') != null){
			$mensagem = $this->session->flashdata('messageType');
		}
		$data['message'] = '<div class="alert alert-'.$mensagem.'">'.$this->session->flashdata('messageText').'</div>';
		$data['base_url'] = base_url();
	    $data['contentPage'] = "painel/video";
	    $data['pageTitle'] = "Video";
	    $data['itens'] = array(
			array("nome" => 'Video', 'icone' => 'glyphicon glyphicon-play', 'url' => "painel/video"),
			array("nome" => 'Novo video', 'icone' => 'fa fa-plus-square', 'url' => "painel/video/cadastrar"),
		);
	    $data['pageTitle'] .= ' - Cadastrar';
	    $data['contentPage'] = 'painel/global/cadastrar';
		$campos = array(
			array('text', 'Titulo do video', 'titulo', 'placeholder="Digite o titulo aqui..." required', ''),
			array('text-video', 'URL do video', 'url', 'placeholder="Digite a url do video aqui..." required', ''),
			array('video', 'Pr&eacute;-visualiza&ccedil;&atilde;o','','')
		);
		$data['campos'] = $this->Toolmodel->painelCampos($campos, 'painel/video', 'acoes/insert', '');
		$data['nome'] = $this->session->userdata('nome');
		$data['avatar'] = $this->session->userdata('avatar');
		$data['menu_avatar'] = $this->session->userdata('menu_avatar');
		$this->parser->parse('shared/index',$data);
	}

	function acoes($action='',$id=0) {

		$mensagem = " hidden";
		if($this->session->flashdata('messageType') != null){
			$mensagem = $this->session->flashdata('messageType');
		}
		$data['message'] = '<div class="alert alert-'.$mensagem.'">'.$this->session->flashdata('messageText').'</div>';
		$data['base_url'] = base_url();
	    $data['contentPage'] = "painel/video";
	    $data['pageTitle'] = "Video";

		switch($action) {

	    	case 'insert':
				$dadosInserir = array(
					'titulo' => $this->input->post('titulo'),
					'url' => preg_replace('/(watch\?v=)/','embed/',$this->input->post('url')),
					'data' => date('Y-m-d')
				);
				$this->Toolmodel->inserir('video', $dadosInserir);
				redirect("painel/video");
			break;

			case 'editar':
	    		$id = (int)$id;
	    		if(isset($id) && is_int($id)) {
	    			$data['itens'] = array(
						array("nome" => 'Video', 'icone' => 'glyphicon glyphicon-play', 'url' => "painel/video"),
						array("nome" => 'Editar video', 'icone' => 'fa fa-edit', 'url' => "painel/video/acoes/editar/$id"),
					);
	    			$data['contentPage'] = "painel/global/cadastrar";
			    	$data['pageTitle'] .= " - Editar";
					$campos = array(
						array('text', 'Titulo do video', 'titulo', 'placeholder="Digite o titulo aqui..." required', ''),
						array('text-video', 'URL do video', 'url', 'placeholder="Digite a url do video aqui..." required', ''),
						array('video', 'Pr&eacute;-visualiza&ccedil;&atilde;o','','')
					);
					$data['campos'] = $this->Toolmodel->painelCampos($campos, 'painel/video', 'acoes/update', $id, 'video');
	    		}
	    	break;
		
			case 'update':
				$dadosUpdate = array(
					'id' => $this->input->post('Id'),
					'titulo' => $this->input->post('titulo'),
					'url' => $this->input->post('url'),
				);
				$this->Toolmodel->alterar('video', $dadosUpdate); 
				redirect("painel/video");
			break;
		
			case 'delete':
				$this->Toolmodel->excluir('video', $id,'','video');
				redirect("painel/video");
			break;
		}
		$data['nome'] = $this->session->userdata('nome');
		$data['avatar'] = $this->session->userdata('avatar');
		$data['menu_avatar'] = $this->session->userdata('menu_avatar');
		$this->parser->parse('shared/index',$data);
	}
}