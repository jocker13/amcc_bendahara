 //cetak laporan estimasi
    function cetak_laporan_realisasi(id)
    {

    	var id_kegiatan = $("#id_kegiatan").val();
    	console.log(id_kegiatan);
        window.open("cetakrealisasi?id_kegiatan="+id_kegiatan);
    }

//buat nampilin 
$('#tampillaporanrealisasi').on('click',function(){
	var id_kegiatan = $("#id_kegiatan").val();
	var nama =$("#id_kegiatan option:selected").html();
	// console.log(nama);
	$('#id_kegiatan_modal').val(id_kegiatan);
	$('#nama_kegiatan_modal').val(nama);
//estimasi
 $('#tabel-realisasi-laporan').DataTable({
      destroy: true,
          "processing": true, //Feature control the processing indicator.
          "serverSide": true, //Feature control DataTables' server-side processing mode.
          "order": [],
          // "id_kegiatan" :id_kegiatan,//Initial no order.
          // Load data for the table's content from an Ajax source
          "ajax": {
            "url": "laporanrealisasi/ajax_list",
            "type": "POST",
            "data":{
              id_kegiatan:id_kegiatan
            }
          },

          //Set column definition initialisation properties.
          "columnDefs": [
          {
              "targets": [ -1 ], //last column
              "orderable": false, //set not orderable
          },
          ],

      });

});



