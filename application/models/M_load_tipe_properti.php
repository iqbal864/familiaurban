<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class M_load_tipe_properti extends CI_Model
{

	function __construct()
	{
		$this->tblName = 'gambar_tipe_properti';
	}

	/*
     * Fetch posts data from the database
     * @param id returns a single record if specified, otherwise all records
     */
	function getGambar_id($params = array())
	{
		$this->db->select('id, nama_file, label_id as label');
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

	function getGambar_en($params = array())
	{
		$this->db->select('id, nama_file, label_en as label');
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
