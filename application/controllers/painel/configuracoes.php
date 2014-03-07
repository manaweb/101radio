<?php

class Configuracoes extends CI_Controller {

	function index() {
		redirect("{$base_url}painel/configuracoes/contas");
	}


	function menus() {
		// $this->load->library('session');
		// $mensagem = " hidden";
		// if($this->session->flashdata('messageType') != null){
		// 	$mensagem = $this->session->flashdata('messageType');
		// }
		// $data['message'] = '<div class="alert alert-'.$mensagem.'">'.$this->session->flashdata('messageText').'</div>';
		// $data['base_url'] = base_url();
	 //    $data['contentPage'] = "painel/configuracoes/menus";
	 //    $data['pageTitle'] = "Gerenciar Menus";
	 //    $data['itens'] = array(
	 //    					array("nome" => 'Configurações', 'icone' => 'fa fa-gear', 'url' => "painel/configuracoes"),
		// 					array("nome" => 'Menus', 'icone' => 'fa fa-list-ul', 'url' => "painel/configuracoes/menus")
		// 				);
		// $query = "select * from tipoProjeto order by id desc";
		// $campos = array(
		// 	array('texto', 'Tipo de Projeto', 'txtNome'),
		// 	array('imagem', 'Imagem teste', 'upload')
		// );
		// $acoes = array(1,2,3);
		// $data['lista'] = $this->Toolmodel->painelListar($campos, $query, $acoes, 'menus');
		// //$this->output->cache(5);
		// $this->parser->parse('shared/index',$data);
	}

	function contas($action='',$id=0) {
		// $this->load->library('encrypt');
		$mensagem = " hidden";
		if($this->session->flashdata('messageType') != null){
			$mensagem = $this->session->flashdata('messageType');
		}
		$data['message'] = '<div class="alert alert-'.$mensagem.'">'.$this->session->flashdata('messageText').'</div>';
		$data['base_url'] = base_url();
	    $data['contentPage'] = "painel/configuracoes/contas";
	    $data['pageTitle'] = "Gerenciar Contas";

	    switch($action) {

	    	/* Formularios */
	    	case 'cadastrar':
				$data['itens'] = array(
					array("nome" => 'Configurações', 'icone' => 'fa fa-gear', 'url' => "painel"),
					array("nome" => 'Contas', 'icone' => 'fa fa-user', 'url' => "painel/configuracoes/contas"),
					array("nome" => 'Cadastrar', 'icone' => 'glyphicon glyphicon-plus', 'url' => "painel/configuracoes/contas/cadastrar"),
				);
			    $data['pageTitle'] .= ' - Cadastrar';
			    $data['contentPage'] = 'painel/global/cadastrar';
				$campos = array(
					array('text', 'Nome do usu&aacute;rio', 'nome', 'placeholder="Digite o nome do usu&aacute;rio aqui..." ', ''),
					array('text', 'Usu&aacute;rio', 'usuario', 'placeholder="Digite o usu&aacute;rio..." required', ''),
					array('password', 'Senha', 'senha', 'placeholder="Digite a senha do usu&aacute;rio..." required', ''),
					array('text', 'Privil&eacute;gio', 'privilegio', 'placeholder="Digite o privilegio do usuario..." pattern="([0-9]{1,2})" required', 'Apenas n&uacute;meros'),
					array('file', 'Avatar', 'avatar', '', '')
					// array('file', 'Avatar', 'upload', 'required', ''),
				);
				$data['campos'] = $this->Toolmodel->painelCampos($campos, 'painel/configuracoes/contas', 'insert', '');
	    	break;

	    	case 'editar':
	    		$id = (int)$id;
	    		if(isset($id) && is_int($id)) {
	    			$data['itens'] = array(
						array("nome" => 'Configurações', 'icone' => 'fa fa-gear', 'url' => "painel"),
						array("nome" => 'Contas', 'icone' => 'fa fa-user', 'url' => "painel/configuracoes/contas"),
						array("nome" => 'Editar', 'icone' => 'fa fa-edit', 'url' => "painel/configuracoes/contas/editar/$id"),
					);
	    			$data['contentPage'] = "painel/global/cadastrar";
			    	$data['pageTitle'] .= " - Editar";
					$campos = array(
						array('text', 'Usu&aacute;rio', 'usuario', 'placeholder="Digite o novo usuario aqui..." required', ''),
						array('text', 'Nome do usu&aacute;rio', 'nome', 'placeholder="Digite o novo nome do usuario aqui..." ', ''),
						array('text', 'Privil&eacute;gio', 'privilegio', 'placeholder="Digite o novo privilegio do usuario..." required', '')
					);
					$b['contas'] = $this->Toolmodel->find('contas', $id);
					
					if ($b['contas'][0]->privilegio >= 99)
						$campos[] = array('text', 'Senha', 'senha', 'placeholder="Digite a nova senha do usuario..." required', '');

					$data['campos'] = $this->Toolmodel->painelCampos($campos, 'painel/configuracoes/contas', 'update', $id, 'contas');
					
	    		}
	    	break;

	    	/* Ações */

	    	case 'insert':
	    		$this->load->library('encrypt');
				$this->load->helper('upload');
				$caminho = "avatar";
				$proporcoes = array(
					'width' => 118,
					'height' => 94,
					'principal' => 'height',
					'field_name' => 'avatar'
				);
				$nomeArquivo = fazerUpload($caminho, true, $proporcoes);
				$dadosInserir = array(
					'usuario' => $this->input->post('usuario'),
					'senha' => $this->encrypt->encode($this->input->post('senha')),
					'privilegio' => $this->input->post('privilegio'),
					'nome' => $this->input->post('nome'),
					'avatar' => $nomeArquivo
				);
				$this->Toolmodel->inserir('contas', $dadosInserir);
				redirect("painel/configuracoes/contas");
			break;
		
			case 'update':
				$dadosUpdate = array(
					'id' => $this->input->post('Id'),
					'usuario' => $this->input->post('usuario')
				);
				$this->Toolmodel->alterar('contas', $dadosUpdate); 
				redirect("painel/configuracoes/contas");
			break;
		
			case 'delete':
				$this->Toolmodel->excluir('contas', $id,'assets'.DIRECTORY_SEPARATOR.'img'.DIRECTORY_SEPARATOR.'avatar'.DIRECTORY_SEPARATOR.'','avatar');
				redirect("painel/configuracoes/contas");
			break;
		
			case 'mudarFlag':
				$this->Toolmodel->changeFlag('tipoprojeto', $id);
				redirect("painel/tipoProjeto/");
			break;

	    	default:
	    		$data['itens'] = array(
					array("nome" => 'Configurações', 'icone' => 'fa fa-gear', 'url' => "painel"),
					array("nome" => 'Contas', 'icone' => 'fa fa-user', 'url' => "painel/configuracoes/contas")
				);
				$query = "select * from contas order by id desc";
				$campos = array(
					array('texto', 'Usu&aacute;rio', 'usuario'),
					array('texto', 'Nome do usu&aacute;rio', 'nome'),
					array('texto', 'Privil&eacute;gio', 'privilegio')
				);
				$acoes = array(1,2,3);
				$data['lista'] = $this->Toolmodel->painelListar($campos,$query,$acoes,'configuracoes/contas','id');
			break;
	    }
	    
		//$this->output->cache(5);
		$data['nome'] = $this->session->userdata('nome');
		$data['avatar'] = $this->session->userdata('avatar');
		$data['menu_avatar'] = $this->session->userdata('menu_avatar');
		$this->parser->parse('shared/index',$data);
	}

