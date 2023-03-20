<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_login();
		cek_login_user();
		$this->load->model('M_pengaturan');
		$this->load->library('upload');
	}

	public function index()
	{
		$icon = $this->db->get_where('data_gambar', ['id' => 1])->row_array();
		if (!empty($icon['nama_file'])) {
			$data['icon'] = $icon['nama_file'];
		} else {
			$data['icon'] = "";
		}

		$logo = $this->db->get_where('data_gambar', ['id' => 2])->row_array();
		if (!empty($logo['nama_file'])) {
			$data['logo'] =  $logo['nama_file'];
		} else {
			$data['logo'] =  "";
		}

		$logo_putih = $this->db->get_where('data_gambar', ['id' => 3])->row_array();
		if (!empty($logo_putih['nama_file'])) {
			$data['logo_putih'] = $logo_putih['nama_file'];
		} else {
			$data['logo_putih'] = "";
		}

		$logo_perusahaan = $this->db->get_where('data_gambar', ['id' => 4])->row_array();
		if (!empty($logo_perusahaan['nama_file'])) {
			$data['logo_perusahaan'] = $logo_perusahaan['nama_file'];
		} else {
			$data['logo_perusahaan'] = "";
		}

		$sec_kenapa_kami = $this->db->get_where('data_gambar', ['id' => 5])->row_array();
		if (!empty($sec_kenapa_kami['nama_file'])) {
			$data['bg_sec_kenapa_kami'] = $sec_kenapa_kami['nama_file'];
		} else {
			$data['bg_sec_kenapa_kami'] = "";
		}

		$sec_fasilitas = $this->db->get_where('data_gambar', ['id' => 6])->row_array();
		if (!empty($sec_fasilitas['nama_file'])) {
			$data['bg_sec_fasilitas'] = $sec_fasilitas['nama_file'];
		} else {
			$data['bg_sec_fasilitas'] = "";
		}

		$bg_footer = $this->db->get_where('data_gambar', ['id' => 7])->row_array();
		if (!empty($bg_footer['nama_file'])) {
			$data['bg_footer'] = $bg_footer['nama_file'];
		} else {
			$data['bg_footer'] = "";
		}


		$teks_footer =  $this->db->get_where('data_teks', ['id' => 1])->row_array();
		if (!empty($teks_footer['teks'])) {
			$data['teks_footer'] = htmlentities($teks_footer['teks']);
		} else {
			$data['teks_footer'] = "";
		}

		$teks_versi = $this->db->get_where('data_teks', ['id' => 2])->row_array();
		if (!empty($teks_versi['teks'])) {
			$data['teks_versi'] = htmlentities($teks_versi['teks']);
		} else {
			$data['teks_versi'] = "";
		}

		$teks_sec_properti = $this->db->get_where('data_teks', ['id' => 3])->row_array();
		if (!empty($teks_sec_properti['teks'])) {
			$data['teks_sec_properti_id'] = $teks_sec_properti['teks'];
		} else {
			$data['teks_sec_properti_id'] =  "";
		}

		$teks_sec_fasilitas = $this->db->get_where('data_teks', ['id' => 4])->row_array();
		if (!empty($teks_sec_fasilitas['teks'])) {
			$data['teks_sec_fasilitas_id'] = $teks_sec_fasilitas['teks'];
		} else {
			$data['teks_sec_fasilitas_id'] = "";
		}

		$teks_sec_properti2 = $this->db->get_where('data_teks', ['id' => 5])->row_array();
		if (!empty($teks_sec_properti2['teks'])) {
			$data['teks_sec_properti_en'] = $teks_sec_properti2['teks'];
		} else {
			$data['teks_sec_properti_en'] =  "";
		}

		$teks_sec_fasilitas2 = $this->db->get_where('data_teks', ['id' => 6])->row_array();
		if (!empty($teks_sec_fasilitas2['teks'])) {
			$data['teks_sec_fasilitas_en'] = $teks_sec_fasilitas2['teks'];
		} else {
			$data['teks_sec_fasilitas_en'] = "";
		}



		$data['title'] = "Pengaturan";
		$this->load->view('templates/header_admin', $data);
		$this->load->view('admin/pengaturan/v_pengaturan', $data);
		$this->load->view('templates/footer_admin');
	}

	public function pengaturan()
	{
		if ($this->input->is_ajax_request()) {

			// $this->_validation();
			if ($this->input->post('inputFooter') != "") {
				$footer = array(
					"teks" => $this->input->post('inputFooter', true)
				);
			} else {
				$footer = array(
					"teks" => ""
				);
			}

			if ($this->input->post('inputVersi') != "") {
				$versi = array(
					"teks" => $this->input->post('inputVersi', true)
				);
			} else {
				$versi = array(
					"teks" => ""
				);
			}

			if ($this->input->post('inputTeksProperti_id') != "") {
				$teks_properti = array(
					"teks" => $this->input->post('inputTeksProperti_id')
				);
			} else {
				$teks_properti = array(
					"teks" => ""
				);
			}

			if ($this->input->post('inputTeksFasilitas_id') != "") {
				$teks_fasilitas = array(
					"teks" => $this->input->post('inputTeksFasilitas_id')
				);
			} else {
				$teks_fasilitas = array(
					"teks" => ""
				);
			}

			if ($this->input->post('inputTeksProperti_en') != "") {
				$teks_properti2 = array(
					"teks" => $this->input->post('inputTeksProperti_en')
				);
			} else {
				$teks_properti2 = array(
					"teks" => ""
				);
			}

			if ($this->input->post('inputTeksFasilitas_en') != "") {
				$teks_fasilitas2 = array(
					"teks" => $this->input->post('inputTeksFasilitas_en')
				);
			} else {
				$teks_fasilitas2 = array(
					"teks" => ""
				);
			}


			// icon
			if (!empty($_FILES['inputIcon']['name'])) {
				$config['upload_path']     = FCPATH . './uploads/images';
				$config['allowed_types']   = 'ico';
				$config['encrypt_name'] = TRUE;

				$this->upload->initialize($config);

				if (strpos($_FILES['inputIcon']['name'], ".php") !== false) {
					$name_file = '';
				} else if (strpos($_FILES['inputIcon']['name'], ".js") !== false) {
					$name_file = '';
				} else if (strpos($_FILES['inputIcon']['name'], ".py") !== false) {
					$name_file = '';
				} else {

					$cekIcon = $this->db->get_where('data_gambar', ['id' => 1])->row_array();
					if (!empty($cekIcon)) {
						if ($cekIcon['nama_file'] != '') {
							$file_before = FCPATH . './uploads/images/' . $cekIcon['nama_file'];
							if (file_exists($file_before)) {
								unlink($file_before);
							}
						}
					}

					if ($this->upload->do_upload('inputIcon')) {
						$name_file = $this->upload->data('file_name');
					} else {
						$name_file = '';
					}
				}
				$file_icon = array(
					'nama_file' => $name_file
				);
			} else {
				if ($this->input->post('inputPath_icon') != "") {
					$path = $this->input->post('inputPath_icon');
				} else {
					$path = "";
				}
				$file_icon = array(
					'nama_file' => $path
				);
			}

			// logo
			if (!empty($_FILES['inputLogo']['name'])) {
				$config['upload_path']     = FCPATH . './uploads/images';
				$config['allowed_types']   = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;

				$this->upload->initialize($config);

				if (strpos($_FILES['inputLogo']['name'], ".php") !== false) {
					$name_file = '';
				} else if (strpos($_FILES['inputLogo']['name'], ".js") !== false) {
					$name_file = '';
				} else if (strpos($_FILES['inputLogo']['name'], ".py") !== false) {
					$name_file = '';
				} else {

					$cekLogo = $this->db->get_where('data_gambar', ['id' => 2])->row_array();
					if (!empty($cekLogo)) {
						if ($cekLogo['nama_file'] != '') {
							$file_before = FCPATH . './uploads/images/' . $cekLogo['nama_file'];
							if (file_exists($file_before)) {
								unlink($file_before);
							}
						}
					}

					if ($this->upload->do_upload('inputLogo')) {
						$name_file = $this->upload->data('file_name');
					} else {
						$name_file = '';
					}
				}
				$file_logo = array(
					'nama_file' => $name_file
				);
			} else {
				if ($this->input->post('inputPath_logo') != "") {
					$path = $this->input->post('inputPath_logo');
				} else {
					$path = "";
				}
				$file_logo = array(
					'nama_file' => $path
				);
			}

			// logo putih
			if (!empty($_FILES['inputLogo_putih']['name'])) {
				$config['upload_path']     = FCPATH . './uploads/images';
				$config['allowed_types']   = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;

				$this->upload->initialize($config);

				if (strpos($_FILES['inputLogo_putih']['name'], ".php") !== false) {
					$name_file = '';
				} else if (strpos($_FILES['inputLogo_putih']['name'], ".js") !== false) {
					$name_file = '';
				} else if (strpos($_FILES['inputLogo_putih']['name'], ".py") !== false) {
					$name_file = '';
				} else {

					$cekLogo_putih = $this->db->get_where('data_gambar', ['id' => 3])->row_array();
					if (!empty($cekLogo_putih)) {
						if ($cekLogo_putih['nama_file'] != '') {
							$file_before = FCPATH . './uploads/images/' . $cekLogo_putih['nama_file'];
							if (file_exists($file_before)) {
								unlink($file_before);
							}
						}
					}

					if ($this->upload->do_upload('inputLogo_putih')) {
						$name_file = $this->upload->data('file_name');
					} else {
						$name_file = '';
					}
				}
				$file_logo_putih = array(
					'nama_file' => $name_file
				);
			} else {
				if ($this->input->post('inputPath_logo_putih') != "") {
					$path = $this->input->post('inputPath_logo_putih');
				} else {
					$path = "";
				}
				$file_logo_putih = array(
					'nama_file' => $path
				);
			}

			// logo perusahaan
			if (!empty($_FILES['inputLogo_perusahaan']['name'])) {
				$config['upload_path']     = FCPATH . './uploads/images';
				$config['allowed_types']   = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;

				$this->upload->initialize($config);

				if (strpos($_FILES['inputLogo_perusahaan']['name'], ".php") !== false) {
					$name_file = '';
				} else if (strpos($_FILES['inputLogo_perusahaan']['name'], ".js") !== false) {
					$name_file = '';
				} else if (strpos($_FILES['inputLogo_perusahaan']['name'], ".py") !== false) {
					$name_file = '';
				} else {

					$cekLogo_perusahaan = $this->db->get_where('data_gambar', ['id' => 4])->row_array();
					if (!empty($cekLogo_perusahaan)) {
						if ($cekLogo_perusahaan['nama_file'] != '') {
							$file_before = FCPATH . './uploads/images/' . $cekLogo_perusahaan['nama_file'];
							if (file_exists($file_before)) {
								unlink($file_before);
							}
						}
					}

					if ($this->upload->do_upload('inputLogo_perusahaan')) {
						$name_file = $this->upload->data('file_name');
					} else {
						$name_file = '';
					}
				}
				$file_logo_perusahaan = array(
					'nama_file' => $name_file
				);
			} else {
				if ($this->input->post('inputPath_logo_perusahaan') != "") {
					$path = $this->input->post('inputPath_logo_perusahaan');
				} else {
					$path = "";
				}
				$file_logo_perusahaan = array(
					'nama_file' => $path
				);
			}



			// bg sec kenapa kami
			if (!empty($_FILES['inputBg_sec_kenapa_kami']['name'])) {
				$config['upload_path']     = FCPATH . './uploads/images';
				$config['allowed_types']   = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;

				$this->upload->initialize($config);

				if (strpos($_FILES['inputBg_sec_kenapa_kami']['name'], ".php") !== false) {
					$name_file = '';
				} else if (strpos($_FILES['inputBg_sec_kenapa_kami']['name'], ".js") !== false) {
					$name_file = '';
				} else if (strpos($_FILES['inputBg_sec_kenapa_kami']['name'], ".py") !== false) {
					$name_file = '';
				} else {

					$cekKenapa_kami = $this->db->get_where('data_gambar', ['id' => 5])->row_array();
					if (!empty($cekKenapa_kami)) {
						if ($cekKenapa_kami['nama_file'] != '') {
							$file_before = FCPATH . './uploads/images/' . $cekKenapa_kami['nama_file'];
							if (file_exists($file_before)) {
								unlink($file_before);
							}
						}
					}

					if ($this->upload->do_upload('inputBg_sec_kenapa_kami')) {
						$name_file = $this->upload->data('file_name');
					} else {
						$name_file = '';
					}
				}
				$file_sec_kenapa_kami = array(
					'nama_file' => $name_file
				);
			} else {
				if ($this->input->post('inputPath_sec_kenapa_kami') != "") {
					$path = $this->input->post('inputPath_sec_kenapa_kami');
				} else {
					$path = "";
				}
				$file_sec_kenapa_kami = array(
					'nama_file' => $path
				);
			}

			// bg sec fasilitas
			if (!empty($_FILES['inputBg_sec_fasilitas']['name'])) {
				$config['upload_path']     = FCPATH . './uploads/images';
				$config['allowed_types']   = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;

				$this->upload->initialize($config);

				if (strpos($_FILES['inputBg_sec_fasilitas']['name'], ".php") !== false) {
					$name_file = '';
				} else if (strpos($_FILES['inputBg_sec_fasilitas']['name'], ".js") !== false) {
					$name_file = '';
				} else if (strpos($_FILES['inputBg_sec_fasilitas']['name'], ".py") !== false) {
					$name_file = '';
				} else {

					$cekFasilitas = $this->db->get_where('data_gambar', ['id' => 6])->row_array();
					if (!empty($cekFasilitas)) {
						if ($cekFasilitas['nama_file'] != '') {
							$file_before = FCPATH . './uploads/images/' . $cekFasilitas['nama_file'];
							if (file_exists($file_before)) {
								unlink($file_before);
							}
						}
					}

					if ($this->upload->do_upload('inputBg_sec_fasilitas')) {
						$name_file = $this->upload->data('file_name');
					} else {
						$name_file = '';
					}
				}
				$file_sec_fasilitas = array(
					'nama_file' => $name_file
				);
			} else {
				if ($this->input->post('inputPath_sec_fasilitas') != "") {
					$path = $this->input->post('inputPath_sec_fasilitas');
				} else {
					$path = "";
				}
				$file_sec_fasilitas = array(
					'nama_file' => $path
				);
			}

			// bg footer
			if (!empty($_FILES['inputBg_footer']['name'])) {
				$config['upload_path']     = FCPATH . './uploads/images';
				$config['allowed_types']   = 'gif|jpg|png|jpeg';
				$config['encrypt_name'] = TRUE;

				$this->upload->initialize($config);

				if (strpos($_FILES['inputBg_footer']['name'], ".php") !== false) {
					$name_file = '';
				} else if (strpos($_FILES['inputBg_footer']['name'], ".js") !== false) {
					$name_file = '';
				} else if (strpos($_FILES['inputBg_footer']['name'], ".py") !== false) {
					$name_file = '';
				} else {

					$cekFooter = $this->db->get_where('data_gambar', ['id' => 7])->row_array();
					if (!empty($cekFooter)) {
						if ($cekFooter['nama_file'] != '') {
							$file_before = FCPATH . './uploads/images/' . $cekFooter['nama_file'];
							if (file_exists($file_before)) {
								unlink($file_before);
							}
						}
					}

					if ($this->upload->do_upload('inputBg_footer')) {
						$name_file = $this->upload->data('file_name');
					} else {
						$name_file = '';
					}
				}
				$file_footer = array(
					'nama_file' => $name_file
				);
			} else {
				if ($this->input->post('inputPath_footer') != "") {
					$path = $this->input->post('inputPath_footer');
				} else {
					$path = "";
				}
				$file_footer = array(
					'nama_file' => $path
				);
			}

			$this->M_pengaturan->edit_icon(1, $file_icon);
			$this->M_pengaturan->edit_logo(2, $file_logo);
			$this->M_pengaturan->edit_logo_putih(3, $file_logo_putih);
			$this->M_pengaturan->edit_logo_perusahaan(4, $file_logo_perusahaan);
			$this->M_pengaturan->edit_sec_kenapa_kami(5, $file_sec_kenapa_kami);
			$this->M_pengaturan->edit_sec_fasilitas(6, $file_sec_fasilitas);
			$this->M_pengaturan->edit_bg_footer(7, $file_footer);

			$this->M_pengaturan->edit_text_footer(1, $footer);
			$this->M_pengaturan->edit_text_versi(2, $versi);
			$this->M_pengaturan->edit_text_properti(3, $teks_properti);
			$this->M_pengaturan->edit_text_fasilitas(4, $teks_fasilitas);
			$this->M_pengaturan->edit_text_properti2(5, $teks_properti2);
			$this->M_pengaturan->edit_text_fasilitas2(6, $teks_fasilitas2);

			$this->session->set_flashdata('berhasil_tambah', 'Berhasil simpan');

			$msg = array('berhasil' => "admins/pengaturan");
			echo json_encode($msg);
		} else {
			$this->load->view('errors/forbidden');
		}
	}
}
