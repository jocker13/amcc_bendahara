<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cetakestimasi extends CI_Controller {

public function __construct(){
		parent::__construct();
		$this->load->model("estimasi_model");
		$this->load->helper('url');
	}
public function index()
	{
		

		$data = array(
			"container" => "cetakestimasi"
		);
		// $id_notabaru=;
		$data['sql']=$this->estimasi_model->getEstimasi()->result();
		$this->load->view('cetakestimasi',$data);
	}
}
