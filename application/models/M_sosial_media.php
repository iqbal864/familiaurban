<?php

class M_sosial_media extends CI_Model
{
    public function hapus_sosmed()
    {
        $query = "DELETE FROM sosial_media";
        return $this->db->query($query);
    }

    function tambah_sosmed($arr_sosmed)
    {
        $this->db->trans_start();
        $query = $this->db->insert_batch('sosial_media', $arr_sosmed);
        $this->db->trans_complete();
        return $query;
    }
}
