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
						<h3 class="card-title">Form Spesifikasi Tipe Properti</h3>
					</div>
					<div class="card-body">
						<form action="<?= base_url() ?>admins/item_properti/tipe_properti/spesifikasi/spesifikasi" id="form_spesifikasi" method="post" enctype="multipart/form-data">
							<div class="row">
								<div class="col-3">
									<div class="form-group">
										<label for="inputUkuran">Ukuran</label>
										<input type="text" class="form-control" name="inputUkuran" id="inputUkuran" value="<?= !empty($ukuran['ukuran']) ? htmlentities($ukuran['ukuran']) : '' ?>" placeholder="">
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label for="inputLuasTanah">Luas Tanah</label>
										<input type="text" class="form-control" name="inputLuasTanah" id="inputLuasTanah" value="<?= !empty($ukuran['luas_tanah']) ? htmlentities($ukuran['luas_tanah']) : '' ?>" placeholder="">
									</div>
								</div>
								<div class="col-3">
									<div class="form-group">
										<label for="inputLuasBangunan">Luas Bangunan</label>
										<input type="text" class="form-control" name="inputLuasBangunan" id="inputLuasBangunan" value="<?= !empty($ukuran['luas_bangunan']) ? htmlentities($ukuran['luas_bangunan']) : '' ?>" placeholder="">
									</div>
								</div>
								<div class="col-12 mt-5">
									<div class="form-group div_kluster">
										<label for="inputKluster">Kluster</label>
										<input type="text" class="form-control <?= form_error('inputKluster') ? 'is-invalid' : '' ?>" name="inputKluster" id="inputKluster">
									</div>
									<div hidden class="form-group">
										<label for="inputId">Id</label>
										<input type="text" class="form-control <?= form_error('inputId') ? 'is-invalid' : '' ?>" name="inputId" id="inputId">
									</div>
									<?php if (sizeof($spesifikasi) != 0) {
										$heading_id = $spesifikasi[0]['heading_id'];
										$data_id = $spesifikasi[0]['data_id'];
										$heading_en = $spesifikasi[0]['heading_en'];
										$data_en = $spesifikasi[0]['data_en'];
										$x = count($spesifikasi);
									} else {
										$heading_id = "";
										$data_id = "";
										$heading_en = "";
										$data_en = "";
										$x = 12;
									} ?>
									<div class="form-group input_wrap">
										<label for="inputSpek1">Spesifikasi</label>
										<button class="add_field_button btn btn-xs btn-primary"><i class="fas fa-plus"></i></button>
										<div class="row">
											<div class="col-6">
												<label for="inputSpek1"><small><b>(Indonesia)</b></small></label>
											</div>
											<div class="col-6">
												<label for="inputSpek1"><small><b>(Inggris)</b></small></label>
											</div>
										</div>
										<?php if (sizeof($spesifikasi) != 0) : ?>
											<div class="row">
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek1[]" id="inputSpek1" value="<?= htmlentities($heading_id) ?>">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek2[]" id="inputSpek2" value="<?= $data_id ?>" placeholder=""><?= $data_id ?></textarea>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek3[]" id="inputSpek3" value="<?= htmlentities($heading_en) ?>">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek4[]" id="inputSpek4" value="<?= $data_en ?>" placeholder=""><?= $data_en ?></textarea>
														</div>
													</div>
												</div>
											</div>

											<?php for ($i = 1; $i < count($spesifikasi); $i++) : ?>
												<div class="row">
													<div class="col-6">
														<div class="mb-3 row">
															<div class="col-3">
																<input type="text" class="form-control" name="inputSpek1[]" id="inputSpek1" value="<?= htmlentities($spesifikasi[$i]['heading_id']) ?>">
															</div>
															<div class="col-8">
																<textarea wrap="off" type="text" class="form-control" name="inputSpek2[]" id="inputSpek2" value="<?= $spesifikasi[$i]['data_id'] ?>" placeholder=""><?= $spesifikasi[$i]['data_id'] ?></textarea>
															</div>
														</div>
													</div>
													<div class="col-6">
														<div class="mb-3 row">
															<div class="col-3">
																<input type="text" class="form-control" name="inputSpek3[]" id="inputSpek3" value="<?= htmlentities($spesifikasi[$i]['heading_en']) ?>">
															</div>
															<div class="col-8">
																<textarea wrap="off" type="text" class="form-control" name="inputSpek4[]" id="inputSpek4" value="<?= $spesifikasi[$i]['data_en'] ?>" placeholder=""><?= $spesifikasi[$i]['data_en'] ?></textarea>
															</div>
															<div class="col-1">
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
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek1[]" id="inputSpek1" value="Pondasi">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek2[]" id="inputSpek2" value="<?= set_value('inputSpek2') ?>" placeholder=""></textarea>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek3[]" id="inputSpek3" value="Building foundation">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek4[]" id="inputSpek4" value="<?= set_value('inputSpek4') ?>" placeholder=""></textarea>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek1[]" id="inputSpek1" value="Struktur">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek2[]" id="inputSpek2" value="<?= set_value('inputSpek2') ?>" placeholder=""></textarea>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek3[]" id="inputSpek3" value="Structure">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek4[]" id="inputSpek4" value="<?= set_value('inputSpek4') ?>" placeholder=""></textarea>
														</div>
														<div class="col-1">
															<button class="btn btn-sm btn-outline-danger remove_field" type="button">
																<i class="fas fa-trash-alt"></i>
															</button>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek1[]" id="inputSpek1" value="Dinding">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek2[]" id="inputSpek2" value="<?= set_value('inputSpek2') ?>" placeholder=""></textarea>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek3[]" id="inputSpek3" value="Wall">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek4[]" id="inputSpek4" value="<?= set_value('inputSpek4') ?>" placeholder=""></textarea>
														</div>
														<div class="col-1">
															<button class="btn btn-sm btn-outline-danger remove_field" type="button">
																<i class="fas fa-trash-alt"></i>
															</button>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek1[]" id="inputSpek1" value="lantai">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek2[]" id="inputSpek2" value="<?= set_value('inputSpek2') ?>" placeholder=""></textarea>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek3[]" id="inputSpek3" value="Floor">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek4[]" id="inputSpek4" value="<?= set_value('inputSpek4') ?>" placeholder=""></textarea>
														</div>
														<div class="col-1">
															<button class="btn btn-sm btn-outline-danger remove_field" type="button">
																<i class="fas fa-trash-alt"></i>
															</button>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek1[]" id="inputSpek1" value="Kusen">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek2[]" id="inputSpek2" value="<?= set_value('inputSpek2') ?>" placeholder=""></textarea>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek3[]" id="inputSpek3" value="Jamb">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek4[]" id="inputSpek4" value="<?= set_value('inputSpek4') ?>" placeholder=""></textarea>
														</div>
														<div class="col-1">
															<button wrap="off" class="btn btn-sm btn-outline-danger remove_field" type="button">
																<i class="fas fa-trash-alt"></i>
															</button>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek1[]" id="inputSpek1" value="Daun Pintu">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek2[]" id="inputSpek2" value="<?= set_value('inputSpek2') ?>" placeholder=""></textarea>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek3[]" id="inputSpek3" value="Leaf doors">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek4[]" id="inputSpek4" value="<?= set_value('inputSpek4') ?>" placeholder=""></textarea>
														</div>
														<div class="col-1">
															<button class="btn btn-sm btn-outline-danger remove_field" type="button">
																<i class="fas fa-trash-alt"></i>
															</button>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek1[]" id="inputSpek1" value="Plafond">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek2[]" id="inputSpek2" value="<?= set_value('inputSpek2') ?>" placeholder=""></textarea>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek3[]" id="inputSpek3" value="Ceiling">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek4[]" id="inputSpek4" value="<?= set_value('inputSpek4') ?>" placeholder=""></textarea>
														</div>
														<div class="col-1">
															<button class="btn btn-sm btn-outline-danger remove_field" type="button">
																<i class="fas fa-trash-alt"></i>
															</button>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek1[]" id="inputSpek1" value="Atap">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek2[]" id="inputSpek2" value="<?= set_value('inputSpek2') ?>" placeholder=""></textarea>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek3[]" id="inputSpek3" value="Roof">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek4[]" id="inputSpek4" value="<?= set_value('inputSpek4') ?>" placeholder=""></textarea>
														</div>
														<div class="col-1">
															<button class="btn btn-sm btn-outline-danger remove_field" type="button">
																<i class="fas fa-trash-alt"></i>
															</button>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek1[]" id="inputSpek1" value="Penutup Atap">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek2[]" id="inputSpek2" value="<?= set_value('inputSpek2') ?>" placeholder=""></textarea>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek3[]" id="inputSpek3" value="Roof Cover">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek4[]" id="inputSpek4" value="<?= set_value('inputSpek4') ?>" placeholder=""></textarea>
														</div>
														<div class="col-1">
															<button class="btn btn-sm btn-outline-danger remove_field" type="button">
																<i class="fas fa-trash-alt"></i>
															</button>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek1[]" id="inputSpek1" value="Sanitair">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek2[]" id="inputSpek2" value="<?= set_value('inputSpek2') ?>" placeholder=""></textarea>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek3[]" id="inputSpek3" value="Sanitary">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek4[]" id="inputSpek4" value="<?= set_value('inputSpek4') ?>" placeholder=""></textarea>
														</div>
														<div class="col-1">
															<button class="btn btn-sm btn-outline-danger remove_field" type="button">
																<i class="fas fa-trash-alt"></i>
															</button>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek1[]" id="inputSpek1" value="Listrik">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek2[]" id="inputSpek2" value="<?= set_value('inputSpek2') ?>" placeholder=""></textarea>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek3[]" id="inputSpek3" value="Electricity">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek4[]" id="inputSpek4" value="<?= set_value('inputSpek4') ?>" placeholder=""></textarea>
														</div>
														<div class="col-1">
															<button class="btn btn-sm btn-outline-danger remove_field" type="button">
																<i class="fas fa-trash-alt"></i>
															</button>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek1[]" id="inputSpek1" value="Sumber Air">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek2[]" id="inputSpek2" value="<?= set_value('inputSpek2') ?>" placeholder=""></textarea>
														</div>
													</div>
												</div>
												<div class="col-6">
													<div class="mb-3 row">
														<div class="col-3">
															<input type="text" class="form-control" name="inputSpek3[]" id="inputSpek3" value="Water sources">
														</div>
														<div class="col-8">
															<textarea wrap="off" type="text" class="form-control" name="inputSpek4[]" id="inputSpek4" value="<?= set_value('inputSpek4') ?>" placeholder=""></textarea>
														</div>
														<div class="col-1">
															<button class="btn btn-sm btn-outline-danger remove_field" type="button">
																<i class="fas fa-trash-alt"></i>
															</button>
														</div>
													</div>
												</div>
											</div>
										<?php endif; ?>
									</div>
								</div>
								<div class="col-12 mt-5">
									<div class="row">
										<div class="col-8">
											<?php if (sizeof($spesifikasi_tambahan) != 0) {
												$heading_id_tambahan = $spesifikasi_tambahan[0]['heading_id'];
												$data_id_tambahan = $spesifikasi_tambahan[0]['data_id'];
												$heading_en_tambahan = $spesifikasi_tambahan[0]['heading_en'];
												$data_en_tambahan = $spesifikasi_tambahan[0]['data_en'];
												$x_tambahan = count($spesifikasi_tambahan);
											} else {
												$heading_id_tambahan = "";
												$data_id_tambahan = "";
												$heading_en_tambahan = "";
												$data_en_tambahan = "";
												$x_tambahan = 4;
											} ?>
											<div class="form-group input_wrap3">
												<label for="inputTambahan1">Tambahan</label>
												<button class="add_field_button3 btn btn-xs btn-primary"><i class="fas fa-plus"></i></button>
												<div class="row">
													<div class="col-6">
														<label for="inputSpek1"><small><b>(Indonesia)</b></small></label>
													</div>
													<div class="col-6">
														<label for="inputSpek1"><small><b>(Inggris)</b></small></label>
													</div>
												</div>
												<?php if (sizeof($spesifikasi_tambahan) != 0) : ?>
													<div class="row">
														<div class="col-6">
															<div class="mb-3 row">
																<div class="col-7">
																	<input type="text" class="form-control" name="inputTambahan1[]" id="inputTambahan1" value="<?= $heading_id_tambahan ?>">
																</div>
																<div class=" col-4">
																	<input type="number" class="form-control" name="inputTambahan2[]" id="inputTambahan2" value="<?= $data_id_tambahan ?>">
																</div>
															</div>
														</div>
														<div class="col-6">
															<div class="mb-3 row">
																<div class="col-7">
																	<input type="text" class="form-control" name="inputTambahan3[]" id="inputTambahan3" value="<?= $heading_en_tambahan ?>">
																</div>
																<div class="col-4">
																	<input type="number" class="form-control" name="inputTambahan4[]" id="inputTambahan4" value="<?= $data_en_tambahan ?>">
																</div>
															</div>
														</div>
													</div>
													<?php for ($i = 1; $i < count($spesifikasi_tambahan); $i++) : ?>
														<div class="row">
															<div class="col-6">
																<div class="mb-3 row">
																	<div class="col-7">
																		<input type="text" class="form-control" name="inputTambahan1[]" id="inputTambahan1" value="<?= $spesifikasi_tambahan[$i]['heading_id'] ?>">
																	</div>
																	<div class="col-4">
																		<input type="number" class="form-control" name="inputTambahan2[]" id="inputTambahan2" value="<?= $spesifikasi_tambahan[$i]['data_id'] ?>">
																	</div>
																</div>
															</div>
															<div class="col-6">
																<div class="mb-3 row">
																	<div class="col-7">
																		<input type="text" class="form-control" name="inputTambahan3[]" id="inputTambahan3" value="<?= $spesifikasi_tambahan[$i]['heading_en'] ?>">
																	</div>
																	<div class="col-4">
																		<input type="number" class="form-control" name="inputTambahan4[]" id="inputTambahan4" value="<?= $spesifikasi_tambahan[$i]['data_en'] ?>">
																	</div>
																	<div class="col-1">
																		<button class="btn btn-xs btn-outline-danger remove_field3" type="button">
																			<i class="fas fa-trash-alt"></i>
																		</button>
																	</div>
																</div>
															</div>
														</div>
													<?php endfor; ?>
												<?php else : ?>
													<div class="row">
														<div class="col-6">
															<div class="mb-3 row">
																<div class="col-7">
																	<input type="text" class="form-control" name="inputTambahan1[]" id="inputTambahan1" value="Jumlah Lantai">
																</div>
																<div class="col-4">
																	<input type="number" class="form-control" name="inputTambahan2[]" id="inputTambahan2" value="">
																</div>
															</div>
														</div>
														<div class="col-6">
															<div class="mb-3 row">
																<div class="col-7">
																	<input type="text" class="form-control" name="inputTambahan3[]" id="inputTambahan3" value="Number of Floors">
																</div>
																<div class="col-4">
																	<input type="number" class="form-control" name="inputTambahan4[]" id="inputTambahan4" value="">
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-6">
															<div class="mb-3 row">
																<div class="col-7">
																	<input type="text" class="form-control" name="inputTambahan1[]" id="inputTambahan1" value="Jumlah Kamar">
																</div>
																<div class="col-4">
																	<input type="number" class="form-control" name="inputTambahan2[]" id="inputTambahan2" value="">
																</div>
															</div>
														</div>
														<div class="col-6">
															<div class="mb-3 row">
																<div class="col-7">
																	<input type="text" class="form-control" name="inputTambahan3[]" id="inputTambahan3" value="Number of Bedrooms">
																</div>
																<div class="col-4">
																	<input type="number" class="form-control" name="inputTambahan4[]" id="inputTambahan4" value="">
																</div>
																<div class="col-1">
																	<button class="btn btn-xs btn-outline-danger remove_field3" type="button">
																		<i class="fas fa-trash-alt"></i>
																	</button>
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-6">
															<div class="mb-3 row">
																<div class="col-7">
																	<input type="text" class="form-control" name="inputTambahan1[]" id="inputTambahan1" value="Jumlah Kamar Mandi">
																</div>
																<div class="col-4">
																	<input type="number" class="form-control" name="inputTambahan2[]" id="inputTambahan2" value="">
																</div>
															</div>
														</div>
														<div class="col-6">
															<div class="mb-3 row">
																<div class="col-7">
																	<input type="text" class="form-control" name="inputTambahan3[]" id="inputTambahan3" value="Number of Bathrooms">
																</div>
																<div class="col-4">
																	<input type="number" class="form-control" name="inputTambahan4[]" id="inputTambahan4" value="">
																</div>
																<div class="col-1">
																	<button class="btn btn-xs btn-outline-danger remove_field3" type="button">
																		<i class="fas fa-trash-alt"></i>
																	</button>
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-6">
															<div class="mb-3 row">
																<div class="col-7">
																	<input type="text" class="form-control" name="inputTambahan1[]" id="inputTambahan1" value="Carport">
																</div>
																<div class="col-4">
																	<input type="number" class="form-control" name="inputTambahan2[]" id="inputTambahan2" value="">
																</div>
															</div>
														</div>
														<div class="col-6">
															<div class="mb-3 row">
																<div class="col-7">
																	<input type="text" class="form-control" name="inputTambahan3[]" id="inputTambahan3" value="Carport">
																</div>
																<div class="col-4">
																	<input type="number" class="form-control" name="inputTambahan4[]" id="inputTambahan4" value="">
																</div>
																<div class="col-1">
																	<button class="btn btn-xs btn-outline-danger remove_field3" type="button">
																		<i class="fas fa-trash-alt"></i>
																	</button>
																</div>
															</div>
														</div>
													</div>
												<?php endif; ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="card-footer text-right">
						<a href="<?= base_url() ?>admins/item_properti/tipe_properti/<?= $properti['slug_id'] ?>" class="btn btn-light" style="border: 1px solid #000;"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
						<button type="button" class="btn btn-primary btn-spesifikasi"><i class="fas fa-save"></i> Simpan</button>
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

		var max_fields = 20; //maximum input boxes allowed
		var wrapper = $(".input_wrap"); //Fields wrapper
		var add_button = $(".add_field_button"); //Add button ID

		var x = <?= $x ?>; //initlal text box count
		$(add_button).click(function(e) { //on add input button click
			e.preventDefault();
			if (x < max_fields) { //max input box allowed
				x++; //text box increment
				$(wrapper).append('<div class="row">' +
					'<div class="col-6">' +
					'<div class="mb-3 row">' +
					'<div class="col-3">' +
					'<input type="text" class="form-control" name="inputSpek1[]" id="inputSpek1" value="">' +
					'</div>' +
					'<div class="col-8">' +
					'<textarea wrap="off" type="text" class="form-control" name="inputSpek2[]" id="inputSpek2" value="<?= set_value('inputSpek2') ?>" placeholder=""></textarea>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'<div class="col-6">' +
					'<div class="mb-3 row">' +
					'<div class="col-3">' +
					'<input type="text" class="form-control" name="inputSpek3[]" id="inputSpek3" value="">' +
					'</div>' +
					'<div class="col-8">' +
					'<textarea wrap="off" type="text" class="form-control" name="inputSpek4[]" id="inputSpek4" value="<?= set_value('inputSpek4') ?>" placeholder=""></textarea>' +
					'</div>' +
					'<div class="col-1">' +
					'<button wrap="off" class="btn btn-sm btn-outline-danger remove_field" type="button">' +
					'<i class="fas fa-trash-alt"></i>' +
					'</button>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'</div>'); //add input box
			}
		});

		$(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
			e.preventDefault();
			$(this).parent('div').parent('div').parent('div').parent('div').remove();
			x--;
		})


		var max_fields3 = 10; //maximum input boxes allowed
		var wrapper3 = $(".input_wrap3"); //Fields wrapper
		var add_button3 = $(".add_field_button3"); //Add button ID

		var x3 = <?= $x_tambahan ?>; //initlal text box count
		$(add_button3).click(function(e) { //on add input button click
			e.preventDefault();
			if (x3 < max_fields3) { //max input box allowed
				x3++; //text box increment
				$(wrapper3).append(' <div class="row">' +
					'<div class="col-6">' +
					'<div class="mb-3 row">' +
					'<div class="col-7">' +
					'<input type="text" class="form-control" name="inputTambahan1[]" id="inputTambahan1" value="">' +
					'</div>' +
					'<div class="col-4">' +
					'<input type="number" class="form-control" name="inputTambahan2[]" id="inputTambahan2" value="">' +
					'</div>' +
					'</div>' +
					'</div>' +
					'<div class="col-6">' +
					'<div class="mb-3 row">' +
					'<div class="col-7">' +
					'<input type="text" class="form-control" name="inputTambahan3[]" id="inputTambahan3" value="">' +
					'</div>' +
					'<div class="col-4">' +
					'<input type="number" class="form-control" name="inputTambahan4[]" id="inputTambahan4" value="">' +
					'</div>' +
					'<div class="col-1">' +
					'<button class="btn btn-xs btn-outline-danger remove_field3" type="button">' +
					'<i class="fas fa-trash-alt"></i>' +
					'</button>' +
					'</div>' +
					'</div>' +
					'</div>' +
					'</div>'); //add input box
			}
		});

		$(wrapper3).on("click", ".remove_field3", function(e) { //user click on remove text
			e.preventDefault();
			$(this).parent('div').parent('div').parent('div').parent('div').remove();
			x3--;
		})

		var max_fields4 = 10; //maximum input boxes allowed
		var wrapper4 = $(".input_wrap4"); //Fields wrapper
		var add_button4 = $(".add_field_button4"); //Add button ID

		var x4 = 4; //initlal text box count
		$(add_button4).click(function(e) { //on add input button click
			e.preventDefault();
			if (x4 < max_fields4) { //max input box allowed
				x4++; //text box increment
				$(wrapper4).append('<div class="mb-3 row">' +
					'<div class="col-7">' +
					'<input type="text" class="form-control" name="inputTambahan3[]" id="inputTambahan3" value="<?= set_value('inputTambahan3') ?>">' +
					'</div>' +
					'<div class="col-4">' +
					'<input type="number" class="form-control" name="inputTambahan4[]" id="inputTambahan4" value="">' +
					'</div>' +
					'<div class="col-1 text-right">' +
					'<button class="btn btn-xs btn-outline-danger remove_field4" type="button">' +
					'<i class="fas fa-trash-alt"></i>' +
					'</button>' +
					'</div>' +
					'</div>'); //add input box
			}
		});

		$(wrapper4).on("click", ".remove_field4", function(e) { //user click on remove text
			e.preventDefault();
			$(this).parent('div').parent('div').remove();
			x4--;
		})
	});


	$('.btn-spesifikasi').on('click', function() {
		var form = $('#form_spesifikasi')[0];
		var data_form = new FormData(form);
		$.ajax({
			url: $('#form_spesifikasi').attr('action'),
			method: 'POST',
			enctype: 'multipart/form-data',
			data: data_form,
			dataType: 'json',
			contentType: false,
			processData: false,
			chace: false,
			beforeSend: function() {
				$('.btn-spesifikasi').attr('disabled', 'disabled');
				$('.btn-spesifikasi').html('<i class="fas fa-spinner fa-spin"></i> In Process');
			},
			complete: function() {
				$('.btn-spesifikasi').removeAttr('disabled', 'disabled');
				$('.btn-spesifikasi').html('<i class="fas fa-save"></i> Tambah');
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
