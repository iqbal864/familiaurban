<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Spesifikasi extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->library('upload');
		$this->load->model('M_properti');
		$this->load->model('M_tipe_properti');
	}

	public function index()
	{
		$data_tipe_properti = $this->db->get_where('tipe_properti', ['id' => $this->uri->segment(6)])->row_array();
		if ($data_tipe_properti == 0) {
			$cek_properti = $this->db->get_where('properti', ['slug_id' => $this->uri->segment(4)])->row_array();
			if ($cek_properti == 0) {
				redirect(base_url('admins/item_properti'));
			} else {
				redirect(base_url('admins/item_properti/tipe_properti/' . $this->uri->segment(4) . ''));
			}
		} else if (empty($this->uri->segment(6))) {
			$cek_properti = $this->db->get_where('properti', ['slug_id' => $this->uri->segment(4)])->row_array();
			if ($cek_properti == 0) {
				redirect(base_url('admins/item_properti'));
			} else {
				redirect(base_url('admins/item_properti/tipe_properti/' . $this->uri->segment(4) . ''));
			}
		} else {

			$data['tipe_properti'] = $data_tipe_properti;

			$data_properti = $this->db->get_where('properti', ['id' => $data_tipe_properti['id_properti']])->row_array();
			$data['properti'] = $data_properti;

			$data['spesifikasi'] = $this->db->get_where('spesifikasi_tipe_properti', ['id_tipe_properti' => $data_tipe_properti['id']])->result_array();
			$data['spesifikasi_tambahan'] = $this->db->get_where('spesifikasi_tipe_properti_tambahan', ['id_tipe_properti' => $data_tipe_properti['id']])->result_array();

			$data['ukuran'] = $this->db->get_where('ukuran_tipe_properti', ['id_tipe_properti' => $data_tipe_properti['id']])->row_array();

			$data['title'] = "Item Properti";
			$data['title2'] = "Tipe Properti " . $data_properti['name_id'];
			$data['title3'] = "Spesifikasi " . $data_tipe_properti['name_id'];

			$this->load->view('templates/header_admin', $data);
			$this->load->view('admin/item_properti/tipe_properti/v_spesifikasi', $data);
			$this->load->view('templates/footer_admin');
		}
	}

	public function spesifikasi()
	{
		if ($this->input->is_ajax_request()) {
			$id = $this->input->post('inputId');
			$kluster = $this->input->post('inputKluster');

			$ukuran = $this->input->post('inputUkuran', true);
			$luasTanah = $this->input->post('inputLuasTanah', true);
			$luasBangunan = $this->input->post('inputLuasBangunan', true);

			$spekHeading1 = $this->input->post('inputSpek1', true);

			$spekData1 = $this->input->post('inputSpek2', true);

			$spekHeading2 = $this->input->post('inputSpek3', true);

			$spekData2 = $this->input->post('inputSpek4', true);

			$arr_spek = array();
			foreach ($spekHeading1 as $key => $head) {
				if (($head != '' || $spekData1[$key] != '') and ($spekHeading2[$key] != '' || $spekData2[$key] != '')) {
					if ($head != '' and $spekHeading2[$key] != '') {
						$arr_spek[] = array(
							'heading_id' => $head,
							'data_id' => $spekData1[$key],
							'heading_en' => $spekHeading2[$key],
							'data_en' => $spekData2[$key],
							'id_tipe_properti' => $id
						);
					};
				}
			}

			$queryCekSpesifikasi = $this->db->get_where('spesifikasi_tipe_properti', ['id_tipe_properti' => $id])->row_array();
			if ($queryCekSpesifikasi) {
				$this->M_tipe_properti->hapus_spesifikasi($id);
			}

			$this->M_tipe_properti->tambah_spesifikasi($arr_spek);

			$tamHeading1 = $this->input->post('inputTambahan1', true);

			$tamData1 = $this->input->post('inputTambahan2', true);

			$tamHeading2 = $this->input->post('inputTambahan3', true);

			$tamData2 = $this->input->post('inputTambahan4', true);

			$arr_tam = array();
			foreach ($tamHeading1 as $key => $head) {
				if (($head != '' || $tamData1[$key] != '') and ($tamHeading2[$key] != '' || $tamData2[$key] != '')) {
					if ($head != '' and $spekHeading2[$key] != '') {
						$arr_tam[] = array(
							'heading_id' => $head,
							'data_id' => $tamData1[$key],
							'heading_en' => $tamHeading2[$key],
							'data_en' => $tamData2[$key],
							'id_tipe_properti' => $id
						);
					}
				}
			}

			$queryCekSpesifikasi_tambahan = $this->db->get_where('spesifikasi_tipe_properti_tambahan', ['id_tipe_properti' => $id])->row_array();
			if ($queryCekSpesifikasi_tambahan) {
				$this->M_tipe_properti->hapus_spesifikasi_tambahan($id);
			}

			$this->M_tipe_properti->tambah_spesifikasi_tambahan($arr_tam);


			$queryCekUkuran = $this->db->get_where('ukuran_tipe_properti', ['id_tipe_properti' => $id])->row_array();
			if ($queryCekUkuran) {
				$data = array(
					'ukuran' => $ukuran,
					'luas_tanah' => $luasTanah,
					'luas_bangunan' => $luasBangunan
				);
				$this->M_tipe_properti->edit_ukuran($id, $data);
			} else {
				$this->M_tipe_properti->tambah_ukuran($ukuran, $luasTanah, $luasBangunan, $id);
			}

			$this->session->set_flashdata('berhasil_tambah', 'Sukses menambahkan spesifikasi');

			$msg = array('berhasil' => "admins/item_properti/tipe_properti/" . $kluster . "");
			echo json_encode($msg);
		} else {
			$this->load->view('errors/forbidden');
		}
	}
}
