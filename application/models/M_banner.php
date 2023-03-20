<?php

class M_banner extends CI_Model
{
    function tambah_gambar_banner($arr_gambar)
    {
        $this->db->trans_start();
        $query = $this->db->insert_batch('banner_promo', $arr_gambar);
        $this->db->trans_complete();
        return $query;
    }

    public function hapus_gambar_banner()
    {
        $query = "DELETE FROM banner_promo";
        return $this->db->query($query);
    }
}
