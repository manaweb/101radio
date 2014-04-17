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
			    	<h3 class="tabs padding-menu"><a href="javascript:void(0);" title="Equipe">Equipe</a></h3>
			        <div class="subcontainer">
			        	<div class="row">
			        		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				        		<ul class="list-inline list-unstyled equipe">
				        			<li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				        				<a href="{base_url}mequipe">
				        					<div class="tarja text-center padding-menu">
				        						<span>Guto</span>
				        					</div>
				        					<img src="{base_url}assets/img/guto.png" class="img-responsive">
				        				</a>
				        			</li>
				        			<li class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				        				<a href="{base_url}mequipe">
				        					<div class="tarja text-center padding-menu">
				        						<span>Jery</span>
				        					</div>
				        					<img src="{base_url}assets/img/everybodyisjery.png" class="img-responsive">
				        				</a>
				        			</li>
				        		</ul>
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
    </body>