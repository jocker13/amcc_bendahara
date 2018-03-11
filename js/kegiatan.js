var table;

table = $('#kegiatan').DataTable({

		        "processing": true, //Feature control the processing indicator.
		        "serverSide": true, //Feature control DataTables' server-side processing mode.
		        "order": [], //Initial no order.

		        // Load data for the table's content from an Ajax source
		        "ajax": {
		        	"url": "kegiatan/ajax_list",
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


        function reload_table()
        {
            table.ajax.reload(null,false); //reload datatable ajax
        }
        function delete_kegiatan(id)
        {
        	if(confirm('Anda yakin akan menghapus data?'))
        	{
                // ajax delete data to database
                $.ajax({
                	url : "kegiatan/ajax_delete/"+id,
                	type: "POST",
                	dataType: "JSON",
                	success: function(data)
                	{
                        //if success reload ajax table
                        $('#modal_form').modal('hide');
                        reload_table();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                    	alert('Error deleting data');
                    }
                });

            }
        }
        function edit_kegiatan(id)
        {
        	save_method = 'update';

            //Ajax Load data from ajax
            $.ajax({
            	url : "kegiatan/ajax_edit/"+id,
            	type: "GET",
            	dataType: "JSON",
            	success: function(data)
            	{
            		console.log(data);

            		$('#id_kegiatan').val(data.id_kegiatan);
            		$('#nama_kegiatan').val(data.nama_kegiatan);
            		$('#tahun_kep').val(data.tahun_kep);
            		$('#tanggal').val(data.tanggal);
            		$('#op').val('edit');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {

                	alert('Error get data from ajax');
                }
            });
          }
