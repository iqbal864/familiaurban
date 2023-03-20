		<!-- Breadcrumbs Area -->
		<?php
		if (!empty($gambar_kategori['nama_file'])) {
			$path_gambar = "uploads/images/kategori/" . $gambar_kategori['nama_file'];
		} else {
			$path_gambar = "assets/images/cover-property1.jpeg";
		} ?>
		<section class="breadcrumbs-area" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= base_url() ?><?= $path_gambar ?>');">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Breadcrumbs Content -->
						<div class="breadcrumbs-content">
							<h1 class="b-content-title m-0"><?= htmlentities($title_kategori) ?></h1>
							<ul class="breadcrumbs-menu list-none">
								<li><i class="fa fa-home"></i><a href="<?= base_url() ?>">Home</a></li>
								<li><a href="#"><?= htmlentities($title_kategori) ?></a></li>
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
								<?php if (sizeof($list_kategori) != 0) : ?>
									<?php foreach ($list_kategori as $lk) : ?>
										<?php if ($lk['id'] == $id_kategori) {
											$class_active = "";
										} else {
											$class_active = "primary";
										} ?>
										<a href="<?= base_url() ?>properti/<?= $lk['slug'] ?>" class="theme-btn <?= $class_active ?>"><?= htmlentities($lk['nama']) ?></a>

									<?php endforeach; ?>
								<?php endif; ?>
							</div>
							<?php if (!empty($desc_kategori['description'])) {
								$desc = $desc_kategori['description'];
							} else {
								$desc = "";
							} ?>
							<p><?= $desc ?></p>
						</div>
						<div class="row properti_list" style="margin-bottom:100px">
							<?php if (!empty($properti)) : ?>
								<?php foreach ($properti as $pt) : ?>
									<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
										<div class="single-p-slider">
											<!-- Single Recent Property -->
											<div class="single-recent-property">
												<div class="single-r-property-top2">
													<!-- Recent Property Img -->
													<div class="single-r-property-img2">
														<img src="<?= base_url() ?>uploads/images/properti/<?= $pt['nama_file'] ?>" alt="image">
													</div>
													<div class="property-for-sale" style="position:absolute; top:20px; left:20px;">
														<ul class="list-none">
															<!-- <li><a href="#">Hot</a></li> -->
															<li class="active"><a style="padding:2px 10px; font-size:10px" href="#"><?= htmlentities($pt['name_kategori']) ?></a></li>
														</ul>
													</div>
												</div>
												<!-- Single Recent Content -->
												<div class="s-property-content text-center" style="padding: 20px 13px;">
													<?php if (!empty($this->uri->segment(2))) {
														$slug_kategori = $this->uri->segment(2);
													} else {
														$id_kategori = $pt['id_kategori'];
														if (get_cookie('lang_is') === 'en') {
															$getSlugKatgeori = $this->db->query("SELECT slug_en as slug_kategori FROM kategori WHERE id = '$id_kategori'")->row_array();
															$slug_kategori = $getSlugKatgeori['slug_kategori'];
														} else {
															$getSlugKatgeori = $this->db->query("SELECT slug_id as slug_kategori FROM kategori WHERE id = '$id_kategori'")->row_array();
															$slug_kategori = $getSlugKatgeori['slug_kategori'];
														}
													} ?>
													<h6 class="srp-title"><a href="<?= base_url() ?>properti/<?= $slug_kategori ?>/<?= $pt['slug'] ?>"><?= htmlentities($pt['name_properti']) ?></a></h6>
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
									</div>
								<?php endforeach; ?>

								<?php
								$end_properti = end($properti);
								if (get_cookie('lang_is') === 'en') {
									$queryGetIdProperti = $this->db->get_where('properti', ['slug_en' => $end_properti['slug']])->row_array();
								} else {
									$queryGetIdProperti = $this->db->get_where('properti', ['slug_id' => $end_properti['slug']])->row_array();
								}
								?>
								<div class="load-more" lastID="<?= $queryGetIdProperti['id']; ?>" style="display: none;">
								</div>
								<div class="loadings" style="display:none;">
									<img style=" width:20px;" src="<?= base_url('assets/images/loading.gif'); ?>" alt="image" /> Loading more posts...
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>

			</div>
		</section>

		<script type="text/javascript">
			$(document).ready(function() {
				$(window).scroll(function() {
					var lastID = $('.load-more').attr('lastID');
					// if (($(window).scrollTop() + $(window).height() >= $(document).height()) && (lastID != 0)) {
					// if (($(window).scrollTop() >= $(document).height() - $(window).height()) && (lastID != 0)) {
					if (($(window).scrollTop() + $(window).height() > $(document).height() - 100) && (lastID != 0)) {
						// if (($(window).scrollTop() == $(document).height() - $(window).height()) && (lastID != 0)) {
						$('.load-more').remove();
						var timeDelay = 500; // MILLISECONDS (5 SECONDS).
						setTimeout(load_data, timeDelay);

						function load_data() {

							$.ajax({
								type: 'POST',
								url: '<?= base_url('properti/loadMoreData'); ?>',
								data: 'id=' + lastID,
								beforeSend: function() {
									$('.loadings').show();
								},
								success: function(html) {
									$('.loadings').remove();
									$('#list_more').hide();
									$('.properti_list').append(html);
									$('#list_more').fadeIn('slow');

								}
							});
						}
					}
				});
			});
		</script>
