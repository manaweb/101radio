<?php

class Upload extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}

	function index()
	{
		$this->load->view('upload_form', array('error' => ' ' ));
	}

	function do_upload()
	{
		$this->load->library('image_lib');
		$config['upload_path'] = 'img/banner';
		$config['allowed_types'] = 'gif|jpg|png';
		
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload())
		{
			$error = array('error' => $this->upload->display_errors());

			$this->load->view('upload_form', $error);
		}
		else
		{
			$data = array('upload_data' => $this->upload->data());
			$configUpload = array(
				'create_thumb' => TRUE,
				'width' => 100,
				'height' => 100,
				'source_image' => $data['upload_data']['full_path'],
				'new_image' => "img/banner/thumb",
				'master_dim' => 'width',
				'thumb_marker' => ""
			);
			$this->image_lib->initialize($configUpload);
			$this->image_lib->resize();
			
			$this->load->view('upload_success', $data);
		}
	}
}
?>