<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
	$nim = ($this->session->userdata['logged_in']['nim']);
	$nama = ($this->session->userdata['logged_in']['nama']);
	$email = ($this->session->userdata['logged_in']['email']);
	$level = ($this->session->userdata['logged_in']['level']);
} else {
header("location: login");
}
?>
<head>
	<link rel="icon" href="<?=base_url('assets/img/amcc.png');?>" type="image/gif">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>AMCC - Dashboard</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/font-awesome.min.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/datepicker3.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/css/styles.css')?>" rel="stylesheet">
	<link href="<?php echo base_url('assets/js/lumino.glyphs')?>" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/DataTables/datatables.css')?>">

	<script src="js/lumino.glyphs.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
					<a class="navbar-brand" href="#"><span>Keuangan</span>AMCC</a>
					<ul class="nav navbar-top-links navbar-right">
						<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
							<em class="fa fa-envelope"></em><span class="label label-danger">15</span>
						</a>
						<ul class="dropdown-menu dropdown-messages">
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
								</a>
								<div class="message-body"><small class="pull-right">3 mins ago</small>
									<a href="#"><strong>John Doe</strong> commented on <strong>your photo</strong>.</a>
									<br /><small class="text-muted">1:24 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="dropdown-messages-box"><a href="profile.html" class="pull-left">
									<img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
								</a>
								<div class="message-body"><small class="pull-right">1 hour ago</small>
									<a href="#">New message from <strong>Jane Doe</strong>.</a>
									<br /><small class="text-muted">12:27 pm - 25/03/2015</small></div>
								</div>
							</li>
							<li class="divider"></li>
							<li>
								<div class="all-button"><a href="#">
									<em class="fa fa-inbox"></em> <strong>All Messages</strong>
								</a></div>
							</li>
						</ul>
					</li>
					<li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
						<em class="fa fa-bell"></em><span class="label label-info">5</span>
					</a>
					<ul class="dropdown-menu dropdown-alerts">
						<li><a href="#">
							<div><em class="fa fa-envelope"></em> 1 New Message
								<span class="pull-right text-muted small">3 mins ago</span></div>
							</a></li>
							<li class="divider"></li>
							<li><a href="#">
								<div><em class="fa fa-heart"></em> 12 New Likes
									<span class="pull-right text-muted small">4 mins ago</span></div>
								</a></li>
								<li class="divider"></li>
								<li><a href="#">
									<div><em class="fa fa-user"></em> 5 New Followers
										<span class="pull-right text-muted small">4 mins ago</span></div>
									</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div><!-- /.container-fluid -->
			</nav>
			<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
				<div class="profile-sidebar">
					<div class="profile-userpic">
						<img src="<?php echo base_url('assets/img/amcc1.png') ?>" class="img-responsive" alt="">
					</div>
					<div class="profile-usertitle">
						<div class="profile-usertitle-name"><?php echo $nama;  ?></div>
						<div class="profile-usertitle-status"><span class="indicator label-success"></span><?php echo $nim;  ?></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="divider"></div>
				
				<ul class="nav menu">
					
					<?php if($level == 'admin'): ?>
						<li><a href="<?php echo base_url('/user') ?>"><img src="<?php echo base_url('assets/img/users.png') ?>" >&nbsp; Pengguna</a></li>   
					<?php endif; ?>
					<?php if($level == 'admin' || $level == 'users'): ?>
						<li><a href="<?php echo base_url('/kegiatan') ?>"><img src="<?php echo base_url('assets/img/list.png') ?>">&nbsp; Kegiatan</a></li>
					<?php endif; ?>
					<?php if($level == 'admin' || $level == 'users'): ?>
						<li><a href="<?php echo base_url('/estimasi') ?>"><img src="<?php echo base_url('assets/img/currency.png') ?>">&nbsp; Estimasi</a></li>
					<?php endif; ?>

					<?php if($level == 'admin' || $level == 'users'): ?>
						<li><a href="<?php echo base_url('/realisasi') ?>"><img src="<?php echo base_url('assets/img/coins.png') ?>">&nbsp; Realisasi</a></li>
					<?php endif; ?>
					<?php if($level == 'admin'): ?>
						<li><a href="<?php echo base_url('/transaksiumum') ?>"><img src="<?php echo base_url('assets/img/money-bag.png') ?>">&nbsp; Transaksi Umum</a></li>
					<?php endif; ?>
