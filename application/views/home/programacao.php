<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    

    <?php $this->load->view('shared/cabecalho'); ?>

    <body>
    	<?php  $this->load->view('shared/headeri'); ?>

    	<div class="container">
    		<div class="row">
    			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			    	<h3 class="tabs padding-menu"><a href="javascript:void(0);" title="Programação">Programação</a></h3>
			        <div class="subcontainer programacao">
			        	<ul class="list-inline list-unstyled">
			        		<li>
			        			<a href="#" class="active padding-menu">SEG</a>
			        			<span class="tabs padding-menu">HOJE</span>
			        		</li>
			        		<li><a href="#">TER</a></li>
			        		<li><a href="#">QUA</a></li>
			        		<li><a href="#">QUI</a></li>
			        		<li><a href="#">SEX</a></li>
			        		<li><a href="#">SAB</a></li>
			        		<li><a href="#">DOM</a></li>
			        	</ul>
			        </div>
		        	<div class="grid-programacao">
		        		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		        			<div class="row">
		        				<div class="grid-group noAr" id="0">
				        			<a href="#0">
					        			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-4">
					        				<span class="horario padding-menu">00h00</span>
					        			</div>
					        			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
					        				<span class="horario padding-menu horario-info">Programação</span>
					        			</div>
					        			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
					        				<span class="horario padding-menu horario-info noAr text-center">NO AR</span>
					        			</div>
					        		</a>
				        			<div class="clearfix"></div>
				        		</div>
				        		<div class="grid-group">
				        			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-4">
				        				<span class="horario padding-menu">02h00</span>
				        			</div>
				        			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
				        				<span class="horario horario-info padding-menu">Moshe Pai</span>
				        			</div>
				        			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				        				
				        			</div>
				        			<div class="clearfix"></div>
				        		</div>
				        		<div class="grid-group">
				        			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-4">
				        				<span class="horario padding-menu">04h00</span>
				        			</div>
				        			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
				        				<span class="horario horario-info padding-menu">Moshe Filho</span>
				        			</div>
				        			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				        				
				        			</div>
				        			<div class="clearfix"></div>
				        		</div>
				        		<div class="grid-group">
				        			<div class="col-lg-1 col-md-1 col-sm-1 col-xs-4">
				        				<span class="horario padding-menu">06h00</span>
				        			</div>
				        			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
				        				<span class="horario horario-info padding-menu">Moshe Pai & Filho</span>
				        			</div>
				        			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
				        				
				        			</div>
				        			<div class="clearfix"></div>
				        		</div>
			        		</div>
		        		</div>
		        	</div>
			    </div>
		    </div>
        </div>
    	<?php $this->load->view('shared/footeri'); ?>
    </body>