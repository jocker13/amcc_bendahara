<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class nota_model extends CI_Model {
	var $table = 'nota';
	var $column_order = array('no_nota','nama_kegiatan',NULL); //set column field database for datatable orderable
	var $column_search = array('no_nota','nama_kegiatan'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id_nota' => 'asc');

	public function getnota()
	{
		$sql =$this->db->query("select n.*, k.nama_kegiatan as nama_kegiatan, k.tahun_kep as tahun from nota n join kegiatan k on n.id_kegiatan = k.id_kegiatan");
		return $sql;
	}
	public function getNotaKegiatan($kegiatan="")
	
	{



		$sql =$this->db->query("select n.*, k.nama_kegiatan from nota n join kegiatan k on n.id_kegiatan = k.id_kegiatan where  n.id_kegiatan = '$kegiatan'");

		return $sql;
	}
	public function save($data)
	{

		$this->db->insert('nota',$data);
	}
	public function delete($id)
	{
		$this->db->where('id_nota',$id_nota);
		$this->db->delete('nota');
	}
	public function edit($id_nota)
	{
		$this->db->where('id_nota',$id_nota);
		return $this->db->get('nota');
	}
	public function ubah($id_nota,$data)
	{
		$this->db->where('id_nota',$id_nota);
		$this->db->update('nota', $data);
	}


	private function _get_datatables_query()
	{

		// $this->db->from($this->table);
		// $this->db->join('kegiatan','kegiatan.id=nota.id_kegiatan');
		$this->db->select('*')
    		 ->from('nota')
    		 ->join('kegiatan','kegiatan.id_kegiatan=nota.id_kegiatan');
		
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

	public function delete_by_id($id)
	{
		$this->db->where('id_nota', $id);
		$this->db->delete($this->table);
	}
	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_nota',$id);
		$query = $this->db->get();

		return $query->row();
	}

	
}