<?php

class M_pengaturan extends CI_Model
{
    public function edit_icon($id, $file_icon)
    {
        $query = $this->db->update('data_gambar', $file_icon, array('id' => $id));
        return $query;
    }

    public function edit_logo($id, $file_logo)
    {
        $query = $this->db->update('data_gambar', $file_logo, array('id' => $id));
        return $query;
    }

    public function edit_logo_putih($id, $file_logo_putih)
    {
        $query = $this->db->update('data_gambar', $file_logo_putih, array('id' => $id));
        return $query;
    }

    public function edit_logo_perusahaan($id, $file_logo_perusahaan)
    {
        $query = $this->db->update('data_gambar', $file_logo_perusahaan, array('id' => $id));
        return $query;
    }

    public function edit_sec_kenapa_kami($id, $file_sec_kenapa_kami)
    {
        $query = $this->db->update('data_gambar', $file_sec_kenapa_kami, array('id' => $id));
        return $query;
    }

    public function edit_sec_fasilitas($id, $file_sec_fasilitas)
    {
        $query = $this->db->update('data_gambar', $file_sec_fasilitas, array('id' => $id));
        return $query;
    }

    public function edit_bg_footer($id, $file_footer)
    {
        $query = $this->db->update('data_gambar', $file_footer, array('id' => $id));
        return $query;
    }

    public function edit_text_footer($id, $footer)
    {
        $query = $this->db->update('data_teks', $footer, array('id' => $id));
        return $query;
    }

    public function edit_text_versi($id, $versi)
    {
        $query = $this->db->update('data_teks', $versi, array('id' => $id));
        return $query;
    }

    public function edit_text_properti($id, $teks_properti)
    {
        $query = $this->db->update('data_teks', $teks_properti, array('id' => $id));
        return $query;
    }

    public function edit_text_fasilitas($id, $teks_fasilitas)
    {
        $query = $this->db->update('data_teks', $teks_fasilitas, array('id' => $id));
        return $query;
    }

    public function edit_text_properti2($id, $teks_properti)
    {
        $query = $this->db->update('data_teks', $teks_properti, array('id' => $id));
        return $query;
    }

    public function edit_text_fasilitas2($id, $teks_fasilitas)
    {
        $query = $this->db->update('data_teks', $teks_fasilitas, array('id' => $id));
        return $query;
    }
}
