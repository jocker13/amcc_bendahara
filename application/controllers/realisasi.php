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
		$id_nota= $this->session->notadata['logged_in']['id_nota'];
		$data = array(
			"container" => "realisasi"
		);
		$data['op']='tambah';
		// $data['sql']=$this->realisasi_model->getRealisasi()->result();
		// $data['sql']=$this->realisasi_model->getRealisasiNota()->result();
		$data['kegiatan']=$this->kegiatan_model->getKegiatan($id_users,$jabatan)->result();
		$this->load->view("template", $data);
	}
	public function simpan()
	{
		print_r($_POST);
		$jenis=$this->input->post("jenis");
		$id_realisasi=$this->input->post("id_realisasi");
		$op=$this->input->post("op");
		$id_kegiatan=$this->input->post("id_kegiatan");
		$nama_sie=$this->input->post("nama_sie");
		$nama_realisasi=$this->input->post("nama_realisasi");
		$banyak_realisasi=$this->input->post("banyak_realisasi");
		$harga_satuan_realisasi=$this->input->post("harga_satuan_realisasi");
		$jumlah=$this->input->post("jumlah");
		$no_nota=$this->input->post("no_nota");
		$data = array(
			'id_kegiatan'=>$id_kegiatan,
			'jenis'=> $jenis,
			'nama_sie' => $nama_sie,
			'nama_realisasi' => $nama_realisasi,
			'banyak' => $banyak_realisasi,
			'harga_satuan' => $harga_satuan_realisasi,
			'id_nota' => $no_nota

		);
			// echo $op;
			// exit();
		if ($op=="tambah") {
			$this->realisasi_model->save($data);
			$this->session->set_flashdata('msg',
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>data berhasil disimpan</p>
                </div>');

		}
		else{
			$this->realisasi_model->ubah($id_realisasi, $data);
			$this->session->set_flashdata('msg',
                '<div class="alert alert-success">
                    <h4>Berhasil </h4>
                    <p>data berhasil diubah</p>
                </div>');
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


	public function ajax_list()
	{

		$list = $this->realisasi_model->get_datatables();
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

			//add html for action
			$row[] = '<a class="btn btn-sm btn-warning" href="javascript:void(0)" title="Edit" onclick="edit_realisasi('."'".$realisasi->id_realisasi."'".')"><i class="glyphicon glyphicon-pencil"></i> Ubah</a>
				  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_realisasi('."'".$realisasi->id_realisasi."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';

			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->realisasi_model->count_all(),
						"recordsFiltered" => $this->realisasi_model->count_filtered(),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}
	public function ajax_delete($id)
	{
		$this->realisasi_model->delete_by_id($id);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_edit($id)
	{
		$data=$this->realisasi_model->get_by_id($id);
		// $data->dob = ($data->dob == '0000-00-00') ? '' : $data->dob; // if 0000-00-00 set tu empty for datepicker compatibility
		echo json_encode($data);
	}

	public function ajax_add()
	{
		// $this->_validate();
		$id_kegiatan=$this->input->post("id_kegiatan");
		$jenis=$this->input->post("jenis");
		$id_realisasi=$this->input->post("id_realisasi");
		$id_estimasi=$this->input->post("id_estimasi");
		$op=$this->input->post("op");
		$nama_sie=$this->input->post("nama_sie");
		$nama_realisasi=$this->input->post("nama_realisasi");
		$banyak_realisasi=$this->input->post("banyak_realisasi");
		$harga_satuan_realisasi=$this->input->post("harga_satuan_realisasi");
		$no_nota=$this->input->post("id_nota");
		$jumlah=$this->input->post("jumlah");
		$data = array(
			'id_kegiatan'=>$id_kegiatan,
			'jenis'=> $jenis,
			'id_estimasi'=> $id_estimasi,
			'nama_sie' => $nama_sie,
			'nama_realisasi' => $nama_realisasi,
			'banyak' => $banyak_realisasi,
			'harga_satuan' => $harga_satuan_realisasi,
			'id_nota' => $no_nota,
		);
		;
		$insert = $this->realisasi_model->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
		$id_kegiatan=$this->post("id_kegiatan");
		$jenis=$this->input->post("jenis");
		$id_realisasi=$this->input->post("id_realisasi");
		$id_estimasi=$this->input->post("id_estimasi");
		$op=$this->input->post("op");
		$nama_sie=$this->input->post("nama_sie");
		$nama_realisasi=$this->input->post("nama_realisasi");
		$banyak_realisasi=$this->input->post("banyak_realisasi");
		$harga_satuan_realisasi=$this->input->post("harga_satuan_realisasi");
		$no_nota=$this->input->post("id_nota");
		$jumlah=$this->input->post("jumlah");
		$data = array(
			'id_kegiatan'=>$id_kegiatan,
			'jenis'=> $jenis,
			'id_estimasi'=> $id_estimasi,
			'nama_sie' => $nama_sie,
			'nama_realisasi' => $nama_realisasi,
			'banyak' => $banyak_realisasi,
			'harga_satuan' => $harga_satuan_realisasi,
			'id_nota' => $no_nota,

		);
		$this->realisasi_model->update(array('id_realisasi' => $this->input->post('id_realisasi')), $data);
		echo json_encode(array("status" => TRUE));
	}



}
