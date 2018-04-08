<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model("dashboard_model");
		$this->load->helper('url');
	}
	public function index()
	{
		$data = array(
			"container" => "dashboard"
		);
		
		$this->load->view("template", $data);
		$data['sql']=$this->dashboard_model->getData()->result();
	}
public function loadData()
{
	$this->load->getData();
}
}
