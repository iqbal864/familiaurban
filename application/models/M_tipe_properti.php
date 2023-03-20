<?php

class M_tipe_properti extends CI_Model
{

    function tambah_tipe_properti($name, $name2, $desc, $desc2, $name_file, $idProperti)
    {
        $query = $this->db->query("INSERT INTO tipe_properti (name_id, name_en, desc_id, desc_en, denah, id_properti) VALUES ('$name', '$name2', '$desc', '$desc2', '$name_file', '$idProperti')");
        return $query;
    }

    public function edit_tipe_properti($id, $data)
    {
        $query = $this->db->update('tipe_properti', $data, array('id' => $id));
        return $query;
    }


    function tambah_ukuran($ukuran, $luasTanah, $luasBangunan, $id)
    {
        $query = $this->db->query("INSERT INTO ukuran_tipe_properti (ukuran, luas_tanah, luas_bangunan, id_tipe_properti) VALUES ('$ukuran', '$luasTanah', '$luasBangunan', '$id')");
        return $query;
    }


    function tambah_spesifikasi($arr_spek)
    {
        $this->db->trans_start();
        $query = $this->db->insert_batch('spesifikasi_tipe_properti', $arr_spek);
        $this->db->trans_complete();
        return $query;
    }

    function tambah_spesifikasi_tambahan($arr_tam)
    {
        $this->db->trans_start();
        $query = $this->db->insert_batch('spesifikasi_tipe_properti_tambahan', $arr_tam);
        $this->db->trans_complete();
        return $query;
    }

    function tambah_gambar_galeri($arr_gambar)
    {
        $this->db->trans_start();
        $query = $this->db->insert_batch('gambar_tipe_properti', $arr_gambar);
        $this->db->trans_complete();
        return $query;
    }

    // start datatables
    var $column_order = array(null, 'tipe_properti.name_id'); //set column field database for datatable orderable
    var $column_search = array('tipe_properti.name_id'); //set column field database for datatable searchable
    var $order = array('tipe_properti.id' => 'desc'); // default order 

    private function _get_datatables_query($id_properti)
    {
        $this->db->select('tipe_properti.*');
        $this->db->from('tipe_properti');
        $this->db->where('id_properti', $id_properti);

        $i = 0;
        foreach ($this->column_search as $item) { // loop column 

            if (@$_POST['search']['value']) { // if datatable send POST for search

                if ($i === 0) { // first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_list($id_properti)
    {
        $this->_get_datatables_query($id_properti);
        if (@$_POST['length'] != -1)
            $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered($id_properti)
    {
        $this->_get_datatables_query($id_properti);
        $query = $this->db->get();
        return $query->num_rows();
    }

    function count_all($id_properti)
    {
        $this->db->from('tipe_properti');
        $this->db->where('id_properti', $id_properti);
        return $this->db->count_all_results();
    }

    public function edit_ukuran($id, $data)
    {
        $query = $this->db->update('ukuran_tipe_properti', $data, array('id_tipe_properti' => $id));
        return $query;
    }

    public function hapus_spesifikasi($id)
    {
        $query = "DELETE FROM spesifikasi_tipe_properti WHERE id_tipe_properti = '$id'";
        return $this->db->query($query);
    }

    public function hapus_spesifikasi_tambahan($id)
    {
        $query = "DELETE FROM spesifikasi_tipe_properti_tambahan WHERE id_tipe_properti = '$id'";
        return $this->db->query($query);
    }

    public function hapus_gambar_galeri($id)
    {
        $query = "DELETE FROM gambar_tipe_properti WHERE id_tipe_properti = '$id'";
        return $this->db->query($query);
    }

    public function hapus_tipe_properti($id)
    {
        $query = "DELETE FROM tipe_properti WHERE id = '$id'";
        return $this->db->query($query);
    }

    public function hapus_ukuran($id)
    {
        $query = "DELETE FROM ukuran_tipe_properti WHERE id_tipe_properti = '$id'";
        return $this->db->query($query);
    }
}
