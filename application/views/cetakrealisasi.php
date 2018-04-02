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
	<H4 style="text-align: center;"> NAMA KEGIATAN</H4>
	<br>
	<div  style="padding-left: 40px;padding-right:  30px; height: 500px">
	<h5><u>PEMASUKAN</u></h5>
		<table >
			<thead>
			<tr>
				<th rowspan="2" style="background: dodgerblue; text-align: center;">SUMBER DANA</th>
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
			
			<tr>
				<td>Kas AMCC</td>
				<td style="text-align: center;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: center;">1</td>
				<td style="text-align: right;">10000</td>
				<td style="text-align: right;">10000</td>
			</tr>
			<tr>
				<td style="background: dodgerblue; text-align: center;"; ><b>Sub Total</b></td>
				<td style="background: dodgerblue;"></td>
				<td style="background: dodgerblue;"></td>
				<td style="text-align: right; background: dodgerblue;"><b>Rp <?php echo  number_format($sub_total,2,',','.')?></b></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
			</tr>
		</tbody>
</table>


<h5><u>PENGELUARAN</u></h5>
		<table >
			<thead>
			<tr>
				<th rowspan="2" style="background: dodgerblue; text-align: center;">KESEKRETARIATAN</th>
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
			<tr>
				<td>Print Warna</td>
				<td style="text-align: center;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: right;">30</td>
				<td style="text-align: right;">500</td>
				<td style="text-align: right;">15000</td>
				<td style="text-align: center;">1</td>
			</tr>
			<tr>
				<td>Fc</td>
				<td style="text-align: center;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: right;">10</td>
				<td style="text-align: right;">500</td>
				<td style="text-align: right;">5000</td>
				<td style="text-align: center;">2</td>
			</tr>
			<tr>
				<td style="background: dodgerblue; text-align: center;"; ><b>Sub Total</b></td>
				<td style="background: dodgerblue;"></td>
				<td style="background: dodgerblue;"></td>
				<td style="text-align: right; background: dodgerblue;""><b>Rp <?php echo  number_format($sub_total_kesekretariatan,2,',','.')?></b></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
			</tr>
		</tbody>
</table>
<br>

<table >
			<thead>
			<tr>
				<th rowspan="2" style="background: dodgerblue; text-align: center;">KONSUMSI</th>
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
			<tr>
				<td>Makan Siang Peserta</td>
				<td style="text-align: center;">30</td>
				<td style="text-align: right;">10000</td>
				<td style="text-align: right;">300000</td>
				<td style="text-align: right;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: center;"></td>
			</tr>
			<tr>
				<td>Nasi Box</td>
				<td style="text-align: center;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: center;">30</td>
				<td style="text-align: right;">12000</td>
				<td style="text-align: right;">360000</td>
				<td style="text-align: center;">3</td>
			</tr>
			<tr>
				<td style="background: dodgerblue; text-align: center;"; ><b>Sub Total</b></td>
				<td style="background: dodgerblue;"></td>
				<td style="background: dodgerblue;"></td>
				<td style="text-align: right; background: dodgerblue;""><b>Rp <?php echo  number_format($sub_total_konsumsi,2,',','.')?></b></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
			</tr>
		</tbody>
</table>
<br>

<table >
			<thead>
			<tr>
				<th rowspan="2" style="background: dodgerblue; text-align: center;">ACARA</th>
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
			
			<tr>
				<td>contoh</td>
				<td style="text-align: center;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: center;">30</td>
				<td style="text-align: right;">12000</td>
				<td style="text-align: right;">360000</td>
				<td style="text-align: center;">3</td>
			</tr>
			<tr>
				<td style="background: dodgerblue; text-align: center;"; ><b>Sub Total</b></td>
				<td style="background: dodgerblue;"></td>
				<td style="background: dodgerblue;"></td>
				<td style="text-align: right; background: dodgerblue;""><b>Rp <?php echo  number_format($sub_total_acara,2,',','.')?></b></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
			</tr>
		</tbody>
</table>
<br>

<table >
			<thead>
			<tr>
				<th rowspan="2" style="background: dodgerblue; text-align: center;">PDD</th>
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

			<tr>
				<td>CONTOH</td>
				<td style="text-align: center;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: center;">30</td>
				<td style="text-align: right;">12000</td>
				<td style="text-align: right;">360000</td>
				<td style="text-align: center;">3</td>
			</tr>
			<tr>
				<td style="background: dodgerblue; text-align: center;"; ><b>Sub Total</b></td>
				<td style="background: dodgerblue;"></td>
				<td style="background: dodgerblue;"></td>
				<td style="text-align: right; background: dodgerblue;""><b>Rp <?php echo  number_format($sub_total_pdd,2,',','.')?></b></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
			</tr>
		</tbody>
