<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sosial_media extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_login();
		cek_login_user();
		$this->load->model('M_sosial_media');
		$this->load->library('upload');
	}

	public function index()
	{


		$data['sosial_media'] = $this->db->get('sosial_media')->result_array();

		$data['title'] = "Sosial Media";
		$this->load->view('templates/header_admin', $data);
		$this->load->view('admin/sosial_media/v_sosial_media', $data);
		$this->load->view('templates/footer_admin');
	}

	private function _validation()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['valid'] = array();
		$data['status'] = true;


		if ($this->input->post('inputUrl[0]') == '') {
			$data['inputerror'][] = "inputUrl_pertama";
			$data['error_string'][] = "Url pertama tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}


		if ($this->input->post('inputUrl[0]') != '') {
			$data['inputerror'][] = "inputUrl_pertama";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}

		if ($data['status'] == false) {
			echo json_encode($data);
			exit();
		}
	}

	public function sosial_media()
	{
		if ($this->input->is_ajax_request()) {
			$this->_validation();

			$url = $this->input->post('inputUrl', true);

			$icon = $this->input->post('icon_picker', true);

			$arr_sosmed = array();
			foreach ($url as $key => $u) {
				if ($u != '' and $icon[$key] != '') {
					$arr_sosmed[] = array(
						'url' => $u,
						'icon' => $icon[$key],
					);
				};
			}


			$queryCekSosmed = $this->db->get('sosial_media')->row_array();
			if ($queryCekSosmed) {
				$this->M_sosial_media->hapus_sosmed();
			}

			if (sizeof($arr_sosmed) != 0) {
				$this->M_sosial_media->tambah_sosmed($arr_sosmed);
			}

			$this->session->set_flashdata('berhasil_tambah', 'Berhasil Simpan!');

			$msg = array('berhasil' => "admins/sosial_media");
			echo json_encode($msg);
		} else {
			$this->load->view('errors/forbidden');
		}
	}
}
