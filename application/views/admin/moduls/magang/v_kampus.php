<?php $title = "<i class='fa fa-university'></i>&nbsp;Kampus"; ?>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
<div class="page-header">
    <h1><?php echo $title; ?></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div style="padding-bottom: 10px;">
            <a href="#tambahkampus" role="button" class="btn btn-primary" data-toggle="modal">Tambah Kampus</a>
        </div>
        <div id="tambahkampus" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="form-horizontal" role="form" action="<?= base_url('C_magang/save_kampus') ?>" method="POST" enctype="multipart/form-data">
                        <input type="reset" class="hidden">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="smaller lighter blue no-margin">Tambah Kampus</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <label>Nama Kampus</label>
                                    <input type="text" class="form-control" name="nama_kampus" placeholder="Nama Kampus" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="Alamat" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Telepon</label>
                                    <input type="text" class="form-control" name="telp" placeholder="Telepon" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Email</label>
                                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Website</label>
                                    <input type="text" class="form-control" name="website" placeholder="Website" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Kota/Kabupaten</label>
                                    <div class="custom-file">
                                        <input type="text" name="kota_kabupaten" class="form-control">
                                        <!-- <label class="custom-file-label">Pilih Gambar...</label> -->
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label>Provinsi</label>
                                    <input type="text" class="form-control" name="provinsi" placeholder="Provinsi" required>
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
        <table class="table table-striped table-bordered table-hover" id="kampus">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Kampus</th>
                    <th>Alamat</th>
                    <th>Telepon</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Kota/Kabupaten</th>
                    <th>Provinsi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($kampus as $k) : ?>
                    <tr>
                        <th><?= $no++ ?></th>
                        <th><?= $k->nama_kampus ?></th>
                        <th><?= $k->alamat ?></th>
                        <th><?= $k->telp ?></th>
                        <th><?= $k->email ?></th>
                        <th><?= $k->website ?></th>
                        <th><?= $k->kota_kabupaten ?></th>
                        <th><?= $k->provinsi ?></th>
                        <th>
                            <a href="" data-toggle="modal" data-target="#modalupdate<?= $k->id_kampus ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                            |
                            <a onclick="return confirm('Apakah kamu yakin akan menghapus data?');" href="<?php echo site_url('C_magang/delete_kampus/' . $k->id_kampus) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php foreach ($update as $e) : ?>
    <div id="modalupdate<?= $e->id_kampus ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" role="form" action="<?= base_url('C_magang/update_kampus') ?>" method="POST" enctype="multipart/form-data">
                    <input type="reset" class="hidden">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="smaller lighter blue no-margin">Tambah Kampus</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12">
                                <label>Nama Kampus</label>
                                <input type="hidden" value="<?= $e->id_kampus ?>" name="id_kampus">
                                <input type="text" class="form-control" name="nama_kampus" value="<?= $e->nama_kampus ?>" placeholder="Nama Kampus" required>
                            </div>

                            <div class="col-md-12">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" value="<?= $e->alamat ?>" placeholder="Alamat" required>
                            </div>

                            <div class="col-md-12">
                                <label>Telepon</label>
                                <input type="text" class="form-control" name="telp" value="<?= $e->telp ?>" placeholder="Telepon" required>
                            </div>

                            <div class="col-md-12">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="<?= $e->email ?>" placeholder="Email" required>
                            </div>

                            <div class="col-md-12">
                                <label>Website</label>
                                <input type="text" class="form-control" name="website" value="<?= $e->website ?>" placeholder="Website" required>
                            </div>

                            <div class="col-md-12">
                                <label>Kota/Kabupaten</label>
                                <div class="custom-file">
                                    <input type="text" name="kota_kabupaten" value="<?= $e->kota_kabupaten ?>" placeholder="Kabupaten/Kota" class="form-control">
                                    <!-- <label class="custom-file-label">Pilih Gambar...</label> -->
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label>Provinsi</label>
                                <input type="text" class="form-control" name="provinsi" value="<?= $e->provinsi ?>" placeholder="Provinsi" required>
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
        $('#kampus').DataTable();
    });
</script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
<script src="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>