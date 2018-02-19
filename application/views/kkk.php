<div id="page_content">
 <div id="top_bar">
     <ul id="breadcrumbs">
         <li><a href="<?php echo base_url() ?>dashboard">Dashboard</a></li>
         <!-- <li><a href="#">Components</a></li> -->
         <li><span>Daftar Penjualan Hari Ini</span></li>
     </ul>
 </div>
 <div id="page_content_inner">
  <h3 class="heading_b uk-margin-bottom">Unloading Product Ice Cream</h3>

  <div class="md-card">
   <div class="md-card-content">
    <div class="uk-grid">
     <div class="uk-width-1-1">
      <?php echo validation_errors() ?>
      <?php echo form_open_multipart('penjualan/unloadingproduct','class="uk-form"') ?>
       <table class="uk-table uk-table-hover  uk-text-nowrap" >
       <thead>
        <th>#</th>
        <th class="uk-text-center">Tanggal</th>
        <th class="uk-text-center">Kode Penjualan</th>
        <th class="uk-text-center">Nama Mr. Wall's</th>
        <th class="uk-text-center">Action</th>
       </thead>
       <tbody>
        <?php $no=1; ?>
        <?php foreach($penjualanToday as $penjualanToday): ?>
        <tr>
         <td><?php echo $no++; ?></td> 
         <td class="uk-text-center"><?php echo $penjualanToday->created_at; ?></td> 
         <td class="uk-text-center"><a href="" class ="panggilModal" data-id="<?php echo $penjualanToday->id_penjualan ?>"><?php echo $penjualanToday->id_penjualan ?></a></td> 
         <td class="uk-text-center"><?php echo $penjualanToday->nama_mrwalls ?></td>
         <td class="uk-text-center">
          <a href="<?php echo site_url('penjualan/setoran/') ?><?php echo $penjualanToday->id_penjualan ?>"><button type="button" class="uk-button uk-button-primary uk-button-small" data-id="<?php echo $penjualanToday->id_penjualan ?>">Setor</button></a>
          <a onclick="UIkit.modal.confirm('Yakin Hapus Product Ini ? ', function(){ location.href = '<?php echo site_url('penjualan/delete/') ?><?php echo $penjualanToday->id_penjualan ?>';});"><button type="button" class="uk-button uk-button-primary uk-button-small delete" data-id="#id#">Hapus</button></a>
         </td> 
        </tr>
        <?php endforeach; ?>
       </tbody>
      </table>
      <?php echo form_close() ?>

      <!-- This is an anchor toggling the modal -->
      <!-- Iki Modal Gan -->
      <div id="my-id" class="uk-modal">
       <div class="uk-modal-dialog uk-modal-dialog-large">
        <!-- Disini dinamis  -->
       </div>
      </div> 
     </div>
    </div>
   </div>
  </div>
 </div>
</div>


  <script>
   $(document).ready(function(){
    var modal = UIkit.modal("#my-id");
    $('.panggilModal').click(function(e){
     var id =  $(this).data('id');
     e.preventDefault();
     $.get('<?php echo site_url('penjualan/modal') ?>?id=' + id, function(html){
                 $('.uk-modal-dialog').html(html);
             });
     modal.show();
    })
   })
  </script>



  <script>
      function NotifBerhasil() {
          UIkit.notify({
          message : 'Input Data Penjualan Berhasil',
          status  : 'success',
          timeout : 3000,
          pos     : 'bottom-right'
          });
      }
   </script>