<?php

class M_konsep extends CI_Model
{
    function update_konsep($arr_konsep)
    {
        $this->db->trans_start();
        $query = $this->db->insert_batch('konsep', $arr_konsep);
        $this->db->trans_complete();
        return $query;
    }

    public function hapus_konsep()
    {
        $query = "DELETE FROM konsep";
        return $this->db->query($query);
    }

    function konsep($desc, $desc2, $name_file)
    {
        $query = $this->db->query("INSERT INTO konsep (desc_id,desc_en,nama_file) VALUES ('$desc','$desc2','$name_file')");
        return $query;
    }
}
