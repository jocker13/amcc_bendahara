var transaksiumum;

transaksiumum = $('#table-transaksiumum').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "transaksiumum/ajax_list",
          "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });


//menampilkan laporan per bulan tahun

$('#tampiltran').on('click',function(){
	var bulan = $("#bulan").val();
	var tahun = $("#tahun").val();
	// var nama =$("#id_kegiatan option:selected").html();
	// // console.log(nama);
	// $('#id_kegiatan_modal').val(id_kegiatan);
	// $('#nama_kegiatan_modal').val(nama);
	// // console.log(id_kegiatan);
	console.log(bulan);
	console.log(tahun);

	//laporan transaksiumum
	tabel_laporan_tran = $('#table-laporan-transaksi').DataTable({
				destroy: true,
		        "processing": true, //Feature control the processing indicator.
		        "serverSide": true, //Feature control DataTables' server-side processing mode.
		        "order": [],
		        // "id_kegiatan" :id_kegiatan,//Initial no order.
		        // Load data for the table's content from an Ajax source
		        "ajax": {
		        	"url": "laporantransaksi/ajax_list",
		        	"type": "POST",
		        	"data":{
		        		bulan:bulan,
		        		tahun:tahun
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

    //cetak laporan transaksi
    function cetak_laporan_transaksi(id)
    {
    		var bulan = $("#bulan").val();
    	var tahun = $("#tahun").val();
    	console.log(tahun);

                	  window.open("<?php echo site_url('cetaktransaksi?bulan=')?>"+bulan+"&tahun="+tahun);
    }
