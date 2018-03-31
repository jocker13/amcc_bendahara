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
					<button class="btn btn-success" onclick="add_estimasi()"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
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
		var estimasi_div=document.getElementById('estimasi_tabel');
		function show() {
			estimasi_div.style['display']='block';
		}


    
	</script>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"  aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header" style="" >
					<h5 class="modal-title" id="exampleModalLabel">INPUT DATA ESTIMASI</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form action="#" id="form">

						<div class="form-group">
							<input type="hidden" name="id_kegiatan" id="id_kegiatan_modal" value="" class="form-control">
							<div class="form-group">
								<label>NAMA KEGIATAN</label></br>
								<input type="text" id="nama_kegiatan_modal" value="" class="form-control" disabled>
								<!-- <label><?php echo $kegiatan_nama;	 ?></label> -->
							</div>
							<input type="hidden" name="kegiatan"  value="" class="form-control">
							<input type="hidden" id="op" name="op" value="" class="form-control">
							<input type="hidden" name="id_estimasi" id="id_estimasi" value="" class="form-control">
							
							<div class="form-group">
								<label>Jenis</label>
								<select class="form-control" name="jenis" required oninvalid="this.setCustomValidity('Jenis harus Diisi')">
									<option value="pemasukan">PEMASUKAN</option>
									<option value="pengeluaran">PENGELUARAN</option>
								</select>
							</div>
							<div class="form-group">
								<label>Nama Sie</label>
								<select class="form-control" name="nama_sie" required oninvalid="this.setCustomValidity('Nama sie harus Diisi')">
									<option value="sumber dana">SUMBER DANA</option>
									<option value="konsumsi">KONSUMSI</option>
									<option value="pdd">PDD</option>
									<option value="perlengkapan">PERLENGKAPAN</option>
									<option value="acara">ACARA</option>
									<option value="humas">HUMAS</option>
									<option value="kesekretariatan">KESEKRETARIATAN</option>
									<option value="p3k">P3K</option>
								</select>
							</div>					
							<div class="form-group">
								<label for="nama_estimasi-name" class="form-control-label">Nama Transaksi</label>
								<input type="text" name="nama_estimasi" value="" class="form-control" id="nama_estimasi" required oninvalid="this.setCustomValidity('Nama Transaksi harus Diisi')">
							</div>

							<div class="form-group">
								<label for="banyak-name" class="form-control-label">Banyak</label>
								<input type="text" name="banyak" value="" class="form-control" id="banyak" onkeyup="this.value=this.value.replace(/[^\d]/,'')" required oninvalid="this.setCustomValidity('Banyak harus Diisi')">
							</div>
							<div class="form-group">
								<label for="r-name" class="form-control-label">Harga Satuan</label>
								<input type="text" name="harga_satuan" value=""  class="form-control" id="harga_satuan" onkeyup="this.value=this.value.replace(/[^\d]/,'')" required oninvalid="this.setCustomValidity('Harga satuan harus Diisi')">
							</div>

						</div>
						</form>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
							<button  onclick="save_estimasi()" class="btn btn-primary">Simpan</button>
						
					</div>
				</div>
			</div>
		</div>












