<?php $title = "<i class='fa fa-building'></i>&nbsp;Fakultas, Jurusan, Prodi"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" media="screen">
<div class="page-header">
    <h1><?php echo $title; ?></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div style="padding-bottom: 10px;">
            <a href="#tambahfakultas" role="button" class="btn btn-primary" data-toggle="modal">Tambah Fakultas</a>
        </div>

        <div id="tambahfakultas" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="form-horizontal" role="form" action="<?= base_url('C_magang/save_fakultas') ?>" method="POST" enctype="multipart/form-data">
                        <input type="reset" class="hidden">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="smaller lighter blue no-margin">Tambah Fakultas</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <div class="alert alert-warning text-center">
                                    <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                                    <strong>Peringatan!</strong><br>
                                    Kode Fakultas Harap di isi<br>
                                </div>

                                <div class="col-md-12">
                                    <label>Kode Fakultas</label>
                                    <input type="text" class="form-control" name="id_fakultas" value="F"  placeholder="Kode Fakultas" required>
                                </div>


                                <div class="col-md-12">
                                    <label>Fakultas</label>
                                    <input type="text" class="form-control" name="nama_fakultas" placeholder="Nama Fakultas" required>
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
    </div>
</div>
<div class="row">
    <table class="table table-striped table-bordered table-hover" id="TABLE_1">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Fakultas</th>
                <th>Nama Fakultas</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($fakultas as $f) : ?>
                <tr>
                    <th><?= $no++ ?></th>
                    <th><?= $f->id_fakultas ?></th>
                    <th><?= $f->nama_fakultas ?></th>
                    <th>
                        <a href="" data-toggle="modal" data-target="#updatefakultas<?= $f->id_fakultas ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                        |
                        <a onclick="return confirm('Apakah kamu yakin akan menghapus data?');" href="<?php echo site_url('C_magang/delete_fakultas/' . $f->id_fakultas) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php foreach ($ef as $ef) : ?>
    <div id="updatefakultas<?= $ef->id_fakultas ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" role="form" action="<?= base_url('C_magang/update_fakultas') ?>" method="POST" enctype="multipart/form-data">
                    <input type="reset" class="hidden">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="smaller lighter blue no-margin">Edit Fakultas</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12">
                                <label>Kode Fakultas</label>
                                <input type="text" class="form-control" name="id_fakultas" value="<?= $ef->id_fakultas ?>" placeholder="Kode Fakultas" required>
                            </div>

                            <div class="col-md-12">
                                <label>Fakultas</label>
                                <input type="text" class="form-control" name="nama_fakultas" value="<?= $ef->nama_fakultas ?>" placeholder="Nama Fakultas" required>
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
<?php endforeach; ?>
</div>
<div class="row">
    <div class="col-md-12">
        <div style="padding-bottom: 10px; margin-top: 30px;">
            <a href="#tambahjurusan" role="button" class="btn btn-primary" data-toggle="modal">Tambah Jurusan</a>
        </div>
        <div id="tambahjurusan" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="form-horizontal" role="form" action="<?= base_url('C_magang/save_jurusan') ?>" method="POST" enctype="multipart/form-data">
                        <input type="reset" class="hidden">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="smaller lighter blue no-margin">Tambah Jurusan</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <div class="alert alert-warning text-center">
                                    <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                                    <strong>Peringatan!</strong><br>
                                    Kode Jurusan Harap di isi<br>
                                </div>

                                <div class="col-md-12">
                                    <label>Kode Jurusan</label>
                                    <input type="text" class="form-control" name="id_jurusan" value="J" placeholder="Kode Jurusan" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Jurusan</label>
                                    <input type="text" class="form-control" name="nama_jurusan" placeholder="Nama Jurusan" required>
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
    </div>
