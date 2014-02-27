		<?php
			require "../Config.php";
			require "../Funcoes.php";
			$saida = "";
			if(!isset($_GET['ID'])){
				$saida .= '
				<form action="../back/banner.php" method="post" enctype="multipart/form-data">
					<input type="hidden" value="inserir" name="function" />
					<input type="text" name="txtTitu" placeholder="Título" />
					<input type="text" name="txtDest" placeholder="Destino" />
					<input type="file" name="fileImag" />
					<input type="submit" value="Salvar" />
				</form>';
			}else{
				$ID = (int)$_GET['ID'];
				$dados = Assoc("select * from banner where id = $ID");
				$saida .= '
				<form action="../back/banner.php?function=editar" method="post" enctype="multipart/form-data">
					<input type="hidden" value="editar" name="function" />
					<input type="text" name="txtTitu" value="'.$dados['txtTitu'].'" placeholder="Título" />
					<input type="text" name="txtDest" value="'.$dados['txtDest'].'"  placeholder="Destino" />
					
					<input type="submit" value="Salvar" />
				</form>';
			}
			echo $saida;
		?>
		