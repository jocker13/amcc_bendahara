<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cetakestimasi_model extends CI_Model {


	public function getData($id_kegiatan)
	{
		$sql =$this->db->query("select e.*, k.nama_kegiatan,(e.harga_satuan * e.banyak ) as total from estimasi e join kegiatan k on e.id_kegiatan = k.id_kegiatan where e.id_kegiatan='$id_kegiatan' and nama_sie='sumber dana' and jenis='pemasukan'");
		return $sql;
	}
	public function getDataKesekretariatan($id_kegiatan)
	{
		$sql =$this->db->query("select e.*, k.nama_kegiatan,(e.harga_satuan * e.banyak ) as total from estimasi e join kegiatan k on e.id_kegiatan = k.id_kegiatan where e.id_kegiatan='$id_kegiatan' and nama_sie='kesekretariatan' and jenis='pengeluaran'");
		return $sql;
	}
	public function getDataKonsumsi($id_kegiatan)
	{
		$sql =$this->db->query("select e.*, k.nama_kegiatan,(e.harga_satuan * e.banyak ) as total from estimasi e join kegiatan k on e.id_kegiatan = k.id_kegiatan where e.id_kegiatan='$id_kegiatan' and nama_sie='konsumsi' and jenis='pengeluaran'");
		return $sql;
	}
	public function getDataAcara($id_kegiatan)
	{
		$sql =$this->db->query("select e.*, k.nama_kegiatan,(e.harga_satuan * e.banyak ) as total from estimasi e join kegiatan k on e.id_kegiatan = k.id_kegiatan where e.id_kegiatan='$id_kegiatan' and nama_sie='acara' and jenis='pengeluaran'");
		return $sql;
	}
	public function getDataPerlengkapan($id_kegiatan)
	{
		$sql =$this->db->query("select e.*, k.nama_kegiatan,(e.harga_satuan * e.banyak ) as total from estimasi e join kegiatan k on e.id_kegiatan = k.id_kegiatan where e.id_kegiatan='$id_kegiatan' and nama_sie='perlengkapan' and jenis='pengeluaran'");
		return $sql;
	}
	public function getDataHumas($id_kegiatan)
	{
		$sql =$this->db->query("select e.*, k.nama_kegiatan,(e.harga_satuan * e.banyak ) as total from estimasi e join kegiatan k on e.id_kegiatan = k.id_kegiatan where e.id_kegiatan='$id_kegiatan' and nama_sie='humas' and jenis='pengeluaran'");
		return $sql;
	}
	public function getDataP3k($id_kegiatan)
	{
		$sql =$this->db->query("select e.*, k.nama_kegiatan,(e.harga_satuan * e.banyak ) as total from estimasi e join kegiatan k on e.id_kegiatan = k.id_kegiatan where e.id_kegiatan='$id_kegiatan' and nama_sie='p3k' and jenis='pengeluaran'");
		return $sql;
	}
	public function getDataPdd($id_kegiatan)
	{
		$sql =$this->db->query("select e.*, k.nama_kegiatan,(e.harga_satuan * e.banyak ) as total from estimasi e join kegiatan k on e.id_kegiatan = k.id_kegiatan where e.id_kegiatan='$id_kegiatan' and nama_sie='pdd' and jenis='pengeluaran'");
		return $sql;
	}
	public function getKegiatan($id_kegiatan)
	{
		$sql =$this->db->query("select k.*, u.* from kegiatan k join users u on k.id_users = u.id_users where k.id_kegiatan ='$id_kegiatan' ");
		return $sql;
	} 
}
