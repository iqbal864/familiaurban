<?php

class M_alamat extends CI_Model
{
	function update_alamat($arr_alamat)
	{
		$this->db->trans_start();
		$query = $this->db->insert_batch('alamat', $arr_alamat);
		$this->db->trans_complete();
		return $query;
	}

	public function hapus_alamat()
	{
		$query = "DELETE FROM alamat";
		return $this->db->query($query);
	}

	function alamat($lat, $long, $link, $alamat)
	{
		$query = $this->db->query("INSERT INTO alamat (latitude,longitude,link,alamat) VALUES ($lat,$long,$link,$alamat)");
		return $query;
	}
}
