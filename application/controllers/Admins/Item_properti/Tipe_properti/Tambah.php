<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tambah extends CI_Controller
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
		$data_properti = $this->db->get_where('properti', ['slug_id' => $this->uri->segment(4)])->row_array();
		$data['properti'] = $data_properti;

		$data['title'] = "Item Properti";
		$data['title2'] = "Tipe Properti " . $data_properti['name_id'];
		$data['title3'] = "Tambah Tipe";

		$this->load->view('templates/header_admin', $data);
		$this->load->view('admin/item_properti/tipe_properti/v_tambah_tipe_properti', $data);
		$this->load->view('templates/footer_admin');
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

	public function tambah()
	{
		if ($this->input->is_ajax_request()) {
			$this->_validation();

			$kluster = $this->input->post('inputKluster');
			$getIdProperti = $this->db->get_where('properti', ['slug_id' => $kluster])->row_array();

			// $spekHeading = $this->input->post('inputSpek1', true);

			// $spekData = $this->input->post('inputSpek2', true);

			// $arr_head = array();
			// foreach ($spekHeading as $key => $head) {
			//     if ($head != '' || $spekData[$key] != '') {
			//         $arr_head[] = array(
			//             'heading' => $head,s
			//             'data' => $spekData[$key]
			//         );
			//     }
			// }

			// var_dump($arr_head);

			// die;
			// $id = random_string('alnum', 6);
			$name = $this->input->post('inputName', true);
			$name2 = $this->input->post('inputName2', true);
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

					// $file_before = FCPATH . './uploads/images/kategori/' . $name;
					// if (file_exists($file_before)) {
					//     unlink($file_before);
					// }


					if ($this->upload->do_upload('denah')) {
						$name_file = $this->upload->data('file_name');
					} else {
						$name_file = '';
					}
				}
				$name_file = $name_file;
			} else {
				$name_file = '';
			}

			$this->M_tipe_properti->tambah_tipe_properti($name, $name2, $desc, $desc2, $name_file, $getIdProperti['id']);

			$this->session->set_flashdata('berhasil_tambah', 'Sukses menambahkan tipe properti');

			$msg = array('berhasil' => "admins/item_properti/tipe_properti/" . $kluster);
			echo json_encode($msg);
		} else {
			$this->load->view('errors/forbidden');
		}
	}
}
