<?php
	error_reporting(E_ERROR|E_WARNING);
	class Toolmodel extends CI_Model {
		function __construct (){ //construtor
			parent::__construct();
		}

		//retorna todos as entradas da tabela especificada
		function getAllEntries($table){
	        $query = $this->db->query('SELECT * FROM '.$table);
	        return $query->result();
	    }
		
	    //retorna somente algumas entradas da tabela especificada
	    //caso $limit não seja especificada serão retornados todas as entradas da tabela
	    function getSomeEntries($table, $limit=0){
	    	$limite = $limit == 0 ? "" : " LIMIT $limit";
	    	$query = $this->db->query('SELECT * FROM '.$table.$limite);
	        return $query->result();	
	    }
	    
	    //retorna apenas uma entrada da tabela especificada de acordo com o $id
	    function find($table, $id){
	    	$query = $this->db->query("SELECT * FROM $table WHERE id = ".$this->db->escape_str($id));
	    	return $query->result();
	    }
	    
	    //recebe um array com os dados a serem inseridos e insere na tabela especificada
		function inserir($tabela, $dados){
			$this->load->library('session');
			try {
				$this->db->set($dados);
				$insercao = $this->db->insert($tabela);
				$this->session->set_flashdata('messageType', 'success');
				$this->session->set_flashdata('messageText', 'Cadastrado realizado com sucesso');
			} catch (Exception $e) {
				$this->session->set_flashdata('messageType', 'danger');
				$this->session->set_flashdata('messageText', "Erro: ".$e->getMessage());
			}
		}
		
		//recebe um array com os dados a serem atualizados no banco de acordo tabela especificada
		function alterar($tabela, $dados){
			$this->load->library('session');
			try {
				$this->db->where('id', $dados['id']);
				$this->db->update($tabela, $dados);
				$this->session->set_flashdata('messageType', 'success');
				$this->session->set_flashdata('messageText', utf8_encode("Alteração realizada com sucesso"));
			} catch (Exception $e) {
				$this->session->set_flashdata('messageType', 'danger');
				$this->session->set_flashdata('messageText', "Erro: ".$e->getMessage());
			}		
		}
		
		//recebe uma string com o nome da tabela e uma string com o id da entrada e exclui do banco
		function excluir($tabela, $id,$path='',$field=''){
			$this->load->library('session');
			try {
				$imgName = $this->find($tabela,$id);
				$imgName = $imgName[0]->$field;
				if ($imgName != NULL && !empty($path) && !empty($field)) {
					$dir = dirname(dirname(__DIR__)).DIRECTORY_SEPARATOR;
					
					unlinK($dir.$path."$imgName");
					unlinK($dir.$path.'thumb'.DIRECTORY_SEPARATOR."$imgName");
				}
				$this->db->where('id',$id);
				$this->db->delete($tabela);
				$this->session->set_flashdata('messageType', 'success');

				$this->session->set_flashdata('messageText', utf8_encode("Exclusão realizada com sucesso"));
			} catch (Exception $e) {
				$this->session->set_flashdata('messageType', 'danger');
				$this->session->set_flashdata('messageText', "Erro: ".$e->getMessage());
			}
		}
		
		//muda status(se tiver ativo fica inativo e vice versa)
		function changeFlag($tabela, $id){
			$this->load->library('session');
			try {
				$registro = $this->Toolmodel->find($tabela, $id);
				//$dados = array();
				$dados['flag_status'] = false;
				$alteracao = "desativado";
				if($registro[0]->flag_status == false){
					$dados['flag_status'] = true;
					$alteracao = "ativado";
				}
				$this->db->where('id', $id);
				$this->db->update($tabela, $dados);
				$this->session->set_flashdata('messageType', 'success');
				$this->session->set_flashdata('messageText', utf8_encode("Registro $alteracao com sucesso"));
			} catch (Exception $e) {
				$this->session->set_flashdata('messageType', 'danger');
				$this->session->set_flashdata('messageText', "Erro: ".$e->getMessage());
			}		
		}
		
		//recebe um array com as configurações da miniatura a ser criada e cria a miniatura
		//ver documentação da classe de manipulação de imagens codeigniter 'http://ellislab.com/codeigniter/user-guide/libraries/image_lib.html'
		function criarThumb($configThumb){
			$this->image_lib->initialize($configUpload);
			$this->image_lib->resize();
		}
		
		//cria uma tabela de listagem com os seguintes parâmetros passados
		/*
		 * $campos = array(
		 * 	array($tipo, $titulo, $campoNaTabela)
		 * )
		 * Onde:
		 *     $tipo = 'texto' || 'imagem'
		 *     $titulo = 'string q será o cabeçalho da coluna'
		 *     $campoNaTabela = 'nome do campo no banco de dados'
		 * 
		 * $acoes = array(x, y, ... , n);
		 * 	1 = Editar
		 * 	2 = Excluir
		 * 	3 = Desativar
		 * 	4 = Visualizar
		 * 
		 * $query = 'comando sql desejado'
		 * 
		 *
		 *$controller = 'controller que está chamando a função'		 
		 * */
		function painelListar($campos, $query, $acoes, $controller,$id='Id',$acoesIgnoreNovoRegistro=false){
			$q = $this->db->query($query);
			$topos = "<th>A&ccedil;&otilde;es</th>";
			$conteudos = "<tr>";
			$sizeCampos = sizeof($campos);

			for($i = 0; $i < $sizeCampos; $i++){
				$topos .=
					'
						<th>'.$campos[$i][1].' <i class="fa fa-sort"></i></th>
					';
			}
			if (!$q->result_array()) {
				$conteudos .= '<td colspan="'.($sizeCampos+1).'" class="text-center">Não há registros</td>';
			}else {
				foreach ($q->result_array() as $dados){
					$conteudos .= "<td>";
					for($i = 0; $i < sizeof($acoes); $i++){
						switch($acoes[$i]){
							case 1: 
								$conteudos .= "<a class='glyphicon glyphicon-pencil' href='".base_url().'painel/'.$controller."/editar/".$dados[$id]."'></a>&nbsp;";
								break;
							case 2: 
								$conteudos .= "<a class='glyphicon glyphicon-remove remover-registro' data-link='".base_url().'painel/'.$controller."/delete/".$dados[$id]."' data-toggle='modal' data-target='.modal-delete'></a>&nbsp;";
								break;
							case 3: 
								if(isset($dados['flag_status'])){
									if($dados['flag_status'] == false){
										$conteudos .= "<a class='glyphicon glyphicon-plus-sign' href='".base_url().'painel/'.$controller."/mudarFlag/".$dados[$id]."'></a>&nbsp;";
									}else{
										$conteudos .= "<a class='glyphicon glyphicon-minus-sign' href='".base_url().'painel/'.$controller."/mudarFlag/".$dados[$id]."'></a>&nbsp;";
									}
								}
								break;
							case 4: 
								$conteudos .= "<a class='glyphicon glyphicon-zoom-in' href='".base_url()."painel/".$controller."/visualizar/".$dados[$id]."/'></a>&nbsp;";
								break;
						}						
					}
					$conteudos .= "</td>";

					for($i = 0; $i < $sizeCampos; $i++){
						switch($campos[$i][0]){
							case 'texto': 
								$conteudos .= "<td>".utf8_decode($dados[$campos[$i][2]])."</td>";
								break;
							case 'imagem': 
								$conteudos .= "<td><a href='".base_url()."assets/img/".($acoesIgnoreNovoRegistro ? preg_replace('/(acoes)|(\/)/','',$controller) : $controller)."/".$dados[$campos[$i][2]]."' target='_blank'><img src='".base_url()."assets/img/".($acoesIgnoreNovoRegistro ? preg_replace('/(acoes)|(\/)/','',$controller) : $controller)."/thumb/".$dados[$campos[$i][2]]."' alt=''></td>";
								break;
							case 'video':
								$conteudos .= "<td><iframe src='".$dados[$campos[$i][2]]."'' frameborder='0' allowfullscreen='' style='height: 220px;'></iframe></td>";
								break;
							case 'data':
								$this->load->helper('dow');
								$conteudos .= "<td>".utf8_decode(dow_text($dados[$campos[$i][2]]))."</td>";
								break;
							case 'data-br':
								$conteudos .= "<td>".date('d/m/Y',strtotime($dados[$campos[$i][2]]))."</td>";
								break;
						}
					}
					$conteudos .= "</tr>";
					
				}
			}

			$saida = '
				<div class="col-lg-12">
						<a href="'.base_url().'painel/'.($acoesIgnoreNovoRegistro ? preg_replace('/(acoes)|(\/)/','',$controller) : $controller).'/cadastrar" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Adicionar novo registro</a><br /><br />
            <div class="table-responsive">
              <table class="table table-bordered table-hover table-striped tablesorter">
                <thead>
                  <tr>
										'.$topos.'
                  </tr>
                </thead>
                <tbody>
                  '.$conteudos.'
                </tbody>
              </table>
            </div>
          </div>

					<div class="modal fade modal-delete in" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="false">
			    <div class="modal-dialog modal-sm">
			      <div class="modal-content">
			
			        <div class="modal-header">
			          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			          <h4 class="modal-title" id="mySmallModalLabel">Confirmação de Exclusão</h4>
			        </div>
			        <div class="modal-body">
			          Tem certeza que deseja excluir este registro?
			          <br><br>
			          <div class="text-center">
			          	<button class="btn btn-danger btn-excluir-registro" data-delete="">Excluir</button>&nbsp;<button class="btn btn-default" data-dismiss="modal"">Cancelar</button>
			          </div>
			        </div>
			      </div><!-- /.modal-content -->
			    </div><!-- /.modal-dialog -->
			  </div>';
			
			return utf8_encode($saida);
		}
		


	
	// array('text', 'Nome', 'txtNome', 'placeholder="asdasdasd" required', 'comentarios1');
	//função para criar campos de um formulário de acordo com os parâmetros passados
	// $campos = array('tipo', 'nomeNaLabel', 'nameDoInput', 'atributosAdicionais', 'comentarios sobre o campo');
	// $controller = "controller q está chamando a função";
	// $funcaoDestino = "função no controller q é o action do formulário(geralmente insert ou update), tendo por padrao insert";
	// $id = parâmetro contendo o Id caso a funçao seja update
	function painelCampos($campos, $controller, $funcaoDestino, $id = 0, $tabela = ''){

		static $DTP = false;
		static $CKEDITOR = false;
		static $VIDEO = false;

		$saida = "<div class='col-lg-12'><form role='form' method='post' action=".base_url().$controller."/".$funcaoDestino." enctype='multipart/form-data'>";
		$campo = ""; 
		for($i = 0; $i < sizeof($campos); $i++){
			if($id != 0){
				$dados = mysql_fetch_assoc(mysql_query("select * from ".$tabela." where id = $id"));
				$saida .= "<input type='hidden' name='Id' value='$id' />";
			}
			switch ($campos[$i][0]) {
				case 'text':
					if (strlen($dados[$campos[$i][2]]) == 88) {
						$this->load->library('encrypt');
						$campo = "<input type='".$campos[$i][0]."' class='form-control' name='".$campos[$i][2]."' ".$campos[$i][3]." value='".$this->encrypt->decode(utf8_decode($dados[$campos[$i][2]]))."' />";
					}else
						$campo = "<input type='".$campos[$i][0]."' class='form-control' name='".$campos[$i][2]."' ".$campos[$i][3]." value='".utf8_decode($dados[$campos[$i][2]])."' />";
					break;
				case 'text-video':
					$campo = "<input type='".$campos[$i][0]."' class='form-control video' name='".$campos[$i][2]."' ".$campos[$i][3]." value='".$dados[$campos[$i][2]]."' />";
					break;
				case 'editor':
					if (!$CKEDITOR) {
						$campo = '<script src="'.base_url().'assets/ckeditor/ckeditor.js"></script>';
						$campo .= '<textarea class="ckeditor form-control" name="'.$campos[$i][2].'" '.$campos[$i][3].'>'.$dados[$campos[$i][2]].'</textarea>';
					}else
						$campo .= '<textarea class="ckeditor form-control" name="'.$campos[$i][2].'" '.$campos[$i][3].'>'.$dados[$campos[$i][2]].'</textarea>';
				break;
				break;
				case 'password':
					$campo = "<input type='".$campos[$i][0]."' class='form-control' name='".$campos[$i][2]."' ".$campos[$i][3]." value='".utf8_decode($dados[$campos[$i][2]])."' />";
				break;
				case 'file':
					$campo = "<input type='".$campos[$i][0]."' class='form-control' name='".$campos[$i][2]."' ".$campos[$i][3]." />";
					break;
				case 'dow':
						$campo = "<select class='form-control dow' name='".$campos[$i][2]."' ".$campos[$i][3].">";
						$campo .= '<option selected>Selecione um dia da semana</option>';
						$campo .= '<option value="1">Segunda-feira</option>';
						$campo .= '<option value="2">Terça-feira</option>';
						$campo .= '<option value="3">Quarta-feira</option>';
						$campo .= '<option value="4">Quinta-feira</option>';
						$campo .= '<option value="5">Sexta-feira</option>';
						$campo .= '<option value="6">Sábado</option>';
						$campo .= '<option value="0">Domingo</option>';
						$campo .= "</select>";
					break;
				case 'date':
					if (!$isIncluded) {
						$campo = '<link rel="stylesheet" href="'.base_url().'assets/css/bootstrap-datetimepicker.min.css">
									<script src="'.base_url().'assets/js/moment.js"></script>
									<script src="'.base_url().'assets/js/bootstrap-datetimepicker.min.js"></script>
									<script>
									$(window).load(function() {
										$(".date").datetimepicker({
											pickTime: false,
											format: "DD/MM/YYYY"
										});
									});
								</script>';
						$campo .= '<div class="form-group">
					                <div class="input-group date">
					                    <input type="text" class="form-control" name="'.$campos[$i][2].'" "'.$campos[$i][3].'" value="'.$dados[$campos[$i][2]].'"  />
					                    <span class="input-group-addon"><span class="fa fa-calendar"></span>
					                    </span>
					                </div>
					            </div>';
						$isIncluded = true;
					}else

					$campo = '<div class="form-group">
					                <div class="input-group date">
					                    <input type="text" class="form-control" name="'.$campos[$i][2].'" "'.$campos[$i][3].'" value="'.$dados[$campos[$i][2]].'"  />
					                    <span class="input-group-addon"><span class="fa fa-calendar"></span>
					                    </span>
					                </div>
					            </div>';
			    break;
				case 'hour':
					if (!$isIncluded) {
						$campo = '<link rel="stylesheet" href="'.base_url().'assets/css/bootstrap-datetimepicker.min.css">
									<script src="'.base_url().'assets/js/moment.js"></script>
									<script src="'.base_url().'assets/js/bootstrap-datetimepicker.min.js"></script>
									<script>
									$(window).load(function() {
										$(".date").datetimepicker({
											pick12HourFormat: false,
											pickDate: false,
											pickSeconds: false,
											format: "HH:mm"
										});
									});
								</script>';
						$campo .= '<div class="form-group">
			                <div class="input-group date">
			                    <input type="text" class="form-control" name="'.$campos[$i][2].'" "'.$campos[$i][3].'" value="'.$dados[$campos[$i][2]].'"  />
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
			                    </span>
			                </div>
			            </div>';
						$isIncluded = true;
					}else
						$campo = '<div class="form-group">
			                <div class="input-group date">
			                    <input type="text" class="form-control" name="'.$campos[$i][2].'" "'.$campos[$i][3].'" value="'.$dados[$campos[$i][2]].'"  />
			                    <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span>
			                    </span>
			                </div>
			            </div>';
				break;

				case 'video':
					if (!$isIncluded) {
						$campo = '
						<script>
							$(window).load(function() {
								if ($(window).width() > 768) {
									$("iframe.video").attr("src",$("input.video").val());
									$("input.video").change(function() {
										var correctURL = $(this).val().replace("watch?v=","embed/");
										$(this).val(correctURL);
										$("iframe.video").attr("src",correctURL);
									});
								}else
									$("iframe.video").parent().hide();
							});
						</script>';
						$campo .= "<iframe src='".$dados[$campos[$i][2]]."'' frameborder='0' allowfullscreen='' class='video img-responsive'></iframe>";
					}else
						$campo = "<iframe src='".$dados[$campos[$i][2]]."'' frameborder='0' allowfullscreen='' class='video img-responsive'></iframe>";
					break;
				
				default:
					# code...
					break;
			}
			$comentario = $campos[$i][4] == "" ? "" :  "<p class='help-block'>".$campos[$i][4]."</p>"; 
			$saida .= "
				<div class='form-group'>
                	<label>".$campos[$i][1]."</label>
                	".$campo."
                	".$comentario."
              	</div>
			";
		}
		$saida .= "<input type='submit' class='btn btn-success' value='Enviar' />
				   <input type='button' class='btn btn-default btn-cancelar' onclick='window.location = \"".base_url().''.$controller."\"' value='Cancelar' />
			   </form>
			   </div>
					";
		return utf8_encode($saida);
	}
}
	
	
	//function by Wesley Ferreira dos Santos para inserir no banco, passando como parametros 
		//um array com os nomes dos campos no bd
		//uma string que é o nome da tabela
		//um array com os dados, na mesma sequencia do array de campos
		
	    /*function inserir($campos, $tabela, $dados){
	    	$sql = "insert into (";
	    	$num = 0;
	    	$data = "";
	    	$camp = "";
	    	for($i = 0; $i < count($campos); $i++){
	    		if($num != 0){
	    			$camp .= ", ";
	    			$data .= ", ";
	    		}
	    		$num++;
	    		$camp .= $campos[$i];	
	    		$data .= "'".$dados[$i]."'";
	    	}
	    	$sql .= $camp.") values (".$data.")";

	    	$query = $this->db->query($sql);
	    	return $query;
	    }*/
	    
		//function by Wesley Ferreira dos Santos
	    //cria uma string com os códigos html de um form e dos campos de acordo com os campos especificados
	    /*function gerarCampos($campos){
	    	$formulario = "<form method='post' action=''>";
	    	//for(){}
	    	$formulario .= "</form>";
	    	return $formulario;
	    }*/