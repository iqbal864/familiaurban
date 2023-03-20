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
						<h3 class="card-title">Form Kontak</h3>
					</div>
					<div class="card-body">
						<form action="<?= base_url() ?>admins/kontak/kontak/kontak" id="form_kontak" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-8">
									<div class="form-group input_wrap">
										<div class="mb-3">
											<label for="inputSpek1">List Subjek Email</label>
											<button class="add_field_button btn btn-xs btn-primary"><i class="fas fa-plus"></i></button>
										</div>

										<?php if (sizeof($subjek_email) != 0) {
											$x = count($subjek_email);
										} else {
											$x = 1;
										} ?>

										<?php if (sizeof($subjek_email) != 0) : ?>
											<div class="row mb-5" style="background-color: #f4f6f6;">
												<div class="col-11">
													<div class="form-group">
														<div class="row">
															<input hidden type="text" class="form-control" name="id_subjek[]" value="<?= $subjek_email[0]['id'] ?>">
															<div class="col-6">
																<label for="inputSubjek">Subjek <small><b>(Indonesia)</b></small></label>
																<input type="text" class="form-control <?= form_error('inputSubjek') ? 'is-invalid' : '' ?>" name="inputSubjek_id[]" id="inputSubjek_id" value="<?= $subjek_email[0]['subjek_id'] ?>" placeholder="Masukan Subjek dalam bahasa indonesia">
																<div class="invalid-feedback"><?= form_error('inputSubjek_id') ?></div>
															</div>
															<div class="col-6">
																<label for="inputSubjek">Subjek <small><b>(Inggris)</b></small></label>
																<input type="text" class="form-control <?= form_error('inputSubjek') ? 'is-invalid' : '' ?>" name="inputSubjek_en[]" id="inputSubjek_en" value="<?= $subjek_email[0]['subjek_en'] ?>" placeholder="Masukan Subjek dalam bahasa inggris">
																<div class="invalid-feedback"><?= form_error('inputSubjek_en') ?></div>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label for="tags">CC Email</label> <br>
														<input name="tags[]" id="tags1" placeholder="Masukan email" value="<?= $subjek_email[0]['cc'] ?>">
													</div>
												</div>
											</div>
											<?php for ($i = 1; $i < count($subjek_email); $i++) : ?>
												<div class="row mb-5" style="background-color: #f4f6f6;">
													<div class="col-11">
														<div class="form-group">
															<div class="row">
																<input hidden type="text" class="form-control" name="id_subjek[]" value="<?= $subjek_email[$i]['id'] ?>">
																<div class="col-6">
																	<label for="inputSubjek">Subjek <small><b>(Indonesia)</b></small></label>
																	<input type="text" class="form-control" name="inputSubjek_id[]" id="inputSubjek_id<?= $i ?>" value="<?= htmlentities($subjek_email[$i]['subjek_id']) ?>" placeholder="Masukan Subjek dalam bahasa indonesia">
																</div>
																<div class="col-6">
																	<label for="inputSubjek">Subjek <small><b>(Inggris)</b></small></label>
																	<input type="text" class="form-control" name="inputSubjek_en[]" id="inputSubjek_en<?= $i ?>" value="<?= htmlentities($subjek_email[$i]['subjek_en']) ?>" placeholder="Masukan Subjek dalam bahasa inggris">
																</div>
															</div>
														</div>
														<div class="form-group">
															<label for="tags">CC Email</label> <br>
															<input name="tags[]" id="tags<?= $i + 1 ?>" placeholder="Masukan email" value="<?= htmlentities($subjek_email[$i]['cc']) ?>">
														</div>
													</div>
													<div class="col-1">
														<label for="inputName" class="text-white">.</label> </br>
														<button class="btn btn-sm btn-outline-danger remove_field" type="button">
															<i class="fas fa-trash-alt"></i>
														</button>
													</div>
												</div>
											<?php endfor; ?>
										<?php else : ?>
											<div class="row mb-5" style="background-color: #f4f6f6;">
												<div class="col-11">
													<div class="form-group">
														<div class="row">
															<div class="col-6">
																<label for="inputSubjek">Subjek <small><b>(Indonesia)</b></small></label>
																<input type="text" class="form-control <?= form_error('inputSubjek') ? 'is-invalid' : '' ?>" name="inputSubjek_id[]" id="inputSubjek_id" value="" placeholder="Masukan Subjek dalam bahasa indonesia">
																<div class="invalid-feedback"><?= form_error('inputSubjek_id') ?></div>
															</div>
															<div class="col-6">
																<label for="inputSubjek">Subjek <small><b>(Inggris)</b></small></label>
																<input type="text" class="form-control <?= form_error('inputSubjek') ? 'is-invalid' : '' ?>" name="inputSubjek_en[]" id="inputSubjek_en" value="" placeholder="Masukan Subjek dalam bahasa inggris">
																<div class="invalid-feedback"><?= form_error('inputSubjek_en') ?></div>
															</div>
														</div>
													</div>
													<div class="form-group">
														<label for="tags">CC Email</label> <br>
														<input name="tags[]" id="tags1" placeholder="Masukan email" value="">
													</div>
												</div>
											</div>
										<?php endif; ?>
									</div>
								</div>
								<div class="col-4">
									<div class="row">
										<?php if ($kontak > 0) : ?>
											<div class="col-12">
												<div class="form-group">
													<label for="inputTelp">No. Telepon</label>
													<input type="number" class="form-control <?= form_error('inputTelp') ? 'is-invalid' : '' ?>" name="inputTelp" id="inputTelp" value="<?= $kontak['telp'] ?>" placeholder="Masukan no telepon">
													<div class="invalid-feedback"><?= form_error('inputTelp') ?></div>
												</div>
												<div class="form-group">
													<label for="inputWa">No. Whatsapp</label>
													<input type="number" class="form-control <?= form_error('inputWa') ? 'is-invalid' : '' ?>" name="inputWa" id="inputWa" value="<?= $kontak['no_wa'] ?>" placeholder="Masukan no whatsapp">
													<div class="invalid-feedback"><?= form_error('inputWa') ?></div>
												</div>
												<div class="form-group">
													<label for="inputEmail">Email</label>
													<input type="email" class="form-control <?= form_error('inputEmail') ? 'is-invalid' : '' ?>" name="inputEmail" id="inputEmail" value="<?= $kontak['email'] ?>" placeholder="Masukan Email">
													<div class="invalid-feedback"><?= form_error('inputEmail') ?></div>
												</div>
											</div>
										<?php else : ?>
											<div class="col-12">
												<div class="form-group">
													<label for="inputTelp">No. Telepon</label>
													<input type="number" class="form-control <?= form_error('inputTelp') ? 'is-invalid' : '' ?>" name="inputTelp" id="inputTelp" value="<?= set_value('inputTelp') ?>" placeholder="Masukan no telepon">
													<div class="invalid-feedback"><?= form_error('inputTelp') ?></div>
												</div>
												<div class="form-group">
													<label for="inputWa">No. Whatsapp</label>
													<input type="number" class="form-control <?= form_error('inputWa') ? 'is-invalid' : '' ?>" name="inputWa" id="inputWa" value="<?= set_value('inputWa') ?>" placeholder="Masukan no whatsapp">
													<div class="invalid-feedback"><?= form_error('inputWa') ?></div>
												</div>
												<div class="form-group">
													<label for="inputEmail">Email</label>
													<input type="email" class="form-control <?= form_error('inputEmail') ? 'is-invalid' : '' ?>" name="inputEmail" id="inputEmail" value="<?= set_value('inputEmail') ?>" placeholder="Masukan Email">
													<div class="invalid-feedback"><?= form_error('inputEmail') ?></div>
												</div>
											</div>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="card-footer text-right">
						<button type="button" class="btn btn-primary btn-kontak"><i class="fas fa-save"></i> Simpan</button>
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

		for (let index = 1; index <= <?= $x ?>; index++) {
			$('#tags' + index + '').tagify({
				duplicates: false
			});
		}


		var max_fields = 10; //maximum input boxes allowed
		var wrapper = $(".input_wrap"); //Fields wrapper
		var add_button = $(".add_field_button"); //Add button ID

		var x = <?= $x ?>; //initlal text box count
		$(add_button).click(function(e) { //on add input button click
			e.preventDefault();
			if (x < max_fields) { //max input box allowed
				x++; //text box increment
				$(wrapper).append('<div class="row mb-5" style="background-color: #f4f6f6;">' +
					'<div class="col-11">' +
					'<div class="form-group">' +
					'<div class="row">' +
					'<div class="col-6">' +
					'<label for="inputSubjek">Subjek <small><b>(Indonesia)</b></small></label>' +
					'<input type="text" class="form-control" name="inputSubjek_id[]" id="inputSubjek_id' + x + '" value="" placeholder="Masukan Subjek dalam bahasa indonesia">' +
					'</div>' +
					'<div class="col-6">' +
					'<label for="inputSubjek">Subjek <small><b>(Inggris)</b></small></label>' +
					'<input type="text" class="form-control" name="inputSubjek_en[]" id="inputSubjek_en' + x + '" value="" placeholder="Masukan Subjek dalam bahasa inggris">' +
					'</div>' +
					'</div>' +
					'</div>' +
					'<div class="form-group">' +
					'<label for="tags">CC Email</label> <br>' +
					'<input name="tags[]" id="tags' + x + '" placeholder="Masukan email" value="">' +
					'</div>' +
					'</div>' +
					'<div class="col-1">' +
					'<label for="inputName" class="text-white">.</label> </br>' +
					'<button class="btn btn-sm btn-outline-danger remove_field" type="button">' +
					'<i class="fas fa-trash-alt"></i>' +
					'</button>' +
					'</div>' +
					'</div>'); //add input box

				$('#tags' + x + '').tagify({
					duplicates: false
				});
			}
		});

		$(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
			e.preventDefault();
			$(this).parent('div').parent('div').remove();
			x--;
		})
	});

	$('.btn-kontak').on('click', function() {
		var form = $('#form_kontak')[0];
		var data_form = new FormData(form);
		$.ajax({
			url: $('#form_kontak').attr('action'),
			method: 'POST',
			enctype: 'multipart/form-data',
			data: data_form,
			dataType: 'json',
			contentType: false,
			processData: false,
			chace: false,
			beforeSend: function() {
				$('.btn-kontak').attr('disabled', 'disabled');
				$('.btn-kontak').html('<i class="fas fa-spinner fa-spin"></i> In Process');
			},
			complete: function() {
				$('.btn-kontak').removeAttr('disabled', 'disabled');
				$('.btn-kontak').html('<i class="fas fa-save"></i> Tambah');
			},
			success: function(data) {
				// if (data.gagal) {

				//     window.location.href = "<?= base_url() ?>" + data.gagal;

				// }
				if (data.status == false) {
					for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
						$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
						$('[id="' + data.inputerror[i] + '"]').addClass('is-invalid');
						$('[id="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
						if (data.valid[i] == true) {
							$('[name="' + data.inputerror[i] + '"]').removeClass('is-invalid');
							$('[name="' + data.inputerror[i] + '"]').addClass('is-valid');
							$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);

							$('[id="' + data.inputerror[i] + '"]').removeClass('is-invalid');
							$('[id="' + data.inputerror[i] + '"]').addClass('is-valid');
							$('[id="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
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
