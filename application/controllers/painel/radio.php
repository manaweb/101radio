<?php

class Radio extends CI_Controller {

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
	    $data['contentPage'] = "painel/radio";
	    $data['pageTitle'] = "A Rádio";
	    $data['itens'] = array(
			array("nome" => 'A Rádio', 'icone' => 'glyphicon glyphicon-headphones', 'url' => "painel/radio"),
		);
	    $data['contentPage'] = 'painel/global/cadastrar';
		$campos = array(
			array('editor', 'Texto', 'texto', ' id="editor1"  required', '')
		);
		$data['nome'] = $this->session->userdata('nome');
		$data['avatar'] = $this->session->userdata('avatar');
		$data['menu_avatar'] = $this->session->userdata('menu_avatar');
		$data['campos'] = $this->Toolmodel->painelCampos($campos, 'painel/radio', 'update', 1, 'aradio');
		$data['menu_avatar'] = $this->session->userdata('menu_avatar');
		$this->parser->parse('shared/index',$data);
	}

	function update() {
		$dadosUpdate = array(
			'id' => 1,
			'texto' => $this->input->post('texto')
		);
		$this->Toolmodel->alterar('aradio', $dadosUpdate); 
		redirect("painel/radio");
	}
}
