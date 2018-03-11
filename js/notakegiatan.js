var notakegiatan;


notakegiatan = $('#notakegiatan').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
          "url": "nota/ajax_list",
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
    // ajax untuk notakegiatan
    function reload_table_nota()
    {
        notakegiatan.ajax.reload(null,false); //reload datatable ajax
    }
    function delete_nota(id)
    {
    	if(confirm('Anda yakin akan menghapus data?'))
    	{
            // ajax delete data to database
            $.ajax({
            	url : "nota/ajax_delete"+id,
            	type: "POST",
            	dataType: "JSON",
            	success: function(data)
            	{
                    reload_table_nota();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                	alert('Error deleting data');
                }
            });

        }
    }
    function edit_nota(id)
    {
    	save_method = 'update';

        //Ajax Load data from ajax
        $.ajax({
        	url : "nota/ajax_edit"+id,
        	type: "GET",
        	dataType: "JSON",
        	success: function(data)
        	{
        		console.log(data);

        		$('#id_kegiatan').val(data.id_kegiatan);
        		$('#id_nota').val(data.id_nota);
        		$('#no_nota').val(data.no_nota);
        		$('#img-upload').attr('src','<?php echo site_url('upload/')?>/'+data.gambar);
        		$('#op').val('edit');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {

            	alert('Error get data from ajax');
            }
        });
    }