	function site($action='') {

		$mensagem = " hidden";
		if($this->session->flashdata('messageType') != null){
			$mensagem = $this->session->flashdata('messageType');
		}
		$data['message'] = '<div class="alert alert-'.$mensagem.'">'.$this->session->flashdata('messageText').'</div>';
		$data['base_url'] = base_url();
	    $data['contentPage'] = "painel/configuracoes/contas";
	    $data['pageTitle'] = "Gerenciar Informações do Site";
		$data['itens'] = array(
			array("nome" => 'Configurações', 'icone' => 'fa fa-gear', 'url' => "painel"),
			array("nome" => 'Informações do site', 'icone' => 'fa fa-user', 'url' => "painel/configuracoes/site")
		);
		$data['contentPage'] = "painel/global/cadastrar";
    	$data['pageTitle'] .= " - Editar";

		switch($action) {
			case 'update':
				$dadosUpdate = array(
					'id' => $this->input->post('Id'),
					'titulo' => $this->input->post('titulo'),
					'email' => $this->input->post('email'),
					'email_orcamento' => $this->input->post('email_orcamento'),
					'youtube' => $this->input->post('youtube'),
					'instagram' => $this->input->post('instagram'),
					'facebook' => $this->input->post('facebook'),
					'gplus' => $this->input->post('gplus'),
					'twitter' => $this->input->post('twitter'),
				);
				$this->Toolmodel->alterar('informacoes', $dadosUpdate);
				$this->session->unset_userdata('site_titulo');
				$this->session->unset_userdata('site_email');
				$this->session->unset_userdata('site_email_orcamento');
				$this->session->unset_userdata('site_facebook');
				$this->session->unset_userdata('site_twitter');
				$this->session->unset_userdata('site_instagram');
				$this->session->unset_userdata('site_gplus');
				$this->session->unset_userdata('site_youtube');
				redirect("painel/configuracoes/site");
			break;
		}
		
		$campos = array(
			array('text', 'Titulo do site', 'titulo', 'placeholder="Digite o título que irá aparecer no site..." required', ''),
			array('text', 'E-mail de contato', 'email', 'placeholder="Digite o email de contato aqui..." ', ''),
			//array('text', 'E-mail de or&ccedil;amento', 'email_orcamento', 'placeholder="Digite o email para or&ccedil;amento aqui..." ', ''),
			array('text', 'Facebook', 'facebook', 'placeholder="Digite aqui a URL da sua p&aacute;gina facebook..." ', ''),
			//array('text', 'Youtube', 'youtube', 'placeholder="Digite aqui a URL do seu canal no youtube..." ', ''),
			array('text', 'Twitter', 'twitter', 'placeholder="Digite aqui a URL do seu twitter..." ', ''),
			array('text', 'Google+', 'gplus', 'placeholder="Digite aqui a URL do seu Google+" ', ''),
			array('text', 'Instagram', 'instagram', 'placeholder="Digite aqui a URL do seu instagram..." ', ''),

		);
		
		$data['nome'] = $this->session->userdata('nome');
		$data['avatar'] = $this->session->userdata('avatar');
		$data['menu_avatar'] = $this->session->userdata('menu_avatar');
		$data['campos'] = $this->Toolmodel->painelCampos($campos, 'painel/configuracoes/site', 'update', 1, 'informacoes');
		$this->parser->parse('shared/index',$data);
	}
		
}