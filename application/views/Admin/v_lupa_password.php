<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin | Ubah Password</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/adminlte/plugins/fontawesome-free/css/all.min.css">
	<!-- icheck bootstrap -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>vendor/adminlte/dist/css/adminlte.min.css">

	<!-- jQuery -->
	<script src="<?= base_url() ?>vendor/adminlte/plugins/jquery/jquery.min.js"></script>

	<script src="<?= base_url(); ?>vendor/sweetalert/sweetalert2.all.min.js"></script>
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<?php $logo_tkpp = $this->db->get_where('data_gambar', ['id' => 4])->row_array(); ?>
			<a href="<?= base_url() ?>"><img style="width: 250px;" src="<?= base_url() ?>uploads/images/<?= $logo_tkpp['nama_file'] ?>" alt=""></a>
		</div>
		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
				<h3 class="login-box-msg">Ubah Password</h3>
				<form action="<?= base_url() ?>admins/lupa_password/lupa" method="post" class="form_lupa">
					<div class="form-group mb-4">
						<input type="password" class="form-control <?= form_error('password_old') ? 'is-invalid' : '' ?>" placeholder="Password lama" value="<?= set_value('password_old') ?>" name="password_old" id="password_old">
						<div class="invalid-feedback"><?= form_error('password_old') ?></div>
					</div>
					<div class="form-group">
						<input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" placeholder="Password baru" value="<?= set_value('password') ?>" name="password" id="password">
						<div class="invalid-feedback"><?= form_error('password') ?></div>
					</div>
					<div class="form-group">
						<input type="password" class="form-control <?= form_error('password2') ? 'is-invalid' : '' ?>" placeholder="Ulangi password" value="<?= set_value('password2') ?>" name="password2" id="password2">
						<div class="invalid-feedback"><?= form_error('password2') ?></div>
					</div>
					<div class="form-group float-left">
						<div class="form-check">
							<input class="form-check-input form-checkbox" type="checkbox" id="gridCheck">
							<label class="form-check-label" for="gridCheck">
								Show Password
							</label>
						</div>
					</div>
					<button type="button" class="btn btn-primary btn-block btn_lupa">Simpan</button>
					<button type="button" onclick="history.back()" class="btn btn-light btn-block">Batal</button>
				</form>

			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- Bootstrap 4 -->
	<script src="<?= base_url() ?>vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url() ?>vendor/adminlte/dist/js/adminlte.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.form-checkbox').click(function() {
				if ($(this).is(':checked')) {
					$('#password').attr('type', 'text');
					$('#password2').attr('type', 'text');
					$('#password_old').attr('type', 'text');
				} else {
					$('#password').attr('type', 'password');
					$('#password2').attr('type', 'password');
					$('#password_old').attr('type', 'password');
				}
			});
		});
	</script>

	<script>
		$('.btn_lupa').on('click', function() {
			$.ajax({
				url: $('.form_lupa').attr('action'),
				method: 'POST',
				data: $('.form_lupa').serialize(),
				dataType: 'json',
				chace: false,
				beforeSend: function() {
					$('.btn_lupa').attr('disabled', 'disabled');
					$('.btn_lupa').html('<i class="fas fa-spinner fa-spin"></i> In Process');
				},
				complete: function() {
					$('.btn_lupa').removeAttr('disabled', 'disabled');
					$('.btn_lupa').html('Simpan');
				},
				success: function(data) {
					// console.log(data.gagal);
					if (data.gagal) {

						window.location.href = "<?= base_url() ?>" + data.gagal;

					}
					if (data.status == false) {
						for (var i = 0; i < data.inputerror.length; i++) {
							$('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
							$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
							$('#alert_message').hide();
							$('#belum_login').hide();
							if (data.valid[i] == true) {
								$('[name="' + data.inputerror[i] + '"]').removeClass('is-invalid');
								$('[name="' + data.inputerror[i] + '"]').addClass('is-valid');
								$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
							}
							// console.log(data.inputerror[i]);
						}
					} else {
						if (data.berhasil) {
							Swal.fire({
								title: 'Apa kamu yakin?',
								text: "Kamu akan menghapus sesi pada semua perangkat yang pernah login ke aplikasi",
								icon: 'warning',
								showCancelButton: true,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								cancelButtonText: 'Pertahankan sesi',
								confirmButtonText: 'Ya, hapus semua sesi!',
								backdrop: true,
							}).then((result) => {
								if (result.value) {
									$.ajax({
										url: '<?= base_url("admins/lupa_password/forcelogout") ?>',
										dataType: 'json',
										chace: false,
										success: function(data) {
											if (data.berhasil) {
												window.location.href = "<?= base_url() ?>" + data.berhasil;
											}
										}

									});
								} else {
									window.history.back();
								}
							})

						}
					}
				}

			});
		});
	</script>

</body>

</html>
