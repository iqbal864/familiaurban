    <?php foreach ($properti as $pt) : ?>
    	<div class="col-lg-3 col-md-4 col-sm-12 col-xs-12" id="list_more">
    		<div class="single-p-slider">
    			<!-- Single Recent Property -->
    			<div class="single-recent-property" style="margin-top: 20px;">
    				<div class="single-r-property-top2">
    					<!-- Recent Property Img -->
    					<div class="single-r-property-img2">
    						<img src="<?= base_url() ?>uploads/images/properti/<?= $pt['nama_file'] ?>" alt="#">
    					</div>
    					<div class="property-for-sale" style="position:absolute; top:20px; left:20px;">
    						<ul class="list-none">
    							<!-- <li><a href="#">Hot</a></li> -->
    							<li class="active"><a style="padding:2px 10px; font-size:10px" href="#"><?= $pt['name_kategori'] ?></a></li>
    						</ul>
    					</div>
    				</div>
    				<!-- Single Recent Content -->
    				<div class="s-property-content text-center" style="padding: 20px 13px;">
    					<h6 class="srp-title"><a href="<?= base_url() ?>properti/<?= $this->uri->segment(2) ?>/<?= $pt['slug'] ?>"><?= $pt['name_properti'] ?></a></h6>
    					<!-- <p class="property-location mb-0"><i class="fa fa-map-marker-alt"></i><?= $pt['alamat'] ?></p> -->
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
	} ?>
    <?php if ($postNum > $postLimit) { ?>
    	<div class="load-more" lastID="<?= $queryGetIdProperti['id']; ?>" style="display: none;">
    	</div>
    	<div class="loading" style="display: none;">
    		<img src="<?= base_url('assets/images/loading.gif'); ?>" alt="image" /> Loading...
    	</div>
    <?php } else { ?>
    	<div class="load-more" lastID="0">

    	</div>
    <?php } ?>
