		<?php
			require "../Config.php";
			require "../Funcoes.php";
			$saida = "";
			if(!isset($_GET['ID'])){
				$saida .= '	
				<form action="../back/projeto.php" method="post" enctype="multipart/form-data">
					<input type="hidden" value="inserir" name="function" />
					<input type="text" name="txtNome" placeholder="Nome" />
					<input type="text" name="txtDest" placeholder="Destino" />
					<textarea name="txtText" placeholder="Texto"></textarea>
					<input type="file" name="fileImag" />
					<input type="submit" value="Salvar" />
				</form>';
			}else{
				$ID = (int)$_GET['ID'];
				$dados = Assoc("select * from banner where id = $ID");
				$saida .= '	
				<form action="../back/projeto.php" method="post" enctype="multipart/form-data">
					<input type="hidden" value="editar" name="function" />
					<input type="text" name="txtNome" value="'.$dados['txtNome'].'" placeholder="Nome" />
					<input type="text" name="txtDest" value="'.$dados['txtDest'].'" placeholder="Destino" />
					<textarea name="txtText" value="'.$dados['txtText'].'" placeholder="Texto"></textarea>
					<input type="submit" value="Salvar" />
				</form>';
			}
			echo $saida;
		?>