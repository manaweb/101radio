<?php
	class Banner extends CI_Controller {

		//carrega view index mostrando todos os banners cadastrados
		function index(){
			$this->load->library('session');
			$data['messageText'] = $this->session->flashdata('messageText');
			$data['messageType'] = $this->session->flashdata('messageType');
			$data['base_url'] = base_url();
		    $data['contentPage'] = "painel/banner/index";
		    $data['pageTitle'] = "Banners";
		    $data['itens'] = array(
								array("nome" => 'Listagens'),
								array("nome" => 'Banner')
							);
			$query = "select * from banner order by id";
			$campos = array(
				array('texto', 'Título', 'txtTitu'),
				array('texto', 'Destino', 'txtDest'),
				array('imagem', 'Imagem', 'txtImag'),
			);
			$acoes = array(1,2);
			$data['lista'] = $this->Toolmodel->painelListar($campos, $query, $acoes, 'banner');
			$this->parser->parse('shared/index',$data); 
		}
		
		//carregar view cadastrar
		function cadastrar(){
			$this->load->view('painel/banner/cadastrar');
		}
		
		//carregar view cadastrar com campos preenchidos para edição
		function editar($id){
			$b['banner'] = $this->Toolmodel->find('banner', $id);
			$this->parser->parse('painel/banner/cadastrar',$b);
		}
		
		//receber dados via POST e cadastrar no banco
		function insert($post){
			$this->load->library('image_lib');
			$config['upload_path'] = 'img/banner';
			$config['allowed_types'] = 'gif|jpg|png';
			
			$this->load->library('upload', $config);
	
			if ( ! $this->upload->do_upload())
			{
				$this->load->library('session');
				$this->session->set_flashdata('messageType', 'error');
				$this->session->set_flashdata('messageText', $this->upload->display_errors());
				redirect('banner/index');
			}
			else
			{
				$dataImagem = array('upload_data' => $this->upload->data());
				$dadosInserir = array(
					'txtTitu' => $this->post->input('txtTitu'),
					'txtDest' => $this->post->input('txtDest'),
					'txtImag' => $dataImagem['upload_data']['file_name']
				);
				$this->Toolmodel->inserir($dadosInserir, 'banner');
				
				redirect("banner/index");
			}
		}
		
		//receber dados via POST e dar update no banco
		function update(){
			$dadosUpdate = array(
				'txtTitu' => $this->post->input('txtTitu'),
				'txtDest' => $this->post->input('txtDest')
			);
			//fazer a rotina de alterar imagem
			$this->Toolmodel->alterar($dadosUpdate, 'banner'); 
			redirect("banner/index");
		}	
		
		//receber id do banner e excluí-lo do banco de dados e também o arquivo do servidor
		function delete($id){
			$banner = $this->Toolmodel->find('banner',$id);
			unlink(FCPATH."/img/banner/".$banner[0]->txtImag);
			unlink(FCPATH."/img/banner/thumb/".$banner[0]->txtImag);
			$this->Toolmodel->excluir('banner', $id);
			redirect("banner/index/");
		}
		
	}//end controller Banner
	
