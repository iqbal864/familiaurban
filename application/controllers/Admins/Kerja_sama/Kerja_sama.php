<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kerja_sama extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_login();
		cek_login_user();
		$this->load->model('M_kerja_sama');
		$this->load->library('upload');
	}

	public function index()
	{
		$data['kerja_sama'] = $this->db->get('kerja_sama_bank')->result_array();

		$data['title'] = "Kerja Sama Bank";
		$this->load->view('templates/header_admin', $data);
		$this->load->view('admin/kerja_sama/v_kerja_sama', $data);
		$this->load->view('templates/footer_admin');
	}

	public function kerja_sama()
	{
		if ($this->input->is_ajax_request()) {


			$path = $this->input->post('inputPath', true);
			$id_gambar = $this->input->post('inputIdGambar', true);


			$arr_gambar = array();
			$count = count($_FILES['inputBank']['name']);

			// var_dump($_FILES['inputMobile']);
			// die;

			$files = array_filter($_FILES);
			for ($i = 0; $i < $count; $i++) {

				$_FILES['inputBank']['name'] =  $files['inputBank']['name'][$i];
				$_FILES['inputBank']['type']    = $files['inputBank']['type'][$i];
				$_FILES['inputBank']['tmp_name'] = $files['inputBank']['tmp_name'][$i];
				$_FILES['inputBank']['error']      = $files['inputBank']['error'][$i];
				$_FILES['inputBank']['size']    = $files['inputBank']['size'][$i];

				$config['upload_path']     = FCPATH . './uploads/images/kerja_sama';
				$config['allowed_types']   = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;

				$this->upload->initialize($config);

				if ($_FILES['inputBank']['name'] != '') {
					if (strpos($_FILES['inputBank']['name'], ".php") !== false) {
						$name_file = '';
					} else if (strpos($_FILES['inputBank']['name'], ".js") !== false) {
						$name_file = '';
					} else if (strpos($_FILES['inputBank']['name'], ".py") !== false) {
						$name_file = '';
					} else {

						if (!empty($path[$i])) {
							$file_before = FCPATH . './uploads/images/kerja_sama/' . $path[$i];
							if (file_exists($file_before)) {
								unlink($file_before);
							}
						}

						if ($this->upload->do_upload('inputBank')) {
							$data = $this->upload->data();
							$config['image_library'] = 'gd2';
							$config['source_image'] = FCPATH . './uploads/images/kerja_sama/' . $data['file_name'];
							$config['create_thumb'] = FALSE;
							$config['maintain_ratio'] = FALSE;
							$config['quality'] = '100%';
							// $config['width'] = 1280;
							// $config['height'] = 720;
							$config['new_image'] = FCPATH . './uploads/images/kerja_sama/' . $data['file_name'];
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();
							$name_file = $data['file_name'];
						} else {
							$name_file = '';
						}
					}

					$name_file = $name_file;
				} else {
					if (!empty($path[$i])) {
						$im_path = implode("','", $path);
						$getGambarNotIn = $this->db->query("SELECT nama_file FROM kerja_sama_bank WHERE nama_file NOT IN('$im_path')")->result_array();
						if ($getGambarNotIn) {
							foreach ($getGambarNotIn as $gg) {
								if (!empty($gg['nama_file'])) {
									$file_before = FCPATH . './uploads/images/kerja_sama/' . $gg['nama_file'];
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
							$data_gambar = $this->db->get_where('kerja_sama_bank', ['id' => $id_gambar[$i]])->row_array();
							if ($data_gambar) {
								if ($data_gambar['nama_file'] != "") {
									$file_before = FCPATH . './uploads/images/kerja_sama/' . $data_gambar['nama_file'];
									if (file_exists($file_before)) {
										unlink($file_before);
									}
								} else {
									$getGambarNotIn = $this->db->query("SELECT nama_file FROM kerja_sama_bank WHERE id NOT IN('$im_id')")->result_array();
									if ($getGambarNotIn) {
										foreach ($getGambarNotIn as $gg) {
											if (!empty($gg['nama_file'])) {
												$file_before = FCPATH . './uploads/images/kerja_sama/' . $gg['nama_file'];
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
				$index = $i;
				if ($name_file != "") {
					$arr_gambar[] = array(
						'nama_file' => $name_file,
					);
				}
			}



			if ($id_gambar) {
				$im_id_gambar = implode("','", $id_gambar);
				$queryCekData = $this->db->query("SELECT * FROM kerja_sama_bank WHERE id IN('$im_id_gambar')")->row_array();
				if ($queryCekData) {
					if (sizeof($arr_gambar) == 0) {
						$getGambarNotIn = $this->db->query("SELECT * FROM kerja_sama_bank")->result_array();
						if ($getGambarNotIn) {
							foreach ($getGambarNotIn as $gg) {
								if (!empty($gg['nama_file'])) {
									$file_before = FCPATH . './uploads/images/kerja_sama/' . $gg['nama_file'];
									if (file_exists($file_before)) {
										unlink($file_before);
									}
								}
							}
						}
					}
					$this->M_kerja_sama->hapus_gambar_bank();
				}
			}


			if (sizeof($arr_gambar) != 0) {
				$this->M_kerja_sama->tambah_gambar_bank($arr_gambar);
			}

			$this->session->set_flashdata('berhasil_tambah', 'Berhasil simpan');

			$msg = array('berhasil' => "admins/kerja_sama");
			echo json_encode($msg);
		} else {
			$this->load->view('errors/forbidden');
		}
	}
}
