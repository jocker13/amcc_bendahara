var realisasi;
var save_method;


realisasi = $('#tabel-realisasi').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "realisasi/ajax_list",
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

//realisai pilih estimasinya
function pilihestimasi(){
	$('#estimasipilih').modal('show');
	id_kegiatan=$('#id_kegiatan').val();
	dataestimasi = $('#estimasidata').DataTable({
				destroy: true,
		        "processing": true, //Feature control the processing indicator.
		        "serverSide": true, //Feature control DataTables' server-side processing mode.
		        "order": [],
		        // "id_kegiatan" :id_kegiatan,//Initial no order.
		        // Load data for the table's content from an Ajax source
		        "ajax": {
		        	"url": "dataestimasi/ajax_list",
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
}
function pilih_estimasi_data(id){
    $.ajax({
        url : "dataestimasi/ajax_pilih/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
        	var jumlah=data.banyak*data.harga_satuan;
        	// console.log(data);
        	console.log(jumlah);
            $('[name="id_estimasi"]').val(data.id_estimasi);
            $('[name="nama_estimasi"]').val(data.nama_estimasi);
            $('[name="banyak"]').val(data.banyak);
            $('[name="jenis"]').val(data.jenis);
            $('[name="nama_sie"]').val(data.nama_sie);

            $('[name="harga_satuan"]').val(data.harga_satuan);
            $('[name="jumlah"]').val(jumlah);
            $('#estimasipilih').modal('hide'); // show bootstrap modal when complete loaded

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
function pilih_nota(){
	$('#notapilih').modal('show');
	id_kegiatan=$('#id_kegiatan').val();
	datanota = $('#nota_data').DataTable({
				destroy: true,
		        "processing": true, //Feature control the processing indicator.
		        "serverSide": true, //Feature control DataTables' server-side processing mode.
		        "order": [],
		        // "id_kegiatan" :id_kegiatan,//Initial no order.
		        // Load data for the table's content from an Ajax source
		        "ajax": {
		        	"url": "datanota/ajax_list",
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
}
function edit_nota_1(id){
	 $.ajax({
        url : "datanota/ajax_pilih/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="no_nota"]').val(data.no_nota);
            $('[name="id_nota"]').val(data.id_nota);
            $('#notapilih').modal('hide'); // show bootstrap modal when complete loaded

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}


//realisasi

function reload_table_realisasi()
{
    realisasi.ajax.reload(null,false); //reload datatable ajax
}
function delete_realisasi(id)
{
	if(confirm('Anda yakin akan menghapus data?'))
	{
        // ajax delete data to database
        $.ajax({
        	url : "realisasi/ajax_delete/"+id,
        	type: "POST",
        	dataType: "JSON",
        	success: function(data)
        	{
                reload_table_realisasi();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
            	alert('Error deleting data');
            }
        });

    }
}
function edit_realisasi(id)
{
	save_method = 'update';

    //Ajax Load data from ajax
    $.ajax({
    	url : "realisasi/ajax_edit/"+id,
    	type: "GET",
    	dataType: "JSON",
    	success: function(data)
    	{

    		var jumlah=data.banyak*data.harga_satuan;
        	// console.log(data);
        	console.log(jumlah);
            $('[name="id_realisasi"]').val(data.id_realisasi);
            $('[name="id_estimasi"]').val(data.id_estimasi);
            $('[name="nama_realisasi"]').val(data.nama_realisasi);
            $('[name="banyak_realisasi"]').val(data.banyak);
            $('[name="jenis"]').val(data.jenis);
            $('[name="nama_sie"]').val(data.nama_sie);
            $('[name="harga_satuan_realisasi"]').val(data.harga_satuan);
            $('[name="jumlah"]').val(jumlah);
            $('[name="no_nota"]').val(data.id_nota);
            $('[name="id_nota"]').val(data.id_nota);
            $('[name="op"]').val('edit');
        },
        error: function (jqXHR, textStatus, errorThrown)
        {

        	alert('Error get data from ajax');
        }
    });
}
function save_realisasi()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'update') {
        url = "realisasi/ajax_update";
    } else {
        url = "realisasi/ajax_add";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
              // $('#form').clear();
              $("#notifications" ).show();
              $("#notifications" ).append( "<div class='alert alert-success'><h4>Berhasil </h4><p>data berhasil disimpan</p></div>" );

              $('#exampleModal').modal('hide');
                reload_table_realisasi();
                setInterval (function(){
                	 $("#notifications" ).hide();
                	},500);
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++)
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable

        }
    });
}
