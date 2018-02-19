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
		$data['op']='tambah';
		$data['sql']=$this->transaksiumum_model->getTransaksiUmum()->result();
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
		// echo $saldo1;
		// exit();
		$nama_transaksi=$this->input->post("nama_transaksi");
		$id_tran=$this->input->post("id_tran");
		$op=$this->input->post("op");
		$tanggal=$this->input->post("tanggal");
		$jenis=$this->input->post("jenis");
		$nama_sie=$this->input->post("nama_sie");
		
		/*$jumlah=$this->input->post("jumlah");*/
		$no_nota=$this->input->post("no_nota");
		$saldo=$saldo1;
		$data = array(
			'nama_transaksi' => $nama_transaksi , 
			'tanggal' => $tanggal,
			'jenis' => $jenis,  
			'banyak' => $banyak, 
			'nama_sie' => $banyak, 
			'harga_satuan' => $harga_satuan, 
			/*'jumlah' => $jumlah, */
			'no_nota' => $no_nota, 
			'saldo' => $saldo 
		);
		
			$this->transaksiumum_model->save($data);

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
}
