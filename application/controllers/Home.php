<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{


		if (get_cookie('lang_is') === 'en') {
			$data['keyword'] = "real estate, familia urban, tins property, tins, property, home";
			if (!empty($this->db->query('SELECT desc_en as description FROM konsep')->row_array())) {
				$des = $this->db->query('SELECT desc_en as description FROM konsep')->row_array();
				$data['desc'] = $des['description'];
			} else {
				$data['desc'] = "";
			}
			$data['title'] = "Familia Urban: Real Estate Developer";
			$data['home'] = "Home";
			$data['title_konsep'] = "Concept";
			$data['title_lokasi'] = "Location";
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
			$data['keyword'] = "timah properti, familia urban, timah, properti, home";
			if (!empty($this->db->query('SELECT desc_id as description FROM konsep')->row_array())) {
				$des = $this->db->query('SELECT desc_id as description FROM konsep')->row_array();
				$data['desc'] = $des['description'];
			} else {
				$data['desc'] = "";
			}
			$data['title'] = "Familia Urban: Pengembang Perumahan, Ruko dan Komersial Area";
			$data['home'] = "Home";
			$data['title_konsep'] = "Konsep";
			$data['title_lokasi'] = "Lokasi";
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

		$data['banner'] = $this->db->get_where('banner_promo')->result_array();

		if (get_cookie('lang_is') === 'en') {
			$data['list_kategori'] = $this->db->query('SELECT name_en as nama, slug_en as slug FROM kategori')->result_array();
		} else {
			$data['list_kategori'] = $this->db->query('SELECT name_id as nama, slug_id as slug FROM kategori')->result_array();
		}

		$data['konsep'] = $this->db->get_where('konsep')->row_array();

		if (get_cookie('lang_is') === 'en') {
			$data['desc_konsep'] = $this->db->query('SELECT desc_en as description FROM konsep')->row_array();
		} else {
			$data['desc_konsep'] = $this->db->query('SELECT desc_id as description FROM konsep')->row_array();
		}


		$data['img_kenapa_kami'] = $this->db->get_where('gambar_kenapa_kami')->result_array();

		if (get_cookie('lang_is') === 'en') {
			$data['kenapa_kami'] = $this->db->query('SELECT data_list_en as data_list FROM kenapa_kami')->result_array();
		} else {
			$data['kenapa_kami'] = $this->db->query('SELECT data_list_id as data_list FROM kenapa_kami')->result_array();
		}

		$data['alamat'] = $this->db->get_where('alamat')->row_array();

		if (get_cookie('lang_is') === 'en') {
			$data['properti'] = $this->db->query('SELECT properti.name_en as name_properti, alamat, properti.slug_en as slug, properti.nama_file as nama_file, kategori.name_en as name_kategori, kategori.slug_en as slug_kategori FROM properti JOIN kategori ON properti.id_kategori = kategori.id LIMIT 3')->result_array();
		} else {
			$data['properti'] = $this->db->query('SELECT properti.name_id as name_properti, alamat, properti.slug_id as slug, properti.nama_file as nama_file, kategori.name_id as name_kategori, kategori.slug_id as slug_kategori FROM properti JOIN kategori ON properti.id_kategori = kategori.id LIMIT 3')->result_array();
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

		if (get_cookie('lang_is') === 'en') {
			$data['teks_properti'] = $this->db->get_where('data_teks', ['id' => 5])->row_array();
			$data['teks_fasilitas'] = $this->db->get_where('data_teks', ['id' => 6])->row_array();
		} else {
			$data['teks_properti'] = $this->db->get_where('data_teks', ['id' => 3])->row_array();
			$data['teks_fasilitas'] = $this->db->get_where('data_teks', ['id' => 4])->row_array();
		}

		if (get_cookie('lang_is') === 'en') {
			$data['fasilitas'] = $this->db->query('SELECT icon, heading_en as heading, data_en as data FROM fasilitas')->result_array();
		} else {
			$data['fasilitas'] = $this->db->query('SELECT icon, heading_id as heading, data_id as data FROM fasilitas')->result_array();
		}

		if (get_cookie('lang_is') === 'en') {
			$data['brosur'] = $this->db->query('SELECT label_en as label, nama_file FROM attachment LIMIT 3')->result_array();
		} else {
			$data['brosur'] = $this->db->query('SELECT label_id as label, nama_file FROM attachment LIMIT 3')->result_array();
		}


		$data['kontak'] = $this->db->get_where('kontak')->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('v_home', $data);
		$this->load->view('templates/footer', $data);
	}

	public function download()
	{
		$nama_file = $this->uri->segment(3);
		$data = $this->db->get_where('attachment', ['nama_file' => $nama_file])->row();
		force_download('uploads/file/properti/' . $data->nama_file, NULL);
	}
}
