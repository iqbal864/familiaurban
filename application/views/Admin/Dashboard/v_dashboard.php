<style>

</style>
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<h1><?= $title ?></h1>
			<div>
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-transparent">
						<!-- <li class="breadcrumb-item"><a href="<?= base_url() ?>admins/admins">Dashboard</a></li> -->
						<li class="breadcrumb-item active" aria-current="page"><?= $title ?></li>
					</ol>
				</nav>
			</div>
		</div>
		<!-- /.container-fluid -->
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-6">
					<div class="small-box bg-light">
						<div class="inner">
							<h3><?= $pengunjunghariini ?></h3>
							<p>Pengunjung Hari Ini</p>
						</div>
						<div class="icon">
							<i style="color: #007bff;" class="ion ion-paper-airplane"></i>
						</div>
					</div>
				</div>

				<div class="col-lg-3 col-6">
					<div class="small-box bg-light">
						<div class="inner">
							<h3><?= $pengunjungonline ?></h3>
							<p>Pengunjung Online</p>
						</div>
						<div class="icon">
							<i style="color:#2ECC71;" class="ion ion-ionic"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<span class="mr-auto">Total Pengunjung : <b class="sum_visitor"></b></span>
						<ul class="nav nav-tabs">
							<li class="nav-item dropdown">
								<a class="dropdown_tahun btn btn-light dropdown-toggle shadow-sm bg-white rounded" data-toggle="dropdown" id="dropdownMenuLink2" href="#" role="button" aria-haspopup="true" aria-expanded="false"></a>
								<div class="dropdown-menu dropdown-menu-right" id="dropdownMenuLink2">
									<?php
									$query = $this->db->query("SELECT Year(`date`) as tahun FROM visitor GROUP BY Year(`date`) ORDER BY Year(`date`) ASC")->result_array();
									foreach ($query as $q) : ?>
										<?php $hun = $q['tahun'] ?>
										<a style="cursor: pointer;" class="dropdown-item" id="nav-home-tab" onclick="show_data_chart('<?= $hun ?>')" aria-selected="true"><?= $q['tahun'] ?></a>
									<?php endforeach; ?>
								</div>
							</li>
						</ul>
					</div>
				</div>
				<div class="card-body">
					<p style="width: 100%;" class="show_data_chart">

					</p>
				</div>
			</div>
		</div>
	</section>
</div>


<script>
	$(document).ready(function() {
		show_data_chart(<?= $tahun ?>);
	});

	function show_data_chart(tahun) {
		$.ajax({
			url: '<?= base_url("admins/admins/get_curva"); ?>',
			dataType: 'json',
			data: {
				tahun: tahun
			},
			success: function(data) {
				$('.show_data_chart').html(data.hasil);
				$(".dropdown_tahun").text(tahun);
			},
			error: function(xhr, ajaxOptions, thrownError, data) {
				alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
				// console.log(thrownError);
			}

		});
	}
</script>
