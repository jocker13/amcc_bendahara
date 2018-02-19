<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotaBaru extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("notabaru_model");
		$this->load->helper('url');
	}

	public function index()
	{
		$data = array(
			"container" => "notabaru"
		);
		$data['op']='tambah';
		$data['sql']=$this->notabaru_model->getNotaBaru()->result();
		$this->load->view("template", $data);
	}
	public function simpan()
	{
		$no_nota=$this->input->post("no_nota");
		$id_notabaru=$this->input->post("id_notabaru");
		$op=$this->input->post("op");
		$tanggal=$this->input->post("tanggal");
		$dari=$this->input->post("dari");
		$uang=$this->input->post("uang");
		$terbilang=$this->input->post("terbilang");
		$penerima=$this->input->post("penerima");
		$no_telp=$this->input->post("no_telp");
		$keterangan=$this->input->post("keterangan");
		$data = array(
			'no_nota' => $no_nota , 
			'tanggal' => $tanggal, 
			'dari' => $dari, 
			'uang' => $uang, 
			'terbilang' => $terbilang, 
			'penerima' => $penerima, 
			'no_telp' => $no_telp,
			'keterangan' => $keterangan
		);
		// echo $op;
		// exit();
		if ($op=="tambah") {
			$this->notabaru_model->save($data);
		}
		else{
			$this->notabaru_model->ubah($id_notabaru, $data);
		}
		// $this->user_model->save($data);
		redirect('notabaru');
	}
	public function hapus($id_notabaru)
	{
		$this->notabaru_model->delete($id_notabaru);
		redirect('notabaru');
	}

	public function edit($id_notabaru)
	{
		$data = array(
			"container" => "notabaru"
		);
		$data['op']='edit';
		$data['sql']=$this->notabaru_model->edit($id_notabaru)->result();
		$this->load->view("template", $data);
	}
}
