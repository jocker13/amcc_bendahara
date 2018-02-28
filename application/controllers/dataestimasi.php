<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dataestimasi extends CI_Controller {
	public $kegiatan='';
	public function __construct(){
		parent::__construct();
		$this->load->model("data_estimasi_model");
		$this->load->helper('url');
	}
	public function ajax_list()
	{
		// print_r($_POST);
		$id_kegiatan=$_POST['id_kegiatan'];
		$list = $this->data_estimasi_model->get_datatables($id_kegiatan);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $estimasi) {
			$no++;
			$jumlah = $estimasi->banyak*$estimasi->harga_satuan;
			$row = array();
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Pilih" onclick="pilih_estimasi_data('."'".$estimasi->id_estimasi."'".')"><i class="glyphicon glyphicon-ok"></i>Pilih</a>';
			
			$row[] = $estimasi->jenis;
			$row[] = $estimasi->nama_sie;
			$row[] = $estimasi->nama_estimasi;
			$row[] = $estimasi->banyak;
			$row[] = 'Rp '. number_format($estimasi->harga_satuan,2,',','.');
			$row[] = 'Rp '. number_format($jumlah,2,',','.');
			
			//add html for action
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->data_estimasi_model->count_all(),
						"recordsFiltered" => $this->data_estimasi_model->count_filtered($id_kegiatan),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function ajax_pilih($id)
	{
		$data=$this->data_estimasi_model->get_by_id($id);
		echo json_encode($data);
	}
}
