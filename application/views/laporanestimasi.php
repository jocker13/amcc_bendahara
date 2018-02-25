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

	<div class="row" id="estimasi_tabel" style="display:none">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading" align="right">
					<button class="btn btn-default" onclick="add_estimasi()"><i class="glyphicon glyphicon-print"></i> Cetak</button>
				</div>

				<div class="panel-body">


					<table id="tabel-estimasi" class="table table-bordered table-striped">
						
						<thead>
                      <tr>
                        <th style="background: dodgerblue; text-align: center;">NO</th>
						<th style="background: dodgerblue; text-align: center;">JENIS</th>
						<th style="background: dodgerblue; text-align: center;">NAMA SIE</th>
						<th style="background: dodgerblue; text-align: center;">NAMA TRANSAKSI</th>
						<th style="background: dodgerblue; text-align: center;"><b>BANYAK</b></th>
						<th style="background: dodgerblue; text-align: center;"><b>HARGA SATUAN</b></th>
						<th style="background: dodgerblue; text-align: center;"><b>JUMLAH</b></th>
						<th style="background: dodgerblue; text-align: center;"><b>AKSI</b></th>

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










