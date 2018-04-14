<!DOCTYPE html>
<html>
<head>
	
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
		margin-bottom: 4cm !important;
		/*	background: url(assets/img/back1.png)   !important;*/
		background-size: 100% !important;
		background-repeat:repeat-y;
		background-position: right top;
		background-attachment:fixed;
		height: 100%;
		width: 100%;

	}
}
@page {
	size: landscape;
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
table.table-container,.table-container>thead>tr>td, .table-container>tbody>tr>td {
	border: none !important;
}
</style>
<?php 
$nama_kegiatan='';
$nim='';
$nama='';
foreach ($kegiatan as $value) {
	$nama_kegiatan = $value->nama_kegiatan;
	$nim = $value->nim;
	$nama = $value->nama;
}
?>	
<body>
	<table class="table-container">
		<thead>
			<tr>
				<td style="width: 100vw;">
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
				</td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>
					<h4 style="text-align: center;">REALISASI DANA</h4>
					<H4 style="text-align: center;"><?php echo strtoupper($nama_kegiatan)?></H4>
					<br>
					<div  style="padding-left: 40px;padding-right:  30px; height: 500px">
						<h5><u>PEMASUKAN</u></h5>
						<table >
							<thead>
								<tr>
									<th rowspan="2" style="background: dodgerblue; text-align: center; width:40%;">SUMBER DANA</th>
									<th colspan="3" style="background: dodgerblue; text-align: center;">ESTIMASI</th>			
									<th colspan="3" style="background: dodgerblue; text-align: center;">REALISASI</th>			
								</tr>
							</thead>

							<thead>
								<tr>
									<th style="background: dodgerblue; text-align: center;"></th>
									<th style="background: dodgerblue; text-align: center;">BANYAK</th>
									<th style="background: dodgerblue; text-align: center;">HARGA SATUAN</th>
									<th style="background: dodgerblue; text-align: center;">JUMLAH</th>
									<th style="background: dodgerblue; text-align: center;">BANYAK</th>
									<th style="background: dodgerblue; text-align: center;">HARGA SATUAN</th>
									<th style="background: dodgerblue; text-align: center;">JUMLAH</th>
								</tr>
							</thead>
							<?php
							$no=0;
							$jumlah=0;
							$sub_total=0;
							foreach ($sql as $estimasi) {
								$no++;
								$jumlah=$estimasi->banyak*$estimasi->harga_satuan;
								?>

								<tbody>
									<tr>
										<td align="left"><?php echo $estimasi->nama_estimasi  ?> </td>
										<td align="center"><?php echo $estimasi->banyak ?> </td>
										<td align="right">Rp <?php echo  number_format($estimasi->harga_satuan,2,',','.')?></td>
										<td align="right">Rp <?php echo  number_format($jumlah,2,',','.') ?> </td>
										<td></td>
										<td></td>
										<td></td>

									</tr>
									<?php
									$sub_total +=$estimasi->total;
								}
								?>
								<?php
								$no=0;
								$jumlah=0;
								$sub_total_realisasiSumberDana=0;
								foreach ($sqlRealisasiSumberDana as $realisasi) {
									$no++;
									$jumlah=$realisasi->banyak*$realisasi->harga_satuan;
									?>	
									<tr>
										<td align="left"><?php echo $realisasi->nama_realisasi  ?> </td>
										<td></td>
										<td></td>
										<td></td>
										<td align="center"><?php echo $realisasi->banyak ?> </td>
										<td align="right">Rp <?php echo  number_format($realisasi->harga_satuan,2,',','.')?></td>
										<td align="right">Rp <?php echo  number_format($jumlah,2,',','.') ?> </td>

									</tr>
									<?php
									$sub_total_realisasiSumberDana +=$realisasi->total;
								}
								?>
								<tr>
									<td style="background: dodgerblue; text-align: center;"; ><b>Sub Total</b></td>
									<td style="background: dodgerblue;"></td>
									<td style="background: dodgerblue;"></td>
									<td style="text-align: right; background: dodgerblue;"><b>Rp <?php echo  number_format($sub_total,2,',','.')?></b></td>
									<td style="text-align: center; background: dodgerblue;"></td>
									<td style="text-align: center; background: dodgerblue;"></td>
									<td style="text-align: center; background: dodgerblue;"><b>Rp <?php echo  number_format($sub_total_realisasiSumberDana,2,',','.')?></b></td>
								</tr>
							</tbody>
						</table>


						<h5><u>PENGELUARAN</u></h5>
						<table >
							<thead>
								<tr>
									<th rowspan="2" style="background: dodgerblue; text-align: center; width:40%;">KESEKRETARIATAN</th>
									<th colspan="3" style="background: dodgerblue; text-align: center;">ESTIMASI</th>			
									<th colspan="3" style="background: dodgerblue; text-align: center;">REALISASI</th>	
									<th rowspan="2" style="background: dodgerblue; text-align: center;">NO NOTA</th>		
								</tr>
							</thead>
							<thead>
								<tr>
									<th style="background: dodgerblue; text-align: center;"></th>
									<th style="background: dodgerblue; text-align: center;">BANYAK</th>
									<th style="background: dodgerblue; text-align: center;">HARGA SATUAN</th>
									<th style="background: dodgerblue; text-align: center;">JUMLAH</th>
									<th style="background: dodgerblue; text-align: center;">BANYAK</th>
									<th style="background: dodgerblue; text-align: center;">HARGA SATUAN</th>
									<th style="background: dodgerblue; text-align: center;">JUMLAH</th>
									<th style="background: dodgerblue; text-align: center;"></th>
								</tr>
							</thead>
							<?php
							$no=0;
							$jumlah=0;
							$sub_total_kesekretariatan=0;
							foreach ($sqlkesekretariatan as $estimasi) {
								$no++;
								$jumlah=$estimasi->banyak*$estimasi->harga_satuan;
								?>
								<tbody>
										<tr>
											<td align="left"><?php echo $estimasi->nama_estimasi  ?> </td>
											<td align="center"><?php echo $estimasi->banyak ?> </td>
											<td align="right">Rp <?php echo  number_format($estimasi->harga_satuan,2,',','.')?></td>
											<td align="right">Rp <?php echo  number_format($jumlah,2,',','.') ?> </td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>

										</tr>
										<?php
										$sub_total_kesekretariatan +=$estimasi->total;
									}
									?>
								<?php
								$no=0;
								$jumlah=0;
								$sub_total_realisasikesekretariatan=0;
								foreach ($sqlRealisasiKesekretariatan as $realisasi) {
									$no++;
									$jumlah=$realisasi->banyak*$realisasi->harga_satuan;
									?>
									<tr>
										<td align="left"><?php echo $realisasi->nama_realisasi  ?> </td>
										<td></td>
										<td></td>
										<td></td>
										<td align="center"><?php echo $realisasi->banyak ?> </td>
										<td align="right">Rp <?php echo  number_format($realisasi->harga_satuan,2,',','.')?></td>
										<td align="right">Rp <?php echo  number_format($jumlah,2,',','.') ?> </td>
										<td align="center"><?php echo $realisasi->no_nota ?> </td>
										
									</tr>
									<?php
									$sub_total_realisasikesekretariatan +=$realisasi->total;
								}
								?>

								<tr>
									<td style="background: dodgerblue; text-align: center;"; ><b>Sub Total</b></td>
									<td style="background: dodgerblue;"></td>
									<td style="background: dodgerblue;"></td>
									<td style="text-align: right; background: dodgerblue;""><b>Rp <?php echo  number_format($sub_total_kesekretariatan,2,',','.')?></b></td>
									<td style="text-align: center; background: dodgerblue;"></td>
									<td style="text-align: center; background: dodgerblue;"></td>
									<td style="text-align: center; background: dodgerblue;"><b>Rp <?php echo  number_format($sub_total_realisasikesekretariatan,2,',','.')?></b></td>
									<td style="text-align: center; background: dodgerblue;"></td>
								</tr>
							</tbody>
						</table>
						<br>

						<table >
							<thead>
								<tr>
									<th rowspan="2" style="background: dodgerblue; text-align: center; width:40%;">KONSUMSI</th>
									<th colspan="3" style="background: dodgerblue; text-align: center;">ESTIMASI</th>			
									<th colspan="3" style="background: dodgerblue; text-align: center;">REALISASI</th>	
									<th rowspan="2" style="background: dodgerblue; text-align: center;">NO NOTA</th>		
								</tr>
							</thead>
							<thead>
								<tr>
									<th style="background: dodgerblue; text-align: center;"></th>
									<th style="background: dodgerblue; text-align: center;">BANYAK</th>
									<th style="background: dodgerblue; text-align: center;">HARGA SATUAN</th>
									<th style="background: dodgerblue; text-align: center;">JUMLAH</th>
									<th style="background: dodgerblue; text-align: center;">BANYAK</th>
									<th style="background: dodgerblue; text-align: center;">HARGA SATUAN</th>
									<th style="background: dodgerblue; text-align: center;">JUMLAH</th>
									<th style="background: dodgerblue; text-align: center;"></th>
								</tr>
							</thead>

							<?php
							$no=0;
							$jumlah=0;
							$sub_total_konsumsi=0;
							foreach ($sqlkonsumsi as $estimasi) {
								$no++;
								$jumlah=$estimasi->banyak*$estimasi->harga_satuan;
								?>
								<tbody>
									<tr>
										<td align="left"><?php echo $estimasi->nama_estimasi  ?> </td>
										<td align="center"><?php echo $estimasi->banyak ?> </td>
										<td align="right">Rp <?php echo  number_format($estimasi->harga_satuan,2,',','.')?></td>
										<td align="right">Rp <?php echo  number_format($jumlah,2,',','.') ?> </td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>


									</tr>
									<?php
									$sub_total_konsumsi +=$estimasi->total;
								}
								?>
								
								<?php
								$no=0;
								$jumlah=0;
								$sub_total_realisasikonsumsi=0;
								foreach ($sqlRealisasiKonsumsi as $realisasi) {
									$no++;
									$jumlah=$realisasi->banyak*$realisasi->harga_satuan;
									?>
									<tr>
										<td align="left"><?php echo $realisasi->nama_realisasi  ?> </td>
										<td></td>
										<td></td>
										<td></td>
										<td align="center"><?php echo $realisasi->banyak ?> </td>
										<td align="right">Rp <?php echo  number_format($realisasi->harga_satuan,2,',','.')?></td>
										<td align="right">Rp <?php echo  number_format($jumlah,2,',','.') ?> </td>
										<td align="center"><?php echo $realisasi->no_nota ?> </td>
										
									</tr>
									<?php
									$sub_total_realisasikonsumsi +=$realisasi->total;
								}
								?>
								<tr>
									<td style="background: dodgerblue; text-align: center;"; ><b>Sub Total</b></td>
									<td style="background: dodgerblue;"></td>
									<td style="background: dodgerblue;"></td>
									<td style="text-align: right; background: dodgerblue;""><b>Rp <?php echo  number_format($sub_total_konsumsi,2,',','.')?></b></td>
									<td style="text-align: center; background: dodgerblue;"></td>
									<td style="text-align: center; background: dodgerblue;"></td>
									<td style="text-align: center; background: dodgerblue;"><b>Rp <?php echo  number_format($sub_total_realisasikonsumsi,2,',','.')?></b></td>
									<td style="text-align: center; background: dodgerblue;"></td>
								</tr>
							</tbody>
						</table>
						<br>

						<table >
							<thead>
								<tr>
									<th rowspan="2" style="background: dodgerblue; text-align: center; width:40%;">ACARA</th>
									<th colspan="3" style="background: dodgerblue; text-align: center;">ESTIMASI</th>			
									<th colspan="3" style="background: dodgerblue; text-align: center;">REALISASI</th>	
									<th rowspan="2" style="background: dodgerblue; text-align: center;">NO NOTA</th>		
								</tr>
							</thead>
							<thead>
								<tr>
									<th style="background: dodgerblue; text-align: center;"></th>
									<th style="background: dodgerblue; text-align: center;">BANYAK</th>
									<th style="background: dodgerblue; text-align: center;">HARGA SATUAN</th>
									<th style="background: dodgerblue; text-align: center;">JUMLAH</th>
									<th style="background: dodgerblue; text-align: center;">BANYAK</th>
									<th style="background: dodgerblue; text-align: center;">HARGA SATUAN</th>
									<th style="background: dodgerblue; text-align: center;">JUMLAH</th>
									<th style="background: dodgerblue; text-align: center;"></th>
								</tr>
							</thead>

							<?php
							$no=0;
							$jumlah=0;
							$sub_total_acara=0;
							foreach ($sqlacara as $estimasi) {
								$no++;
								$jumlah=$estimasi->banyak*$estimasi->harga_satuan;
								?>
								<tbody>
									<tr>
										<td align="left"><?php echo $estimasi->nama_estimasi  ?> </td>
										<td align="center"><?php echo $estimasi->banyak ?> </td>
										<td align="right">Rp <?php echo  number_format($estimasi->harga_satuan,2,',','.')?></td>
										<td align="right">Rp <?php echo  number_format($jumlah,2,',','.') ?> </td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>


									</tr>
									<?php
									$sub_total_acara +=$estimasi->total;
								}
								?>

									<?php
								$no=0;
								$jumlah=0;
								$sub_total_realisasiacara=0;
								foreach ($sqlRealisasiAcara as $realisasi) {
									$no++;
									$jumlah=$realisasi->banyak*$realisasi->harga_satuan;
									?>
									<tr>
										<td align="left"><?php echo $realisasi->nama_realisasi  ?> </td>
										<td></td>
										<td></td>
										<td></td>
										<td align="center"><?php echo $realisasi->banyak ?> </td>
										<td align="right">Rp <?php echo  number_format($realisasi->harga_satuan,2,',','.')?></td>
										<td align="right">Rp <?php echo  number_format($jumlah,2,',','.') ?> </td>
										<td align="center"><?php echo $realisasi->no_nota ?> </td>
										
									</tr>
									<?php
									$sub_total_realisasiacara +=$realisasi->total;
								}
								?>
								<tr>
									<td style="background: dodgerblue; text-align: center;"; ><b>Sub Total</b></td>
									<td style="background: dodgerblue;"></td>
									<td style="background: dodgerblue;"></td>
									<td style="text-align: right; background: dodgerblue;""><b>Rp <?php echo  number_format($sub_total_acara,2,',','.')?></b></td>
									<td style="text-align: center; background: dodgerblue;"></td>
									<td style="text-align: center; background: dodgerblue;"></td>
									<td style="text-align: right; background: dodgerblue;""><b>Rp <?php echo  number_format($sub_total_realisasiacara,2,',','.')?></b></td>
									<td style="text-align: center; background: dodgerblue;"></td>
								</tr>
							</tbody>
						</table>
						<br>

						<table >
							<thead>
								<tr>
									<th rowspan="2" style="background: dodgerblue; text-align: center; width:40%;">PDD</th>
									<th colspan="3" style="background: dodgerblue; text-align: center;">ESTIMASI</th>			
									<th colspan="3" style="background: dodgerblue; text-align: center;">REALISASI</th>	
									<th rowspan="2" style="background: dodgerblue; text-align: center;">NO NOTA</th>		
								</tr>
							</thead>
							<thead>
								<tr>
									<th style="background: dodgerblue; text-align: center;"></th>
									<th style="background: dodgerblue; text-align: center;">BANYAK</th>
									<th style="background: dodgerblue; text-align: center;">HARGA SATUAN</th>
									<th style="background: dodgerblue; text-align: center;">JUMLAH</th>
									<th style="background: dodgerblue; text-align: center;">BANYAK</th>
									<th style="background: dodgerblue; text-align: center;">HARGA SATUAN</th>
									<th style="background: dodgerblue; text-align: center;">JUMLAH</th>
									<th style="background: dodgerblue; text-align: center;"></th>
								</tr>
							</thead>

							<?php
							$no=0;
							$jumlah=0;
							$sub_total_pdd=0;
							foreach ($sqlpdd as $estimasi) {
								$no++;
								$jumlah=$estimasi->banyak*$estimasi->harga_satuan;
								?>
								<tbody>
									<tr>
										<td align="left"><?php echo $estimasi->nama_estimasi  ?> </td>
										<td align="center"><?php echo $estimasi->banyak ?> </td>
										<td align="right">Rp <?php echo  number_format($estimasi->harga_satuan,2,',','.')?></td>
										<td align="right">Rp <?php echo  number_format($jumlah,2,',','.') ?> </td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>


									</tr>
									<?php
									$sub_total_pdd +=$estimasi->total;
								}
								?>

									<?php
								$no=0;
								$jumlah=0;
								$sub_total_realisasipdd=0;
								foreach ($sqlRealisasiPdd as $realisasi) {
									$no++;
									$jumlah=$realisasi->banyak*$realisasi->harga_satuan;
									?>
									<tr>
										<td align="left"><?php echo $realisasi->nama_realisasi  ?> </td>
										<td></td>
										<td></td>
										<td></td>
										<td align="center"><?php echo $realisasi->banyak ?> </td>
										<td align="right">Rp <?php echo  number_format($realisasi->harga_satuan,2,',','.')?></td>
										<td align="right">Rp <?php echo  number_format($jumlah,2,',','.') ?> </td>
										<td align="center"><?php echo $realisasi->no_nota ?> </td>
										
									</tr>
									<?php
									$sub_total_realisasipdd +=$realisasi->total;
								}
								?>
								<tr>
									<td style="background: dodgerblue; text-align: center;"; ><b>Sub Total</b></td>
									<td style="background: dodgerblue;"></td>
									<td style="background: dodgerblue;"></td>
									<td style="text-align: right; background: dodgerblue;""><b>Rp <?php echo  number_format($sub_total_pdd,2,',','.')?></b></td>
									<td style="text-align: center; background: dodgerblue;"></td>
									<td style="text-align: center; background: dodgerblue;"></td>
									<td style="text-align: right; background: dodgerblue;""><b>Rp <?php echo  number_format($sub_total_realisasipdd,2,',','.')?></b></td>
									<td style="text-align: center; background: dodgerblue;"></td>
								</tr>
							</tbody>
						</table>
						<br>
						<table >
							<thead>
								<tr>
									<th rowspan="2" style="background: dodgerblue; text-align: center; width:40%;">PERLENGKAPAN</th>
									<th colspan="3" style="background: dodgerblue; text-align: center;">ESTIMASI</th>			
									<th colspan="3" style="background: dodgerblue; text-align: center;">REALISASI</th>	
									<th rowspan="2" style="background: dodgerblue; text-align: center;">NO NOTA</th>		
								</tr>
							</thead>
							<thead>
								<tr>
									<th style="background: dodgerblue; text-align: center;"></th>
									<th style="background: dodgerblue; text-align: center;">BANYAK</th>
									<th style="background: dodgerblue; text-align: center;">HARGA SATUAN</th>
									<th style="background: dodgerblue; text-align: center;">JUMLAH</th>
									<th style="background: dodgerblue; text-align: center;">BANYAK</th>
									<th style="background: dodgerblue; text-align: center;">HARGA SATUAN</th>
									<th style="background: dodgerblue; text-align: center;">JUMLAH</th>
									<th style="background: dodgerblue; text-align: center;"></th>
								</tr>
							</thead>

							<?php
							$no=0;
							$jumlah=0;
							$sub_total_perlengkapan=0;
							foreach ($sqlperlengkapan as $estimasi) {
								$no++;
								$jumlah=$estimasi->banyak*$estimasi->harga_satuan;
								?>
								<tbody>
									<tr>
										<td align="left"><?php echo $estimasi->nama_estimasi  ?> </td>
										<td align="center"><?php echo $estimasi->banyak ?> </td>
										<td align="right">Rp <?php echo  number_format($estimasi->harga_satuan,2,',','.')?></td>
										<td align="right">Rp <?php echo  number_format($jumlah,2,',','.') ?> </td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>


									</tr>
									<?php
									$sub_total_perlengkapan +=$estimasi->total;
								}
								?>
									<?php
								$no=0;
								$jumlah=0;
								$sub_total_realisasiperlengkapan=0;
								foreach ($sqlRealisasiPerlengkapan as $realisasi) {
									$no++;
									$jumlah=$realisasi->banyak*$realisasi->harga_satuan;
									?>
									<tr>
										<td align="left"><?php echo $realisasi->nama_realisasi  ?> </td>
										<td></td>
										<td></td>
										<td></td>
										<td align="center"><?php echo $realisasi->banyak ?> </td>
										<td align="right">Rp <?php echo  number_format($realisasi->harga_satuan,2,',','.')?></td>
										<td align="right">Rp <?php echo  number_format($jumlah,2,',','.') ?> </td>
										<td align="center"><?php echo $realisasi->no_nota ?> </td>
										
									</tr>
									<?php
									$sub_total_realisasiperlengkapan +=$realisasi->total;
								}
								?>
								<tr>
									<td style="background: dodgerblue; text-align: center;"; ><b>Sub Total</b></td>
									<td style="background: dodgerblue;"></td>
									<td style="background: dodgerblue;"></td>
									<td style="text-align: right; background: dodgerblue;""><b>Rp <?php echo  number_format($sub_total_perlengkapan,2,',','.')?></b></td>
									<td style="text-align: center; background: dodgerblue;"></td>
									<td style="text-align: center; background: dodgerblue;"></td>
									<td style="text-align: right; background: dodgerblue;""><b>Rp <?php echo  number_format($sub_total_realisasiperlengkapan,2,',','.')?></b></td>
									<td style="text-align: center; background: dodgerblue;"></td>
								</tr>
							</tbody>
						</table>
						<br>

						<table >
							<thead>
								<tr>
									<th rowspan="2" style="background: dodgerblue; text-align: center; width:40%;">HUMAS</th>
									<th colspan="3" style="background: dodgerblue; text-align: center;">ESTIMASI</th>			
									<th colspan="3" style="background: dodgerblue; text-align: center;">REALISASI</th>	
									<th rowspan="2" style="background: dodgerblue; text-align: center;">NO NOTA</th>		
								</tr>
							</thead>
							<thead>
								<tr>
									<th style="background: dodgerblue; text-align: center;"></th>
									<th style="background: dodgerblue; text-align: center;">BANYAK</th>
									<th style="background: dodgerblue; text-align: center;">HARGA SATUAN</th>
									<th style="background: dodgerblue; text-align: center;">JUMLAH</th>
									<th style="background: dodgerblue; text-align: center;">BANYAK</th>
									<th style="background: dodgerblue; text-align: center;">HARGA SATUAN</th>
									<th style="background: dodgerblue; text-align: center;">JUMLAH</th>
									<th style="background: dodgerblue; text-align: center;"></th>
								</tr>
							</thead>

							<?php
							$no=0;
							$jumlah=0;
							$sub_total_humas=0;
							foreach ($sqlhumas as $estimasi) {
								$no++;
								$jumlah=$estimasi->banyak*$estimasi->harga_satuan;
								?>
								<tbody>
									<tr>
										<td align="left"><?php echo $estimasi->nama_estimasi  ?> </td>
										<td align="center"><?php echo $estimasi->banyak ?> </td>
										<td align="right">Rp <?php echo  number_format($estimasi->harga_satuan,2,',','.')?></td>
										<td align="right">Rp <?php echo  number_format($jumlah,2,',','.') ?> </td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>


									</tr>
									<?php
									$sub_total_humas +=$estimasi->total;
								}
								?>

									<?php
								$no=0;
								$jumlah=0;
								$sub_total_realisasihumas=0;
								foreach ($sqlRealisasiHumas as $realisasi) {
									$no++;
									$jumlah=$realisasi->banyak*$realisasi->harga_satuan;
									?>
									<tr>
										<td align="left"><?php echo $realisasi->nama_realisasi  ?> </td>
										<td></td>
										<td></td>
										<td></td>
										<td align="center"><?php echo $realisasi->banyak ?> </td>
										<td align="right">Rp <?php echo  number_format($realisasi->harga_satuan,2,',','.')?></td>
										<td align="right">Rp <?php echo  number_format($jumlah,2,',','.') ?> </td>
										<td align="center"><?php echo $realisasi->no_nota ?> </td>
										
									</tr>
									<?php
									$sub_total_realisasihumas +=$realisasi->total;
								}
								?>
								<tr>
									<td style="background: dodgerblue; text-align: center;"; ><b>Sub Total</b></td>
									<td style="background: dodgerblue;"></td>
									<td style="background: dodgerblue;"></td>
									<td style="text-align: right; background: dodgerblue;""><b>Rp <?php echo  number_format($sub_total_humas,2,',','.')?></b></td>
									<td style="text-align: center; background: dodgerblue;"></td>
									<td style="text-align: center; background: dodgerblue;"></td>
									<td style="text-align: right; background: dodgerblue;""><b>Rp <?php echo  number_format($sub_total_realisasihumas,2,',','.')?></b></td>
									<td style="text-align: center; background: dodgerblue;"></td>
								</tr>
							</tbody>
						</table>
						<br>

						<table >
							<thead>
								<tr>
									<th rowspan="2" style="background: dodgerblue; text-align: center; width:40%;">P3K</th>
									<th colspan="3" style="background: dodgerblue; text-align: center;">ESTIMASI</th>			
									<th colspan="3" style="background: dodgerblue; text-align: center;">REALISASI</th>	
									<th rowspan="2" style="background: dodgerblue; text-align: center;">NO NOTA</th>		
								</tr>
							</thead>
							<thead>
								<tr>
									<th style="background: dodgerblue; text-align: center;"></th>
									<th style="background: dodgerblue; text-align: center;">BANYAK</th>
									<th style="background: dodgerblue; text-align: center;">HARGA SATUAN</th>
									<th style="background: dodgerblue; text-align: center;">JUMLAH</th>
									<th style="background: dodgerblue; text-align: center;">BANYAK</th>
									<th style="background: dodgerblue; text-align: center;">HARGA SATUAN</th>
									<th style="background: dodgerblue; text-align: center;">JUMLAH</th>
									<th style="background: dodgerblue; text-align: center;"></th>
								</tr>
							</thead>

							<?php
							$no=0;
							$jumlah=0;
							$sub_total_p3k=0;
							foreach ($sqlp3k as $estimasi) {
								$no++;
								$jumlah=$estimasi->banyak*$estimasi->harga_satuan;
								?>
								<tbody>
									<tr>
										<td align="left"><?php echo $estimasi->nama_estimasi  ?> </td>
										<td align="center"><?php echo $estimasi->banyak ?> </td>
										<td align="right">Rp <?php echo  number_format($estimasi->harga_satuan,2,',','.')?></td>
										<td align="right">Rp <?php echo  number_format($jumlah,2,',','.') ?> </td>
										<td></td>
										<td></td>
										<td></td>
										<td></td>


									</tr>
									<?php
									$sub_total_p3k +=$estimasi->total;
								}
								?>

									<?php
								$no=0;
								$jumlah=0;
								$sub_total_realisasip3k=0;
								foreach ($sqlRealisasiP3k as $realisasi) {
									$no++;
									$jumlah=$realisasi->banyak*$realisasi->harga_satuan;
									?>
									<tr>
										<td align="left"><?php echo $realisasi->nama_realisasi  ?> </td>
										<td></td>
										<td></td>
										<td></td>
										<td align="center"><?php echo $realisasi->banyak ?> </td>
										<td align="right">Rp <?php echo  number_format($realisasi->harga_satuan,2,',','.')?></td>
										<td align="right">Rp <?php echo  number_format($jumlah,2,',','.') ?> </td>
										<td align="center"><?php echo $realisasi->no_nota ?> </td>
										
									</tr>
									<?php
									$sub_total_realisasip3k +=$realisasi->total;
								}
								?>
								<tr>
									<td style="background: dodgerblue; text-align: center;"; ><b>Sub Total</b></td>
									<td style="background: dodgerblue;"></td>
									<td style="background: dodgerblue;"></td>
									<td style="text-align: right; background: dodgerblue;""><b>Rp <?php echo  number_format($sub_total_p3k,2,',','.')?></b></td>
									<td style="text-align: center; background: dodgerblue;"></td>
									<td style="text-align: center; background: dodgerblue;"></td>
									<td style="text-align: right; background: dodgerblue;""><b>Rp <?php echo  number_format($sub_total_realisasip3k,2,',','.')?></b></td>
									<td style="text-align: center; background: dodgerblue;"></td>
								</tr>
							</tbody>
						</table>

						<h5>REKAPITULASI REALISASI PEMASUKAN DAN PENGELUARAN DANA</h5>
						<table>
							<thead>
								<tr>
									<th rowspan="" style="background: dodgerblue; text-align: left;">PEMASUKAN</th>
									<th colspan="" style="background: dodgerblue; text-align: center;"></th>			
									<th colspan="" style="background: dodgerblue; text-align: center;"></th>			
								</tr>
							</thead>
							<?php
							$no=0;
							$jumlah=0;
							$sub_total=0;
							foreach ($sql as $estimasi) {
								$no++;
								$jumlah=$estimasi->banyak*$estimasi->harga_satuan;
								?>

								<tbody>
									<tr>
										<td align="left"><?php echo $estimasi->nama_estimasi  ?> </td>
										<td align="right">Rp <?php echo  number_format($jumlah,2,',','.') ?> </td>
										<td></td>
									</tr>
									<?php
									$sub_total +=$estimasi->total;
								}
								?>
							</tbody>
							<thead>
								<tr>
									<th rowspan="" style="background: limegreen; text-align: center;">TOTAL PEMASUKAN</th>
									<th colspan="" style="background: limegreen; text-align: center;"></th>			
									<th colspan="" style="background: limegreen; text-align: right;"><b>Rp <?php echo  number_format($sub_total,2,',','.')?></b></th>			
								</tr>
							</thead>
							<thead>
								<tr>
									<th rowspan="" style="background: dodgerblue; text-align: left;">PENGELUARAN</th>
									<th colspan="" style="background: dodgerblue; text-align: center;"></th>			
									<th colspan="" style="background: dodgerblue; text-align: center;"></th>			
								</tr>
							</thead>
							<tbody>
								<tr>
			<td>KESEKRETARIATAN</td>
			<td align="right">Rp <?php echo  number_format($sub_total_realisasikesekretariatan,2,',','.')?></td>
			<td></td>
		</tr>
		<tr>
			<td>KONSUMSI</td>
			<td align="right">Rp <?php echo  number_format($sub_total_realisasikonsumsi,2,',','.')?></td>
			<td></td>
		</tr>
		<tbody>
		<tr>
			<td>ACARA</td>
			<td align="right">Rp <?php echo  number_format($sub_total_realisasiacara,2,',','.')?></td>
			<td></td>
		</tr>
		<tr>
			<td>PDD</td>
			<td align="right">Rp <?php echo  number_format($sub_total_realisasipdd,2,',','.')?></td>
			<td></td>
		</tr>
		<tr>
			<td>PERLENGKAPAN</td>
			<td align="right">Rp <?php echo  number_format($sub_total_realisasiperlengkapan,2,',','.')?></td>
			<td></td>
		</tr>
		<tr>
			<td>HUMAS</td>
			<td align="right">Rp <?php echo  number_format($sub_total_realisasihumas,2,',','.')?></td>
			<td></td>
		</tr>
		<tr>
			<td>P3K</td>
			<td align="right">Rp <?php echo  number_format($sub_total_realisasip3k,2,',','.')?></td>
			<td></td>
			<?php
		$total_pengeluaran = $sub_total_realisasikesekretariatan+$sub_total_realisasikonsumsi+$sub_total_realisasiacara+$sub_total_realisasipdd+$sub_total_realisasiperlengkapan+$sub_total_realisasihumas+$sub_total_realisasip3k;
	?>
		</tr>
								</tbody>
								<thead>
									<tr>
										<th rowspan="" style="background: limegreen; text-align: center;">TOTAL PENGELUARAN</th>
										<th colspan="" style="background: limegreen; text-align: right;"></th>			
										<th colspan="" style="background: limegreen; text-align: right;">Rp <?php echo  number_format($total_pengeluaran,2,',','.')?></th>		
									</tr>
								</thead>
								<thead>
									<tr>
										<th rowspan="" style="background: limegreen; text-align: center;">SALDO</th>
										<th colspan="" style="background: limegreen; text-align: right;"></th>			
										<th colspan="" style="background: limegreen; text-align: right;">Rp <?php echo  number_format(($sub_total_realisasiSumberDana-$total_pengeluaran),2,',','.')?></th>			
									</tr>
								</thead>
							</table>


							<br>
							<div class="row">
								<div class="col-md-6">
									<div align="center" class="column" >
										<br>
										<br>
										<p>Bendahara Senat Mahasiswa,</p>
										<br>
										<br>
										<br>
										<u>Dewi Setiyowati</u><br>
										<a>15.01.4344</a>
									</div>
								</div>
								<div class="col-md-6">
									<div align="center" class="column" >
										<p>Yogyakarta, <?php echo date("d-m-Y"); ?></p>
										<p>Bendahara Kegiatan,</p>
										<br>
										<br>
										<br>
										<u>Nafa Diniah</u><br>
										<a>14.12.8008</a>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
			</tbody>
		</table>	
	</body>
	</html>