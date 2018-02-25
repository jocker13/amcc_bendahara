<div id="notifications"></div> 
<div class="row">
	<div class="col-lg-12">
		<br>
	</div>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default" >
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<select class="form-control" id="bulan" name="bulan" >
							<option value="" >-- pilih Bulan --</option>
							<option value="1" >Januari</option>
							<option value="2" >Februari</option>
							<option value="3" >Maret</option>
							<option value="4" >April</option>
							<option value="5" >Mei</option>
							<option value="6" >Juni</option>
							<option value="7" >Juli</option>
							<option value="8" >Agustus</option>
							<option value="9" >September-</option>
							<option value="10" >Oktober</option>
							<option value="11" >November</option>
							<option value="12" >Desember</option>

						</select>	
					</div>
				<div class="col-md-4">
					<div class="form-group">
						<select class="form-control" id="tahun" name="tahun">
							<?php
							$mulai= date('Y') - 50;
							for($i = $mulai;$i<$mulai + 100;$i++){
								$sel = $i == date('Y') ? ' selected="selected"' : '';
								echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
							}
							?>
						</select>
					</div>  
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<button  onclick="show_laporan_transaksi()" id="tampiltran" class="btn btn-primary">Tampilkan</button>
					</div>  
				</div>
			</div>
		</div>
	</div> 
</div> 
</div><!--/.row-->



<div class="row">
	<div class="col-lg-12">
		<br>
	</div>
</div><!--/.row-->
<div class="row" id="table-laporan-tran" style="display: none;">
	<div class="col-lg-12">
		<div class="panel panel-default">
			           <div class="panel-heading" align="right"><a href="#" onclick="cetak_laporan_transaksi()" class="btn btn-default btn-md"><i class="glyphicon glyphicon-print"></i> Cetak</a></div>
			<div class="panel-body">
				<table id="table-laporan-transaksi" class="table table-striped table-bordered" >
					<thead>
						<tr>
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
				</table>
			</div>
		</div>
	</div>
</div> <!-- END -->

<script type="text/javascript">
	var tran_div=document.getElementById('table-laporan-tran');
	function show_laporan_transaksi() {
		tran_div.style['display']='block';
	}

</script>

