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
						<h3 class="card-title">Form Alamat</h3>
					</div>
					<div class="card-body">
						<form action="<?= base_url() ?>admins/alamat/alamat/alamat" id="form_alamat" method="post" enctype="multipart/form-data">
							<div class="row">
								<?php if ($alamat > 0) : ?>
									<div class="col-12">
										<div class="form-group">
											<label for="inputLat">Latitude</label>
											<input type="text" class="form-control <?= form_error('inputLat') ? 'is-invalid' : '' ?>" name="inputLat" id="inputLat" value="<?= htmlentities($alamat['latitude']) ?>" placeholder="Masukan latitude">
											<div class="invalid-feedback"><?= form_error('inputLat') ?></div>
										</div>
										<div class="form-group">
											<label for="inputLong">Longitude</label>
											<input type="text" class="form-control <?= form_error('inputLong') ? 'is-invalid' : '' ?>" name="inputLong" id="inputLong" value="<?= htmlentities($alamat['longitude']) ?>" placeholder="Masukan longitude">
											<div class="invalid-feedback"><?= form_error('inputLong') ?></div>
										</div>
										<div class="form-group">
											<label for="inputLink">Link Google Maps</label>
											<input type="text" class="form-control <?= form_error('inputLink') ? 'is-invalid' : '' ?>" name="inputLink" id="inputLink" value="<?= htmlentities($alamat['link']) ?>" placeholder="Masukan link google maps">
											<div class="invalid-feedback"><?= form_error('inputLink') ?></div>
										</div>
										<div class="form-group">
											<label for="inputAlamat">Alamat lengkap</label>
											<textarea wrap="off" type="text" class="form-control" name="inputAlamat" id="inputAlamat" value="<?= set_value('inputAlamat') ?>" placeholder=""><?= htmlentities($alamat['alamat']) ?></textarea>
											<div class="invalid-feedback"><?= form_error('inputAlamat') ?></div>
										</div>
									</div>
								<?php else : ?>
									<div class="col-12">
										<div class="form-group">
											<label for="inputLat">Latitude</label>
											<input type="text" class="form-control <?= form_error('inputLat') ? 'is-invalid' : '' ?>" name="inputLat" id="inputLat" value="<?= set_value('inputLat') ?>" placeholder="Masukan latitude">
											<div class="invalid-feedback"><?= form_error('inputLat') ?></div>
										</div>
										<div class="form-group">
											<label for="inputLong">Longitude</label>
											<input type="text" class="form-control <?= form_error('inputLong') ? 'is-invalid' : '' ?>" name="inputLong" id="inputLong" value="<?= set_value('inputLong') ?>" placeholder="Masukan longitude">
											<div class="invalid-feedback"><?= form_error('inputLong') ?></div>
										</div>
										<div class="form-group">
											<label for="inputLink">Link Google Maps</label>
											<input type="text" class="form-control <?= form_error('inputLink') ? 'is-invalid' : '' ?>" name="inputLink" id="inputLink" value="<?= set_value('inputLink') ?>" placeholder="Masukan link google maps">
											<div class="invalid-feedback"><?= form_error('inputLink') ?></div>
										</div>
										<div class="form-group">
											<label for="inputAlamat">Alamat lengkap</label>
											<textarea wrap="off" type="text" class="form-control" name="inputAlamat" id="inputAlamat" value="<?= set_value('inputAlamat') ?>" placeholder=""><?= set_value('inputAlamat') ?></textarea>
										</div>
									</div>
								<?php endif; ?>
							</div>
						</form>
					</div>
					<div class="card-footer text-right">
						<button type="button" class="btn btn-primary btn-alamat"><i class="fas fa-save"></i> Simpan</button>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		</div>

	</section>

</div>

<script>
	$('.btn-alamat').on('click', function() {
		var form = $('#form_alamat')[0];
		var data_form = new FormData(form);
		$.ajax({
			url: $('#form_alamat').attr('action'),
			method: 'POST',
			enctype: 'multipart/form-data',
			data: data_form,
			dataType: 'json',
			contentType: false,
			processData: false,
			chace: false,
			beforeSend: function() {
				$('.btn-alamat').attr('disabled', 'disabled');
				$('.btn-alamat').html('<i class="fas fa-spinner fa-spin"></i> In Process');
			},
			complete: function() {
				$('.btn-alamat').removeAttr('disabled', 'disabled');
				$('.btn-alamat').html('<i class="fas fa-save"></i> Tambah');
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
