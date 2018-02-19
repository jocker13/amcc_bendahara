<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class realisasi_model extends CI_Model {


	public function getRealisasi()
	{
		$sql =$this->db->query("select r.*, e.nama_estimasi from realisasi r  join estimasi e on r.id_estimasi = e.id_estimasi");
		return $sql;
	}
	public function save($data)
	{
		$this->db->insert('realisasi',$data);
	}
	public function delete($id_realisasi)
	{
		$this->db->where('id_realisasi',$id_realisasi);
		$this->db->delete('realisasi');
	}
	public function edit($id_realisasi)
	{
		$this->db->where('id_realisasi',$id_realisasi);
		return $this->db->get('realisasi');
	}
	public function ubah($id_realisasi,$data)
	{
		$this->db->where('id_realisasi',$id_realisasi);
		$this->db->update('realisasi', $data);
	}
}
