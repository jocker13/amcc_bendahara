

<html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>AMCC - Login</title>
<link rel="icon" href="<?=base_url('assets/img/amcc.png');?>" type="image/gif">
<link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/datepicker3.css')?>" rel="stylesheet">
<link href="<?php echo base_url('assets/css/styles.css')?>" rel="stylesheet">
<?php
if (isset($this->session->userdata['logged_in'])) {

	header("location: http://localhost/bendahara/login/user_login_process");
}
?>
<head>
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body style="filter: alpha; background-size: auto; height: 100%; width: 100%; background-repeat: no-repeat; background-position: center; "  >

	<div class="row">
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<!-- <img style="opacity: 0.5; filter: alpha; background-size:100%; margin: auto; width: 50%; height: 50%;" src="<?php  echo base_url('assets/img/amcc1.png');?>"> -->
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<?php
			if (isset($logout_message)) {
				echo "<div class='message'>";
				echo $logout_message;
				echo "</div>";
			}
			?>
			<?php
			if (isset($message_display)) {
				echo "<div class='message'>";
				echo $message_display;
				echo "</div>";
			}
			?>
			<div class="login-panel panel panel-default">

				<div class="panel-heading">Log in</div>
				<div class="panel-body">
					<?php echo form_open('login/user_login_process'); ?>
					<?php
					echo "<div class='error_msg'>";
					if (isset($error_message)) {
						echo $error_message;
					}
					echo validation_errors();
					echo "</div>";
					?>
					<div class="form-group">
						<input class="form-control" placeholder="NIM" name="nim" id="nim" type="text" autofocus="">
					</div>
					<div class="form-group">
						<input class="form-control" placeholder="password" name="password" id="password" type="password" value="">
					</div>
					<div class="form-group" align="right">
						<input  type="submit" value=" Login " name="submit" class="btn btn-primary" /><br />
						<!-- <a href="<?php echo base_url() ?>index.php/user_authentication/user_registration_show">To SignUp Click Here</a> -->
						<!-- <?php echo form_close(); ?> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

