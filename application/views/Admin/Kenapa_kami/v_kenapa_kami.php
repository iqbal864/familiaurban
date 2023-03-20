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
                        <h3 class="card-title">Form Kenapa Kami</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url() ?>admins/kenapa_kami/kenapa_kami/kenapa_kami" id="form_kenapa_kami" method="post" enctype="multipart/form-data">
                            <?php
                            if (sizeof($kenapa_kami)) {
                                $x = count($kenapa_kami);
                            } else {
                                $x = 1;
                            }
                            ?>
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group input_wrap">
                                        <label for="inputSpek1">Data List</label>
                                        <button class="add_field_button btn btn-xs btn-primary"><i class="fas fa-plus"></i></button>
                                        <div class="row mb-3">
                                            <div class="col-11">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label for="inputSpek1"><small><b>(Indonesia)</b></small></label>
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="inputSxpek1"><small><b>(Inggris)</b></small></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (sizeof($kenapa_kami) != 0) : ?>
                                            <div class="row mb-3">
                                                <div class="col-11">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <textarea wrap="off" type="text" class="form-control  <?= form_error('inputData_pertama') ? 'is-invalid' : '' ?>" name="inputData[]" id="inputData_pertama" value="<?= $kenapa_kami[0]['data_list_id'] ?>" placeholder=""><?= $kenapa_kami[0]['data_list_id'] ?></textarea>
                                                            <div class="invalid-feedback"><?= form_error('inputData_pertama') ?></div>
                                                        </div>
                                                        <div class="col-6">
                                                            <textarea wrap="off" type="text" class="form-control <?= form_error('inputData2_pertama') ? 'is-invalid' : '' ?>" name="inputData2[]" id="inputData2_pertama" value="<?= $kenapa_kami[0]['data_list_en'] ?>" placeholder=""><?= $kenapa_kami[0]['data_list_en'] ?></textarea>
                                                            <div class="invalid-feedback"><?= form_error('inputData2_pertama') ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php for ($i = 1; $i < count($kenapa_kami); $i++) : ?>
                                                <div class="row mb-3">
                                                    <div class="col-11">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <textarea wrap="off" type="text" class="form-control" name="inputData[]" id="inputData" value="<?= $kenapa_kami[$i]['data_list_id'] ?>" placeholder=""><?= $kenapa_kami[$i]['data_list_id'] ?></textarea>

                                                            </div>
                                                            <div class="col-6">
                                                                <textarea wrap="off" type="text" class="form-control" name="inputData2[]" id="inputData2" value="<?= $kenapa_kami[$i]['data_list_en'] ?>" placeholder=""><?= $kenapa_kami[$i]['data_list_en'] ?></textarea>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <button class="btn btn-sm btn-outline-danger remove_field" type="button">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            <?php endfor; ?>
                                        <?php else : ?>
                                            <div class="row mb-3">
                                                <div class="col-11">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <textarea wrap="off" type="text" class="form-control <?= form_error('inputData_pertama') ? 'is-invalid' : '' ?>" name="inputData[]" id="inputData_pertama" value="<?= set_value('inputData') ?>" placeholder=""></textarea>
                                                            <div class="invalid-feedback"><?= form_error('inputData_pertama') ?></div>
                                                        </div>
                                                        <div class="col-6">
                                                            <textarea wrap="off" type="text" class="form-control <?= form_error('inputData2_pertama') ? 'is-invalid' : '' ?>" name="inputData2[]" id="inputData2_pertama" value="<?= set_value('inputData2') ?>" placeholder=""></textarea>
                                                            <div class="invalid-feedback"><?= form_error('inputData2_pertama') ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-4" style="background-color: #F8F9F9;">
                                    <div class="form-group input_wrap_image">
                                        <?php if (sizeof($gambar) != 0) {
                                            $nama_file = $gambar[0]['nama_file'];
                                            $id_gambar =  $gambar[0]['id'];
                                            $x_gambar = count($gambar);
                                        } else {
                                            $nama_file = "";
                                            $x_gambar = 1;
                                        } ?>
                                        <label>Gambar</label>
                                        <button class="add_field_button_image btn btn-xs btn-primary"><i class="fas fa-plus"></i></button>
                                        <div hidden class="form-group">
                                            <label for="inputCount">Count</label>
                                            <input type="text" class="form-control <?= form_error('inputCount') ? 'is-invalid' : '' ?>" value="0" name="inputCount" id="inputCount">
                                        </div>
                                        <?php if (sizeof($gambar) != 0) : ?>
                                            <div class="mb-5">
                                                <div class="row">
                                                    <div class="col-11">
                                                        <input hidden type="text" class="form-control" name="inputPath[]" id="inputPath1" value="<?= $nama_file ?>" placeholder="">
                                                        <input hidden type="text" class="form-control" name="inputIdGambar[]" id="inputIdGambar1" value="<?= $id_gambar ?>" placeholder="">
                                                        <input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="image_kenapa_kami[]" id="image_kenapa_kami1">
                                                        <div style="text-align: center;" class="pt-3">
                                                            <?php if ($nama_file != "") : ?>
                                                                <div id="preview1"><img src="<?= base_url() ?>uploads/images/kenapa_kami/<?= $nama_file ?>" width="300" height="auto" /></div>
                                                            <?php else : ?>
                                                                <div id="preview1"></div>
                                                            <?php endif; ?>
                                                            <button type="button" class="btn text-danger btn-delete-img1"><i class="fas fa-times-circle"></i></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php for ($i = 1; $i < count($gambar); $i++) :
                                                $index = $i + 1 ?>
                                                <div class="mb-5">
                                                    <div class="row">
                                                        <div class="col-11">
                                                            <input hidden type="text" class="form-control" name="inputPath[]" id="inputPath<?= $index ?>" value="<?= $gambar[$i]['nama_file'] ?>" placeholder="">
                                                            <input hidden type="text" class="form-control" name="inputIdGambar[]" id="inputIdGambar<?= $index ?>" value="<?= $gambar[$i]['id'] ?>" placeholder="">
                                                            <input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="image_kenapa_kami[]" id="image_kenapa_kami<?= $index ?>">
                                                            <div style="text-align: center;" class="pt-3">
                                                                <?php if ($gambar[$i]['nama_file'] != "") : ?>
                                                                    <div id="preview<?= $index ?>"><img src="<?= base_url() ?>uploads/images/kenapa_kami/<?= $gambar[$i]['nama_file'] ?>" width="300" height="auto" /></div>
                                                                <?php else : ?>
                                                                    <div id="preview<?= $index ?>"></div>
                                                                <?php endif; ?>
                                                                <button type="button" class="btn text-danger btn-delete-img<?= $index ?>"><i class="fas fa-times-circle"></i></button>
                                                            </div>
                                                        </div>
                                                        <div class="col-1">
                                                            <button class="btn btn-xs btn-outline-danger remove_field2" data-value="<?= $index ?>" type="button">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <script id="script<?= $index ?>">
                                                        $(document).ready(function() {
                                                            $(".btn-delete-img<?= $index ?>").show();
                                                            $("#image_kenapa_kami<?= $index ?>").change(function() {
                                                                imagePreview2(this, <?= $index ?>);
                                                            });
                                                            $(".btn-delete-img<?= $index ?>").on("click", function() {
                                                                $("#inputPath<?= $index ?>").val(null);
                                                                $("#image_kenapa_kami<?= $index ?>").val(null);
                                                                $("#preview<?= $index ?>").empty();
                                                                $(".btn-delete-img<?= $index ?>").hide();
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            <?php endfor; ?>
                                        <?php else : ?>
                                            <div class="mb-5">
                                                <div class="row">
                                                    <div class="col-11">
                                                        <input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="image_kenapa_kami[]" id="image_kenapa_kami1">
                                                        <div style="text-align: center;" class="pt-3">
                                                            <div id="preview1"></div>
                                                            <button type="button" class="btn text-danger btn-delete-img1"><i class="fas fa-times-circle"></i></button>
                                                        </div>
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
                        <button type="button" class="btn btn-primary btn-kenapa-kami"><i class="fas fa-save"></i> Simpan</button>
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
        var max_fields = 7; //maximum input boxes allowed
        var wrapper = $(".input_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = <?= $x ?>; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="row mb-3">' +
                    '<div class="col-11">' +
                    '<div class="row">' +
                    '<div class="col-6">' +
                    '<textarea wrap="off" type="text" class="form-control" name="inputData[]" id="inputData" value="" placeholder=""></textarea>' +
                    '</div>' +
                    '<div class="col-6">' +
                    '<textarea wrap="off" type="text" class="form-control" name="inputData2[]" id="inputData2" value="" placeholder=""></textarea>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-1">' +
                    '<button class="btn btn-sm btn-outline-danger remove_field" type="button">' +
                    '<i class="fas fa-trash-alt"></i>' +
                    '</button>' +
                    '</div>' +
                    '</div>'); //add input box
            }
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            x--;
        })

        var max_fields_image = 7; //maximum input boxes allowed
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
                $(wrapper_image).append('<div class="mb-5">' +
                    '<div class="row">' +
                    '<div class="col-11">' +
                    '<input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="image_kenapa_kami[]" id="image_kenapa_kami' + x_image + '">' +
                    '<div style="text-align: center;" class="pt-3">' +
                    '<div id="preview' + x_image + '"></div>' +
                    '<button type="button" class="btn text-danger btn-delete-img' + x_image + '"><i class="fas fa-times-circle"></i></button>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-1">' +
                    '<button class="btn btn-xs btn-outline-danger remove_field2" data-value="' + x_image + '" type="button">' +
                    '<i class="fas fa-trash-alt"></i>' +
                    '</button>' +
                    '</div>' +
                    '</div>' +
                    '<script id="script' + x_image + '">' +
                    '$(document).ready(function() {' +
                    '$(".btn-delete-img' + x_image + '").hide();' +
                    '$("#image_kenapa_kami' + x_image + '").change(function() {' +
                    'imagePreview2(this, ' + x_image + ');' +
                    '});' +
                    '$(".btn-delete-img' + x_image + '").on("click", function() {' +
                    '$("#inputPath' + x_image + '").val(null);' +
                    '$("#image_kenapa_kami' + x_image + '").val(null);' +
                    '$("#preview' + x_image + '").empty();' +
                    '$(".btn-delete-img' + x_image + '").hide();' +
                    '});' +
                    '});'); //add input box


                $('#inputCount').val(index);
            }
        });

        $(wrapper_image).on("click", ".remove_field2", function(e) { //user click on remove text
            e.preventDefault();
            // $('#script' + $(this).data("value") + '').remove();
            $(this).parent('div').parent('div').parent('div').remove();
            index--;
        })

        <?php
        if (sizeof($gambar) != 0) :
            $file_before = FCPATH . './uploads/images/kenapa_kami/' . $gambar[0]['nama_file'];
            if ($gambar[0]['nama_file'] == '') : ?>
                $('.btn-delete-img1').hide();
            <?php elseif (file_exists($file_before)) : ?>
                $('.btn-delete-img1').show();
            <?php else : ?>
                $('.btn-delete-img1').hide();
            <?php endif; ?>
        <?php else : ?>
            $('.btn-delete-img1').hide();
        <?php endif; ?>

    });

    function imagePreview2(fileInput, val) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function(event) {
                $("#preview" + val + "").html('<img src="' + event.target.result + '" width="300" height="auto"/>');
            };
            fileReader.readAsDataURL(fileInput.files[0]);
            $('.btn-delete-img' + val + '').show();
        }
    }
    $("#image_kenapa_kami1").change(function() {
        imagePreview2(this, 1);
    });
    $(".btn-delete-img1").on('click', function() {
        $("#inputPath1").val(null);
        $("#image_kenapa_kami1").val(null);
        $("#preview1").empty();
        $('.btn-delete-img1').hide();
    });

    $('.btn-kenapa-kami').on('click', function() {
        var form = $('#form_kenapa_kami')[0];
        var data_form = new FormData(form);
        $.ajax({
            url: $('#form_kenapa_kami').attr('action'),
            method: 'POST',
            enctype: 'multipart/form-data',
            data: data_form,
            dataType: 'json',
            contentType: false,
            processData: false,
            chace: false,
            beforeSend: function() {
                $('.btn-kenapa-kami').attr('disabled', 'disabled');
                $('.btn-kenapa-kami').html('<i class="fas fa-spinner fa-spin"></i> In Process');
            },
            complete: function() {
                $('.btn-kenapa-kami').removeAttr('disabled', 'disabled');
                $('.btn-kenapa-kami').html('<i class="fas fa-save"></i> Tambah');
            },
            success: function(data) {

                // if (data.gagal) {

                //     window.location.href = "<?= base_url() ?>" + data.gagal;

                // }
                if (data.status == false) {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[id="' + data.inputerror[i] + '"]').addClass('is-invalid');
                        $('[id="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
                        if (data.valid[i] == true) {
                            $('[id="' + data.inputerror[i] + '"]').removeClass('is-invalid');
                            $('[id="' + data.inputerror[i] + '"]').addClass('is-valid');
                            $('[id="' + data.inputerror[i] + '"]').next().text(data.error_string[i]);
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