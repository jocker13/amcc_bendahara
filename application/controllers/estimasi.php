<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estimasi extends CI_Controller {
	public $kegiatan='';
	public function __construct(){
		parent::__construct();
		$this->load->model("estimasi_model");
		$this->load->model("kegiatan_model");
		$this->load->helper('url');
	}

	public function index()
	{
		$tahun  = $this->input->post('tahun');
		$kegiatan  = $this->input->post('kegiatan');
		$data = array(
			"container" => "estimasi"
		);
		$data['op']='tambah';
		// $data['kegiatan_id']=$kegiatan; 
		// $data['nama_kegiatan']=$this->kegiatan_model->getKegiatanByID($kegiatan)->result();
		// $data['sql']=$this->estimasi_model->getEstimasis($kegiatan);
		$id_users = $this->session->userdata()['logged_in']['id_users'];
		$jabatan=$this->session->userdata['logged_in']['level'];
		$data['kegiatan']=$this->kegiatan_model->getKegiatan($id_users,$jabatan)->result();
		$this->load->view("template", $data);
	}
	public function simpan()
	{
		/*echo "tested";
		exit();*/
		$jenis=$this->input->post("jenis");
		$id_estimasi=$this->input->post("id_estimasi");
		$id_kegiatan=$this->input->post("id_kegiatan");
		$op=$this->input->post("op");
		$nama_sie=$this->input->post("nama_sie");
		$nama_estimasi=$this->input->post("nama_estimasi");
		$banyak=$this->input->post("banyak");
		$harga_satuan=$this->input->post("harga_satuan");
		$jumlah=$this->input->post("jumlah");
		$data = array(
			'id_kegiatan' => $id_kegiatan, 
			'jenis'=> $jenis,
			'nama_sie' => $nama_sie, 
			'nama_estimasi' => $nama_estimasi, 
			'banyak' => $banyak,
			'harga_satuan' => $harga_satuan,

		);
			if ($op=="tambah") {
			$this->estimasi_model->save($data);
			
		}
		else{
			$this->estimasi_model->ubah($id_estimasi, $data);
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>data berhasil diubah</p>
                </div>'); 
		}
		redirect('estimasi');
	}
	public function hapus($id_estimasi)
	{
		$this->estimasi_model->delete($id_estimasi);
		redirect('estimasi');
	}
	public function edit($id_estimasi)
	{
		$data = array(
			"container" => "estimasi"
		);
		$data['op']='edit';
		$data['sql']=$this->estimasi_model->edit($id_estimasi)->result();
		$this->load->view("template", $data);
	}
	/*function ubah(){
		$id = $this->input->post('id');
		$data = array(
			'id_kegiatan' => $id_kegiatan, 
			'jenis'=> $jenis,
			'nama_sie' => $nama_sie, 
			'nama_estimasi' => $nama_estimasi, 
			'banyak' => $banyak,
			'harga_satuan' => $harga_satuan,
		);
		$this->model_admin->ubah($data,$id);
		$this->session->set_flashdata('notif','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect('admin');
	}*/

	public function ajax_list()
	{
		// print_r($_POST);
		$id_kegiatan=$_POST['id_kegiatan'];
		$list = $this->estimasi_model->get_datatables($id_kegiatan);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $estimasi) {
			$no++;
			$jumlah = $estimasi->banyak*$estimasi->harga_satuan;
			$row = array();
			$row[] = $no;
			$row[] = $estimasi->jenis;
			$row[] = $estimasi->nama_sie;
			$row[] = $estimasi->nama_estimasi;
			$row[] = $estimasi->banyak;
			$row[] = 'Rp '. number_format($estimasi->harga_satuan,2,',','.');
			$row[] = 'Rp '. number_format($jumlah,2,',','.');
			
			//add html for action
			$row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_estimasi('."'".$estimasi->id_estimasi."'".')"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_estimasi('."'".$estimasi->id_estimasi."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->estimasi_model->count_all(),
						"recordsFiltered" => $this->estimasi_model->count_filtered($id_kegiatan),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function ajax_delete($id)
	{
		$this->estimasi_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit($id)
	{
		$data=$this->estimasi_model->get_by_id($id);
		// $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		// $this->_validate();
		$jenis=$this->input->post("jenis");
		$id_estimasi=$this->input->post("id_estimasi");
		$id_kegiatan=$this->input->post("id_kegiatan");
		$op=$this->input->post("op");
		$nama_sie=$this->input->post("nama_sie");
		$nama_estimasi=$this->input->post("nama_estimasi");
		$banyak=$this->input->post("banyak");
		$harga_satuan=$this->input->post("harga_satuan");
		$jumlah=$this->input->post("jumlah");
		$data = array(
			'id_kegiatan' => $id_kegiatan, 
			'jenis'=> $jenis,
			'nama_sie' => $nama_sie, 
			'nama_estimasi' => $nama_estimasi, 
			'banyak' => $banyak,
			'harga_satuan' => $harga_satuan,

		);
		$this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>data berhasil diubah</p>
                </div>'); 
		$insert = $this->estimasi_model->save($data);

		echo json_encode(array("status" => TRUE));
		// $this->session->set_flashdata('msg', 
  //               '<div class="alert alert-success">
  //                   <h4>Berhasil </h4>
  //                   <p>data berhasil disimpan</p>
  //               </div>');
	}

	public function ajax_update()
	{
		$jenis=$this->input->post("jenis");
		$id_estimasi=$this->input->post("id_estimasi");
		$id_kegiatan=$this->input->post("id_kegiatan");
		$op=$this->input->post("op");
		$nama_sie=$this->input->post("nama_sie");
		$nama_estimasi=$this->input->post("nama_estimasi");
		$banyak=$this->input->post("banyak");
		$harga_satuan=$this->input->post("harga_satuan");
		$jumlah=$this->input->post("jumlah");
		$data = array(
			'id_kegiatan' => $id_kegiatan, 
			'jenis'=> $jenis,
			'nama_sie' => $nama_sie, 
			'nama_estimasi' => $nama_estimasi, 
			'banyak' => $banyak,
			'harga_satuan' => $harga_satuan,

		);
		$this->estimasi_model->update(array('id_estimasi' => $this->input->post('id_estimasi')), $data);
		echo json_encode(array("status" => TRUE));
	}
}
