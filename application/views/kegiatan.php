<div class="row">
  <div class="col-lg-12">
  </br>
</div>
</div><!--/.row-->

<div class="row">
  <div class="col-md-4">
    <div class="panel panel-default">
      <div class="panel-heading">Input Data Kegiatan</div>
      <div class="panel-body">
        <form role="form"  action="<?php echo base_url(); ?>Kegiatan/simpan" method="POST">

          <div class="form-group">
            <input type="hidden" name="op" id="op" value="" class="form-control">
            <input type="hidden" name="id_kegiatan" id="id_kegiatan" value="" class="form-control">
            <label>TAHUN KEPENGURUSAN</label>
            <input type="text" name="tahun_kep" id="tahun_kep" value="" class="form-control" placeholder="2016/2017">
          </div>
          <div class="form-group">
            <label>NAMA KEGIATAN</label>
            <input type="text" name="nama_kegiatan" id="nama_kegiatan" value="" class="form-control">
          </div> 
          <div class="form-group">
            <label>TANGGAL</label>
            <input type="date" name="tanggal" id="tanggal" value="" class="form-control">
          </div>
          <div class="form-group" align="right">
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
        </form> 

        <div class="clear"></div>
      </div><!--End .article-->
    </div>
  </div><!--End .articles-->
  <div class="row">
    <div class="col-md-7">
      <div class="panel panel-default">
        <div class="panel-heading">Daftar Kegiatan</div>
        <div class="panel-body">

          <table id="kegiatan" class="table table-striped table-bordered" >
            <thead>
              <tr style="background: dodgerblue;">
                <th style="text-align: center;">TAHUN</th>
                <th style="text-align: center;">NAMA KEGIATAN</th>
                <th style="text-align: center;">TANGGAL</th>
                <th style="text-align: center;">AKSI</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>   

