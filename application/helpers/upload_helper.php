<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	//função para fazer upload
	//deve-se sempre existir na raiz do projeto a pasta assets/img
	//dentro dessa pasta img criar uma pasta com o nome do controller q for fazer o upload
	//dentro da pasta que possui o mesmo nome do controller deve haver uma pasta chamada thumb para serem criadas miniaturas
	//$caminho sera o nome da pasta que possui o nome do controller (somente o nome da pasta, sem '/' ou quaisquer outros caracteres
	//$thumb por padrão está definido como false para não ser criada miniatura, caso seja necessário a criação de miniatura é necessário passar este parâmetro como true
	//$proporcoes é um array com as dimensões que se deseja para a miniatura, e qual das proporções será tomado como base(width ou height) padrão: 150x150 base-padrão: width
	//ex: $proporcoes = array('width' => 1000, 'height' => 1000, 'principal' => 'width')
	//
	if ( ! function_exists('fazerUpload')) {

		 function fazerUpload($caminho, $thumb = FALSE, $proporcoes){
		 	$ci = &get_instance();
			$ci->load->library('image_lib');
			$config['upload_path'] = "assets/img/".$caminho;
			$config['allowed_types'] = 'gif|jpg|png';
			
			$ci->load->library('upload', $config);
			$dataImagem = array();
			if ( ! $ci->upload->do_upload($proporcoes['field_name']))
			{
				$error = array('error' => $ci->upload->display_errors());
	
				$ci->load->view('painel/upload_form', $error);
			}
			else
			{
				$dataImagem['upload_data'] = $ci->upload->data();
				if($thumb == true) {
					$configUpload = array(
						'create_thumb' => TRUE,
						'width' => $proporcoes['width'],
						'height' => $proporcoes['height'],
						'source_image' => $dataImagem['upload_data']['full_path'],
						'new_image' => "assets/img/$caminho/thumb",
						'x_axis' => $proporcoes['x_axis'],
						'y_axis' => $proporcoes['y_axis'],
						'maintain_ratio' => $proporcoes['maintain_ratio'],
						'master_dim' => $proporcoes['principal'],
						'thumb_marker' => ""
					);
					
					$width = $dataImagem['upload_data']['image_width'];
					$height = $dataImagem['upload_data']['image_height'];

					$ci->image_lib->initialize($configUpload);
					if(($proporcoes['x_axis'] > 0 || $proporcoes['y_axis'] > 0) && $width < $height) {
						$ci->image_lib->resize();
						$ci->image_lib->crop();
					}
					else
						$ci->image_lib->resize();
				}
			}
			return $dataImagem['upload_data']['file_name'];
		}

	}