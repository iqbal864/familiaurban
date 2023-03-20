<!DOCTYPE html>
<html class="no-js" lang="ZXX">

<head>
	<!-- Meta Tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="<?= $keyword ?>">
	<meta name="description" content="<?= trim(strip_tags($desc)) ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=1.0, user-scalable=no" />

	<!-- Site Title -->
	<title><?= $title ?></title>

	<!-- Fav Icon -->
	<link rel="icon" href="<?= base_url() ?>uploads/images/<?= $icon['nama_file'] ?>">

	<!-- Google Font -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@600;700&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

	<!-- Bootstrap -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/immolax/css/bootstrap.min.css">
	<!-- Cube Portfolio -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/immolax/css/cube-portfolio.min.css">
	<!-- Maginific Popup -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/immolax/css/maginific-popup.min.css">
	<!-- Jquery UI -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/immolax/css/jquery-ui.min.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/immolax/css/animate.min.css">
	<!-- Slickslider CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/immolax/css/slickslider.min.css">
	<!-- Bx Slider CSS -->
	<!-- <link rel="stylesheet" href="<?= base_url() ?>vendor/immolax/css/bx-slider.min.css"> -->
	<!-- AOS CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/immolax/css/aos.min.css">
	<!-- Nice Select -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/immolax/css/nice-select.min.css">
	<!-- Datepicker CSS -->
	<!-- <link rel="stylesheet" href="<?= base_url() ?>vendor/immolax/css/datepicker.css"> -->
	<!-- Fontawesome -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/immolax/css/all.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>vendor/immolax/css/fontawesome.min.css">

	<!-- Main CSS -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/immolax/css/reset.css">
	<link rel="stylesheet" href="<?= base_url() ?>vendor/immolax/style.css">
	<link rel="stylesheet" href="<?= base_url() ?>vendor/immolax/css/responsive.css">

	<!-- Jquery JS -->
	<script src="<?= base_url() ?>vendor/immolax/js/jquery.min.js"></script>
	<script src="<?= base_url() ?>assets/js/parallax/dist/jquery.paroller.js"></script>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css">
	<script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

	<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	<!-- Google Map JS -->
	<script async src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyWUTyniPYmZIsxd-uw6upeUA4rmrVj1s&callback=map"></script>
	<script src="<?= base_url() ?>vendor/immolax/js/gmap.min.js"></script>

	<!-- <script src='https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit' async defer></script> -->

	<script src="https://www.google.com/recaptcha/api.js" async defer></script>


	<!-- <script src="https://www.google.com/recaptcha/api.js?render=6Ld3GSEkAAAAACiu4CyFg0TkS_8S_f00rqyp16Dr"></script> -->

	<!-- <script src="<?= base_url() ?>vendor/immolax/js/map-script.js"></script> -->
</head>

