<?php

function cek_login()
{
	$cek = &get_instance();
	$session = $cek->session->userdata('username');
	$id_user = $cek->session->userdata('id');
	$cekIdUser = $cek->db->get_where('login_session', ['id_user' => $id_user, 'id_session' => $cek->session->session_id])->row_array();
	if (!$session || empty($cekIdUser)) {

		if ($session) {
			$cek->session->unset_userdata('id');
			$cek->session->unset_userdata('username');
			$cek->session->unset_userdata('name');
			$cek->session->unset_userdata('role');
			$cek->session->sess_destroy();
		}

		$cek->session->set_flashdata('belum_login', 'Anda Belum Login!');
		redirect('login_admin');
	}
}
function cek_login_user()
{
	$cek = &get_instance();
	$session = $cek->session->userdata('role') == 1;
	if (!$session) {
		$cek->session->set_flashdata('belum_login', 'Anda Belum Login!');
		redirect('login_admin');
	}
}
