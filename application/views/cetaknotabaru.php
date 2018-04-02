
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="screen.css" media="screen, print" />
	<link rel="stylesheet" type="text/css" href="print.css" media="print" />
	<title>AMCC</title>
</head>
<style type="text/css">
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
}
@page {
    margin-top: 1.3cm;
    margin-left:  0cm;
    margin-right:  0cm;
    margin-bottom: 0cm;
 }
body{
	background: url(assets/img/back.png) no-repeat   !important;
	background-size: 100% !important;
}
table.table-container,.table-container>thead>tr>td, .table-container>tbody>tr>td {
	border: none !important;
	}

</style>
<body>
<?php 
	// $no_nota='';
	// print_r($sql);
	foreach ($sql as $notabaru) {
			$no_nota = $notabaru->no_nota;
			$tanggal = $notabaru->tanggal;
			$dari = $notabaru->dari;
			$uang = $notabaru->uang;
			$terbilang = $notabaru->terbilang;
			$institusi = $notabaru->institusi;
			$penerima= $notabaru->penerima;
			$no_telp = $notabaru->no_telp;
			$keterangan = $notabaru->keterangan;
	}
	$newDate = date("d-m-Y", strtotime($tanggal));

 ?>
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
 </table>


	<table  style="width:100%; padding-left:40px;">
		<tr>
			<br>
			<th  colspan='2'>Tanda Terima</th>
			<!--  <th  colspan='2'>No :</th> -->
		</tr>
		<tr>
			<th colspan="2">Nomor : <?php echo $no_nota ?></th>
		</tr>
		<tr style="height: 30px;"></tr>
		<tr >
			<td style="width: 20%">Telah diterima dari</td>
			<td>: <?php echo $dari; ?></td>
		</tr>
		<tr>
			<td>Uang Sebesar</td>
			<td>: Rp <?php echo number_format($uang,2,',','.')  ?> </td>
		</tr>
		<tr>
			<td>Terbilang</td>
			<td style="font-style: italic;">: <?php echo $terbilang; ?></td>
		</tr>
		<tr style="height: 30px;"></tr>
		<tr>
			<td>Nama Institusi</td>
			<td>: <?php echo $institusi; ?></td>
		</tr><tr>
			<td>Nama Penerima</td>
			<td>: <?php echo $penerima; ?></td>
		</tr>
		<tr>
			<td>Nomor Telepon</td>	
			<td>: <?php echo $no_telp; ?></td>
		</tr>
		<tr>
			<td>Keterangan</td>
			<td>: <?php echo $keterangan; ?></td>
		</tr>

	</table>
	<br>
	<br>
	<table style="width: 100%;">
		<tr>

			<td style="width: 50%;"></td>
			<td style="width: 50%; text-align: center;">Yogyakarta, <?php echo $newDate; ?></td>

		</tr>

		<tr>

			<td style="text-align: center;">Yang menerima.</td>
			<td style="text-align: center;">Yang menyerahkan,</td>

		</tr>
		<tr>
			<td style="height: 80px;"></td>
			<td style="height: 80px;"></td>
		</tr>
		<tr>
			<td style="width: 50%; text-align: center;">(<?php echo $penerima; ?>)</td>
			<td style="width: 50%; text-align: center;">(<?php echo $dari; ?>)</td>
		</tr>
	</table> 


</body>

</html>