<?php 
    $op;
    $id_nota = "";
    $no_nota ="";
    $nama_kegiatan = "";
    $gambar = "";
if ($op=='edit')
 {
    foreach ($sql as $val) {
      $op = "edit";
      $id = $val->id_nota;
      $no_nota = $val->no_nota;
      $nama_kegiatan = $val->nama_kegiatan;
      $gambar = $val->gambar;
      }
    }
 ?>


<div class="row">
      <div class="col-lg-12">
      </br>
      </div>
</div><!--/.row-->

<div class="row">
  <div class="col-md-4">
    <div class="panel panel-default">
          <div class="panel-heading">INPUT DATA NOTA</div>
          <div class="panel-body">
                <form role="form"  action="<?php echo base_url(); ?>nota/simpan" method="POST">
                    <div class="form-group">
                         <input type="hidden" name="op" value="<?php echo $op ?>" class="form-control">
                          <input type="hidden" name="id_nota" value="<?php echo $id_nota ?>" class="form-control">
                        <label>No. Nota</label>
                        <input type="text" name="no_nota" value="<?php echo $no_nota ?>" class="form-control">
                    </div>
                    <div class="form-group">
                          <label>NAMA KEGIATAN</label>

                           <select class="form-control" name="id_kegiatan" >
                            <?php 
                              foreach ($kegiatan as $nama) {
                                
                              ?>
                              <option value="<?php echo $nama->id_kegiatan ?>" ><?php echo $nama->nama_kegiatan; ?>   (<?php echo $nama->tahun_kep; ?>)</option>
                             
                              <?php 

                              }
                             ?>
                              <!-- <input type="hidden" name="id_kegiatan" value="<?php echo $nama->id ?>"> -->
                            </select>
                    </div>
                  </br>
                   
                          <div class="form-group">
                              <label>Gambar Nota</label>
                              <div class="input-group">
                                  <span class="input-group-btn">
                                      <span class="btn btn-default btn-file">
                                          Browse… <input type="file" name="input_gambar" id="imgInp" value="">
                                      </span>
                                  </span>
                                  <input type="text" class="form-control" readonly >
                              </div>
                              <img id='img-upload'/>
                          </div>
                      
                    </br>
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
        <div class="panel-heading">Daftar Nota</div>
            <div class="panel-body">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr style="background: dodgerblue;">
                        <th style="text-align: center;">No. Nota</th>
                        <th style="text-align: center;">NAMA KEGIATAN</th>
                        <th style="text-align: center;">TAHUN</th>
                        <th style="text-align: center;">FILE</th>
                        <th style="text-align: center;">AKSI</th>
                      </tr>
                    </thead>
                    <?php
                        $no=0;
                        foreach ($sql as $nota) {
                          $no++;
                    ?>
                    <tbody>
                      <tr>
                        <td><?php echo $nota->no_nota  ?></td>
                        <td><?php echo $nota->nama_kegiatan  ?></td>
                        <td><?php echo $nota->tahun  ?></td>
                        <td><?php echo $nota->gambar  ?></td>
                        <td>
                           <a href="<?php echo base_url();?>nota/edit/<?php echo $nota->id_nota ?>" class="btn btn-sm btn-warning ">Edit</a>

                           <a href="javascript:if(confirm('Apakah anda ingin menghapus?')){document.location='<?php echo base_url();?>nota/hapus/<?php echo $nota->id_nota ?>';}" class="btn btn-sm btn-danger">Hapus</button>
                        </td>
                      </tr>
                     </tbody>
                      <?php

                        }
                      ?>
                  </table>
            </div>
      </div>
