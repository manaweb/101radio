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
			    	<h3 class="tabs padding-menu"><a href="javascript:void(0);" title="Abrangência">Abrangência</a></h3>
			        <div class="subcontainer">
			        	<div class="row">
			        		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			        			<a href="javascript:void(0);" title="Abrangência">
			        				<img src="{base_url}assets/img/abrangencia.png" class="img-responsive" alt="Abrangência">
			        			</a>
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