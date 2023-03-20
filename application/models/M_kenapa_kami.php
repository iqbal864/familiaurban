<?php

class M_kenapa_kami extends CI_Model
{
    function tambah_gambar_kenapa_kami($arr_gambar)
    {
        $this->db->trans_start();
        $query = $this->db->insert_batch('gambar_kenapa_kami', $arr_gambar);
        $this->db->trans_complete();
        return $query;
    }

    public function hapus_gambar_kenapa_kami()
    {
        $query = "DELETE FROM gambar_kenapa_kami";
        return $this->db->query($query);
    }

    function tambah_kenapa_kami($arr_data)
    {
        $this->db->trans_start();
        $query = $this->db->insert_batch('kenapa_kami', $arr_data);
        $this->db->trans_complete();
        return $query;
    }

    public function hapus_kenapa_kami()
    {
        $query = "DELETE FROM kenapa_kami";
        return $this->db->query($query);
    }
}
