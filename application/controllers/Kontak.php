<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontak extends CI_Controller
{

	public function index()
	{
		if (get_cookie('lang_is') === 'en') {
			$data['keyword'] = "real estate, familia urban, contact";
			$data['desc'] = "For more information, please send a message via the contact form";
			$data['title'] = "Contact Us | Familia Urban";
			$data['home'] = "Home";
			$data['title_konsep'] = "Concept";
			$data['title_lokasi'] = "Location";
			$data['title_properti'] = "Property";
			$data['title_galeri'] = "Gallery";
			$data['title_testimoni'] = "Testimony";
			$data['title_kontak_kami'] = "Contact Us";
			$data['title_kenapa_kami'] = "Why Us";
			$data['title_fasilitas'] = "Supporting Facilities";
			$data['title_download'] = "Download E-Brochure";
			$data['title_sosmed'] = "Social Media";
			$data['title_lihat_semua'] = "See more";
			$data['title_scroll'] = "SCROLL DOWN";
			$data['title_hubungi'] = "Contact Now";
			$data['title_hubungi_marketing'] = "Contact Us";
			$data['title_nama'] = "Name";
			$data['title_email'] = "Email";
			$data['title_subjek'] = "Subject";
			$data['title_no_telp'] = "Phone Number";
			$data['title_pesan'] = "Type Message";
			$data['title_kirim_pesan'] = "Send Message";
			$data['title_informasi_kontak'] = "Contact Information";
			$data['title_lihat_maps'] = "Open Google Maps";

			$data['subjek_email'] = $this->db->query('SELECT subjek_en as subjek, id FROM subjek_email')->result_array();
		} else {
			$data['keyword'] = "timah properti, familia urban, kontak";
			$data['desc'] = "Untuk informasi lebih lanjut, silahkan kirim pesan melalui form kontak";
			$data['title'] = "Kontak Kami | Familia Urban";
			$data['home'] = "Home";
			$data['title_konsep'] = "Konsep";
			$data['title_lokasi'] = "Lokasi";
			$data['title_properti'] = "Properti";
			$data['title_galeri'] = "Galeri";
			$data['title_testimoni'] = "Testimoni";
			$data['title_kontak_kami'] = "Kontak Kami";
			$data['title_kenapa_kami'] = "Kenapa Kami";
			$data['title_fasilitas'] = "Fasilitas Pendukung";
			$data['title_download'] = "Unduh E-Brosur";
			$data['title_sosmed'] = "Sosial Media";
			$data['title_lihat_semua'] = "Lihat semua";
			$data['title_scroll'] = "GULIR KE BAWAH";
			$data['title_hubungi'] = "Hubungi Kami";
			$data['title_hubungi_marketing'] = "Hubungi Marketing";
			$data['title_nama'] = "Nama";
			$data['title_email'] = "Email";
			$data['title_subjek'] = "Subjek";
			$data['title_no_telp'] = "No. Hp";
			$data['title_pesan'] = "Ketik Pesan";
			$data['title_kirim_pesan'] = "Kirim Pesan";
			$data['title_informasi_kontak'] = "Informasi Kontak";
			$data['title_lihat_maps'] = "Buka Google Maps";

			$data['subjek_email'] = $this->db->query('SELECT subjek_id as subjek, id FROM subjek_email')->result_array();
		}

		$data['banner'] = $this->db->get_where('banner_promo')->result_array();

		if (get_cookie('lang_is') === 'en') {
			$data['list_kategori'] = $this->db->query('SELECT name_en as nama, slug_en as slug FROM kategori')->result_array();
		} else {
			$data['list_kategori'] = $this->db->query('SELECT name_id as nama, slug_id as slug FROM kategori')->result_array();
		}

		$data['konsep'] = $this->db->get_where('konsep')->row_array();

		if (get_cookie('lang_is') === 'en') {
			$data['desc_konsep'] = $this->db->query('SELECT desc_en as description FROM konsep')->row_array();
		} else {
			$data['desc_konsep'] = $this->db->query('SELECT desc_id as description FROM konsep')->row_array();
		}


		$data['img_kenapa_kami'] = $this->db->get_where('gambar_kenapa_kami')->result_array();

		if (get_cookie('lang_is') === 'en') {
			$data['kenapa_kami'] = $this->db->query('SELECT data_list_en as data_list FROM kenapa_kami')->result_array();
		} else {
			$data['kenapa_kami'] = $this->db->query('SELECT data_list_id as data_list FROM kenapa_kami')->result_array();
		}

		$data['alamat'] = $this->db->get_where('alamat')->row_array();

		if (get_cookie('lang_is') === 'en') {
			$data['properti'] = $this->db->query('SELECT properti.name_en as name_properti, alamat, properti.slug_en as slug, properti.nama_file as nama_file, kategori.name_en as name_kategori, kategori.slug_en as slug_kategori FROM properti JOIN kategori ON properti.id_kategori = kategori.id LIMIT 4')->result_array();
		} else {
			$data['properti'] = $this->db->query('SELECT properti.name_id as name_properti, alamat, properti.slug_id as slug, properti.nama_file as nama_file, kategori.name_id as name_kategori, kategori.slug_id as slug_kategori FROM properti JOIN kategori ON properti.id_kategori = kategori.id LIMIT 4')->result_array();
		}

		$data['icon'] = $this->db->get_where('data_gambar', ['id' => 1])->row_array();
		$data['logo'] = $this->db->get_where('data_gambar', ['id' => 2])->row_array();
		$data['logo_putih'] = $this->db->get_where('data_gambar', ['id' => 3])->row_array();
		$data['logo_perusahaan'] = $this->db->get_where('data_gambar', ['id' => 4])->row_array();
		$data['sec_kenapa_kami'] = $this->db->get_where('data_gambar', ['id' => 5])->row_array();
		$data['sec_fasilitas'] = $this->db->get_where('data_gambar', ['id' => 6])->row_array();
		$data['bg_footer'] = $this->db->get_where('data_gambar', ['id' => 7])->row_array();

		$data['kerja_sama_bank'] = $this->db->get_where('kerja_sama_bank')->result_array();
		$data['sosial_media'] = $this->db->get_where('sosial_media')->result_array();

		$data['teks_footer'] = $this->db->get_where('data_teks', ['id' => 1])->row_array();
		$data['teks_properti'] = $this->db->get_where('data_teks', ['id' => 3])->row_array();
		$data['teks_fasilitas'] = $this->db->get_where('data_teks', ['id' => 4])->row_array();

		$data['data_subjek'] = $this->db->get_where('subjek_email')->result_array();

		$data['kontak'] = $this->db->get_where('kontak')->row_array();

		$this->load->view('templates/header', $data);
		$this->load->view('v_kontak', $data);
		$this->load->view('templates/footer', $data);
	}

	public function kontak_kami()
	{
		$this->load->model('M_kontak');
		$this->load->library('email');
		$queryGetAlamat = $this->db->get_where('alamat')->row_array();
		$queryGetKontak = $this->db->get_where('kontak')->row_array();
		if ($this->input->post("name") != "") {
			//grab semua data
			$nama = $this->input->post("name");
			$email = $this->input->post("email");
			$subjek = $this->db->escape($this->input->post("subjek"));
			$no_hp = $this->input->post("no_hp");
			$pesan = $this->input->post("comment");

			$queryGetSubjek = $this->db->query("SELECT * FROM subjek_email WHERE id = $subjek")->row_array();

			if ($queryGetSubjek) {
				//cek apakah captcha telah terisi
				if ($this->input->post("g-recaptcha-response") != "") {
					//jika captcha telah terisi jalankan blok ini

					//masukan secret key disini
					$secretKey = "6LdWhiEkAAAAADln-RaJ4uqM9PQ_WX5oyFrrdvIc";
					$captcha = $this->input->post("g-recaptcha-response");
					// $respond = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha");

					// $hasil = json_decode($respond, true);

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
					//jika jawaban sudah benar, jalankan blok ini
					// //memasukan data ke database
					// $query = $pdo->prepare("INSERT INTO kotak_masuk (nama,email,pesan) VALUES('$nama','$email','$pesan')");
					// $query->execute();

					$config['protocol'] = 'smtp';
					$config['smtp_host'] = 'ssl://fmail.pttimah.co.id';
					$config['smtp_port'] = 465;
					$config['smtp_user'] = 'smtp.timah@pttimah.co.id';
					$config['smtp_pass'] = 'P@ssw0rd123';
					$config['mailtype'] = 'html';
					$config['newline'] = "\r\n";

					$this->email->initialize($config);

					$this->email->from('no-reply@familiaurban.com', 'Website Familia Urban');

					$content = array(
						'nama' => $nama,
						'alamat' => $queryGetAlamat,
						'kontak' => $queryGetKontak
					);

					if (get_cookie('lang_is') === 'en') {
						$body = $this->load->view('email_template2', $content, TRUE);
					} else {
						$body = $this->load->view('email_template1', $content, TRUE);
					}

					$this->email->to($email);
					$this->email->subject("Familia Urban");

					$this->email->message($body);

					if ($this->email->send()) {
						$config['protocol'] = 'smtp';
						$config['smtp_host'] = 'ssl://fmail.pttimah.co.id';
						$config['smtp_port'] = 465;
						$config['smtp_user'] = 'smtp.timah@pttimah.co.id';
						$config['smtp_pass'] = 'P@ssw0rd123';
						$config['mailtype'] = 'html';
						$config['newline'] = "\r\n";

						$this->email->initialize($config);

						$this->email->from($email, $nama);

						$content = array(
							'nama' => $nama,
							'no_hp' => $no_hp,
							'pesan' => $pesan
						);

						$list_cc = explode(",", $queryGetSubjek['cc']);
						if (get_cookie('lang_is') === 'en') {
							$sub = $queryGetSubjek['subjek_en'];
						} else {
							$sub = $queryGetSubjek['subjek_id'];
						}

						$body = $this->load->view('email_template3', $content, TRUE);

						$this->email->to($queryGetKontak['email']);
						$this->email->cc($list_cc);
						$this->email->subject($sub);

						$this->email->message($body);

						if ($this->email->send()) {
							$this->M_kontak->pesan($queryGetSubjek['id'], $this->db->escape($nama), $no_hp, $email, $this->db->escape($pesan));
						}
					}

					if (get_cookie('lang_is') === 'en') {
						echo json_encode(array(
							"status" => "berhasil",
							"pesan" => "Thank you for sending the message"
						));
					} else {
						echo json_encode(array(
							"status" => "berhasil",
							"pesan" => "Terima Kasih telah mengirimkan pesan"
						));
					}
					} else {
						if (get_cookie('lang_is') === 'en') {
							echo json_encode(array(
								"status" => "error",
								"pesan" => "You entered the wrong captcha"
							));
						} else {
							echo json_encode(array(
								"status" => "error",
								"pesan" => "Anda memasukan captcha yang salah"
							));
						}
					}
				} else {
					if (get_cookie('lang_is') === 'en') {
						echo json_encode(array(
							"status" => "error",
							"pesan" => "Captcha is not filled"
						));
					} else {
						echo json_encode(array(
							"status" => "error",
							"pesan" => "Captcha belum terisi"
						));
					}
				}
			} else {
				if (get_cookie('lang_is') === 'en') {
					echo json_encode(array(
						"status" => "error",
						"pesan" => "Subject not listed"
					));
				} else {
					echo json_encode(array(
						"status" => "error",
						"pesan" => "Subjek tidak terdaftar"
					));
				}
			}
		}
	}
}
