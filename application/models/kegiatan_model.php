<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kegiatan_model extends CI_Model {
	var $table = 'kegiatan';
	var $column_order = array('nama_kegiatan','tahun_kep','tanggal',NULL); //set column field database for datatable orderable
	var $column_search = array('nama_kegiatan','tahun_kep','tanggal'); //set column field database for datatable searchable just firstname , lastname , address are searchable
	var $order = array('id_kegiatan' => 'desc');

	public function getKegiatan($id_users,$jabatan)
	{
		if ($jabatan!='admin'){
		$sql =$this->db->query("select * from kegiatan where id_users='$id_users'");
		return $sql;
	}else{
		$sql =$this->db->query("select * from kegiatan");
		return $sql;
	}
	}
	public function getKegiatanByID($id_kegiatan="")
	{
		$sql =$this->db->query("select nama_kegiatan from kegiatan where id_kegiatan='$id_kegiatan'");
		return $sql;
	}
	public function getKegiatanestimasi($id_users)
	{
		$sql =$this->db->query("select * from kegiatan where id_users = $id_users" );
		return $sql;
	}
	public function getKegiatanNota($id_users)
	{
		$sql =$this->db->query("select * from kegiatan where id_users = $id_users" );
		return $sql;
	}
	public function getKegiatanBytahun($tahun_kep)
	{
		$this->db->where('tahun_kep',$tahun_kep);
		return $this->db->get('kegiatan');
	}
	public function save($data)
	{
		$this->db->insert('kegiatan',$data);
	}
	public function ubah($id_kegiatan,$data)
	{
		$this->db->where('id_kegiatan',$id_kegiatan);
		$this->db->update('kegiatan', $data);
	}





private function _get_datatables_query()
	{
		$id_users= $this->session->userdata['logged_in']['id_users'];
		$jabatan=$this->session->userdata['logged_in']['level'];
		if ($jabatan!='admin') {
			$this->db->from($this->table);
			$this->db->where('id_users',$id_users);	
		}else{
			$this->db->from($this->table);
		}
		
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
		$this->db->where('id_kegiatan', $id);
		$this->db->delete($this->table);
	}
	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id_kegiatan',$id);
		$query = $this->db->get();

		return $query->row();
	}

}
