<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporanrealisasi extends CI_Controller {
public function __construct(){
		parent::__construct();
		$this->load->model("laporanrealisasi_model");
		$this->load->model("kegiatan_model");
		$this->load->helper('url');
	}

	public function index()
	{
		$id_users= $this->session->userdata['logged_in']['id_users'];
		$jabatan=$this->session->userdata['logged_in']['level'];
		$id_nota= $this->session->notadata['logged_in']['id_nota'];
		$data = array(
			"container" => "laporanrealisasi"
		);
		$data['op']='tambah';
		// $data['sql']=$this->realisasi_model->getRealisasi()->result();
		// $data['sql']=$this->realisasi_model->getRealisasiNota()->result();
		$data['kegiatan']=$this->kegiatan_model->getKegiatan($id_users,$jabatan)->result();
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


	public function ajax_list()
	{
		
		$id_kegiatan=$_POST['id_kegiatan'];
		$list = $this->laporanrealisasi_model->get_datatables($id_kegiatan);
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $realisasi) {
			$no++;
			$jumlah = $realisasi->banyak*$realisasi->harga_satuan;
			$row = array();;
			$row[] = $no;
			$row[] = $realisasi->jenis;
			$row[] = $realisasi->nama_sie;
			$row[] = $realisasi->nama_realisasi;
			$row[] = $realisasi->banyak;
			$row[] = 'Rp '. number_format($realisasi->harga_satuan,2,',','.');
			$row[] = 'Rp '. number_format($jumlah,2,',','.');
			$row[] = $realisasi->no_nota;
			
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->laporanrealisasi_model->count_all(),
						"recordsFiltered" => $this->laporanrealisasi_model->count_filtered($id_kegiatan),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

}
