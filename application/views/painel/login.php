<!DOCTYPE>
<html>
	<?php
		if ($this->session->userdata('log_in') != NULL)
			redirect('painel/');
		else
			$this->load->view('shared/header');
	?>
	
	<body>
		<div class="section">
			<div class="container" style="max-width: 470px;">
				<div class="row">
					<div class="alert alert-success alert-dismissable" style="display: none">
					  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					  <span></span>
					</div>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Login</h3>
						</div>
						<div class="panel-body">
							<form class="form-horizontal" method="POST" id="login-painel">
								<div class="form-group">
									<label for="txtUser" class="col-sm-2 control-label">Usu&aacute;rio:</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="txtUser" name="txtUser" maxlength="32" required>
									</div>
								</div>
								<div class="form-group">
									<label for="txtPassword" class="col-sm-2 control-label">Senha:</label>
									<div class="col-sm-10">
										<input type="password" class="form-control" id="txtPassword" name="txtPassword" maxlength="88" required>
									</div>
								</div>
								<input type="hidden" name="url" id="url" value="{base_url}" />
								<button class="btn btn-primary btn-md pull-right">Logar</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php $this->load->view('shared/footer'); ?>
		<script>
			$(function() {
				$('#login-painel').submit(function() {
					var parent = this;
					$.ajax({
						url: 'autenticar',
						dataType: 'json',
						type: 'POST',
						data: $(this).serialize(),
						beforeSend: function() {
							if ($('.alert').attr('class').indexOf('danger') < 0)
								$('.btn-primary',parent).attr('disabled','disabled'	).text('Autenticando');
						},
						success: function(data) {
							var auth = data;
							if (auth.rAuth === false) {
								$('.btn-primary',parent).removeAttr('disabled').text('Logar');
								$('.alert span').text('Usuário e/ou senha inválidos');
								$('.alert').removeClass('alert-success').addClass('alert-danger').fadeIn('slow');
							}else {
								$('.btn-primary',parent).text('Redirecionando');
								$('.alert span').text('Autenticação confirmada, aguarde...');
								$('.alert').removeClass('alert-danger').addClass('alert-success').fadeIn('slow');
								window.location = 'home';
							}
						}
					});
					return false;
				});
			});
		</script>
	</body>
</html>