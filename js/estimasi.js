var estimasi;
var save_method;
$('#tampil').on('click',function(){
	var id_kegiatan = $("#id_kegiatan").val();
	var nama =$("#id_kegiatan option:selected").html();
	// console.log(nama);
	$('#id_kegiatan_modal').val(id_kegiatan);
	$('#nama_kegiatan_modal').val(nama);
//estimasi
estimasi = $('#tabel-estimasi').DataTable({
      destroy: true,
          "processing": true, //Feature control the processing indicator.
          "serverSide": true, //Feature control DataTables' server-side processing mode.
          "order": [],
          // "id_kegiatan" :id_kegiatan,//Initial no order.
          // Load data for the table's content from an Ajax source
          "ajax": {
            "url": "estimasi/ajax_list",
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


// ajax untuk estimasi
function reload_table_estimasi()
{
    estimasi.ajax.reload(null,false); //reload datatable ajax
}
function delete_estimasi(id)
{
	if(confirm('Anda yakin akan menghapus data?'))
	{
        // ajax delete data to database
        $.ajax({
        	url : "estimasi/ajax_delete/"+id,
        	type: "POST",
        	dataType: "JSON",
        	success: function(data)
        	{
                reload_table_estimasi();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
            	alert('Error deleting data');
            }
        });

    }
}
function edit_estimasi(id)
{
	save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    var id_kegiatan = $("#id_kegiatan").val();
	var nama =$("#id_kegiatan option:selected").html();
	// console.log(nama);
	$('#id_kegiatan_modal').val(id_kegiatan);
	$('#nama_kegiatan_modal').val(nama);
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "estimasi/ajax_edit/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id_estimasi"]').val(data.id_estimasi);
            $('[name="nama_estimasi"]').val(data.nama_estimasi);
            $('[name="banyak"]').val(data.banyak);
            $('[name="jenis"]').val(data.jenis);
            $('[name="nama_sie"]').val(data.nama_sie);
            $('[name="harga_satuan"]').val(data.harga_satuan);
            $('#exampleModal').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Estimasi'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }
    function add_estimasi()
{

    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    var id_kegiatan = $("#id_kegiatan").val();
	var nama =$("#id_kegiatan option:selected").html();
	// console.log(nama);
	$('#id_kegiatan_modal').val(id_kegiatan);
	$('#nama_kegiatan_modal').val(nama);
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#exampleModal').modal('show'); // show bootstrap modal
    $('.modal-title').text('Tambah Data Estimasi'); // Set Title to Bootstrap modal title
}
function save_estimasi()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable
    var url;

    if(save_method == 'add') {
        url = "estimasi/ajax_add";
    } else {
        url = "estimasi/ajax_update";
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
              $("#notifications" ).show();
              $("#notifications" ).append( "<div class='alert alert-success'><h4>Berhasil </h4><p>data berhasil disimpan</p></div>" );

              $('#exampleModal').modal('hide');
                reload_table_estimasi();
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
