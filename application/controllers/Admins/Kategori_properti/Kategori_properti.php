<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_properti extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_login();
		$this->load->model('M_kategori');
	}

	public function index()
	{
		$data['title'] = "Kategori Properti";
		$this->load->view('templates/header_admin', $data);
		$this->load->view('admin/kategori_properti/v_kategori_properti', $data);
		$this->load->view('templates/footer_admin');
	}

	public function kategori_list()
	{

		$list = $this->load->model('M_kategori')->get_list();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $supplier) {
			$no++;
			$row = array();
			$row[] = '<input type="checkbox" class="data-check" value="' . $supplier->id_supplier . '">';
			$row[] = $supplier->nama_perusahaan;
			$row[] = $supplier->alamat;
			$row[] = $supplier->nama_sales;
			$row[] = $supplier->telp;
			$row[] = $supplier->email;

			//add html for action
			$row[] = '<a class="btn btn-success btn-rounded btn-sm" href="javascript:void(0)" title="Edit data" onclick="edit_supplier(' . "'" . $supplier->id_supplier . "'" . ')"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a class="btn btn-danger btn-rounded btn-sm" href="javascript:void(0)" title="Hapus" onclick="delete_supplier(' . "'" . $supplier->id_supplier . "'" . ')"><span class="glyphicon glyphicon-trash"></span></a>';

			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->supplier->count_all(),
			"recordsFiltered" => $this->supplier->count_filtered(),
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	function get_list_kategori()
	{
		if ($this->input->is_ajax_request()) {
			$list = $this->M_kategori->get_list();
			$count_filter = $this->M_kategori->count_filtered();

			$data = array();
			$no = @$_POST['start'];
			foreach ($list as $item) {
				$no++;
				$row = array();
				$row[] = $no . ".";
				$row[] = htmlentities($item->name_id);
				$row[] = htmlentities($item->meta_id);
				$row[] = $item->slug_id;
				// $row[] = $item->nama_file;
				$row[] = $item->nama_file != null ? '<img src="' . base_url('uploads/images/kategori/' . $item->nama_file) . '" class="img" style="width:100px">' : null;
				// add html for action
				$row[] = '<a href="' . base_url('admins/kategori_properti/edit/' . $item->slug_id) . '" class="btn btn-warning btn-xs text-white"><i class="fas fa-edit"></i></a>
                        <a onclick="hapus_kategori(' . $item->id . ',' . $this->db->escape(htmlentities($item->name_id)) . ')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>';
				$data[] = $row;
			}
			$output = array(
				"draw" => @$_POST['draw'],
				"recordsTotal" => $this->M_kategori->count_all(),
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

		$data_kategori = $this->db->get_where('kategori', ['id' => $id])->row_array();

		$this->M_kategori->hapus_kategori($id);

		if ($data_kategori['nama_file'] != '') {
			$file_before = FCPATH . './uploads/images/kategori/' . $data_kategori['nama_file'];
			if (file_exists($file_before)) {
				unlink($file_before);
			}
		}

		$pesan = $name . " sudah dihapus";
		$msg = array('berhasil' => $pesan);
		echo json_encode($msg);
	}
}
