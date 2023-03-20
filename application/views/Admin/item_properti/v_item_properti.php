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
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">List Properti</h3>
				<a href="<?= base_url() ?>admins/item_properti/tambah" class="float-right btn btn-sm btn-primary" style="cursor:pointer;"> <i class="fas fa-plus"></i> Tambah Properti</a>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-hover table-striped dt-responsive" id="table_properti" style="width: 100%;">
					<thead class="thead-light">
						<tr>
							<th>#</th>
							<th>Nama Properti</th>
							<th>Kategori</th>
							<th>Meta</th>
							<th>Slug</th>
							<th>Gambar</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>

					</tbody>
				</table>
			</div>
			<!-- /.card-body -->
		</div>
		<!-- /.card -->

	</section>

</div>

<script>
	var table = $('#table_properti').DataTable({
		"processing": true,
		"serverSide": true,
		"order": [],
		"ajax": {
			"url": "<?= base_url() ?>admins/item_properti/item_properti/get_list_properti",
			"type": "POST"
		},
		"columnDefs": [{
			"targets": [0, 4, 5, 6],
			"orderable": false
		}],
		"orderCellsTop": true,
	});

	function hapus_properti(id, name) {
		Swal.fire({
			title: 'Apa kamu yakin?',
			text: "Anda Akan Menghapus " + name,
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			cancelButtonText: 'Batal',
			confirmButtonText: 'Ya, hapus!',
			backdrop: true,
		}).then((result) => {
			if (result.value) {
				$.ajax({
					url: '<?= base_url("admins/item_properti/item_properti/hapus") ?>',
					method: 'POST',
					data: {
						id: id,
						name_id: name
					},
					dataType: 'json',
					chace: false,
					success: function(data) {
						if (data.berhasil) {

							const Toast = Swal.mixin({
								toast: true,
								position: 'top-end',
								showConfirmButton: false,
								timer: 3000,
								timerProgressBar: true,
								didOpen: (toast) => {
									toast.addEventListener('mouseenter', Swal.stopTimer)
									toast.addEventListener('mouseleave', Swal.resumeTimer)
								}
							});

							Toast.fire({
								icon: 'success',
								title: data.berhasil
							})
							$('#table_properti').DataTable().ajax.reload();
						}
					}

				});
			}
		})
	}
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