<!-- 					<?php if($level == 'admin'): ?>
						<li><a href="<?php echo base_url('/detailtransaksi') ?>"><img src="<?php echo base_url('assets/img/checklist.png') ?>">&nbsp; Detail Transaksi</a></li>
					<?php endif; ?> -->
					<?php if($level == 'admin' || $level == 'users'): ?>
						<li class="parent "><a data-toggle="collapse" href="#sub-item-1">
						<img src="<?php echo base_url('assets/img/check.png') ?>"> Lampiran Nota <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
						</a>
						<ul class="children collapse" id="sub-item-1">
							<li><a class="" href="<?php echo base_url('/nota') ?>">
								<span class="fa fa-arrow-right">&nbsp;</span> Nota Kegiatan
							</a></li>
							<li><a class="" href=" <?php echo base_url('/notabaru') ?>">
								<span class="fa fa-arrow-right">&nbsp;</span> Nota Baru
							</a></li>
						</ul>
					<?php endif; ?>
					<li class="parent "><a data-toggle="collapse" href="#sub-item-2">
						<img src="<?php echo base_url('assets/img/invoice.png') ?>"> Laporan<span data-toggle="collapse" href="#sub-item-2" class="icon pull-right"><em class="fa fa-plus"></em></span>
					</a>
					<ul class="children collapse" id="sub-item-2">
						<li><a class="" href="<?php echo base_url('/laporanestimasi') ?>">
							<span class="fa fa-arrow-right">&nbsp;</span> Estimasi
						</a></li>
						<li><a class="" href=" <?php echo base_url('/laporan_realisasi') ?>">
							<span class="fa fa-arrow-right">&nbsp;</span> Realisasi
						</a></li>
						<?php if($level == 'admin' || $level == 'ketua'): ?>
							<li><a class="" href="<?php echo base_url('/laporantransaksi') ?>">
								<span class="fa fa-arrow-right">&nbsp;</span> Transaksi Umum
							</a></li>
						<?php endif; ?>
					</ul>
				<li><a href="javascript:if(confirm('Apakah anda ingin logout?')){document.location='<?php echo base_url();?>login/logout';}"><img src="<?php echo base_url('assets/img/close-circular-button-of-a-cross.png') ?>" > Logout</a></li>
			</ul>
		</div>

		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
			<?php $this->load->view($container)?>
		</div>
		<script src="<?php echo base_url('assets/js/jquery-1.11.1.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/chart.min.js')?>"></script>
		<script src="<?php echo base_url('assets/js/chart-data.js')?>"></script>
		<script src="<?php echo base_url('assets/js/easypiechart.js')?>"></script>
		<script src="<?php echo base_url('assets/js/easypiechart-data.js')?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js')?>"></script>
		<script src="<?php echo base_url('assets/js/custom.js')?>"></script>

		<script type="text/javascript" charset="utf8" src="<?php echo base_url('assets/DataTables/datatables.js')?>"></script>



<script type="text/javascript">

var save_method; //for save method string
var table;
var pengguna;
var notabaru;
var estimasi;
var transaksiumum;
var tabel_laporan_tran;


