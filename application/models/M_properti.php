<?php

class M_properti extends CI_Model
{

	function tambah_properti($kategori, $name, $name2, $desc, $desc2, $meta, $meta2, $slug, $slug2, $alamat, $lat, $long, $vidio, $name_file, $name_file_plan)
	{
		$query = $this->db->query("INSERT INTO properti (id_kategori,name_id,name_en,desc_id,desc_en,meta_id,meta_en,slug_id,slug_en,alamat,latitude,longitude,link_vidio,nama_file,master_plan) VALUES ('$kategori','$name','$name2','$desc','$desc2','$meta','$meta2','$slug','$slug2','$alamat','$lat','$long','$vidio','$name_file','$name_file_plan')");
		return $query;
	}

	function tambah_fitur($arr_fitur)
	{
		$this->db->trans_start();
		$query = $this->db->insert_batch('fitur_properti', $arr_fitur);
		$this->db->trans_complete();
		return $query;
	}

	function tambah_file_properti($arr_file)
	{
		$this->db->trans_start();
		$query = $this->db->insert_batch('attachment', $arr_file);
		$this->db->trans_complete();
		return $query;
	}

	// start datatables
	var $column_order = array(null, 'properti.name_id', 'kategori.name_id', 'properti.meta_id'); //set column field database for datatable orderable
	var $column_search = array('properti.name_id', 'kategori.name_id', 'properti.meta_id'); //set column field database for datatable searchable
	var $order = array('properti.id' => 'desc'); // default order 

	private function _get_datatables_query()
	{
		$this->db->select('properti.*, kategori.name_id as kategori_name_id, kategori.name_en as kategori_name_en');
		$this->db->from('properti');
		$this->db->join('kategori', 'properti.id_kategori = kategori.id');

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

	function get_list()
	{
		$this->_get_datatables_query();
		if (@$_POST['length'] != -1)
			$this->db->limit(@$_POST['length'], @$_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	function count_all()
	{
		$this->db->from('properti');
		return $this->db->count_all_results();
	}

	public function edit_properti($id, $data)
	{
		$query = $this->db->update('properti', $data, array('id' => $id));
		return $query;
	}

	public function hapus_properti($id)
	{
		$query = "DELETE FROM properti WHERE id = '$id'";
		return $this->db->query($query);
	}

	public function hapus_fitur_properti($id)
	{
		$query = "DELETE FROM fitur_properti WHERE id_properti = '$id'";
		return $this->db->query($query);
	}

	public function hapus_file_properti($id)
	{
		$query = "DELETE FROM attachment WHERE id_properti = '$id'";
		return $this->db->query($query);
	}
}
