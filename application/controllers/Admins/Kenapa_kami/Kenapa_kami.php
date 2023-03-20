<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kenapa_kami extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_login();
		cek_login_user();
		$this->load->model('M_kenapa_kami');
		$this->load->library('upload');
	}

	public function index()
	{
		$data['kenapa_kami'] = $this->db->get('kenapa_kami')->result_array();
		$data['gambar'] = $this->db->get('gambar_kenapa_kami')->result_array();

		$data['title'] = "Kenapa Kami";
		$this->load->view('templates/header_admin', $data);
		$this->load->view('admin/kenapa_kami/v_kenapa_kami', $data);
		$this->load->view('templates/footer_admin');
	}

	private function _validation()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['valid'] = array();
		$data['status'] = true;


		if ($this->input->post('inputData[0]') == '') {
			$data['inputerror'][] = "inputData_pertama";
			$data['error_string'][] = "Data list pertama tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}

		if ($this->input->post('inputData2[0]') == '') {
			$data['inputerror'][] = "inputData2_pertama";
			$data['error_string'][] = "Data list pertama tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}

		if ($this->input->post('inputData[0]') != '') {
			$data['inputerror'][] = "inputData_pertama";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}
		if ($this->input->post('inputData2[0]') != '') {
			$data['inputerror'][] = "inputData2_pertama";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}

		if ($data['status'] == false) {
			echo json_encode($data);
			exit();
		}
	}

	public function kenapa_kami()
	{
		if ($this->input->is_ajax_request()) {

			$this->_validation();
			$path = $this->input->post('inputPath', true);
			$id_gambar = $this->input->post('inputIdGambar', true);

			$data_id = $this->input->post('inputData', true);
			$data_en = $this->input->post('inputData2', true);

			$arr_data = array();
			foreach ($data_id as $key => $data) {
				if (($data != '') and ($data_en[$key] != '')) {
					$arr_data[] = array(
						'data_list_id' => $data,
						'data_list_en' => $data_en[$key]
					);
				}
			}

			$arr_gambar = array();
			$count = count($_FILES['image_kenapa_kami']['name']);

			$files = array_filter($_FILES);
			for ($i = 0; $i < $count; $i++) {

				$_FILES['image_kenapa_kami']['name'] =  $files['image_kenapa_kami']['name'][$i];
				$_FILES['image_kenapa_kami']['type']    = $files['image_kenapa_kami']['type'][$i];
				$_FILES['image_kenapa_kami']['tmp_name'] = $files['image_kenapa_kami']['tmp_name'][$i];
				$_FILES['image_kenapa_kami']['error']      = $files['image_kenapa_kami']['error'][$i];
				$_FILES['image_kenapa_kami']['size']    = $files['image_kenapa_kami']['size'][$i];

				$config['upload_path']     = FCPATH . './uploads/images/kenapa_kami';
				$config['allowed_types']   = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;

				$this->upload->initialize($config);

				if ($_FILES['image_kenapa_kami']['name'] != '') {
					if (strpos($_FILES['image_kenapa_kami']['name'], ".php") !== false) {
						$name_file = '';
					} else if (strpos($_FILES['image_kenapa_kami']['name'], ".js") !== false) {
						$name_file = '';
					} else if (strpos($_FILES['image_kenapa_kami']['name'], ".py") !== false) {
						$name_file = '';
					} else {

						if (!empty($path[$i])) {
							$file_before = FCPATH . './uploads/images/kenapa_kami/' . $path[$i];
							if (file_exists($file_before)) {
								unlink($file_before);
							}
						}

						if ($this->upload->do_upload('image_kenapa_kami')) {
							$data = $this->upload->data();
							$name_file = $data['file_name'];
						} else {
							$name_file = '';
						}
					}

					$name_file = $name_file;
				} else {
					if (!empty($path[$i])) {
						$im_path = implode("','", $path);
						$getGambarNotIn = $this->db->query("SELECT nama_file FROM gambar_kenapa_kami WHERE nama_file NOT IN('$im_path')")->result_array();
						if ($getGambarNotIn) {
							foreach ($getGambarNotIn as $gg) {
								if (!empty($gg['nama_file'])) {
									$file_before = FCPATH . './uploads/images/kenapa_kami/' . $gg['nama_file'];
									if (file_exists($file_before)) {
										unlink($file_before);
									}
								}
							}
						}

						$data = $path[$i];
					} else {
						if (!empty($id_gambar[$i])) {
							$im_id = implode("','", $id_gambar);

							$data_gambar = $this->db->get_where('gambar_kenapa_kami', ['id' => $id_gambar[$i]])->row_array();
							if ($data_gambar) {
								if ($data_gambar['nama_file'] != "") {
									$file_before = FCPATH . './uploads/images/kenapa_kami/' . $data_gambar['nama_file'];
									if (file_exists($file_before)) {
										unlink($file_before);
									}
								} else {
									$getGambarNotIn = $this->db->query("SELECT nama_file FROM gambar_kenapa_kami WHERE id NOT IN('$im_id')")->result_array();
									if ($getGambarNotIn) {
										foreach ($getGambarNotIn as $gg) {
											if (!empty($gg['nama_file'])) {
												$file_before = FCPATH . './uploads/images/kenapa_kami/' . $gg['nama_file'];
												if (file_exists($file_before)) {
													unlink($file_before);
												}
											}
										}
									}
								}
							}
						}

						$data = "";
					}
					$name_file = $data;
				}

				// $this->load->library('upload', $config);
				$index = $i;
				if ($name_file != "") {
					$arr_gambar[] = array(
						'nama_file' => $name_file,
					);
				}
			}

			if ($id_gambar) {
				$im_id_gambar = implode("','", $id_gambar);
				$queryCekData = $this->db->query("SELECT * FROM gambar_kenapa_kami WHERE id IN('$im_id_gambar')")->row_array();
				if ($queryCekData) {
					if (sizeof($arr_gambar) == 0) {
						$getGambarNotIn = $this->db->query("SELECT nama_file FROM gambar_kenapa_kami")->result_array();
						if ($getGambarNotIn) {
							foreach ($getGambarNotIn as $gg) {
								if (!empty($gg['nama_file'])) {
									$file_before = FCPATH . './uploads/images/kenapa_kami/' . $gg['nama_file'];
									if (file_exists($file_before)) {
										unlink($file_before);
									}
								}
							}
						}
					}
					$this->M_kenapa_kami->hapus_gambar_kenapa_kami();
				}
			}

			$queryCekData = $this->db->get('kenapa_kami')->row_array();
			if ($queryCekData) {
				$this->M_kenapa_kami->hapus_kenapa_kami();
			}

			// var_dump($arr_gambar);

			if (sizeof($arr_data) != 0) {
				$this->M_kenapa_kami->tambah_kenapa_kami($arr_data);
			}


			if (sizeof($arr_gambar) != 0) {
				$this->M_kenapa_kami->tambah_gambar_kenapa_kami($arr_gambar);
			}

			$this->session->set_flashdata('berhasil_tambah', 'Berhasil simpan');

			$msg = array('berhasil' => "admins/kenapa_kami");
			echo json_encode($msg);
		} else {
			$this->load->view('errors/forbidden');
		}
	}
}
