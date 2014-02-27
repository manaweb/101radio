<?php
	class Projeto extends CI_Controller {

		//carrega view index mostrando todos os projetos cadastrados
		function index(){
			$this->load->library('session');
			$data['messageText'] = $this->session->flashdata('messageText');
			$data['messageType'] = $this->session->flashdata('messageType');
			$data['base_url'] = base_url();
		    $data['contentPage'] = "painel/projeto/index";
		    $data['pageTitle'] = "Banners";
		    $data['itens'] = array(
								array("nome" => 'Listagens'),
								array("nome" => 'Projeto')
							);
			$query = "select p.*, tp.txtNome from projeto p, tipoprojeto tp where p.idTipoProjeto = tp.Id";
			$campos = array(
				array('texto', 'Texto', 'txtText'),
				array('texto', 'Destino', 'txtDest'),
				array('imagem', 'Imagem', 'txtImag'),
				array('texto', 'Tipo de Projeto', 'txtNome'),
			);
			$acoes = array(1,2);
			$data['lista'] = $this->Toolmodel->listarTodos($campos, $query, $acoes, 'projeto');
			$this->parser->parse('shared/index',$data); 
		}
		
		//carregar view cadastrar
		function cadastrar(){
			$this->load->view('painel/projeto/cadastrar');
		}
		
		//carregar view cadastrar com campos preenchidos para edição
		function editar($id){
			$b['projeto'] = $this->Toolmodel->find('projeto', $id);
			$this->parser->parse('painel/projeto/cadastrar',$b);
		}
		
		//receber dados via POST e cadastrar no banco
		function insert(){
			$this->load->library('image_lib');
			$config['upload_path'] = 'img/projeto';
			$config['allowed_types'] = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
	
			if ( ! $this->upload->do_upload())
			{
				$this->load->library('session');
				$this->session->set_flashdata('messageType', 'error');
				$this->session->set_flashdata('messageText', $this->upload->display_errors());
				redirect('projeto/index');
			}
			else
			{
				$dataImagem = array('upload_data' => $this->upload->data());
				$configThumb = array(
					'create_thumb' => TRUE,
					'width' => 300,
					'height' => 205,
					'source_image' => $data['upload_data']['full_path'],
					'new_image' => "img/projeto/thumb",
					'master_dim' => 'width',
					'thumb_marker' => ""
				);
				$this->Toolmodel->criarThumb($configThumb);
				$dadosInserir = array(
					'txtText' => $this->post->input('txtText'),
					'txtDest' => $this->post->input('txtDest'),
					'IdTipoProjeto' => $this->post->input('idTipoProjeto'),
					'txtImag' => $dataImagem['upload_data']['file_name'],
					'txtMini' => $dataImagem['upload_data']['file_name']
				);
				$this->Toolmodel->inserir($dadosInserir, 'projeto');
				
				redirect("projeto/index");
			}
		}
		
		//receber dados via POST e dar update no banco
		function update(){
			$dadosUpdate = array(
				'txtText' => $this->post->input('txtText'),
				'txtDest' => $this->post->input('txtDest'),
				'IdTipoProjeto' => $this->post->input('idTipoProjeto'),
			);
			//fazer parte de atualizar imagem
			$this->Toolmodel->alterar($dadosUpdate, 'projeto'); 
			redirect("projeto/index");
		}	
		
		//receber id do projeto e o exclui do banco de dados e também a imagem e a miniatura do servidor
		function delete($id){
			$projeto = $this->Toolmodel->find('projeto',$id);
			unlink(FCPATH."/img/projeto/".$projeto[0]->txtImag);
			unlink(FCPATH."/img/projeto/thumb/".$projeto[0]->txtImag);
			$this->Toolmodel->excluir('projeto', $id);
			redirect("projeto/index/");
		}
		
	}//end controller projeto
	
