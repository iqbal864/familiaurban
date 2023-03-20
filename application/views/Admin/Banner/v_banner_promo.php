<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1><?= $title ?></h1>
			<div>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>admins/admins">Dashboard</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
					</ol>
				</nav>
			</div>
		</div>
		<!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<!-- Default box -->
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Form Banner Promo</h3>
					</div>
					<div class="card-body">
						<form action="<?= base_url() ?>admins/banner/banner/banner" id="form_gambar" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-12">
									<div class="form-group input_wrap_image">
										<label for="inputTambahan1">Banner </label>
										<button class="add_field_button_image btn btn-xs btn-primary"><i class="fas fa-plus"></i></button>
										<div class="row">
											<div class="col-6">
												<label for="inputSpek1"><small><b>(Desktop / Landscape)</b></small></label>
											</div>
											<div class="col-6">
												<label for="inputSpek1"><small><b>(Mobile / Potrait)</b></small></label>
											</div>
										</div>
										<div hidden class="form-group">
											<label for="inputCount">Count</label>
											<input type="text" class="form-control <?= form_error('inputCount') ? 'is-invalid' : '' ?>" value="0" name="inputCount" id="inputCount">
										</div>
										<?php if (sizeof($gambar) != 0) {
											$url_desktop = $gambar[0]['url_file_desktop'];
											$url_mobile = $gambar[0]['url_file_mobile'];
											$file_desktop = $gambar[0]['file_desktop'];
											$file_mobile = $gambar[0]['file_mobile'];
											$x_gambar = count($gambar);
										} else {
											$url_desktop = "";
											$url_mobile = "";
											$file_desktop = "";
											$file_mobile = "";
											$x_gambar = 1;
										} ?>

										<?php if (sizeof($gambar) != 0) : ?>
											<div class="mb-5 row" style="background-color: #F8F9F9;">
												<input hidden type="text" class="form-control" name="inputPathDesktop[]" id="inputPathDesktop1" value="<?= $gambar[0]['file_desktop'] ?>" placeholder="">
												<input hidden type="text" class="form-control" name="inputPathMobile[]" id="inputPathMobile1" value="<?= $gambar[0]['file_mobile'] ?>" placeholder="">
												<input hidden type="text" class="form-control" name="inputIdGambar[]" id="inputIdGambar1" value="<?= $gambar[0]['id'] ?>" placeholder="">
												<div class="col-5">
													<input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputDesktop[]" id="inputDesktop1" multiple="multiple">
													<div style="text-align: center;" class="pt-3">
														<?php if ($gambar[0]['file_desktop'] != "") : ?>
															<div id="preview_desktop1"><img src="<?= base_url() ?>uploads/images/banner/<?= $gambar[0]['file_desktop'] ?>" width="150" height="auto" /></div>
														<?php else : ?>
															<div id="preview_desktop1"></div>
														<?php endif; ?>
														<button type="button" class="btn text-danger btn-delete-img-desktop1"><i class="fas fa-times-circle"></i></button>
													</div>
													<div class="">
														<input type="text" class="form-control" name="inputUrlDesktop[]" id="inputUrlDesktop1" value="<?= htmlentities($gambar[0]['url_file_desktop']) ?>" placeholder="Masukan url promo">
													</div>
												</div>
												<div class="col-1"></div>
												<div class="col-5">
													<input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputMobile[]" id="inputMobile1" multiple="multiple">
													<div style="text-align: center;" class="pt-3">
														<?php if ($gambar[0]['file_mobile'] != "") : ?>
															<div id="preview_mobile1"><img src="<?= base_url() ?>uploads/images/banner/<?= $gambar[0]['file_mobile'] ?>" width="150" height="auto" /></div>
														<?php else : ?>
															<div id="preview_mobile1"></div>
														<?php endif; ?>
														<button type="button" class="btn text-danger btn-delete-img-mobile1"><i class="fas fa-times-circle"></i></button>
													</div>
													<div class="">
														<input type="text" class="form-control" name="inputUrlMobile[]" id="inputUrlMobile1" value="<?= htmlentities($gambar[0]['url_file_mobile']) ?>" placeholder="Masukan url promo">
													</div>
												</div>
											</div>
											<?php for ($i = 1; $i < count($gambar); $i++) :
												$index = $i + 1 ?>
												<div class="mb-5 row" style="background-color: #F8F9F9;">
													<input hidden type="text" class="form-control" name="inputPathDesktop[]" id="inputPathDesktop<?= $index ?>" value="<?= $gambar[$i]['file_desktop'] ?>" placeholder="">
													<input hidden type="text" class="form-control" name="inputPathMobile[]" id="inputPathMobile<?= $index ?>" value="<?= $gambar[$i]['file_mobile'] ?>" placeholder="">
													<input hidden type="text" class="form-control" name="inputIdGambar[]" id="inputIdGambar<?= $index ?>" value="<?= $gambar[$i]['id'] ?>" placeholder="">
													<div class="col-5">
														<input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputDesktop[]" id="inputDesktop<?= $index ?>" multiple="multiple">
														<div style="text-align: center;" class="pt-3">
															<?php if ($gambar[$i]['file_desktop'] != "") : ?>
																<div id="preview_desktop<?= $index ?>"><img src="<?= base_url() ?>uploads/images/banner/<?= $gambar[$i]['file_desktop'] ?>" width="150" height="auto" /></div>
															<?php else : ?>
																<div id="preview_desktop<?= $index ?>"></div>
															<?php endif; ?>
															<button type="button" class="btn text-danger btn-delete-img-desktop<?= $index ?>"><i class="fas fa-times-circle"></i></button>
														</div>
														<div class="">
															<input type="text" class="form-control" name="inputUrlDesktop[]" id="inputUrlDesktop<?= $index ?>" value="<?= htmlentities($gambar[$i]['url_file_desktop']) ?>" placeholder="Masukan url promo">
														</div>
													</div>
													<div class="col-1"></div>
													<div class="col-5">
														<input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputMobile[]" id="inputMobile<?= $index ?>" multiple="multiple">
														<div style="text-align: center;" class="pt-3">
															<?php if ($gambar[$i]['file_mobile'] != "") : ?>
																<div id="preview_mobile<?= $index ?>"><img src="<?= base_url() ?>uploads/images/banner/<?= $gambar[$i]['file_mobile'] ?>" width="150" height="auto" /></div>
															<?php else : ?>
																<div id="preview_mobile<?= $index ?>"></div>
															<?php endif; ?>
															<button type="button" class="btn text-danger btn-delete-img-mobile<?= $index ?>"><i class="fas fa-times-circle"></i></button>
														</div>
														<div class="">
															<input type="text" class="form-control" name="inputUrlMobile[]" id="inputUrlMobile<?= $index ?>" value="<?= htmlentities($gambar[$i]['url_file_mobile']) ?>" placeholder="Masukan url promo">
														</div>
													</div>
													<div class="col-1">
														<button class="btn btn-xs btn-outline-danger remove_field2" data-value="<?= $index ?>" type="button">
															<i class="fas fa-trash-alt"></i>
														</button>
													</div>
													<script id="script<?= $index ?>">
														$(document).ready(function() {
															<?php
															if (sizeof($gambar) != 0) :
																$file_before_desktop = FCPATH . './uploads/images/banner/' . $gambar[$i]['file_desktop'];
																$file_before_mobile = FCPATH . './uploads/images/banner/' . $gambar[$i]['file_mobile'];
																if ($gambar[$i]['file_desktop'] == '') : ?>
																	$('.btn-delete-img-desktop<?= $index ?>').hide();
																	$("#inputUrlDesktop<?= $index ?>").hide();
																<?php elseif (file_exists($file_before_desktop)) : ?>
																	$('.btn-delete-img-desktop<?= $index ?>').show();
																	$("#inputUrlDesktop<?= $index ?>").show();
																<?php else : ?>
																	$('.btn-delete-img-desktop<?= $index ?>').hide();
																	$("#inputUrlDesktop<?= $index ?>").hide();
																<?php endif; ?>

																<?php if ($gambar[$i]['file_mobile'] == '') : ?>
																	$('.btn-delete-img-mobile<?= $index ?>').hide();
																	$("#inputUrlMobile<?= $index ?>").hide();
																<?php elseif (file_exists($file_before_mobile)) : ?>
																	$('.btn-delete-img-mobile<?= $index ?>').show();
																	$("#inputUrlMobile<?= $index ?>").show();
																<?php else : ?>
																	$('.btn-delete-img-mobile<?= $index ?>').hide();
																	$("#inputUrlMobile<?= $index ?>").hide();
																<?php endif; ?>

															<?php else : ?>
																$('.btn-delete-img-desktop<?= $index ?>').hide();
																$("#inputUrlDesktop<?= $index ?>").hide();
																$('.btn-delete-img-mobile<?= $index ?>').hide();
																$("#inputUrlMobile<?= $index ?>").hide();
															<?php endif; ?>

															$("#inputDesktop<?= $index ?>").change(function() {
																imagePreviewDesktop(this, <?= $index ?>);
																$('#inputUrlDesktop<?= $index ?>').show();
															});
															$("#inputMobile<?= $index ?>").change(function() {
																imagePreviewMobile(this, <?= $index ?>);
																$('#inputUrlMobile<?= $index ?>').show();
															});
															$(".btn-delete-img-desktop<?= $index ?>").on("click", function() {
																$("#inputPathDesktop<?= $index ?>").val(null);
																$("#inputDesktop<?= $index ?>").val(null);
																$("#preview_desktop<?= $index ?>").empty();
																$(".btn-delete-img-desktop<?= $index ?>").hide();
																$("#inputUrlDesktop<?= $index ?>").hide();
															});
															$(".btn-delete-img-mobile<?= $index ?>").on("click", function() {
																$("#inputPathMobile<?= $index ?>").val(null);
																$("#inputMobile<?= $index ?>").val(null);
																$("#preview_mobile<?= $index ?>").empty();
																$(".btn-delete-img-mobile<?= $index ?>").hide();
																$("#inputUrlMobile<?= $index ?>").hide();
															});
														});
													</script>
												</div>
											<?php endfor; ?>
										<?php else : ?>
											<div class="mb-5 row" style="background-color: #F8F9F9;">
												<div class="col-5">
													<input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputDesktop[]" id="inputDesktop1" multiple="multiple">
													<div style="text-align: center;" class="pt-3">
														<div id="preview_desktop1"></div>
														<button type="button" class="btn text-danger btn-delete-img-desktop1"><i class="fas fa-times-circle"></i></button>
													</div>
													<div class="">
														<input type="text" class="form-control" name="inputUrlDesktop[]" id="inputUrlDesktop1" value="" placeholder="Masukan url promo">
													</div>
												</div>
												<div class="col-1"></div>
												<div class="col-5">
													<input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputMobile[]" id="inputMobile1" multiple="multiple">
													<div style="text-align: center;" class="pt-3">
														<div id="preview_mobile1"></div>
														<button type="button" class="btn text-danger btn-delete-img-mobile1"><i class="fas fa-times-circle"></i></button>
													</div>
													<div class="">
														<input type="text" class="form-control" name="inputUrlMobile[]" id="inputUrlMobile1" value="" placeholder="Masukan url promo">
													</div>
												</div>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="card-footer text-right">
						<button type="button" class="btn btn-primary btn-gambar"><i class="fas fa-save"></i> Simpan</button>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		</div>

	</section>

