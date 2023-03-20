<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admins extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		cek_login();
	}


	public function index()
	{

		$data['tahun'] = date('Y');
		$data['title'] = "Dashboard";

		$date  = date("Y-m-d");

		$pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='" . $date . "' GROUP BY ip")->num_rows();

		$dbpengunjung = $this->db->query("SELECT COUNT(hit) as hit FROM visitor")->row();

		$totalpengunjung = isset($dbpengunjung->hits) ? ($dbpengunjung->hit) : 0;

		$bataswaktu = time() - 300;

		$pengunjungonline  = $this->db->query("SELECT * FROM visitor WHERE online > '" . $bataswaktu . "'")->num_rows();


		$data['pengunjunghariini'] = $pengunjunghariini;
		$data['totalpengunjung'] = $totalpengunjung;
		$data['pengunjungonline'] = $pengunjungonline;

		$this->load->view('templates/header_admin', $data);
		$this->load->view('admin/dashboard/v_dashboard', $data);
		$this->load->view('templates/footer_admin');
	}

	public function get_curva()
	{
		if ($this->input->is_ajax_request()) {
			if (empty($this->input->get('tahun'))) {
				$tahun = date("Y");
				$data['tahun'] = date("Y");
			} else {
				$tahun = htmlentities($this->input->get('tahun'), ENT_QUOTES);
				$data['tahun'] = htmlentities($this->input->get('tahun'), ENT_QUOTES);
			}

			$data['visitor'] = $this->db->query("SELECT Year(`date`), Month(`date`), Count(*) As total
												FROM visitor WHERE Year(`date`) = '$tahun' 
												GROUP BY Year(`date`), Month(`date`)")->result_array();

			$hasil = [
				'hasil' => $this->load->view('admin/dashboard/data_chart', $data, true)
			];

			echo json_encode($hasil);
		} else {
			$this->load->view('templates/forbidden');
		}
	}
}
