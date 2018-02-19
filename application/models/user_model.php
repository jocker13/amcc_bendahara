<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user_model extends CI_Model {


	public function getUser()
	{
		$sql =$this->db->query("select * from users");
		return $sql;
	}
	public function save($data)
	{
		$this->db->insert('users',$data);
	}
	public function delete($id_users)
	{
		$this->db->where('id_users',$id_users);
		$this->db->delete('users');
	}
	public function edit($id_users)
	{
		$this->db->where('id_users',$id_users);
		return $this->db->get('users');
	}
	public function ubah($id_users,$data)
	{
		$this->db->where('id_users',$id_users);
		$this->db->update('users', $data);
	}
}
