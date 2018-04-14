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
		// $tahun=$_GET['tahun'];
		$data = array(
			"container" => "dashboard"
		);
		foreach($this->dashboard_model->pemasukan()->result_array() as $row)
		{
			$data['grafik'][]=(float)$row['Januari'];
			$data['grafik'][]=(float)$row['Februari'];
			$data['grafik'][]=(float)$row['Maret'];
			$data['grafik'][]=(float)$row['April'];
			$data['grafik'][]=(float)$row['Mei'];
			$data['grafik'][]=(float)$row['Juni'];
			$data['grafik'][]=(float)$row['Juli'];
			$data['grafik'][]=(float)$row['Agustus'];
			$data['grafik'][]=(float)$row['September'];
			$data['grafik'][]=(float)$row['Oktober'];
			$data['grafik'][]=(float)$row['November'];
			$data['grafik'][]=(float)$row['Desember'];
		}
		foreach($this->dashboard_model->pengeluaran()->result_array() as $row)
		{
			$data['grafik1'][]=(float)$row['Januari'];
			$data['grafik1'][]=(float)$row['Februari'];
			$data['grafik1'][]=(float)$row['Maret'];
			$data['grafik1'][]=(float)$row['April'];
			$data['grafik1'][]=(float)$row['Mei'];
			$data['grafik1'][]=(float)$row['Juni'];
			$data['grafik1'][]=(float)$row['Juli'];
			$data['grafik1'][]=(float)$row['Agustus'];
			$data['grafik1'][]=(float)$row['September'];
			$data['grafik1'][]=(float)$row['Oktober'];
			$data['grafik1'][]=(float)$row['November'];
			$data['grafik1'][]=(float)$row['Desember'];
		}
		$this->load->view("template", $data);
	}
	public function loadData()
	{
		$this->load->getData();
	}
}
