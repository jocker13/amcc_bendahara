<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class estimasi_model extends CI_Model {
	var $table = 'estimasi';
	var $column_order = array('jenis','nama_sie','nama_estimasi','banyak','harga_satuan',NULL); //set column field database for datatable orderable
	var $column_search = array('jenis','nama_sie','nama_estimasi','banyak','harga_satuan'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id_estimasi' => 'desc');


	public function getEstimasi()
	{
		$sql =$this->db->query("select e.*, k.nama_kegiatan from estimasi e join kegiatan k on e.id_kegiatan = k.id_kegiatan");
		return $sql;
	}
	public function getEstimasis($kegiatan="")
	{
		$sql =$this->db->query("select e.*, k.nama_kegiatan from estimasi e join kegiatan k on e.id_kegiatan = k.id_kegiatan where  e.id_kegiatan = '$kegiatan'");

		return $sql->result_array();;
	}
	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}
	public function delete($id_estimasi)
	{
		$this->db->where('id_estimasi',$id_estimasi);
		$this->db->delete('estimasi');
	}
	public function edit($id_estimasi,$data)
	{
		$this->db->where('id_estimasi',$id_estimasi);
		$this->db->update('estimasi',$data);
		return TRUE;
	}
	public function ubah($id_estimasi,$data)
	{
		$this->db->where('id_estimasi',$id_estimasi);
		$this->db->update('estimasi', $data);
	}

	private function _get_datatables_query($id_kegiatan)
	{
		$this->db->from($this->table);
			$this->db->where('id_kegiatan',$id_kegiatan);	
	
		
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

	function get_datatables($id_kegiatan)
	{
		$this->_get_datatables_query($id_kegiatan);
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($id_kegiatan)
	{
		$this->_get_datatables_query($id_kegiatan);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id_estimasi', $id);
		$this->db->delete($this->table);
	}
	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_estimasi',$id);
		$query = $this->db->get();

		return $query->row();
	}
}
