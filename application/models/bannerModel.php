<?php
	class BannerModel extends CI_Model {		
		
		function __construct (){
			parent::__construct();
		}
		
		function set($var, $value){
			$this->$var = $value;
		}
		
		function get($var){
			return $this->$var;
		}
		
	}
?>
