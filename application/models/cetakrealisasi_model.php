<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cetakrealisasi_model extends CI_Model {

public function getRealisasiSumberDana($id_kegiatan)
	{
		$sql=$this->db->query("select r.*, k.nama_kegiatan,(r.harga_satuan * r.banyak ) as total from realisasi r join kegiatan k on r.id_kegiatan = k.id_kegiatan where r.id_kegiatan='$id_kegiatan' and nama_sie='sumber dana' and jenis='pemasukan'");
		return $sql;
	}
public function getRealisasiKesekretariatan($id_kegiatan)
	{
		$sql =$this->db->query("select r.*, k.nama_kegiatan,(r.harga_satuan * r.banyak ) as total from realisasi r join kegiatan k on r.id_kegiatan = k.id_kegiatan where r.id_kegiatan='$id_kegiatan' and nama_sie='kesekretariatan' and jenis='pengeluaran'");
		return $sql;
	}	
	
}
