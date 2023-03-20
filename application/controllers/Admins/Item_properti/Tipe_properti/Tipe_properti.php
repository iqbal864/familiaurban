<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tipe_properti extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('M_tipe_properti');
	}

	public function index()
	{
		$data_properti = $this->db->get_where('properti', ['slug_id' => $this->uri->segment(4)])->row_array();
		if ($data_properti == 0) {
			redirect(base_url('admins/item_properti'));
		} else if (empty($this->uri->segment(4))) {
			redirect(base_url('admins/item_properti'));
		} else {

			$data['properti'] = $data_properti;

			$data['title'] = "Item Properti";
			$data['title2'] = "Tipe Properti "  . htmlentities($data_properti['name_id']);
			$this->load->view('templates/header_admin', $data);
			$this->load->view('admin/item_properti/tipe_properti/v_tipe_properti', $data);
			$this->load->view('templates/footer_admin');
		}
	}

	public function get_list_tipe()
	{
		if ($this->input->is_ajax_request()) {

			$id_properti = $this->input->post('properti');
			$data_properti = $this->db->get_where('properti', ['id' => $id_properti])->row_array();

			$list = $this->M_tipe_properti->get_list($id_properti);
			$count_filter = $this->M_tipe_properti->count_filtered($id_properti);

			$data = array();
			$no = @$_POST['start'];
			foreach ($list as $item) {
				$no++;
				$row = array();
				$row[] = $no . ".";
				$row[] = htmlentities($item->name_id);
				// add html for action
				$row[] = '<a href="' . base_url("admins/item_properti/tipe_properti/" . $data_properti['slug_id'] . "/edit/$item->id") . '" class="btn btn-warning btn-xs text-white"><i class="fas fa-edit"></i></a>
                <a href="' . base_url("admins/item_properti/tipe_properti/" . $data_properti['slug_id'] . "/spesifikasi/$item->id") . '" class="btn btn-info btn-xs text-white"><i class="fas fa-th-list"></i></a>
                <a href="' . base_url("admins/item_properti/tipe_properti/" . $data_properti['slug_id'] . "/gambar/$item->id") . '" class="btn btn-xs btn-dark text-white"><i class="fas fa-image"></i></a>
                        <a onclick="hapus_tipe(' . $item->id . ',' . $this->db->escape(htmlentities($item->name_id)) . ')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>';
				$data[] = $row;
			}
			$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->M_tipe_properti->count_all($id_properti),
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
		$name = htmlentities($this->input->post('name_id'));

		$data_tipe_properti = $this->db->get_where('tipe_properti', ['id' => $id])->row_array();

		$this->M_tipe_properti->hapus_spesifikasi($id);
		$this->M_tipe_properti->hapus_spesifikasi_tambahan($id);
		$this->M_tipe_properti->hapus_ukuran($id);
		$this->M_tipe_properti->hapus_tipe_properti($id);

		if ($data_tipe_properti['denah'] != '') {
			$file_before = FCPATH . './uploads/images/properti/tipe/' . $data_tipe_properti['denah'];
			if (file_exists($file_before)) {
				unlink($file_before);
			}
		}

		$pesan = $name . " sudah dihapus";
		$msg = array('berhasil' => $pesan);
		echo json_encode($msg);
	}
}
