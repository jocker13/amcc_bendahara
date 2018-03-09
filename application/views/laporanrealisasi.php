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
									<div class="form-group">
									<label>NAMA KEGIATAN</label>

									<select class="form-control" id="id_kegiatan" name="kegiatan" >
										<option value="" >-- pilih kegiatan --</option>
										<?php 
										foreach ($kegiatan as $nama) {

											?>
											<option   value="<?php echo $nama->id_kegiatan ?>" ><?php echo $nama->nama_kegiatan; ?>   (<?php echo $nama->tahun_kep; ?>)</option>
											<?php 

										}
										?>

									</select>
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">

									<br>
									<button  onclick="show()" id="tampil" class="btn btn-primary">Tampilkan</button>
								</div>  
							</div>
					</div>
				</div>
			</div> 
		</div> 
	</div><!--/.row-->

	<div class="row" id="" style="display:none">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading" align="right">
					<button class="btn btn-default" onclick=""><i onclick="" class="glyphicon glyphicon-print"></i> Cetak</button>
				</div>

				<div class="panel-body">


					<table id="tabel-realisasi" class="table table-bordered table-striped">
						
						<thead>
                      <tr>
							<tr style="background: dodgerblue; text-align: center;">
							<th style="text-align: center;">No</th>
							<th style="text-align: center;">Jenis</th>
							<th style="text-align: center;">Nama Sie</th>
							<th style="text-align: center;">Nama Transaksi</th>
							<th style="text-align: center;">Banyak</th>
							<th style="text-align: center;">Harga Satuan</th>
							<th style="text-align: center;">Jumlah</th>
							<th style="text-align: center;">No. Nota</th>
							<th style="text-align: center;">Aksi</th>
                      </tr>
                    </thead>
					</table>
				</div>
			</div>
		</div>
	</div> <!--End .TABEL-->

	<script type="text/javascript">
		var realisasi_div=document.getElementById('estimasi_tabel');
		function show() {
			realisasi_div.style['display']='block';
		}


    
	</script>










