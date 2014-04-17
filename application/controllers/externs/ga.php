<?php

require_once('gapi.class.php');

class GA extends CI_Controller {

	public function __construct() {
		date_default_timezone_set('America/Sao_Paulo');
		parent::__construct();
	}

	function get($id,$type='area',$destroy = false) {

		if ($destroy) {
			$this->session->unset_userdata("garesult{$type}");
			$this->session->unset_userdata("garesultTime{$type}");
		}

		$dataAtual = strtotime(date('Y-m-d'));
		$gaData = $this->session->userdata("garesultTime{$type}");

		if ($this->session->userdata('log_in') != NULL) {
			if ($gaData != $dataAtual) {
				if($this->session->userdata("garesult{$type}") == NULL) {
					$ga = new gapi('manawebsuporte@gmail.com','manawebsuporte258456');

					// Define o periodo do relatório-
					$inicio = date('Y-m-01'); // 1° dia do mês atual
					$fim = date('Y-m-t'); // Último dia do mês atual
					switch($type) {
						case 'area':
							// Busca os pageviews e visitas de cada dia do último mês
							$ga->requestReportData($id, 'day', array('visits','pageviews'), 'day', null, $inicio, $fim, 1, 50);
							$gaResultsStr = '';
							$gaResults = array();
							$i = 0;
							foreach ($ga->getResults() as $dados) {
								$gaResults['y'] = date("Y-m-$i");
								$gaResults['visits'] = $dados->getVisits();
								$gaResults['pageviews'] = $dados->getPageviews();
								$gaResultsStr .= json_encode($gaResults).',';
								$i++;
							}
						break;
					}
					$currentTime = strtotime(date('Y-m-d'));
					$this->session->set_userdata("garesult{$type}",$gaResultsStr);
					$this->session->set_userdata("garesultTime{$type}",$currentTime);
				}
			}
			echo '['.rtrim($this->session->userdata("garesult{$type}"),',').']';
		}
	}

}