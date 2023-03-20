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
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Form Edit Tipe Properti</h3>
					</div>
					<div class="card-body">
						<form action="<?= base_url() ?>admins/item_properti/tipe_properti/edit/edit" id="form_tipe_properti" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-8">
									<div class="form-group div_kluster">
										<label for="inputKluster">Kluster</label>
										<input type="text" class="form-control <?= form_error('inputKluster') ? 'is-invalid' : '' ?>" name="inputKluster" id="inputKluster">
									</div>
									<div hidden class="form-group">
										<label for="inputId">Id</label>
										<input type="text" class="form-control <?= form_error('inputId') ? 'is-invalid' : '' ?>" name="inputId" id="inputId">
									</div>
									<div class="form-group">
										<label for="inputName">Nama Tipe <small><b>(Indonesia)</b></small></label>
										<input type="text" class="form-control <?= form_error('inputName') ? 'is-invalid' : '' ?>" name="inputName" id="inputName" value="<?= htmlentities($tipe_properti['name_id']) ?>" placeholder="Masukan nama tipe dalam bahasa indonesia">
										<div class="invalid-feedback"><?= form_error('inputName') ?></div>
									</div>
									<div class="form-group">
										<label for="inputName2">Nama Tipe <small><b>(Inggris)</b></small></label>
										<input type="text" class="form-control <?= form_error('inputName2') ? 'is-invalid' : '' ?>" name="inputName2" id="inputName2" value="<?= htmlentities($tipe_properti['name_en']) ?>" placeholder="Masukan nama tipe dalam bahasa inggris">
										<div class="invalid-feedback"><?= form_error('inputName2') ?></div>
									</div>

									<div class="form-group">
										<label>Deskripsi Tipe <small><b>(Indonesia)</b></small></label>
										<textarea id="summernote_tipe" name="inputDesc">
                                        <?= $tipe_properti['desc_id'] ?>
                                    </textarea>
									</div>
									<div class="form-group">
										<label>Deskripsi Tipe <small><b>(Inggris)</b></small></label>
										<textarea id="summernote_tipe2" name="inputDesc2">
                                        <?= $tipe_properti['desc_en'] ?>
                                    </textarea>
									</div>
									<div class="form-group">
										<input hidden type="text" class="form-control" name="inputPath" id="inputPath" value="<?= $tipe_properti['denah'] ?>" placeholder="">
										<label>Denah</label>
										<input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="denah" id="denah">
										<div style="text-align: center;" class="pt-3">
											<div id="preview">
												<img src="<?= base_url() ?>uploads/images/properti/tipe/<?= $tipe_properti['denah'] ?>" width="300" height="auto" alt="">
											</div>
											<button type="button" class="btn text-danger btn-delete-img"><i class="fas fa-times-circle"></i></button>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="card-footer text-right">
						<a href="<?= base_url() ?>admins/item_properti" class="btn btn-light" style="border: 1px solid #000;"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
						<button type="button" class="btn btn-primary btn-edit-tipe-properti"><i class="fas fa-save"></i> Simpan</button>
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

		<?php
		$file_before = FCPATH . './uploads/images/properti/tipe/' . $tipe_properti['denah'];
		if ($tipe_properti['denah'] == '') : ?>
			$('.btn-delete-img').hide();
		<?php elseif (file_exists($file_before)) : ?>
			$('.btn-delete-img').show();
		<?php else : ?>
			$('.btn-delete-img').hide();
		<?php endif; ?>
		$('#summernote_tipe').summernote({
			// height: "150px",
			styleWithSpan: false,
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'underline', 'clear']],
				['fontname', ['fontname']],
				// ['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ol', 'ul', 'paragraph']],
				['view', ['fullscreen', 'codeview', 'help']]
			],
			callbacks: {
				onImageUpload: function(image) {
					uploadImage(image[0]);
				},
				onMediaDelete: function(target) {
					deleteImage(target[0].src);
				}
			}
		});
		$('#summernote_tipe2').summernote({
			// height: "150px",
			styleWithSpan: false,
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'underline', 'clear']],
				['fontname', ['fontname']],
				// ['fontsize', ['fontsize']],
				['color', ['color']],
				['para', ['ol', 'ul', 'paragraph']],
				['view', ['fullscreen', 'codeview', 'help']]
			],
			callbacks: {
				onImageUpload: function(image) {
					uploadImage2(image[0]);
				},
				onMediaDelete: function(target) {
					deleteImage2(target[0].src);
				}
			}
		});
	});

	$('.btn-edit-tipe-properti').on('click', function() {
		var form = $('#form_tipe_properti')[0];
		var data_form = new FormData(form);
		$.ajax({
			url: $('#form_tipe_properti').attr('action'),
			method: 'POST',
			enctype: 'multipart/form-data',
			data: data_form,
			dataType: 'json',
			contentType: false,
			processData: false,
			chace: false,
			beforeSend: function() {
				$('.btn-edit-tipe-properti').attr('disabled', 'disabled');
				$('.btn-edit-tipe-properti').html('<i class="fas fa-spinner fa-spin"></i> In Process');
			},
			complete: function() {
				$('.btn-edit-tipe-properti').removeAttr('disabled', 'disabled');
				$('.btn-edit-tipe-properti').html('<i class="fas fa-save"></i> Tambah');
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

	function imagePreview(fileInput) {
		if (fileInput.files && fileInput.files[0]) {
			var fileReader = new FileReader();
			fileReader.onload = function(event) {
				$('#preview').html('<img src="' + event.target.result + '" width="300" height="auto"/>');
			};
			fileReader.readAsDataURL(fileInput.files[0]);
			$('.btn-delete-img').show();
		}
	}
	$("#denah").change(function() {
		imagePreview(this);
	});
	$(".btn-delete-img").on('click', function() {
		$("#denah").val(null);
		$("#inputPath").val(null);
		$("#preview").empty();
		$('.btn-delete-img').hide();
	});
</script>
