<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lupa_password extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	public function index()
	{
		cek_login();
		$this->load->view('admin/v_lupa_password');
	}

	private function _validation($id)
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['valid'] = array();
		$data['status'] = true;

		$cek_data = $this->db->query("SELECT password FROM pengguna WHERE id='$id'")->row_array();

		if ($this->input->post('password_old') == '') {
			$data['inputerror'][] = "password_old";
			$data['error_string'][] = "Password lama tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}

		if ($this->input->post('password') == '') {
			$data['inputerror'][] = "password";
			$data['error_string'][] = "Password baru tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}

		if ($this->input->post('password2') == '') {
			$data['inputerror'][] = "password2";
			$data['error_string'][] = "Ulangi password tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}

		if ($this->input->post('password_old') != '') {
			// $data['inputerror'][] = "password_old";
			// $data['error_string'][] = "";
			// $data['valid'][] = true;

			if (password_verify($this->input->post('password_old'), $cek_data['password'])) {
				$data['inputerror'][] = "password_old";
				$data['error_string'][] = "";
				$data['valid'][] = true;

				if ($this->input->post('password2') != '') {
					$data['inputerror'][] = "password2";
					$data['error_string'][] = "";
					$data['valid'][] = true;
				}

				if ($this->input->post('password') != '') {
					$uppercase = preg_match('@[A-Z]@', $this->input->post('password'));
					$lowercase = preg_match('@[a-z]@', $this->input->post('password'));
					$number    = preg_match('@[0-9]@', $this->input->post('password'));
					$specialChars = preg_match('@[^\w]@', $this->input->post('password'));
					if (strlen($this->input->post('password')) < 10) {
						$data['inputerror'][] = "password";
						$data['error_string'][] = "Password minimal 10 karakter!";
						$data['status'] = false;
					} else if (!$lowercase) {
						$data['inputerror'][] = "password";
						$data['error_string'][] = "Password harus mengandung huruf kecil!";
						$data['status'] = false;
					} else if (!$uppercase) {
						$data['inputerror'][] = "password";
						$data['error_string'][] = "Password harus mengandung huruf kapital!";
						$data['status'] = false;
					} else if (!$number) {
						$data['inputerror'][] = "password";
						$data['error_string'][] = "Password harus mengandung angka!";
						$data['status'] = false;
					} else if (!$specialChars) {
						$data['inputerror'][] = "password";
						$data['error_string'][] = "Password harus mengandung spesial karakter!";
						$data['status'] = false;
					} else {
						$data['inputerror'][] = "password";
						$data['error_string'][] = "";
						$data['valid'][] = true;

						if ($this->input->post('password') != '' and $this->input->post('password2') != '') {
							if ($this->input->post('password') != $this->input->post('password2')) {
								$data['inputerror'][] = "password";
								$data['inputerror'][] = "password2";
								$data['error_string'][] = "Password tidak sama!";
								$data['error_string'][] = "Password tidak sama!";
								$data['valid'][] = false;
								$data['status'] = false;
							}

							if ($this->input->post('password') == $this->input->post('password2')) {
								$data['inputerror'][] = "password";
								$data['inputerror'][] = "password2";
								$data['error_string'][] = "";
								$data['error_string'][] = "";
								$data['valid'][] = true;
								$data['valid'][] = true;
							}
						}
					}
				}
			} else {
				$data['inputerror'][] = "password_old";
				$data['error_string'][] = "Password lama salah!";
				$data['valid'][] = false;
				$data['status'] = false;
			}
		}



		if ($data['status'] == false) {
			echo json_encode($data);
			exit();
		}
	}

	public function lupa()
	{
		cek_login();
		if ($this->input->is_ajax_request()) {
			$id = $this->session->userdata('id');
			$this->_validation($id);

			$password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);

			$data = array(
				'password' => $password
			);

			$this->m_login->lupa_password($id, $data);

			$msg = array('berhasil' => "login_admin");
			echo json_encode($msg);
		} else {
			$this->load->view('errors/forbidden');
		}
	}

	public function forcelogout()
	{
		$id = $this->session->userdata('id');

		$this->db->delete('login_session', array('id_user' => $id));

		$this->session->set_flashdata('berhasil_tambah', 'Sukses merubah password');

		$msg = array('berhasil' => "login_admin");
		echo json_encode($msg);
	}
}
