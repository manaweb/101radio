<?php

class Programacao extends CI_Controller {

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
	    $data['contentPage'] = "painel/programacao";
	    $data['pageTitle'] = "Programação";
		$data['itens'] = array(
			array("nome" => 'Programação', 'icone' => 'fa fa-calendar', 'url' => "painel/programacao"),
		);
		$query = "select * from programacao order by id desc";
		$campos = array(
			array('texto', 'Titulo da programa&ccedil;&atilde;o', 'titulo'),
			array('data', 'Dia da semana', 'dia_semana'),
			array('texto', 'Hor&aacute;rio inicial', 'inicio'),
			array('texto', 'Hor&aacute;rio final', 'fim'),
		);
		$acoes = array(1,2,3);
		$data['lista'] = $this->Toolmodel->painelListar($campos,$query,$acoes,'programacao/acoes','id',true);
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
	    $data['contentPage'] = "painel/programacao";
	    $data['pageTitle'] = "Programa&ccedil;&atilde;o";
	    $data['itens'] = array(
			array("nome" => 'Programa&ccedil;&atilde;o', 'icone' => 'fa fa-calendar', 'url' => "painel/programacao"),
			array("nome" => 'Nova programa&ccedil;&atilde;o', 'icone' => 'fa fa-plus-square', 'url' => "painel/programacao/cadastrar"),
		);
	    $data['pageTitle'] .= ' - Cadastrar';
	    $data['contentPage'] = 'painel/global/cadastrar';
		$campos = array(
			array('text', 'Titulo da programa&ccedil;&atilde;o', 'titulo', 'placeholder="Digite o titulo aqui..." required', ''),
			array('dow', 'Dia da semana', 'dia_semana', ' required', ''),
			array('hour', 'Hor&aacute;rio de inicio', 'inicio', '', ''),
			array('hour', 'Hor&aacute;rio de termino', 'fim', '', ''),
		);
		$data['campos'] = $this->Toolmodel->painelCampos($campos, 'painel/programacao', 'acoes/insert', '');
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
	    $data['contentPage'] = "painel/programacao";
	    $data['pageTitle'] = "Programa&ccedil;&atilde;o";

		switch($action) {

	    	case 'insert':
				$dadosInserir = array(
					'titulo' => $this->input->post('titulo'),
					'dia_semana' => $this->input->post('dia_semana'),
					'inicio' => $this->input->post('inicio'),
					'fim' => $this->input->post('fim'),
				);
				$this->Toolmodel->inserir('programacao', $dadosInserir);
				redirect("painel/programacao");
			break;

			case 'editar':
	    		$id = (int)$id;
	    		if(isset($id) && is_int($id)) {
	    			$data['itens'] = array(
						array("nome" => 'Programa&ccedil;&atilde;o', 'icone' => 'fa fa-calendar', 'url' => "painel/programacao"),
						array("nome" => 'Editar programa&ccedil;&atilde;o', 'icone' => 'fa fa-edit', 'url' => "painel/programacao/acoes/editar/$id"),
					);
	    			$data['contentPage'] = "painel/global/cadastrar";
			    	$data['pageTitle'] .= " - Editar";
					$campos = array(
						array('text', 'Titulo da programa&ccedil;&atilde;o', 'titulo', 'placeholder="Digite o titulo aqui..." required', ''),
						array('dow', 'Dia da semana', 'dia_semana', ' required', ''),
						array('hour', 'Hor&aacute;rio de inicio', 'inicio', '', ''),
						array('hour', 'Hor&aacute;rio de termino', 'fim', '', ''),
					);
					$data['campos'] = $this->Toolmodel->painelCampos($campos, 'painel/programacao', 'acoes/update', $id, 'programacao');
	    		}
	    	break;
		
			case 'update':
				$dadosUpdate = array(
					'id' => $this->input->post('Id'),
					'titulo' => $this->input->post('titulo'),
					'dia_semana' => $this->input->post('dia_semana'),
					'inicio' => $this->input->post('inicio'),
					'fim' => $this->input->post('fim')
				);
				$this->Toolmodel->alterar('programacao', $dadosUpdate); 
				redirect("painel/programacao");
			break;
		
			case 'delete':
				$this->Toolmodel->excluir('programacao', $id,'assets'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'avatar'.DIRECTORY_SEPARATOR.'','avatar');
				redirect("painel/programacao");
			break;
		}
		$data['nome'] = $this->session->userdata('nome');
		$data['avatar'] = $this->session->userdata('avatar');
		$data['menu_avatar'] = $this->session->userdata('menu_avatar');
		$this->parser->parse('shared/index',$data);
	}
}