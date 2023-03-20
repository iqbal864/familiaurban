<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1><?= $title3 ?></h1>
			<div>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>admins/admins">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url() ?>admins/item_properti"><?= $title ?></a></li>
						<li class="breadcrumb-item"><a href="<?= base_url() ?>admins/item_properti/tipe_properti/<?= $properti['slug_id'] ?>"><?= $title2 ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $title3 ?></li>
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
			<div class="col-8">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Form Gambar Tipe Properti</h3>
					</div>
					<div class="card-body">
						<form action="<?= base_url() ?>admins/item_properti/tipe_properti/gambar/gambar" id="form_gambar" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-12">
									<div class="form-group input_wrap_image">
										<label for="inputTambahan1">Galeri </label>
										<button class="add_field_button_image btn btn-xs btn-primary"><i class="fas fa-plus"></i></button>
										<div class="form-group div_kluster">
											<label for="inputKluster">Kluster</label>
											<input type="text" class="form-control <?= form_error('inputKluster') ? 'is-invalid' : '' ?>" name="inputKluster" id="inputKluster">
										</div>
										<div hidden class="form-group">
											<label for="inputId">Id</label>
											<input type="text" class="form-control <?= form_error('inputId') ? 'is-invalid' : '' ?>" name="inputId" id="inputId">
										</div>
										<div hidden class="form-group">
											<label for="inputCount">Count</label>
											<input type="text" class="form-control <?= form_error('inputCount') ? 'is-invalid' : '' ?>" value="0" name="inputCount" id="inputCount">
										</div>
										<?php if (sizeof($gambar) != 0) {
											$label_id = $gambar[0]['label_id'];
											$label_en = $gambar[0]['label_en'];
											$nama_file = $gambar[0]['nama_file'];
											$x_gambar = count($gambar);
										} else {
											$label_id = "";
											$label_en = "";
											$nama_file = "";
											$x_gambar = 1;
										} ?>

										<?php if (sizeof($gambar) != 0) : ?>
											<div class="mb-5 row" style="background-color: #F8F9F9;">
												<input hidden type="text" class="form-control" name="inputPath[]" id="inputPath1" value="<?= $gambar[0]['nama_file'] ?>" placeholder="">
												<input hidden type="text" class="form-control" name="inputIdGambar[]" id="inputIdGambar1" value="<?= $gambar[0]['id'] ?>" placeholder="">
												<div class="col-11">
													<input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputGaleri[]" id="inputGaleri1" multiple="multiple">
													<div style="text-align: center;" class="pt-3">
														<div id="preview1"><img src="<?= base_url() ?>uploads/images/properti/tipe/galeri/<?= $gambar[0]['nama_file'] ?>" width="150" height="auto" /></div>
														<button type="button" class="btn text-danger btn-delete-img1"><i class="fas fa-times-circle"></i></button>
													</div>
													<div class="">
														<div class="row">
															<div class="col-6">
																<input type="text" class="form-control" name="inputLabel[]" id="inputLabel1" value="<?= $gambar[0]['label_id'] ?>" placeholder="Masukan Captio bahasa indonesia">
															</div>
															<div class="col-6">
																<input type="text" class="form-control" name="inputLabel2[]" id="inputLabel21" value="<?= $gambar[0]['label_en'] ?>" placeholder="Masukan Captio bahasa inggris">
															</div>
														</div>
													</div>
												</div>
											</div>
											<?php for ($i = 1; $i < count($gambar); $i++) :
												$index = $i + 1 ?>
												<div class="mb-5 row" style="background-color: #F8F9F9;">
													<input hidden type="text" class="form-control" name="inputPath[]" id="inputPath<?= $index ?>" value="<?= $gambar[$i]['nama_file'] ?>" placeholder="">
													<input hidden type="text" class="form-control" name="inputIdGambar[]" id="inputIdGambar<?= $index ?>" value="<?= $gambar[$i]['id'] ?>" placeholder="">
													<div class="col-11">
														<input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputGaleri[]" id="inputGaleri<?= $index ?>" multiple="multiple">
														<div style="text-align: center;" class="pt-3">
															<div id="preview<?= $index ?>"><img src="<?= base_url() ?>uploads/images/properti/tipe/galeri/<?= $gambar[$i]['nama_file'] ?>" width="150" height="auto" /></div>
															<button type="button" class="btn text-danger btn-delete-img<?= $index ?>"><i class="fas fa-times-circle"></i></button>
														</div>
														<div class="">
															<div class="row">
																<div class="col-6">
																	<input type="text" class="form-control" name="inputLabel[]" id="inputLabel<?= $index ?>" value="<?= $gambar[$i]['label_id'] ?>" placeholder="Masukan Captio bahasa indonesia">
																</div>
																<div class="col-6">
																	<input type="text" class="form-control" name="inputLabel2[]" id="inputLabel2<?= $index ?>" value="<?= $gambar[$i]['label_en'] ?>" placeholder="Masukan Captio bahasa inggris">
																</div>
															</div>
														</div>
													</div>
													<div class="col-1">
														<button class="btn btn-xs btn-outline-danger remove_field2" data-value="<?= $index ?>" type="button">
															<i class="fas fa-trash-alt"></i>
														</button>
													</div>
													<script id="script<?= $index ?>">
														$(document).ready(function() {
															$("#inputLabel<?= $index ?>").show();
															$("#inputLabel2<?= $index ?>").show();
															$(".btn-delete-img<?= $index ?>").show();
															$("#inputGaleri<?= $index ?>").change(function() {
																imagePreview2(this, <?= $index ?>);
																$("#inputLabel<?= $index ?>").show();
																$("#inputLabel2<?= $index ?>").show();
															});
															$(".btn-delete-img<?= $index ?>").on("click", function() {
																$("#inputPath<?= $index ?>").val(null);
																$("#inputGaleri<?= $index ?>").val(null);
																$("#preview<?= $index ?>").empty();
																$(".btn-delete-img<?= $index ?>").hide();
																$("#inputLabel<?= $index ?>").hide();
																$("#inputLabel2<?= $index ?>").hide();
															});
														});
													</script>
												</div>
											<?php endfor; ?>
										<?php else : ?>
											<div class="mb-5 row" style="background-color: #F8F9F9;">
												<div class="col-11">
													<input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputGaleri[]" id="inputGaleri1" multiple="multiple">
													<div style="text-align: center;" class="pt-3">
														<div id="preview1"></div>
														<button type="button" class="btn text-danger btn-delete-img1"><i class="fas fa-times-circle"></i></button>
													</div>
													<div class="">
														<div class="row">
															<div class="col-6">
																<input type="text" class="form-control" name="inputLabel[]" id="inputLabel1" value="" placeholder="Masukan Captio bahasa indonesia">
															</div>
															<div class="col-6">
																<input type="text" class="form-control" name="inputLabel2[]" id="inputLabel21" value="" placeholder="Masukan Captio bahasa inggris">
															</div>
														</div>
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
						<a href="<?= base_url() ?>admins/item_properti/tipe_properti/<?= $properti['slug_id'] ?>" class="btn btn-light" style="border: 1px solid #000;"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
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


		$('.div_kluster').hide();
		$('#inputKluster').val('<?= $this->uri->segment(4) ?>');
		$('#inputId').val('<?= $this->uri->segment(6) ?>');

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
					'<div class="col-11">' +
					'<input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputGaleri[]" id="inputGaleri' + x_image + '" multiple="multiple">' +
					'<div style="text-align: center;" class="pt-3">' +
					'<div id="preview' + x_image + '"></div>' +
					'<button type="button" class="btn text-danger btn-delete-img' + x_image + '"><i class="fas fa-times-circle"></i></button>' +
					'</div>' +
					'<div class="">' +
					'<div class="row">' +
					'<div class="col-6">' +
					'<input type="text" class="form-control" name="inputLabel[]" id="inputLabel' + x_image + '" value="" placeholder="Masukan Caption bahasa indonesia">' +
					'</div>' +
					'<div class="col-6">' +
					'<input type="text" class="form-control" name="inputLabel2[]" id="inputLabel2' + x_image + '" value="" placeholder="Masukan Captio bahasa inggris">' +
					'</div>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'<div class="col-1">' +
					'<button class="btn btn-xs btn-outline-danger remove_field2" data-value="' + x_image + '" type="button">' +
					'<i class="fas fa-trash-alt"></i>' +
					'</button>' +
					'</div>' +
					'<script id="script' + x_image + '">' +
					'$(document).ready(function() {' +
					'$(".btn-delete-img' + x_image + '").hide();' +
					'$("#inputLabel' + x_image + '").hide();' +
					'$("#inputLabel2' + x_image + '").hide();' +
					'$("#inputGaleri' + x_image + '").change(function() {' +
					'imagePreview2(this, ' + x_image + ');' +
					'$("#inputLabel' + x_image + '").show();' +
					'$("#inputLabel2' + x_image + '").show();' +
					'});' +
					'$(".btn-delete-img' + x_image + '").on("click", function() {' +
					'$("#inputGaleri' + x_image + '").val(null);' +
					'$("#preview' + x_image + '").empty();' +
					'$(".btn-delete-img' + x_image + '").hide();' +
					'$("#inputLabel' + x_image + '").hide();' +
					'$("#inputLabel2' + x_image + '").hide();' +
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
			$file_before = FCPATH . './uploads/images/properti/tipe/galeri/' . $gambar[0]['nama_file'];
			if ($gambar[0]['nama_file'] == '') : ?>
				$('.btn-delete-img1').hide();
				$("input[name='inputLabel[]']").hide();
				$("input[name='inputLabel2[]']").hide();
			<?php elseif (file_exists($file_before)) : ?>
				$('.btn-delete-img1').show();
				$("input[name='inputLabel[]']").show();
				$("input[name='inputLabel2[]']").show();
			<?php else : ?>
				$('.btn-delete-img1').hide();
				$("input[name='inputLabel[]']").hide();
				$("input[name='inputLabel2[]']").hide();
			<?php endif; ?>
		<?php else : ?>
			$('.btn-delete-img1').hide();
			$("input[name='inputLabel[]']").hide();
			$("input[name='inputLabel2[]']").hide();
		<?php endif; ?>


	});

	function imagePreview2(fileInput, val) {
		if (fileInput.files && fileInput.files[0]) {
			var fileReader = new FileReader();
			fileReader.onload = function(event) {
				$("#preview" + val + "").html('<img src="' + event.target.result + '" width="150" height="auto"/>');
			};
			fileReader.readAsDataURL(fileInput.files[0]);
			$('.btn-delete-img' + val + '').show();
		}
	}
	$("#inputGaleri1").change(function() {
		imagePreview2(this, 1);
		$('#inputLabel1').show();
		$('#inputLabel21').show();
	});
	$(".btn-delete-img1").on('click', function() {
		$("#inputPath1").val(null);
		$("#inputGaleri1").val(null);
		$("#preview1").empty();
		$('.btn-delete-img1').hide();
		$('#inputLabel1').hide();
		$('#inputLabel21').hide();
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
