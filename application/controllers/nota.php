<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nota extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("nota_model");
		$this->load->model("kegiatan_model");
		$this->load->helper('url');
	}

	public function index()
	{
		$kegiatan  = $this->input->post('kegiatan');
		$data = array(
			"container" => "nota"
		);
		$data['op']='tambah';
		$data['kegiatan_id']=$kegiatan; 
		$data['nama_kegiatan']=$this->kegiatan_model->getKegiatanByID($kegiatan)->result();
		$data['sql']=$this->nota_model->getnota()->result();
		$data['sql']=$this->nota_model->getNotaKegiatan($kegiatan)->result();
		$id_users = $this->session->userdata()['logged_in']['id_users'];
		$data['kegiatan']=$this->kegiatan_model->getKegiatanNota($id_users)->result();
		/*$data['kegiatan']=$this->kegiatan_model->getKegiatan()->result();*/
		$this->load->view("template", $data);
	}
	public function simpan()
	{
		$no_nota=$this->input->post("no_nota");
		$id_nota=$this->input->post("id_nota");
		$op=$this->input->post("op");
		$id_kegiatan=$this->input->post("id_kegiatan");
		$gambar=$this->upload_image();
		$data = array(
			'no_nota' => $no_nota , 
			'id_kegiatan' => $id_kegiatan, 
			'gambar' => $gambar
		);
		// echo $op;
		// exit();
		if ($op=="tambah") {
			$this->nota_model->save($data);
		}
		else{
			$this->nota_model->ubah($id_nota, $data);
		}

		redirect('nota');
	}
	public function hapus($id_nota)
	{
		$this->nota_model->delete($id_nota);
		redirect('nota');
	}

	public function edit($id_nota)
	{
		$data = array(
			"container" => "nota"
		);
		$data['op']='edit';
		$data['sql']=$this->nota_model->edit($id_nota)->result();
		$this->load->view("template", $data);
	}
	function upload_image()  
	{  print_r($_POST);
      	// exit();
		if(!isset($_FILES['input_gambar']) || $_FILES['input_gambar']['error'] == UPLOAD_ERR_NO_FILE) {
			echo "Error no file selected"; 
		} else {
			print_r($_FILES);
		}
		if(isset($_FILES["input_gambar"]))  
		{  
			$extension = explode('.', $_FILES['input_gambar']['name']);  
			$new_name = rand() . '.' . $extension[1];  
			$destination = './upload/' . $new_name;  
			move_uploaded_file($_FILES['input_gambar']['tmp_name'], $destination);  
			return $new_name;  
		}  
	}
	public function ajax_list()
	{

		$list = $this->nota_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $nota) {
			$no++;
			$row = array();
			$row[] = $nota->no_nota;
			$row[] = $nota->nama_kegiatan;
			$row[] = '<img src="upload/'.$nota->gambar.'" style="hight:100px;width:100px" class="img-responsive">';
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_nota('."'".$nota->id_nota."'".')"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_nota('."'".$nota->id_nota."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->nota_model->count_all(),
						"recordsFiltered" => $this->nota_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function ajax_delete($id)
	{
		
		$this->nota_model->delete_by_id($id);
		 
		echo json_encode(array("status" => TRUE));

	}
	public function ajax_edit($id)
	{
		$data=$this->nota_model->get_by_id($id);
		// $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}
}
