<!DOCTYPE html>
<html>
<head>
	<center>
		<div class="head-cetak" >    
			<div id="logo">
				<img src="<?php echo base_url('assets/img/logo.png') ?>"/>
			</div>
			<div id="head-cetak-logo">
				<div style="font-size: 19px; font-weight: bold;"> AMIKOM COMPUTER CLUB(AMCC)</br></dir>
					<div style="font-size: 24px;  font-weight: bold;">UNIVERSITAS AMIKOM YOGYAKARTA</br></div>
					<div style="font-size: 13px"> Sekretariat : Jl. Ringroad Utara, Condong Catur, Depok, Sleman, Yogyakarta </br></div>
					<div style="font-size: 13px">   Telp (0274)884201 ext 612 Email: amcc@amikom.ac.id Web : www.amcc.or.id<br></div>
				</div>
			</br>
			<hr width="100%" color="#00BFFF">
		</div>    
	</center> 
	<link rel="stylesheet" type="text/css" href="screen.css" media="screen, print" />
	<link rel="stylesheet" type="text/css" href="print.css" media="print" />
	<title>AMCC</title>
</head>
<style type="text/css" >
.head-cetak{
	width: 90%;
	text-align: left;
	height:80px;
	padding-top: 0px;
	padding-bottom: 30px;
}
#head-cetak-logo{
	height: 80px;
	padding-top: 0px;
	text-align: center;
}
#logo{
	height: 90%;
	padding-left: 60px;
	float: left;
	width: 40px;
}
table {
	border-collapse: collapse;
	width: 100%;
	font-size: 9pt;
}

table, th, td {
	border: 2px solid black;

}
th, td {
	padding: 3px;
}
hr { 
	display: block;
	margin-top: 0.5em;
	color :blue;
	margin-bottom: 0.5em;
	margin-left: auto;
	margin-right: auto;
	border-style: inset;
	border-width: 2px;
} 

@media print {
	* {
		-webkit-print-color-adjust: exact !important; /*Chrome, Safari */
		color-adjust: exact !important;  /*Firefox*/
	}
	body{
		margin-bottom: 50mm !important;
		background: url(assets/img/back1.png)   !important;
	background-size: 100% !important;
	background-repeat:repeat-y;
	background-position: right top;
	background-attachment:fixed;
	}
}
@page {
    margin-top: 1cm;
    margin-left:  0cm;
    margin-right:  0cm;
    margin-bottom: 4cm;
 }

body{
	/*background: url(assets/img/back.png)   !important;*/
	/*background-size: 100% !important;
	background-repeat:no-repeat;
	background-position: right top;
	background-attachment:fixed;*/
}
.column {
	float: left;
	width: 50%;
	/*padding: 10px;*/
	/*height: 30px; */
	/* Should be removed. Only for demonstration */
}

.row:after {
	content: "";
	display: table;
	clear: both;
}

</style>
<body>

	
	


	<br>
	<h2 style="text-align: center;">TRANSAKSI UMUM</h2>
	<br>
	<div  style="padding-left: 40px;padding-right:  30px; height: 500px">

		<table >
			<thead style="background: dodgerblue; text-align: center; ">
				<tr>
					<th style="background: dodgerblue; text-align: center;">NO</th>
					<th style="background: dodgerblue; text-align: center;">TANGGAL</th>
					<th style="background: dodgerblue; text-align: center;">NAMA TRANSAKSI</th>
					<th style="background: dodgerblue; text-align: center;">JENIS</th>
					<th style="background: dodgerblue; text-align: center;">NAMA SIE</th>
					<th style="background: dodgerblue; text-align: center;">BANYAK</th>
					<th style="background: dodgerblue; text-align: center;">HARGA SATUAN</th>
					<th style="background: dodgerblue; text-align: center;">JUMLAH</th>
					<th style="background: dodgerblue; text-align: center;">SALDO</th>
				</tr>
			</thead>
			<?php
			$no=0;
			foreach ($sql as $nota) {
				$no++;
				$jumlah=$nota->harga_satuan*$nota->banyak;
				?>
				<tbody>
					<tr>
						<td align="center"><?php echo $no ?> </td>
						<td align="center"><?php echo $nota->tanggal  ?> </td>
						<td><?php echo $nota->nama_transaksi ?> </td>
						<td><?php echo $nota->jenis ?> </td>
						<td><?php echo $nota->nama_sie ?> </td>
						<td align="center"><?php echo $nota->banyak ?> </td>
						<td align="right">Rp <?php echo  number_format($nota->harga_satuan,2,',','.') ?></td>
						<td align="right">Rp <?php  echo  number_format($jumlah,2,',','.') ?> </td>
						<td align="right">Rp <?php echo  number_format($nota->saldo,2,',','.') ?> </td>

					</tr>
				</tbody>
				<?php

			}
			?>
		</table>
		<br>
		<br>
		<?php 
		foreach ($ketua as $ket) {
			$nama_ketua=$ket->nama;
			$nim_ketua=$ket->nim;
		}
		?>
		<?php 
		foreach ($admin as $ad) {
			$nama_admin=$ad->nama;
			$nim_admin=$ad->nim;
		}
		?>
		<div class="row">
			<div class="col-md-6">
				<div align="center" class="column" >
					<br>
					<br>
					<p>Ketua AMCC,</p>
					<br>
					<br>
					<br>
					<u><?php echo $nama_ketua; ?></u><br>
					<a><?php echo $nim_ketua; ?></a>
				</div>
			</div>
			<div class="col-md-6">
				<div align="center" class="column" >
					<p>Yogyakarta, <?php echo date("d-m-Y"); ?></p>
					<p>Bendahara AMCC,</p>
					<br>
					<br>
					<br>
					<u><?php echo $nama_admin; ?></u><br>
					<a><?php echo $nim_admin; ?></a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>