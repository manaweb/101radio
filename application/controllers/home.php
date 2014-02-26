<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$data['base_url'] = base_url();
		$this->parser->parse('index',$data);
	}
	
}