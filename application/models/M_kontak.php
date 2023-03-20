<?php

class M_kontak extends CI_Model
{
	function update_kontak($arr_kontak)
	{
		$this->db->trans_start();
		$query = $this->db->insert_batch('kontak', $arr_kontak);
		$this->db->trans_complete();
		return $query;
	}

	public function hapus_kontak()
	{
		$query = "DELETE FROM kontak";
		return $this->db->query($query);
	}

	function kontak($telp, $wa, $email)
	{
		$query = $this->db->query("INSERT INTO kontak (telp, no_wa, email) VALUES ('$telp','$wa','$email')");
		return $query;
	}

	function pesan($subjek, $nama, $no_hp, $email, $pesan)
	{
		$query = $this->db->query("INSERT INTO pesan (subjek, nama, no_hp, email, pesan) VALUES ('$subjek',$nama,'$no_hp','$email',$pesan)");
		return $query;
	}

	public function hapus_subjek()
	{
		$query = "DELETE FROM subjek_email";
		return $this->db->query($query);
	}

	function subjek($arr_subjek)
	{
		$this->db->trans_start();
		$query = $this->db->insert_batch('subjek_email', $arr_subjek);
		$this->db->trans_complete();
		return $query;
	}
}
