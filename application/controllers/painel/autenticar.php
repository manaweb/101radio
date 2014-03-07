<?php

class Autenticar extends CI_Controller {
	
	function index() {
		$this->load->library('encrypt');
		$user = $this->input->post('txtUser');
		$pass = $this->input->post('txtPassword');
		$query = $this->db->query("SELECT * FROM contas WHERE usuario = '$user'");
		$dataUser = $query->result();
		$retorno = array();
		if ($query->num_rows > 0 && $this->encrypt->decode($dataUser[0]->senha) == $pass) {
			$this->session->set_userdata('log_in',true);
			$retorno['rAuth'] = true;
		}
		else {
			$this->session->set_userdata('log_in',false);
			$retorno['rAuth'] = false;
		}
		echo json_encode($retorno);
		if ($retorno['rAuth']) {
			$data = $dataUser[0];
			$this->session->set_userdata('nome',$data->nome);
			$this->session->set_userdata('usuario',$data->usuario);
			$this->session->set_userdata('privilegio',$data->privilegio);
			$this->session->set_userdata('avatar',$data->avatar);
		}
	}

}