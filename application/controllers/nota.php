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
		echo "tested";
		exit();
		$data = array();
    
    if($op='tambah'){ // Jika user menekan tombol Submit (Simpan) pada form
      // lakukan upload file dengan memanggil function upload yang ada di GambarModel.php
    		
      $upload = $this->nota_model->upload();
      
      if($upload['result'] == "success"){ // Jika proses upload sukses
         // Panggil function save yang ada di GambarModel.php untuk menyimpan data ke database
        $this->nota_model->save($upload);
        
        redirect('gambar'); // Redirect kembali ke halaman awal / halaman view data
      }else{ // Jika proses upload gagal
        $data['message'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
      }
    }
    
    // $this->load->view('gambar/form', $data);
 

		// $no_nota=$this->input->post("no_nota");
		// $id_nota=$this->input->post("id_nota");
		// $op=$this->input->post("op");
		// $id_kegiatan=$this->input->post("id_kegiatan");
		// $gambar=$this->input->post("gambar");
		// $data = array(
		// 	'no_nota' => $no_nota , 
		// 	'id_kegiatan' => $id_kegiatan, 
		// 	'gambar' => $gambar
		// );
		// // echo $op;
		// // exit();
		// if ($op=="tambah") {
		// 	$this->nota_model->save($data);
		// }
		// else{
		// 	$this->nota_model->ubah($id_nota, $data);
		// }

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
}
