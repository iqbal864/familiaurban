<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1><?= $title2 ?></h1>
			<div>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>admins/admins">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url() ?>admins/item_properti"><?= $title ?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?= $title2 ?></li>
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
						<h3 class="card-title">Form Tambah Properti</h3>
					</div>
					<div class="card-body">
						<form action="<?= base_url() ?>admins/item_properti/tambah/tambah" id="form_properti" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-8">
									<div class="form-group">
										<label for="inputKategori">Kategori</label>
										<select class="custom-select <?= form_error('inputKategori') ? 'is-invalid' : '' ?>" name="inputKategori" id="inputKategori">
											<option selected disabled value="">Pilih</option>
											<?php foreach ($get_kategori as $kategori) : ?>
												<option value="<?= $kategori['id'] ?>"><?= $kategori['name_id'] ?> / <?= $kategori['name_en'] ?></option>
											<?php endforeach; ?>
										</select>
										<div class="invalid-feedback"><?= form_error('inputKategori') ?></div>
									</div>
									<div class="form-group">
										<label for="inputName">Nama Properti <small><b>(Indonesia)</b></small></label>
										<input type="text" class="form-control <?= form_error('inputName') ? 'is-invalid' : '' ?>" name="inputName" id="inputName" value="<?= set_value('inputName') ?>" placeholder="Masukan nama properti dalam bahasa indonesia">
										<div class="invalid-feedback"><?= form_error('inputName') ?></div>
									</div>
									<div class="form-group">
										<label for="inputName2">Nama Properti <small><b>(Inggris)</b></small></label>
										<input type="text" class="form-control <?= form_error('inputName2') ? 'is-invalid' : '' ?>" name="inputName2" id="inputName2" value="<?= set_value('inputName2') ?>" placeholder="Masukan nama properti dalam bahasa inggris">
										<div class="invalid-feedback"><?= form_error('inputName2') ?></div>
									</div>

									<div class="form-group">
										<label>Deskripsi Properti <small><b>(Indonesia)</b></small></label>
										<textarea id="summernote_properti" name="inputDesc">

                                    </textarea>
									</div>
									<div class="form-group">
										<label>Deskripsi Properti <small><b>(Inggris)</b></small></label>
										<textarea id="summernote_properti2" name="inputDesc2">

                                    </textarea>
									</div>
									<div class="form-group">
										<label for="inputMeta">Meta Keywords <small><b>(Indonesia)</b></small></label>
										<input type="text" class="form-control <?= form_error('inputMeta') ? 'is-invalid' : '' ?>" name="inputMeta" id="inputMeta" value="<?= set_value('inputMeta') ?>" placeholder="Contoh: Rumah, Hunian, Tempat Tinggal">
										<div class="invalid-feedback"><?= form_error('inputMeta') ?></div>
									</div>
									<div class="form-group">
										<label for="inputMeta2">Meta Keywords <small><b>(Inggris)</b></small></label>
										<input type="text" class="form-control<?= form_error('inputMeta2') ? 'is-invalid' : '' ?>" name="inputMeta2" id="inputMeta2" value="<?= set_value('inputMeta2') ?>" placeholder="Contoh: House, Occupancy, Residence">
										<div class="invalid-feedback"><?= form_error('inputMeta2') ?></div>
									</div>
									<div class="form-group">
										<label>Background Banner Header</label>
										<input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="image_banner" id="image_banner">
										<div style="text-align: center;" class="pt-3">
											<div id="preview"></div>
											<button type="button" class="btn text-danger btn-delete-img"><i class="fas fa-times-circle"></i></button>
										</div>
									</div>
									<div class="form-group">
										<label>Master Plan</label>
										<input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="image_plan" id="image_plan">
										<div style="text-align: center;" class="pt-3">
											<div id="preview_plan"></div>
											<button type="button" class="btn text-danger btn-delete-img-plan"><i class="fas fa-times-circle"></i></button>
										</div>
									</div>
								</div>
								<div class="col-4">
									<div class="form-group">
										<label for="inputLat">Lokasi Properti</label>
										<div class="row">
											<div class="col-12 mb-2">
												<textarea type="text" class="form-control <?= form_error('inputAlamat') ? 'is-invalid' : '' ?>" name="inputAlamat" id="inputAlamat" value="<?= set_value('inputAlamat') ?>" placeholder="Masukan alamat lengkap"></textarea>
												<div class="invalid-feedback"><?= form_error('inputAlamat') ?></div>
											</div>
											<div class="col-6">
												<input type="text" class="form-control" name="inputLat" id="inputLat" value="<?= set_value('inputLat') ?>" placeholder="Masukan Latitude">
											</div>
											<div class="col-6">
												<input type="text" class="form-control" name="inputLong" id="inputLong" value="<?= set_value('inputLong') ?>" placeholder="Masukan Longitude">
											</div>
										</div>
										<!-- <div class="invalid-feedback"><?= form_error('inputName') ?></div> -->
									</div>
									<div class="form-group">
										<label for="inputVid">Link Vidio Preview</label>
										<input type="text" class="form-control" name="inputVid" id="inputVid" value="<?= set_value('inputVid') ?>" placeholder="Masukan eksernal link vidio">
										<!-- <div class="invalid-feedback"><?= form_error('inputMeta2') ?></div> -->
									</div>
									<div class="form-group input_wrap">
										<label for="inputFitur">Fitur Properti </label>
										<button class="add_field_button btn btn-xs btn-primary"><i class="fas fa-plus"></i></button>
										<div class="mb-3"><input type="text" class="form-control" name="inputFitur[]" id="inputFitur" value="<?= set_value('inputFitur') ?>"></div>
										<!-- <div class="invalid-feedback"><?= form_error('inputMeta2') ?></div> -->
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="card-footer text-right">
						<a href="<?= base_url() ?>admins/item_properti" class="btn btn-light" style="border: 1px solid #000;"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
						<button type="button" class="btn btn-primary btn-tambah-properti"><i class="fas fa-save"></i> Simpan</button>
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

		var max_fields = 20; //maximum input boxes allowed
		var wrapper = $(".input_wrap"); //Fields wrapper
		var add_button = $(".add_field_button"); //Add button ID

		var x = 1; //initlal text box count
		$(add_button).click(function(e) { //on add input button click
			e.preventDefault();
			if (x < max_fields) { //max input box allowed
				x++; //text box increment
				$(wrapper).append('<div class="input-group mb-3"><input type="text" class="form-control" name="inputFitur[]" id="inputFitur" value="<?= set_value('inputFitur') ?>"><div class="input-group-append"><button class="btn btn-outline-danger remove_field" type="button"><i class="fas fa-trash-alt"></i></button></div></div>'); //add input box
			}
		});

		$(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
			e.preventDefault();
			$(this).parent('div').parent('div').remove();
			x--;
		})

		$('.btn-delete-img').hide();
		$('.btn-delete-img-plan').hide();
		$('#summernote_properti').summernote({
			// height: "150px",
			styleWithSpan: false,
			callbacks: {
				onImageUpload: function(image) {
					uploadImage(image[0]);
				},
				onMediaDelete: function(target) {
					deleteImage(target[0].src);
				}
			}
		});
		$('#summernote_properti2').summernote({
			// height: "150px",
			styleWithSpan: false,
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

	$('.btn-tambah-properti').on('click', function() {
		var form = $('#form_properti')[0];
		var data_form = new FormData(form);
		$.ajax({
			url: $('#form_properti').attr('action'),
			method: 'POST',
			enctype: 'multipart/form-data',
			data: data_form,
			dataType: 'json',
			contentType: false,
			processData: false,
			chace: false,
			beforeSend: function() {
				$('.btn-tambah-properti').attr('disabled', 'disabled');
				$('.btn-tambah-properti').html('<i class="fas fa-spinner fa-spin"></i> In Process');
			},
			complete: function() {
				$('.btn-tambah-properti').removeAttr('disabled', 'disabled');
				$('.btn-tambah-properti').html('<i class="fas fa-save"></i> Tambah');
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

	function uploadImage(image) {
		var data = new FormData();
		data.append("image", image);
		console.log(data);
		$.ajax({
			url: "<?php echo base_url('admins/item_properti/tambah/tambah_gambar') ?>",
			cache: false,
			contentType: false,
			processData: false,
			data: data,
			type: "POST",
			success: function(url) {
				// console.log(data);
				$('#summernote_properti').summernote("insertImage", url);
			},
			error: function(data) {
				console.log(data);
			}
		});
	}

	function deleteImage(src) {
		$.ajax({
			data: {
				src: src
			},
			type: "POST",
			url: "<?php echo base_url('admins/item_properti/tambah/hapus_gambar') ?>",
			cache: false,
			success: function(response) {
				console.log(response);
			}
		});
	}

	function uploadImage2(image) {
		var data = new FormData();
		data.append("image", image);
		$.ajax({
			url: "<?php echo base_url('admins/item_properti/tambah/tambah_gambar_en') ?>",
			cache: false,
			contentType: false,
			processData: false,
			data: data,
			type: "POST",
			success: function(url) {
				// console.log(data);
				$('#summernote_properti2').summernote("insertImage", url);
			},
			error: function(data) {
				console.log(data);
			}
		});
	}

	function deleteImage2(src) {
		$.ajax({
			data: {
				src: src
			},
			type: "POST",
			url: "<?php echo base_url('admins/item_properti/tambah/hapus_gambar_en') ?>",
			cache: false,
			success: function(response) {
				console.log(response);
			}
		});
	}

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

	function imagePreviewPlan(fileInput) {
		if (fileInput.files && fileInput.files[0]) {
			var fileReader = new FileReader();
			fileReader.onload = function(event) {
				$('#preview_plan').html('<img src="' + event.target.result + '" width="300" height="auto"/>');
			};
			fileReader.readAsDataURL(fileInput.files[0]);
			$('.btn-delete-img-plan').show();
		}
	}

	$("#image_banner").change(function() {
		imagePreview(this);
	});
	$(".btn-delete-img").on('click', function() {
		$("#image_banner").val(null);
		$("#preview").empty();
		$('.btn-delete-img').hide();
	});

	$("#image_plan").change(function() {
		imagePreviewPlan(this);
	});
	$(".btn-delete-img-plan").on('click', function() {
		$("#image_plan").val(null);
		$("#preview_plan").empty();
		$('.btn-delete-img-plan').hide();
	});
</script>
