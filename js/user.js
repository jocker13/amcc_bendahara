var pengguna;


 pengguna = $('#table-pengguna').DataTable({

		        "processing": true, //Feature control the processing indicator.
		        "serverSide": true, //Feature control DataTables' server-side processing mode.
		        "order": [], //Initial no order.

		        // Load data for the table's content from an Ajax source
		        "ajax": {
		        	"url": "user/ajax_list",
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


        // ajax untuk Pengguna
        function reload_table_user()
        {
            pengguna.ajax.reload(null,false); //reload datatable ajax
        }
        function delete_user(id)
        {
        	if(confirm('Anda yakin akan menghapus data?'))
        	{
                // ajax delete data to database
                $.ajax({
                	url : "user/ajax_delete/"+id,
                	type: "POST",
                	dataType: "JSON",
                	success: function(data)
                	{

                        reload_table_user();
                    },
                    error: function (jqXHR, textStatus, errorThrown)
                    {
                    	alert('Error deleting data');
                    }
                });

            }
        }
        function edit_user(id)
        {
        	save_method = 'update';
            //Ajax Load data from ajax
            $.ajax({
            	url : "user/ajax_edit/"+id,
            	type: "GET",
            	dataType: "JSON",
            	success: function(data)
            	{
            		console.log(data);

            		$('#id_users').val(data.id_users);
            		$('#nama').val(data.nama);
            		$('#nim').val(data.nim);
            		$('#email').val(data.email);
            		$('#jabatan').val(data.jabatan);
            		$('#notelp').val(data.notelp);
            		$('#password').val(data.password);
            		$('#op').val('edit');
                },
                error: function (jqXHR, textStatus, errorThrown)
                {

                	alert('Error get data from ajax');
                }
            });
            }

            // ajax untuk Pengguna
