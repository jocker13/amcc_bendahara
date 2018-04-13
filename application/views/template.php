	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	?><!DOCTYPE html>
	<html>
	<?php
	if (isset($this->session->userdata['logged_in'])) {
		$nim = ($this->session->userdata['logged_in']['nim']);
		$nama = ($this->session->userdata['logged_in']['nama']);
		$email = ($this->session->userdata['logged_in']['email']);
		$level = ($this->session->userdata['logged_in']['level']);
	} else {
	header("location: login");
	}
	?>
	<head>
		<link rel="icon" href="<?=base_url('assets/img/amcc.png');?>" type="image/gif">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>AMCC - Dashboard</title>
		<link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/font-awesome.min.css')?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/datepicker3.css')?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/styles.css')?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/js/lumino.glyphs')?>" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css')?>">

		<script src="js/lumino.glyphs.js"></script>
		<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
		</head>
	<body>
		<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span></button>
						<a class="navbar-brand" href="<?php echo base_url('/Home') ?>"><span>Keuangan</span>AMCC</a>
						<ul class="nav navbar-top-links navbar-right">
							<li><a href="<?php echo base_url('/help') ?>"><img src="<?php echo base_url('assets/img/icons8-ask-question-48.png') ?>" ></a></li>
							<!-- <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="<?php echo base_url('/user') ?>">
								<em class="glyphicon glyphicon-question-sign"></em><li>
							</a>
						</li> -->
						
							</ul>
						</div>
					</div><!-- /.container-fluid -->
				</nav>
				<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
					<div class="profile-sidebar">
						<div class="profile-userpic">
							<img src="<?php echo base_url('assets/img/amcc1.png') ?>" class="img-responsive" alt="">
						</div>
						<div class="profile-usertitle">
							<div class="profile-usertitle-name"><?php echo $nama;  ?></div>
							<div class="profile-usertitle-status"><span class="indicator label-success"></span><?php echo $nim;  ?></div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="divider"></div>

					<ul class="nav menu">

						<?php if($level == 'admin'): ?>
							<li><a href="<?php echo base_url('/user') ?>"><img src="<?php echo base_url('assets/img/users.png') ?>" >&nbsp; Pengguna</a></li>
						<?php endif; ?>
						<?php if($level == 'admin' || $level == 'users'): ?>
							<li><a href="<?php echo base_url('/kegiatan') ?>"><img src="<?php echo base_url('assets/img/list.png') ?>">&nbsp; Kegiatan</a></li>
						<?php endif; ?>
						<?php if($level == 'admin' || $level == 'users'): ?>
							<li><a href="<?php echo base_url('/estimasi') ?>"><img src="<?php echo base_url('assets/img/currency.png') ?>">&nbsp; Estimasi</a></li>
						<?php endif; ?>

						<?php if($level == 'admin' || $level == 'users'): ?>
							<li><a href="<?php echo base_url('/realisasi') ?>"><img src="<?php echo base_url('assets/img/coins.png') ?>">&nbsp; Realisasi</a></li>
						<?php endif; ?>
						<?php if($level == 'admin'): ?>
							<li><a href="<?php echo base_url('/transaksiumum') ?>"><img src="<?php echo base_url('assets/img/money-bag.png') ?>">&nbsp; Transaksi Umum</a></li>
						<?php endif; ?>
						<?php if($level == 'admin' || $level == 'users'): ?>
							<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
							<img src="<?php echo base_url('assets/img/check.png') ?>"> Lampiran Nota <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
							</a>
							<ul class="children collapse" id="sub-item-1">
								<li><a class="" href="<?php echo base_url('/nota') ?>">
									<span class="fa fa-arrow-right">&nbsp;</span> Nota Kegiatan
								</a></li>
								<li><a class="" href=" <?php echo base_url('/notabaru') ?>">
									<span class="fa fa-arrow-right">&nbsp;</span> Nota Baru
								</a></li>
							</ul>
						<?php endif; ?>
						<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
							<img src="<?php echo base_url('assets/img/invoice.png') ?>"> Laporan<span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
						</a>
						<ul class="children collapse" id="sub-item-2">
							<li><a class="" href="<?php echo base_url('/laporanestimasi') ?>">
								<span class="fa fa-arrow-right">&nbsp;</span> Estimasi
							</a></li>
							<li><a class="" href=" <?php echo base_url('/laporanrealisasi') ?>">
								<span class="fa fa-arrow-right">&nbsp;</span> Realisasi
							</a></li>
							<?php if($level == 'admin' || $level == 'ketua'): ?>
								<li><a class="" href="<?php echo base_url('/laporantransaksi') ?>">
									<span class="fa fa-arrow-right">&nbsp;</span> Transaksi Umum
								</a></li>
							<?php endif; ?>
						</ul>
					<li><a href="javascript:if(confirm('Apakah anda ingin logout?')){document.location='<?php echo base_url();?>login/logout';}"><img src="<?php echo base_url('assets/img/close-circular-button-of-a-cross.png') ?>" > Logout</a></li>
				</ul>
			</div>

			<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
				<?php $this->load->view($container)?>
			</div>
			<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js')?>"></script>
			<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
			<script src="<?php echo base_url('assets/js/chart.min.js')?>"></script>
			<script src="<?php echo base_url('assets/js/chart-data.js')?>"></script>
			<script src="<?php echo base_url('assets/js/easypiechart.js')?>"></script>
			<script src="<?php echo base_url('assets/js/easypiechart-data.js')?>"></script>
			<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js')?>"></script>
			<script src="<?php echo base_url('assets/js/custom.js')?>"></script>

			<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/datatables.js')?>"></script>
			<script type="text/javascript" charset="utf8" src="<?php echo base_url('js/kegiatan.js')?>"></script>
			<script type="text/javascript" charset="utf8" src="<?php echo base_url('js/user.js')?>"></script>
			<script type="text/javascript" charset="utf8" src="<?php echo base_url('js/notakegiatan.js')?>"></script>
			<script type="text/javascript" charset="utf8" src="<?php echo base_url('js/notabaru.js')?>"></script>
			<script type="text/javascript" charset="utf8" src="<?php echo base_url('js/estimasi.js')?>"></script>
			<script type="text/javascript" charset="utf8" src="<?php echo base_url('js/realisasi.js')?>"></script>
			<script type="text/javascript" charset="utf8" src="<?php echo base_url('js/transaksiumum.js')?>"></script>
			<script type="text/javascript" charset="utf8" src="<?php echo base_url('js/laporanestimasi.js')?>"></script>
			<script type="text/javascript" charset="utf8" src="<?php echo base_url('js/laporanrealisasi.js')?>"></script>



	<script type="text/javascript">
		    var myJson;
	  
	         $.getJSON("dashboard/loadData", function(json){
	            chartData = json;
	            console.log(myJson);
	        });

	    

	// var save_method; //for save method string
	// var table;
	// var pengguna;
	// var notabaru;
	// var estimasi;
	// var transaksiumum;
	// var tabel_laporan_tran;
	// var notakegiatan;
	// var dataestimasi;
	// var realisasi;


	$('#notifications').slideDown('slow').delay(1000).slideUp('slow');
	$('#tambah').on('click', function() {
		var data = $("#id_kegiatan").val();
		console.log(data);
		$("#model-kegiatan").val(data);

	});

		// console.log(id_kegiatan);



	</script>


		</body>
		</html>
