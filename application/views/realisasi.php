<div id="notifications"></div> 

<div class="row">
	<div class="col-lg-12">
		<!-- 		<h2 class="page-header" align="center">REALISASI</h2> -->
		<br>
	</div>
</div><!--/.row-->


<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">Estimasi</div>
			<div class="panel-body">
				<form action="#" id="form" >
					<div class="form-group">
						<label>NAMA KEGIATAN</label>

						<select class="form-control" id="id_kegiatan" name="id_kegiatan" >
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
					<div class="panel-heading" align="right"><a href="#" class="btn btn-default" onclick="pilihestimasi()">Pilih Data Estimasi</a>
					</div>
					
					<div class="form-group">
						<label>Jenis</label>
						<input type="text" name="jenis"  id="jenis" class="form-control" disabled="">
					</div> 
					<div class="form-group">
						<label>Nama Sie</label>
						<input type="text" name="nama_sie" id="nama_sie" class="form-control" disabled="">
					</div>
					<div class="form-group">
						<label>Nama Transaksi</label>
						<input type="text" name="nama_estimasi" id="nama_estimasi" class="form-control" disabled="">
					</div>
					<div class="form-group">
						<label>Banyak</label>
						<input type="text" name="banyak" id="banyak" class="form-control" disabled="">
					</div>
					<div class="form-group">
						<label>Harga Satuan</label>
						<input type="text" name="harga_satuan" id="harga_satuan" class="form-control" disabled="">
					</div>
					<div class="form-group">
						<label>Jumlah</label>
						<input type="text" name="jumlah" id="jumlah" class="form-control" disabled="">
					</div>

				 
				<div class="clear"></div>
			</div><!--End .article-->
		</div>
	</div>

<!-- 	<div class="row"> -->
		<div class="col-md-6">
		<div class="panel panel-default">
				<div class="panel-heading">Input Data Realisasi</div>
				<div class="panel-body">
					
						<div class="form-group">
							<label>Jenis</label>
								<select class="form-control" name="jenis">
									<option value="pemasukan">PEMASUKAN</option>
									<option value="pengeluaran">PENGELUARAN</option>
								</select>
						</div>
						<div class="form-group">
							<label>Nama Sie</label>
								<select class="form-control" name="nama_sie">
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
							<label>Nama Transaksi</label>
							<input type="text" name="nama_realisasi" class="form-control" required>
							<input type="hidden" name="op" class="form-control" value="tambah" required>
							<!-- <input type="hidden" name="id_kegiatan" id="id_kegiatan_save" class="form-control" required> -->
							<input type="hidden" name="id_realisasi" class="form-control" required>
							<input type="hidden" name="id_estimasi" id="id_estimasi"  class="form-control">

						</div>
						<div class="form-group">
							<label>Banyak</label>
							<input type="text" name="banyak_realisasi" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" required  oninvalid="this.setCustomValidity('banyaknya harus diisi')" oninput="setCustomValidity('')"> 
						</div>
						<div class="form-group">
							<label>Harga Satuan</label>
							<input type="text" name="harga_satuan_realisasi" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" required  oninvalid="this.setCustomValidity('harga satuan harus diisi')" oninput="setCustomValidity('')"> 
							
						</div>
						<!-- <div class="form-group">
							<label>Jumlah</label>
							<input type="text" name="jumah_realisasi" class="form-control" onkeyup="this.value=this.value.replace(/[^\d]/,'')" required> 
						</div> -->
						<div class="form-group">
							<label>No Nota</label><br>
							<div class="form-group" align="left">
								<a class="btn btn-default" onclick="pilih_nota()"><i class="glyphicon glyphicon-plus"></i> Pilih Nota</a><br>
							</div>
							<input type="text" name="no_nota" class="form-control" readonly="" required > 
							<input type="hidden" name="id_nota" class="form-control"  required > 
						</div>
						<div class="form-group" align="right">
							<a  onclick="save_realisasi()" class="btn btn-primary" >Simpan</a>
						</div>
						<div class="form-group">
							<label></label><br>
							<label></label><br>
							<div class="form-group" align="left">
							
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>



<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-body">
				<table id="tabel-realisasi" class="table table-striped table-bordered" >
					<thead>
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
</div> 

<!-- javascrip untuk data table -->

<div class="modal fade bd-example-modal-lg" id="estimasipilih" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="" >
				<h5 class="modal-title" id="exampleModalLabel">DATA ESTIMASI</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="panel-body">

				<table style="width: 100%" id="estimasidata"  class="table table-striped table-bordered" >
					<thead>
						<tr style="background: dodgerblue; text-align: center;">
							<th style="background: dodgerblue; text-align: center;"><b>AKSI</b></th>
							<th style="background: dodgerblue; text-align: center;">JENIS</th>
							<th style="background: dodgerblue; text-align: center;">NAMA SIE</th>
							<th style="background: dodgerblue; text-align: center;">NAMA TRANSAKSI</th>
							<th style="background: dodgerblue; text-align: center;"><b>BANYAK</b></th>
							<th style="background: dodgerblue; text-align: center;"><b>HARGA SATUAN</b></th>
							<th style="background: dodgerblue; text-align: center;"><b>JUMLAH</b></th>
						</tr>
					</thead>
					
				</table>
			</div>


		</div>
	</div>
</div>



<!-- modal nota -->
<div class="modal fade bd-example-modal-lg" id="notapilih" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header" style="" >
				<h5 class="modal-title" id="exampleModalLabel">PILIH NOTA</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="panel-body">

				<table style="width: 100%" id="nota_data" class="table table-striped table-bordered" >
					<thead>
						<tr style="background: dodgerblue; text-align: center;">
							<th style="background: dodgerblue; text-align: center; width: 10%"><b>AKSI</b></th>
							<th style="background: dodgerblue; text-align: center; width: 10%">No Nota</th>
							<th style="background: dodgerblue; text-align: center; width: 60%">GAMBAR NOTA</th>
							<!-- <th style="background: dodgerblue; text-align: center; width: 20%">NAMA KEGIATAN</th> -->
						</tr>
					</thead>
					
				</table>
			</div>


		</div>
	</div>
</div>