		<?php
		if (!empty($properti['nama_file'])) {
			$path_gambar = "uploads/images/properti/" . $properti['nama_file'];
		} else {
			$path_gambar = "assets/images/cover-property1.jpeg";
		} ?>
		<!-- Breadcrumbs Area -->
		<section class="breadcrumbs-area" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= base_url() ?><?= $path_gambar ?>');">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Breadcrumbs Content -->
						<div class="breadcrumbs-content">
							<h1 class="b-content-title m-0"><?= htmlentities($properti['name_properti']) ?></h1>
							<ul class="breadcrumbs-menu list-none">
								<li><i class="fa fa-home"></i><a href="<?= base_url() ?>">Home</a></li>
								<li><a href="<?= base_url() ?>properti/<?= $properti['slug_kategori'] ?>"><?= $properti['name_kategori'] ?></a></li>
								<li><a href="#"><?= htmlentities($properti['name_properti']) ?></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Breadcrumbs Area -->


		<section class="property-details p-top-150">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="top-head-inner">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-12">
									<div class="property-top-head">
										<div class="pt-list">
											<div class="single-pt">
												<a href="#"><?= htmlentities($properti['name_kategori']) ?></a>
											</div>
										</div>
										<h2 class="p-single-title hs-2"><?= htmlentities($properti['name_properti']) ?></h2>
										<p class="pr-location m-0"><i class="fa fa-map-marker-alt"></i><?= htmlentities($properti['alamat']) ?></p>
									</div>
								</div>
								<!-- <div class="col-lg-4 col-md-5 col-12">
		                            <div class="p-single-pr m-t-50">
		                                <div class="price-amount"><span>From</span><b class="theme-color">$249,155.00</b></div>
		                            </div>
		                        </div> -->
							</div>
						</div>
					</div>
					<!-- <div class="col-12">
		                <div class="top-head-bottom">
		                    <div class="row">
		                        <div class="col-lg-8 col-md-8 col-12">
		                            <div class="bed-property-top">
		                                <ul class="single-bed-property list-none">
		                                    <li><b>4</b><span><i class="fa fa-bed"></i></span></li>
		                                    <li><b>3</b><span><i class="fa fa-shower"></i></span></li>
		                                    <li><b>1</b><span><i class="fa fa-warehouse"></i></span></li>
		                                </ul>
		                            </div>
		                        </div>
		                        <div class="col-lg-4 col-md-4 col-12">
		                            <div class="print-react">
		                                <ul class="p-react-list list-none">
		                                    <li><a href="#"><i class="fa fa-print"></i>Print</a></li>
		                                    <li><i class="fa fa-heart"></i></li>
		                                </ul>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div> -->
				</div>

				<div class="row">
					<div class="col-12">
						<!-- Property Gallery Slider -->
						<div class="property-gallery-slider">
							<div class="property-slider">
								<ul class="bxslider">
									<?php foreach ($gambar_tipe_properti as $gtp) : ?>
										<a href="<?= base_url() ?>uploads/images/properti/tipe/galeri/<?= $gtp['nama_file'] ?>" data-fancybox="group" data-caption="<?= $gtp['label'] ?>">
											<li class="slide" style="background-image: url(<?= base_url() ?>uploads/images/properti/tipe/galeri/<?= $gtp['nama_file'] ?>); background-size:cover; background-position:center; backgrounnd-repeat:no-repeat"></li>
										</a>
									<?php endforeach; ?>
								</ul>
								<div id="bx-pager">
									<?php
									$no = 0;
									foreach ($gambar_tipe_properti as $gtp) : ?>
										<a data-slide-index="<?= $no ?>" href=""><img src="<?= base_url() ?>uploads/images/properti/tipe/galeri/<?= $gtp['nama_file'] ?>" alt="image"></a>
									<?php
										$no++;
									endforeach; ?>
								</div>
							</div>
						</div>
						<!-- End Property Gallery Slider -->
					</div>
				</div>
			</div>
		</section>

		<section class="p-description-area m-t-40 p-btm-150">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-12">
						<!-- Descreption Box -->
						<div class="p-descrip-box">
							<div class="p-des-box-title">
								<h4 class="pr-d-title"><?= $title_deskripsi ?></h4>
								<!-- <span class="request-view theme-color"><i class="fa fa-check-circle"></i>Request Viewing</span> -->
							</div>
							<div style="display: inline-block;">
								<?= $properti['description'] ?>
							</div>
						</div>
						<!-- End Descreption Box -->

						<!-- Property Features -->
						<div class="p-descrip-box pro-features">
							<h4 class="pr-d-title"><?= $title_fitur ?> <?= htmlentities($properti['name_properti']) ?></h4>
							<ul class="single-pro-f list-none">
								<?php foreach ($fitur_properti as $fp) : ?>
									<li><i class="fas fa-check"></i><?= htmlentities($fp['name']) ?></li>
								<?php endforeach ?>
							</ul>
						</div>
						<!-- End Property Features -->
						<!-- Property Features -->
						<div class="p-descrip-box floor-planes">
							<h4 class="pr-d-title"><?= $title_tipe ?> <?= htmlentities($properti['name_properti']) ?></h4>
							<div class="floor-main-content">
								<div class="accordion" id="accordionExample">
									<?php
									$no = 1;
									$arr_rev = array_reverse($tipe_properti);
									$arr_tipe = end($arr_rev);
									foreach ($tipe_properti as $tp) : ?>
										<div class="accordion-item">
											<h2 class="accordion-header" id="headingOne">
												<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $no ?>" data-valIndex="<?= $tp['id'] ?>" onclick="refreshSLider(this);" aria-expanded="true" aria-controls="collapseOne">
													<span><?= htmlentities($properti['name_properti']) ?> <?= htmlentities($tp['name_tipe']) ?></span>
												</button>
											</h2>
											<?php
											if ($arr_tipe['name_tipe'] == $tp['name_tipe']) {
												$show = "show";
											} else {
												$show = "";
											} ?>
											<div id="collapse<?= $no ?>" class="accordion-collapse collapse <?= $show ?>" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
												<div class="accordion-body">
													<div class="row">
														<p style="text-align: justify;" class="m-0"><?= $tp['description'] ?></p>
														<div class="col-md-12 col-sm-12 col-xs-12 col-lg-8 mt-3" style="padding-right: 0px;">
															<!-- Property Booking Slider -->
															<?php
															$id_tipe_properti = $tp['id'];
															$queryGetGambar = $this->db->query("SELECT * FROM gambar_tipe_properti WHERE id_tipe_properti = '$id_tipe_properti'")->result_array(); ?>
															<div class="p-gambar-slider g-index<?= $no ?> gambarIndex<?= $tp['id'] ?>">
																<!-- Single Slider -->
																<?php

																foreach ($queryGetGambar as $qg) : ?>
																	<div class="s-property-slider" style="background-image:url('<?= base_url() ?>uploads/images/properti/tipe/galeri/<?= $qg['nama_file'] ?>');">
																		<div class="p-slider-content">
																			<div class="s-content-left">
																				<?php if (get_cookie('lang_is') === 'en') : ?>
																					<h3 class="p-slider-title fs-28"><a href="#"><?= $qg['label_en'] ?></a></h3>
																				<?php else : ?>
																					<h3 class="p-slider-title fs-28"><a href="#"><?= $qg['label_id'] ?></a></h3>
																				<?php endif; ?>
																				<!-- <p class="m-0"><i class="fa fa-map-marker-alt"></i>301 Falls Blvd, Quincy MA 2169</p> -->
																			</div>
																			<!-- <div class="p-slider-price">
																		<h4 class="price-title m-0">$22,500/m</h4>
																	</div> -->
																		</div>
																	</div>
																<?php endforeach; ?>
																<!-- End Single Slider -->
															</div>
														</div>

														<?php

														$queryGetUkuran = $this->db->query("SELECT * FROM ukuran_tipe_properti WHERE id_tipe_properti = '$id_tipe_properti'")->row_array();
														$queryGetSpekTam = $this->db->query("SELECT * FROM spesifikasi_tipe_properti_tambahan WHERE id_tipe_properti = '$id_tipe_properti'")->result_array();
														$queryGetSpek = $this->db->query("SELECT * FROM spesifikasi_tipe_properti WHERE id_tipe_properti = '$id_tipe_properti'")->result_array();
														?>
														<div class="col-md-12 col-sm-12 col-xs-12 col-lg-4 mt-3 pl-0" style="padding-left: 0px;">
															<!-- <table class="table table-dark">
																<tbody>
																	<tr>
																		<th scope="col">Ukuran</th>
																		<td>6 X 11</td>
																	</tr>
																	<tr>
																		<th scope="col">Luas Tanah</th>
																		<td>66</td>
																	</tr>
																	<tr>
																		<th scope="col">Luas Bangunan</th>
																		<td>33</td>
																	</tr>
																	<tr>
																		<th scope="col">Jumlah Lantai</th>
																		<td>1 Lantai</td>
																	</tr>
																	<tr>
																		<th scope="col">Kamar Tidur</th>
																		<td>2</td>
																	</tr>
																	<tr>
																		<th scope="col">Kamar Mandi</th>
																		<td>1</td>
																	</tr>
																	<tr>
																		<th scope="col">Carport</th>
																		<td>1</td>
																	</tr>
																	<tr>
																		<th scope="col">Dapur</th>
																		<td>1</td>
																	</tr>
																</tbody>
															</table> -->
															<div style="padding-left: 25px; padding-top:25px; padding-bottom:25px; background-color:#F8F9F9;">
																<div class="mb-3">
																	<?php if (get_cookie('lang_is') === 'en') : ?>
																		<div>
																			<span style="font-size: 17px; font-weight:bold;">
																				<span><span style="color:black">Size</span> : <?= (!empty($queryGetUkuran['ukuran'])) ? htmlentities($queryGetUkuran['ukuran']) : '0' ?></span>
																			</span>
																		</div>
																		<div>
																			<span style="font-size: 17px; font-weight:bold;">
																				<span><span style="color:black">Surface Area</span> : <?= (!empty($queryGetUkuran['luas_tanah'])) ? htmlentities($queryGetUkuran['luas_tanah']) : '0' ?></span>
																			</span>
																		</div>
																		<div>
																			<span style="font-size: 17px; font-weight:bold;">
																				<span><span style="color:black">Building Area</span> : <?= (!empty($queryGetUkuran['luas_bangunan'])) ? htmlentities($queryGetUkuran['luas_bangunan']) : '0' ?></span>
																			</span>
																		</div>
																	<?php else : ?>
																		<div>
																			<span style="font-size: 17px; font-weight:bold;">
																				<span><span style="color:black">Ukuran</span> : <?= (!empty($queryGetUkuran['ukuran'])) ? htmlentities($queryGetUkuran['ukuran']) : '0' ?></span>
																			</span>
																		</div>
																		<div>
																			<span style="font-size: 17px; font-weight:bold;">
																				<span><span style="color:black">Luas Tanah</span> : <?= (!empty($queryGetUkuran['luas_tanah'])) ? htmlentities($queryGetUkuran['luas_tanah']) : '0' ?></span>
																			</span>
																		</div>
																		<div>
																			<span style="font-size: 17px; font-weight:bold;">
																				<span><span style="color:black">Luas Bangunan</span> : <?= (!empty($queryGetUkuran['luas_bangunan'])) ? htmlentities($queryGetUkuran['luas_bangunan']) : '0' ?></span>
																			</span>
																		</div>
																	<?php endif; ?>
																</div>
																<?php foreach ($queryGetSpekTam as $qs) : ?>
																	<div>
																		<span>
																			<?php if (get_cookie('lang_is') === 'en') : ?>
																				<span><span style="color:black"><?= htmlentities($qs['heading_en']) ?></span> : <?= htmlentities($qs['data_en']) ?></span>
																			<?php else : ?>
																				<span><span style="color:black"><?= htmlentities($qs['heading_id']) ?></span> : <?= htmlentities($qs['data_id']) ?></span>
																			<?php endif; ?>
																		</span>
																	</div>
																<?php endforeach ?>
															</div>
														</div>
													</div>
													<div class="row" style="padding-top: 80px;">

														<div class="col-md-12 col-sm-12 col-xs-12 col-lg-7 mt-3 pl-0" style="padding-right: 0px;">
															<div style="overflow-x: auto; overflow-y: hidden; white-space: nowrap;">
																<table class="table" style="background-color:#F8F9F9;">
																	<tbody>
																		<?php foreach ($queryGetSpek as $qs) : ?>
																			<?php if (get_cookie('lang_is') === 'en') : ?>
																				<tr>
																					<th scope="col"><?= htmlentities($qs['heading_en']) ?> :</th>
																					<td style="font-size: 14px;"><?= nl2br(htmlentities($qs['data_en'])) ?></td>
																				</tr>
																			<?php else : ?>
																				<tr>
																					<th scope="col"><?= htmlentities($qs['heading_id']) ?> :</th>
																					<td style="font-size: 14px;"><?= nl2br(htmlentities($qs['data_id'])) ?></td>
																				</tr>
																			<?php endif; ?>
																		<?php endforeach; ?>

																	</tbody>
																</table>
															</div>
														</div>
														<div class="col-md-12 col-sm-12 col-xs-12 col-lg-5 mt-3" style="padding-left: 0px;">
															<img src="<?= base_url() ?>uploads/images/properti/tipe/<?= $tp['denah'] ?>" style="width: 100%; height:auto;" alt="image">
														</div>

													</div>
												</div>
											</div>
										</div>
									<?php
										$no++;
									endforeach; ?>
								</div>
							</div>
						</div>
						<!-- End Property Features -->
						<!-- Property Features -->
						<div class="p-descrip-box attachments">
							<div class="p-des-box-title align-items-center">
								<h4 class="pr-d-title m-0"><?= $title_download ?></h4>
								<div class="download-attach">
									<?php if (sizeof($brosur) != 0) : ?>
										<?php foreach ($brosur as $br) :  ?>
											<a href="<?= base_url() ?>home/download/<?= $br['nama_file'] ?>" class="theme-btn" tabindex="0"><?= htmlentities($br['label']) ?> <i class="fas fa-download"></i></a>
										<?php endforeach; ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<!-- End Property Features -->

						<div class="p-descrip-box virual-tour">
							<h4 class="pr-d-title">Master Plan</h4>
							<div class="popular-slider-img">
								<?php if (!empty($master_plan['master_plan'])) : ?>
									<?php if ($master_plan['master_plan'] != "") : ?>
										<img src="<?= base_url() ?>uploads/images/properti/<?= $master_plan['master_plan'] ?>" alt="image">
									<?php else : ?>

									<?php endif; ?>
								<?php else : ?>

								<?php endif; ?>
							</div>
						</div>

						<!-- Video Box -->
						<div class="p-descrip-box video-detail-popup">
							<h4 class="pr-d-title"><?= $title_vidio ?></h4>
							<div class="video-popup-box">
								<?php
								$trim_url = trim($properti['link_vidio']);
								$param = parse_url($trim_url);
								parse_str($param['path'], $parse_id);
								$arr_key = array_keys($parse_id);
								if (!empty($arr_key[0])) {
									$id_url = trim($arr_key[0], '/');
								} else {
									$id_url = "";
								}

								if ($id_url != "") :
								?>
									<img style="width:-webkit-fill-available; width:-moz-available;" src="https://img.youtube.com/vi/<?= $id_url ?>/maxresdefault.jpg" alt="image">
									<!-- <img src="https://www.timahproperti.com/images/Marketing/Logo/FU/FU.png" alt="#"> -->
									<div class="bg-overlay bg-overlay-vidio"></div>
									<div class="video-main">
										<!-- Promo-Video -->
										<div class="promo-video">
											<div class="waves-block">
												<div class="waves wave-1"></div>
												<div class="waves wave-2"></div>
												<div class="waves wave-3"></div>
											</div>
										</div>
										<a href="<?= $properti['link_vidio'] ?>" class="video vid mfp-iframe"><i class="fa fa-play"></i></a>
									</div>
								<?php endif; ?>
							</div>
						</div>
						<!-- End Video Box -->

						<!-- Virtual Tour Image -->
						<!-- <div class="p-descrip-box virual-tour">
							<h4 class="pr-d-title">360° Virtual Tour</h4>
							<img src="img/property-details/property-360.jpg" alt="#">
						</div> -->
						<!-- End Virtual Tour Image -->

						<!-- Propery Map -->
						<div class="p-descrip-box pro-features">
							<h4 class="pr-d-title"><?= $title_lokasi ?> <?= htmlentities($properti['name_properti']) ?></h4>
							<div class="propery-map">
								<div id="myMap2" class="map"></div>
							</div>
						</div>
						<!-- End Property Features -->

						<!-- Similar Property -->
						<div class="similar-property">
							<h4 class="similar-property-title"><?= $title_serupa ?></h4>
							<div class="row">
								<div class="col-12">
									<div class="similar-property-slider">
										<?php foreach ($similar_properti as $sp) : ?>
											<div class="similar-property-main">
												<!-- Single Recent Property -->
												<div class="single-recent-property">
													<div class="single-r-property-top">
														<!-- Recent Property Img -->
														<div class="single-r-property-img">
															<img src="<?= base_url() ?>uploads/images/properti/<?= $sp['nama_file'] ?>" alt="image">
														</div>
														<div class="property-for-sale" style="position:absolute; top:20px; left:20px;">
															<ul class="list-none">
																<!-- <li><a href="#">Hot</a></li> -->
																<li class="active" style="padding:2px 10px; font-size:10px"><a href="#"><?= htmlentities($sp['name_kategori']) ?></a></li>
															</ul>
														</div>
													</div>
													<!-- Single Recent Content -->
													<?php if (!empty($this->uri->segment(2))) {
														$slug_kategori = $this->uri->segment(2);
													} else {
														$id_kategori = $sp['id_kategori'];
														if (get_cookie('lang_is') === 'en') {
															$getSlugKatgeori = $this->db->query("SELECT slug_en as slug_kategori FROM kategori WHERE id = '$id_kategori'")->row_array();
															$slug_kategori = $getSlugKatgeori['slug_kategori'];
														} else {
															$getSlugKatgeori = $this->db->query("SELECT slug_id as slug_kategori FROM kategori WHERE id = '$id_kategori'")->row_array();
															$slug_kategori = $getSlugKatgeori['slug_kategori'];
														}
													} ?>
													<div class="s-property-content text-center" style="padding: 20px 13px;">
														<h5 class="srp-title hs-5"><a href="<?= base_url() ?>properti/<?= $slug_kategori ?>/<?= $sp['slug'] ?>"><?= htmlentities($sp['name_properti']) ?></a></h5>
														<!-- <p class="property-location mb-0"><i class="fa fa-map-marker-alt"></i><?= $sp['alamat'] ?></p> -->
													</div>
												</div>
												<!-- End Single Recent Property -->
											</div>
										<?php endforeach; ?>
										<!-- End Single Recent Property -->
									</div>
								</div>
							</div>
						</div>
						<!-- End Similar Property -->
					</div>
				</div>
			</div>
		</section>

		<?php
		if (!empty($properti['latitude'])) {
			if ($properti['latitude'] != "") {
				$latitude = $properti['latitude'];
			} else {
				$latitude = 0;
			}
		} else {
			$latitude = 0;
		}

		if (!empty($properti['longitude'])) {
			if ($properti['longitude'] != "") {
				$longitude = $properti['longitude'];
			} else {
				$longitude = 0;
			}
		} else {
			$longitude = 0;
		}

		?>

		<script>
			function map() {}
			window.map = map;
		</script>

		<script>
			$(document).ready(function() {
				(function() {
					var map;
					map = new GMaps({
						el: "#myMap2",
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
					// 		featureType: "road",
					// 		stylers: [{
					// 			color: "#ffffff"
					// 		}],
					// 	},
					// 	{
					// 		featureType: "water",
					// 		stylers: [{
					// 			color: "#bde5f6"
					// 		}],
					// 	},
					// 	{
					// 		featureType: "landscape",
					// 		stylers: [{
					// 			color: "#f2f2f2"
					// 		}],
					// 	},
					// 	{
					// 		elementType: "labels.text.fill",
					// 		stylers: [{
					// 			color: "#FF7550"
					// 		}],
					// 	},
					// 	{
					// 		featureType: "poi",
					// 		stylers: [{
					// 			color: "#e2f0cd"
					// 		}],
					// 	},
					// 	{
					// 		elementType: "labels.text",
					// 		stylers: [{
					// 			saturation: 2
					// 		}, {
					// 			weight: 0.3
					// 		}, {
					// 			color: "#a8a8a8"
					// 		}],
					// 	},
					// ];

					// map.addStyle({
					// 	styledMapName: "Styled Map",
					// 	styles: styles,
					// 	mapTypeId: "map_style",
					// });

					// map.setStyle("map_style");
				})();
			});
		</script>

		<script>
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

				$(".g-index1").slick({
					autoplay: true,
					speed: 800,
					autoplaySpeed: 1000,
					slidesToShow: 1,
					pauseOnHover: true,
					centerMode: true,
					cssEase: "linear",
					infinite: true,
					centerPadding: "0px",
					dots: false,
					arrows: true,
					cssEase: "ease",
					speed: 700,
					draggable: true,
					prevArrow: '<button class="Prev"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
					nextArrow: '<button class="Next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
					responsive: [{
							breakpoint: 800,
							settings: {
								arrows: true,
								slidesToShow: 1,
							},
						},
						{
							breakpoint: 600,
							settings: {
								arrows: true,
								slidesToShow: 1,
							},
						},
						{
							breakpoint: 350,
							settings: {
								arrows: true,
								slidesToShow: 1,
							},
						},
					],
				});
			});

			function refreshSLider(i) {
				var index = $(i).data('valindex');
				// $(".p-gambar-slider").removeClass("g-index");
				$(".gambarIndex" + index + "").slick({
					autoplay: true,
					speed: 800,
					autoplaySpeed: 1000,
					slidesToShow: 1,
					pauseOnHover: true,
					centerMode: true,
					cssEase: "linear",
					infinite: true,
					centerPadding: "0px",
					dots: false,
					arrows: true,
					cssEase: "ease",
					speed: 700,
					draggable: true,
					prevArrow: '<button class="Prev"><i class="fa fa-angle-left" aria-hidden="true"></i></button>',
					nextArrow: '<button class="Next"><i class="fa fa-angle-right" aria-hidden="true"></i></button>',
					responsive: [{
							breakpoint: 800,
							settings: {
								arrows: true,
								slidesToShow: 1,
							},
						},
						{
							breakpoint: 600,
							settings: {
								arrows: true,
								slidesToShow: 1,
							},
						},
						{
							breakpoint: 350,
							settings: {
								arrows: true,
								slidesToShow: 1,
							},
						},
					],
				});
			}
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
