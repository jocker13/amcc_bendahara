<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class realisasi_model extends CI_Model {
	var $table = 'realisasi';
	var $column_order = array('jenis','nama_sie','nama_realisasi','banyak','harga_satuan','id_nota',NULL); //set column field database for datatable orderable
	var $column_search = array('jenis','nama_sie','nama_realisasi','banyak','harga_satuan','id_nota'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id_realisasi' => 'desc');

	// public function getRealisasi()
	// {
	// 	$sql =$this->db->query("select r.*, e.nama_estimasi from realisasi r  join estimasi e on r.id_estimasi = e.id_estimasi");
	// 	return $sql;
	// }
	// public function getRealisasiNota()
	// {
	// 	$sql =$this->db->query("select r.*, n.no_nota from realisasi r  join nota n on r.id_nota = n.id_nota");
	// 	return $sql;
	// }
	public function delete($id_realisasi)
	{
		$this->db->where('id_realisasi',$id_realisasi);
		$this->db->delete('realisasi');
	}
	public function edit($id_realisasi)
	{
		$this->db->where('id_realisasi',$id_realisasi);
		return $this->db->get('realisasi');
	}


	public function ubah($id_realisasi,$data)
	{
		$this->db->where('id_realisasi',$id_realisasi);
		$this->db->update('realisasi', $data);
	}
	public function save($data)
	{
		$this->db->insert('realisasi',$data);
	}

private function _get_datatables_query()
	{
		// $this->db->from($this->table);
			//$this->db->where('id_realisasi',$id_realisasi);
			$this->db->select('realisasi.*,nota.no_nota')
					 ->from('realisasi')
					 ->join('nota','realisasi.id_nota=nota.id_nota');

		$i = 0;

		foreach ($this->column_search as $item) // loop column
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{

				if($i===0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables()
	{
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_realisasi',$id);
		$query = $this->db->get();

		return $query->row();
	}
	public function delete_by_id($id)
	{
		$this->db->where('id_realisasi', $id);
		$this->db->delete($this->table);
	}
	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}



}
