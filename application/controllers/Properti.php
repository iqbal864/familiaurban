<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Properti extends CI_Controller
{

	function __construct()
	{
		parent::__construct();

		// Load post model
		$this->load->model('M_load_properti');

		// Per page limit
		$this->perPage = 8;
	}

	public function index()
	{

		$slug = $this->uri->segment(2);
		if (empty($slug)) {
			$cekSlugAwal = $this->db->query("SELECT slug_id FROM kategori LIMIT 1")->row_array();
			$slug = $cekSlugAwal['slug_id'];
		}

		if (get_cookie('lang_is') === 'en') {
			$cek = $this->db->query("SELECT id FROM kategori WHERE slug_en = '$slug'")->row_array();
			if (empty($cek['id'])) {
				$cek = $this->db->query("SELECT id FROM kategori  WHERE slug_id = '$slug'")->row_array();
			}
		} else {
			$cek = $this->db->query("SELECT id FROM kategori  WHERE slug_id = '$slug'")->row_array();
			if (empty($cek['id'])) {
				$cek = $this->db->query("SELECT id FROM kategori WHERE slug_en = '$slug'")->row_array();
			}
		}

		if (!empty($cek['id'])) {
			$id_kategori = $cek['id'];
		} else {
			$id_kategori = "";
		}

		$data['id_kategori'] = $id_kategori;

		if (get_cookie('lang_is') === 'en') {
			$data['list_kategori'] = $this->db->query('SELECT id, name_en as nama, slug_en as slug FROM kategori')->result_array();
			$kategori = $this->db->query("SELECT id, meta_en as meta, name_en as nama, slug_en as slug FROM kategori WHERE id = '$id_kategori'")->row_array();
		} else {
			$data['list_kategori'] = $this->db->query('SELECT id, name_id as nama, slug_id as slug FROM kategori')->result_array();
			$kategori = $this->db->query("SELECT id, meta_id as meta, name_id as nama, slug_id as slug FROM kategori WHERE id = '$id_kategori'")->row_array();
		}

		if (get_cookie('lang_is') === 'en') {
			$data['keyword'] = htmlentities($kategori['meta']);
			if (!empty($this->db->query("SELECT desc_en as description FROM kategori WHERE id = '$id_kategori'")->row_array())) {
				$des = $this->db->query("SELECT desc_en as description FROM kategori WHERE id = '$id_kategori'")->row_array();
				$data['desc'] = $des['description'];
			} else {
				$data['desc'] = "";
			}
			$data['title'] = $kategori['nama'] . " Familia Urban";
			$data['home'] = "Home";
			$data['title_konsep'] = "Concept";
			$data['title_lokasi'] = "Location";
			$data['title_kategori'] = $kategori['nama'];
			$data['title_properti'] = "Property";
			$data['title_galeri'] = "Gallery";
			$data['title_testimoni'] = "Testimony";
			$data['title_kontak_kami'] = "Contact Us";
			$data['title_kenapa_kami'] = "Why Us";
			$data['title_fasilitas'] = "Supporting Facilities";
			$data['title_download'] = "Download E-Brochure";
			$data['title_sosmed'] = "Social Media";
			$data['title_lihat_semua'] = "See more";
			$data['title_scroll'] = "SCROLL DOWN";
			$data['title_hubungi'] = "Contact Now";
			$data['title_hubungi_marketing'] = "Contact Marketing";
			$data['title_lihat_maps'] = "Open Google Maps";
		} else {
			$data['keyword'] = htmlentities($kategori['meta']);
			if (!empty($this->db->query("SELECT desc_id as description FROM kategori WHERE id = '$id_kategori'")->row_array())) {
				$des = $this->db->query("SELECT desc_id as description FROM kategori WHERE id = '$id_kategori'")->row_array();
				$data['desc'] = $des['description'];
			} else {
				$data['desc'] = "";
			}
			$data['title'] = $kategori['nama'] . " Familia Urban";
			$data['home'] = "Home";
			$data['title_konsep'] = "Konsep";
			$data['title_lokasi'] = "Lokasi";
			$data['title_kategori'] = $kategori['nama'];
			$data['title_properti'] = "Properti";
			$data['title_galeri'] = "Galeri";
			$data['title_testimoni'] = "Testimoni";
			$data['title_kontak_kami'] = "Kontak Kami";
			$data['title_kenapa_kami'] = "Kenapa Kami";
			$data['title_fasilitas'] = "Fasilitas Pendukung";
			$data['title_download'] = "Unduh E-Brosur";
			$data['title_sosmed'] = "Sosial Media";
			$data['title_lihat_semua'] = "Lihat semua";
			$data['title_scroll'] = "GULIR KE BAWAH";
			$data['title_hubungi'] = "Hubungi Sekarang";
			$data['title_hubungi_marketing'] = "Hubungi Marketing";
			$data['title_lihat_maps'] = "Buka Google Maps";
		}


		// Get posts data from the database
		$conditions['order_by'] = "properti.id DESC";
		$conditions['limit'] = $this->perPage;

		if (get_cookie('lang_is') === 'en') {
			$data['properti'] = $this->M_load_properti->getRows_en($conditions, $id_kategori);
			// $data['properti'] = $this->db->query("SELECT properti.name_en as name_properti, alamat, properti.slug_en as slug, properti.nama_file as nama_file, kategori.name_en as name_kategori FROM properti JOIN kategori ON properti.id_kategori = kategori.id WHERE kategori.id = '$id_kategori'")->result_array();
		} else {
			$data['properti'] = $this->M_load_properti->getRows_id($conditions, $id_kategori);
			// $data['properti'] = $this->db->query("SELECT properti.name_id as name_properti, alamat, properti.slug_id as slug, properti.nama_file as nama_file, kategori.name_id as name_kategori FROM properti JOIN kategori ON properti.id_kategori = kategori.id WHERE kategori.id = '$id_kategori'")->result_array();
		}


		if (get_cookie('lang_is') === 'en') {
			$data['list_kategori'] = $this->db->query('SELECT id, name_en as nama, slug_en as slug FROM kategori')->result_array();
		} else {
			$data['list_kategori'] = $this->db->query('SELECT id, name_id as nama, slug_id as slug FROM kategori')->result_array();
		}

		$data['gambar_kategori'] = $this->db->query("SELECT nama_file FROM kategori WHERE slug_id = '$slug' OR slug_en = '$slug'")->row_array();

		if (get_cookie('lang_is') === 'en') {
			$data['desc_kategori'] = $this->db->query("SELECT desc_en as description FROM kategori WHERE slug_en = '$slug'")->row_array();
		} else {
			$data['desc_kategori'] = $this->db->query("SELECT desc_id as description FROM kategori  WHERE slug_id = '$slug'")->row_array();
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
		$this->load->view('v_properti', $data);
		$this->load->view('templates/footer', $data);
	}

	function loadMoreData()
	{
		$conditions = array();

		// Get last post ID
		$lastID = (int)$this->input->post('id');
		if ($lastID != 0) {
			$GetIdKategori = $this->db->query("SELECT id_kategori FROM properti WHERE id = '$lastID'")->row_array();
			$get_kategori_id = $GetIdKategori['id_kategori'];


			if (get_cookie('lang_is') === 'en') {
				// Get post rows num
				$conditions['where'] = array('properti.id <' => $lastID);
				$conditions['returnType'] = 'count';
				$data['postNum'] = $this->M_load_properti->getRows_en($conditions, $get_kategori_id);

				// Get posts data from the database
				$conditions['returnType'] = '';
				$conditions['order_by'] = "properti.id DESC";
				$conditions['limit'] = $this->perPage;
				$data['properti'] = $this->M_load_properti->getRows_en($conditions, $get_kategori_id);
				$cek = $this->M_load_properti->getRows_en($conditions, $get_kategori_id);
			} else {
				// Get post rows num
				$conditions['where'] = array('properti.id <' => $lastID);
				$conditions['returnType'] = 'count';
				$data['postNum'] = $this->M_load_properti->getRows_id($conditions, $get_kategori_id);

				// Get posts data from the database
				$conditions['returnType'] = '';
				$conditions['order_by'] = "properti.id DESC";
				$conditions['limit'] = $this->perPage;
				$data['properti'] = $this->M_load_properti->getRows_id($conditions, $get_kategori_id);
				$cek = $this->M_load_properti->getRows_id($conditions, $get_kategori_id);
			}

			$data['postLimit'] = $this->perPage;

			// Pass data to view
			if (!empty($cek)) {
				$this->load->view('v_properti_more', $data, false);
			}
		}
	}
}
