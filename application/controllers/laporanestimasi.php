<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporanestimasi extends CI_Controller {
	public $kegiatan='';
	public function __construct(){
		parent::__construct();
		$this->load->model("estimasi_model");
		$this->load->model("kegiatan_model");
		$this->load->helper('url');
	}

	public function index()
	{
		$tahun  = $this->input->post('tahun');
		$kegiatan  = $this->input->post('kegiatan');
		$data = array(
			"container" => "laporanestimasi"
		);
		$data['op']='tambah';
		$id_users = $this->session->userdata()['logged_in']['id_users'];
		$data['kegiatan']=$this->kegiatan_model->getKegiatanestimasi($id_users)->result();
		$this->load->view("template", $data);
	}
	public function ajax_list()
	{
		$id_kegiatan=$_POST['id_kegiatan'];
		$list = $this->estimasi_model->get_datatables($id_kegiatan);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $estimasi) {
			$no++;
			$jumlah = $estimasi->banyak*$estimasi->harga_satuan;
			$row = array();
			$row[] = $no;
			$row[] = $estimasi->jenis;
			$row[] = $estimasi->nama_sie;
			$row[] = $estimasi->nama_estimasi;
			$row[] = $estimasi->banyak;
			$row[] = 'Rp '. number_format($estimasi->harga_satuan,2,',','.');
			$row[] = 'Rp '. number_format($jumlah,2,',','.');
			

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->estimasi_model->count_all(),
			"recordsFiltered" => $this->estimasi_model->count_filtered($id_kegiatan),
			"data" => $data,
		);
		echo json_encode($output);
	}

}
