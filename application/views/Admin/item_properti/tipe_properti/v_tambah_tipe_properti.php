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
                        <h3 class="card-title">Form Tambah Tipe Properti</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url() ?>admins/item_properti/tipe_properti/tambah/tambah" id="form_tipe_properti" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-8">
                                    <div hidden class="form-group">
                                        <label for="inputKluster">Kluster</label>
                                        <input type="text" class="form-control <?= form_error('inputKluster') ? 'is-invalid' : '' ?>" name="inputKluster" id="inputKluster" value="<?= $this->uri->segment(4) ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName">Nama Tipe <small><b>(Indonesia)</b></small></label>
                                        <input type="text" class="form-control <?= form_error('inputName') ? 'is-invalid' : '' ?>" name="inputName" id="inputName" value="<?= set_value('inputName') ?>" placeholder="Masukan nama tipe dalam bahasa indonesia">
                                        <div class="invalid-feedback"><?= form_error('inputName') ?></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName2">Nama Tipe <small><b>(Inggris)</b></small></label>
                                        <input type="text" class="form-control <?= form_error('inputName2') ? 'is-invalid' : '' ?>" name="inputName2" id="inputName2" value="<?= set_value('inputName2') ?>" placeholder="Masukan nama tipe dalam bahasa inggris">
                                        <div class="invalid-feedback"><?= form_error('inputName2') ?></div>
                                    </div>

                                    <div class="form-group">
                                        <label>Deskripsi Tipe <small><b>(Indonesia)</b></small></label>
                                        <textarea id="summernote_tipe" name="inputDesc">

                                    </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi Tipe <small><b>(Inggris)</b></small></label>
                                        <textarea id="summernote_tipe2" name="inputDesc2">

                                    </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Denah</label>
                                        <input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="denah" id="denah">
                                        <div style="text-align: center;" class="pt-3">
                                            <div id="preview"></div>
                                            <button type="button" class="btn text-danger btn-delete-img"><i class="fas fa-times-circle"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-right">
                        <a href="<?= base_url() ?>admins/item_properti" class="btn btn-light" style="border: 1px solid #000;"><i class="fas fa-arrow-circle-left"></i> Kembali</a>
                        <button type="button" class="btn btn-primary btn-tambah-tipe-properti"><i class="fas fa-save"></i> Simpan</button>
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


        var max_fields = 20; //maximum input boxes allowed
        var wrapper = $(".input_wrap"); //Fields wrapper
        var add_button = $(".add_field_button"); //Add button ID

        var x = 12; //initlal text box count
        $(add_button).click(function(e) { //on add input button click
            e.preventDefault();
            if (x < max_fields) { //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div class="mb-3 row">' +
                    '<div class="col-3">' +
                    '<input type="text" class="form-control" name="inputSpek[]" id="inputSpek" value="<?= set_value('inputSpek') ?>">' +
                    '</div>' +
                    '<div class="col-8">' +
                    '<textarea type="text" class="form-control" name="inputSpek2[]" id="inputSpek2" value="<?= set_value('inputSpek2') ?>" placeholder=""></textarea>' +
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

        var max_fields2 = 10; //maximum input boxes allowed
        var wrapper2 = $(".input_wrap2"); //Fields wrapper
        var add_button2 = $(".add_field_button2"); //Add button ID

        var x2 = 4; //initlal text box count
        $(add_button2).click(function(e) { //on add input button click
            e.preventDefault();
            if (x2 < max_fields2) { //max input box allowed
                x2++; //text box increment
                $(wrapper2).append('<div class="mb-3 row">' +
                    '<div class="col-7">' +
                    '<input type="text" class="form-control" name="inputTambahan1[]" id="inputTambahan1" value="<?= set_value('inputTambahan1') ?>">' +
                    '</div>' +
                    '<div class="col-4">' +
                    '<input type="number" class="form-control" name="inputTambahan2[]" id="inputTambahan2" value="">' +
                    '</div>' +
                    '<div class="col-1 text-right">' +
                    '<button class="btn btn-xs btn-outline-danger remove_field" type="button">' +
                    '<i class="fas fa-trash-alt"></i>' +
                    '</button>' +
                    '</div>' +
                    '</div>'); //add input box
            }
        });

        $(wrapper2).on("click", ".remove_field2", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').parent('div').remove();
            x2--;
        })


        var max_fields_image = 10; //maximum input boxes allowed
        var wrapper_image = $(".input_wrap_image"); //Fields wrapper
        var add_button_image = $(".add_field_button_image"); //Add button ID

        var x_image = 1; //initlal text box count
        $(add_button_image).click(function(e) { //on add input button click
            e.preventDefault();
            if (x_image < max_fields_image) { //max input box allowed
                x_image++; //text box increment
                $(wrapper_image).append('<div class="mb-5 row">' +
                    '<div class="col-11">' +
                    '<input type="file" accept=".jpg, .jpeg, .png, .gif"  class="form-control" name="inputGaleri[]" id="inputGaleri' + x_image + '">' +
                    '<div style="text-align: center;" class="pt-3">' +
                    '<div id="preview' + x_image + '"></div>' +
                    '<button type="button" class="btn text-danger btn-delete-img' + x_image + '"><i class="fas fa-times-circle"></i></button>' +
                    '</div>' +
                    '<div class="">' +
                    '<input type="text" class="form-control" name="inputLabel[]" id="inputLabel' + x_image + '" value="" placeholder="Masukan Caption">' +
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
                    '$("#inputLabel' + x_image + '").hide();' +
                    '$("#inputGaleri' + x_image + '").change(function() {' +
                    'imagePreview2(this, ' + x_image + ');' +
                    '$("#inputLabel' + x_image + '").show();' +
                    '});' +
                    '$(".btn-delete-img' + x_image + '").on("click", function() {' +
                    '$("#inputGaleri' + x_image + '").val(null);' +
                    '$("#preview' + x_image + '").empty();' +
                    '$(".btn-delete-img' + x_image + '").hide();' +
                    '$("#inputLabel' + x_image + '").hide();' +
                    '});' +
                    '})'); //add input box
            }
        });

        $(wrapper_image).on("click", ".remove_field2", function(e) { //user click on remove text
            e.preventDefault();
            $('#script' + $(this).data("value") + '').remove();
            $(this).parent('div').parent('div').remove();
            x_image--;
        })

        $('.btn-delete-img').hide();
        $('.btn-delete-img1').hide();
        $("input[name='inputLabel[]']").hide();
        $('#summernote_tipe').summernote({
            // height: "150px",
            styleWithSpan: false,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                // ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ol', 'ul', 'paragraph']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                },
                onMediaDelete: function(target) {
                    deleteImage(target[0].src);
                }
            }
        });
        $('#summernote_tipe2').summernote({
            // height: "150px",
            styleWithSpan: false,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['fontname', ['fontname']],
                // ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ol', 'ul', 'paragraph']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ],
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage2(image[0]);
                },
                onMediaDelete: function(target) {
                    deleteImage2(target[0].src);
                }
            }
        });
    });

    function imagePreview2(fileInput, val) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function(event) {
                $("#preview" + val + "").html('<img src="' + event.target.result + '" width="150" height="auto"/>');
            };
            fileReader.readAsDataURL(fileInput.files[0]);
            $('.btn-delete-img' + val + '').show();
        }
    }
    $("#inputGaleri1").change(function() {
        imagePreview2(this, 1);
        $('#inputLabel1').show();
    });
    $(".btn-delete-img1").on('click', function() {
        $("#inputGaleri1").val(null);
        $("#preview1").empty();
        $('.btn-delete-img1').hide();
        $('#inputLabel1').hide();
    });

    function imagePreview(fileInput) {
        if (fileInput.files && fileInput.files[0]) {
            var fileReader = new FileReader();
            fileReader.onload = function(event) {
                $('#preview').html('<img src="' + event.target.result + '" width="300" height="auto"/>');
            };
            fileReader.readAsDataURL(fileInput.files[0]);
            $('.btn-delete-img').show();
        }
    }
    $("#denah").change(function() {
        imagePreview(this);
    });
    $(".btn-delete-img").on('click', function() {
        $("#denah").val(null);
        $("#preview").empty();
        $('.btn-delete-img').hide();
    });


    $('.btn-tambah-tipe-properti').on('click', function() {
        var form = $('#form_tipe_properti')[0];
        var data_form = new FormData(form);
        $.ajax({
            url: $('#form_tipe_properti').attr('action'),
            method: 'POST',
            enctype: 'multipart/form-data',
            data: data_form,
            dataType: 'json',
            contentType: false,
            processData: false,
            chace: false,
            beforeSend: function() {
                $('.btn-tambah-tipe-properti').attr('disabled', 'disabled');
                $('.btn-tambah-tipe-properti').html('<i class="fas fa-spinner fa-spin"></i> In Process');
            },
            complete: function() {
                $('.btn-tambah-tipe-properti').removeAttr('disabled', 'disabled');
                $('.btn-tambah-tipe-properti').html('<i class="fas fa-save"></i> Tambah');
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