<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class nota_model extends CI_Model {


	public function getnota()
	{
		$sql =$this->db->query("select n.*, k.nama_kegiatan as nama_kegiatan, k.tahun_kep as tahun from nota n join kegiatan k on n.id_kegiatan = k.id_kegiatan");
		return $sql;
	}
	public function getNotaKegiatan($kegiatan="")
	{
		$sql =$this->db->query("select n.*, k.nama_kegiatan from nota n join kegiatan k on n.id_kegiatan = k.id_kegiatan where  n.id_kegiatan = '$kegiatan'");
	
		return $sql;
	}
	public function save($data)
	{

		$no_nota=$this->input->post("no_nota");
		$id_nota=$this->input->post("id_nota");
		$op=$this->input->post("op");
		$id_kegiatan=$this->input->post("id_kegiatan");
		$gambar=$this->input->post("gambar");
		$data = array(
			'no_nota' => $no_nota , 
			'id_kegiatan' => $id_kegiatan, 
			'gambar' => $upload['file']['file_name'],
		);
		$this->db->insert('nota',$data);
	}
	public function delete($id)
	{
		$this->db->where('id_nota',$id_nota);
		$this->db->delete('nota');
	}
	public function edit($id_nota)
	{
		$this->db->where('id_nota',$id_nota);
		return $this->db->get('nota');
	}
	public function ubah($id_nota,$data)
	{
		$this->db->where('id_nota',$id_nota);
		$this->db->update('nota', $data);
	}
	public function upload(){  

		$config['upload_path'] = './images/';   
		$config['allowed_types'] = 'jpg|png|jpeg';  
		$config['max_size']  = '2048';  
		$config['remove_space'] = TRUE; 

	     $this->load->library('upload', $config);
	      echo "aaaaaaaaaaaaaa";
	     exit(); // Load konfigurasi uploadnya   
	     if($this->upload->do_upload('input_gambar')){ // Lakukan upload dan Cek jika proses upload berhasil      // Jika berhasil :  

	     	$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');   
	     	return $return;  
	     }else{      // Jika gagal :   
	     	$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());    
	     	return $return;   
	     }
	 }
	}