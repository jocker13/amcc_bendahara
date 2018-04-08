<?php

Class dashboard_model extends CI_Model {
	public function getData()
	{
		$sql =$this->db->query("SELECT month(tanggal) AS bulan , SUM((harga_satuan*banyak)) AS jumlah_bulanan FROM transaksiumum GROUP BY month(tanggal)");
		return $sql;
	}
}