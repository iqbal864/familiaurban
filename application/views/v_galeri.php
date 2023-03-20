		<!-- Breadcrumbs Area -->
		<?php
		if (!empty($gambar_kategori['nama_file'])) {
			$path_gambar = "uploads/images/kategori/" . $gambar_kategori['nama_file'];
		} else {
			$path_gambar = "assets/images/3.png";
		} ?>
		<section class="breadcrumbs-area" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= base_url() ?><?= $path_gambar ?>');">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Breadcrumbs Content -->
						<div class="breadcrumbs-content">
							<h1 class="b-content-title m-0"><?= $title_galeri ?></h1>
							<ul class="breadcrumbs-menu list-none">
								<li><i class="fa fa-home"></i><a href="<?= base_url() ?>">Home</a></li>
								<li><a href="#"><?= $title_galeri ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Breadcrumbs Area -->

		<!-- Recent Property Area -->
		<section class="konsep-cluster-area section-padding pb-0 pt-0" id="sec-konsep">
			<div class="container">
				<div class="row">
					<div class="">
						<div class="section-title mb-0">
							<h2 class="heading-title"></h2>
							<div class="p-descrip-box2 virual-tour">
								<a href="<?= base_url() ?>galeri/<?= strtolower($title_data_galeri_gambar) ?>" class="theme-btn <?= ($this->uri->segment(2) == "gambar" || $this->uri->segment(2) == "picture" || empty($this->uri->segment(2))) ? '' : 'primary' ?>"><?= $title_data_galeri_gambar ?></a>
								<a href="<?= base_url() ?>galeri/<?= strtolower($title_data_galeri_vidio) ?>" class="theme-btn <?= ($this->uri->segment(2) == "vidio" || $this->uri->segment(2) == "video") ? '' : 'primary' ?>"><?= $title_data_galeri_vidio ?></a>
							</div>
						</div>
						<div class="row properti_list" style="margin-bottom:100px">
							<?php if ($this->uri->segment(2) == "gambar" || $this->uri->segment(2) == "picture" || empty($this->uri->segment(2))) : ?>
								<?php if (!empty($data_galeri)) : ?>
									<?php foreach ($data_galeri as $pt) : ?>
										<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
											<div class="single-p-slider">
												<div class="single-recent-property" style="margin-top: 20px;">
													<div class="single-portfolio">
														<div class="portfolio-image" style="height: 200px;">
															<img src="<?= base_url() ?>uploads/images/properti/tipe/galeri/<?= $pt['nama_file'] ?>" alt="image" style="object-fit: cover; object-position:center; width:100%; height:100%;">
															<a style="width: 30px; height:30px; line-height:32px; top:12px; right:12px; font-size:12px;" href="<?= base_url() ?>uploads/images/properti/tipe/galeri/<?= $pt['nama_file'] ?>" data-fancybox="photo" data-caption="<?= $pt['label'] ?>" class="image-view"><i class="fa fa-plus"></i></a>
														</div>
														<!-- Portfolio Content -->
														<div class="portfolio-content" style="padding-top:1px; padding-bottom:1px; padding-right:5px; padding-left:5px; bottom:12px; left:12px;">
															<span class="portfolio-title hs-7" style="font-size: 9px; color:black;"><a href="#"><b><?= $pt['label'] ?></b></a></span>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php endforeach; ?>

									<?php
									$end_gambar = end($data_galeri);
									?>
									<div class="load-more" lastID="<?= $end_gambar['id']; ?>" style="display: none;">
									</div>
									<div class="loadings" style="display:none;">
										<img style=" width:20px;" src="<?= base_url('assets/images/loading.gif'); ?>" alt="image" /> Loading...
									</div>
								<?php endif; ?>
							<?php else : ?>
								<?php if (!empty($data_galeri)) : ?>
									<?php foreach ($data_galeri as $pt) : ?>
										<?php if ($pt['link_vidio'] != "") : ?>
											<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
												<div class="single-p-slider">
													<div class="single-recent-property" style="margin-top: 20px;">
														<div class="video-detail-popup">
															<div class="video-popup-box">
																<?php
																$trim_url = trim($pt['link_vidio']);
																$param = parse_url($trim_url);
																parse_str($param['path'], $parse_id);
																$arr_key = array_keys($parse_id);
																$id_url = trim($arr_key[0], '/');
																?>
																<img style="height: 180px; width:-webkit-fill-available; width:-moz-available;" src="https://img.youtube.com/vi/<?= $id_url ?>/mqdefault.jpg" alt="image">
																<!-- <div style="height:200px; background-color: black;"></div> -->
																<div class="bg-overlay bg-overlay-vidio"></div>
																<div class="video-main" style="left: 50%; top: 50%; margin-top:-25px; margin-left:-25px;">
																	<!-- Promo-Video -->
																	<div class="promo-video">
																		<div class="waves-block">
																			<div class="waves wave-1"></div>
																			<div class="waves wave-2"></div>
																			<div class="waves wave-3"></div>
																		</div>
																	</div>
																	<a style="height: 50px; width:50px; line-height:50px; font-size:16px;" href="<?= $pt['link_vidio'] ?>" class="video vid mfp-iframe"><i class="fa fa-play"></i></a>
																</div>
															</div>
														</div>
														<div class="s-property-content text-center" style="padding: 20px 13px;">
															<h6 class="srp-title"><a href="#"><?= $pt['name'] ?></a></h6>
														</div>
													</div>
												</div>
											</div>
										<?php endif; ?>
									<?php endforeach; ?>

									<?php
									$end_gambar = end($data_galeri);
									?>
									<div class="load-more" lastID="<?= $end_gambar['id']; ?>" style="display: none;">
									</div>
									<div class="loadings" style="display:none;">
										<img style=" width:20px;" src="<?= base_url('assets/images/loading.gif'); ?>" alt="image" /> Loading...
									</div>
								<?php endif; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>

			</div>
		</section>

		<script type="text/javascript">
			$(document).ready(function() {

				$('.vid').magnificPopup({
					type: "iframe",
					iframe: {
						patterns: {
							youtube_short: {
								index: 'youtu.be/',
								id: 'youtu.be/',
								src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
							}
						}
					}
				});

				$(window).scroll(function() {
					var lastID = $('.load-more').attr('lastID');
					// if (($(window).scrollTop() + $(window).height() >= $(document).height()) && (lastID != 0)) {
					// if (($(window).scrollTop() >= $(document).height() - $(window).height()) && (lastID != 0)) {
					if (($(window).scrollTop() + $(window).height() > $(document).height() - 200) && (lastID != 0)) {
						// if (($(window).scrollTop() == $(document).height() - $(window).height()) && (lastID != 0)) {
						$('.load-more').remove();
						var timeDelay = 500; // MILLISECONDS (5 SECONDS).
						setTimeout(load_data, timeDelay);

						function load_data() {

							$.ajax({
								type: 'POST',
								url: '<?= base_url('galeri/' . $title_method_name . ''); ?>',
								data: 'id=' + lastID,
								beforeSend: function() {
									$('.loadings').show();
								},
								success: function(html) {
									$('.loadings').remove();
									$('#list_more').hide();
									$('.properti_list').append(html);
									$('#list_more').fadeIn('slow');

									$('[data-fancybox]').fancybox({
										// Options will go here
										buttons: [
											'close'
										],
										wheel: false,
										transitionEffect: "slide",
										// thumbs          : false,
										// hash            : false,
										loop: true,
										// keyboard        : true,
										toolbar: true,
										// animationEffect : false,
										// arrows          : true,
										clickContent: false
									});

									$('.vid').magnificPopup({
										type: "iframe",
										iframe: {
											patterns: {
												youtube_short: {
													index: 'youtu.be/',
													id: 'youtu.be/',
													src: '//www.youtube.com/embed/%id%?autoplay=1' // URL that will be set as a source for iframe.
												}
											}
										}
									});
								}
							});
						}
					}
				});
			});
		</script>

		<script>
			$('[data-fancybox]').fancybox({
				// Options will go here
				buttons: [
					'close'
				],
				wheel: false,
				transitionEffect: "slide",
				// thumbs          : false,
				// hash            : false,
				loop: true,
				// keyboard        : true,
				toolbar: true,
				// animationEffect : false,
				// arrows          : true,
				clickContent: false
			});
		</script>
