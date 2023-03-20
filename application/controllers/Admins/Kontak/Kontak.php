<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_login();
		cek_login_user();
		$this->load->model('M_kontak');
		$this->load->library('upload');
	}

	public function index()
	{
		$data['kontak'] = $this->db->get('kontak')->row_array();

		$data['subjek_email'] = $this->db->get_where('subjek_email')->result_array();

		$data['title'] = "Kontak";
		$this->load->view('templates/header_admin', $data);
		$this->load->view('admin/kontak/v_kontak', $data);
		$this->load->view('templates/footer_admin');
	}

	private function _validation()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['valid'] = array();
		$data['status'] = true;

		if ($this->input->post('inputTelp') == '') {
			$data['inputerror'][] = "inputTelp";
			$data['error_string'][] = "No. Telepon tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}
		if ($this->input->post('inputWa') == '') {
			$data['inputerror'][] = "inputWa";
			$data['error_string'][] = "No. Whatsapp tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}
		if ($this->input->post('inputEmail') == '') {
			$data['inputerror'][] = "inputEmail";
			$data['error_string'][] = "Email tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}
		if ($this->input->post('inputSubjek_id[0]') == '') {
			$data['inputerror'][] = "inputSubjek_id";
			$data['error_string'][] = "Subjek pertama tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}
		if ($this->input->post('inputSubjek_en[0]') == '') {
			$data['inputerror'][] = "inputSubjek_en";
			$data['error_string'][] = "Subjek pertama tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}

		if ($this->input->post('inputSubjek_id[0]') != '') {
			$data['inputerror'][] = "inputSubjek_id";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}
		if ($this->input->post('inputSubjek_en[0]') != '') {
			$data['inputerror'][] = "inputSubjek_en";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}
		if ($this->input->post('inputTelp') != '') {
			$data['inputerror'][] = "inputTelp";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}
		if ($this->input->post('inputWa') != '') {
			$data['inputerror'][] = "inputWa";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}
		if ($this->input->post('inputEmail') != '') {
			$data['inputerror'][] = "inputEmail";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}

		if ($data['status'] == false) {
			echo json_encode($data);
			exit();
		}
	}

	public function kontak()
	{
		if ($this->input->is_ajax_request()) {
			$this->_validation();

			$telp = $this->input->post('inputTelp');
			$email = $this->input->post('inputEmail');
			$wa = $this->input->post('inputWa');

			$id = $this->input->post('id_subjek', true);
			$subjek_id = $this->input->post('inputSubjek_id', true);
			$subjek_en = $this->input->post('inputSubjek_en', true);
			$cc = $this->input->post('tags', true);


			$arr_subjek = array();
			foreach ($subjek_id as $key => $sub) {
				$json_cc = json_decode($cc[$key], true);

				$arr_cc = array();
				foreach ($json_cc as $c) {
					$arr_cc[] = $c['value'];
				}

				if (($sub != '') and ($subjek_en[$key] != '')) {
					if ($sub != '' and $subjek_en[$key] != '') {
						$cekSubjek = $this->db->get('subjek_email')->row_array();
						if ($cekSubjek) {
							$arr_subjek[] = array(
								'id' => $id[$key],
								'subjek_id' => $sub,
								'subjek_en' => $subjek_en[$key],
								'cc' => implode(",", $arr_cc),
							);
						} else {
							$arr_subjek[] = array(
								'subjek_id' => $sub,
								'subjek_en' => $subjek_en[$key],
								'cc' => implode(",", $arr_cc),
							);
						}
					}
				};
			}

			$this->M_kontak->hapus_subjek();
			$this->M_kontak->subjek($arr_subjek);

			$cekKontak = $this->db->get('kontak')->row_array();
			if ($cekKontak) {
				$arr_kontak[] = array(
					'telp' => $telp,
					'no_wa' => $wa,
					'email' => $email
				);

				$this->M_kontak->hapus_kontak();
				$this->M_kontak->update_kontak($arr_kontak);
			} else {
				$this->M_kontak->kontak($telp, $wa, $email);
			}

			$this->session->set_flashdata('berhasil_tambah', 'Berhasil simpan');

			$msg = array('berhasil' => "admins/kontak");
			echo json_encode($msg);
		} else {
			$this->load->view('errors/forbidden');
		}
	}
}
