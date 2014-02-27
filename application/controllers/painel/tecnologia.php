<?php
	class Tecnologia extends CI_Controller {

		//carrega view index mostrando todos os tecnologias cadastrados
		function index(){
			$this->load->library('session');
			$data['tecnologias'] = $this->Toolmodel->getAllEntries('tecnologia');
			$data['messageText'] = $this->session->flashdata('messageText');
			$data['messageType'] = $this->session->flashdata('messageType');
			$this->parser->parse('painel/tecnologia/index',$data); 
		}
		
		//carregar view cadastrar
		function cadastrar(){
			$this->load->view('painel/tecnologia/cadastrar');
		}
		
		//carregar view cadastrar com campos preenchidos para edição
		function editar($id){
			$b['tecnologia'] = $this->Toolmodel->find('tecnologia', $id);
			$this->parser->parse('painel/tecnologia/cadastrar',$b);
		}
		
		//receber dados via POST e cadastrar no banco
		function insert($post){
			$this->load->library('image_lib');
			$config['upload_path'] = 'img/tecnologia';
			$config['allowed_types'] = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
	
			if ( ! $this->upload->do_upload())
			{
				$this->session->set_flashdata('messageType', 'error');
				$this->session->set_flashdata('messageText', $this->upload->display_errors());
				redirect('tecnologia/index');
			}
			else
			{
				$dataImagem = array('upload_data' => $this->upload->data());
				$configThumb = array(
					'create_thumb' => TRUE,
					'height' => 73,
					'source_image' => $data['upload_data']['full_path'],
					'new_image' => "img/tecnologia/thumb",
					'master_dim' => 'height',
					'thumb_marker' => ""
				);
				$this->Toolmodel->criarThumb($configThumb);
				$dadosInserir = array(
					'txtText' => $this->post->input('txtText'),
					'txtDest' => $this->post->input('txtDest'),
					'txtImag' => $dataImagem['upload_data']['file_name'],
					'txtMini' => $dataImagem['upload_data']['file_name']
				);
				$this->Toolmodel->inserir($dadosInserir, 'tecnologia');
				
				redirect("tecnologia/index");
			}
		}
		
		//receber dados via POST e dar update no banco
		function update(){
			$dadosUpdate = array(
				'txtText' => $this->post->input('txtText'),
				'txtDest' => $this->post->input('txtDest'),
			);
			$this->Toolmodel->alterar($dadosUpdate, 'tecnologia'); 
			redirect("tecnologia/index");
		}	
		
		//receber id do tecnologia e o exclui do banco de dados e também a imagem e a miniatura do servidor
		function delete($id){
			$this->load->library('session');
			$tecnologia = $this->Toolmodel->find('tecnologia',$id);
			unlink(FCPATH."/img/tecnologia/".$tecnologia[0]->txtImag);
			unlink(FCPATH."/img/tecnologia/thumb/".$tecnologia[0]->txtImag);
			$this->Toolmodel->excluir('tecnologia', $id);
			redirect("tecnologia/index/");
		}
		
	}//end controller tecnologia
	
