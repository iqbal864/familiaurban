		<!-- Breadcrumbs Area -->
		<?php
		if (!empty($gambar_kategori['nama_file'])) {
			$path_gambar = "uploads/images/kategori/" . $gambar_kategori['nama_file'];
		} else {
			$path_gambar = "assets/images/4.png";
		} ?>
		<section class="breadcrumbs-area" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= base_url() ?><?= $path_gambar ?>');">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Breadcrumbs Content -->
						<div class="breadcrumbs-content">
							<h1 class="b-content-title m-0"><?= $title_testimoni ?></h1>
							<ul class="breadcrumbs-menu list-none">
								<li><i class="fa fa-home"></i><a href="<?= base_url() ?>">Home</a></li>
								<li><a href="#"><?= $title_testimoni ?></a></li>
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
						<div class="row properti_list" style="margin-bottom:100px; margin-top:25px;">
							<?php if (!empty($data_testimoni)) : ?>
								<?php foreach ($data_testimoni as $pt) : ?>
									<?php if ($pt['url'] != "") : ?>
										<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
											<div class="single-p-slider">
												<div class="single-recent-property" style="margin-top: 20px;">
													<div class="video-detail-popup">
														<div class="video-popup-box">
															<?php
															$trim_url = trim($pt['url']);
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
																<a style="height: 50px; width:50px; line-height:50px; font-size:16px;" href="<?= htmlentities($pt['url']) ?>" class="video vid mfp-iframe"><i class="fa fa-play"></i></a>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									<?php endif; ?>
								<?php endforeach; ?>

								<?php
								$end_gambar = end($data_testimoni);
								?>
								<div class="load-more" lastID="<?= $end_gambar['id']; ?>" style="display: none;">
								</div>
								<div class="loadings" style="display:none;">
									<img style=" width:20px;" src="<?= base_url('assets/images/loading.gif'); ?>" alt="image" /> Loading...
								</div>
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
								url: '<?= base_url('testimoni/loadMoreTesti'); ?>',
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
