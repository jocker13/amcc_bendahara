<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datanota extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("data_nota_model");
		$this->load->helper('url');
	}

	public function ajax_list()
	{
		$id_kegiatan=$_POST['id_kegiatan'];
		$list = $this->data_nota_model->get_datatables($id_kegiatan);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $nota) {
			$no++;
			$row = array();
			$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_nota_1('."'".$nota->id_nota."'".')"><i class="glyphicon glyphicon-ok"></i>Pilih</a>';
			$row[] = $nota->no_nota;
			$row[] = '<img src="upload/'.$nota->gambar.'" style="hight:400px;width:400px" class="img-responsive">';
			// $row[] = $nota->nama_kegiatan;
			
			//add html for action
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->data_nota_model->count_all(),
						"recordsFiltered" => $this->data_nota_model->count_filtered($id_kegiatan),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function ajax_pilih($id)
	{
		$data=$this->data_nota_model->get_by_id($id);
		// $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}
}
