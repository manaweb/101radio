<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	//fun��o para fazer upload
	//deve-se sempre existir na raiz do projeto a pasta assets/img
	//dentro dessa pasta img criar uma pasta com o nome do controller q for fazer o upload
	//dentro da pasta que possui o mesmo nome do controller deve haver uma pasta chamada thumb para serem criadas miniaturas
	//$caminho sera o nome da pasta que possui o nome do controller (somente o nome da pasta, sem '/' ou quaisquer outros caracteres
	//$thumb por padr�o est� definido como false para n�o ser criada miniatura, caso seja necess�rio a cria��o de miniatura � necess�rio passar este par�metro como true
	//$proporcoes � um array com as dimens�es que se deseja para a miniatura, e qual das propor��es ser� tomado como base(width ou height) padr�o: 150x150 base-padr�o: width
	//ex: $proporcoes = array('width' => 1000, 'height' => 1000, 'principal' => 'width')
	//
	if ( ! function_exists('fazerUpload')) {

		 function fazerUpload($caminho, $thumb = FALSE, $proporcoes = array('width' => 150, 'height' => 150, 'principal' => 'width')){
		 	$ci = &get_instance();
			$ci->load->library('image_lib');
			$config['upload_path'] = "assets/img/".$caminho;
			$config['allowed_types'] = 'gif|jpg|png';
			
			$ci->load->library('upload', $config);
			$dataImagem = array();
			if ( ! $ci->upload->do_upload('upload'))
			{
				$error = array('error' => $ci->upload->display_errors());
	
				$ci->load->view('painel/upload_form', $error);
			}
			else
			{
				$dataImagem['upload_data'] = $ci->upload->data();
				if($thumb == true){
					$configUpload = array(
						'create_thumb' => TRUE,
						'width' => $proporcoes['width'],
						'height' => $proporcoes['height'],
						'source_image' => $dataImagem['upload_data']['full_path'],
						'new_image' => "assets/img/$caminho/thumb",
						'master_dim' => $proporcoes['principal'],
						'thumb_marker' => ""
					);
					$ci->image_lib->initialize($configUpload);
					$ci->image_lib->resize();
				}
			}
			return $dataImagem['upload_data']['file_name'];
		}

	}