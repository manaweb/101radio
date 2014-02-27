<?php
	class TipoProjetoModel extends CI_Model {

		private $txtNome = "";

		function __construct (){
			parent::__construct();
		}
		
		function listar(){
			$this->load->model('ToolModel','', TRUE);
			return $this->ToolModel->getAllEntries('tipoProjeto');
		}
		
		function cadastrar($data){
			
		}
		
		function alterar(){
			
		}
		
		function update(){
			
		}

	    
	}
