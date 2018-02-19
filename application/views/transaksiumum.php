
<div class="row">
  <div class="col-lg-12">
    <h2 class="page-header" align="center">TRANSAKSI UMUM</h2>
  </div>
</div><!--/.row-->
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <form class="navbar-form navbar-right" role="search">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="nama transaksi" name="srch-term" id_tran="srch-term">
          <div class="input-group-btn">
            <button class="btn btn-warning type=" submit="" "=""><i class="glyphicon glyphicon-search "></i>
            </button>
          </div>
        </div>
      </form>
      <div class="panel-heading" align="right"><a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Tambah</a></div>

      <div class="panel-body">

        <table class="table table-bordered table-striped">
         <thead>
           <tr>   
             <th style="background: dodgerblue; text-align: center;">TANGGAL</th>
             <th style="background: dodgerblue; text-align: center;">NAMA TRANSAKSI</th>
             <th style="background: dodgerblue; text-align: center;">JENIS</th>
             <th style="background: dodgerblue; text-align: center;">NAMA SIE</th>
             <th style="background: dodgerblue; text-align: center;">BANYAK</th>
             <th style="background: dodgerblue; text-align: center;">HARGA SATUAN</th>
             <th style="background: dodgerblue; text-align: center;">JUMLAH</th>
             <th style="background: dodgerblue; text-align: center;">NO. NOTA</th>
             <th style="background: dodgerblue; text-align: center;">SALDO</th>
             <!-- <th style="background: dodgerblue; text-align: center;">AKSI</th> -->
           </tr>
         </thead>
         <?php
         $no=0;
         $jml=0;
        foreach ($sql as $tran) {
        $jml=$tran->banyak*$tran->harga_satuan;
          $no++;
          ?>
          <tbody>
            <tr>
              <?php 
              $newDate = date("d-m-Y", strtotime($tran->tanggal))
              ?>
              <td><?php echo $newDate  ?></td>
              <td><?php echo $tran->nama_transaksi  ?></td>
              <td><?php echo $tran->jenis  ?></td>
              <td><?php echo $tran->nama_sie  ?></td>
              <td><?php echo $tran->banyak  ?></td>
              <td><?php echo $tran->harga_satuan  ?></td>
              <td>Rp <?php echo number_format($jml,2.,',',',')  ?></td>
              <td> <?php echo $tran->no_nota  ?></td>
              <td>Rp <?php echo number_format($tran->saldo,2,',',',')  ?></td>
             </tr>
           </tbody>
           <?php

         }
         ?>
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
        <div class="form-group">
          <label for="r-name" class="form-control-label">NO. NOTA</label>
          <input type="text" name="no_nota"  class="form-control" id="recipient-name" required>
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

