<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model("kegiatan_model");
		$this->load->helper('url');
		
	}
	public function index()
	{
		$id_users= $this->session->userdata['logged_in']['id_users'];
		$jabatan=$this->session->userdata['logged_in']['level'];
		$data = array(
			"container" => "kegiatan"
		);
		$data['op']='tambah';
		// $data['sql']=$this->kegiatan_model->getKegiatan($id_users,$jabatan)->result();
		$this->load->view("template", $data);	
	}
	public function simpan()
	{
			$tahun_kep=$this->input->post("tahun_kep");
			$id_kegiatan=$this->input->post("id_kegiatan");
			$op=$this->input->post("op");
			$nama_kegiatan=$this->input->post("nama_kegiatan");
			$tanggal=$this->input->post("tanggal");
			$data = array(
				'tahun_kep' => $tahun_kep, 
				'nama_kegiatan' => $nama_kegiatan, 
				'tanggal' => $tanggal,
				'id_users' => $this->session->userdata['logged_in']['id_users']

			);
			// echo $op;
			// exit();
			if ($op=="tambah") {
				$this->kegiatan_model->save($data);
			}
			else{
				$this->kegiatan_model->ubah($id_kegiatan, $data);
			}
			
			redirect('kegiatan');
	}
	public function ajax_list()
	{
		$id_users= $this->session->userdata['logged_in']['id_users'];
		$jabatan=$this->session->userdata['logged_in']['level'];
		$list = $this->kegiatan_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $kegiatan) {
			$no++;
			$row = array();
			$row[] = $kegiatan->tahun_kep;
			$row[] = $kegiatan->nama_kegiatan;
			$row[] = $kegiatan->tanggal;
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_kegiatan('."'".$kegiatan->id_kegiatan."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_kegiatan('."'".$kegiatan->id_kegiatan."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->kegiatan_model->count_all(),
						"recordsFiltered" => $this->kegiatan_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function ajax_delete($id)
	{
		$this->kegiatan_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit($id)
	{
		$data=$this->kegiatan_model->get_by_id($id);
		// $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}
}