$('#notifications').slideDown('slow').delay(1000).slideUp('slow');
$('#tambah').on('click', function() {
	var data = $("#id_kegiatan").val();
	console.log(data);
	$("#model-kegiatan").val(data);

});
$('#tampil').on('click',function(){ 
	var id_kegiatan = $("#id_kegiatan").val();
	var nama =$("#id_kegiatan option:selected").html();
	// console.log(nama);
	$('#id_kegiatan_modal').val(id_kegiatan);
	$('#nama_kegiatan_modal').val(nama);
	// console.log(id_kegiatan);

	//estimasi
	estimasi = $('#tabel-estimasi').DataTable({ 
				destroy: true,
		        "processing": true, //Feature control the processing indicator.
		        "serverSide": true, //Feature control DataTables' server-side processing mode.
		        "order": [], 
		        // "id_kegiatan" :id_kegiatan,//Initial no order.
		        // Load data for the table's content from an Ajax source
		        "ajax": {
		        	"url": "<?php echo site_url('estimasi/ajax_list')?>",
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
//estimasi
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

	//estimasi
	tabel_laporan_tran = $('#table-laporan-transaksi').DataTable({ 
				destroy: true,
		        "processing": true, //Feature control the processing indicator.
		        "serverSide": true, //Feature control DataTables' server-side processing mode.
		        "order": [], 
		        // "id_kegiatan" :id_kegiatan,//Initial no order.
		        // Load data for the table's content from an Ajax source
		        "ajax": {
		        	"url": "<?php echo site_url('laporantransaksi/ajax_list')?>",
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

// javascript untuk kegiatan
table = $('#kegiatan').DataTable({ 

		        "processing": true, //Feature control the processing indicator.
		        "serverSide": true, //Feature control DataTables' server-side processing mode.
		        "order": [], //Initial no order.

		        // Load data for the table's content from an Ajax source
		        "ajax": {
		        	"url": "<?php echo site_url('kegiatan/ajax_list')?>",
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
 pengguna = $('#table-pengguna').DataTable({ 

		        "processing": true, //Feature control the processing indicator.
		        "serverSide": true, //Feature control DataTables' server-side processing mode.
		        "order": [], //Initial no order.

		        // Load data for the table's content from an Ajax source
		        "ajax": {
		        	"url": "<?php echo site_url('user/ajax_list')?>",
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
  notabaru = $('#table-notabaru').DataTable({ 

		        "processing": true, //Feature control the processing indicator.
		        "serverSide": true, //Feature control DataTables' server-side processing mode.
		        "order": [], //Initial no order.

		        // Load data for the table's content from an Ajax source
		        "ajax": {
		        	"url": "<?php echo site_url('notabaru/ajax_list')?>",
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
    transaksiumum = $('#table-transaksiumum').DataTable({ 

		        "processing": true, //Feature control the processing indicator.
		        "serverSide": true, //Feature control DataTables' server-side processing mode.
		        "order": [], //Initial no order.

		        // Load data for the table's content from an Ajax source
		        "ajax": {
		        	"url": "<?php echo site_url('transaksiumum/ajax_list')?>",
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
        	url : "<?php echo site_url('kegiatan/ajax_delete')?>/"+id,
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
    	url : "<?php echo site_url('kegiatan/ajax_edit/')?>/"+id,
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
        	url : "<?php echo site_url('user/ajax_delete')?>/"+id,
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
    	url : "<?php echo site_url('user/ajax_edit/')?>/"+id,
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
        	url : "<?php echo site_url('notabaru/ajax_delete')?>/"+id,
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
//cetak nota baru
function cetak_notabaru(id)
{
		console.log(id);

            	 window.open("<?php echo site_url('cetaknotabaru?id_notabaru=')?>"+id);
}
//cetak laporan transaksi
function cetak_laporan_transaksi(id)
{
		var bulan = $("#bulan").val();
	var tahun = $("#tahun").val();
	console.log(tahun);

            	  window.open("<?php echo site_url('cetaktransaksi?bulan=')?>"+bulan+"&tahun="+tahun);
}

function edit_notabaru(id)
{
	save_method = 'update';

    //Ajax Load data from ajax
    $.ajax({
    	url : "<?php echo site_url('notabaru/ajax_edit/')?>/"+id,
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

    // ajax untuk notabaru

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
        	url : "<?php echo site_url('estimasi/ajax_delete')?>/"+id,
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
        url : "<?php echo site_url('estimasi/ajax_edit/')?>/" + id,
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
        url = "<?php echo site_url('estimasi/ajax_add')?>";
    } else {
        url = "<?php echo site_url('estimasi/ajax_update')?>";
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
    // ajax untuk estimasi

   

</script>


	</body>
	</html>
