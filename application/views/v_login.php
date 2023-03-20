<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin | Log in</title>

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

	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

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

	<?php
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('role');
		$this->session->sess_destroy();
	endif; ?>

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
				<?php if (empty($this->session->userdata('role'))) : ?>
					<h3 class="login-box-msg">Sign in</h3>
					<?php if ($this->session->flashdata('belum_login') == TRUE) : ?>
						<div class="alert alert-danger alert-dismissible fade show" id="belum_login" role="alert">
							<h><i class="fas fa-ban"></i> <?php echo $this->session->flashdata('belum_login') ?></h>
						</div>
					<?php endif; ?>
					<?php if ($this->session->flashdata('message') == TRUE) : ?>
						<div class="alert alert-danger alert-dismissible fade show" id="alert_message" role="alert">
							<h><i class="fas fa-ban"></i> <?php echo $this->session->flashdata('message') ?></h>
						</div>
					<?php endif; ?>
					<form action="<?= base_url() ?>login_admin/login" method="post" class="form_login">
						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<!-- <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div> -->
									<input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>" placeholder="Username" value="<?= set_value('username') ?>" name="username" id="username">
									<div class="invalid-feedback"><?= form_error('username') ?></div>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group">
									<!-- <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div> -->
									<input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" placeholder="Password" value="<?= set_value('password') ?>" name="password" id="password">
									<div class="invalid-feedback"><?= form_error('password') ?></div>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group float-left">
									<div class="form-check">
										<input class="form-check-input form-checkbox" type="checkbox" id="gridCheck">
										<label class="form-check-label" for="gridCheck">
											Show Password
										</label>
									</div>
								</div>
							</div>
							<div class="col-12">
								<div class="form-group d-flex justify-content-center">
									<div class="g-recaptcha" data-sitekey="6LdWhiEkAAAAAH9L-Wgvjm4F9CstUKS-bJ745ExN" id='recaptcha'></div>
								</div>
							</div>
							<div class="col-12">
								<?php if ($this->session->flashdata('alert_captcha') == TRUE) : ?>
									<div class="alert alert-danger alert-dismissible fade show" id="alert_captcha" role="alert">
										<h><i class="fas fa-ban"></i> <?php echo $this->session->flashdata('alert_captcha') ?></h>
									</div>
								<?php endif; ?>
							</div>
							<div class="col-12">
								<button type="button" class="btn btn-primary btn-block btn_login">Sign In</button>
							</div>
						</div>
					</form>
				<?php else : ?>
					<div class="row">
						<div class="col-12">
							<button type="button" onclick="window.history.back();" class="btn btn-primary btn-block">Kembali</button>
						</div>
					</div>
				<?php endif;  ?>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- Bootstrap 4 -->
	<script src="<?= base_url() ?>vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url() ?>vendor/adminlte/dist/js/adminlte.min.js"></script>

	<script src="<?= base_url(); ?>vendor/sweetalert/sweetalert2.all.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {

			var captcha;
			onloadCallback = function() {
				captcha = grecaptcha.render(document.getElementById('recaptcha'), {
					'sitekey': "6LdWhiEkAAAAAH9L-Wgvjm4F9CstUKS-bJ745ExN",
					'theme': 'light'
				});
			}

			$('.form-checkbox').click(function() {
				if ($(this).is(':checked')) {
					$('#password').attr('type', 'text');
				} else {
					$('#password').attr('type', 'password');
				}
			});
		});
	</script>

	<script>
		$('.btn_login').on('click', function() {
			$.ajax({
				url: $('.form_login').attr('action'),
				method: 'POST',
				data: $('.form_login').serialize(),
				dataType: 'json',
				chace: false,
				beforeSend: function() {
					$('.btn_login').attr('disabled', 'disabled');
					$('.btn_login').html('<i class="fas fa-spinner fa-spin"></i> In Process');
				},
				complete: function() {
					$('.btn_login').removeAttr('disabled', 'disabled');
					$('.btn_login').html('Sign In');
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
							window.location.href = "<?= base_url() ?>" + data.berhasil;
						}
					}
				}

			});
		});
	</script>

</body>

</html>
