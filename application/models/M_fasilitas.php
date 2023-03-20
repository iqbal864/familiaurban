<?php

class M_fasilitas extends CI_Model
{

    public function hapus_fasilitas()
    {
        $query = "DELETE FROM fasilitas";
        return $this->db->query($query);
    }

    function tambah_fasilitas($arr_fasilitas)
    {
        $this->db->trans_start();
        $query = $this->db->insert_batch('fasilitas', $arr_fasilitas);
        $this->db->trans_complete();
        return $query;
    }
}
