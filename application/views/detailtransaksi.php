<?php 
$op;
$id = "";
$nama_sie ="";
$jenis ="";
$nama_transaksi = "";
$banyak = "";
$harga_satuan = "";
$no_nota = "";
if ($op=='edit')
{
  foreach ($sql as $val) {
    $op = "edit";
    $id = $val->id;
    $jenis = $val->jenis;
    $nama_sie = $val->nama_sie;
    $nama_transaksi = $val->nama_transaksi;
    $banyak = $val->banyak;
    $harga_satuan = $val->harga_satuan;
    $no_nota = $val->no_nota;
  }
}
?>
	<script src="<?php echo base_url('assets/js/jquery-3.1.1.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script><div class="row">
	<div class="col-lg-12">
		<h2 class="page-header" align="center">DETAIL TRANSAKSI</h2>
	</div>
</div><!--/.row-->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<form class="navbar-form navbar-right" role="search">
				<div class="input-group">
					<input class="form-control  type="text" placeholder="nama transaksi" name="srch-term" id="srch-term">
					<div class="input-group-btn">
						<button class="btn btn-warning type=" submit="" "=""><i class="glyphicon glyphicon-search "></i>
						</button>
					</div>
				</div>
			</form>
			<div class="panel-heading" align="right"><a data-toggle="modal" class="btn btn-primary" data-toggle="modal" data-target="exampleModal">Tambah</a>
			</div>

			<div class="panel-body">

				<table class="table table-bordered table-striped">
					<th style="background: dodgerblue; text-align: center;">NO</th>
					<th style="background: dodgerblue; text-align: center;">JENIS</th>
					<th style="background: dodgerblue; text-align: center;">NAMA SIE</th>
					<th style="background: dodgerblue; text-align: center;">NAMA TRANSAKSI</th>
					<th style="background: dodgerblue; text-align: center;"><b>BANYAK</b></th>
					<th style="background: dodgerblue; text-align: center;"><b>HARGA SATUAN</b></th>
					<th style="background: dodgerblue; text-align: center;"><b>JUMLAH</b></th>
					<th style="background: dodgerblue; text-align: center;"><b>NO. NOTA</b></th>
					<th style="background: dodgerblue; text-align: center;"><b>AKSI</b></th>
					<?php
					$no=0;
					foreach ($sql as $detail) {
						$jml=$detail->banyak*$detail->harga_satuan;
						$no++;
						?>
						<tbody>
							<tr>
								<td><?php echo $no  ?> </td>
								<td><?php echo $detail->jenis  ?> </td>
								<td><?php echo $detail->nama_sie ?> </td>
								<td><?php echo $detail->nama_transaksi ?> </td>
								<td><?php echo $detail->banyak ?> </td>
								<td>Rp <?php echo number_format($detail->harga_satuan,2,',','.') ?> </td>
								<td>Rp <?php echo number_format($jml,2,',','.') ?> </td>
								<td><?php echo $detail->no_nota ?> </td>

								<td>
									<a href="javascript">
										<!--  data-id="<?php echo $detail['id'] ?>" -->
										 data-jenis ="<?php echo $detail['jenis'] ?>"
										 data-nama_sie =" <?php echo $detail ['jenis']?>"
										 data-nama_transaksi ="<?php echo $detail ['nama_transaksi']?>"
										 data-banyak = "<?php echo $detail ['banyak'] ?>"
										 data-harga_satuan = "<?php echo $detailt ['harga_satuan']?>"
										 data-jml ="<?php echo $detail ['jml'] ?>"
										 data-no_nota ="<?php echo $detail ['no_nota'] ?>"
										 data-toggle="modal" data-target="#edit-data">
										  <button  data-toggle="modal" data-target="#edit-data" class="btn btn-info">Edit</button>
									</a>
									<!-- <a href="<?php echo base_url();?>detailtransaksi/edit/<?php echo $detail->id ?>" class="btn btn-sm btn-warning">Edit</a> -->
									<a href="javascript:if(confirm('Apakah anda ingin menghapus?')){document.location='<?php echo base_url();?>detailtransaksi/hapus/<?php echo $detailtransaksi->id?>';}" class="btn btn-sm btn-danger">Hapus</button></td>
									</tr>
								</tbody>
								<?php

							}
							?>
						</table>
					</div>
				</div>
			</div>
		</div> <!--End .TABEL-->



        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button> -->



