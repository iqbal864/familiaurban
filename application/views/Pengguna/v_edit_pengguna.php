<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1><?= $title2 ?></h1>
			<div>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent">
						<li class="breadcrumb-item"><a href="<?= base_url() ?>admins/admins">Dashboard</a></li>
						<li class="breadcrumb-item"><a href="<?= base_url() ?>admins/pengguna"><?= $title ?></a></li>
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
			<div class="col-8">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Form Edit Pengguna</h3>
					</div>
					<div class="card-body">
						<form action="<?= base_url() ?>admins/pengguna/edit/edit" id="form_pengguna" method="post" enctype="multipart/form-data">
							<input hidden type="text" class="form-control" name="inputId" id="inputId" placeholder="">
							<div class="form-group">
								<label for="inputRole">Role</label>
								<select class="custom-select <?= form_error('inputRole') ? 'is-invalid' : '' ?>" name="inputRole" id="inputRole">
									<option selected disabled value="">Pilih</option>
									<?php foreach ($get_role as $role) : ?>
										<?php if ($role['id'] == $pengguna['id_role']) {
											$select = "selected";
										} else {
											$select = "";
										} ?>
										<option <?= $select ?> value="<?= $role['id'] ?>"><?= $role['role'] ?></option>
									<?php endforeach; ?>
								</select>
								<div class="invalid-feedback"><?= form_error('inputRole') ?></div>
							</div>
							<div class="form-group">
								<label for="inputUsername">Username</label>
								<input type="text" class="form-control <?= form_error('inputUsername') ? 'is-invalid' : '' ?>" name="inputUsername" id="inputUsername" value="<?= $pengguna['username'] ?>" placeholder="Masukan username">
								<div class="invalid-feedback"><?= form_error('inputUsername') ?></div>
							</div>
							<div class="form-group">
								<label for="inputName">Nama</label>
								<input type="text" class="form-control <?= form_error('inputName') ? 'is-invalid' : '' ?>" name="inputName" id="inputName" value="<?= $pengguna['name'] ?>" placeholder="Masukan nama">
								<div class="invalid-feedback"><?= form_error('inputName') ?></div>
							</div>
							<div class="form-group">
								<label for="inputPassword">Password</label>
								<input type="password" class="form-control<?= form_error('inputPassword') ? 'is-invalid' : '' ?>" name="inputPassword" id="inputPassword" value="<?= set_value('inputPassword') ?>" placeholder="Masukan password">
								<div class="invalid-feedback"><?= form_error('inputPassword') ?></div>
							</div>
							<div class="form-group">
								<label for="inputPassword2">Ulangi Password</label>
								<input type="password" class="form-control<?= form_error('inputPassword2') ? 'is-invalid' : '' ?>" name="inputPassword2" id="inputPassword2" value="<?= set_value('inputPassword2') ?>" placeholder="Masukan password">
								<div class="invalid-feedback"><?= form_error('inputPassword2') ?></div>
							</div>
							<div class="form-group float-left">
								<div class="form-check">
									<input class="form-check-input form-checkbox" type="checkbox" id="gridCheck">
									<label class="form-check-label" for="gridCheck">
										Show Password
									</label>
								</div>
							</div>
						</form>
					</div>
					<div class="card-footer text-right">
						<a href="<?= base_url() ?>admins/pengguna" class="btn btn-light" style="border: 1px solid #000;"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
						<button type="button" class="btn btn-primary btn-edit-pengguna"><i class="fas fa-save"></i> Simpan</button>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		</div>

	</section>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('.form-checkbox').click(function() {
			if ($(this).is(':checked')) {
				$('#inputPassword').attr('type', 'text');
				$('#inputPassword2').attr('type', 'text');
			} else {
				$('#inputPassword').attr('type', 'password');
				$('#inputPassword2').attr('type', 'password');
			}
		});
	});
</script>

<script>
	$(document).ready(function() {
		$('#inputId').val(<?= $pengguna['id'] ?>);
	});

	$('.btn-edit-pengguna').on('click', function() {
		var form = $('#form_pengguna')[0];
		var data_form = new FormData(form);
		$.ajax({
			url: $('#form_pengguna').attr('action'),
			method: 'POST',
			enctype: 'multipart/form-data',
			data: data_form,
			dataType: 'json',
			contentType: false,
			processData: false,
			chace: false,
			beforeSend: function() {
				$('.btn-edit-pengguna').attr('disabled', 'disabled');
				$('.btn-edit-pengguna').html('<i class="fas fa-spinner fa-spin"></i> In Process');
			},
			complete: function() {
				$('.btn-edit-pengguna').removeAttr('disabled', 'disabled');
				$('.btn-edit-pengguna').html('<i class="fas fa-save"></i> Simpan');
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
				} else {
					if (data.berhasil) {
						// window.location.href = "<?= base_url() ?>" + data.berhasil;
					}
				}
				if (data.berhasil) {
					window.location.href = "<?= base_url() ?>" + data.berhasil;
					// const Toast = Swal.mixin({
					//     toast: true,
					//     position: 'top-end',
					//     showConfirmButton: false,
					//     timer: 3000,
					//     backdrop: false
					// });

					// Toast.fire({
					//     icon: 'success',
					//     title: data.berhasil
					// })

				}
			},
			error: function(xhr, ajaxOptions, thrownError) {
				alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
				console.log(thrownError);
			}

		});
	});
</script>
