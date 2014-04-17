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
    			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fotos lista-fotos">
			    	<h3 class="tabs padding-menu"><a href="javascript:void(0);" title="Fotos">Fotos</a></h3>
			        <div class="subcontainer">
			        	<div class="row">
			        		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			        			<h4><strong>29/12/2013</strong></h4>
			        			<h1>Sertanejo bom é sertanejo morto</h1>
			        			<span class="contexto">
			        				Fotos: <span id="qtPhotos"></span> | Fotografia:
			        			</span>
			        			<hr>
			        			<div id="shares">
									<div class="addthis_toolbox addthis_default_style ">
										<div class="addthis_toolbox addthis_default_style">
											<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
											<a class="addthis_button_tweet"></a>
											<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
										</div>
									</div>
			        			</div>
				        		<ul class="list-inline">
				        			<li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				        				<a href="{base_url}verfoto" title="Cantor" data-gallery>
				        					<img src="{base_url}assets/img/cantormalok.png" class="img-responsive" alt="Cantor">
				        					<div class="retangulo-conteudo padding-menu">
				        						<span>1</span>
				        					</div>
				        				</a>
				        			</li>
				        			<li class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				        				<a href="{base_url}verfoto" title="Cantor" data-gallery>
				        					<img src="{base_url}assets/img/mocinhas.png" class="img-responsive" alt="Cantor">
				        					<div class="retangulo-conteudo padding-menu">
				        						<span>2</span>
				        					</div>
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
    	<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-521f46ce34b9465b"></script>
		<script>
			$('#qtPhotos').text($('.lista-fotos li img').length);
		</script>
    </body>