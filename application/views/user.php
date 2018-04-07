<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div> 
<div class="row">
  <div class="col-lg-12">
    <br>
  </div>
</div><!--/.row-->

<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading">INPUT DATA PENGGUNA</div>
      <div class="panel-body">
       <div class="row">
         <div class="col-md-6">

          <form role="form"  action="<?php echo base_url(); ?>User/simpan" method="POST">
            <div class="form-group">
              <input type="hidden" name="op" id="op" value="tambah" class="form-control">
              <input type="hidden" name="id_users" id="id_users"  class="form-control">
              <label>NIM</label>
              <input type="text" name="nim" id="nim" ="nim" class="form-control" required  oninvalid="this.setCustomValidity('NIM Harus Diisi')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
              <label>NAMA</label>
              <input type="text" name="nama"  id="nama" class="form-control" required  oninvalid="this.setCustomValidity('Nama Harus Diisi')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
              <label>Jabatan</label>
              <select class="form-control" name="jabatan"  id="jabatan" >
                <option value="">--Pilih Jabatan--</option>
                <option value="admin">Admin</option>
                <option value="ketua">Ketua</option>
                <option value="users">Users</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">     
            <div class="form-group">
              <label>Email</label>
              <input type="email" name="email"  id="email" class="form-control" required  oninvalid="this.setCustomValidity('Email Harus Diisi')" >
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="password" id="password"  class="form-control" required  oninvalid="this.setCustomValidity('Password Harus Diisi')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group">
              <label>Nomor Telp</label>
              <input type="text" name="notelp"  id="notelp" class="form-control" required  oninvalid="this.setCustomValidity('Nomor Telp Harus Diisi')" onkeyup="this.value=this.value.replace(/[^\d]/,'')" oninput="setCustomValidity('')">
            </div>
            <div class="form-group" align="right">
              <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-save"></i> Simpan </button>
            </div>
          </form>
        </div><!--End .article-->
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-heading">DAFTAR PENGGUNA</div>
                <div class="panel-body">

                  <table id="table-pengguna" class="table table-striped table-bordered" >
                    <thead>
                      <tr>
                        <th style="background: dodgerblue; text-align: center;">NIM</th>
                        <th style="background: dodgerblue; text-align: center;">NAMA</th>
                        <th style="background: dodgerblue; text-align: center;">JABATAN</th>
                        <th style="background: dodgerblue; text-align: center;">EMAIL</th>
                        <th style="background: dodgerblue; text-align: center;">NO. TEL</th>
                        <th style="background: dodgerblue; text-align: center;">AKSI</th>

                      </tr>
                    </thead>
                  </table>
                </div>
              </div>
            </div>
          </div>
