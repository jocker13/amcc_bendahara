<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class notabaru_model extends CI_Model {


	public function getNotaBaru()
	{
		$sql =$this->db->query("select * from notabaru");
		return $sql;
	}
	public function save($data)
	{
		$this->db->insert('notabaru',$data);
	}
	public function delete($id_notabaru)
	{
		$this->db->where('id_notabaru',$id_notabaru);
		$this->db->delete('notabaru');
	}
	public function edit($id_notabaru)
	{
		$this->db->where('id_notabaru',$id_notabaru);
		return $this->db->get('notabaru');
	}
	public function ubah($id_notabaru,$data)
	{
		$this->db->where('id_notabaru',$id_notabaru);
		$this->db->update('notabaru', $data);
	}
}
