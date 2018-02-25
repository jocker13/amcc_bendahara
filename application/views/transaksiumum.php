<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
<div class="row">
  <div class="col-lg-12">
    <br>
  </div>
</div><!--/.row-->
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading" align="right"><a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModal"><i class="glyphicon glyphicon-plus"></i> Tambah</a></div>
      <div class="panel-body">
       <table id="table-transaksiumum" class="table table-striped table-bordered" >
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
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">INPUT DATA TRANSAKSI UMUM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form role="form"  action="<?php echo base_url(); ?>TransaksiUmum/simpan" method="POST">

          <div class="form-group">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
          </div>

          <div class="form-group">
            <input type="hidden" name="op" " class="form-control">
            <input type="hidden" name="id_tran" class="form-control">

            <label for="namatransaksi-name" class="form-control-label">Nama Transaksi</label>
            <input type="text" name="nama_transaksi"  class="form-control" id="recipient-name" required>
          </div>
          <div class="form-group">
           <label>Jenis</label>
           <select class="form-control" name="jenis">
             <option>Pemasukan</option>
             <option>Pengeluaran</option>
           </select>
         </div>
         <div class="form-group">
          <label>Nama Sie</label>
          <select class="form-control" name="nama_sie">
            <option>SUMBER DANA</option>
            <option>KONSUMSI</option>
            <option>PDD</option>
            <option>PERLENGKAPAN</option>
            <option>ACARA</option>
            <option>HUMAS</option>
            <option>KESEKRETARIATAN</option>
            <option>P3K</option>
          </select>
        </div>
        <div class="form-group">
          <label for="banyak-name" class="form-control-label">Banyak</label>
          <input type="text" name="banyak"  class="form-control" id="recipient-name" required>
        </div>
        <div class="form-group">
          <label for="r-name" class="form-control-label">Harga Satuan</label>
          <input type="text" name="harga_satuan"  class="form-control" id="recipient-name" required>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
</div>
</div>                                      

