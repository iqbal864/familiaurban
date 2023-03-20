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
                        <h3 class="card-title">Form Kerja Sama Bank</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url() ?>admins/kerja_sama/kerja_sama/kerja_sama" id="form_gambar" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group input_wrap_image">
                                        <label for="inputTambahan1">List Bank </label>
                                        <button class="add_field_button_image btn btn-xs btn-primary"><i class="fas fa-plus"></i></button>
                                        <div hidden class="form-group">
                                            <label for="inputCount">Count</label>
                                            <input type="text" class="form-control <?= form_error('inputCount') ? 'is-invalid' : '' ?>" value="0" name="inputCount" id="inputCount">
                                        </div>
                                        <?php if (sizeof($kerja_sama) != 0) {
                                            $nama_file = $kerja_sama[0]['nama_file'];
                                            $x_gambar = count($kerja_sama);
                                        } else {
                                            $nama_file = "";
                                            $x_gambar = 1;
                                        } ?>

                                        <?php if (sizeof($kerja_sama) != 0) : ?>
                                            <div class="mb-5 row" style="background-color: #F8F9F9;">
                                                <input hidden type="text" class="form-control" name="inputPath[]" id="inputPath1" value="<?= $kerja_sama[0]['nama_file'] ?>" placeholder="">
                                                <input hidden type="text" class="form-control" name="inputIdGambar[]" id="inputIdGambar1" value="<?= $kerja_sama[0]['id'] ?>" placeholder="">
                                                <div class="col-11">
                                                    <input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputBank[]" id="inputBank1" multiple="multiple">
                                                    <div style="text-align: center;" class="pt-3">
                                                        <?php if ($kerja_sama[0]['nama_file'] != "") : ?>
                                                            <div id="preview_bank1"><img src="<?= base_url() ?>uploads/images/kerja_sama/<?= $kerja_sama[0]['nama_file'] ?>" width="150" height="auto" /></div>
                                                        <?php else : ?>
                                                            <div id="preview_bank1"></div>
                                                        <?php endif; ?>
                                                        <button type="button" class="btn text-danger btn-delete-img-bank1"><i class="fas fa-times-circle"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php for ($i = 1; $i < count($kerja_sama); $i++) :
                                                $index = $i + 1 ?>
                                                <div class="mb-5 row" style="background-color: #F8F9F9;">
                                                    <input hidden type="text" class="form-control" name="inputPath[]" id="inputPath<?= $index ?>" value="<?= $kerja_sama[$i]['nama_file'] ?>" placeholder="">
                                                    <input hidden type="text" class="form-control" name="inputIdGambar[]" id="inputIdGambar<?= $index ?>" value="<?= $kerja_sama[$i]['id'] ?>" placeholder="">
                                                    <div class="col-11">
                                                        <input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputBank[]" id="inputBank<?= $index ?>" multiple="multiple">
                                                        <div style="text-align: center;" class="pt-3">
                                                            <?php if ($kerja_sama[$i]['nama_file'] != "") : ?>
                                                                <div id="preview_bank<?= $index ?>"><img src="<?= base_url() ?>uploads/images/kerja_sama/<?= $kerja_sama[$i]['nama_file'] ?>" width="150" height="auto" /></div>
                                                            <?php else : ?>
                                                                <div id="preview_bank<?= $index ?>"></div>
                                                            <?php endif; ?>
                                                            <button type="button" class="btn text-danger btn-delete-img-bank<?= $index ?>"><i class="fas fa-times-circle"></i></button>
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <button class="btn btn-xs btn-outline-danger remove_field2" data-value="<?= $index ?>" type="button">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </div>
                                                    <script id="script<?= $index ?>">
                                                        $(document).ready(function() {
                                                            <?php
                                                            if (sizeof($kerja_sama) != 0) :
                                                                $file_before = FCPATH . './uploads/images/kerja_sama/' . $kerja_sama[$i]['nama_file'];
                                                                if ($kerja_sama[$i]['nama_file'] == '') : ?>
                                                                    $('.btn-delete-img-bank<?= $index ?>').hide();

                                                                <?php elseif (file_exists($file_before)) : ?>
                                                                    $('.btn-delete-img-bank<?= $index ?>').show();

                                                                <?php else : ?>
                                                                    $('.btn-delete-img-bank<?= $index ?>').hide();

                                                                <?php endif; ?>

                                                            <?php else : ?>
                                                                $('.btn-delete-img-bank<?= $index ?>').hide();
                                                            <?php endif; ?>

                                                            $("#inputBank<?= $index ?>").change(function() {
                                                                imagePreviewBank(this, <?= $index ?>);
                                                            });

                                                            $(".btn-delete-img-bank<?= $index ?>").on("click", function() {
                                                                $("#inputPath<?= $index ?>").val(null);
                                                                $("#inputBank<?= $index ?>").val(null);
                                                                $("#preview_bank<?= $index ?>").empty();
                                                                $(".btn-delete-img-bank<?= $index ?>").hide();
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            <?php endfor; ?>
                                        <?php else : ?>
                                            <div class="mb-5 row" style="background-color: #F8F9F9;">
                                                <div class="col-11">
                                                    <input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputBank[]" id="inputBank1" multiple="multiple">
                                                    <div style="text-align: center;" class="pt-3">
                                                        <div id="preview_bank1"></div>
                                                        <button type="button" class="btn text-danger btn-delete-img-bank1"><i class="fas fa-times-circle"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-primary btn-gambar"><i class="fas fa-save"></i> Simpan</button>
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
        var max_fields_image = 20; //maximum input boxes allowed
        var wrapper_image = $(".input_wrap_image"); //Fields wrapper
        var add_button_image = $(".add_field_button_image"); //Add button ID

        var x_image = $('#inputCount').val() + <?= $x_gambar ?>;
        var index = $('#inputCount').val() + <?= $x_gambar ?>;
        //initlal text box count
        $(add_button_image).click(function(e) { //on add input button click
            e.preventDefault();
            if (index < max_fields_image) { //max input box allowed
                x_image++; //text box increment
                index++;
                $(wrapper_image).append('<div class="mb-5 row" style="background-color: #F8F9F9;">' +
                    '<div class="col-11">' +
                    '<input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="inputBank[]" id="inputBank' + x_image + '" multiple="multiple">' +
                    '<div style="text-align: center;" class="pt-3">' +
                    '<div id="preview_bank' + x_image + '"></div>' +
                    '<button type="button" class="btn text-danger btn-delete-img-bank' + x_image + '"><i class="fas fa-times-circle"></i></button>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-1">' +
                    '<button class="btn btn-xs btn-outline-danger remove_field2" data-value="' + x_image + '" type="button">' +
                    '<i class="fas fa-trash-alt"></i>' +
                    '</button>' +
                    '</div>' +
                    '<script id="script' + x_image + '">' +
                    '$(document).ready(function() {' +
                    '$(".btn-delete-img-bank' + x_image + '").hide();' +
                    '$("#inputBank' + x_image + '").change(function() {' +
                    'imagePreviewBank(this, ' + x_image + ');' +
                    '});' +
                    '$(".btn-delete-img-bank' + x_image + '").on("click", function() {' +
                    '$("#inputBank' + x_image + '").val(null);' +
                    '$("#preview_bank' + x_image + '").empty();' +
                    '$(".btn-delete-img-bank' + x_image + '").hide();' +
                    '});' +
                    '})'); //add input box


                $('#inputCount').val(index);
            }
        });

        $(wrapper_image).on("click", ".remove_field2", function(e) { //user click on remove text
            e.preventDefault();
            // $('#script' + $(this).data("value") + '').remove();
            $(this).parent('div').parent('div').remove();
            index--;
        })

        <?php
        if (sizeof($kerja_sama) != 0) :
            $file_before = FCPATH . './uploads/images/kerja_sama/' . $kerja_sama[0]['nama_file'];
            if ($kerja_sama[0]['nama_file'] == '') : ?>
                $('.btn-delete-img-bank1').hide();
            <?php elseif (file_exists($file_before)) : ?>
                $('.btn-delete-img-bank1').show();
            <?php else : ?>
                $('.btn-delete-img-bank1').hide();
            <?php endif; ?>

        <?php else : ?>
            $('.btn-delete-img-bank1').hide();
        <?php endif; ?>


    });

    function imagePreviewBank(fileInput, val) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function(event) {
                $("#preview_bank" + val + "").html('<img src="' + event.target.result + '" width="150" height="auto"/>');
            };
            fileReader.readAsDataURL(fileInput.files[0]);
            $('.btn-delete-img-bank' + val + '').show();
        }
    }

    $("#inputBank1").change(function() {
        imagePreviewBank(this, 1);
    });

    $(".btn-delete-img-bank1").on('click', function() {
        $("#inputPath1").val(null);
        $("#inputBank1").val(null);
        $("#preview_bank1").empty();
        $('.btn-delete-img-bank1').hide();
    });

    $('.btn-gambar').on('click', function() {
        var form = $('#form_gambar')[0];
        var data_form = new FormData(form);
        $.ajax({
            url: $('#form_gambar').attr('action'),
            method: 'POST',
            enctype: 'multipart/form-data',
            data: data_form,
            dataType: 'json',
            contentType: false,
            processData: false,
            chace: false,
            beforeSend: function() {
                $('.btn-gambar').attr('disabled', 'disabled');
                $('.btn-gambar').html('<i class="fas fa-spinner fa-spin"></i> In Process');
            },
            complete: function() {
                $('.btn-gambar').removeAttr('disabled', 'disabled');
                $('.btn-gambar').html('<i class="fas fa-save"></i> Tambah');
            },
            success: function(data) {

                if (data.status == false) {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').addClass('is-invalid');
                        $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                        if (data.valid[i] == true) {
                            $('[name="' + data.inputerror[i] + '"]').removeClass('is-invalid');
                            $('[name="' + data.inputerror[i] + '"]').addClass('is-valid');
                            $('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                        }
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