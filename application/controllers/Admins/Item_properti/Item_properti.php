<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Item_properti extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('M_properti');
	}

	public function index()
	{
		$data['title'] = "Item Properti";
		$this->load->view('templates/header_admin', $data);
		$this->load->view('admin/item_properti/v_item_properti', $data);
		$this->load->view('templates/footer_admin');
	}

	public function get_list_properti()
	{
		if ($this->input->is_ajax_request()) {
			$list = $this->M_properti->get_list();
			$count_filter = $this->M_properti->count_filtered();

			$data = array();
			$no = @$_POST['start'];
			foreach ($list as $item) {
				$no++;
				$row = array();
				$row[] = $no . ".";
				$row[] = '<a href="' . base_url('admins/item_properti/tipe_properti/' . $item->slug_id) . '" class="">' . htmlentities($item->name_id) . '</a>';
				$row[] = htmlentities($item->kategori_name_id) . ' / ' . htmlentities($item->kategori_name_en);
				$row[] = htmlentities($item->meta_id);
				$row[] = $item->slug_id;
				// $row[] = $item->nama_file;
				$row[] = $item->nama_file != null ? '<img src="' . base_url('uploads/images/properti/' . $item->nama_file) . '" class="img" style="width:100px">' : null;
				// add html for action
				$row[] = '<a href="' . base_url('admins/item_properti/edit/' . $item->slug_id) . '" class="btn btn-warning btn-xs text-white"><i class="fas fa-edit"></i></a>
                <a href="' . base_url('admins/item_properti/file/' .  $item->slug_id) . '" class="btn btn-xs btn-success text-white"><i class="fas fa-file"></i></a>
                        <a onclick="hapus_properti(' . $item->id . ',' . $this->db->escape(htmlentities($item->name_id)) . ')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>';
				$data[] = $row;
			}
			$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->M_properti->count_all(),
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

		$data_properti = $this->db->get_where('properti', ['id' => $id])->row_array();

		$this->M_properti->hapus_fitur_properti($id);
		$this->M_properti->hapus_properti($id);

		if ($data_properti['nama_file'] != '') {
			$file_before = FCPATH . './uploads/images/properti/' . $data_properti['nama_file'];
			if (file_exists($file_before)) {
				unlink($file_before);
			}
		}
		$pesan = $name . " sudah dihapus";
		$msg = array('berhasil' => $pesan);
		echo json_encode($msg);
	}
}
