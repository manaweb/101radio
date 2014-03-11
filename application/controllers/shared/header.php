	<?php
		if (strpos($_SERVER['REQUEST_URI'],'login') === false) {
			if ($this->session->userdata('log_in') === false) {
				$this->session->set_userdata('redirect',$_SERVER['REQUEST_URI']);
				redirect('painel/login');
			}else {
				if ($this->session->userdata('menu_avatar') == NULL) {
					$tavatar_path = "assets/img/avatar/";
					if (file_exists($avatar_path.'thumb/'.$avatar)) {
						$this->session->set_userdata('menu_avatar','<li>
		                <li><a href="#" class="text-center"><img src="'.$base_url.$avatar_path.'thumb/'.$avatar.'"></a></li>');
		            }else {
						$this->session->set_userdata('menu_avatar','<li>
		                  <div class="panel panel-info text-center">
		                    <div class="panel-heading">SEM FOTO</div>
		                  </div>
		                </li>
		                <li><a href="#" class="text-center"><img src="'.$base_url.$avatar_path.'user.png'.'"></a></li>');
					}
				}
				if ($this->session->userdata('redirect') != NULL) {
					$redirect = $this->session->userdata('redirect');
					$this->session->unset_userdata('redirect');
					redirect($base_url.$redirect);
				}
			}
		}
	?>

	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <meta name="description" content="">
	    <meta name="author" content="">
	
	    <title>{pageTitle}</title>
	
		<link rel="shortcut icon" href="{base_url}assets/img/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="{base_url}assets/img/apple-touch-icon.png" />
        <link rel="apple-touch-icon" sizes="57x57" href="{base_url}assets/img/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon" sizes="72x72" href="{base_url}assets/img/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon" sizes="76x76" href="{base_url}assets/img/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon" sizes="114x114" href="{base_url}assets/img/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon" sizes="120x120" href="{base_url}assets/img/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon" sizes="144x144" href="{base_url}assets/img/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon" sizes="152x152" href="{base_url}assets/img/apple-touch-icon-152x152.png" />
	    <!-- Bootstrap core CSS -->
	    <link href="{base_url}assets/css/bootstrap.css" rel="stylesheet">
	
	    <!-- Add custom CSS here -->
	    <link href="{base_url}assets/css/sb-admin.css" rel="stylesheet">
	    <link rel="stylesheet" href="{base_url}assets/font-awesome/css/font-awesome.min.css">
	</head>