</div>
<div class="row">
    <table class="table table-striped table-bordered table-hover" id="TABLE_2">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Jurusan</th>
                <th>Nama Jurusan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($jurusan as $j) : ?>
                <tr>
                    <th><?= $no++ ?></th>
                    <th><?= $j->id_jurusan ?></th>
                    <th><?= $j->nama_jurusan ?></th>
                    <th>
                        <a href="" data-toggle="modal" data-target="#updatejurusan<?= $j->id_jurusan ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                        |
                        <a onclick="return confirm('Apakah kamu yakin akan menghapus data?');" href="<?php echo site_url('C_magang/delete_jurusan/' . $j->id_jurusan) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php foreach ($ej as $ej) : ?>
    <div id="updatejurusan<?= $ej->id_jurusan ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" role="form" action="<?= base_url('C_magang/update_jurusan') ?>" method="POST" enctype="multipart/form-data">
                    <input type="reset" class="hidden">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="smaller lighter blue no-margin">Edit Jurusan</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="alert alert-warning text-center">
                                <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                                <strong>Peringatan!</strong><br>
                                Kode Jurusan Harap di isi<br>
                            </div>

                            <div class="col-md-12">
                                <label>Kode Jurusan</label>
                                <input type="text" class="form-control" name="id_jurusan" value="<?= $ej->id_jurusan ?>" placeholder="Kode Jurusan" required>
                            </div>

                            <div class="col-md-12">
                                <label>Jurusan</label>
                                <input type="text" class="form-control" name="nama_jurusan" value="<?= $ej->nama_jurusan ?>" placeholder="Nama Jurusan" required>
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
<?php endforeach; ?>
<div class="row">
    <div class="col-md-12">
        <div style="padding-bottom: 10px; margin-top: 30px;">
            <a href="#tambahprodi" role="button" class="btn btn-primary" data-toggle="modal">Tambah Prodi</a>
        </div>
        <div id="tambahprodi" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="form-horizontal" role="form" action="<?= base_url('C_magang/save_prodi') ?>" method="POST" enctype="multipart/form-data">
                        <input type="reset" class="hidden">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="smaller lighter blue no-margin">Tambah Prodi</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <div class="alert alert-warning text-center">
                                    <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                                    <strong>Peringatan!</strong><br>
                                    Kode Prodi Harap di isi<br>
                                </div>

                                <div class="col-md-12">
                                    <label>Kode Prodi</label>
                                    <input type="text" class="form-control" value="P" name="id_prodi" placeholder="Kode Prodi" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Prodi</label>
                                    <input type="text" class="form-control" name="nama_prodi" placeholder="Nama Prodi" required>
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
    </div>
</div>
<div class="row">
    <table class="table table-striped table-bordered table-hover" id="TABLE_3">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Prodi</th>
                <th>Nama Prodi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($prodi as $p) : ?>
                <tr>
                    <th><?= $no++ ?></th>
                    <th><?= $p->id_prodi ?></th>
                    <th><?= $p->nama_prodi ?></th>
                    <th>
                        <a href="" data-toggle="modal" data-target="#updateprodi<?= $p->id_prodi ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                        |
                        <a onclick="return confirm('Apakah kamu yakin akan menghapus data?');" href="<?php echo site_url('C_magang/delete_prodi/' . $p->id_prodi) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php foreach($ep as $ep) : ?>
<div id="updateprodi<?= $ep->id_prodi ?>" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form class="form-horizontal" role="form" action="<?= base_url('C_magang/update_prodi') ?>" method="POST" enctype="multipart/form-data">
                <input type="reset" class="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="smaller lighter blue no-margin">Tambah Prodi</h3>
                </div>
                <div class="modal-body">
                    <div class="row">

                        <div class="alert alert-warning text-center">
                            <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                            <strong>Peringatan!</strong><br>
                            Kode Prodi Harap di isi<br>
                        </div>

                        <div class="col-md-12">
                            <label>Kode Prodi</label>
                            <input type="text" class="form-control" name="id_prodi" value="<?= $ep->id_prodi ?>" placeholder="Kode Prodi" required>
                        </div>

                        <div class="col-md-12">
                            <label>Prodi</label>
                            <input type="text" class="form-control" name="nama_prodi" value="<?= $ep->nama_prodi ?>" placeholder="Nama Prodi" required>
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
<?php endforeach; ?>
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
        $('#fakultas').DataTable();
    });

    // $(document).ready(function() {
    //     $("table[id^='TABLE']").DataTable({
    //         "scrollY": "200px",
    //         "scrollCollapse": true,
    //         "searching": false,
    //         "paging": false
    //     });
    // });
</script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $(document).ready(function() {
        $('#jurusan').DataTable();
    });
</script>
<script type="text/javascript" defer="defer">
    $(document).ready(function() {
        $("table[id^='TABLE']").DataTable({
            "scrollY": "200px",
            "scrollCollapse": true,
            "searching": true,
            "paging": true,
        });
    });
</script>
<script src="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>