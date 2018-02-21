<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("user_model");
		$this->load->helper('url');
	}

	public function index()
	{
		$data = array(
			"container" => "user"
		);
		$this->load->view("template", $data);
	}
	public function simpan()
	{
		$nim=$this->input->post("nim");
		$id_users=$this->input->post("id_users");
		$op=$this->input->post("op");
		$nama=$this->input->post("nama");
		$jabatan=$this->input->post("jabatan");
		$email=$this->input->post("email");
		$password=$this->input->post("password");
		$notelp=$this->input->post("notelp");
		$data = array(
			'nim' => $nim , 
			'nama' => $nama, 
			'jabatan' => $jabatan, 
			'email' => $email, 
			'password' => $password, 
			'notelp' => $notelp 
		);
		// echo $op;
		// exit();
		if ($op=="tambah") {
			$this->user_model->save($data);
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>data berhasil disimpan</p>
                </div>');
		}
		else{
			$this->user_model->ubah($id_users, $data);
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>data berhasil dirumbah</p>
                </div>'); 
		}
		// $this->user_model->save($data);
		redirect('user');
	}
	public function hapus($id_users)
	{
		$this->user_model->delete($id_users);
		redirect('user');
	}

	public function edit($id_users)
	{
		$data = array(
			"container" => "user"
		);
		$data['op']='edit';
		$data['sql']=$this->user_model->edit($id_users)->result();
		$this->load->view("template", $data);
	}
	public function ajax_list()
	{
		$list = $this->user_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $user) {
			$no++;
			$row = array();
			$row[] = $user->nim;
			$row[] = $user->nama;
			$row[] = $user->jabatan;
			$row[] = $user->email;
			$row[] = $user->notelp;
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_user('."'".$user->id_users."'".')"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_user('."'".$user->id_users."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->user_model->count_all(),
						"recordsFiltered" => $this->user_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function ajax_delete($id)
	{
		$this->user_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit($id)
	{
		$data=$this->user_model->get_by_id($id);
		// $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}
}