</table>
<br>
<table >
			<thead>
			<tr>
				<th rowspan="2" style="background: dodgerblue; text-align: center;">PERLENGKAPAN</th>
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
			<tr>
				<td>contoh</td>
				<td style="text-align: center;">30</td>
				<td style="text-align: right;">10000</td>
				<td style="text-align: right;">300000</td>
				<td style="text-align: right;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: center;"></td>
			</tr>
			<tr>
				<td style="background: dodgerblue; text-align: center;"; ><b>Sub Total</b></td>
				<td style="background: dodgerblue;"></td>
				<td style="background: dodgerblue;"></td>
				<td style="text-align: right; background: dodgerblue;""><b>Rp <?php echo  number_format($sub_total_perlengkapan,2,',','.')?></b></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
			</tr>
		</tbody>
</table>
<br>

<table >
			<thead>
			<tr>
				<th rowspan="2" style="background: dodgerblue; text-align: center;">HUMAS</th>
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

			<tr>
				<td>contoh</td>
				<td style="text-align: center;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: center;">30</td>
				<td style="text-align: right;">12000</td>
				<td style="text-align: right;">360000</td>
				<td style="text-align: center;">3</td>
			</tr>
			<tr>
				<td style="background: dodgerblue; text-align: center;"; ><b>Sub Total</b></td>
				<td style="background: dodgerblue;"></td>
				<td style="background: dodgerblue;"></td>
				<td style="text-align: right; background: dodgerblue;""><b>Rp <?php echo  number_format($sub_total_humas,2,',','.')?></b></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
			</tr>
		</tbody>
</table>
<br>

<table >
			<thead>
			<tr>
				<th rowspan="2" style="background: dodgerblue; text-align: center;">P3K</th>
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

			<tr>
				<td>contoh</td>
				<td style="text-align: center;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: right;"></td>
				<td style="text-align: center;">30</td>
				<td style="text-align: right;">12000</td>
				<td style="text-align: right;">360000</td>
				<td style="text-align: center;">3</td>
			</tr>
			<tr>
				<td style="background: dodgerblue; text-align: center;"; ><b>Sub Total</b></td>
				<td style="background: dodgerblue;"></td>
				<td style="background: dodgerblue;"></td>
				<td style="text-align: right; background: dodgerblue;""><b>Rp <?php echo  number_format($sub_total_p3k,2,',','.')?></b></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
				<td style="text-align: center; background: dodgerblue;"></td>
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
		<tbody>
			<tr>
				<td>Subsidi Lembaga</td>
				<td style="text-align: right;">1000000</td>
				<td></td>
			</tr>
			<tr>
				<td>Subsidi Lembaga</td>
				<td style="text-align: right;">500000</td>
				<td></td>
			</tr>
		</tbody>
			<thead>
			<tr>
				<th rowspan="" style="background: limegreen; text-align: center;">TOTAL PEMASUKAN</th>
				<th colspan="" style="background: limegreen; text-align: center;"></th>			
				<th colspan="" style="background: limegreen; text-align: right;">xxx</th>			
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
				<td>SEKRETARIS</td>
				<td style="text-align: right;">1000000</td>
				<td></td>
			</tr>
			<tr>
				<td>KONSUMSI</td>
				<td style="text-align: right;">500000</td>
				<td></td>
			</tr>
			<tbody>
			<tr>
				<td>ACARA</td>
				<td style="text-align: right;">1000000</td>
				<td></td>
			</tr>
			<tr>
				<td>PDD</td>
				<td style="text-align: right;">500000</td>
				<td></td>
			</tr>
		</tbody>
		<thead>
			<tr>
				<th rowspan="" style="background: limegreen; text-align: center;">TOTAL PENGELUARAN</th>
				<th colspan="" style="background: limegreen; text-align: right;"></th>			
				<th colspan="" style="background: limegreen; text-align: right;">masuk-keluar</th>			
			</tr>
		</thead>
		<thead>
			<tr>
				<th rowspan="" style="background: limegreen; text-align: center;">SALDO</th>
				<th colspan="" style="background: limegreen; text-align: right;"></th>			
				<th colspan="" style="background: limegreen; text-align: right;">saldo</th>			
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