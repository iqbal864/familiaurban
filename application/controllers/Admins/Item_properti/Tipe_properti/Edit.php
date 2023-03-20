<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit extends CI_Controller
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

			$data['title'] = "Item Properti";
			$data['title2'] = "Tipe Properti " . $data_properti['name_id'];
			$data['title3'] = "Edit Tipe " . $data_tipe_properti['name_id'];

			$this->load->view('templates/header_admin', $data);
			$this->load->view('admin/item_properti/tipe_properti/v_edit_tipe_properti', $data);
			$this->load->view('templates/footer_admin');
		}
	}

	private function _validation()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['valid'] = array();
		$data['status'] = true;

		if ($this->input->post('inputName') == '') {
			$data['inputerror'][] = "inputName";
			$data['error_string'][] = "Nama Tipe tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}
		if ($this->input->post('inputName2') == '') {
			$data['inputerror'][] = "inputName2";
			$data['error_string'][] = "Nama Tipe tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}

		if ($this->input->post('inputName') != '') {
			$data['inputerror'][] = "inputName";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}
		if ($this->input->post('inputName2') != '') {
			$data['inputerror'][] = "inputName2";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}

		if ($data['status'] == false) {
			echo json_encode($data);
			exit();
		}
	}

	public function edit()
	{
		if ($this->input->is_ajax_request()) {

			$id = $this->input->post('inputId');
			$kluster = $this->input->post('inputKluster');
			$data_tipe_properti = $this->db->get_where('tipe_properti', ['id' => $id])->row_array();

			$this->_validation();

			$name = $this->input->post('inputName', true);
			$name2 = $this->input->post('inputName2', true);
			$path = $this->input->post('inputPath', true);
			$desc = $this->input->post('inputDesc');
			$desc2 = $this->input->post('inputDesc2');

			if (!empty($_FILES['denah']['name'])) {
				$config['upload_path']     = FCPATH . './uploads/images/properti/tipe';
				$config['allowed_types']   = 'gif|jpg|png|jpeg';
				$config['max_size'] = 1024 * 50;
				$config['file_name'] = $kluster . '-' . $name;


				// $this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (strpos($_FILES['denah']['name'], ".php") !== false) {
					$name_file = '';
				} else if (strpos($_FILES['denah']['name'], ".js") !== false) {
					$name_file = '';
				} else if (strpos($_FILES['denah']['name'], ".py") !== false) {
					$name_file = '';
				} else {

					if ($data_tipe_properti['denah'] != '') {
						$file_before = FCPATH . './uploads/images/properti/tipe/' . $data_tipe_properti['denah'];
						if (file_exists($file_before)) {
							unlink($file_before);
						}
					}

					if ($this->upload->do_upload('denah')) {
						$name_file = $this->upload->data('file_name');
					} else {
						$nama_file = '';
					}
				}
				$name_file = $name_file;
			} else {
				if ($path != '') {
					$nama_file = $path;
				} else {
					$cekTipeProperti = $this->db->get_where('tipe_properti', ['id' => $id])->row_array();
					if ($cekTipeProperti) {
						if ($cekTipeProperti['denah'] != '') {
							$file_before = FCPATH . './uploads/images/properti/tipe/' . $cekTipeProperti['denah'];
							if (file_exists($file_before)) {
								unlink($file_before);
							}
						}
					}

					$nama_file = '';
				}
				$name_file = $nama_file;
			}

			$data = array(
				'name_id' => $name,
				'name_en' => $name2,
				'desc_id' => $desc,
				'desc_en' => $desc2,
				'denah' => $name_file,
			);

			$this->M_tipe_properti->edit_tipe_properti($id, $data);

			$this->session->set_flashdata('berhasil_tambah', 'Sukses edit properti');

			$msg = array('berhasil' => "admins/item_properti/tipe_properti/" . $kluster);
			echo json_encode($msg);
		} else {
			$this->load->view('errors/forbidden');
		}
	}
}
