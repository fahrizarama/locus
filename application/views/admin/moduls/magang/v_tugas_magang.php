<?php $title = "<i class='fa fa-tasks'></i>&nbsp;Tugas Magang"; ?>
<link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" />
<div class="page-header">
    <h1><?php echo $title; ?></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div style="padding-bottom: 10px;">
            <a href="#tambahtgsmagang" role="button" class="btn btn-primary" data-toggle="modal">Tambah Tugas Magang</a>
        </div>
        <div id="tambahtgsmagang" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="form-horizontal" role="form" action="<?= base_url('C_magang/save_tugasmagang') ?>" method="POST" enctype="multipart/form-data">
                        <input type="reset" class="hidden">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="smaller lighter blue no-margin">Tambah Tugas Magang</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <label>Mahasiswa</label>
                                    <select name="id_mahasiswa" class="form-control" required>
                                        <option value="">--Pilih Mahasiswa--</option>
                                        <?php foreach ($mahasiswa as $mhs) : ?>
                                            <option value="<?= $mhs->id_mahasiswa ?>"><?= $mhs->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label>Keahlian</label>
                                    <select name="id_keahlian" class="form-control" required>
                                        <option value="">--Pilih Keahlian--</option>
                                        <?php foreach ($keahlian as $khl) : ?>
                                            <option value="<?= $khl->id_keahlian ?>"><?= $khl->nama_keahlian ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label>Judul Tugas</label>
                                    <input type="text" class="form-control" name="judul_tugas" placeholder="Judul Tugas" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Deskripsi Tugas</label>
                                    <textarea name="deskripsi_tugas" placeholder="Deskripsi Tugas" class="form-control" required></textarea>
                                </div>

                                <div class="col-md-12">
                                    <label>Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tgl_mulai" placeholder="Tanggal Mulai" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Tanggal Selesai</label>
                                    <input type="date" name="tgl_selesai" class="form-control">
                                    <!-- <label class="custom-file-label">Pilih Gambar...</label> -->
                                </div>

                                <div class="col-md-12">
                                    <label>Nilai</label>
                                    <input type="number" class="form-control" name="nilai" placeholder="Nilai" required>
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
        <table class="table table-striped table-bordered table-hover" id="tugasmagang">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Mahasiswa</th>
                    <th>Keahlian</th>
                    <th>Judul Tugas</th>
                    <th>Deskripsi Tugas</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Selesai</th>
                    <th>Nilai</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($tugasmagang as $tm) : $tanggal1 = $tm->tgl_mulai;
                $tanggal2 = $tm->tgl_selesai; ?>
                    <tr>
                        <th><?= $no++ ?></th>
                        <th><?= $tm->nama ?></th>
                        <th><?= $tm->nama_keahlian ?></th>
                        <th><?= $tm->judul_tugas ?></th>
                        <th><?= $tm->deskripsi_tugas ?></th>
                        <th><?= date("d-m-yy", strtotime($tanggal1)) ?></th>
                        <th><?= date("d-m-yy", strtotime($tanggal2)) ?></th>
                        <th><?= $tm->nilai ?></th>
                        <th>
                            <a href="" data-toggle="modal" data-target="#updatetugas<?= $tm->id_tugas ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                            |
                            <a onclick="return confirm('Apakah kamu yakin akan menghapus data?');" href="<?php echo site_url('C_magang/delete_tugasmagang/' . $tm->id_tugas) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                            |
                            <a href="" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>
                        </th>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php foreach ($etm as $etm) : ?>
    <div id="updatetugas<?= $etm->id_tugas ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" role="form" action="<?= base_url('C_magang/update_tugasmagang') ?>" method="POST" enctype="multipart/form-data">
                    <input type="reset" class="hidden">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="smaller lighter blue no-margin">Update Tugas Magang</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12">
                                <label>Mahasiswa</label>
                                <input type="hidden" value="<?= $etm->id_tugas ?>" name="id_tugas">
                                <select name="id_mahasiswa" class="form-control" required>
                                    <option value="">--Pilih Mahasiswa--</option>
                                    <?php foreach ($vmhs as $mhs) : ?>
                                        <option <?php if ($mhs->id_mahasiswa == $etm->id_mahasiswa) {
                                                    echo 'selected="selected"';
                                                } ?> value="<?= $mhs->id_mahasiswa ?>"><?= $mhs->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label>Keahlian</label>
                                <select name="id_keahlian" class="form-control" required>
                                    <option value="">--Pilih Keahlian--</option>
                                    <?php foreach ($vkhl as $khl) : ?>
                                        <option <?php if ($khl->id_keahlian == $etm->id_keahlian) {
                                                    echo 'selected="selected"';
                                                } ?> value="<?= $khl->id_keahlian ?>"><?= $khl->nama_keahlian ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label>Judul Tugas</label>
                                <input type="text" class="form-control" value="<?= $etm->judul_tugas ?>" name="judul_tugas" placeholder="Judul Tugas" required>
                            </div>

                            <div class="col-md-12">
                                <label>Deskripsi Tugas</label>
                                <textarea name="deskripsi_tugas" placeholder="Deskripsi Tugas" class="form-control" required><?= $etm->deskripsi_tugas ?></textarea>
                            </div>

                            <div class="col-md-12">
                                <label>Tanggal Mulai</label>
                                <input type="date" class="form-control" value="<?= $etm->tgl_mulai ?>" name="tgl_mulai" placeholder="Tanggal Mulai" required>
                            </div>

                            <div class="col-md-12">
                                <label>Tanggal Selesai</label>
                                <input type="date" name="tgl_selesai" value="<?= $etm->tgl_selesai ?>" class="form-control">
                                <!-- <label class="custom-file-label">Pilih Gambar...</label> -->
                            </div>

                            <div class="col-md-12">
                                <label>Nilai</label>
                                <input type="number" class="form-control" name="nilai" value="<?= $etm->nilai ?>" placeholder="Nilai" required>
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
        $('#tugasmagang').DataTable();
    });
</script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
<script src="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>