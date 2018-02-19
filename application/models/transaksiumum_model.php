<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class transaksiumum_model extends CI_Model {


	public function getTransaksiUmum()
	{
		$sql =$this->db->query("select * from transaksiumum");
		return $sql;
	}
	public function getSaldoakhir()
	{
		$sql =$this->db->query("select saldo from transaksiumum where id_tran=(select max(id_tran)from transaksiumum)");
		$ret = $sql->row();
		return $ret->saldo;
	}
	public function save($data)
	{
		$this->db->insert('transaksiumum',$data);
	}
	public function delete($id_tran)
	{
		$this->db->where('id_tran',$id_tran);
		$this->db->delete('transaksiumum');
	}
	public function edit($id_tran)
	{
		$this->db->where('id_tran',$id_tran);
		return $this->db->get('transaksiumum');
	}
	public function ubah($id_tran,$data)
	{
		$this->db->where('id_tran',$id_tran);
		$this->db->update('transaksiumum', $data);
	}
}
