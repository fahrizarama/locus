<?php $title = "<i class='fa fa-envelope'></i>&nbsp;Surat Masuk"; ?>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
<div class="page-header">
    <h1><?php echo $title; ?></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div style="padding-bottom: 10px;">
            <a href="#tambahsurat" role="button" class="btn btn-primary" data-toggle="modal">Tambah Surat Masuk</a>
        </div>
        <div id="tambahsurat" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="form-horizontal" role="form" action="<?= base_url('C_surat/save_suratm') ?>" method="POST" enctype="multipart/form-data">
                        <input type="reset" class="hidden">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="smaller lighter blue no-margin">Tambah Surat Masuk</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="alert alert-warning text-center">
                                    <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                                    <strong>Peringatan!</strong><br>
                                    Format file surat pdf<br>
                                </div>

                                <div class="col-md-12">
                                    <label>Nomor Surat</label>
                                    <input type="text" class="form-control" name="no_surat" placeholder="Nomor Surat" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Tanggal Surat</label>
                                    <input type="date" class="form-control" name="tanggal_surat" placeholder="Tanggal Surat" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Perihal Surat</label>
                                    <textarea class="form-control" name="perihal_surat" id="input_deskripsi" placeholder="Deskripsi Event"></textarea>
                                </div>

                                <div class="col-md-12">
                                    <label>Tembusan Surat</label>
                                    <input type="text" class="form-control" name="tembusan_surat" placeholder="Tembusan Surat" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Penulis Surat</label>
                                    <input type="text" class="form-control" name="penulis_surat" placeholder="Penulis Surat" required>
                                </div>

                                <div class="col-md-12">
                                    <label>File Surat</label>
                                    <div class="custom-file">
                                        <input type="file" name="file_surat" id="id-input-file-2" class="custom-file-input">
                                        <!-- <label class="custom-file-label">Pilih Gambar...</label> -->
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success btn-sm pull-right" style="margin-right: 5px;"><i class="fa fa-save"> Save</i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover" id="suratm">
            <thead>
                <tr>
                    <th>No</th>
                    <th>No Surat</th>
                    <th>Tanggal Surat</th>
                    <th>Perihal Surat</th>
                    <th>Tembusan Surat</th>
                    <th>Penulis Surat</th>
                    <th>File Surat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($sm as $sm) : ?>
                    <tr>
                        <th><?= $no++ ?></th>
                        <th><?= $sm->no_surat ?></th>
                        <th><?= $sm->tanggal_surat ?></th>
                        <th><?= $sm->perihal_surat ?></th>
                        <th><?= $sm->tembusan_surat ?></th>
                        <th><?= $sm->penulis_surat ?></th>
                        <th><?= $sm->file_surat ?></th>
                        <th>
                            <a href="" data-toggle="modal" data-target="#modalupdate<?= $sm->id_surat_masuk ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                            |
                            <a onclick="return confirm('Apakah kamu yakin akan menghapus data?');" href="<?php echo site_url('C_surat/delete_suratm/' . $sm->id_surat_masuk) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                            |
                            <a href="" class="btn btn-xs btn-success"><i class="fas fa-eye"></i></a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php foreach($esm as $e) : ?>
