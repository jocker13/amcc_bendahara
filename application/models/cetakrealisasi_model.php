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
		$sql =$this->db->query("select r.*, k.nama_kegiatan,(r.harga_satuan * r.banyak ) as total, n.no_nota from realisasi r join kegiatan k on r.id_kegiatan = k.id_kegiatan join nota n on n.id_nota = r.id_nota where r.id_kegiatan='$id_kegiatan' and nama_sie='kesekretariatan' and jenis='pengeluaran'");
		return $sql;
	}
public function getRealisasiAcara($id_kegiatan)
	{
		$sql =$this->db->query("select r.*, k.nama_kegiatan,(r.harga_satuan * r.banyak ) as total, n.no_nota from realisasi r join kegiatan k on r.id_kegiatan = k.id_kegiatan join nota n on n.id_nota = r.id_nota where r.id_kegiatan='$id_kegiatan' and nama_sie='acara' and jenis='pengeluaran'");
		return $sql;
	}	
public function getRealisasiPdd($id_kegiatan)
	{
		$sql =$this->db->query("select r.*, k.nama_kegiatan,(r.harga_satuan * r.banyak ) as total, n.no_nota from realisasi r join kegiatan k on r.id_kegiatan = k.id_kegiatan join nota n on n.id_nota = r.id_nota where r.id_kegiatan='$id_kegiatan' and nama_sie='pdd' and jenis='pengeluaran'");
		return $sql;
	}	
public function getRealisasiKonsumsi($id_kegiatan)
	{
		$sql =$this->db->query("select r.*, k.nama_kegiatan,(r.harga_satuan * r.banyak ) as total, n.no_nota from realisasi r join kegiatan k on r.id_kegiatan = k.id_kegiatan join nota n on n.id_nota = r.id_nota where r.id_kegiatan='$id_kegiatan' and nama_sie='konsumsi' and jenis='pengeluaran'");
		return $sql;
	}	
public function getRealisasiPerlengkapan($id_kegiatan)
	{
		$sql =$this->db->query("select r.*, k.nama_kegiatan,(r.harga_satuan * r.banyak ) as total, n.no_nota from realisasi r join kegiatan k on r.id_kegiatan = k.id_kegiatan join nota n on n.id_nota = r.id_nota where r.id_kegiatan='$id_kegiatan' and nama_sie='perlengkapan' and jenis='pengeluaran'");
		return $sql;
	}
public function getRealisasiHumas($id_kegiatan)
	{
		$sql =$this->db->query("select r.*, k.nama_kegiatan,(r.harga_satuan * r.banyak ) as total, n.no_nota from realisasi r join kegiatan k on r.id_kegiatan = k.id_kegiatan join nota n on n.id_nota = r.id_nota where r.id_kegiatan='$id_kegiatan' and nama_sie='humas' and jenis='pengeluaran'");
		return $sql;
	}
public function getRealisasiP3k($id_kegiatan)
	{
		$sql =$this->db->query("select r.*, k.nama_kegiatan,(r.harga_satuan * r.banyak ) as total, n.no_nota from realisasi r join kegiatan k on r.id_kegiatan = k.id_kegiatan join nota n on n.id_nota = r.id_nota where r.id_kegiatan='$id_kegiatan' and nama_sie='p3k' and jenis='pengeluaran'");
		return $sql;
	}
}

