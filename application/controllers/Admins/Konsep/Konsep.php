<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Konsep extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_login();
		cek_login_user();
		$this->load->model('M_konsep');
		$this->load->library('upload');
	}

	public function index()
	{
		$data['konsep'] = $this->db->get('konsep')->row_array();

		$data['title'] = "Konsep";
		$this->load->view('templates/header_admin', $data);
		$this->load->view('admin/konsep/v_konsep', $data);
		$this->load->view('templates/footer_admin');
	}

	public function konsep()
	{
		if ($this->input->is_ajax_request()) {
			// $this->_validation();

			$desc = $this->input->post('inputDesc');
			$desc2 = $this->input->post('inputDesc2');

			$path = $this->input->post('inputPath');

			if (!empty($_FILES['image_konsep']['name'])) {
				$config['upload_path']     = FCPATH . './uploads/images/konsep';
				$config['allowed_types']   = 'gif|jpg|png|jpeg';
				// $config['file_name'] = 'konsep';
				$config['encrypt_name'] = TRUE;


				// $this->load->library('upload', $config);
				$this->upload->initialize($config);

				if (strpos($_FILES['image_konsep']['name'], ".php") !== false) {
					$name_file = '';
				} else if (strpos($_FILES['image_konsep']['name'], ".js") !== false) {
					$name_file = '';
				} else if (strpos($_FILES['image_konsep']['name'], ".py") !== false) {
					$name_file = '';
				} else {

					$cekKonsep = $this->db->get('konsep')->row_array();
					if ($cekKonsep) {
						if ($cekKonsep['nama_file'] != '') {
							$file_before = FCPATH . './uploads/images/konsep/' . $cekKonsep['nama_file'];
							if (file_exists($file_before)) {
								unlink($file_before);
							}
						}
					}

					if ($this->upload->do_upload('image_konsep')) {
						$name_file = $this->upload->data('file_name');
						$config['image_library'] = 'gd2';
						$config['source_image'] = FCPATH . './uploads/images/konsep/' . $this->upload->data('file_name');
						$config['create_thumb'] = FALSE;
						$config['maintain_ratio'] = TRUE;
						$config['quality'] = '50';
						// $config['width'] = 800;
						// $config['height'] = 800;
						$config['new_image'] = FCPATH . './uploads/images/konsep/' . $this->upload->data('file_name');
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();
					} else {
						$name_file = '';
					}
				}
				$name_file = $name_file;
			} else {
				if ($path != '') {
					$nama_file = $path;
				} else {
					$cekKonsep = $this->db->get('konsep')->row_array();
					if ($cekKonsep) {
						if ($cekKonsep['nama_file'] != '') {
							$file_before = FCPATH . './uploads/images/konsep/' . $cekKonsep['nama_file'];
							if (file_exists($file_before)) {
								unlink($file_before);
							}
						}
					}

					$nama_file = '';
				}
				$name_file = $nama_file;
			}


			$cekKonsep = $this->db->get('konsep')->row_array();
			if ($cekKonsep) {
				$arr_konsep[] = array(
					'desc_id' => $desc,
					'desc_en' => $desc2,
					'nama_file' => $name_file
				);


				$this->M_konsep->hapus_konsep();
				$this->M_konsep->update_konsep($arr_konsep);
			} else {
				$this->M_konsep->konsep($desc, $desc2, $name_file);
			}

			$this->session->set_flashdata('berhasil_tambah', 'Berhasil simpan');

			$msg = array('berhasil' => "admins/konsep");
			echo json_encode($msg);
		} else {
			$this->load->view('errors/forbidden');
		}
	}

	//Upload image summernote
	function tambah_gambar()
	{
		if (isset($_FILES["image"]["name"])) {
			$config['upload_path'] = FCPATH . './uploads/images/konsep/id';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('image')) {
				$this->upload->display_errors();
				return FALSE;
			} else {
				$data = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './uploads/images/konsep/id/' . $data['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '60%';
				// $config['width'] = 800;
				// $config['height'] = 800;
				$config['new_image'] = './uploads/images/konsep/id/' . $data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				echo base_url() . 'uploads/images/konsep/id/' . $data['file_name'];
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
			$config['upload_path'] = FCPATH . './uploads/images/konsep/en';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('image')) {
				$this->upload->display_errors();
				return FALSE;
			} else {
				$data = $this->upload->data();
				//Compress Image
				$config['image_library'] = 'gd2';
				$config['source_image'] = './uploads/images/konsep/en/' . $data['file_name'];
				$config['create_thumb'] = FALSE;
				$config['maintain_ratio'] = TRUE;
				$config['quality'] = '60%';
				// $config['width'] = 800;
				// $config['height'] = 800;
				$config['new_image'] = './uploads/images/konsep/en/' . $data['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();
				echo base_url() . 'uploads/images/konsep/en/' . $data['file_name'];
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
