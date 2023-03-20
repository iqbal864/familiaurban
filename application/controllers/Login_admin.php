<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_admin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	public function index()
	{
		$this->load->view('v_login');
	}

	private function _validation()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['valid'] = array();
		$data['status'] = true;

		if ($this->input->post('username') == '') {
			$data['inputerror'][] = "username";
			$data['error_string'][] = "Username tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}
		if ($this->input->post('password') == '') {
			$data['inputerror'][] = "password";
			$data['error_string'][] = "Password tidak boleh kosong!";
			$data['valid'][] = false;
			$data['status'] = false;
		}

		if ($this->input->post('username') != '') {
			$data['inputerror'][] = "username";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}
		if ($this->input->post('password') != '') {
			$data['inputerror'][] = "password";
			$data['error_string'][] = "";
			$data['valid'][] = true;
		}

		if ($data['status'] == false) {
			echo json_encode($data);
			exit();
		}
	}

	function login()
	{
		if ($this->input->is_ajax_request()) {
			$this->_validation();
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$where = array(
				'username' => $username
			);

			if ($this->input->post("g-recaptcha-response") != "") {
				//jika captcha telah terisi jalankan blok ini

				//masukan secret key disini
				$secretKey = "6LdWhiEkAAAAADln-RaJ4uqM9PQ_WX5oyFrrdvIc";
				$captcha = $this->input->post("g-recaptcha-response");
				// $respond = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha");

				$url= "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha";

				$arrContextOptions=array(
					  "ssl"=>array(
							"verify_peer"=>false,
							"verify_peer_name"=>false,
						),
					);  
				
				$response = file_get_contents($url, false, stream_context_create($arrContextOptions));

				$hasil = json_decode($response, true);

				//cek apakah jawaban dari captcha benar
				if ($hasil["success"] == true) {

					$ip = $this->input->ip_address();
					$queryCekIp = $this->db->query("SELECT date_created FROM login_attempt WHERE ip = '$ip' AND attempts = 5 ORDER BY date_created DESC")->row_array();
					if (!empty($queryCekIp['date_created'])) {
						date_default_timezone_set('Asia/Jakarta');
						$awal  = date_create($queryCekIp['date_created']);
						$akhir = date_create(date('Y-m-d G:i:s'));
						$diff  = date_diff($akhir, $awal);
						$jarak_menit =  $diff->i;

						$menit = abs($jarak_menit - 5);
					} else {
						$jarak_menit = 0;
						$menit = 0;
					}

					if ($jarak_menit > 5) {
						$menit = 0;
						$ip = $this->input->ip_address();
						$this->db->delete('login_attempt', array('ip' => $ip));
					}

					$queryCekIp = $this->db->query("SELECT date_created FROM login_attempt WHERE ip = '$ip' AND attempts = 5 ORDER BY date_created DESC")->row_array();

					if ($menit == 0 and empty($queryCekIp['date_created'])) {
						$cek_username = $this->m_login->cek_login("pengguna", $where)->row_array();
						if ($cek_username) {
							if (password_verify($password, $cek_username['password'])) {
								$data_session = array(
									'id' => $cek_username['id'],
									'username' => $username,
									'name' => $cek_username['name'],
									'role' => $cek_username['id_role']
								);

								$data = array(
									'id_session' => $this->session->session_id,
									'id_user' => $cek_username['id'],
									'date_created' => date('Y-m-d')
								);

								$this->db->insert('login_session', $data);

								$date = date('Y-m-d');

								$id_user = $cek_username['id'];
								$this->db->query("DELETE FROM login_session WHERE date_created < DATE('$date') AND id_user = '$id_user'");

								$ip = $this->input->ip_address();
								$this->db->delete('login_attempt', array('id' => $ip));

								$this->session->set_userdata($data_session);

								$msg = array('berhasil' => "admins/admins");
								echo json_encode($msg);
							} else {
								$ip = $this->input->ip_address();
								$queryCekIp = $this->db->get_where('login_attempt', ['ip' => $ip])->row_array();
								$tz = 'Asia/Jakarta';
								$dt = new DateTime("now", new DateTimeZone($tz));
								$timestamp = $dt->format('Y-m-d G:i:s');
								if (!empty($queryCekIp)) {
									$this->db->set('attempts', 'attempts+1');
									$this->db->set('date_created', $timestamp);
									$this->db->where('ip', $ip);
									$this->db->update('login_attempts');
								} else {
									$data = array(
										'ip' => $ip,
										'attempts' => 1,
										'date_created' => $timestamp
									);

									$this->db->insert('mytable', $data);
								}
								$this->session->set_flashdata('message', 'Username dan password salah !');
								$msg = array('gagal' => "login_admin");
								echo json_encode($msg);
							}
						} else {
							$ip = $this->input->ip_address();
							$queryCekIp = $this->db->get_where('login_attempt', ['ip' => $ip])->row_array();
							$tz = 'Asia/Jakarta';
							$dt = new DateTime("now", new DateTimeZone($tz));
							$timestamp = $dt->format('Y-m-d G:i:s');
							if (!empty($queryCekIp)) {
								$this->db->set('attempts', 'attempts+1', false);
								$this->db->set('date_created', $timestamp);
								$this->db->where('ip', $ip);
								$this->db->update('login_attempt');
							} else {
								$data = array(
									'ip' => $ip,
									'attempts' => 1,
									'date_created' => $timestamp
								);

								$this->db->insert('login_attempt', $data);
							}
							$this->session->set_flashdata('message', 'Username dan password salah !');
							$msg = array('gagal' => "login_admin");
							echo json_encode($msg);
						}
					} else {
						$ip = $this->input->ip_address();
						$this->db->delete('login_attempt', array('id' => $ip));
						$this->session->set_flashdata('message', 'Mohon tunggu ' . $menit . ' menit untuk login kembali.');
						$msg = array('gagal' => "login_admin");
						echo json_encode($msg);
					}
				} else {
					$this->session->set_flashdata('alert_captcha', 'Anda memasukan captcha yang salah !');
					$msg = array('gagal' => "login_admin");
					echo json_encode($msg);
				}
			} else {
				$this->session->set_flashdata('alert_captcha', 'Captcha belum terisi !');
				$msg = array('gagal' => "login_admin");
				echo json_encode($msg);
			}
		} else {
			$this->load->view('errors/forbidden');
		}
	}

	public function logout()
	{
		cek_login();
		$this->db->delete('login_session', array('id_session' => $this->session->session_id, 'id_user' => $this->session->userdata('id')));
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('role');
		$this->session->sess_destroy();
		redirect('login_admin');
	}
}
