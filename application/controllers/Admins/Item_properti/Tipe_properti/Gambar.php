<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gambar extends CI_Controller
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

			$data['gambar'] = $this->db->get_where('gambar_tipe_properti', ['id_tipe_properti' => $data_tipe_properti['id']])->result_array();


			$data['title'] = "Item Properti";
			$data['title2'] = "Tipe Properti " . $data_properti['name_id'];
			$data['title3'] = "Gambar " . $data_tipe_properti['name_id'];

			$this->load->view('templates/header_admin', $data);
			$this->load->view('admin/item_properti/tipe_properti/v_gambar', $data);
			$this->load->view('templates/footer_admin');
		}
	}

	public function gambar()
	{
		if ($this->input->is_ajax_request()) {

			$id = $this->input->post('inputId');
			$kluster = $this->input->post('inputKluster');

			$path = $this->input->post('inputPath', true);
			$id_gambar = $this->input->post('inputIdGambar', true);

			$label1 = $this->input->post('inputLabel', true);
			$label2 = $this->input->post('inputLabel2', true);

			$arr_gambar = array();
			$count = count($_FILES['inputGaleri']['name']);

			$files = array_filter($_FILES);
			for ($i = 0; $i < $count; $i++) {

				$_FILES['inputGaleri']['name'] =  $files['inputGaleri']['name'][$i];
				$_FILES['inputGaleri']['type']    = $files['inputGaleri']['type'][$i];
				$_FILES['inputGaleri']['tmp_name'] = $files['inputGaleri']['tmp_name'][$i];
				$_FILES['inputGaleri']['error']      = $files['inputGaleri']['error'][$i];
				$_FILES['inputGaleri']['size']    = $files['inputGaleri']['size'][$i];

				$config['upload_path']     = FCPATH . './uploads/images/properti/tipe/galeri';
				$config['allowed_types']   = 'gif|jpg|png|jpeg';
				$config['max_size'] = 1024 * 50;
				$config['encrypt_name'] = TRUE;

				$this->upload->initialize($config);



				if ($_FILES['inputGaleri']['name'] != '') {
					if (strpos($_FILES['inputGaleri']['name'], ".php") !== false) {
						$name_file = '';
					} else if (strpos($_FILES['inputGaleri']['name'], ".js") !== false) {
						$name_file = '';
					} else if (strpos($_FILES['inputGaleri']['name'], ".py") !== false) {
						$name_file = '';
					} else {

						$data_gambar = $this->db->get_where('gambar_tipe_properti', ['id_tipe_properti' => $id])->row_array();

						if (!empty($data_gambar['nama_file']) != '') {
							if (!empty($path[$i])) {
								$file_before = FCPATH . './uploads/images/properti/tipe/galeri/' . $path[$i];
								if (file_exists($file_before)) {
									unlink($file_before);
								}
							}
						}

						if ($this->upload->do_upload('inputGaleri')) {
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
						$getGambarNotIn = $this->db->query("SELECT nama_file FROM gambar_tipe_properti WHERE id_tipe_properti = '$id' AND nama_file NOT IN('$im_path')")->result_array();
						if ($getGambarNotIn) {
							foreach ($getGambarNotIn as $gg) {
								if (!empty($gg['nama_file'])) {
									$file_before = FCPATH . './uploads/images/properti/tipe/galeri/' . $gg['nama_file'];
									if (file_exists($file_before)) {
										unlink($file_before);
									}
								}
							}
						}

						$data = $path[$i];
					} else {
						if (!empty($id_gambar[$i])) {
							$data_gambar = $this->db->get_where('gambar_tipe_properti', ['id' => $id_gambar[$i]])->row_array();
							if ($data_gambar) {
								$file_before = FCPATH . './uploads/images/properti/tipe/galeri/' . $data_gambar['nama_file'];
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
					$arr_gambar[] = array(
						'nama_file' => $name_file,
						'label_id' => $label1[$index],
						'label_en' => $label2[$index],
						'id_tipe_properti' => $id
					);
				}
			}


			// var_dump($arr_gambar);
			$queryCekData = $this->db->get_where('gambar_tipe_properti', ['id_tipe_properti' => $id])->row_array();
			if ($queryCekData) {
				if (sizeof($arr_gambar) == 0) {
					$getGambarNotIn = $this->db->query("SELECT nama_file FROM gambar_tipe_properti WHERE id_tipe_properti = '$id'")->result_array();
					if ($getGambarNotIn) {
						foreach ($getGambarNotIn as $gg) {
							if (!empty($gg['nama_file'])) {
								$file_before = FCPATH . './uploads/images/properti/tipe/galeri/' . $gg['nama_file'];
								if (file_exists($file_before)) {
									unlink($file_before);
								}
							}
						}
					}
				}
				$this->M_tipe_properti->hapus_gambar_galeri($id);
			}

			// var_dump($arr_gambar);

			if (sizeof($arr_gambar) != 0) {
				$this->M_tipe_properti->tambah_gambar_galeri($arr_gambar);
			}

			$this->session->set_flashdata('berhasil_tambah', 'Berhasil simpan');

			$msg = array('berhasil' => "admins/item_properti/tipe_properti/" . $kluster . "");
			echo json_encode($msg);
		} else {
			$this->load->view('errors/forbidden');
		}
	}
}
