<!-- Breadcrumbs Area -->
<?php
if (!empty($gambar_kategori['nama_file'])) {
	$path_gambar = "uploads/images/kategori/" . $gambar_kategori['nama_file'];
} else {
	$path_gambar = "assets/images/cover-property1.jpeg";
} ?>
<section class="breadcrumbs-area" style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('<?= base_url() ?>assets/images/contact.jpeg');">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<!-- Breadcrumbs Content -->
				<div class="breadcrumbs-content">
					<h1 class="b-content-title m-0"><?= $title_kontak_kami ?></h1>
					<ul class="breadcrumbs-menu list-none">
						<li><i class="fa fa-home"></i><a href="<?= base_url() ?>">Home</a></li>
						<li><a href="#"><?= $title_kontak_kami ?></a></li>
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
			<div class="col-7">
				<div class="contact-form" style="margin-top:100px; margin-bottom:100px;">
					<form action="kontak/kontak_kami" method="post" id="form_kontak" class="c-form-inner" style="background: #fff; padding:0px;">
						<!-- <h2 class="b-comments-title">Send Us a Message</h2> -->
						<div class="row">
							<div class="col-12">
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<input name="name" type="text" placeholder="<?= $title_nama ?>" required="required" style="background: #fff;">
											<!-- <i class="fa fa-user"></i> -->
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input name="email" type="email" placeholder="<?= $title_email ?>" required="required" style="background: #fff;">
											<!-- <i class="fa fa-envelope"></i> -->
										</div>
									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<select name="subjek" id="select_subjek" type="text" placeholder="<?= $title_subjek ?>" required="required" style="background: #fff;">
												<option disabled selected value=""><?= $title_subjek ?></option>
												<?php foreach ($subjek_email as $se) : ?>
													<option value="<?= $se['id'] ?>"><?= $se['subjek'] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<input name="no_hp" type="number" placeholder="<?= $title_no_telp ?>" required="required" style="background: #fff;">
											<!-- <i class="fas fa-phone"></i> -->
										</div>
									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<textarea name="comment" placeholder="<?= $title_pesan ?>" required="required" style="background: #fff;"></textarea>
									<!-- <i class="fa fa-pencil-alt"></i> -->
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<div class="g-recaptcha" data-sitekey="6LdWhiEkAAAAAH9L-Wgvjm4F9CstUKS-bJ745ExN" id='recaptcha'></div>
								</div>

								<div class="form-group">
									<div class="alertBox"></div>
								</div>
							</div>
							<div class="col-12">
								<div class="comment-form-btn">
									<button class="theme-btn" type="submit"><?= $title_kirim_pesan ?></button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="col-1">

			</div>
			<div class="col-4">
				<div class="contact-form" style="margin-top:100px; margin-bottom:100px;">
					<div style="background: #F8F9F9; display:inline-block; padding: 20px;">
						<h4 class="heading-title"><?= $title_informasi_kontak ?></h4>
						<div class="accordion" id="accordionExample">
							<ul class="fa-ul" style="margin-left: 1.5rem;">
								<li style="margin-bottom: 10px;"><span class="fa-li"><i class="fas fa-phone" style="color: #f07f16;"></i></span><?= $kontak['telp'] ?></li>
								<li style="margin-bottom: 10px;"><span class="fa-li"><i class="fab fa-whatsapp" style="color: #f07f16;"></i></span><?= $kontak['no_wa'] ?></li>
								<li style="margin-bottom: 10px;"><span class="fa-li"><i class="fa fa-envelope" style="color: #f07f16;"></i></span><?= $kontak['email'] ?></li>
								<li style="margin-bottom: 10px;"><span class="fa-li"><i class="fa fa-map-marker-alt" style="color: #f07f16;"></i></span><?= htmlentities($alamat['alamat']) ?></li>
							</ul>
						</div>
						<div class="propery-map" style="height:300px;">
							<div id="myMap" class="map" style="max-height: 300px;"></div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>


</section>


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
	$(document).ready(function() {

		(function() {
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
	$(function() {
		var captcha;
		onloadCallback = function() {
			captcha = grecaptcha.render(document.getElementById('recaptcha'), {
				'sitekey': "6LdWhiEkAAAAAH9L-Wgvjm4F9CstUKS-bJ745ExN",
				'theme': 'light'
			});
		}

		//mendaftarkan event  submit pada event handler .Dengan kata lain, ketika user menklik tombol kirim, blok code inilah yang akan dijalankan
		$("#form_kontak").on("submit", function(evt) {
			evt.preventDefault();

			var _this = $(this);
			var nilai = _this.serialize();
			console.log(nilai);

			$.ajax({
				type: "POST",
				url: _this.attr("action"),
				data: nilai,
				cache: false,
				dataType: "json",
				success: function(a) {
					console.log(a);
					if (a.status == "berhasil") {
						_this.find("input,textarea").val("");
						$(".alertBox").html("<span class='alert alert-success'>" + a.pesan + "</span>");
					} else {
						$(".alertBox").html("<span class='alert alert-danger'>" + a.pesan + "</span>");
					}
				},
				error: function(a, b, c) {
					// console.log("Coba sekali lagi");
				},
				complete: function() {
					grecaptcha.reset();
				}
			});


		})

	});
</script>
