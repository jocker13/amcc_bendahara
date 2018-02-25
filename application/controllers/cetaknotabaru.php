<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cetaknotabaru extends CI_Controller {

public function __construct(){
		parent::__construct();
		$this->load->model("cetaknotabaru_model");
		$this->load->helper('url');
	}
public function index()
	{
		$id_notabaru=$_GET['id_notabaru'];
		$data = array(
			"container" => "cetaknotabaru"
		);
		// $id_notabaru=;
		$data['sql']=$this->cetaknotabaru_model->getData($id_notabaru)->result();
		$this->load->view('cetaknotabaru',$data);
	}
}
