<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cetakrealisasi extends CI_Controller {

public function __construct(){
		parent::__construct();
		$this->load->model("cetakrealisasi_model");
		$this->load->model("cetakestimasi_model");
		$this->load->model("realisasi_model");
		$this->load->helper('url');
	}
public function index()
	{
		
		$id_kegiatan=$_GET['id_kegiatan'];
		$data = array(
			"container" => "cetakrealisasi"
		);
		$data['sql']=$this->cetakestimasi_model->getData($id_kegiatan)->result();
		$data['sqlkesekretariatan']=$this->cetakestimasi_model->getDataKesekretariatan($id_kegiatan)->result();
		$data['sqlacara']=$this->cetakestimasi_model->getDataAcara($id_kegiatan)->result();
		$data['sqlhumas']=$this->cetakestimasi_model->getDataHumas($id_kegiatan)->result();
		$data['sqlpdd']=$this->cetakestimasi_model->getDataPdd($id_kegiatan)->result();
		$data['sqlkonsumsi']=$this->cetakestimasi_model->getDataKonsumsi($id_kegiatan)->result();
		$data['sqlperlengkapan']=$this->cetakestimasi_model->getDataPerlengkapan($id_kegiatan)->result();
		$data['sqlp3k']=$this->cetakestimasi_model->getDataP3k($id_kegiatan)->result();
		$data['kegiatan']=$this->cetakestimasi_model->getKegiatan($id_kegiatan)->result();

		$data['sqlRealisasiSumberDana']=$this->cetakrealisasi_model->getRealisasiSumberDana($id_kegiatan)->result();
		$data['sqlRealisasiKesekretariatan']=$this->cetakrealisasi_model->getRealisasiKesekretariatan($id_kegiatan)->result();

		$this->load->view('cetakrealisasi',$data);

	}
}
