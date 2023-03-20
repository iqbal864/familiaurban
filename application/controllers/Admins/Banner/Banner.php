<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('M_banner');
		$this->load->library('upload');
	}

	public function index()
	{


		$data['gambar'] = $this->db->get('banner_promo')->result_array();

		$data['title'] = "Banner Promo";
		$this->load->view('templates/header_admin', $data);
		$this->load->view('admin/banner/v_banner_promo', $data);
		$this->load->view('templates/footer_admin');
	}

	public function banner()
	{
		if ($this->input->is_ajax_request()) {

			$path_desktop = $this->input->post('inputPathDesktop', true);
			$path_mobile = $this->input->post('inputPathMobile', true);
			$id_gambar = $this->input->post('inputIdGambar', true);

			$urlDesktop = $this->input->post('inputUrlDesktop', true);
			$urlMobile = $this->input->post('inputUrlMobile', true);

			$arr_data = $this->proses($_FILES, $path_desktop, $urlDesktop, $path_mobile, $urlMobile, $id_gambar);


			// var_dump($arr_data);
			// die;
			if ($id_gambar) {
				$im_id_gambar = implode("','", $id_gambar);
				$queryCekData = $this->db->query("SELECT * FROM banner_promo WHERE id IN('$im_id_gambar')")->row_array();
				if ($queryCekData) {
					if (sizeof($arr_data) == 0) {
						$getGambarNotIn = $this->db->query("SELECT * FROM banner_promo")->result_array();
						if ($getGambarNotIn) {
							foreach ($getGambarNotIn as $gg) {
								if (!empty($gg['file_desktop'])) {
									$file_before = FCPATH . './uploads/images/banner/' . $gg['file_desktop'];
									if (file_exists($file_before)) {
										unlink($file_before);
									}
								}
								if (!empty($gg['file_mobile'])) {
									$file_before = FCPATH . './uploads/images/banner/' . $gg['file_mobile'];
									if (file_exists($file_before)) {
										unlink($file_before);
									}
								}
							}
						}
					}
					$this->M_banner->hapus_gambar_banner();
				}
			}


			if (sizeof($arr_data) != 0) {
				$this->M_banner->tambah_gambar_banner($arr_data);
			}

			$this->session->set_flashdata('berhasil_tambah', 'Berhasil simpan');

			$msg = array('berhasil' => "admins/banner");
			echo json_encode($msg);
		} else {
			$this->load->view('errors/forbidden');
		}
	}

	private function proses($file, $path_desktop, $urlDesktop, $path_mobile, $urlMobile, $id_gambar)
	{

		$arr_gambar = array();
		$count = count($_FILES['inputDesktop']['name']);

		// var_dump($_FILES['inputMobile']);
		// die;

		$files = array_filter($_FILES);
		for ($i = 0; $i < $count; $i++) {

			$_FILES['inputDesktop']['name'] =  $files['inputDesktop']['name'][$i];
			$_FILES['inputDesktop']['type']    = $files['inputDesktop']['type'][$i];
			$_FILES['inputDesktop']['tmp_name'] = $files['inputDesktop']['tmp_name'][$i];
			$_FILES['inputDesktop']['error']      = $files['inputDesktop']['error'][$i];
			$_FILES['inputDesktop']['size']    = $files['inputDesktop']['size'][$i];

			$config['upload_path']     = FCPATH . './uploads/images/banner';
			$config['allowed_types']   = 'gif|jpg|png|jpeg';
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);

			if ($_FILES['inputDesktop']['name'] != '') {
				if (strpos($_FILES['inputDesktop']['name'], ".php") !== false) {
					$name_file_desktop = '';
				} else if (strpos($_FILES['inputDesktop']['name'], ".js") !== false) {
					$name_file_desktop = '';
				} else if (strpos($_FILES['inputDesktop']['name'], ".py") !== false) {
					$name_file_desktop = '';
				} else {

					if (!empty($path_desktop[$i])) {
						$file_before = FCPATH . './uploads/images/banner/' . $path_desktop[$i];
						if (file_exists($file_before)) {
							unlink($file_before);
						}
					}

					if ($this->upload->do_upload('inputDesktop')) {
						$data = $this->upload->data();
						$config['image_library'] = 'gd2';
						$config['source_image'] = FCPATH . './uploads/images/banner/' . $data['file_name'];
						$config['create_thumb'] = FALSE;
						$config['maintain_ratio'] = FALSE;
						$config['quality'] = '100%';
						// $config['width'] = 1280;
						// $config['height'] = 720;
						$config['new_image'] = FCPATH . './uploads/images/banner/' . $data['file_name'];
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
						$name_file_desktop = $data['file_name'];
					} else {
						$name_file_desktop = '';
					}
				}

				$name_file_desktop = $name_file_desktop;
			} else {
				if (!empty($path_desktop[$i])) {
					$im_path = implode("','", $path_desktop);
					$getGambarNotIn = $this->db->query("SELECT file_desktop FROM banner_promo WHERE file_desktop NOT IN('$im_path')")->result_array();
					if ($getGambarNotIn) {
						foreach ($getGambarNotIn as $gg) {
							if (!empty($gg['file_desktop'])) {
								$file_before = FCPATH . './uploads/images/banner/' . $gg['file_desktop'];
								if (file_exists($file_before)) {
									unlink($file_before);
								}
							}
						}
					}

					$data = $path_desktop[$i];
				} else {
					if (!empty($id_gambar[$i])) {
						$im_id = implode("','", $id_gambar);
						$data_gambar = $this->db->get_where('banner_promo', ['id' => $id_gambar[$i]])->row_array();
						if ($data_gambar) {
							if ($data_gambar['file_desktop'] != "") {
								$file_before = FCPATH . './uploads/images/banner/' . $data_gambar['file_desktop'];
								if (file_exists($file_before)) {
									unlink($file_before);
								}
							} else {
								$getGambarNotIn = $this->db->query("SELECT file_desktop FROM banner_promo WHERE id NOT IN('$im_id')")->result_array();
								if ($getGambarNotIn) {
									foreach ($getGambarNotIn as $gg) {
										if (!empty($gg['file_desktop'])) {
											$file_before = FCPATH . './uploads/images/banner/' . $gg['file_desktop'];
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
				$name_file_desktop = $data;
			}

			$_FILES['inputMobile']['name'] =  $files['inputMobile']['name'][$i];
			$_FILES['inputMobile']['type']    = $files['inputMobile']['type'][$i];
			$_FILES['inputMobile']['tmp_name'] = $files['inputMobile']['tmp_name'][$i];
			$_FILES['inputMobile']['error']      = $files['inputMobile']['error'][$i];
			$_FILES['inputMobile']['size']    = $files['inputMobile']['size'][$i];

			$config['upload_path']     = FCPATH . './uploads/images/banner';
			$config['allowed_types']   = 'gif|jpg|png|jpeg';
			$config['encrypt_name'] = TRUE;

			$this->upload->initialize($config);

			if ($_FILES['inputMobile']['name'] != '') {


				if (strpos($_FILES['inputMobile']['name'], ".php") !== false) {
					$name_file_mobile = '';
				} else if (strpos($_FILES['inputMobile']['name'], ".js") !== false) {
					$name_file_mobile = '';
				} else if (strpos($_FILES['inputMobile']['name'], ".py") !== false) {
					$name_file_mobile = '';
				} else {

					if (!empty($path_mobile[$i])) {
						$file_before = FCPATH . './uploads/images/banner/' . $path_mobile[$i];
						if (file_exists($file_before)) {
							unlink($file_before);
						}
					}


					if ($this->upload->do_upload('inputMobile')) {
						$data = $this->upload->data();
						$config['image_library'] = 'gd2';
						$config['source_image'] = FCPATH . './uploads/images/banner/' . $data['file_name'];
						$config['create_thumb'] = FALSE;
						$config['maintain_ratio'] = FALSE;
						$config['quality'] = '100%';
						// $config['width'] = 1280;
						// $config['height'] = 2275.56;
						$config['new_image'] = FCPATH . './uploads/images/banner/' . $data['file_name'];
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
						$name_file_mobile = $data['file_name'];
					} else {
						$name_file_mobile = '';
					}
				}

				$name_file_mobile = $name_file_mobile;
			} else {
				if (!empty($path_mobile[$i])) {
					$im_path = implode("','", $path_mobile);
					// var_dump($im_path);
					$getGambarNotIn = $this->db->query("SELECT file_mobile FROM banner_promo WHERE file_mobile NOT IN('$im_path')")->result_array();
					if ($getGambarNotIn) {
						foreach ($getGambarNotIn as $gg) {
							if (!empty($gg['file_mobile'])) {
								$file_before = FCPATH . './uploads/images/banner/' . $gg['file_mobile'];
								if (file_exists($file_before)) {
									unlink($file_before);
								}
							}
						}
					}

					$data = $path_mobile[$i];
				} else {
					if (!empty($id_gambar[$i])) {
						$im_id = implode("','", $id_gambar);
						$data_gambar = $this->db->get_where('banner_promo', ['id' => $id_gambar[$i]])->row_array();
						if ($data_gambar) {
							if ($data_gambar['file_mobile'] != "") {
								$file_before = FCPATH . './uploads/images/banner/' . $data_gambar['file_mobile'];
								if (file_exists($file_before)) {
									unlink($file_before);
								}
							} else {
								$getGambarNotIn = $this->db->query("SELECT file_mobile FROM banner_promo WHERE id NOT IN('$im_id')")->result_array();
								if ($getGambarNotIn) {
									foreach ($getGambarNotIn as $gg) {
										if (!empty($gg['file_mobile'])) {
											$file_before = FCPATH . './uploads/images/banner/' . $gg['file_mobile'];
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
				$name_file_mobile = $data;
			}



			// $this->load->library('upload', $config);
			$index = $i;
			if ($name_file_desktop != "" || $name_file_mobile != "") {
				$arr_gambar[] = array(
					'file_desktop' => $name_file_desktop,
					'url_file_desktop' => $urlDesktop[$index],
					'file_mobile' => $name_file_mobile,
					'url_file_mobile' => $urlMobile[$index]
				);
			}
		}
		return $arr_gambar;
	}

	private function mobile($file, $path_mobile, $urlMobile, $id_gambar)
	{
		$arr_gambar = array();
		$count = count($_FILES['inputMobile']['name']);

		$files = array_filter($_FILES);
		for ($i = 0; $i < $count; $i++) {
		}
		return $arr_gambar;
	}
}
