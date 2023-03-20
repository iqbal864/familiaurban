<?php
defined('BASEPATH') or exit('No direct script access allowed');

class File extends CI_Controller
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
		if (empty($this->uri->segment(4))) {
			redirect(base_url('admins/item_properti'));
		} else {

			$data_properti = $this->db->get_where('properti', ['slug_id' => $this->uri->segment(4)])->row_array();
			$data['properti'] = $data_properti;

			$data['file'] = $this->db->get_where('attachment', ['id_properti' => $data_properti['id']])->result_array();


			$data['title'] = "Item Properti";
			$data['title2'] = "File " . $data_properti['name_id'];

			$this->load->view('templates/header_admin', $data);
			$this->load->view('admin/item_properti/v_file_properti', $data);
			$this->load->view('templates/footer_admin');
		}
	}

	public function file()
	{
		if ($this->input->is_ajax_request()) {

			$getId =  $this->db->get_where('properti', ['slug_id' => $this->input->post('inputName')])->row_array();
			$id = $getId['id'];
			$name = $this->input->post('inputName');

			$path = $this->input->post('inputPath', true);
			$id_file = $this->input->post('inputIdFile', true);

			$label1 = $this->input->post('inputLabel', true);
			$label2 = $this->input->post('inputLabel2', true);

			$arr_file = array();
			$count = count($_FILES['inputFile']['name']);

			$files = array_filter($_FILES);
			for ($i = 0; $i < $count; $i++) {

				$_FILES['inputFile']['name'] =  $files['inputFile']['name'][$i];
				$_FILES['inputFile']['type']    = $files['inputFile']['type'][$i];
				$_FILES['inputFile']['tmp_name'] = $files['inputFile']['tmp_name'][$i];
				$_FILES['inputFile']['error']      = $files['inputFile']['error'][$i];
				$_FILES['inputFile']['size']    = $files['inputFile']['size'][$i];

				$config['upload_path']     = FCPATH . './uploads/file/properti';
				$config['allowed_types']   = 'pdf|txt|doc|docx';
				$config['file_name'] = $name . '-' . $_FILES['inputFile']['name'];

				$this->upload->initialize($config);

				if ($_FILES['inputFile']['name'] != '') {
					if (strpos($_FILES['inputFile']['name'], ".php") !== false) {
						$name_file = '';
					} else if (strpos($_FILES['inputFile']['name'], ".js") !== false) {
						$name_file = '';
					} else if (strpos($_FILES['inputFile']['name'], ".py") !== false) {
						$name_file = '';
					} else {

						$data_file = $this->db->get_where('attachment', ['id_properti' => $id])->row_array();

						if (!empty($data_file['nama_file']) != '') {
							if (!empty($path[$i])) {
								$file_before = FCPATH . './uploads/file/properti/' . $path[$i];
								if (file_exists($file_before)) {
									unlink($file_before);
								}
							}
						}

						if ($this->upload->do_upload('inputFile')) {
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
						$getFileNotIn = $this->db->query("SELECT nama_file FROM attachment WHERE id_properti = '$id' AND nama_file NOT IN('$im_path')")->result_array();
						if ($getFileNotIn) {
							foreach ($getFileNotIn as $gg) {
								if (!empty($gg['nama_file'])) {
									$file_before = FCPATH . './uploads/file/properti/' . $gg['nama_file'];
									if (file_exists($file_before)) {
										unlink($file_before);
									}
								}
							}
						}

						$data = $path[$i];
					} else {
						if (!empty($id_file[$i])) {
							$data_file = $this->db->get_where('attachment', ['id' => $id_file[$i]])->row_array();
							if ($data_file) {
								$file_before = FCPATH . './uploads/file/properti/' . $data_file['nama_file'];
								if (file_exists($file_before)) {
									unlink($file_before);
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
					$arr_file[] = array(
						'nama_file' => $name_file,
						'label_id' => $label1[$index],
						'label_en' => $label2[$index],
						'id_properti' => $id
					);
				}
			}


			// var_dump($arr_file);
			$queryCekData = $this->db->get_where('attachment', ['id_properti' => $id])->row_array();
			if ($queryCekData) {
				if (sizeof($arr_file) == 0) {
					$getFileNotIn = $this->db->query("SELECT nama_file FROM attachment WHERE id_properti = '$id'")->result_array();
					if ($getFileNotIn) {
						foreach ($getFileNotIn as $gg) {
							if (!empty($gg['nama_file'])) {
								$file_before = FCPATH . './uploads/file/properti/' . $gg['nama_file'];
								if (file_exists($file_before)) {
									unlink($file_before);
								}
							}
						}
					}
				}
				$this->M_properti->hapus_file_properti($id);
			}

			// var_dump($arr_file);

			if (sizeof($arr_file) != 0) {
				$this->M_properti->tambah_file_properti($arr_file);
			}

			$this->session->set_flashdata('berhasil_tambah', 'Berhasil simpan');

			$msg = array('berhasil' => "admins/item_properti");
			echo json_encode($msg);
		} else {
			$this->load->view('errors/forbidden');
		}
	}
}
