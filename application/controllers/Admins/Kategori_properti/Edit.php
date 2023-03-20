<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->library('upload');
		$this->load->helper('string');
		$this->load->model('M_kategori');
	}

	public function index()
	{
		if (empty($this->uri->segment(4))) {
			redirect(base_url('admins/kategori_properti'));
		} else {
			$data_kategori = $this->db->get_where('kategori', ['slug_id' => $this->uri->segment(4)])->row_array();
			$data['kategori'] = $data_kategori;
			$data['title'] = "Kategori Properti";
			$data['title2'] = "Edit Kategori";
			$this->load->view('templates/header_admin', $data);
			$this->load->view('admin/kategori_properti/v_edit_kategori', $data);
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
		$queryCeName = $this->db->query("SELECT * FROM kategori WHERE name_id = '$name1' AND id != '$id'")->row_array();
		$queryCeName2 = $this->db->query("SELECT * FROM kategori WHERE name_id = '$name2' AND id != '$id'")->row_array();
		// $queryCeName = $this->db->get_where('kategori', ['name_id' => $this->input->post('inputName')])->row_array();
		// $queryCeName2 = $this->db->get_where('kategori', ['name_en' => $this->input->post('inputName2')])->row_array();

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

		// if ($this->input->post('inputDesc') == '') {
		//     $data['inputerror'][] = "inputDesc";
		//     $data['error_string'][] = "Deksripsi Ketegori tidak boleh kosong!";
		//     $data['valid'][] = false;
		//     $data['status'] = false;
		// }
		// if ($this->input->post('inputDesc2') == '') {
		//     $data['inputerror'][] = "inputDesc2";
		//     $data['error_string'][] = "Deksripsi Ketegori tidak boleh kosong!";
		//     $data['valid'][] = false;
		//     $data['status'] = false;
		// }
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

		if ($data['status'] == false) {
			echo json_encode($data);
			exit();
		}
	}

	public function edit()
	{
		if ($this->input->is_ajax_request()) {

			$id = $this->input->post('inputId');
			$data_kategori = $this->db->get_where('kategori', ['id' => $id])->row_array();

			$this->_validation($id);

			// $id = random_string('alnum', 6);
			$name = $this->input->post('inputName', true);
			$name2 = $this->input->post('inputName2', true);
			$desc = $this->input->post('inputDesc');
			$desc2 = $this->input->post('inputDesc2');
			$meta = $this->input->post('inputMeta', true);
			$meta2 = $this->input->post('inputMeta2', true);

			$slug = url_title($name, 'dash', true);
			$slug2 = url_title($name2, 'dash', true);

			if (!empty($_FILES['image_banner']['name'])) {
				$config['upload_path']     = FCPATH . './uploads/images/kategori';
				$config['allowed_types']   = 'gif|jpg|png|jpeg';
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

					if ($data_kategori['nama_file'] != '') {
						$file_before = FCPATH . './uploads/images/kategori/' . $data_kategori['nama_file'];
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
				$data = array(
					'name_id' => $name,
					'name_en' => $name2,
					'desc_id' => $desc,
					'desc_en' => $desc2,
					'meta_id' => $meta,
					'meta_en' => $meta2,
					'slug_id' => $slug,
					'slug_en' => $slug2,
					'nama_file' => $name_file
				);
			} else {
				$data = array(
					'name_id' => $name,
					'name_en' => $name2,
					'desc_id' => $desc,
					'desc_en' => $desc2,
					'meta_id' => $meta,
					'meta_en' => $meta2,
					'slug_id' => $slug,
					'slug_en' => $slug2
				);
				// $name_file = '';
			}

			$this->M_kategori->edit_kategori($id, $data);

			$this->session->set_flashdata('berhasil_tambah', 'Sukses edit kategori');

			$msg = array('berhasil' => "admins/kategori_properti");
			echo json_encode($msg);
		} else {
			$this->load->view('errors/forbidden');
		}
	}

	//Upload image summernote
	function tambah_gambar()
	{
		if (isset($_FILES["image"]["name"])) {
			$config['upload_path'] = FCPATH . './uploads/images/kategori/id';
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
					$config['source_image'] = './uploads/images/kategori/id/' . $data['file_name'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = TRUE;
					$config['quality'] = '60%';
					// $config['width'] = 800;
					// $config['height'] = 800;
					$config['new_image'] = './uploads/images/kategori/id/' . $data['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					echo base_url() . 'uploads/images/kategori/id/' . $data['file_name'];
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
			$config['upload_path'] = FCPATH . './uploads/images/kategori/en';
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
					$config['source_image'] = './uploads/images/kategori/en/' . $data['file_name'];
					$config['create_thumb'] = FALSE;
					$config['maintain_ratio'] = TRUE;
					$config['quality'] = '60%';
					// $config['width'] = 800;
					// $config['height'] = 800;
					$config['new_image'] = './uploads/images/kategori/en/' . $data['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();
					echo base_url() . 'uploads/images/kategori/en/' . $data['file_name'];
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
