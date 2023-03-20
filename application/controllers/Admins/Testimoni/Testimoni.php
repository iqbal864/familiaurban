<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Testimoni extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_login();
		cek_login_user();
		$this->load->model('M_testimoni');
	}

	public function index()
	{


		$data['testimoni'] = $this->db->get('testimoni')->result_array();

		$data['title'] = "Testimoni";
		$this->load->view('templates/header_admin', $data);
		$this->load->view('admin/testimoni/v_testimoni', $data);
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

	public function testimoni()
	{
		if ($this->input->is_ajax_request()) {
			$this->_validation();

			$url = $this->input->post('inputUrl', true);

			$arr_testi = array();
			foreach ($url as $key => $u) {
				if ($u != '') {
					$arr_testi[] = array(
						'url' => $u,
					);
				};
			}


			$queryCekTesti = $this->db->get('testimoni')->row_array();
			if ($queryCekTesti) {
				$this->M_testimoni->hapus_testi();
			}

			if (sizeof($arr_testi) != 0) {
				$this->M_testimoni->tambah_testi($arr_testi);
			}

			$this->session->set_flashdata('berhasil_tambah', 'Berhasil Simpan!');

			$msg = array('berhasil' => "admins/testimoni");
			echo json_encode($msg);
		} else {
			$this->load->view('errors/forbidden');
		}
	}
}