<body>

	<?php
	$ip = $this->input->ip_address();
	$date = date("Y-m-d");
	$waktu = time();
	$timeinsert = date("Y-m-d H:i:s");

	$s = $this->db->query("SELECT * FROM visitor WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
	$ss = isset($s) ? ($s) : 0;

	if ($ss == 0) {
		$this->db->query("INSERT INTO visitor(ip, date, hit, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
	} else {
		$this->db->query("UPDATE visitor SET hit=hit+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
	}

	?>

	<!--[if IE]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!-- Preloader -->
	<div class="preloader fewf">
		<div class="loading">
			<div class="loader-line"></div>
			<div class="loader-line"></div>
			<div class="loader-line"></div>
			<div class="loader-line"></div>
			<div class="loader-line"></div>
			<div class="loader-line"></div>
			<div class="loader-line"></div>
			<div class="loader-line"></div>
		</div>
	</div>
	<!-- End Preloader -->

	<!-- Mobile Menu Modal -->
	<div class="modal offcanvas-modal fade" id="offcanvas-modal">
		<div class="modal-dialog offcanvas-dialog">
			<div class="modal-content">
				<div class="modal-header offcanvas-header">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<!-- offcanvas-menu start -->
				<nav id="offcanvas-menu" class="offcanvas-menu">
					<ul class="list-none">
						<li class=""><a href="<?= base_url() ?>#"><?= $home ?></a></li>
						<li><a href=" <?= base_url() ?>#sec-konsep"><?= $title_konsep ?></a></li>
						<li><a href="<?= base_url() ?>#sec-lokasi"><?= $title_lokasi ?></a></li>
						<li class="menu-arrow"><a href="#"><?= $title_properti ?></a>
							<ul class="sub-menu">
								<?php if (sizeof($list_kategori) != 0) : ?>
									<?php foreach ($list_kategori as $lk) : ?>
										<li><a href="<?= base_url() ?>properti/<?= $lk['slug'] ?>"><?= $lk['nama'] ?></a></li>
									<?php endforeach; ?>
								<?php endif; ?>
							</ul>
						</li>
						<li><a href="<?= base_url() ?>galeri"><?= $title_galeri ?></a></li>
						<li><a href="<?= base_url() ?>testimoni"><?= $title_testimoni ?></a></li>
						<li><a href="<?= base_url() ?>kontak"><?= $title_kontak_kami ?></a></li>
						<li class="menu-arrow"><a href="#"><i class="fa fa-globe"></i> <?= (get_cookie('lang_is') == 'id') ? 'ID' : 'EN' ?></a>
							<ul class="sub-menu">
								<li class=""><a href="<?= base_url('lang/set_to/indonesia'); ?>">ID</a></li>
								<li class=""><a href="<?= base_url('lang/set_to/english'); ?>">EN</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				<!-- offcanvas-menu end -->
			</div>
		</div>
	</div>
	<!-- End Mobile Menu Modal -->

	<!-- Search Popup -->
	<!-- <div class="popup-search-box d-none d-lg-block">
		<button class="searchClose border-theme text-theme"><i class="fa fa-times"></i></button>
		<form action="#">
			<input type="text" class="border-theme" placeholder="What are you looking for" /> <button type="submit"><i class="fa fa-search"></i></button>
		</form>
	</div> -->
	<!-- End Search Popup -->

	<!-- Header Area -->

	<header class="header-area-top header-style2" id="active-sticky">
		<div class="header-inner-top" id="headerInnerTop">
			<div class="container">
				<div class="row g-0 justify-content-between align-items-center">
					<div class="col-auto">
						<!-- Logo -->
						<div class="logo">
							<a id="logo-tkpp" href="<?= base_url() ?>"><img src="<?= base_url() ?>uploads/images/<?= $logo['nama_file'] ?>" alt="#"></a>
							<a id="logo-tkpp-putih" href="<?= base_url() ?>"><img src="<?= base_url() ?>uploads/images/<?= $logo_putih['nama_file'] ?>" alt="#"></a>
						</div>
					</div>
					<div class="col-auto">
						<div class="row gx-60 justify-content-between align-items-center">
							<button type="button" class="offcanvas-toggler" data-bs-toggle="modal" data-bs-target="#offcanvas-modal">
								<span class="line"></span>
								<span class="line"></span>
								<span class="line"></span>
							</button>
							<div class="col-auto">
								<div class="main-menu">
									<div class="navbar">
										<div class="nav-item">
											<!-- Main Menu -->
											<ul class="nav-menu navigation list-none">
												<li class=""><a href="<?= base_url() ?>#"><?= $home ?></a></li>
												<li><a href=" <?= base_url() ?>#sec-konsep"><?= $title_konsep ?></a></li>
												<li><a href="<?= base_url() ?>#sec-lokasi"><?= $title_lokasi ?></a></li>
												<li class="menu-item-has-children"><a href="#"><?= $title_properti ?></a>
													<ul class="sub-menu">
														<?php if (sizeof($list_kategori) != 0) : ?>
															<?php foreach ($list_kategori as $lk) : ?>
																<li><a href="<?= base_url() ?>properti/<?= $lk['slug'] ?>"><?= htmlentities($lk['nama']) ?></a></li>
															<?php endforeach; ?>
														<?php endif; ?>
													</ul>
												</li>
												<li><a href="<?= base_url() ?>galeri"><?= $title_galeri ?></a></li>
												<li><a href="<?= base_url() ?>testimoni"><?= $title_testimoni ?></a></li>
												<li><a href="<?= base_url() ?>kontak"><?= $title_kontak_kami ?></a></li>
												<li>
													<div class="topbar-language">
														<i class="fa fa-globe"></i>
														<select id="nice" onChange="document.location.href=this.options[this.selectedIndex].value;">
															<option value="<?= base_url('lang/set_to/indonesia'); ?>" <?= (get_cookie('lang_is') === 'id') ? 'selected' : '' ?>>ID</option>
															<option value="<?= base_url('lang/set_to/english'); ?>" <?= (get_cookie('lang_is') === 'en') ? 'selected' : '' ?>>EN</option>
														</select>
													</div>
												</li>
											</ul>
											<!-- End Main Menu -->
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- End Header Area -->
