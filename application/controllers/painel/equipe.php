<?php

class Equipe extends CI_Controller {

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
	    $data['contentPage'] = "painel/equipe";
	    $data['pageTitle'] = "Equipe";
		$data['itens'] = array(
			array("nome" => 'Equipe', 'icone' => 'fa fa-users', 'url' => "painel/equipe"),
		);
		$query = "select * from equipe order by id desc";
		$campos = array(
			array('texto', 'Nome de exibi&ccedil;&atilde;o', 'nome_exibicao'),
			array('texto', 'Nome', 'nome'),
			array('texto', 'Facebook', 'facebook'),
			array('texto', 'Twitter', 'twitter'),
			array('texto', 'E-mail', 'email'),
			array('imagem', 'Foto', 'foto')
		);
		$acoes = array(1,2,3);
		$data['lista'] = $this->Toolmodel->painelListar($campos,$query,$acoes,'equipe/acoes','id',true);
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
	    $data['contentPage'] = "painel/equipe";
	    $data['pageTitle'] = "Equipe";
	    $data['itens'] = array(
			array("nome" => 'Equipe', 'icone' => 'fa fa-users', 'url' => "painel/equipe"),
			array("nome" => 'Novo membro da equipe', 'icone' => 'fa fa-plus-square', 'url' => "painel/equipe/cadastrar"),
		);
	    $data['pageTitle'] .= ' - Cadastrar';
	    $data['contentPage'] = 'painel/global/cadastrar';
		$campos = array(
			array('text', 'Nome de exibi&ccedil;&atilde;o', 'nome_exibicao', 'placeholder="Digite o nome de exibi&ccedil;&atilde;o..." required', ''),
			array('text', 'Nome', 'nome', 'placeholder="Digite o nome completo..." required', ''),
			array('editor', 'Descri&ccedil;&atilde;o', 'sobre', '', ''),
			array('text', 'Facebook', 'facebook', 'placeholder="Digite o perfil do facebook aqui..." ', ''),
			array('text', 'Twitter', 'twitter', 'placeholder="Digite o perfil do twitter aqui..." ', ''),
			array('text', 'E-mail', 'email', 'placeholder="Digite o email aqui..." ', ''),
			array('file', 'Foto', 'foto', '" required', ''),

		);
		$data['campos'] = $this->Toolmodel->painelCampos($campos, 'painel/equipe', 'acoes/insert', '');
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
	    $data['contentPage'] = "painel/equipe";
	    $data['pageTitle'] = "Equipe";

		switch($action) {

	    	case 'insert':
	    		$this->load->helper('upload');
				$caminho = "equipe";
				$proporcoes = array(
					'width' => 182,
					'height' => 176,
					'x_axis' => 182,
					'y_axis' => 176,
					'maintain_ratio' => false,
					'principal' => 'height',
					'field_name' => 'foto'
				);
				$nomeArquivo = fazerUpload($caminho, true, $proporcoes);
				$dadosInserir = array(
					'nome_exibicao' => $this->input->post('nome_exibicao'),
					'nome' => $this->input->post('nome'),
					'sobre' => $this->input->post('sobre'),
					'facebook' => $this->input->post('facebook'),
					'twitter' => $this->input->post('twitter'),
					'email' => $this->input->post('email'),
					'foto' => $nomeArquivo
				);
				$this->Toolmodel->inserir('equipe', $dadosInserir);
				redirect("painel/equipe");
			break;

			case 'editar':
	    		$id = (int)$id;
	    		if(isset($id) && is_int($id)) {
	    			$data['itens'] = array(
						array("nome" => 'Equipe', 'icone' => 'fa fa-users', 'url' => "painel/equipe"),
						array("nome" => 'Editar membro da equipe', 'icone' => 'fa fa-edit', 'url' => "painel/equipe/acoes/editar/$id"),
					);
	    			$data['contentPage'] = "painel/global/cadastrar";
			    	$data['pageTitle'] .= " - Editar";
					$campos = array(
						array('text', 'Nome de exibi&ccedil;&atilde;o', 'nome_exibicao', 'placeholder="Digite o nome de exibição..." required', ''),
						array('text', 'Nome', 'nome', 'placeholder="Digite o nome completo..." required', ''),
						array('text', 'Facebook', 'facebook', 'placeholder="Digite o perfil do facebook aqui..." ', ''),
						array('text', 'Twitter', 'twitter', 'placeholder="Digite o perfil do twitter aqui..." ', ''),
						array('text', 'E-mail', 'email', 'placeholder="Digite o email aqui..." ', ''),
						array('file', 'Foto', 'foto', '', ''),
					);
					$data['campos'] = $this->Toolmodel->painelCampos($campos, 'painel/equipe', 'acoes/update', $id, 'equipe');
	    		}
	    	break;
		
			case 'update':
				$this->load->helper('upload');
				$caminho = "equipe";
				$proporcoes = array(
					'width' => 182,
					'height' => 176,
					'x_axis' => 50,
					'y_axis' => 176,
					'maintain_ratio' => false,
					'principal' => 'height',
					'field_name' => 'foto'
				);
				$nomeArquivo = fazerUpload($caminho, true, $proporcoes);
				$dadosUpdate = array(
					'id' => $this->input->post('Id'),
					'nome_exibicao' => $this->input->post('nome_exibicao'),
					'nome' => $this->input->post('nome'),
					'facebook' => $this->input->post('facebook'),
					'twitter' => $this->input->post('twitter'),
					'email' => $this->input->post('email'),
					'foto' => $nomeArquivo
				);
				$this->Toolmodel->alterar('equipe', $dadosUpdate); 
				redirect("painel/equipe");
			break;
		
			case 'delete':
				$this->Toolmodel->excluir('equipe', $id,'assets'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'equipe'.DIRECTORY_SEPARATOR.'','foto');
				redirect("painel/equipe");
			break;
		}
		$data['nome'] = $this->session->userdata('nome');
		$data['avatar'] = $this->session->userdata('avatar');
		$data['menu_avatar'] = $this->session->userdata('menu_avatar');
		$this->parser->parse('shared/index',$data);
	}
}