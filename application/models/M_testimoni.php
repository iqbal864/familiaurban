<?php

class M_testimoni extends CI_Model
{
	public function hapus_testi()
	{
		$query = "DELETE FROM testimoni";
		return $this->db->query($query);
	}

	function tambah_testi($arr_testi)
	{
		$this->db->trans_start();
		$query = $this->db->insert_batch('testimoni', $arr_testi);
		$this->db->trans_complete();
		return $query;
	}
}
