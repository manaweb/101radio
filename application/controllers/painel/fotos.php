<?php

class Album extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}

	function index() {
		$data['itens'] = array(
			array("nome" => 'Album', 'icone' => 'fa fa-picture-o', 'url' => "painel"),
		);
		$query = "select * from album order by id desc";
		$campos = array(
			array('texto', 'Nome do album', 'nome_album'),
			array('texto', 'Data de cria&ccedil;&atilde;o', 'data')
		);
		$acoes = array(1,2,3);
		$data['lista'] = $this->Toolmodel->painelListar($campos,$query,$acoes,'album','id');
		$this->parser->parse('shared/index',$data);
	}

	function adicionar() {
		// $this->load->library('encrypt');
		$mensagem = " hidden";
		if($this->session->flashdata('messageType') != null){
			$mensagem = $this->session->flashdata('messageType');
		}
		$data['message'] = '<div class="alert alert-'.$mensagem.'">'.$this->session->flashdata('messageText').'</div>';
		$data['base_url'] = base_url();
	    $data['contentPage'] = "painel/album";
	    $data['pageTitle'] = "Album";

	    $data['itens'] = array(
			array("nome" => 'Album', 'icone' => 'fa fa-picture-o', 'url' => "painel"),
			array("nome" => 'Novo album', 'icone' => 'fa fa-plus-square', 'url' => "painel/fotos/adicionar"),
		);
	    $data['pageTitle'] .= ' - Cadastrar';
	    $data['contentPage'] = 'painel/global/cadastrar';
		$campos = array(
			array('text', 'Nome do album', 'nome_album', 'placeholder="Digite o nome do album..." ', ''),
			array('file', 'Capa', 'capa', '', '')
			// array('file', 'Avatar', 'upload', 'required', ''),
		);
		$data['campos'] = $this->Toolmodel->painelCampos($campos, 'painel/album', 'acoes/insert', '');
		$data['nome'] = $this->session->userdata('nome');
		$data['avatar'] = $this->session->userdata('avatar');
		$data['menu_avatar'] = $this->session->userdata('menu_avatar');
		$this->parser->parse('shared/index',$data);
	}

	function acoes($action='') {
		switch($action) {

	    	case 'insert':
	    		$nome = $this->input->post('nome_album');
				$this->load->helper('upload');
				$caminho = "";
				$realpath = FCPATH.'assets'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.$nome;

				if (!is_dir($realpath)) {
					mkdir($realpath,0777);
					$caminho = $nome;
				}

				$proporcoes = array(
					'width' => 182,
					'height' => 161,
					'principal' => 'height',
					'field_name' => 'capa'
				);
				$nomeArquivo = fazerUpload($caminho, true, $proporcoes);
				$dadosInserir = array(
					'nome_album' => $this->input->post('nome_album'),
					'data' => 'NOW()'
				);
				$this->Toolmodel->inserir('album', $dadosInserir);
				$query = $this->db->query("SELECT id FROM album ORDER BY id DESC LIMIT 1");
				$r = $query->result();
				$dadosInserir = array(
					'id_album' => $r[0]->id,
					'descricao' => '',
					'capa' => 1
				);
				$this->Toolmodel->inserir('fotos', $dadosInserir);
				redirect("painel/album");
			break;
		
			case 'update':
				$dadosUpdate = array(
					'id' => $this->input->post('Id'),
					'usuario' => $this->input->post('usuario')
				);
				$this->Toolmodel->alterar('contas', $dadosUpdate); 
				redirect("painel/album");
			break;
		
			case 'delete':
				$this->Toolmodel->excluir('contas', $id,'assets'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'avatar'.DIRECTORY_SEPARATOR.'','avatar');
				redirect("painel/album");
			break;
		
			case 'mudarFlag':
				$this->Toolmodel->changeFlag('tipoprojeto', $id);
				redirect("painel/album");
			break;
		}
	}
}