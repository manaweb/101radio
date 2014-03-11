<?php

Class ARadio extends CI_Controller {
	
	function index() {

		if ($this->session->userdata('site_titulo') == NULL) {
	    	$query = $this->db->query("SELECT * FROM informacoes");
	    	$result = $query->result();
	    	$result = $result[0];
	    	$this->session->set_userdata('site_titulo',$result->titulo);
	    	$this->session->set_userdata('site_email',$result->email);
	    	$this->session->set_userdata('site_email_orcamento',$result->email_orcamento);
	    	$this->session->set_userdata('site_gplus',$result->gplus);
	    	$this->session->set_userdata('site_facebook',$result->facebook);
	    	$this->session->set_userdata('site_twitter',$result->twitter);
	    	$this->session->set_userdata('site_instagram',$result->instagram);
	    	//$this->session->set_userdata('site_youtube',$result->youtube);
	    	$query->free_result();
	    }
		
		$data['base_url'] = base_url();
	    $data['pageTitle'] = $this->session->userdata('site_titulo') . ' - A Rádio';
	    $data['site_email'] = $this->session->userdata('site_email');
	    $data['site_email_orcamento'] = $this->session->userdata('site_email_orcamento');
	    $data['site_facebook'] = $this->session->userdata('site_facebook');
	    $data['site_twitter'] = $this->session->userdata('site_twitter');
	    $data['site_instagram'] = $this->session->userdata('site_instagram');
	    //$data['site_youtube'] = $this->session->userdata('site_youtube');
	    $data['site_gplus'] = $this->session->userdata('site_gplus');
		$this->parser->parse('home/aradio',$data);
	}

}