<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Edit extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_login();
		cek_login_user();
		$this->load->model('M_pengguna');
	}

	public function index()
	{

		if (empty($this->uri->segment(4))) {
			redirect(base_url('admins/pengguna'));
		} else {
			$data['get_role'] = $this->M_pengguna->get_role();
			$data_pengguna = $this->db->get_where('pengguna', ['id' => $this->uri->segment(4)])->row_array();
			$data['pengguna'] = $data_pengguna;
			$data['title'] = "Pengguna";
			$data['title2'] = "Edit Pengguna";
			$this->load->view('templates/header_admin', $data);
			$this->load->view('admin/pengguna/v_edit_pengguna', $data);
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

		$username = $this->input->post('inputUsername');
		$queryCekUsername = $this->db->query("SELECT * FROM pengguna WHERE username = '$username' AND id != '$id'")->row_array();

		if ($this->input->post('inputRole') == '') {
			$data['inputerror'][] = "inputRole";
			$data['error_string'][] = "Role harus dipilih!";
			$data['valid'][] = false;
			$data['status'] = false;
		}
		if ($this->input->post('inputUsername') == '') {
			$data['inputerror'][] = "inputUsername";
			$data['error_string'][] = "Username tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}
		if ($this->input->post('inputName') == '') {
			$data['inputerror'][] = "inputName";
			$data['error_string'][] = "Nama tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}
		if ($this->input->post('inputPassword') == '') {
			$data['inputerror'][] = "inputPassword";
			$data['error_string'][] = "Password tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}
		if ($this->input->post('inputPassword2') == '') {
			$data['inputerror'][] = "inputPassword2";
			$data['error_string'][] = "Password tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}


		if ($this->input->post('inputRole') != '') {
			$data['inputerror'][] = "inputRole";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}
		if ($this->input->post('inputUsername') != '') {
			$data['inputerror'][] = "inputUsername";
			$data['error_string'][] = "";
			$data['valid'][] = true;

			if ($queryCekUsername > 0) {
				$data['inputerror'][] = "inputUsername";
				$data['error_string'][] = "Username sudah ada!";
				$data['valid'][] = false;
				$data['status'] = false;
			}

			if ($queryCekUsername == 0) {
				$data['inputerror'][] = "inputUsername";
				$data['error_string'][] = "";
				$data['valid'][] = true;
			}
		}
		if ($this->input->post('inputName') != '') {
			$data['inputerror'][] = "inputName";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}

		if ($this->input->post('inputPassword2') != '') {
			$data['inputerror'][] = "inputPassword2";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}

		if ($this->input->post('inputPassword') != '') {
			// $data['inputerror'][] = "inputPassword";
			// $data['error_string'][] = "";
			// $data['valid'][] = true;

			$uppercase = preg_match('@[A-Z]@', $this->input->post('inputPassword'));
			$lowercase = preg_match('@[a-z]@', $this->input->post('inputPassword'));
			$number    = preg_match('@[0-9]@', $this->input->post('inputPassword'));
			$specialChars = preg_match('@[^\w]@', $this->input->post('inputPassword'));
			if (strlen($this->input->post('inputPassword')) < 10) {
				$data['inputerror'][] = "inputPassword";
				$data['error_string'][] = "Password minimal 10 karakter!";
				$data['status'] = false;
			} else if (!$lowercase) {
				$data['inputerror'][] = "inputPassword";
				$data['error_string'][] = "Password harus mengandung huruf kecil!";
				$data['status'] = false;
			} else if (!$uppercase) {
				$data['inputerror'][] = "inputPassword";
				$data['error_string'][] = "Password harus mengandung huruf kapital!";
				$data['status'] = false;
			} else if (!$number) {
				$data['inputerror'][] = "inputPassword";
				$data['error_string'][] = "Password harus mengandung angka!";
				$data['status'] = false;
			} else if (!$specialChars) {
				$data['inputerror'][] = "inputPassword";
				$data['error_string'][] = "Password harus mengandung spesial karakter!";
				$data['status'] = false;
			} else {
				$data['inputerror'][] = "inputPassword";
				$data['error_string'][] = "";
				$data['valid'][] = true;

				if ($this->input->post('inputPassword') != '' and $this->input->post('inputPassword2') != '') {
					if ($this->input->post('inputPassword') != $this->input->post('inputPassword2')) {
						$data['inputerror'][] = "inputPassword";
						$data['inputerror'][] = "inputPassword2";
						$data['error_string'][] = "Password tidak sama!";
						$data['error_string'][] = "Password tidak sama!";
						$data['valid'][] = false;
						$data['status'] = false;
					}

					if ($this->input->post('inputPassword') == $this->input->post('inputPassword2')) {
						$data['inputerror'][] = "inputPassword";
						$data['inputerror'][] = "inputPassword2";
						$data['error_string'][] = "";
						$data['error_string'][] = "";
						$data['valid'][] = true;
						$data['valid'][] = true;
					}
				}
			}
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

			$this->_validation($id);

			$role = $this->input->post('inputRole');
			$username = $this->input->post('inputUsername');
			$name = $this->input->post('inputName');
			$password = password_hash($this->input->post('inputPassword'), PASSWORD_DEFAULT);

			$data = array(
				'username' => $username,
				'name' => $name,
				'id_role' => $role,
				'password' => $password
			);

			$this->M_pengguna->edit_pengguna($id, $data);

			$this->session->set_flashdata('berhasil_tambah', 'Sukses edit pengguna');

			$msg = array('berhasil' => "admins/pengguna");
			echo json_encode($msg);
		} else {
			$this->load->view('errors/forbidden');
		}
	}
}
