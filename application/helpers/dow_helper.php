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
	if ( ! function_exists('dow_text')) {

		 function dow_text($dow_numeric) {
		 	$days = array('Domingo','Segunda-feira','Terça-feira','Quarta-feira','Quinta-feira','Sexta-feira','Sábado');
		 	return $days[$dow_numeric];
		 }

	}