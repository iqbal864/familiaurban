<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>

	<?php $icon = $this->db->get_where('data_gambar', ['id' => 1])->row_array(); ?>
	<link rel="icon" href="<?= base_url() ?>uploads/images/<?= $icon['nama_file'] ?>">

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/adminlte/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bootstrap 4 -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- Bootstrap-Iconpicker -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/icon-picker/dist/css/bootstrap-iconpicker.min.css" />
	<!-- iCheck -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<!-- <link rel="stylesheet" href="<?= base_url() ?>vendor/adminlte/plugins/jqvmap/jqvmap.min.css"> -->
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/adminlte/dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/adminlte/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/adminlte/plugins/summernote/summernote-bs4.min.css">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap4.min.css">

	<link href="<?= base_url() ?>vendor/tagify-master/dist/tagify.css" rel="stylesheet">

	<!-- jQuery -->
	<script src="<?= base_url() ?>vendor/adminlte/plugins/jquery/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap4.min.js"></script>

	<script type="text/javascript" src="https://code.highcharts.com/stock/highstock.js"></script>
	<script src="https://code.highcharts.com/highcharts-more.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>
	<script src="https://code.highcharts.com/modules/accessibility.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
	<div class="wrapper">

		<!-- Preloader -->
		<div class="preloader flex-column justify-content-center align-items-center">
			<?php $logo_tkpp = $this->db->get_where('data_gambar', ['id' => 4])->row_array(); ?>
			<img style="width: 250px;" class="animation__shake" src="<?= base_url() ?>uploads/images/<?= $logo_tkpp['nama_file'] ?>" alt="LogoTkpp">
		</div>

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbasr-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" style="text-decoration: none; color:black;" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>

			<!-- Right navbar links -->
			<!-- <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul> -->
			<ul class="navbar-nav ml-auto">
				<!-- Messages Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#" style="text-decoration: none; color:black;">
						<i class="far fa-user"></i>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<div class="dropdown-divider"></div>
						<a href="#" class="dropdown-item">
							<!-- Message Start -->
							<div class="media">
								<img src="<?= base_url(); ?>assets/images/user.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
								<div class="media-body">
									<h3 class="dropdown-item-title">
										<?= $this->session->userdata('name') ?>
										<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
									</h3>
									<?php $queryCekRole = $this->db->get_where('role', ['id' => $this->session->userdata('role')])->row_array();  ?>
									<p class="text-sm"><?= $queryCekRole['role'] ?></p>
								</div>
							</div>
							<!-- Message End -->
						</a>
						<div class="dropdown-divider"></div>
						<a href="<?= base_url() ?>admins/lupa_password" class="dropdown-item dropdown-footer">Ubah Password</a>
						<div class="dropdown-divider"></div>
						<a href="<?= base_url() ?>login_admin/logout" class="dropdown-item dropdown-footer">Logout</a>
					</div>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
						<i class="fas fa-th-large"></i>
					</a>
				</li> -->
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="<?= base_url() ?>" class="brand-link">
				<img src="<?= base_url() ?>assets/images/logo-tkpp-putih-crop1.png" alt="AdminLTE Logo" class="brand-image mt-1" style="opacity: .8">
				<img class="brand-text mt-1" style="width: 160px;" src="<?= base_url() ?>assets/images/logo-tkpp-putih-crop2.png">
			</a>

			<!-- Sidebar -->
			<div class="sidebar" id="sidebar">
				<!-- Sidebar user panel (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?= base_url() ?>assets/images/user.jpg" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block"><?= $this->session->userdata('name') ?></a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
						<li class="nav-item">
							<a href="<?= base_url() ?>admins/admins" class="nav-link <?= ($title == 'Dashboard') ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
						<li class="nav-item menu-open">
							<a href="#" class="nav-link <?= ($title == 'Banner Promo' || $title == 'Kategori Properti' || $title == 'Item Properti') ? 'active' : ''; ?>">
								<i class="nav-icon fas fa-table"></i>
								<p>
									Properti
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?= base_url() ?>admins/kategori_properti" class="nav-link <?= ($title == 'Kategori Properti') ? 'active' : ''; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Kategori Properti</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url() ?>admins/item_properti" class=" nav-link <?= ($title == 'Item Properti') ? 'active' : ''; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Item Properti</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?= base_url() ?>admins/banner" class=" nav-link <?= ($title == 'Banner Promo') ? 'active' : ''; ?>">
										<i class="far fa-circle nav-icon"></i>
										<p>Banner Promo</p>
									</a>
								</li>
							</ul>
						</li>
						<?php if ($this->session->userdata('id') == 1) : ?>
							<li class="nav-item menu-open">
								<a href="#" class="nav-link <?= ($title == 'Konsep' || $title == 'Kenapa Kami' || $title == 'Alamat' || $title == 'Fasilitas' || $title == 'Kerja Sama Bank' || $title == 'Sosial Media' || $title == 'Kontak' || $title == 'Pengaturan' || $title == 'Testimoni')  ? 'active' : ''; ?>">
									<i class="nav-icon fas fa-table"></i>
									<p>
										Konfigurasi Web
										<i class="fas fa-angle-left right"></i>
									</p>
								</a>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url() ?>admins/konsep" class="nav-link  <?= ($title == 'Konsep') ? 'active' : ''; ?>">
											<i class="far fa-circle nav-icon"></i>
											<p>Konsep</p>
										</a>
									</li>
								</ul>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url() ?>admins/kenapa_kami" class="nav-link <?= ($title == 'Kenapa Kami') ? 'active' : ''; ?>">
											<i class="far fa-circle nav-icon"></i>
											<p>Kenapa Kami</p>
										</a>
									</li>
								</ul>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url() ?>admins/fasilitas" class="nav-link <?= ($title == 'Fasilitas') ? 'active' : ''; ?>">
											<i class="far fa-circle nav-icon"></i>
											<p>Fasilitas</p>
										</a>
									</li>
								</ul>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url() ?>admins/alamat" class="nav-link <?= ($title == 'Alamat') ? 'active' : ''; ?>">
											<i class="far fa-circle nav-icon"></i>
											<p>Alamat</p>
										</a>
									</li>
								</ul>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url() ?>admins/kerja_sama" class="nav-link <?= ($title == 'Kerja Sama Bank') ? 'active' : ''; ?>">
											<i class="far fa-circle nav-icon"></i>
											<p>Kerja Sama Bank</p>
										</a>
									</li>
								</ul>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url() ?>admins/sosial_media" class="nav-link <?= ($title == 'Sosial Media') ? 'active' : ''; ?>">
											<i class="far fa-circle nav-icon"></i>
											<p>Sosial Media</p>
										</a>
									</li>
								</ul>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url() ?>admins/testimoni" class="nav-link <?= ($title == 'Testimoni') ? 'active' : ''; ?>">
											<i class="far fa-circle nav-icon"></i>
											<p>Testimoni</p>
										</a>
									</li>
								</ul>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url() ?>admins/kontak" class="nav-link <?= ($title == 'Kontak') ? 'active' : ''; ?>">
											<i class="far fa-circle nav-icon"></i>
											<p>Kontak</p>
										</a>
									</li>
								</ul>
								<ul class="nav nav-treeview">
									<li class="nav-item">
										<a href="<?= base_url() ?>admins/pengaturan" class="nav-link <?= ($title == 'Pengaturan') ? 'active' : ''; ?>">
											<i class="far fa-circle nav-icon"></i>
											<p>Pengaturan</p>
										</a>
									</li>
								</ul>
							</li>
							<li class="nav-item">
								<a href="<?= base_url() ?>admins/pengguna" class="nav-link <?= ($title == 'Pengguna') ? 'active' : ''; ?>">
									<i class="nav-icon fas fa-user-alt"></i>
									<p>
										Pengguna
									</p>
								</a>
							</li>
						<?php endif; ?>
						<li class="nav-item mb-5">
							<a href="<?= base_url() ?>login_admin/logout" class="nav-link">
								<i class="nav-icon fas fa-sign-out-alt"></i>
								<p>
									Logout
								</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>
