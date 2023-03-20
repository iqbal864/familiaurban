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
								<img style="height: 180px; width:-webkit-fill-available; width:-moz-available;" src="https://img.youtube.com/vi/<?= $id_url ?>/mqdefault.jpg" alt="#">
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
	$end_gambar = end($data_testimoni); ?>
	<?php if ($postNum > $postLimit) { ?>
		<div class="load-more" lastID="<?= $end_gambar['id']; ?>" style="display: none;">
		</div>
		<div class="loading" style="display: none;">
			<img src="<?= base_url('assets/images/loading.gif'); ?>" alt="image" /> Loading...
		</div>
	<?php } else { ?>
		<div class="load-more" lastID="0">

		</div>
	<?php } ?>
<?php endif; ?>
