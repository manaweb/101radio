<?php
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	if (!function_exists('enviarEmail')) {
		function enviarEmail($dadosEmail){
			$ci = &get_instance();
			$ci->email->from($dadosEmail['from']);
			$this->email->to($dadosEmail['to']); 
			
			$ci->email->subject($dadosEmail['subject']);
			$ci->email->message($dadosEmail['msg']);	
			
			return $ci->email->send();
		}
	}