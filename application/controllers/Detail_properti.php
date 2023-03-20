<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once(APPPATH . 'views/vendor/autoload.php');

use Html2Text\Html2Text;

class Detail_properti extends CI_Controller
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
		$slug = $this->uri->segment(2);
		$slug_properti = $this->uri->segment(3);
		$cekKategori = $this->db->query("SELECT id FROM kategori WHERE slug_en = '$slug' OR slug_id = '$slug'")->row_array();
		$cekProperti = $this->db->query("SELECT id FROM properti WHERE slug_en = '$slug_properti' OR slug_id = '$slug_properti'")->row_array();
		if (empty($cekKategori['id']) and empty($cekProperti['id'])) {
			redirect(base_url("properti"));
		} else if (empty($cekKategori['id']) and !empty($cekProperti['id'])) {
			redirect(base_url("properti"));
		} else if (!empty($cekKategori['id']) and empty($cekProperti['id'])) {
			redirect(base_url("properti/" . $slug . ""));
		} else {

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

			$getIdProperti =  $this->db->query("SELECT id FROM properti  WHERE slug_id = '$slug_properti' OR slug_en = '$slug_properti'")->row_array();
			$id_properti = $getIdProperti['id'];

			if (get_cookie('lang_is') === 'en') {
				$tipe_properti = $this->db->query("SELECT id, name_en as name_tipe, desc_en as description, denah FROM tipe_properti WHERE tipe_properti.id_properti = '$id_properti'")->result_array();
			} else {
				$tipe_properti = $this->db->query("SELECT id, name_id as name_tipe, desc_id as description, denah FROM tipe_properti WHERE tipe_properti.id_properti = '$id_properti'")->result_array();
			}
			$data['tipe_properti'] = $tipe_properti;

			$arr_tipe = array();
			foreach ($tipe_properti as $tp) {
				$arr_tipe[] = $tp['id'];
			}

			$im_id_tipe = implode("','", $arr_tipe);

			if (get_cookie('lang_is') === 'en') {
				$data['gambar_tipe_properti'] = $this->db->query("SELECT nama_file, label_en as label FROM gambar_tipe_properti WHERE id_tipe_properti IN('$im_id_tipe')")->result_array();
				$data['fitur_properti'] = $this->db->query("SELECT * FROM fitur_properti WHERE id_properti = '$id_properti'")->result_array();
			} else {
				$data['gambar_tipe_properti'] = $this->db->query("SELECT nama_file, label_id as label FROM gambar_tipe_properti WHERE id_tipe_properti IN('$im_id_tipe')")->result_array();
				$data['fitur_properti'] = $this->db->query("SELECT * FROM fitur_properti WHERE id_properti = '$id_properti'")->result_array();
			}

			if (get_cookie('lang_is') === 'en') {
				// $data['properti'] = $this->M_load_properti->getRows_en($conditions, $id_kategori);
				$data['properti'] = $this->db->query("SELECT latitude, longitude, link_vidio, alamat, properti.meta_en as meta, properti.desc_en as description, properti.name_en as name_properti, alamat, properti.slug_en as slug, properti.nama_file as nama_file, kategori.name_en as name_kategori, kategori.slug_en as slug_kategori FROM properti JOIN kategori ON properti.id_kategori = kategori.id WHERE kategori.id = '$id_kategori' AND properti.id = '$id_properti'")->row_array();
				$data['similar_properti'] = $this->db->query("SELECT latitude, longitude, link_vidio, alamat, properti.desc_en as description, properti.name_en as name_properti, alamat, properti.slug_en as slug, properti.nama_file as nama_file, kategori.name_en as name_kategori, kategori.slug_en as slug_kategori FROM properti JOIN kategori ON properti.id_kategori = kategori.id WHERE properti.id != '$id_properti' LIMIT 3")->result_array();
			} else {
				// $data['properti'] = $this->M_load_properti->getRows_id($conditions, $id_kategori);
				$data['properti'] = $this->db->query("SELECT latitude, longitude, link_vidio, alamat, properti.meta_id as meta, properti.desc_id as description, properti.name_id as name_properti, alamat, properti.slug_id as slug, properti.nama_file as nama_file, kategori.name_id as name_kategori, kategori.slug_id as slug_kategori FROM properti JOIN kategori ON properti.id_kategori = kategori.id WHERE kategori.id = '$id_kategori'  AND properti.id = '$id_properti'")->row_array();
				$data['similar_properti'] = $this->db->query("SELECT latitude, longitude, link_vidio, alamat, properti.desc_id as description, properti.name_id as name_properti, alamat, properti.slug_id as slug, properti.nama_file as nama_file, kategori.name_id as name_kategori, kategori.slug_id as slug_kategori FROM properti JOIN kategori ON properti.id_kategori = kategori.id WHERE properti.id != '$id_properti' LIMIT 3")->result_array();
			}

			if (get_cookie('lang_is') === 'en') {
				$data['keyword'] = $data['properti']['meta'];
				if (!empty($this->db->query("SELECT desc_en as description FROM properti WHERE id = '$id_properti'")->row_array())) {
					$des = $this->db->query("SELECT desc_en as description FROM properti WHERE id = '$id_properti'")->row_array();
					$data['desc'] = $des['description'];
				} else {
					$data['desc'] = "";
				}
				$data['title'] = $data['properti']['name_properti'] . " Familia Urban";
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
				$data['title_deskripsi'] = "Description";
				$data['title_fitur'] = "Feature";
				$data['title_vidio'] = "Video";
				$data['title_serupa'] = "Similar properties you may like";
				$data['title_tipe'] = "Type";
				$data['title_lihat_maps'] = "Open Google Maps";
			} else {
				$data['keyword'] = $data['properti']['meta'];
				if (!empty($this->db->query("SELECT desc_id as description FROM properti WHERE id = '$id_properti'")->row_array())) {
					$des = $this->db->query("SELECT desc_id as description FROM properti WHERE id = '$id_properti'")->row_array();
					$data['desc'] = $des['description'];
				} else {
					$data['desc'] = "";
				}
				$data['title'] = $data['properti']['name_properti'] . " Familia Urban";
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
				$data['title_deskripsi'] = "Deskripsi";
				$data['title_fitur'] = "Fitur";
				$data['title_vidio'] = "Vidio";
				$data['title_serupa'] = "Properti serupa yang mungkin anda suka";
				$data['title_tipe'] = "Tipe";
				$data['title_lihat_maps'] = "Buka Google Maps";
			}


			if (get_cookie('lang_is') === 'en') {
				$data['list_kategori'] = $this->db->query('SELECT name_en as nama, slug_en as slug FROM kategori')->result_array();
			} else {
				$data['list_kategori'] = $this->db->query('SELECT name_id as nama, slug_id as slug FROM kategori')->result_array();
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

			if (get_cookie('lang_is') === 'en') {
				$data['brosur'] = $this->db->query("SELECT label_en as label, nama_file FROM attachment WHERE id_properti = '$id_properti'")->result_array();
			} else {
				$data['brosur'] = $this->db->query("SELECT label_id as label, nama_file FROM attachment WHERE id_properti = '$id_properti'")->result_array();
			}

			$data['master_plan'] = $this->db->get_where('properti', ['id' => $id_properti])->row_array();

			$data['alamat'] = $this->db->get_where('alamat')->row_array();

			$this->load->view('templates/header', $data);
			$this->load->view('v_detail_properti', $data);
			$this->load->view('templates/footer', $data);
		}
	}
}
