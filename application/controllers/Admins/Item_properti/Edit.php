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
		$this->load->model('M_kategori');
	}

	public function index()
	{
		if (empty($this->uri->segment(4))) {
			redirect(base_url('admins/item_properti'));
		} else {

			$data['get_kategori'] = $this->M_kategori->get_kategori();

			$data_properti = $this->db->get_where('properti', ['slug_id' => $this->uri->segment(4)])->row_array();
			$data['properti'] = $data_properti;

			$data_fitur = $this->db->get_where('fitur_properti', ['id_properti' => $data_properti['id']])->result_array();
			$data['fitur_properti'] = $data_fitur;

			$data['title'] = "Item Properti";
			$data['title2'] = "Edit Properti";
			$this->load->view('templates/header_admin', $data);
			$this->load->view('admin/item_properti/v_edit_properti', $data);
			$this->load->view('templates/footer_admin');
		}
	}

	private function _validation($id)
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['valid'] = array();
		$data['status'] = true;

		$name1 = $this->input->post('inputName');
		$name2 = $this->input->post('inputName2');
		// $queryCeName = $this->db->get_where('properti', ['name_id' => $this->input->post('inputName')])->row_array();
		// $queryCeName2 = $this->db->get_where('properti', ['name_en' => $this->input->post('inputName2')])->row_array();
		$queryCeName = $this->db->query("SELECT * FROM properti WHERE name_id = '$name1' AND id != '$id'")->row_array();
		$queryCeName2 = $this->db->query("SELECT * FROM properti WHERE name_id = '$name2' AND id != '$id'")->row_array();

		if ($this->input->post('inputName') == '') {
			$data['inputerror'][] = "inputName";
			$data['error_string'][] = "Nama Ketegori tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}
		if ($this->input->post('inputName2') == '') {
			$data['inputerror'][] = "inputName2";
			$data['error_string'][] = "Nama Ketegori tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}

		if ($this->input->post('inputMeta') == '') {
			$data['inputerror'][] = "inputMeta";
			$data['error_string'][] = "Meta Keywords tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}
		if ($this->input->post('inputMeta2') == '') {
			$data['inputerror'][] = "inputMeta2";
			$data['error_string'][] = "Meta Keywords tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}
		if ($this->input->post('inputAlamat') == '') {
			$data['inputerror'][] = "inputAlamat";
			$data['error_string'][] = "Alamat tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}

		if ($this->input->post('inputKategori') == '') {
			$data['inputerror'][] = "inputKategori";
			$data['error_string'][] = "Kategori harus dipilih!";
			$data['valid'][] = false;
			$data['status'] = false;
		}

		if ($this->input->post('inputName') != '') {
			$data['inputerror'][] = "inputName";
			$data['error_string'][] = "";
			$data['valid'][] = true;

			if ($queryCeName > 0) {
				$data['inputerror'][] = "inputName";
				$data['error_string'][] = "Nama Kategori sudah ada!";
				$data['valid'][] = false;
				$data['status'] = false;
			}

			if ($queryCeName == 0) {
				$data['inputerror'][] = "inputName";
				$data['error_string'][] = "";
				$data['valid'][] = true;
			}
		}
		if ($this->input->post('inputName2') != '') {
			$data['inputerror'][] = "inputName2";
			$data['error_string'][] = "";
			$data['valid'][] = true;

			if ($queryCeName2 > 0) {
				$data['inputerror'][] = "inputName2";
				$data['error_string'][] = "Nama Kategori sudah ada!";
				$data['valid'][] = false;
				$data['status'] = false;
			}

			if ($queryCeName2 == 0) {
				$data['inputerror'][] = "inputName2";
				$data['error_string'][] = "";
				$data['valid'][] = true;
			}
		}

		if ($this->input->post('inputMeta') != '') {
			$data['inputerror'][] = "inputMeta";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}
		if ($this->input->post('inputMeta2') != '') {
			$data['inputerror'][] = "inputMeta2";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}
		if ($this->input->post('inputAlamat') != '') {
			$data['inputerror'][] = "inputAlamat";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}
		if ($this->input->post('inputKategori') != '') {
			$data['inputerror'][] = "inputKategori";
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
			$data_properti = $this->db->get_where('properti', ['id' => $id])->row_array();

			$this->_validation($id);

			// $id = random_string('alnum', 6);
			$kategori = $this->input->post('inputKategori');
			$cekKategori = $this->db->get_where('kategori', ['id' => $kategori])->row_array();
			if (!empty($cekKategori)) {
				$name = $this->input->post('inputName', true);
				$name2 = $this->input->post('inputName2', true);
				$desc = $this->input->post('inputDesc');
				$desc2 = $this->input->post('inputDesc2');
				$meta = $this->input->post('inputMeta', true);
				$meta2 = $this->input->post('inputMeta2', true);

				$slug = url_title($name, 'dash', true);
				$slug2 = url_title($name2, 'dash', true);

				$alamat =  $this->input->post('inputAlamat');

				$path =  $this->input->post('inputPath', true);
				$path_plan =  $this->input->post('inputPath_plan', true);

				$lat = $this->input->post('inputLat', true);
				$long = $this->input->post('inputLong', true);
				$vidio = $this->input->post('inputVid', true);

				$fitur = $this->input->post('inputFitur', true);

				if (!empty($_FILES['image_banner']['name'])) {
					$config['upload_path']     = FCPATH . './uploads/images/properti';
					$config['allowed_types']   = 'gif|jpg|png|jpeg';
					$config['max_size'] = 1024 * 50;
					$config['file_name'] = $name;


					// $this->load->library('upload', $config);
					$this->upload->initialize($config);

					if (strpos($_FILES['image_banner']['name'], ".php") !== false) {
						$name_file = '';
					} else if (strpos($_FILES['image_banner']['name'], ".js") !== false) {
						$name_file = '';
					} else if (strpos($_FILES['image_banner']['name'], ".py") !== false) {
						$name_file = '';
					} else {

						if ($data_properti['nama_file'] != '') {
							$file_before = FCPATH . './uploads/images/properti/' . $data_properti['nama_file'];
							if (file_exists($file_before)) {
								unlink($file_before);
							}
						}


						if ($this->upload->do_upload('image_banner')) {
							$name_file = $this->upload->data('file_name');
						} else {
							$name_file = '';
						}
					}
					$name_file = $name_file;
				} else {
					if ($path != '') {
						$nama_file = $path;
					} else {
						$cekProperti = $this->db->get_where('properti', ['id' => $id])->row_array();
						if ($cekProperti) {
							if ($cekProperti['nama_file'] != '') {
								$file_before = FCPATH . './uploads/images/properti/' . $cekProperti['nama_file'];
								if (file_exists($file_before)) {
									unlink($file_before);
								}
							}
						}

						$nama_file = '';
					}
					$name_file = $nama_file;
				}

				if (!empty($_FILES['image_plan']['name'])) {
					$config['upload_path']     = FCPATH . './uploads/images/properti';
					$config['allowed_types']   = 'gif|jpg|png|jpeg';
					$config['max_size'] = 1024 * 50;
					$config['file_name'] = "Master_Plan_" . $name;


					// $this->load->library('upload', $config);
					$this->upload->initialize($config);

					if (strpos($_FILES['image_plan']['name'], ".php") !== false) {
						$name_file_plan = '';
					} else if (strpos($_FILES['image_plan']['name'], ".js") !== false) {
						$name_file_plan = '';
					} else if (strpos($_FILES['image_plan']['name'], ".py") !== false) {
						$name_file_plan = '';
					} else {

						if ($data_properti['master_plan'] != '') {
							$file_before = FCPATH . './uploads/images/properti/' . $data_properti['master_plan'];
							if (file_exists($file_before)) {
								unlink($file_before);
							}
						}


						if ($this->upload->do_upload('image_plan')) {
							$name_file_plan = $this->upload->data('file_name');
						} else {
							$name_file_plan = '';
						}
					}
					$name_file_plan = $name_file_plan;
				} else {
					if ($path_plan != '') {
						$name_file_plan = $path_plan;
					} else {
						$cekProperti = $this->db->get('properti')->row_array();
						if ($cekProperti) {
							if ($cekProperti['master_plan'] != '') {
								$file_before = FCPATH . './uploads/images/properti/' . $cekProperti['master_plan'];
								if (file_exists($file_before)) {
									unlink($file_before);
								}
							}
						}

						$name_file_plan = '';
					}
					$name_file_plan = $name_file_plan;
				}

				$data = array(
					'name_id' => $name,
					'name_en' => $name2,
					'desc_id' => $desc,
					'desc_en' => $desc2,
					'meta_id' => $meta,
					'meta_en' => $meta2,
					'slug_id' => $slug,
					'slug_en' => $slug2,
					'nama_file' => $name_file,
					'master_plan' => $name_file_plan,
					'id_kategori' => $kategori,
					'alamat' => $alamat,
					'latitude' => $lat,
					'longitude' => $long,
					'link_vidio' => $vidio
				);

				$queryCekIdProperti = $this->db->get_where('fitur_properti', ['id_properti' => $id])->row_array();
				if ($queryCekIdProperti) {
					$this->M_properti->hapus_fitur_properti($id);
				}

				if ($fitur) {
					$arr_fitur = array();
					foreach ($fitur as $key => $fit) {
						if (!empty($fit)) {
							$arr_fitur[] = array(
								'name' => $fit,
								'id_properti' => $id
							);
						}
					}
					if (sizeof($arr_fitur) != 0) {
						$this->M_properti->tambah_fitur($arr_fitur);
					}
				}

				$this->M_properti->edit_properti($id, $data);

				$this->session->set_flashdata('berhasil_tambah', 'Sukses edit properti');

				$msg = array('berhasil' => "admins/item_properti");
				echo json_encode($msg);
			} else {
				$this->load->view('errors/forbidden');
			}
		} else {
			$this->load->view('errors/forbidden');
		}
	}

	//Upload image summernote
	function tambah_gambar()
	{
		if (isset($_FILES["image"]["name"])) {
			$config['upload_path'] = FCPATH . './uploads/images/properti/id';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->upload->initialize($config);
			if (strpos($_FILES['image']['name'], ".php") !== false) {
				return FALSE;
			} else if (strpos($_FILES['image']['name'], ".js") !== false) {
				return FALSE;
			} else if (strpos($_FILES['image']['name'], ".py") !== false) {
				return FALSE;
			} else {
				if (!$this->upload->do_upload('image')) {
					$this->upload->display_errors();
					return FALSE;
				} else {
					$data = $this->upload->data();
					//Compress Image
					$config['image_library'] = 'gd2';
					$config['source_image'] = './uploads/images/properti/id/' . $data['file_name'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = TRUE;
					$config['quality'] = '60%';
					// $config['width'] = 800;
					// $config['height'] = 800;
					$config['new_image'] = './uploads/images/properti/id/' . $data['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					echo base_url() . 'uploads/images/properti/id/' . $data['file_name'];
				}
			}
		}
	}

	//Delete image summernote
	function hapus_gambar()
	{
		$src = $this->input->post('src');
		$file_name = str_replace(base_url(), '', $src);
		if (unlink($file_name)) {
			// echo 'File Delete Successfully';
		}
	}

	//Upload image summernote inggris
	function tambah_gambar_en()
	{
		if (isset($_FILES["image"]["name"])) {
			$config['upload_path'] = FCPATH . './uploads/images/properti/en';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->upload->initialize($config);
			if (strpos($_FILES['image']['name'], ".php") !== false) {
				return FALSE;
			} else if (strpos($_FILES['image']['name'], ".js") !== false) {
				return FALSE;
			} else if (strpos($_FILES['image']['name'], ".py") !== false) {
				return FALSE;
			} else {
				if (!$this->upload->do_upload('image')) {
					$this->upload->display_errors();
					return FALSE;
				} else {
					$data = $this->upload->data();
					//Compress Image
					$config['image_library'] = 'gd2';
					$config['source_image'] = './uploads/images/properti/en/' . $data['file_name'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = TRUE;
					$config['quality'] = '60%';
					// $config['width'] = 800;
					// $config['height'] = 800;
					$config['new_image'] = './uploads/images/properti/en/' . $data['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					echo base_url() . 'uploads/images/properti/en/' . $data['file_name'];
				}
			}
		}
	}

	//Delete image summernote inggris
	function hapus_gambar_en()
	{
		$src = $this->input->post('src');
		$file_name = str_replace(base_url(), '', $src);
		if (unlink($file_name)) {
			// echo 'File Delete Successfully';
		}
	}
}
