<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
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
		$id_pengguna = $this->session->userdata('id');
		$data['pengguna'] = $this->db->query("SELECT * FROM pengguna WHERE id != '$id_pengguna'")->result_array();

		$data['title'] = "Pengguna";
		$this->load->view('templates/header_admin', $data);
		$this->load->view('admin/pengguna/v_pengguna', $data);
		$this->load->view('templates/footer_admin');
	}

	function get_list_pengguna()
	{
		if ($this->input->is_ajax_request()) {
			$id_pengguna = $this->session->userdata('id');
			$list = $this->M_pengguna->get_list($id_pengguna);
			$count_filter = $this->M_pengguna->count_filtered($id_pengguna);

			$data = array();
			$no = @$_POST['start'];
			foreach ($list as $item) {
				$no++;
				$row = array();
				$row[] = $no . ".";
				$row[] = $item->username;
				$row[] = $item->name;
				$row[] = $item->role;
				$row[] = '<a href="' . base_url('admins/pengguna/edit/' . $item->id) . '" class="btn btn-warning btn-xs text-white"><i class="fas fa-edit"></i></a>
                        <a onclick="hapus_pengguna(' . $item->id . ',' . $this->db->escape($item->name) . ')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>';
				$data[] = $row;
			}
			$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->M_pengguna->count_all($id_pengguna),
				"recordsFiltered" => $count_filter,
				"data" => $data,
			);
			// output to json format
			echo json_encode($output);
		} else {
			$this->load->view('templates/forbidden');
		}
	}

	function hapus()
	{
		$id = htmlentities($this->input->post('id'));
		$name = htmlentities($this->input->post('name'));

		$this->M_pengguna->hapus_pengguna($id);

		$pesan = $name . " sudah dihapus";
		$msg = array('berhasil' => $pesan);
		echo json_encode($msg);
	}
}
