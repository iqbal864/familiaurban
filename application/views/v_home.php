	<!-- Hero Area -->
	<section class="hero-style2" id="slider-mobile">
		<div class="hero-style2-slider">
			<?php
			if (sizeof($banner) != 0) :
				foreach ($banner as $bn) : ?>
					<?php if ($bn['file_mobile'] != "") : ?>
						<div class="single-hero2-slider">
							<a href="<?= $bn['url_file_mobile'] ?>">
								<div style="width:100%;">
									<img src="<?= base_url() ?>uploads/images/banner/<?= $bn['file_mobile'] ?>" alt="image">
								</div>
							</a>
						</div>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php else : ?>
				<div class="single-hero2-slider">
					<div style="width:100%;">
						<img src="<?= base_url() ?>assets/images/mobile-test2.jpeg" alt="image">
					</div>
				</div>
			<?php endif; ?>
		</div>
	</section>

	<section class="hero-style2" id="slider-desktop">
		<div class="hero-style2-slider">
			<?php
			if (sizeof($banner) != 0) :
				foreach ($banner as $bn) : ?>
					<?php if ($bn['file_desktop'] != "") : ?>
						<a href="<?= $bn['url_file_desktop'] ?>">
							<div class="single-hero2-slider" style="background-image: url('<?= base_url() ?>uploads/images/banner/<?= $bn['file_desktop'] ?>');">

							</div>
						</a>
					<?php endif; ?>
				<?php endforeach; ?>
			<?php else : ?>
				<a href="#">
					<div class="single-hero2-slider" style="background-image: url('<?= base_url() ?>assets/images/banner1.jpg');">

					</div>
				</a>
			<?php endif; ?>
		</div>
		<div class="scroll-down" style="display: block; align-items:center;">
			<div class="scroll-button">
				<a href="#sec-konsep">
					<div class="scroll-inner"></div>
				</a>
			</div>
			<?= $title_scroll ?>
		</div>
	</section>
	<!-- End Hero Area -->


	<!-- Recent Property Area -->
	<section class="konsep-cluster-area section-padding pb-0" style="padding-top: 70px;" id="sec-konsep">
		<div class="container">
			<div class="row">
				<div class="">
					<div class="section-title">
						<!-- <span class="sub-heading">Sub Heading</span> -->
						<h2 class="heading-title"><?= $title_konsep ?></h2>
						<div class="p-descrip-box2 virual-tour">
							<div class="single-popular-slider-main">
								<div class="single-popular-slider-img">
									<div class="popular-slider-img">
										<?php if (!empty($konsep['nama_file'])) : ?>
											<?php if ($konsep['nama_file'] != "") : ?>
												<img src="<?= base_url() ?>uploads/images/konsep/<?= $konsep['nama_file'] ?>" alt="image">
											<?php else : ?>

											<?php endif; ?>
										<?php else : ?>
											<img src="<?= base_url() ?>assets/images/bg-konsep.jpg" alt="image">
										<?php endif; ?>
									</div>
								</div>
							</div>
							<p><?= $desc_konsep['description'] ?></p>
						</div>

					</div>
				</div>
			</div>

		</div>
	</section>
	<!-- End Recent Property Area -->

	<!-- Why Choose Area -->

	<?php if ($sec_kenapa_kami['nama_file'] != "") {
		$bg_kenapa_kami = "uploads/images/" . $sec_kenapa_kami['nama_file'];
	} else {
		$bg_kenapa_kami = "assets/images/bg-shape1.png";
	} ?>
	<section class="why-choose-area section-padding" style="overflow-x: hidden; background-color: #F9F9F9; background-image: url('<?= base_url() ?><?= $bg_kenapa_kami ?>'); background-size:cover; background-repeat:no-repeat">
		<div class="why-choose-bg" style="background-color:#f07f16;"></div>
		<div class="container why-max-width">
			<div class="row g-0">
				<div class="col-lg-6 col-12" data-aos="fade-right" data-aos-delay="200">
					<!-- Why Choose Slider -->
					<div class="why-choose-slider">
						<?php if (sizeof($img_kenapa_kami) != 0) : ?>
							<?php foreach ($img_kenapa_kami as $img) : ?>
								<?php if ($img['nama_file'] != "") : ?>
									<div class="single-choose-slider">
										<img src="<?= base_url() ?>uploads/images/kenapa_kami/<?= $img['nama_file'] ?>" alt="image">
									</div>
								<?php else : ?>
									<div class="single-choose-slider">
										<img src="<?= base_url() ?>assets/images/why2.jpg" alt="image">
									</div>
								<?php endif; ?>
							<?php endforeach; ?>
						<?php else : ?>
							<div class="single-choose-slider">
								<img src="<?= base_url() ?>assets/images/why2.jpg" alt="image">
							</div>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-lg-6 col-12" data-aos="fade-left" data-aos-delay="300">
					<!-- Faq Area -->
					<div class="faq-inner home">
						<div class="faq-top-content">
							<!-- <span class="sub-heading">Sub Heading</span> -->
							<h1 class="p-title m-0"><?= $title_kenapa_kami ?></h1>
						</div>
						<div class="faq-main-content">
							<div class="accordion" id="accordionExample">
								<ul class="fa-ul" style="margin-left: 1.5rem;">
									<?php if (sizeof($kenapa_kami) != 0) : ?>
										<?php foreach ($kenapa_kami as $kk) : ?>
											<li style="margin-bottom: 7px;"><span class="fa-li"><i class="fas fa-check" style="color: #f07f16;"></i></span><?= htmlentities($kk['data_list']) ?></li>
										<?php endforeach; ?>
									<?php else : ?>
										<li style="margin-bottom: 7px;"><span class="fa-li"><i class="fas fa-check" style="color: #f07f16;"></i></span>Dekat pusat perbelanjaan dan hiburan (metropolitan mall bekasi, grand metropolitan mall bekasi, mega mall bekasi, bekasi cyber park,transpark juanda)</li>
										<li style="margin-bottom: 7px;"><span class="fa-li"><i class="fas fa-check" style="color: #f07f16;"></i></span>Dikelilingi rumah sakit (RS. St. Elisabeth Bekasi, RS. Siloam Bekasi Timur, RS. Siloam Sepanjang Raya, RS. Mitra Keluarga Bekasi Timur, RSUD Bekasi, RS. Primaya Bekasi Timur, RS. Primaya Bekasi Barat) </li>
										<li style="margin-bottom: 7px;"><span class="fa-li"><i class="fas fa-check" style="color: #f07f16;"></i></span>Dikelilingi Sekolah & Fasilitas Internasional</li>
										<li style="margin-bottom: 7px;"><span class="fa-li"><i class="fas fa-check" style="color: #f07f16;"></i></span>Dekat Stasiun Kereta, Halte Busway, dan Future LRT </li>
										<li style="margin-bottom: 7px;"><span class="fa-li"><i class="fas fa-check" style="color: #f07f16;"></i></span>Dikelilingi akses Tol (Tol Bekasi Timur, Tol Bekasi Barat, Tol Jatiasih, Tol Tambun)</li>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
					<!-- End Faq Area -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Why Choose Area -->

	<section class="konsep-cluster-area section-padding" style="padding-bottom: 0;" id="sec-lokasi">
		<div class="container">
			<div class="pro-features">
				<div class="section-title">
					<!-- <span class="sub-heading">Sub Heading</span> -->
					<h2 class="heading-title"><?= $title_lokasi ?></h2>
					<?php if (!empty($alamat['alamat'])) : ?>
						<p class="property-location mb-0"><i class="fa fa-map-marker-alt"></i><?= htmlentities($alamat['alamat']) ?></p>
					<?php endif; ?>
					<div class="p-descrip-box2 virual-tour">
						<div class="propery-map">
							<div id="myMap" class="map"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Recent Property Area -->
	<section class="recent-property-area section-padding" style="padding-bottom: 100px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
					<div class="section-title">
						<!-- <span class="sub-heading">Sub Heading</span> -->
						<h2 class="heading-title"><?= $title_properti ?></h2>
						<p><?= htmlentities($teks_properti['teks']) ?></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="recent-property-slider">
						<?php foreach ($properti as $pt) : ?>
							<div class="single-p-slider">
								<!-- Single Recent Property -->
								<div class="single-recent-property">
									<div class="single-r-property-top">
										<!-- Recent Property Img -->
										<div class="single-r-property-img">
											<img src="<?= base_url() ?>uploads/images/properti/<?= $pt['nama_file'] ?>" alt="image">
										</div>
										<div class="property-for-sale" style="position:absolute; top:20px; left:20px;">
											<ul class="list-none">
												<!-- <li><a href="#">Hot</a></li> -->
												<li class="active" style="padding:2px 10px; font-size:10px"><a href="#"><?= htmlentities($pt['name_kategori']) ?></a></li>
											</ul>
										</div>
									</div>
									<!-- Single Recent Content -->
									<div class="s-property-content text-center" style="padding: 20px 13px">
										<h4 class="srp-title hs-5"><a href="<?= base_url() ?>properti/<?= $pt['slug_kategori'] ?>/<?= $pt['slug'] ?>"><?= htmlentities($pt['name_properti']) ?></a></h3>
											<!-- <p class="property-location mb-0"><i class="fa fa-map-marker-alt"></i><?= $pt['alamat'] ?></p> -->
											<!-- <div class="single-r-property-bed">
										<ul class="single-bed-property list-none d-flex justify-content-around"> -->
											<!-- <li style="text-align: left; border-radius:0%;">
												<h5>Ukuran</h5>
												<span>6X12</span>
											</li>
											<li style="text-align: left; border-radius:0%;">
												<h5>Luas T</h5>
												<span>72</span>
											</li>
											<li style="text-align: left; border-radius:0%;">
												<h5>Luas B</h5>
												<span>36</span>
											</li> -->
											<!-- <li><b>4</b><span><i class="fa fa-bed"></i></span></li>
											<li><b>3</b><span><i class="fa fa-shower"></i></span></li>
											<li><b>1</b><span><i class="fa fa-warehouse"></i></span></li> -->
											<!-- </ul>
									</div> -->
									</div>
								</div>
								<!-- End Single Recent Property -->
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
					<div class="hero-content-btn text-center">
						<a href="<?= base_url() ?>properti" class="theme-btn herobtn-2"><?= $title_lihat_semua ?><i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Recent Property Area -->


	<!-- Property Option Area -->
	<?php if ($sec_fasilitas['nama_file'] != "") {
		$bg_fasilitas = "uploads/images/" . $sec_fasilitas['nama_file'];
	} else {
		$bg_fasilitas = "assets/images/fasilitas.jpeg";
	} ?>
	<section class="property-option-area p-top-110 parallax" data-paroller-factor="0.3" data-paroller-factor-sm="-0.2" data-paroller-factor-xs="-0.2" style="padding-bottom:50px ; background-image:  url('<?= base_url() ?><?= $bg_fasilitas ?>');">
		<div class="bg-overlay bg-overlay-fasilitas"></div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12">
					<div class="section-title mb-0">
						<h2 class="heading-title" style="color: #fff;"><?= $title_fasilitas ?></h2>
						<p style="color: #fff;"><?= htmlentities($teks_fasilitas['teks']) ?></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<div class="work-process-slider" data-aos="fade-up" data-aos-delay="200">
						<!-- Single Process -->
						<?php if (sizeof($fasilitas) != 0) : ?>
							<?php foreach ($fasilitas as $fs) : ?>
								<div class="single-process">
									<div class="process-icon single-p-option">
										<i class="<?= $fs['icon'] ?>"></i>
									</div>
									<div class="process-content">
										<h3 class="process-title hs-4"><?= htmlentities($fs['heading']) ?></h3>
										<p><?= htmlentities($fs['data']) ?></p>
									</div>
								</div>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Property Option Area -->

	<!-- Popular Property Area -->
	<section class="popular-property-area" style="padding-top: 20px; padding-bottom:20px">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-3 col-sm-12 col-xs-12">
					<div class="section-title" style="margin-bottom: 0;">
						<h4 style="margin-bottom: 0;"><?= $title_download ?></h4>
					</div>
				</div>
				<div class="col-lg-9 col-sm-12 col-xm-12">
					<div class="section-title" style="margin-bottom: 0;">
						<?php if (sizeof($brosur) != 0) : ?>
							<?php foreach ($brosur as $br) :  ?>
								<a href="<?= base_url() ?>home/download/<?= $br['nama_file'] ?>" class="theme-btn" tabindex="0"><?= htmlentities($br['label']) ?> <i class="fas fa-download"></i></a>
							<?php endforeach; ?>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Popular Property Area -->

	<!-- Call To Action Area -->
	<section class="call-action-area r-padding" style="padding-top: 150px; padding-bottom:100px">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="call-action-inner">
						<div class="row">
							<div class="col-lg-12 col-12 text-center" data-aos="fade-left" data-aos-delay="300">
								<!-- Call To Action Content -->
								<div class="call-action-content">
									<!-- <span class="small-title">Call To Action</span> -->
									<h2 class="c-a-title mb-0"><?= $title_hubungi ?></h2>
									<div class="call-action-btn">
										<?php if (!empty($kontak['no_wa'])) {
											$no_wa = $kontak['no_wa'];
										} else {
											$no_wa = "";
										} ?>
										<a href="https://api.whatsapp.com/send?phone=<?= $no_wa ?>" class="theme-btn" style="background: #27AE60;"><i class="fab fa-whatsapp"></i>Whatsapp</a>
										<a href="kontak" class="theme-btn primary"><i class="fa fa-envelope-open-text"></i><?= $title_hubungi_marketing ?></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Call To Action Area -->

	<?php
	if (!empty($alamat['latitude'])) {
		if ($alamat['latitude'] != "") {
			$latitude = $alamat['latitude'];
		} else {
			$latitude = 0;
		}
	} else {
		$latitude = 0;
	}

	if (!empty($alamat['longitude'])) {
		if ($alamat['longitude'] != "") {
			$longitude = $alamat['longitude'];
		} else {
			$longitude = 0;
		}
	} else {
		$longitude = 0;
	}

	?>
	<script>
		$(function() {
			var map;
			map = new GMaps({
				el: "#myMap",
				lat: <?= $latitude ?>,
				lng: <?= $longitude ?>,
				scrollwheel: false,
				zoom: 15,
				zoomControl: true,
				panControl: true,
				streetViewControl: true,
				mapTypeControl: true,
				overviewMapControl: true,
				clickable: true,
			});

			var image = "";
			map.addMarker({
				lat: <?= $latitude ?>,
				lng: <?= $longitude ?>,
				icon: image,
				animation: google.maps.Animation.DROP,
				verticalAlign: "bottom",
				horizontalAlign: "left",
				backgroundColor: "#efece0",
			});

			// var styles = [{
			// featureType: "road",
			// stylers: [{
			// color: "#ffffff"
			// }],
			// },
			// {
			// featureType: "water",
			// stylers: [{
			// color: "#bde5f6"
			// }],
			// },
			// {
			// featureType: "landscape",
			// stylers: [{
			// color: "#f2f2f2"
			// }],
			// },
			// {
			// elementType: "labels.text.fill",
			// stylers: [{
			// color: "#FF7550"
			// }],
			// },
			// {
			// featureType: "poi",
			// stylers: [{
			// color: "#e2f0cd"
			// }],
			// },
			// {
			// elementType: "labels.text",
			// stylers: [{
			// saturation: 2
			// }, {
			// weight: 0.3
			// }, {
			// color: "#a8a8a8"
			// }],
			// },
			// ];

			// map.addStyle({
			// styledMapName: "Styled Map",
			// styles: styles,
			// mapTypeId: "map_style",
			// });

			// map.setStyle("map_style");
		});
	</script>
