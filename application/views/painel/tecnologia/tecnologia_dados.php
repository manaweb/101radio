		<?php
			require "../Config.php";
			require "../Funcoes.php";
			$saida = "";
			if(!isset($_GET['ID'])){
				$saida .= '	
				<form action="../back/tecnologia.php" method="post" enctype="multipart/form-data">
					<input type="hidden" value="inserir" name="function" />
					<input type="file" name="fileImag" />
					<input type="text" name="txtText" placeholder="texto" />
					<input type="text" name="txtDest" placeholder="destino" />
					<input type="submit" value="Salvar" />
				</form>';
			}else{
				$ID = (int)$_GET['ID'];
				$dados = Assoc("select * from banner where id = $ID");
				$saida .= '	
				<form action="../back/tecnologia.php" method="post" enctype="multipart/form-data">
					<input type="hidden" value="editar" name="function" />
					<input type="text" name="txtText" value="'.$dados['txtText'].'" placeholder="texto" />
					<input type="text" name="txtDest" value="'.$dados['txtDest'].'" placeholder="destino" />
					<input type="submit" value="Salvar" />
				</form>';
			}
			echo $saida;
		?>