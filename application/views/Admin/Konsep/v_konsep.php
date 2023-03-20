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
                        <h3 class="card-title">Form Konsep</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?= base_url() ?>admins/konsep/konsep/konsep" id="form_konsep" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <?php if ($konsep > 0) : ?>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input hidden type="text" class="form-control" name="inputPath" id="inputPath" value="<?= $konsep['nama_file'] ?>" placeholder="">
                                            <input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="image_konsep" id="image_konsep">
                                            <div style="text-align: center;" class="pt-3">
                                                <?php if ($konsep['nama_file'] != "") : ?>
                                                    <div id="preview"><img src="<?= base_url() ?>uploads/images/konsep/<?= $konsep['nama_file'] ?>" width="300" height="auto" /></div>
                                                <?php else : ?>
                                                    <div id="preview"></div>
                                                <?php endif; ?>
                                                <button type="button" class="btn text-danger btn-delete-img"><i class="fas fa-times-circle"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi Konsep <small><b>(Indonesia)</b></small></label>
                                            <textarea id="summernote_konsep" name="inputDesc">
                                            <?= $konsep['desc_id'] ?>
                                    </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi Konsep <small><b>(Inggris)</b></small></label>
                                            <textarea id="summernote_konsep2" name="inputDesc2">
                                            <?= $konsep['desc_en'] ?>
                                    </textarea>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input type="file" accept=".jpg, .jpeg, .png, .gif" class="form-control" name="image_konsep" id="image_konsep">
                                            <div style="text-align: center;" class="pt-3">
                                                <div id="preview"></div>
                                                <button type="button" class="btn text-danger btn-delete-img"><i class="fas fa-times-circle"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi Konsep <small><b>(Indonesia)</b></small></label>
                                            <textarea id="summernote_konsep" name="inputDesc">

                                    </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi Konsep <small><b>(Inggris)</b></small></label>
                                            <textarea id="summernote_konsep2" name="inputDesc2">

                                    </textarea>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-right">
                        <button type="button" class="btn btn-primary btn-konsep"><i class="fas fa-save"></i> Simpan</button>
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
        if ($konsep > 0) :
            if ($konsep['nama_file'] != '') :
                $file_before = FCPATH . './uploads/images/konsep/' . $konsep['nama_file'];
                if (file_exists($file_before)) : ?>
                    $('.btn-delete-img').show();
                <?php else : ?>
                    $('.btn-delete-img').hide();
                <?php endif; ?>
            <?php else : ?>
                $('.btn-delete-img').hide();
            <?php endif; ?>
        <?php else : ?>
            $('.btn-delete-img').hide();
        <?php endif; ?>
        $('#summernote_konsep').summernote({
            // height: "150px",
            styleWithSpan: false,
            callbacks: {
                onImageUpload: function(image) {
                    uploadImage(image[0]);
                },
                onMediaDelete: function(target) {
                    deleteImage(target[0].src);
                }
            }
        });
        $('#summernote_konsep2').summernote({
            // height: "150px",
            styleWithSpan: false,
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

    $('.btn-konsep').on('click', function() {
        var form = $('#form_konsep')[0];
        var data_form = new FormData(form);
        $.ajax({
            url: $('#form_konsep').attr('action'),
            method: 'POST',
            enctype: 'multipart/form-data',
            data: data_form,
            dataType: 'json',
            contentType: false,
            processData: false,
            chace: false,
            beforeSend: function() {
                $('.btn-konsep').attr('disabled', 'disabled');
                $('.btn-konsep').html('<i class="fas fa-spinner fa-spin"></i> In Process');
            },
            complete: function() {
                $('.btn-konsep').removeAttr('disabled', 'disabled');
                $('.btn-konsep').html('<i class="fas fa-save"></i> Tambah');
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

    function uploadImage(image) {
        var data = new FormData();
        data.append("image", image);
        $.ajax({
            url: "<?php echo base_url('admins/konsep/konsep/tambah_gambar') ?>",
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "POST",
            success: function(url) {
                $('#summernote_konsep').summernote("insertImage", url);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function deleteImage(src) {
        $.ajax({
            data: {
                src: src
            },
            type: "POST",
            url: "<?php echo base_url('admins/konsep/konsep/hapus_gambar') ?>",
            cache: false,
            success: function(response) {
                console.log(response);
            }
        });
    }

    function uploadImage2(image) {
        var data = new FormData();
        data.append("image", image);
        $.ajax({
            url: "<?php echo base_url('admins/konsep/konsep/tambah_gambar_en') ?>",
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "POST",
            success: function(url) {
                // console.log(data);
                $('#summernote_konsep2').summernote("insertImage", url);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function deleteImage2(src) {
        $.ajax({
            data: {
                src: src
            },
            type: "POST",
            url: "<?php echo base_url('admins/konsep/konsep/hapus_gambar_en') ?>",
            cache: false,
            success: function(response) {
                console.log(response);
            }
        });
    }

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
    $("#image_konsep").change(function() {
        imagePreview(this);
    });
    $(".btn-delete-img").on('click', function() {
        $("#image_konsep").val(null);
        $("#inputPath").val(null);
        $("#preview").empty();
        $('.btn-delete-img').hide();
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