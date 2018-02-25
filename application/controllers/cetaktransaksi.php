<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cetaktransaksi extends CI_Controller {

public function __construct(){
		parent::__construct();
		$this->load->model("transaksiumum_model");
		$this->load->helper('url');
	}
public function index()
	{
		$bulan=$_GET['bulan'];
		$tahun=$_GET['tahun'];

		$data = array(
			"container" => "cetaktransaksi"
		);
		// $id_notabaru=;
		$data['sql']=$this->transaksiumum_model->getTransaksiUmum($bulan,$tahun)->result();
		$data['ketua']=$this->transaksiumum_model->getKetua()->result();
		$data['admin']=$this->transaksiumum_model->getBendahara()->result();
		$this->load->view('cetaktransaksi',$data);
	}
}
