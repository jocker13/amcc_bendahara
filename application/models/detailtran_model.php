<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class detailtran_model extends CI_Model {


	public function getDetail()
	{
		$sql =$this->db->query("select * from detail_transaksi");
		return $sql;
	}
	public function save($data)
	{
		$this->db->insert('detail_transaksi',$data);
		
	}
	/*public function delete($id)
	{
		$this->db->where('id',$id);
		$this->db->delete('detail_transaksi');
	}
	public function edit($id)
	{
		$this->db->where('id',$id);
		$this->db->update('detail_transaksi', $data);
		return TRUE;
        return $this->db->get('detail_transaksi');

	}
	public function ubah($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('detail_transaksi', $data);
		
	}*/
}
