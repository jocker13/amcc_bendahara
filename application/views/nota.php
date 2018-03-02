<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
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
                <form role="form"  enctype="multipart/form-data" action="<?php echo base_url(); ?>nota/simpan" method="POST">
                    <div class="form-group">
                         <input type="hidden" name="op" id="op" value="tambah" class="form-control">
                          <input type="hidden" name="id_nota" id="id_nota" value="" class="form-control">
                        <label>No. Nota</label>
                        <input type="text" name="no_nota" id="no_nota" value="" class="form-control" required  oninvalid="this.setCustomValidity('No Nota harus Diisi')" onkeyup="this.value=this.value.replace(/[^\d]/,'')">
                    </div>
                    <div class="form-group">
                          <label>NAMA KEGIATAN</label>

                           <select class="form-control" id="id_kegiatan" name="id_kegiatan" required  oninvalid="this.setCustomValidity('kegiatan harus dipilih')"
                                     oninput="setCustomValidity('')"/>
                              <option>--Pilih Kegiatan--</option>
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
                                          Browse… <input type="file" name="input_gambar" id="imgInp" value="" >
                                      </span>
                                  </span>
                                  <input type="text" id="text-gambar" class="form-control"  required  oninvalid="this.setCustomValidity('Gambar harus diisi')"
                                     oninput="setCustomValidity('')"/>
                              </div>
                              <img id='img-upload'/>
                          </div>
                      
                    </br>
                   <div class="form-group" align="right">
                        <button onclick="validasi()" type="submit" class="btn btn-primary">Simpan</button>
                   </div>
                </form> 

                  <div class="clear"></div>
      </div><!--End .article-->
    </div>
  </div><!--End .articles-->

<!-- 
<div class="row"> -->
  <div class="col-md-8">
    <div class="panel panel-default">
        <div class="panel-heading">Daftar Nota</div>
            <div class="panel-body">
                  <table id="notakegiatan" class="table table-bordered table-striped">
                    <thead>
                      <tr style="background: dodgerblue;">
                        <th style="text-align: center;">No. Nota</th>
                        <th style="text-align: center;">NAMA KEGIATAN</th>
                        <th style="text-align: center;">FILE</th>
                        <th style="text-align: center;">AKSI</th>
                      </tr>
                    </thead>
                    <!-- <?php
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
                      ?> -->
                  </table>
            </div>
      </div>
  