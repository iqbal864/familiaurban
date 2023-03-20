<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Alamat extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_login();
		cek_login_user();
		$this->load->model('M_alamat');
		$this->load->library('upload');
	}

	public function index()
	{

		$data['alamat'] = $this->db->get('alamat')->row_array();

		$data['title'] = "Alamat";
		$this->load->view('templates/header_admin', $data);
		$this->load->view('admin/alamat/v_alamat', $data);
		$this->load->view('templates/footer_admin');
	}

	private function _validation()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['valid'] = array();
		$data['status'] = true;

		if ($this->input->post('inputLat') == '') {
			$data['inputerror'][] = "inputLat";
			$data['error_string'][] = "Latitude tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}
		if ($this->input->post('inputLong') == '') {
			$data['inputerror'][] = "inputLong";
			$data['error_string'][] = "Longitude tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}
		if ($this->input->post('inputLink') == '') {
			$data['inputerror'][] = "inputLink";
			$data['error_string'][] = "Link google maps tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}
		if ($this->input->post('inputAlamat') == '') {
			$data['inputerror'][] = "inputAlamat";
			$data['error_string'][] = "Alamat tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}

		if ($this->input->post('inputLat') != '') {
			$data['inputerror'][] = "inputLat";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}
		if ($this->input->post('inputLong') != '') {
			$data['inputerror'][] = "inputLong";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}
		if ($this->input->post('inputLink') != '') {
			$data['inputerror'][] = "inputLink";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}
		if ($this->input->post('inputAlamat') != '') {
			$data['inputerror'][] = "inputAlamat";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}

		if ($data['status'] == false) {
			echo json_encode($data);
			exit();
		}
	}

	public function alamat()
	{
		if ($this->input->is_ajax_request()) {
			$this->_validation();

			$lat = $this->input->post('inputLat', true);
			$long = $this->input->post('inputLong', true);

			$link = $this->input->post('inputLink', true);
			$alamat = $this->input->post('inputAlamat', true);

			$cekAlamat = $this->db->get('alamat')->row_array();
			if ($cekAlamat) {
				$arr_alamat[] = array(
					'latitude' => $lat,
					'longitude' => $long,
					'link' => $link,
					'alamat' => $alamat
				);


				$this->M_alamat->hapus_alamat();
				$this->M_alamat->update_alamat($arr_alamat);
			} else {
				$this->M_alamat->alamat($this->db->escape($lat), $this->db->escape($long), $this->db->escape($link), $this->db->escape($alamat));
			}

			$this->session->set_flashdata('berhasil_tambah', 'Berhasil simpan');

			$msg = array('berhasil' => "admins/alamat");
			echo json_encode($msg);
		} else {
			$this->load->view('errors/forbidden');
		}
	}
}
