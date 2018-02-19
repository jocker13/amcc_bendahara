<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AMCC - Login</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/datepicker3.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/styles.css')?>" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<form method="post" onsubmit="cekform()" role="form">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="username" name="username" id="username" type="email" autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="password" name="password" id="password" type="password" value="">
							</div>
							<a type="submit" class="btn btn-primary">Login</a>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->
	<script type="text/javascript">
			function cekform(){
				alert("asdasdada");
				// if(!$("#username").val())
				// {
				// 	alert('username tidak boleh kosong');
				// 	$("#username").focus;
				// 	return false;
				// }
			}
	</script>

<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
</body>
</html>
