<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class estimasi_model extends CI_Model {


	public function getEstimasi()
	{
		$sql =$this->db->query("select e.*, k.nama_kegiatan from estimasi e join kegiatan k on e.id_kegiatan = k.id_kegiatan");
		return $sql;
	}
	public function getEstimasis($kegiatan="")
	{
		$sql =$this->db->query("select e.*, k.nama_kegiatan from estimasi e join kegiatan k on e.id_kegiatan = k.id_kegiatan where  e.id_kegiatan = '$kegiatan'");

		return $sql->result_array();;
	}
	public function save($data)
	{
		$this->db->insert('estimasi',$data);
	}
	public function delete($id_estimasi)
	{
		$this->db->where('id_estimasi',$id_estimasi);
		$this->db->delete('estimasi');
	}
	public function edit($id_estimasi,$data)
	{
		$this->db->where('id_estimasi',$id_estimasi);
		$this->db->update('estimasi',$data);
		return TRUE;
	}
	public function ubah($id_estimasi,$data)
	{
		$this->db->where('id_estimasi',$id_estimasi);
		$this->db->update('estimasi', $data);
	}
}
