<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cetakrealisasi extends CI_Controller {

public function __construct(){
		parent::__construct();
		$this->load->model("realisasi_model");
		$this->load->helper('url');
	}
public function index()
	{
		

		$data = array(
			"container" => "cetakrealisasi"
		);
		$this->load->view('cetakrealisasi',$data);
	}
}
