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
			<div class="col-8">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Form Testimoni</h3>
					</div>
					<div class="card-body">
						<form action="<?= base_url() ?>admins/testimoni/testimoni/testimoni" id="form_testimoni" method="post" enctype="multipart/form-data">
							<div class="form-group input_wrap">
								<div class="mb-3">
									<label for="inputSpek1">List Url Vidio Testimoni</label>
									<button class="add_field_button btn btn-xs btn-primary"><i class="fas fa-plus"></i></button>
								</div>

								<?php if (sizeof($testimoni) != 0) {
									$x = count($testimoni);
								} else {
									$x = 1;
								} ?>

								<?php if (sizeof($testimoni) != 0) : ?>
									<div class="row">
										<div class="col-12">
											<div class="mb-3 row">
												<div class="col-11">
													<label for="inputUrl">Url Vidio Testimoni</label>
													<input type="text" class="form-control <?= form_error('inputUrl') ? 'is-invalid' : '' ?>" name="inputUrl[]" id="inputUrl_pertama" value="<?= htmlentities($testimoni[0]['url']) ?>">
													<div class="invalid-feedback"><?= form_error('inputUrl') ?></div>
												</div>
											</div>
										</div>
									</div>
									<?php for ($i = 1; $i < count($testimoni); $i++) : ?>
										<div class="row">
											<div class="col-12">
												<div class="mb-3 row">
													<div class="col-11">
														<label for="inputUrl">Url Vidio Testimoni</label>
														<input type="text" class="form-control <?= form_error('inputUrl') ? 'is-invalid' : '' ?>" name="inputUrl[]" id="inputUrl" value="<?= htmlentities($testimoni[$i]['url']) ?>">
														<div class="invalid-feedback"><?= form_error('inputUrl') ?></div>
													</div>
													<div class="col-1">
														<label for="inputName" class="text-white">.</label> </br>
														<button class="btn btn-sm btn-outline-danger remove_field" type="button">
															<i class="fas fa-trash-alt"></i>
														</button>
													</div>
												</div>
											</div>
										</div>
									<?php endfor; ?>
								<?php else : ?>
									<div class="row">
										<div class="col-12">
											<div class="mb-3 row">
												<div class="col-11">
													<label for="inputUrl">Url Vidio Testimoni</label>
													<input type="text" class="form-control <?= form_error('inputUrl') ? 'is-invalid' : '' ?>" name="inputUrl[]" id="inputUrl_pertama" value="">
													<div class="invalid-feedback"><?= form_error('inputUrl') ?></div>
												</div>
											</div>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</form>
					</div>
					<div class="card-footer text-right">
						<button type="button" class="btn btn-primary btn-testimoni"><i class="fas fa-save"></i> Simpan</button>
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
		var max_fields = 7; //maximum input boxes allowed
		var wrapper = $(".input_wrap"); //Fields wrapper
		var add_button = $(".add_field_button"); //Add button ID

		var x = <?= $x ?>; //initlal text box count
		$(add_button).click(function(e) { //on add input button click
			e.preventDefault();
			if (x < max_fields) { //max input box allowed
				x++; //text box increment
				$(wrapper).append('<div class="row">' +
					'<div class="col-12">' +
					'<div class="mb-3 row">' +
					'<div class="col-11">' +
					'<label for="inputUrl">Url Vidio Testimoni</label>' +
					'<input type="text" class="form-control <?= form_error('inputUrl') ? 'is-invalid' : '' ?>" name="inputUrl[]" id="inputUrl" value="">' +
					'<div class="invalid-feedback"><?= form_error('inputUrl') ?></div>' +
					'</div>' +
					'<div class="col-1">' +
					'<label for="inputName" class="text-white">.</label> </br>' +
					'<button class="btn btn-sm btn-outline-danger remove_field" type="button">' +
					'<i class="fas fa-trash-alt"></i>' +
					'</button>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'</div>'); //add input box

				$("#icon_picker" + x + "").iconpicker();
			}
		});

		$(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
			e.preventDefault();
			$(this).parent('div').parent('div').parent('div').parent('div').remove();
			x--;
		})
	});


	$('.btn-testimoni').on('click', function() {
		var form = $('#form_testimoni')[0];
		var data_form = new FormData(form);
		$.ajax({
			url: $('#form_testimoni').attr('action'),
			method: 'POST',
			enctype: 'multipart/form-data',
			data: data_form,
			dataType: 'json',
			contentType: false,
			processData: false,
			chace: false,
			beforeSend: function() {
				$('.btn-testimoni').attr('disabled', 'disabled');
				$('.btn-testimoni').html('<i class="fas fa-spinner fa-spin"></i> In Process');
			},
			complete: function() {
				$('.btn-testimoni').removeAttr('disabled', 'disabled');
				$('.btn-testimoni').html('<i class="fas fa-save"></i> Tambah');
			},
			success: function(data) {

				// if (data.gagal) {

				//     window.location.href = "<?= base_url() ?>" + data.gagal;

				// }
				if (data.status == false) {
					for (var i = 0; i < data.inputerror.length; i++) {
						$('[id="' + data.inputerror[i] + '"]').addClass('is-invalid');
						$('[id="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
						if (data.valid[i] == true) {
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
