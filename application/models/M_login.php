<?php

class M_login extends CI_Model
{
	function cek_login($table, $where)
	{
		return $this->db->get_where($table, $where);
	}

	public function lupa_password($id, $data)
	{
		$query = $this->db->update('pengguna', $data, array('id' => $id));
		return $query;
	}
}
