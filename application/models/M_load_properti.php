<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_load_properti extends CI_Model
{

	function __construct()
	{
		$this->tblName = 'properti';
	}

	/*
     * Fetch posts data from the database
     * @param id returns a single record if specified, otherwise all records
     */
	function getRows_id($params = array(), $id_kategori)
	{
		$this->db->select('id_kategori, properti.name_id as name_properti, alamat, properti.slug_id as slug, properti.nama_file as nama_file, kategori.name_id as name_kategori');
		$this->db->from($this->tblName);
		$this->db->join('kategori', 'properti.id_kategori = kategori.id');
		$this->db->where('kategori.id', $id_kategori);


		//fetch data by conditions
		if (array_key_exists("where", $params)) {
			foreach ($params['where'] as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		if (array_key_exists("order_by", $params)) {
			$this->db->order_by($params['order_by']);
		}

		if (array_key_exists("id", $params)) {
			$this->db->where('id', $params['id']);
			$query = $this->db->get();
			$result = $query->row_array();
		} else {
			//set start and limit
			if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
				$this->db->limit($params['limit'], $params['start']);
			} elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
				$this->db->limit($params['limit']);
			}

			if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
				$result = $this->db->count_all_results();
			} else {
				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
			}
		}

		//return fetched data
		return $result;
	}

	function getRows_en($params = array(), $id_kategori)
	{
		$this->db->select('id_kategori, properti.name_en as name_properti, alamat, properti.slug_en as slug, properti.nama_file as nama_file, kategori.name_en as name_kategori');
		$this->db->from($this->tblName);
		$this->db->join('kategori', 'properti.id_kategori = kategori.id');
		$this->db->where('kategori.id', $id_kategori);


		//fetch data by conditions
		if (array_key_exists("where", $params)) {
			foreach ($params['where'] as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		if (array_key_exists("order_by", $params)) {
			$this->db->order_by($params['order_by']);
		}

		if (array_key_exists("id", $params)) {
			$this->db->where('id', $params['id']);
			$query = $this->db->get();
			$result = $query->row_array();
		} else {
			//set start and limit
			if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
				$this->db->limit($params['limit'], $params['start']);
			} elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
				$this->db->limit($params['limit']);
			}

			if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
				$result = $this->db->count_all_results();
			} else {
				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
			}
		}

		//return fetched data
		return $result;
	}

	function getVidio_id($params = array())
	{
		$this->db->select('id, name_id as name, link_vidio');
		$this->db->from($this->tblName);


		//fetch data by conditions
		if (array_key_exists("where", $params)) {
			foreach ($params['where'] as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		if (array_key_exists("order_by", $params)) {
			$this->db->order_by($params['order_by']);
		}

		if (array_key_exists("id", $params)) {
			$this->db->where('id', $params['id']);
			$query = $this->db->get();
			$result = $query->row_array();
		} else {
			//set start and limit
			if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
				$this->db->limit($params['limit'], $params['start']);
			} elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
				$this->db->limit($params['limit']);
			}

			if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
				$result = $this->db->count_all_results();
			} else {
				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
			}
		}

		//return fetched data
		return $result;
	}

	function getVidio_en($params = array())
	{
		$this->db->select('id, name_en as name, link_vidio');
		$this->db->from($this->tblName);


		//fetch data by conditions
		if (array_key_exists("where", $params)) {
			foreach ($params['where'] as $key => $value) {
				$this->db->where($key, $value);
			}
		}

		if (array_key_exists("order_by", $params)) {
			$this->db->order_by($params['order_by']);
		}

		if (array_key_exists("id", $params)) {
			$this->db->where('id', $params['id']);
			$query = $this->db->get();
			$result = $query->row_array();
		} else {
			//set start and limit
			if (array_key_exists("start", $params) && array_key_exists("limit", $params)) {
				$this->db->limit($params['limit'], $params['start']);
			} elseif (!array_key_exists("start", $params) && array_key_exists("limit", $params)) {
				$this->db->limit($params['limit']);
			}

			if (array_key_exists("returnType", $params) && $params['returnType'] == 'count') {
				$result = $this->db->count_all_results();
			} else {
				$query = $this->db->get();
				$result = ($query->num_rows() > 0) ? $query->result_array() : FALSE;
			}
		}

		//return fetched data
		return $result;
	}
}
