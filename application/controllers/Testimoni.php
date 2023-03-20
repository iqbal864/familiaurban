<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		// Load post model
		$this->load->model('M_load_testimoni');

		// Per page limit
		$this->perPage = 8;
	}

	public function index()
	{
		if (get_cookie('lang_is') === 'en') {
			$data['keyword'] = "timah properti, familia urban, testimony";
			$data['desc'] = "";
			$data['title'] = "Testimony | Familia Urban";
			$data['home'] = "Home";
			$data['title_konsep'] = "Concept";
			$data['title_lokasi'] = "Location";
			$data['title_properti'] = "Property";
			$data['title_galeri'] = "Gallery";
			$data['title_testimoni'] = "Testimony";
			$data['title_kontak_kami'] = "Contact Us";
			$data['title_sosmed'] = "Social Media";
			$data['title_lihat_maps'] = "Open Google Maps";
		} else {
			$data['keyword'] = "timah properti, familia urban, testimoni, ulasan";
			$data['desc'] = "";
			$data['title'] = "Testimoni | Familia Urban";
			$data['home'] = "Home";
			$data['title_konsep'] = "Konsep";
			$data['title_lokasi'] = "Lokasi";
			$data['title_properti'] = "Properti";
			$data['title_galeri'] = "Galeri";
			$data['title_testimoni'] = "Testimoni";
			$data['title_kontak_kami'] = "Kontak Kami";
			$data['title_sosmed'] = "Sosial Media";
			$data['title_lihat_maps'] = "Buka Google Maps";
		}


		// Get posts data from the database
		$conditions['order_by'] = "id DESC";
		$conditions['limit'] = $this->perPage;

		$data['data_testimoni'] = $this->M_load_testimoni->getTesti($conditions);

		if (get_cookie('lang_is') === 'en') {
			$data['list_kategori'] = $this->db->query('SELECT id, name_en as nama, slug_en as slug FROM kategori')->result_array();
		} else {
			$data['list_kategori'] = $this->db->query('SELECT id, name_id as nama, slug_id as slug FROM kategori')->result_array();
		}

		$data['icon'] = $this->db->get_where('data_gambar', ['id' => 1])->row_array();
		$data['logo'] = $this->db->get_where('data_gambar', ['id' => 2])->row_array();
		$data['logo_putih'] = $this->db->get_where('data_gambar', ['id' => 3])->row_array();
		$data['logo_perusahaan'] = $this->db->get_where('data_gambar', ['id' => 4])->row_array();
		$data['sec_kenapa_kami'] = $this->db->get_where('data_gambar', ['id' => 5])->row_array();
		$data['sec_fasilitas'] = $this->db->get_where('data_gambar', ['id' => 6])->row_array();
		$data['bg_footer'] = $this->db->get_where('data_gambar', ['id' => 7])->row_array();

		$data['kerja_sama_bank'] = $this->db->get_where('kerja_sama_bank')->result_array();
		$data['sosial_media'] = $this->db->get_where('sosial_media')->result_array();

		$data['teks_footer'] = $this->db->get_where('data_teks', ['id' => 1])->row_array();

		$data['alamat'] = $this->db->get_where('alamat')->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('v_testimoni', $data);
		$this->load->view('templates/footer', $data);
	}

	function loadMoreTesti()
	{
		$conditions = array();

		// Get last post ID
		$lastID = (int)$this->input->post('id');
		if ($lastID != 0) {

			// Get post rows num
			$conditions['where'] = array('id <' => $lastID);
			$conditions['returnType'] = 'count';
			$data['postNum'] = $this->M_load_testimoni->getTesti($conditions);

			// Get posts data from the database
			$conditions['returnType'] = '';
			$conditions['order_by'] = "id DESC";
			$conditions['limit'] = $this->perPage;
			$data['data_testimoni'] = $this->M_load_testimoni->getTesti($conditions);
			$cek = $this->M_load_testimoni->getTesti($conditions);

			$data['postLimit'] = $this->perPage;

			// Pass data to view
			if (!empty($cek)) {
				$this->load->view('v_testimoni_more', $data, false);
			}
		}
	}
}
