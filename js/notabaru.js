var notabaru;

notabaru = $('#table-notabaru').DataTable({

          "processing": true, //Feature control the processing indicator.
          "serverSide": true, //Feature control DataTables' server-side processing mode.
          "order": [], //Initial no order.

          // Load data for the table's content from an Ajax source
          "ajax": {
            "url": "notabaru/ajax_list",
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

      // ajax untuk notabaru
      function reload_table_notabaru()
      {
          notabaru.ajax.reload(null,false); //reload datatable ajax
      }
      function delete_notabaru(id)
      {
      	if(confirm('Anda yakin akan menghapus data?'))
      	{
              // ajax delete data to database
              $.ajax({
              	url : "notabaru/ajax_delete"+id,
              	type: "POST",
              	dataType: "JSON",
              	success: function(data)
              	{
                      reload_table_notabaru();
                  },
                  error: function (jqXHR, textStatus, errorThrown)
                  {
                  	alert('Error deleting data');
                  }
              });

          }
      }

      function edit_notabaru(id)
      {
      	save_method = 'update';

          //Ajax Load data from ajax
          $.ajax({
          	url : "notabaru/ajax_edit"+id,
          	type: "GET",
          	dataType: "JSON",
          	success: function(data)
          	{
          		console.log(data);

          		$('#id_notabaru').val(data.id_notabaru);
          		$('#no_nota').val(data.no_nota);
          		$('#tanggal').val(data.tanggal);
          		$('#dari').val(data.dari);
          		$('#uang').val(data.uang);
          		$('#terbilang').val(data.terbilang);
          		$('#institusi').val(data.institusi);
          		$('#penerima').val(data.penerima);
          		$('#no_telp').val(data.no_telp);
          		$('#keterangan').val(data.keterangan);
          		$('#op').val('edit');
              },
              error: function (jqXHR, textStatus, errorThrown)
              {

              	alert('Error get data from ajax');
              }
          });
          }

      //cetak nota baru
      function cetak_notabaru(id)
      {
      		console.log(id);

                  	 window.open("cetaknotabaru?id_notabaru="+id);
      }
