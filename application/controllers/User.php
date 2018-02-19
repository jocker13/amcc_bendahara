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
		$data['op']='tambah';
		$data['sql']=$this->user_model->getUser()->result();
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
		}
		else{
			$this->user_model->ubah($id_users, $data);
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
}
