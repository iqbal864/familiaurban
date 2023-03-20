<?php

class M_pengguna extends CI_Model
{
	// start datatables
	var $column_order = array(null, 'pengguna.username', 'pengguna.name', 'role.role'); //set column field database for datatable orderable
	var $column_search = array('pengguna.username', 'pengguna.name', 'role.role'); //set column field database for datatable searchable
	var $order = array('pengguna.create_at' => 'desc'); // default order 

	private function _get_datatables_query($id_pengguna)
	{
		$this->db->select('pengguna.*, role.role as role');
		$this->db->from('pengguna');
		$this->db->join('role', 'pengguna.id_role = role.id');
		$this->db->where("pengguna.id != '$id_pengguna'");

		$i = 0;
		foreach ($this->column_search as $item) { // loop column 

			if (@$_POST['search']['value']) { // if datatable send POST for search

				if ($i === 0) { // first loop
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) { // here order processing
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_list($id_pengguna)
	{
		$this->_get_datatables_query($id_pengguna);
		if (@$_POST['length'] != -1)
			$this->db->limit(@$_POST['length'], @$_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($id_pengguna)
	{
		$this->_get_datatables_query($id_pengguna);
		$query = $this->db->get();
		return $query->num_rows();
	}

	function count_all($id_pengguna)
	{
		$this->db->from('pengguna');
		$this->db->where("pengguna.id != '$id_pengguna'");
		return $this->db->count_all_results();
	}

	function get_role()
	{
		$query = $this->db->get("role");
		return $query->result_array();
	}

	function tambah_pengguna($role, $username, $name, $password)
	{
		$query = $this->db->query("INSERT INTO pengguna (id_role, username, name, password) VALUES ('$role','$username','$name','$password')");
		return $query;
	}

	public function edit_pengguna($id, $data)
	{
		$query = $this->db->update('pengguna', $data, array('id' => $id));
		return $query;
	}

	public function hapus_pengguna($id)
	{
		$query = "DELETE FROM pengguna WHERE id = '$id'";
		return $this->db->query($query);
	}
}
