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
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Pengaturan</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url() ?>admins/pengaturan/pengaturan/pengaturan" id="form_pengaturan" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group input_wrap_image">
                                        <div class="mb-5 row">
                                            <div class="col-5">
                                                <div class="col-12">
                                                    <label for="inputIcon">Icon</label>
                                                    <input hidden type="text" class="form-control" name="inputPath_icon" id="inputPath_icon" value="<?= $icon ?>" placeholder="">
                                                    <input type="file" accept=".ico" class="form-control" name="inputIcon" id="inputIcon" multiple="multiple">
                                                    <div style="text-align: center;" class="pt-3">
                                                        <?php if ($icon != "") : ?>
                                                            <div id="preview_icon"><img src="<?= base_url() ?>uploads/images/<?= $icon ?>" width="150" height="auto" /></div>
                                                        <?php else : ?>
                                                            <div id="preview_icon"></div>
                                                        <?php endif; ?>
                                                        <button type="button" class="btn text-danger btn-delete-img-icon"><i class="fas fa-times-circle"></i></button>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label for="inputLogo">Logo</label>
                                                    <input hidden type="text" class="form-control" name="inputPath_logo" id="inputPath_logo" value="<?= $logo ?>" placeholder="">
                                                    <input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputLogo" id="inputLogo" multiple="multiple">
                                                    <div style="text-align: center;" class="pt-3">
                                                        <?php if ($logo != "") : ?>
                                                            <div id="preview_logo"><img src="<?= base_url() ?>uploads/images/<?= $logo ?>" width="150" height="auto" /></div>
                                                        <?php else : ?>
                                                            <div id="preview_logo"></div>
                                                        <?php endif; ?>
                                                        <button type="button" class="btn text-danger btn-delete-img-logo"><i class="fas fa-times-circle"></i></button>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label for="inputLogo_putih">Logo Putih</label>
                                                    <input hidden type="text" class="form-control" name="inputPath_logo_putih" id="inputPath_logo_putih" value="<?= $logo_putih ?>" placeholder="">
                                                    <input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputLogo_putih" id="inputLogo_putih" multiple="multiple">
                                                    <div style="text-align: center;" class="pt-3">
                                                        <?php if ($logo_putih != "") : ?>
                                                            <div style="background-color:#EAEDED;" id="preview_logo_putih"><img src="<?= base_url() ?>uploads/images/<?= $logo_putih ?>" width="150" height="auto" /></div>
                                                        <?php else : ?>
                                                            <div style="background-color:#EAEDED;" id="preview_logo_putih"></div>
                                                        <?php endif; ?>
                                                        <button type="button" class="btn text-danger btn-delete-img-logo_putih"><i class="fas fa-times-circle"></i></button>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label for="inputLogo_perusahaan">Logo Perusahaan</label>
                                                    <input hidden type="text" class="form-control" name="inputPath_logo_perusahaan" id="inputPath_logo_perusahaan" value="<?= $logo_perusahaan ?>" placeholder="">
                                                    <input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputLogo_perusahaan" id="inputLogo_perusahaan" multiple="multiple">
                                                    <div style="text-align: center;" class="pt-3">
                                                        <?php if ($logo_perusahaan != "") : ?>
                                                            <div id="preview_logo_perusahaan"><img src="<?= base_url() ?>uploads/images/<?= $logo_perusahaan ?>" width="150" height="auto" /></div>
                                                        <?php else : ?>
                                                            <div id="preview_logo_perusahaan"></div>
                                                        <?php endif; ?>
                                                        <button type="button" class="btn text-danger btn-delete-img-logo_perusahaan"><i class="fas fa-times-circle"></i></button>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label for="inputBg_sec_kenapa_kami">Background Section Kenapa kami</label>
                                                    <input hidden type="text" class="form-control" name="inputPath_sec_kenapa_kami" id="inputPath_sec_kenapa_kami" value="<?= $bg_sec_kenapa_kami ?>" placeholder="">
                                                    <input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputBg_sec_kenapa_kami" id="inputBg_sec_kenapa_kami" multiple="multiple">
                                                    <div style="text-align: center;" class="pt-3">
                                                        <?php if ($bg_sec_kenapa_kami != "") : ?>
                                                            <div id="preview_sec_kenapa_kami"><img src="<?= base_url() ?>uploads/images/<?= $bg_sec_kenapa_kami ?>" width="150" height="auto" /></div>
                                                        <?php else : ?>
                                                            <div id="preview_sec_kenapa_kami"></div>
                                                        <?php endif; ?>
                                                        <button type="button" class="btn text-danger btn-delete-img-sec_kenapa_kami"><i class="fas fa-times-circle"></i></button>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <label for="inputBg_sec_fasiltas">Background Section Fasilitas</label>
                                                    <input hidden type="text" class="form-control" name="inputPath_sec_fasilitas" id="inputPath_sec_fasilitas" value="<?= $bg_sec_fasilitas ?>" placeholder="">
                                                    <input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputBg_sec_fasilitas" id="inputBg_sec_fasilitas" multiple="multiple">
                                                    <div style="text-align: center;" class="pt-3">
                                                        <?php if ($bg_sec_fasilitas != "") : ?>
                                                            <div id="preview_sec_fasilitas"><img src="<?= base_url() ?>uploads/images/<?= $bg_sec_fasilitas ?>" width="150" height="auto" /></div>
                                                        <?php else : ?>
                                                            <div id="preview_sec_fasilitas"></div>
                                                        <?php endif; ?>
                                                        <button type="button" class="btn text-danger btn-delete-img-sec_fasilitas"><i class="fas fa-times-circle"></i></button>
                                                    </div>
                                                </div>

                                                <!-- <div class="col-12">
                                                    <label for="inputBg_footer">Background Footer</label>
                                                    <input hidden type="text" class="form-control" name="inputPath_footer" id="inputPath_footer" value="<?= $bg_footer ?>" placeholder="">
                                                    <input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputBg_footer" id="inputBg_footer" multiple="multiple">
                                                    <div style="text-align: center;" class="pt-3">
                                                        <?php if ($bg_footer != "") : ?>
                                                            <div id="preview_footer"><img src="<?= base_url() ?>uploads/images/<?= $bg_footer ?>" width="150" height="auto" /></div>
                                                        <?php else : ?>
                                                            <div id="preview_footer"></div>
                                                        <?php endif; ?>
                                                        <button type="button" class="btn text-danger btn-delete-img-footer"><i class="fas fa-times-circle"></i></button>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="col-7">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="inputFooter">Teks Footer</label>
                                                        <input type="text" class="form-control <?= form_error('inputFooter') ? 'is-invalid' : '' ?>" name="inputFooter" id="inputFooter" value="<?= $teks_footer ?>" placeholder="Masukan teks footer">
                                                        <div class="invalid-feedback"><?= form_error('inputFooter') ?></div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label for="inputVersi">Teks Versi</label>
                                                        <input type="text" class="form-control <?= form_error('inputVersi') ? 'is-invalid' : '' ?>" name="inputVersi" id="inputVersi" value="<?= $teks_versi ?>" placeholder="Masukan teks versi">
                                                        <div class="invalid-feedback"><?= form_error('inputVersi') ?></div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="inputTeksProperti_id">Teks Section Properti <small><b>(Indonesia)</b></small></label>
                                                                <textarea wrap="off" type="text" class="form-control" name="inputTeksProperti_id" id="inputTeksProperti_id" value="<?= set_value('inputTeksProperti_id') ?>" placeholder=""><?= $teks_sec_properti_id ?></textarea>
                                                                <div class="invalid-feedback"><?= form_error('inputTeksProperti_id') ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="inputTeksProperti_en">Teks Section Properti <small><b>(Inggris)</b></small></label>
                                                                <textarea wrap="off" type="text" class="form-control" name="inputTeksProperti_en" id="inputTeksProperti_en" value="<?= set_value('inputTeksProperti_en') ?>" placeholder=""><?= $teks_sec_properti_en ?></textarea>
                                                                <div class="invalid-feedback"><?= form_error('inputTeksProperti_en') ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="inputTeksFasilitas_id">Teks Section Fasilitas <small><b>(Indonesia)</b></small></label>
                                                                <textarea wrap="off" type="text" class="form-control" name="inputTeksFasilitas_id" id="inputTeksFasilitas_id" value="<?= set_value('inputTeksFasilitas_id') ?>" placeholder=""><?= $teks_sec_fasilitas_id ?></textarea>
                                                                <div class="invalid-feedback"><?= form_error('inputTeksFasilitas_id') ?></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="form-group">
                                                                <label for="inputTeksFasilitas_en">Teks Section Fasilitas <small><b>(Inggris)</b></small></label>
                                                                <textarea wrap="off" type="text" class="form-control" name="inputTeksFasilitas_en" id="inputTeksFasilitas_en" value="<?= set_value('inputTeksFasilitas_en') ?>" placeholder=""><?= $teks_sec_fasilitas_en ?></textarea>
                                                                <div class="invalid-feedback"><?= form_error('inputTeksFasilitas_en') ?></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-primary btn-pengaturan"><i class="fas fa-save"></i> Simpan</button>
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
        <?php
        $file_before_icon = FCPATH . './uploads/images/' . $icon;
        if ($icon == '') : ?>
            $('.btn-delete-img-icon').hide();
        <?php elseif (file_exists($file_before_icon)) : ?>
            $('.btn-delete-img-icon').show();
        <?php else : ?>
            $('.btn-delete-img-icon').hide();
        <?php endif; ?>

        <?php
        $file_before_logo = FCPATH . './uploads/images/' . $logo;
        if ($logo == '') : ?>
            $('.btn-delete-img-logo').hide();
        <?php elseif (file_exists($file_before_logo)) : ?>
            $('.btn-delete-img-logo').show();
        <?php else : ?>
            $('.btn-delete-img-logo').hide();
        <?php endif; ?>

        <?php
        $file_before_logo_putih = FCPATH . './uploads/images/' . $logo_putih;
        if ($logo_putih == '') : ?>
            $('.btn-delete-img-logo_putih').hide();
        <?php elseif (file_exists($file_before_logo_putih)) : ?>
            $('.btn-delete-img-logo_putih').show();
        <?php else : ?>
            $('.btn-delete-img-logo_putih').hide();
        <?php endif; ?>

        <?php
        $file_before_logo_perusahaan = FCPATH . './uploads/images/' . $logo_perusahaan;
        if ($logo_perusahaan == '') : ?>
            $('.btn-delete-img-logo_perusahaan').hide();
        <?php elseif (file_exists($file_before_logo_perusahaan)) : ?>
            $('.btn-delete-img-logo_perusahaan').show();
        <?php else : ?>
            $('.btn-delete-img-logo_perusahaan').hide();
        <?php endif; ?>

        <?php
        $file_before_sec_fasilitas = FCPATH . './uploads/images/' . $bg_sec_fasilitas;
        if ($bg_sec_fasilitas == '') : ?>
            $('.btn-delete-img-sec_fasilitas').hide();
        <?php elseif (file_exists($file_before_sec_fasilitas)) : ?>
            $('.btn-delete-img-sec_fasilitas').show();
        <?php else : ?>
            $('.btn-delete-img-sec_fasilitas').hide();
        <?php endif; ?>

        <?php
        $file_before_sec_kenapa_kami = FCPATH . './uploads/images/' . $bg_sec_kenapa_kami;
        if ($bg_sec_kenapa_kami == '') : ?>
            $('.btn-delete-img-sec_kenapa_kami').hide();
        <?php elseif (file_exists($file_before_sec_kenapa_kami)) : ?>
            $('.btn-delete-img-sec_kenapa_kami').show();
        <?php else : ?>
            $('.btn-delete-img-sec_kenapa_kami').hide();
        <?php endif; ?>

        <?php
        $file_before_footer = FCPATH . './uploads/images/' . $bg_footer;
        if ($bg_footer == '') : ?>
            $('.btn-delete-img-footer').hide();
        <?php elseif (file_exists($file_before_footer)) : ?>
            $('.btn-delete-img-footer').show();
        <?php else : ?>
            $('.btn-delete-img-footer').hide();
        <?php endif; ?>

    });

    function imagePreview(fileInput, val) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function(event) {
                $("#preview_" + val + "").html('<img src="' + event.target.result + '" width="150" height="auto"/>');
            };
            fileReader.readAsDataURL(fileInput.files[0]);
            $('.btn-delete-img-' + val + '').show();
        }
    }

    $("#inputIcon").change(function() {
        imagePreview(this, 'icon');
    });

    $(".btn-delete-img-icon").on('click', function() {
        $("#inputPath_icon").val(null);
        $("#inputIcon").val(null);
        $("#preview_icon").empty();
        $('.btn-delete-img-icon').hide();
    });

    $("#inputLogo").change(function() {
        imagePreview(this, 'logo');
    });

    $(".btn-delete-img-logo").on('click', function() {
        $("#inputPath_logo").val(null);
        $("#inputLogo").val(null);
        $("#preview_logo").empty();
        $('.btn-delete-img-logo').hide();
    });

    $("#inputLogo").change(function() {
        imagePreview(this, 'logo');
    });

    $(".btn-delete-img-logo").on('click', function() {
        $("#inputPath_logo").val(null);
        $("#inputLogo").val(null);
        $("#preview_logo").empty();
        $('.btn-delete-img-logo').hide();
    });

    $("#inputLogo_putih").change(function() {
        imagePreview(this, 'logo_putih');
    });

    $(".btn-delete-img-logo_putih").on('click', function() {
        $("#inputPath_logo_putih").val(null);
        $("#inputLogo_putih").val(null);
        $("#preview_logo_putih").empty();
        $('.btn-delete-img-logo_putih').hide();
    });

    $("#inputLogo_perusahaan").change(function() {
        imagePreview(this, 'logo_perusahaan');
    });

    $(".btn-delete-img-logo_perusahaan").on('click', function() {
        $("#inputPath_logo_perusahaan").val(null);
        $("#inputLogo_perusahaan").val(null);
        $("#preview_logo_perusahaan").empty();
        $('.btn-delete-img-logo_perusahaan').hide();
    });

    $("#inputBg_sec_kenapa_kami").change(function() {
        imagePreview(this, 'sec_kenapa_kami');
    });

    $(".btn-delete-img-sec_kenapa_kami").on('click', function() {
        $("#inputPath_sec_kenapa_kami").val(null);
        $("#inputBg_sec_kenapa_kami").val(null);
        $("#preview_sec_kenapa_kami").empty();
        $('.btn-delete-img-sec_kenapa_kami').hide();
    });

    $("#inputBg_sec_fasilitas").change(function() {
        imagePreview(this, 'sec_fasilitas');
    });

    $(".btn-delete-img-sec_fasilitas").on('click', function() {
        $("#inputPath_sec_fasilitas").val(null);
        $("#inputBg_sec_fasilitas").val(null);
        $("#preview_sec_fasilitas").empty();
        $('.btn-delete-img-sec_fasilitas').hide();
    });

    $("#inputBg_footer").change(function() {
        imagePreview(this, 'footer');
    });

    $(".btn-delete-img-footer").on('click', function() {
        $("#inputPath_footer").val(null);
        $("#inputBg_footer").val(null);
        $("#preview_footer").empty();
        $('.btn-delete-img-footer').hide();
    });

    $('.btn-pengaturan').on('click', function() {
        var form = $('#form_pengaturan')[0];
        var data_form = new FormData(form);
        $.ajax({
            url: $('#form_pengaturan').attr('action'),
            method: 'POST',
            enctype: 'multipart/form-data',
            data: data_form,
            dataType: 'json',
            contentType: false,
            processData: false,
            chace: false,
            beforeSend: function() {
                $('.btn-pengaturan').attr('disabled', 'disabled');
                $('.btn-pengaturan').html('<i class="fas fa-spinner fa-spin"></i> In Process');
            },
            complete: function() {
                $('.btn-pengaturan').removeAttr('disabled', 'disabled');
                $('.btn-pengaturan').html('<i class="fas fa-save"></i> Tambah');
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