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
                        <h3 class="card-title">Form Fasilitas</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url() ?>admins/fasilitas/fasilitas/fasilitas" id="form_fasilitas" method="post" enctype="multipart/form-data">
                            <div class="form-group input_wrap">
                                <div class="mb-3">
                                    <label for="inputSpek1">Fasilitas</label>
                                    <button class="add_field_button btn btn-xs btn-primary"><i class="fas fa-plus"></i></button>
                                </div>

                                <?php if (sizeof($fasilitas) != 0) {
                                    $x = count($fasilitas);
                                } else {
                                    $x = 1;
                                } ?>

                                <?php if (sizeof($fasilitas) != 0) : ?>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3 row">
                                                <div class="col-2">
                                                    <label for="icon_picker">Icon</label>
                                                    <button class="btn btn-secondary" name="icon_picker[]" data-placement="right" data-iconset="fontawesome5" data-icon="<?= $fasilitas[0]['icon'] ?>" role="iconpicker"></button>
                                                </div>
                                                <div class="col-4">
                                                    <label for="inputName"><small><b>(Indonesia)</b></small></label>
                                                    <input type="text" class="form-control <?= form_error('inputHeading_id_pertama') ? 'is-invalid' : '' ?>" name="inputHeading_id[]" id="inputHeading_id_pertama" value="<?= $fasilitas[0]['heading_id'] ?>">
                                                    <div class="invalid-feedback"><?= form_error('inputHeading_id_pertama') ?></div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="inputName" class="text-white">.</label>
                                                    <textarea wrap="off" type="text" class="form-control <?= form_error('inputData_id_pertama') ? 'is-invalid' : '' ?>" name="inputData_id[]" id="inputData_id_pertama" value="<?= $fasilitas[0]['data_id'] ?>" placeholder=""><?= $fasilitas[0]['data_id'] ?></textarea>
                                                    <div class="invalid-feedback"><?= form_error('inputData_id_pertama') ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3 row">
                                                <div class="col-1">

                                                </div>
                                                <div class="col-4">
                                                    <label for="inputName"><small><b>(Inggris)</b></small></label>
                                                    <input type="text" class="form-control <?= form_error('inputHeading_en_pertama') ? 'is-invalid' : '' ?>" name="inputHeading_en[]" id="inputHeading_en_pertama" value="<?= $fasilitas[0]['heading_en'] ?>">
                                                    <div class="invalid-feedback"><?= form_error('inputHeading_en_pertama') ?></div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="inputName" class="text-white">.</label>
                                                    <textarea wrap="off" type="text" class="form-control  <?= form_error('inputData_en_pertama') ? 'is-invalid' : '' ?>" name="inputData_en[]" id="inputData_en_pertama" value="<?= $fasilitas[0]['data_en'] ?>" placeholder=""><?= $fasilitas[0]['data_en'] ?></textarea>
                                                    <div class="invalid-feedback"><?= form_error('inputData_en_pertama') ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php for ($i = 1; $i < count($fasilitas); $i++) : ?>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3 row">
                                                    <div class="col-2">
                                                        <label for="icon_picker">Icon</label>
                                                        <button class="btn btn-secondary" name="icon_picker[]" data-placement="right" data-iconset="fontawesome5" data-icon="<?= $fasilitas[$i]['icon'] ?>" role="iconpicker"></button>
                                                    </div>
                                                    <div class="col-4">
                                                        <label for="inputName"><small><b>(Indonesia)</b></small></label>
                                                        <input type="text" class="form-control" name="inputHeading_id[]" id="inputHeading_id" value="<?= $fasilitas[$i]['heading_id'] ?>">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="inputName" class="text-white">.</label>
                                                        <textarea wrap="off" type="text" class="form-control" name="inputData_id[]" id="inputData_id" value="<?= $fasilitas[$i]['data_id'] ?>" placeholder=""><?= $fasilitas[$i]['data_id'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="mb-3 row">
                                                    <div class="col-1">

                                                    </div>
                                                    <div class="col-4">
                                                        <label for="inputName"><small><b>(Inggris)</b></small></label>
                                                        <input type="text" class="form-control" name="inputHeading_en[]" id="inputHeading_en" value="<?= $fasilitas[$i]['heading_en'] ?>">
                                                    </div>
                                                    <div class="col-6">
                                                        <label for="inputName" class="text-white">.</label>
                                                        <textarea wrap="off" type="text" class="form-control" name="inputData_en[]" id="inputData_en" value="<?= $fasilitas[$i]['data_en'] ?>" placeholder=""><?= $fasilitas[$i]['data_en'] ?></textarea>
                                                    </div>
                                                    <div class="col-1">
                                                        <label for="inputName" class="text-white">.</label>
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
                                                <div class="col-2">
                                                    <label for="icon_picker">Icon</label>
                                                    <button class="btn btn-secondary" name="icon_picker[]" data-placement="right" data-iconset="fontawesome5" data-icon="fas fa-hand-pointer" role="iconpicker"></button>
                                                </div>
                                                <div class="col-4">
                                                    <label for="inputName"><small><b>(Indonesia)</b></small></label>
                                                    <input type="text" class="form-control <?= form_error('inputHeading_id_pertama') ? 'is-invalid' : '' ?>" name="inputHeading_id[]" id="inputHeading_id_pertama" value="">
                                                    <div class="invalid-feedback"><?= form_error('inputHeading_id_pertama') ?></div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="inputName" class="text-white">.</label>
                                                    <textarea wrap="off" type="text" class="form-control <?= form_error('inputData_id_pertama') ? 'is-invalid' : '' ?>" name="inputData_id[]" id="inputData_id_pertama" value="<?= set_value('inputData_id') ?>" placeholder=""></textarea>
                                                    <div class="invalid-feedback"><?= form_error('inputData_id_pertama') ?></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-3 row">
                                                <div class="col-1">

                                                </div>
                                                <div class="col-4">
                                                    <label for="inputName"><small><b>(Inggris)</b></small></label>
                                                    <input type="text" class="form-control <?= form_error('inputHeading_en_pertama') ? 'is-invalid' : '' ?>" name="inputHeading_en[]" id="inputHeading_en_pertama" value="">
                                                    <div class="invalid-feedback"><?= form_error('inputHeading_en_pertama') ?></div>
                                                </div>
                                                <div class="col-6">
                                                    <label for="inputName" class="text-white">.</label>
                                                    <textarea wrap="off" type="text" class="form-control <?= form_error('inputData_en_pertama') ? 'is-invalid' : '' ?>" name="inputData_en[]" id="inputData_en_pertama" value="<?= set_value('inputData_en') ?>" placeholder=""></textarea>
                                                    <div class="invalid-feedback"><?= form_error('inputData_en_pertama') ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-primary btn-fasilitas"><i class="fas fa-save"></i> Simpan</button>
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
                $(wrapper).append('<div class="row">' +
                    '<div class="col-6">' +
                    '<div class="mb-3 row">' +
                    '<div class="col-2">' +
                    '<label for="icon_picker">Icon</label>' +
                    '<button class="btn btn-secondary" name="icon_picker[]" id="icon_picker' + x + '" data-placement="right" data-iconset="fontawesome5" data-icon="fas fa-hand-pointer" role="iconpicker"></button>' +
                    '</div>' +
                    '<div class="col-4">' +
                    '<label for="inputName"><small><b>(Indonesia)</b></small></label>' +
                    '<input type="text" class="form-control" name="inputHeading_id[]" id="inputHeading_id" value="">' +
                    '</div>' +
                    '<div class="col-6">' +
                    '<label for="inputName" class="text-white">.</label>' +
                    '<textarea wrap="off" type="text" class="form-control" name="inputData_id[]" id="inputData_id" value="" placeholder=""></textarea>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-6">' +
                    '<div class="mb-3 row">' +
                    '<div class="col-1">' +

                    '</div>' +
                    '<div class="col-4">' +
                    '<label for="inputName"><small><b>(Inggris)</b></small></label>' +
                    '<input type="text" class="form-control" name="inputHeading_en[]" id="inputHeading_en" value="">' +
                    '</div>' +
                    '<div class="col-6">' +
                    '<label for="inputName" class="text-white">.</label>' +
                    '<textarea wrap="off" type="text" class="form-control" name="inputData_en[]" id="inputData_en" value="" placeholder=""></textarea>' +
                    '</div>' +
                    '<div class="col-1">' +
                    '<label for="inputName" class="text-white">.</label>' +
                    '<button class="btn btn-sm btn-outline-danger remove_field" type="button">' +
                    '<i class="fas fa-trash-alt"></i>' +
                    '</button>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</div>'); //add input box

                $("#icon_picker" + x + "").iconpicker();
            }
        });

        $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
            e.preventDefault();
            $(this).parent('div').parent('div').parent('div').parent('div').remove();
            x--;
        })
    });


    $('.btn-fasilitas').on('click', function() {
        var form = $('#form_fasilitas')[0];
        var data_form = new FormData(form);
        $.ajax({
            url: $('#form_fasilitas').attr('action'),
            method: 'POST',
            enctype: 'multipart/form-data',
            data: data_form,
            dataType: 'json',
            contentType: false,
            processData: false,
            chace: false,
            beforeSend: function() {
                $('.btn-fasilitas').attr('disabled', 'disabled');
                $('.btn-fasilitas').html('<i class="fas fa-spinner fa-spin"></i> In Process');
            },
            complete: function() {
                $('.btn-fasilitas').removeAttr('disabled', 'disabled');
                $('.btn-fasilitas').html('<i class="fas fa-save"></i> Tambah');
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