<!-- MODALTAMBAH  TRANSAKSI -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content"> 
			<div class="modal-header" style="" >
				<h5 class="modal-title" id="exampleModalLabel">INPUT DATA DETAIL TRANSAKSI</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form role="form"  action="<?php echo base_url(); ?>detailtransaksi/simpan" method="POST">
					
              <input type="hidden" name="op" value="<?php echo $op ?>" class="form-control">
              <input type="hidden" name="id" value="<?php echo $id ?>" class="form-control">
					<div class="form-group">
						<label>JENIS</label>
						<select class="form-control" name="jenis">
							<option>PEMASUKAN</option>
							<option>PENGELUARAN</option>
						</select>
					</div>				

					<div class="form-group">
						<label>Nama Sie</label>
						<select class="form-control" name="nama_sie">
							<option>SUMBER DANA</option>
							<option>SEKRETARIS</option>
							<option>KONSUMSI</option>
							<option>PDD</option>
							<option>INVENTARIS</option>
							<option>PSDM</option>
							<option>KESEKRETARIATAN</option>
						</select>
					</div>					
					<div class="form-group">
						<label for="nama_transaksi-name" class="form-control-label">Nama Transaksi</label>
						<input type="text" value="<?php echo $nama_transaksi?>" class="form-control" id="recipient-name" name="nama_transaksi" required>
					</div>

					<div class="form-group">
						<label for="banyak-name" class="form-control-label">Banyak</label>
						<input type="text" value="<?php echo $banyak?>" class="form-control" id="recipient-name" name="banyak" required>
					</div>
					<div class="form-group">
						<label for="r-name" class="form-control-label">Harga Satuan</label>
						<input type="text" value="<?php echo $harga_satuan?>" class="form-control" id="recipient-name" name="harga_satuan" required>
					</div>
					<div class="form-group">
						<label for="r-name" class="form-control-label">NO. NOTA</label>
						<input type="text" value="<?php echo $no_nota ?>" class="form-control" id="recipient-name" name="no_nota" required>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- <!-- <!-- MODAL EDIT DATA DETAIL TRANSAKSI -->
<div class="modal fade" id="edit-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" style="" >
				<h5 class="modal-title" id="exampleModalLabel">EDIT DATA DETAIL TRANSAKSI</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form role="form"  action="<?php echo base_url(); ?>detailtransaksi/edit" method="POST">
					
              <input type="hidden" name="op" value="<?php echo $op ?>" class="form-control">
              <input type="hidden" name="id" value="<?php echo $id ?>" class="form-control">
					<div class="form-group">
						<label>JENIS</label>
						<select class="form-control" name="jenis" id="jenis">
							<option>PEMASUKAN</option>
							<option>PENGELUARAN</option>
						</select>
					</div>				

					<div class="form-group">
						<label>Nama Sie</label>
						<select class="form-control" name="nama_sie" id="nama_sie">
							<option>SUMBER DANA</option>
							<option>SEKERTARIS</option>
							<option>KONSUMSI</option>
							<option>PDD</option>
							<option>INVENTARIS</option>
							<option>PSDM</option>
						</select>
					</div>					
					<div class="form-group">
						<label for="nama_transaksi-name" class="form-control-label">Nama Transaksi</label>
						<input type="text" value="<?php echo $nama_transaksi?>" class="form-control" id="nama_transaksi" name="nama_transaksi" required>
					</div>

					<div class="form-group">
						<label for="banyak-name" class="form-control-label">Banyak</label>
						<input type="text" value="<?php echo $banyak?>" class="form-control" id="banyak" name="banyak" required>
					</div>
					<div class="form-group">
						<label for="r-name" class="form-control-label">Harga Satuan</label>
						<input type="text" value="<?php echo $harga_satuan?>" class="form-control" id="harga_satuan" name="harga_satuan" required>
					</div>
					<div class="form-group">
						<label for="r-name" class="form-control-label">NO. NOTA</label>
						<input type="text" value="<?php echo $no_nota ?>" class="form-control" id="no_nota" name="no_nota" required>
					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</form>
			</div>
		</div>
	</div>
</div> <!-- END MODAL EDIT -->
<script>
    $(document).ready(function() {
        // Untuk sunting
        $('#edit-data').on('show.bs.modal', function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
            var modal          = $(this)
 
            // Isi nilai pada field
            modal.find('#id').attr("value",div.data('id'));
            modal.find('#jenis').attr("value",div.data('jenis'));
            modal.find('#nama_sie').attr("value",div.data('nama_sie'));
            modal.find('#nama_transaksi').attr("value",div.data('nama_transaksi'));
            modal.find('#banyak').attr("value",div.data('banyak'));
            modal.find('#harga_satuan')attr("value",div.data('harga_satuan'));
            modal.find('#no_nota').attr("value",div.data('no_nota'));
        });
    });
</script>










