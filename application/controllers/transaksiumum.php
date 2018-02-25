<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransaksiUmum extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("transaksiumum_model");
		$this->load->helper('url');
	}

	public function index()
	{
		$data = array(
			"container" => "transaksiumum"
		);
		$this->load->view("template", $data);
	}
	public function simpan()
	{	
		$da=$this->transaksiumum_model->getSaldoakhir();
		$harga_satuan=$this->input->post("harga_satuan");
		$banyak=$this->input->post("banyak");
		$jumlah=$harga_satuan*$banyak;
		if ($this->input->post("jenis")=="Pemasukan") {
			$saldo1 =$da+$jumlah;
		}
		else{
			$saldo1 =$da-$jumlah;
		} 
		$tanggal=$this->input->post("tanggal");
		
		$id_tran=$this->input->post("id_tran");
		$op=$this->input->post("op");
		$nama_transaksi=$this->input->post("nama_transaksi");
		$jenis=$this->input->post("jenis");
		$nama_sie=$this->input->post("nama_sie");
		$saldo=$saldo1;
		$data = array(
			'tanggal' => $tanggal,
			'nama_transaksi' => $nama_transaksi , 
			'jenis' => $jenis,  
			'banyak' => $banyak, 
			'nama_sie' => $nama_sie, 
			'harga_satuan' => $harga_satuan, 			
			'saldo' => $saldo 
		);
		
			$this->transaksiumum_model->save($data);
			$this->session->set_flashdata('msg', 
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>data berhasil disimpan</p>
                </div>');

		redirect('transaksiumum');
	}
	public function hapus($id_tran)
	{
		$this->transaksiumum_model->delete($id_tran);
		redirect('transaksiumum');
	}

	public function edit($id_tran)
	{
		$data = array(
			"container" => "transaksiumum"
		);
		$data['op']='edit';
		$data['sql']=$this->transaksiumum_model->edit($id_tran)->result();
		$this->load->view("template", $data);
	}

	public function ajax_list()
	{
		$list = $this->transaksiumum_model->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $tran) {
			$jumlah=$tran->banyak*$tran->harga_satuan;
			$no++;
			$row = array();
			$row[] = $tran->tanggal;
			$row[] = $tran->nama_transaksi;
			$row[] = $tran->jenis;	
			$row[] = $tran->nama_sie;
			$row[] = $tran->banyak;
			$row[] = 'Rp '. number_format($tran->harga_satuan,2,',','.');
			$row[] = 'Rp '. number_format($jumlah,2,',','.');
			$row[] = 'Rp '. number_format($tran->saldo,2,',','.');
			
			//add html for action
/*			$row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_transaksiumum('."'".$tran->id_tran."'".')"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_transaksiumum('."'".$tran->id_tran."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';*/
		
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->transaksiumum_model->count_all(),
						"recordsFiltered" => $this->transaksiumum_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
/*	public function ajax_delete($id)
	{
		$this->transaksiumum_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit($id)
	{
		$data=$this->transaksiumum_model->get_by_id($id);
		// $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}*/
}
