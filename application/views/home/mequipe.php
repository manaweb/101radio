<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    

    <?php $this->load->view('shared/cabecalho'); ?>
    <link rel="stylesheet" type="text/css" href="{base_url}assets/css/fix.css">

    <body>
    	<?php  $this->load->view('shared/headeri'); ?>

    	<div class="container">
    		<div class="row">
    			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			    	<h3 class="tabs padding-menu"><a href="javascript:void(0);" title="Membros da Equipe">Membros da Equipe</a></h3>
			        <div class="subcontainer">
			        	<div class="row">
			        		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 equipe">
			        			<h1 class="pull-left">Jery</h1>
			        			<button class="pull-right btn-voltar" onclick="window.history.back();"><strong>&lt;</strong> VOLTAR</button>
			        			<hr class="clear">
			        			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				        			<img src="{base_url}assets/img/guto.png" class="img-responsive">
				        		</div>
				        		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				        			<span class="contexto">Caros amigos, a adoção de políticas descentralizadoras afeta positivamente a correta previsão das condições inegavelmente apropriadas.</span>
				        			<a href="http://facebook.com" title="Facebook">
					                	<span class="redes-sociais facebook"></span>
					              	</a>
					              	<a href="javascript:void(0);" title="Twitter">
					                	<span class="redes-sociais twitter"></span>
					              	</a>
					              	<a href="mailto:motherfucker@fucker.com" title="E-mail">
					                	<span class="redes-sociais email"></span>
					              	</a>
				        		</div>
				        	</div>
				        	<div class="col-lg-4 col-md-4 col-sm-4 hidden-xs">
				        		<div class="ret-informativo instagram">
				        			<a href="{site_instagram}" title="Siga-nos no instagram!">
				        				<img src="{base_url}assets/img/siga-instagram.png" alt="Siga-nos no instagram!">
				        			</a>
				        		</div>
				        		<div class="ret-informativo top10">
					        		<a href="javascript:void(0);" title="As mais pedidas">
					        			<img src="{base_url}assets/img/maispedidas.png" alt="As mais pedidas" class="img-responsive">
					        		</a>
					        	</div>
				        	</div>
				        </div>
			        </div>
			    </div>
		    </div>
        </div>
    	<?php $this->load->view('shared/footeri'); ?>
		<script>
			$('#qtPhotos').text($('.lista-fotos li img').length);
		</script>
    </body>