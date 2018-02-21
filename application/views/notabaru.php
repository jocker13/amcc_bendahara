<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
<div class="row">
  <div class="col-lg-12">
    <br>
  </div>
</div><!--/.row-->
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">INPUT DATA NOTA BARU</div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-6">
            <form role="form"  action="<?php echo base_url(); ?>notabaru/simpan" method="POST">
              <div class="form-group">
              <input type="hidden" name="op" id="op" value="tambah" class="form-control">
                <input type="hidden" name="id_notabaru" id="id_notabaru"  class="form-control">
                <label>No.Nota</label>
                <input type="text" name="no_nota" id="no_nota" class="form-control" required>
              </div>
              <div class="form-group">
                <label>TANGGAL</label>
                <input type="date" name="tanggal" id="tanggal"  class="form-control" required>
              </div>
              <div class="form-group">
                <label>DITERIMA DARI</label>
                <input type="text" name="dari" id="dari" class="form-control" required>
              </div>
              <div class="form-group">
                <label>UANG SEBESAR</label>
                <input type="text" name="uang"  id="uang" class="form-control" required> 
              </div>
              
            </div>
            <div class="col-md-6">
             
              <div class="form-group">
                <label>TERBILANG</label>
                <input type="text" name="terbilang" id="terbilang" class="form-control" required>
              </div>
              <div class="form-group">
                <label>PENERIMA</label>
                <input type="text" name="penerima"  id="penerima" class="form-control" required>
              </div>
              <div class="form-group">
                <label>No. Telp</label>
                <input type="text" name="no_telp" id="no_telp" class="form-control" required>
              </div>
              <div class="form-group">
                <label>KETERANGAN</label>
                <input type="text" name="keterangan"  id="keterangan" class="form-control" required>
              </div>
              <br>
              <div align="right" class="form-group">
                <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan</button>
              </div>
            </form>
          </div>
        </div> 
      </div> 
    </div><!--/.row-->


      <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-heading">DAFTAR NOTA BARU</div>
                <div class="panel-body">

                  <table id="table-notabaru" class="table table-striped table-bordered" >
                    <thead>
                      <tr>
                       <th style="background: dodgerblue; text-align: center">NO.NOTA</th>
                       <th style="background: dodgerblue; text-align: center">TANGGAL</th>
                       <th style="background: dodgerblue; text-align: center">DITERIMA DARI</th>
                       <th style="background: dodgerblue; text-align: center">UANG SEBESAR</th>
                       <th style="background: dodgerblue; text-align: center">TERBILANG</th>
                       <th style="background: dodgerblue; text-align: center">PENERIMA</th>
                       <th style="background: dodgerblue; text-align: center">No. Telp</th>
                       <th style="background: dodgerblue; text-align: center">KETERANGAN</th>
                       <th style="background: dodgerblue; text-align: center">AKSI</th>

                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>

   <!--  <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">DAFTAR NOTA BARU</div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <table class="table table-bordered table-striped">
                 <thead>
                  <tr style="background: dodgerblue; text-align: center; ">
                   
                 </tr>
                 
               </thead>  
               <?php
               $no=0;
               foreach ($sql as $notabaru) {
                $no++;
                ?>
                <tbody>
                  <tr>
                   <?php 
                   $newDate = date("d-m-Y", strtotime($notabaru->tanggal))
                   ?>
                   <td><?php echo $notabaru->no_nota  ?></td>
                   <td><?php echo  $newDate  ?></td>
                   <td><?php echo $notabaru->dari ?></td>
                   <td>Rp <?php echo number_format($notabaru->uang,2,',','.')  ?></td>
                   <td><?php echo $notabaru->terbilang  ?></td>
                   <td><?php echo $notabaru->penerima  ?></td>
                   <td><?php echo $notabaru->no_telp  ?></td>
                   <td><?php echo $notabaru->keterangan  ?></td>
                   <td><a href="<?php echo base_url();?>notabaru/edit/<?php echo $notabaru->id_notabaru ?>" class="btn btn-sm btn-warning ">Edit</a>
                    <a href="javascript:if(confirm('Apakah anda ingin menghapus?')){document.location='<?php echo base_url();?>notabaru/hapus/<?php echo $notabaru->id_notabaru ?>';}" class="btn btn-sm btn-danger">Hapus</button></td>
                    </tr>
                  </tbody>
                  <?php

                }
                ?>
              </table>
            </div>
          </div> -->
