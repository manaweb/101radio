<?php
	class TipoProjeto extends CI_Controller {


		public function __construct() {
			parent::__construct();
		}

		//carrega view index mostrando todos os tipoProjetos cadastrados
		function index(){
			$this->load->library('session');
			$mensagem = " hidden";
			if($this->session->flashdata('messageType') != null){
				$mensagem = $this->session->flashdata('messageType');
			}
			$data['message'] = '<div class="alert alert-'.$mensagem.'">'.$this->session->flashdata('messageText').'</div>';
			$data['base_url'] = base_url();
		    $data['contentPage'] = "painel/tipoProjeto/index";
		    $data['pageTitle'] = "Tipos de Projeto";
		    $data['itens'] = array(
								array("nome" => 'Tipos de Projeto', 'icone' => 'glyphicon-asterisk', 'url' => "painel/tipoprojeto"),
							);
			$query = "select * from tipoProjeto order by id desc";
			$campos = array(
				array('texto', 'Tipo de Projeto', 'txtNome'),
				array('imagem', 'Imagem teste', 'upload')
			);
			$acoes = array(1,2,3);
			$data['lista'] = $this->Toolmodel->painelListar($campos, $query, $acoes, 'tipoProjeto');
			//$this->output->cache(5);
			$this->parser->parse('shared/index',$data);
		}
		
		//carregar view cadastrar
		function cadastrar(){
			$data['message'] = "";
			$data['itens'] = array(
								array("nome" => 'Tipos de Projeto', 'icone' => 'glyphicon-asterisk', 'url' => "painel/tipoprojeto"),
								array("nome" => 'Novo Tipo de Projeto', 'icone' => 'glyphicon-euro', 'url' => "painel/tipoprojeto/cadastrar"),
							);
			$data['base_url'] = base_url();
		    $data['contentPage'] = "painel/tipoProjeto/cadastrar";
		    $data['pageTitle'] = "Cadastrar Tipo de Projeto";
				$campos = array(
					array('text', 'Nome', 'txtNome', 'placeholder="Nome do Tipo de projeto" required', 'Comentario de teste'),
					array('file', 'Arquivo Teste', 'upload', 'required', ''),
				);
			$data['campos'] = $this->Toolmodel->painelCampos($campos, 'painel/tipoProjeto', 'insert', '');
			
			$this->parser->parse('shared/index', $data);
		}
		
		//carregar view cadastrar com campos preenchidos para edição
		function editar($id){
			$data['message'] = "";
			$data['itens'] = array(
								array("nome" => 'Cadastros'),
								array("nome" => 'Tipos de Projeto')
							);
			$data['base_url'] = base_url();
	    	$data['contentPage'] = "painel/tipoProjeto/cadastrar";
	    	$data['pageTitle'] = "Editar Tipo de Projeto";
			$campos = array(
				array('text', 'Nome', 'txtNome', 'placeholder="Nome do Tipo de projeto" required', 'Comentario de teste'),
			);
			$data['campos'] = $this->Toolmodel->painelCampos($campos, 'painel/tipoProjeto', 'update', $id, 'tipoProjeto');
			$this->parser->parse('shared/index', $data);
			
			$b['tipoProjeto'] = $this->Toolmodel->find('tipoprojeto', $id);
			$this->parser->parse('painel/tipoProjeto/cadastrar',$b);
		}
		
		//receber dados via POST e cadastrar no banco
		function insert(){
			$this->load->helper('upload');
			$caminho = "tipoprojeto";
			$proporcoes = array(
				'width' => 170,
				'height' => 200,
				'principal' => 'height'
			);
			$nomeArquivo = fazerUpload($caminho, true, $proporcoes);
			$dadosInserir = array(
				'txtNome' => $this->input->post('txtNome'),
				'upload' => $nomeArquivo,
			);
			$this->Toolmodel->inserir('tipoProjeto', $dadosInserir);
			redirect("painel/tipoProjeto/index");
		}
		
		//receber dados via POST e dar update no banco
		function update(){
			$dadosUpdate = array(
				'id' => $this->input->post('Id'),
				'txtNome' => $this->input->post('txtNome')
			);
			$this->Toolmodel->alterar('tipoProjeto', $dadosUpdate); 
			redirect("painel/tipoProjeto/");
		}	
		
		//receber id do tipoProjeto e excluí-lo do banco de dados e também o arquivo do servidor
		function delete($id){
			$this->Toolmodel->excluir('tipoProjeto', $id);
			redirect("painel/tipoProjeto/index");
		}
		
		function mudarFlag($id){
			$this->Toolmodel->changeFlag('tipoprojeto', $id);
			redirect("painel/tipoProjeto/");			
		}
		
	}//end controller tipoProjeto