<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fasilitas extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_login();
		cek_login_user();
		$this->load->model('M_fasilitas');
		$this->load->library('upload');
	}

	public function index()
	{
		$data['fasilitas'] = $this->db->get('fasilitas')->result_array();

		$data['title'] = "Fasilitas";
		$this->load->view('templates/header_admin', $data);
		$this->load->view('admin/fasilitas/v_fasilitas', $data);
		$this->load->view('templates/footer_admin');
	}

	private function _validation()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['valid'] = array();
		$data['status'] = true;


		if ($this->input->post('inputHeading_id[0]') == '') {
			$data['inputerror'][] = "inputHeading_id_pertama";
			$data['error_string'][] = "Data pertama tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}

		if ($this->input->post('inputData_id[0]') == '') {
			$data['inputerror'][] = "inputData_id_pertama";
			$data['error_string'][] = "Data pertama tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}

		if ($this->input->post('inputHeading_en[0]') == '') {
			$data['inputerror'][] = "inputHeading_en_pertama";
			$data['error_string'][] = "Data pertama tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}

		if ($this->input->post('inputData_en[0]') == '') {
			$data['inputerror'][] = "inputData_en_pertama";
			$data['error_string'][] = "Data pertama tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}

		if ($this->input->post('inputHeading_id[0]') != '') {
			$data['inputerror'][] = "inputHeading_id_pertama";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}
		if ($this->input->post('inputData_id[0]') != '') {
			$data['inputerror'][] = "inputData_id_pertama";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}
		if ($this->input->post('inputHeading_en[0]') != '') {
			$data['inputerror'][] = "inputHeading_en_pertama";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}
		if ($this->input->post('inputData_en[0]') != '') {
			$data['inputerror'][] = "inputData_en_pertama";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}

		if ($data['status'] == false) {
			echo json_encode($data);
			exit();
		}
	}

	public function fasilitas()
	{
		if ($this->input->is_ajax_request()) {
			$this->_validation();

			$heading_id = $this->input->post('inputHeading_id', true);

			$data_id = $this->input->post('inputData_id', true);

			$heading_en = $this->input->post('inputHeading_en', true);

			$data_en = $this->input->post('inputData_en', true);

			$icon = $this->input->post('icon_picker', true);

			$arr_fasilitas = array();
			foreach ($heading_id as $key => $head) {
				if (($head != '' || $data_id[$key] != '') and ($heading_en[$key] != '' || $data_en[$key] != '')) {
					if ($head != '' and $heading_en[$key] != '') {
						$arr_fasilitas[] = array(
							'heading_id' => $head,
							'data_id' => $data_id[$key],
							'heading_en' => $heading_en[$key],
							'data_en' => $data_en[$key],
							'icon' => $icon[$key]
						);
					};
				}
			}


			$queryCekFasilitas = $this->db->get('fasilitas')->row_array();
			if ($queryCekFasilitas) {
				$this->M_fasilitas->hapus_fasilitas();
			}

			if (sizeof($arr_fasilitas) != 0) {
				$this->M_fasilitas->tambah_fasilitas($arr_fasilitas);
			}

			$this->session->set_flashdata('berhasil_tambah', 'Berhasil Simpan!');

			$msg = array('berhasil' => "admins/fasilitas");
			echo json_encode($msg);
		} else {
			$this->load->view('errors/forbidden');
		}
	}
}
