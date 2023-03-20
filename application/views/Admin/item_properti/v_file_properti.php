<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <h1><?= $title2 ?></h1>
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>admins/admins">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>admins/item_properti"><?= $title ?></a></li>
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
                        <h3 class="card-title">Form File Properti</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url() ?>admins/item_properti/file/file" id="form_file" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group input_wrap_file">
                                        <label for="inputTambahan1">File </label>
                                        <button class="add_field_button_file btn btn-xs btn-primary"><i class="fas fa-plus"></i></button>
                                        <div class="form-group div_name">
                                            <label for="inputName">Name</label>
                                            <input type="text" class="form-control <?= form_error('inputName') ? 'is-invalid' : '' ?>" name="inputName" id="inputName">
                                        </div>
                                        <div hidden class="form-group">
                                            <label for="inputCount">Count</label>
                                            <input type="text" class="form-control <?= form_error('inputCount') ? 'is-invalid' : '' ?>" value="0" name="inputCount" id="inputCount">
                                        </div>
                                        <?php if (sizeof($file) != 0) {
                                            $label_id = $file[0]['label_id'];
                                            $label_en = $file[0]['label_en'];
                                            $nama_file = $file[0]['nama_file'];
                                            $x_file = count($file);
                                        } else {
                                            $label_id = "";
                                            $label_en = "";
                                            $nama_file = "";
                                            $x_file = 1;
                                        } ?>

                                        <?php if (sizeof($file) != 0) : ?>
                                            <div class="mb-5 row" style="background-color: #F8F9F9;">
                                                <input hidden type="text" class="form-control" name="inputPath[]" id="inputPath1" value="<?= $file[0]['nama_file'] ?>" placeholder="">
                                                <input hidden type="text" class="form-control" name="inputIdFile[]" id="inputIdFile1" value="<?= $file[0]['id'] ?>" placeholder="">
                                                <div class="col-11">
                                                    <input type="file" accept=".txt, .pdf, .doc, .docx" class="form-control" name="inputFile[]" id="inputFile1" multiple="multiple">
                                                    <div style="text-align: center;" class="pt-3">
                                                        <div id="preview1">
                                                            <p><?= $file[0]['nama_file'] ?></p>
                                                        </div>
                                                        <button type="button" class="btn text-danger btn-delete-file1"><i class="fas fa-times-circle"></i></button>
                                                    </div>
                                                    <div class="">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <input type="text" class="form-control" name="inputLabel[]" id="inputLabel1" value="<?= $file[0]['label_id'] ?>" placeholder="Masukan Caption bahasa indonesia">
                                                            </div>
                                                            <div class="col-6">
                                                                <input type="text" class="form-control" name="inputLabel2[]" id="inputLabel21" value="<?= $file[0]['label_en'] ?>" placeholder="Masukan Caption bahasa inggris">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php for ($i = 1; $i < count($file); $i++) :
                                                $index = $i + 1 ?>
                                                <div class="mb-5 row" style="background-color: #F8F9F9;">
                                                    <input hidden type="text" class="form-control" name="inputPath[]" id="inputPath<?= $index ?>" value="<?= $file[$i]['nama_file'] ?>" placeholder="">
                                                    <input hidden type="text" class="form-control" name="inputIFile[]" id="inputIdFile<?= $index ?>" value="<?= $file[$i]['id'] ?>" placeholder="">
                                                    <div class="col-11">
                                                        <input type="file" accept=".txt, .pdf, .doc, .docx" class="form-control" name="inputFile[]" id="inputFile<?= $index ?>" multiple="multiple">
                                                        <div style="text-align: center;" class="pt-3">
                                                            <div id="preview<?= $index ?>"><?= $file[$i]['nama_file'] ?></div>
                                                            <button type="button" class="btn text-danger btn-delete-file<?= $index ?>"><i class="fas fa-times-circle"></i></button>
                                                        </div>
                                                        <div class="">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <input type="text" class="form-control" name="inputLabel[]" id="inputLabel<?= $index ?>" value="<?= $file[$i]['label_id'] ?>" placeholder="Masukan Caption bahasa indonesia">
                                                                </div>
                                                                <div class="col-6">
                                                                    <input type="text" class="form-control" name="inputLabel2[]" id="inputLabel2<?= $index ?>" value="<?= $file[$i]['label_en'] ?>" placeholder="Masukan Caption bahasa inggris">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-1">
                                                        <button class="btn btn-xs btn-outline-danger remove_field2" data-value="<?= $index ?>" type="button">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </div>
                                                    <script id="script<?= $index ?>">
                                                        $(document).ready(function() {
                                                            $("#inputLabel<?= $index ?>").show();
                                                            $("#inputLabel2<?= $index ?>").show();
                                                            $(".btn-delete-file<?= $index ?>").show();
                                                            $("#inputFile<?= $index ?>").change(function() {
                                                                var file = $('#inputFile1')[0].files[0].name;
                                                                $("#preview<?= $index ?>").html('<p>' + file + '</p>');
                                                                $("#inputLabel<?= $index ?>").show();
                                                                $("#inputLabel2<?= $index ?>").show();
                                                                $(".btn-delete-file<?= $index ?>").show();
                                                            });
                                                            $(".btn-delete-file<?= $index ?>").on("click", function() {
                                                                $("#inputPath<?= $index ?>").val(null);
                                                                $("#inputFile<?= $index ?>").val(null);
                                                                $("#preview<?= $index ?>").empty();
                                                                $(".btn-delete-file<?= $index ?>").hide();
                                                                $("#inputLabel<?= $index ?>").hide();
                                                                $("#inputLabel2<?= $index ?>").hide();
                                                            });
                                                        });
                                                    </script>
                                                </div>
                                            <?php endfor; ?>
                                        <?php else : ?>
                                            <div class="mb-5 row" style="background-color: #F8F9F9;">
                                                <div class="col-11">
                                                    <input type="file" accept=".txt, .pdf, .doc, .docx" class="form-control" name="inputFile[]" id="inputFile1" multiple="multiple">
                                                    <div style="text-align: center;" class="pt-3">
                                                        <div id="preview1"></div>
                                                        <button type="button" class="btn text-danger btn-delete-file1"><i class="fas fa-times-circle"></i></button>
                                                    </div>
                                                    <div class="">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <input type="text" class="form-control" name="inputLabel[]" id="inputLabel1" value="" placeholder="Masukan Caption bahasa indonesia">
                                                            </div>
                                                            <div class="col-6">
                                                                <input type="text" class="form-control" name="inputLabel2[]" id="inputLabel21" value="" placeholder="Masukan Caption bahasa inggris">
                                                            </div>
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
                        <a href="<?= base_url() ?>admins/item_properti" class="btn btn-light" style="border: 1px solid #000;"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                        <button type="button" class="btn btn-primary btn-file"><i class="fas fa-save"></i> Simpan</button>
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


        $('.div_name').hide();
        $('#inputName').val('<?= $this->uri->segment(4) ?>');

        var max_fields_file = 10; //maximum input boxes allowed
        var wrapper_file = $(".input_wrap_file"); //Fields wrapper
        var add_button_file = $(".add_field_button_file"); //Add button ID

        var x_file = $('#inputCount').val() + <?= $x_file ?>;
        var index = $('#inputCount').val() + <?= $x_file ?>;
        //initlal text box count
        $(add_button_file).click(function(e) { //on add input button click
            e.preventDefault();
            if (index < max_fields_file) { //max input box allowed
                x_file++; //text box increment
                index++;
                $(wrapper_file).append('<div class="mb-5 row" style="background-color: #F8F9F9;">' +
                    '<div class="col-11">' +
                    '<input type="file" accept=".txt, .pdf, .doc, .docx" class="form-control" name="inputFile[]" id="inputFile' + x_file + '" multiple="multiple">' +
                    '<div style="text-align: center;" class="pt-3">' +
                    '<div id="preview' + x_file + '"></div>' +
                    '<button type="button" class="btn text-danger btn-delete-file' + x_file + '"><i class="fas fa-times-circle"></i></button>' +
                    '</div>' +
                    '<div class="">' +
                    '<div class="row">' +
                    '<div class="col-6">' +
                    '<input type="text" class="form-control" name="inputLabel[]" id="inputLabel' + x_file + '" value="" placeholder="Masukan Caption bahasa indonesia">' +
                    '</div>' +
                    '<div class="col-6">' +
                    '<input type="text" class="form-control" name="inputLabel2[]" id="inputLabel2' + x_file + '" value="" placeholder="Masukan Caption bahasa inggris">' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-1">' +
                    '<button class="btn btn-xs btn-outline-danger remove_field2" data-value="' + x_file + '" type="button">' +
                    '<i class="fas fa-trash-alt"></i>' +
                    '</button>' +
                    '</div>' +
                    '<script id="script' + x_file + '">' +
                    '$(document).ready(function() {' +
                    '$(".btn-delete-file' + x_file + '").hide();' +
                    '$("#inputLabel' + x_file + '").hide();' +
                    '$("#inputLabel2' + x_file + '").hide();' +
                    '$("#inputFile' + x_file + '").change(function() {' +
                    'var file = $("#inputFile' + x_file + '")[0].files[0].name;' +
                    '$("#preview' + x_file + '").html("<p>" + file + "</p>");' +
                    '$(".btn-delete-file' + x_file + '").show();' +
                    '$("#inputLabel' + x_file + '").show();' +
                    '$("#inputLabel2' + x_file + '").show();' +
                    '});' +
                    '$(".btn-delete-file' + x_file + '").on("click", function() {' +
                    '$("#inputFile' + x_file + '").val(null);' +
                    '$("#preview' + x_file + '").empty();' +
                    '$(".btn-delete-file' + x_file + '").hide();' +
                    '$("#inputLabel' + x_file + '").hide();' +
                    '$("#inputLabel2' + x_file + '").hide();' +
                    '});' +
                    '})'); //add input box


                $('#inputCount').val(index);
            }
        });

        $(wrapper_file).on("click", ".remove_field2", function(e) { //user click on remove text
            e.preventDefault();
            // $('#script' + $(this).data("value") + '').remove();
            $(this).parent('div').parent('div').remove();
            index--;
        })

        <?php
        if (sizeof($file) != 0) :
            $file_before = FCPATH . './uploads/file/properti/' . $file[0]['nama_file'];
            if ($file[0]['nama_file'] == '') : ?>
                $('.btn-delete-file1').hide();
                $("input[name='inputLabel[]']").hide();
                $("input[name='inputLabel2[]']").hide();
            <?php elseif (file_exists($file_before)) : ?>
                $('.btn-delete-file1').show();
                $("input[name='inputLabel[]']").show();
                $("input[name='inputLabel2[]']").show();
            <?php else : ?>
                $('.btn-delete-file1').hide();
                $("input[name='inputLabel[]']").hide();
                $("input[name='inputLabel2[]']").hide();
            <?php endif; ?>
        <?php else : ?>
            $('.btn-delete-file1').hide();
            $("input[name='inputLabel[]']").hide();
            $("input[name='inputLabel2[]']").hide();
        <?php endif; ?>


    });

    $("#inputFile1").change(function() {
        var file = $('#inputFile1')[0].files[0].name;
        $("#preview" + 1 + "").html('<p>' + file + '</p>');
        $('.btn-delete-file1').show();
        $('#inputLabel1').show();
        $('#inputLabel21').show();
    });
    $(".btn-delete-file1").on('click', function() {
        $("#inputPath1").val(null);
        $("#inputFile1").val(null);
        $("#preview1").empty();
        $('.btn-delete-file1').hide();
        $('#inputLabel1').hide();
        $('#inputLabel21').hide();
    });

    $('.btn-file').on('click', function() {
        var form = $('#form_file')[0];
        var data_form = new FormData(form);
        $.ajax({
            url: $('#form_file').attr('action'),
            method: 'POST',
            enctype: 'multipart/form-data',
            data: data_form,
            dataType: 'json',
            contentType: false,
            processData: false,
            chace: false,
            beforeSend: function() {
                $('.btn-file').attr('disabled', 'disabled');
                $('.btn-file').html('<i class="fas fa-spinner fa-spin"></i> In Process');
            },
            complete: function() {
                $('.btn-file').removeAttr('disabled', 'disabled');
                $('.btn-file').html('<i class="fas fa-save"></i> Tambah');
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