<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Realisasi extends CI_Controller {
public function __construct(){
		parent::__construct();
		$this->load->model("realisasi_model");
		$this->load->model("kegiatan_model");
		$this->load->helper('url');
	}

	public function index()
	{
		$id_users= $this->session->userdata['logged_in']['id_users'];
		$jabatan=$this->session->userdata['logged_in']['level'];
		$data = array(
			"container" => "realisasi"
		);
		$data['op']='tambah';
		$data['sql']=$this->realisasi_model->getRealisasi()->result();
		$data['kegiatan']=$this->kegiatan_model->getKegiatan($id_users,$jabatan)->result();
		// $data['kegiatantahun']=$this->kegiatan_model->getKegiatanBytahun($tahun_kep);
		$this->load->view("template", $data);
	}
	public function simpan()
	{
		$jenis=$this->input->post("jenis");
		$id_realisasi=$this->input->post("id_realisasi");
		$op=$this->input->post("op");
		$nama_sie=$this->input->post("nama_sie");
		$nama_realisasi=$this->input->post("nama_realisasi");
		$banyak=$this->input->post("banyak");
		$harga_satuan=$this->input->post("harga_satuan");
		$jumlah=$this->input->post("jumlah");
		$no_nota=$this->input->post("no_nota");
		$data = array(
			'jenis'=> $jenis,
			'nama_sie' => $nama_sie, 
			'nama_realisasi' => $nama_realisasi, 
			'banyak' => $banyak,
			'harga_satuan' => $harga_satuan,
			'no_nota' => $no_nota
	
		);
			// echo $op;
			// exit();
		if ($op=="tambah") {
			$this->realisasi_model->save($data);
		}
		else{
			$this->realisasi_model->ubah($id_realisasi, $data);
		}

		redirect('realisasi');
	}
	public function hapus($id_realisasi)
	{
		$this->realisasi_model->delete($id_realisasi);
		redirect('realisasi');
	}
	public function edit($id_realisasi)
	{
		$data = array(
			"container" => "realisasi"
		);
		$data['op']='edit';
		$data['sql']=$this->realisasi_model->edit($id_realisasi)->result();
		$this->load->view("template", $data);
	}

	public function getKegiatantahun(){
		$tahun_kep=$this->input->post('tahun_kep');
		$kegiatan=$this ->kegiatan_model->getKegiatanBytahun($tahun_kep)->result();
		// print_r($kegiatan);
		// exit();
		if (count($kegiatan)>0) {
			$kegiatan_select ='';
			$kegiatan_select .='<option value="">Pilih Kegiatan</option>' ;
			foreach ($kegiatan as $value) {
				$kegiatan_select .='<option value="'.$value->id_realisasi .'">'.$value->nama_kegiatan.'</option>';
			}
			echo json_encode($kegiatan_select);
		}
	}
}
