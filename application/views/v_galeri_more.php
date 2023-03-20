    <?php foreach ($data_galeri as $pt) : ?>
    	<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12" id="list_more">
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
	$end_gambar = end($data_galeri); ?>
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
