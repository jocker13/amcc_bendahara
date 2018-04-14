<?php

Class dashboard_model extends CI_Model {
	public function getData()
	{
		$sql =$this->db->query("SELECT month(tanggal) AS bulan , SUM((harga_satuan*banyak)) AS jumlah_bulanan FROM transaksiumum GROUP BY month(tanggal)");
		return $sql;
	}
	function pemasukan()
	{

		$sql= $this->db->query("

			select
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pemasukan' AND (Month(tanggal)=1)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'Januari',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pemasukan' AND (Month(tanggal)=2)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'Februari',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pemasukan' AND (Month(tanggal)=3)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'Maret',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pemasukan' AND (Month(tanggal)=4)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'April',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pemasukan' AND (Month(tanggal)=5)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'Mei',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pemasukan' AND (Month(tanggal)=6)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'Juni',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pemasukan' AND (Month(tanggal)=7)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'Juli',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pemasukan' AND (Month(tanggal)=8)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'Agustus',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pemasukan' AND (Month(tanggal)=9)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'September',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pemasukan' AND (Month(tanggal)=10)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'Oktober',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pemasukan' AND (Month(tanggal)=11)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'November',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pemasukan' AND (Month(tanggal)=12)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'Desember'
			from transaksiumum  GROUP BY YEAR(tanggal)

			");

		return $sql;

	}
		function pengeluaran()
	{

		$sql= $this->db->query("

			select
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pengeluaran' AND (Month(tanggal)=1)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'Januari',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pengeluaran' AND (Month(tanggal)=2)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'Februari',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pengeluaran' AND (Month(tanggal)=3)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'Maret',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pengeluaran' AND (Month(tanggal)=4)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'April',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pengeluaran' AND (Month(tanggal)=5)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'Mei',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pengeluaran' AND (Month(tanggal)=6)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'Juni',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pengeluaran' AND (Month(tanggal)=7)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'Juli',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pengeluaran' AND (Month(tanggal)=8)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'Agustus',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pengeluaran' AND (Month(tanggal)=9)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'September',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pengeluaran' AND (Month(tanggal)=10)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'Oktober',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pengeluaran' AND (Month(tanggal)=11)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'November',
			ifnull((SELECT sum((harga_satuan*banyak)) FROM (transaksiumum)WHERE(jenis ='pengeluaran' AND (Month(tanggal)=12)AND (YEAR(tanggal)=YEAR(CURDATE())))),0) AS 'Desember'
			from transaksiumum  GROUP BY YEAR(tanggal)

			");

		return $sql;

	}  
}