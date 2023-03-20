<?php

class M_kerja_sama extends CI_Model
{
    function tambah_gambar_bank($arr_gambar)
    {
        $this->db->trans_start();
        $query = $this->db->insert_batch('kerja_sama_bank', $arr_gambar);
        $this->db->trans_complete();
        return $query;
    }

    public function hapus_gambar_bank()
    {
        $query = "DELETE FROM kerja_sama_bank";
        return $this->db->query($query);
    }
}
