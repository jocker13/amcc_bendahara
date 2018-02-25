<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporantransaksi extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("laporan_transaksi_model");
		$this->load->helper('url');
	}
	public function index()
	{
		$data = array(
			"container" => "laporantransaksi"
		);
		
		$this->load->view("template", $data);
	}
	public function ajax_list()
	{
		$bulan=$_POST['bulan'];
		$tahun=$_POST['tahun'];
		$list = $this->laporan_transaksi_model->get_datatables($bulan,$tahun);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $tran) {
			$jumlah=$tran->banyak*$tran->harga_satuan;
			$no++;
			$row = array();
			$row[] = $tran->tanggal;
			$row[] = $tran->nama_transaksi;
			$row[] = $tran->jenis;	
			$row[] = $tran->nama_sie;
			$row[] = $tran->banyak;
			$row[] = 'Rp '. number_format($tran->harga_satuan,2,',','.');
			$row[] = 'Rp '. number_format($jumlah,2,',','.');
			$row[] = 'Rp '. number_format($tran->saldo,2,',','.');
			
			//add html for action
/*			$row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_transaksiumum('."'".$tran->id_tran."'".')"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_transaksiumum('."'".$tran->id_tran."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';*/
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->laporan_transaksi_model->count_all(),
						"recordsFiltered" => $this->laporan_transaksi_model->count_filtered($bulan,$tahun),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
}