</div>

<script>
	$(document).ready(function() {
		var max_fields_image = 10; //maximum input boxes allowed
		var wrapper_image = $(".input_wrap_image"); //Fields wrapper
		var add_button_image = $(".add_field_button_image"); //Add button ID

		var x_image = $('#inputCount').val() + <?= $x_gambar ?>;
		var index = $('#inputCount').val() + <?= $x_gambar ?>;
		//initlal text box count
		$(add_button_image).click(function(e) { //on add input button click
			e.preventDefault();
			if (index < max_fields_image) { //max input box allowed
				x_image++; //text box increment
				index++;
				$(wrapper_image).append('<div class="mb-5 row" style="background-color: #F8F9F9;">' +
					'<div class="col-5">' +
					'<input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputDesktop[]" id="inputDesktop' + x_image + '" multiple="multiple">' +
					'<div style="text-align: center;" class="pt-3">' +
					'<div id="preview_desktop' + x_image + '"></div>' +
					'<button type="button" class="btn text-danger btn-delete-img-desktop' + x_image + '"><i class="fas fa-times-circle"></i></button>' +
					'</div>' +
					'<div class="">' +
					'<input type="text" class="form-control" name="inputUrlDesktop[]" id="inputUrlDesktop' + x_image + '" value="" placeholder="Masukan url promo">' +
					'</div>' +
					'</div>' +
					'<div class="col-1"></div>' +
					'<div class="col-5">' +
					'<input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputMobile[]" id="inputMobile' + x_image + '" multiple="multiple">' +
					'<div style="text-align: center;" class="pt-3">' +
					'<div id="preview_mobile' + x_image + '"></div>' +
					'<button type="button" class="btn text-danger btn-delete-img-mobile' + x_image + '"><i class="fas fa-times-circle"></i></button>' +
					'</div>' +
					'<div class="">' +
					'<input type="text" class="form-control" name="inputUrlMobile[]" id="inputUrlMobile' + x_image + '" value="" placeholder="Masukan url promo">' +
					'</div>' +
					'</div>' +
					'<div class="col-1">' +
					'<button class="btn btn-xs btn-outline-danger remove_field2" data-value="' + x_image + '" type="button">' +
					'<i class="fas fa-trash-alt"></i>' +
					'</button>' +
					'</div>' +
					'<script id="script' + x_image + '">' +
					'$(document).ready(function() {' +
					'$(".btn-delete-img-desktop' + x_image + '").hide();' +
					'$(".btn-delete-img-mobile' + x_image + '").hide();' +
					'$("#inputUrlDesktop' + x_image + '").hide();' +
					'$("#inputUrlMobile' + x_image + '").hide();' +
					'$("#inputDesktop' + x_image + '").change(function() {' +
					'imagePreviewDesktop(this, ' + x_image + ');' +
					'$("#inputUrlDesktop' + x_image + '").show();' +
					'});' +
					'$("#inputMobile' + x_image + '").change(function() {' +
					'imagePreviewMobile(this, ' + x_image + ');' +
					'$("#inputUrlMobile' + x_image + '").show();' +
					'});' +
					'$(".btn-delete-img-desktop' + x_image + '").on("click", function() {' +
					'$("#inputDesktop' + x_image + '").val(null);' +
					'$("#preview_desktop' + x_image + '").empty();' +
					'$(".btn-delete-img-desktop' + x_image + '").hide();' +
					'$("#inputUrlDesktop' + x_image + '").hide();' +
					'});' +
					'$(".btn-delete-img-mobile' + x_image + '").on("click", function() {' +
					'$("#inputMobile' + x_image + '").val(null);' +
					'$("#preview_mobile' + x_image + '").empty();' +
					'$(".btn-delete-img-mobile' + x_image + '").hide();' +
					'$("#inputUrlMobile' + x_image + '").hide();' +
					'});' +
					'})'); //add input box


				$('#inputCount').val(index);
			}
		});

		$(wrapper_image).on("click", ".remove_field2", function(e) { //user click on remove text
			e.preventDefault();
			// $('#script' + $(this).data("value") + '').remove();
			$(this).parent('div').parent('div').remove();
			index--;
		})

		<?php
		if (sizeof($gambar) != 0) :
			$file_before_desktop = FCPATH . './uploads/images/banner/' . $gambar[0]['file_desktop'];
			$file_before_mobile = FCPATH . './uploads/images/banner/' . $gambar[0]['file_mobile'];
			if ($gambar[0]['file_desktop'] == '') : ?>
				$('.btn-delete-img-desktop1').hide();
				// $("input[name='inputUrlDesktop[]']").hide();
				$("#inputUrlDesktop1").hide();
			<?php elseif (file_exists($file_before_desktop)) : ?>
				$('.btn-delete-img-desktop1').show();
				// $("input[name='inputUrlDesktop[]']").show();
				$("#inputUrlDesktop1").show();
			<?php else : ?>
				$('.btn-delete-img-desktop1').hide();
				// $("input[name='inputUrlDesktop[]']").hide();
				$("#inputUrlDesktop1").hide();
			<?php endif; ?>

			<?php if ($gambar[0]['file_mobile'] == '') : ?>
				$('.btn-delete-img-mobile1').hide();
				// $("input[name='inputUrlMobile[]']").hide();
				$("#inputUrlMobile1").hide();
			<?php elseif (file_exists($file_before_mobile)) : ?>
				$('.btn-delete-img-mobile1').show();
				// $("input[name='inputUrlMobile[]']").show();
				$("#inputUrlMobile1").show();
			<?php else : ?>
				$('.btn-delete-img-mobile1').hide();
				// $("input[name='inputUrlMobile[]']").hide();
				$("#inputUrlMobile1").hide();
			<?php endif; ?>

		<?php else : ?>
			$('.btn-delete-img-desktop1').hide();
			// $("input[name='inputUrlDesktop[]']").hide();
			$("#inputUrlDesktop1").hide();

			$('.btn-delete-img-mobile1').hide();
			// $("input[name='inputUrlMobile[]']").hide();
			$("#inputUrlMobile1").hide();
		<?php endif; ?>


	});

	function imagePreviewDesktop(fileInput, val) {
		if (fileInput.files && fileInput.files[0]) {
			var fileReader = new FileReader();
			fileReader.onload = function(event) {
				$("#preview_desktop" + val + "").html('<img src="' + event.target.result + '" width="150" height="auto"/>');
			};
			fileReader.readAsDataURL(fileInput.files[0]);
			$('.btn-delete-img-desktop' + val + '').show();
		}
	}

	function imagePreviewMobile(fileInput, val) {
		if (fileInput.files && fileInput.files[0]) {
			var fileReader = new FileReader();
			fileReader.onload = function(event) {
				$("#preview_mobile" + val + "").html('<img src="' + event.target.result + '" width="150" height="auto"/>');
			};
			fileReader.readAsDataURL(fileInput.files[0]);
			$('.btn-delete-img-mobile' + val + '').show();
		}
	}

	$("#inputDesktop1").change(function() {
		imagePreviewDesktop(this, 1);
		$('#inputUrlDesktop1').show();
	});
	$("#inputMobile1").change(function() {
		imagePreviewMobile(this, 1);
		$('#inputUrlMobile1').show();
	});
	$(".btn-delete-img-desktop1").on('click', function() {
		$("#inputPathDesktop1").val(null);
		$("#inputDesktop1").val(null);
		$("#preview_desktop1").empty();
		$('.btn-delete-img-desktop1').hide();
		$('#inputUrlDesktop1').hide();
	});

	$(".btn-delete-img-mobile1").on('click', function() {
		$("#inputPathMobile1").val(null);
		$("#inputMobile1").val(null);
		$("#preview_mobile1").empty();
		$('.btn-delete-img-mobile1').hide();
		$('#inputUrlMobile1').hide();
	});

	$('.btn-gambar').on('click', function() {
		var form = $('#form_gambar')[0];
		var data_form = new FormData(form);
		$.ajax({
			url: $('#form_gambar').attr('action'),
			method: 'POST',
			enctype: 'multipart/form-data',
			data: data_form,
			dataType: 'json',
			contentType: false,
			processData: false,
			chace: false,
			beforeSend: function() {
				$('.btn-gambar').attr('disabled', 'disabled');
				$('.btn-gambar').html('<i class="fas fa-spinner fa-spin"></i> In Process');
			},
			complete: function() {
				$('.btn-gambar').removeAttr('disabled', 'disabled');
				$('.btn-gambar').html('<i class="fas fa-save"></i> Tambah');
			},
			success: function(data) {

				// if (data.gagal) {

				//     window.location.href = "<?= base_url() ?>" + data.gagal;

				// }
				if (data.status == false) {
					for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
						$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
						if (data.valid[i] == true) {
							$('[name="' + data.inputerror[i] + '"]').removeClass('is-invalid');
							$('[name="' + data.inputerror[i] + '"]').addClass('is-valid');
							$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
						}
						// console.log(data.inputerror[i]);
					}
				}
				if (data.berhasil) {
					window.location.href = "<?= base_url() ?>" + data.berhasil;

				}
			}

		});
	});
</script>

<?php if ($this->session->flashdata('berhasil_tambah') == TRUE) : ?>
	<script>
		$(document).ready(function() {
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000,
				backdrop: false
			});

			Toast.fire({
				icon: 'success',
				title: "<?= $this->session->flashdata('berhasil_tambah') ?>"
			})
		});
	</script>
<?php endif; ?>