<div id="modalupdate<?= $e->id_surat_masuk ?>" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" role="form" action="<?= base_url('C_surat/update_suratm') ?>" method="POST" enctype="multipart/form-data">
                <input type="reset" class="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="smaller lighter blue no-margin">Edit Surat</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="alert alert-warning text-center">
                            <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                            <strong>Peringatan!</strong><br>
                            Format file surat pdf<br>
                        </div>

                        <div class="col-md-12">
                            <label>Nomor Surat</label>
                            <input type="hidden" name="id_surat_masuk" value="<?= $e->id_surat_masuk ?>">
                            <input type="text" class="form-control" value="<?= $e->no_surat ?>" name="no_surat" placeholder="Nomor Surat" required>
                        </div>

                        <div class="col-md-12">
                            <label>Tanggal Surat</label>
                            <input type="date" class="form-control" value="<?= $e->tanggal_surat ?>" name="tanggal_surat" placeholder="Tanggal Surat" required>
                        </div>

                        <div class="col-md-12">
                            <label>Perihal Surat</label>
                            <textarea class="form-control" name="perihal_surat" id="input_deskripsi" placeholder="Deskripsi Event"><?= $e->perihal_surat ?></textarea>
                        </div>

                        <div class="col-md-12">
                            <label>Tembusan Surat</label>
                            <input type="text" class="form-control" name="tembusan_surat" value="<?= $e->tembusan_surat ?>" placeholder="Tembusan Surat" required>
                        </div>

                        <div class="col-md-12">
                            <label>Penulis Surat</label>
                            <input type="text" class="form-control" name="penulis_surat" value="<?= $e->penulis_surat ?>" placeholder="Penulis Surat" required>
                        </div>

                        <div class="col-md-12">
                            <label>File Surat</label>
                            <div class="custom-file">
                                <input type="file" name="file_surat" id="id-input-file-2" class="custom-file-input">
                                <input type="hidden" name="old_file" value="<?= $e->file_surat ?>" />
                                <!-- <label class="custom-file-label">Pilih Gambar...</label> -->
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success btn-sm pull-right" style="margin-right: 5px;"><i class="fa fa-save"> Update</i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php endforeach; ?>
<div id="modalresult" class="modal fade" tabindex="-1"></div>
<script>
    $(document).ready(function() {
        tinyMCE.init({
            mode: "exact",
            elements: "input_deskripsi",
            theme: "advanced",
            plugins: "jbimages,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
            language: "en",
            theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4: "jbimg,|,insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
            theme_advanced_toolbar_location: "top",
            theme_advanced_toolbar_align: "left",
            theme_advanced_statusbar_location: "bottom",
            theme_advanced_resizing: true,
            relative_urls: false,
            width: '100%'
        });
    });

    $('#formAddPengalaman').submit(function(e) {
        e.preventDefault();
        tinyMCE.triggerSave();

        let formData = new FormData(this);
        let elementsForm = $(this).find('button, input, textarea');

        elementsForm.attr('disabled', true);

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                elementsForm.removeAttr('disabled');

                if (response.RESULT == 'OK') {
                    swal({
                        title: response.MESSAGE,
                        type: 'success'
                    }, function() {
                        $("a[data-dismiss='modal']").click();
                        window.location.reload();
                    });
                } else {
                    swal({
                        title: response.MESSAGE,
                        type: 'error'
                    });
                }
            }
        }).fail(function() {
            elementsForm.removeAttr('disabled');
            swal({
                title: 'Terjadi kesalahan',
                type: 'error'
            });
        });
    });

    $("a[href='#tambahproduk']").click(function() {
        $('input[type="reset"]').click();
    });

    function delete_produk(id) {
        let confirmation = confirm('Apakah anda yakin ingin menghapus data?');

        if (confirmation) {
            $.ajax({
                url: '<?= base_url(uri_string() . '/hapus_produk') ?>',
                method: 'POST',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(response) {
                    if (response.RESULT == 'OK') {
                        swal({
                            title: response.MESSAGE,
                            type: 'success'
                        }, function() {
                            window.location.reload();
                        });
                    } else {
                        swal({
                            title: response.MESSAGE,
                            type: 'error'
                        });
                    }
                }
            }).fail(function() {
                swal({
                    title: 'Terjadi kesalahan',
                    type: 'error'
                });
            });
        }
    }

    function edit_produk(id) {
        $.ajax({
            url: '<?= base_url(uri_string() . '/modal_edit_produk') ?>',
            method: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                if (response.RESULT == 'OK') {
                    $('#modalresult').html(response.HTML);
                    $('#modalresult').modal('show');
                } else {
                    swal({
                        title: response.MESSAGE,
                        type: 'error'
                    });
                }
            }
        }).fail(function() {
            swal({
                title: 'Terjadi kesalahan',
                type: 'error'
            });
        });
    }

    $(document).ready(function() {
        $('#suratm').DataTable();
    });
</script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
<script src="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>