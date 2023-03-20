	<!-- Footer Area -->
	<footer class="footer-area">
		<!-- <div class="footer-top" style="background-image:url('img/footer-bg.jpg'); padding-top:0;"> -->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="work-process-slider2" data-aos="fade-up" data-aos-delay="200 ">
							<?php foreach ($kerja_sama_bank as $bank) : ?>
								<div class="single-process">
									<div class="process-content">
										<img src="<?= base_url() ?>uploads/images/kerja_sama/<?= $bank['nama_file'] ?>" alt="">
									</div>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<!-- Footer Inner -->
						<div class="footer-card-inner">
							<div class="row">
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 col-12">
									<!-- Single Widget -->
									<div class="single-f-widget">
										<img src="<?= base_url() ?>uploads/images/<?= $logo_perusahaan['nama_file'] ?>" style="width: 230px;" alt="">
										<p style=" margin-top: 20px;" class="mb-0"><?= htmlentities($alamat['alamat']) ?></p>
										<div class="s-property-content" style="padding: 0px 0px;">
											<p class="srp-title"><a href="<?= htmlentities($alamat['link']) ?>"><?= $title_lihat_maps ?></a></p>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-md-6 col-sm- col-xs-12 col-12">
									<!-- Single Widget -->
									<div class="single-f-widget f-services-widget" style="text-align: right;">
										<h5><?= $title_sosmed ?></h5>
										<ul class="footer-social list-none">
											<?php foreach ($sosial_media as $sosmed) : ?>
												<li class="active"><a href="<?= htmlentities($sosmed['url']) ?>"><i class="<?= $sosmed['icon'] ?>"></i></a></li>
											<?php endforeach; ?>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<!-- End Footer Inner -->
					</div>
				</div>
			</div>
		</div>
		<!-- Copyright -->
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<p class="mb-0"><b>© <?= date('Y') ?> <?= htmlentities($teks_footer['teks']) ?></b></p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- End Footer Area -->


	<button class="btn-floating whatsapp">
		<?php if (!empty($kontak['no_wa'])) {
			$no_wa = $kontak['no_wa'];
		} else {
			$no_wa = "";
		} ?>
		<a href="https://api.whatsapp.com/send?phone=<?= $no_wa ?>" target="_blank">
			<img src="<?= base_url() ?>assets/images/wa.gif" alt="whatsApp">
		</a>
	</button>


	<a href="#" class="scrollToTop"><i class="fa fa-arrow-up"></i></a>

	<script>
		function map() {}
		window.map = map;
	</script>

	<script src="<?= base_url() ?>vendor/immolax/js/jquery-migrate.js"></script>
	<script src="<?= base_url() ?>vendor/immolax/js/jquery-ui.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="<?= base_url() ?>vendor/immolax/js/bootstrap.min.js"></script>
	<!-- Maginific Popup JS -->
	<script src="<?= base_url() ?>vendor/immolax/js/magnific-popup.min.js"></script>
	<!-- Aos JS -->
	<script src="<?= base_url() ?>vendor/immolax/js/aos.min.js"></script>
	<!-- Cube Portfolio JS -->
	<script src="<?= base_url() ?>vendor/immolax/js/cube-portfolio.min.js"></script>
	<!-- Easing JS -->
	<script src="<?= base_url() ?>vendor/immolax/js/easing.min.js"></script>
	<!-- Slickslider JS -->
	<script src="<?= base_url() ?>vendor/immolax/js/slickslider.min.js"></script>
	<!-- Waypoints JS -->
	<script src="<?= base_url() ?>vendor/immolax/js/waypoints.min.js"></script>
	<!-- Counterup JS -->
	<script src="<?= base_url() ?>vendor/immolax/js/jquery.counterup.min.js"></script>
	<!-- Bx Slider JS -->
	<script src="<?= base_url() ?>vendor/immolax/js/bx-slider.min.js"></script>
	<!-- Nice Select JS -->
	<script src="<?= base_url() ?>vendor/immolax/js/nice-select.min.js"></script>
	<!-- Datepicker JS -->
	<!-- <script src="<?= base_url() ?>vendor/immolax/js/datepicker.js"></script> -->
	<!-- Main JS -->
	<script src="<?= base_url() ?>vendor/immolax/js/active.js"></script>


	<script>
		$('.parallax').paroller();
	</script>


	</body>

	</html>
