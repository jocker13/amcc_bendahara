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
			"container" => "NotaBaru"
		);
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
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>data berhasil disimpan</p>
                </div>');
		}
		else{
			$this->notabaru_model->ubah($id_notabaru, $data);
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>data berhasil dirumbah</p>
                </div>'); 
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
			"container" => "NotaBaru"
		);
		$data['op']='edit';
		$data['sql']=$this->notabaru_model->edit($id_notabaru)->result();
		$this->load->view("template", $data);
	}
	public function ajax_list()
	{
		$list = $this->notabaru_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $notabaru) {
			$no++;
			$row = array();
			$row[] = $notabaru->no_nota;
			$row[] = $notabaru->tanggal;
			$row[] = $notabaru->dari;
			$row[] = $notabaru->uang;
			$row[] = $notabaru->terbilang;
			$row[] = $notabaru->penerima;
			$row[] = $notabaru->no_telp;
			$row[] = $notabaru->keterangan;
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_notabaru('."'".$notabaru->id_notabaru."'".')"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_notabaru('."'".$notabaru->id_notabaru."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->notabaru_model->count_all(),
						"recordsFiltered" => $this->notabaru_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function ajax_delete($id)
	{
		$this->notabaru_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit($id)
	{
		$data=$this->notabaru_model->get_by_id($id);
		// $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}
}
