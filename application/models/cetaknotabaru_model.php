<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class cetaknotabaru_model extends CI_Model {


	public function getData($id_notabaru)
	{
		$sql =$this->db->query("select * from notabaru where id_notabaru = '$id_notabaru'");
		return $sql;
	}
}
