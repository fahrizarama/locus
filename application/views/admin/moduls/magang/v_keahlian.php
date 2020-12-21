<?php $title = "<i class='fa fa-cogs'></i>&nbsp;Keahlian"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" media="screen">
<div class="page-header">
    <h1><?php echo $title; ?></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div style="padding-bottom: 10px;">
            <a href="#tambahkeahlianmhs" role="button" class="btn btn-primary" data-toggle="modal">Tambah Keahlian Mahasiswa</a>
        </div>
        <div id="tambahkeahlianmhs" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="form-horizontal" role="form" action="<?= base_url('C_magang/save_keahlian_mhs') ?>" method="POST" enctype="multipart/form-data">
                        <input type="reset" class="hidden">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="smaller lighter blue no-margin">Tambah Keahlian Mahasiswa</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <div class="alert alert-warning text-center">
                                    <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                                    <strong>Peringatan!</strong><br>
                                    Kode Keahlian Mahasiswa Harap di isi<br>
                                </div>

                                <div class="col-md-12">
                                    <label>Kode Keahlian Mahasiswa</label>
                                    <input type="text" class="form-control" value="KHLM" name="id_keahlian_mhs" placeholder="Kode Keahlian" required>
                                </div>

                                <!-- <div class="col-md-12">
                                    <label>Mahasiswa</label>
                                    <input type="text" class="form-control" id="id_mahasiswa" name="id_mahasiswa" placeholder="Kode Keahlian" required>
                                </div> -->

                                <div class="col-md-12">
                                    <label>Mahasiswa</label>
                                    <select name="id_mahasiswa" class="form-control" required>
                                        <option value="">--Pilih Mahasiswa--</option>
                                        <?php foreach ($mhs as $mhs) : ?>
                                            <option id="id_mahasiswa" value="<?= $mhs->id_mahasiswa ?>"><?= $mhs->nama ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <!-- <button type="button" data-toggle="modal" data-target="#datamahasiswa" class="btn btn-primary btn-sm" style="margin-top: 5px;">
                                        <i class="fa fa-search-plus"></i>
                                    </button> -->
                                </div>

                                <div class="col-md-12">
                                    <label>Keahlian</label>
                                    <select name="id_keahlian" class="form-control" required>
                                        <option value="">--Pilih Keahlian--</option>
                                        <?php foreach ($vk as $k) : ?>
                                            <option value="<?= $k->id_keahlian ?>"><?= $k->nama_keahlian ?></option>
                                        <?php endforeach; ?>
                                    </select>
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
        <div id="datamahasiswa" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <input type="reset" class="hidden">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="smaller lighter blue no-margin">Mahasiswa</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <table class="table table-striped table-bordered table-hover" id="TABLE_4" width="100%">
                                <thead>
                                    <tr>
                                        <th>Ceklist</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Kampus</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($mhs2 as $mhs) : ?>
                                        <tr>
                                            <th class="center"><input type="checkbox" class="check" value="<?= $mhs->id_mahasiswa ?>"></th>
                                            <th><?= $mhs->nama ?></th>
                                            <th><?= $mhs->nama_kampus ?></th>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success action-select" style="margin-right: 5px;"><i class="fa fa-hand-pointer-o"> Pilih</i></button>
                    </div>
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
                <th>Kode Keahlian</th>
                <th>Keahlian</th>
                <th>Mahasiswa</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($keahlianmahasiswa as $km) : ?>
                <tr>
                    <th><?= $no++ ?></th>
                    <th><?= $km->id_keahlian_mhs ?></th>
                    <th><?= $km->nama_keahlian ?></th>
                    <th><?= $km->nama ?></th>
                    <th>
                        <a href="" data-toggle="modal" data-target="#updatekeahlianmhs<?= $km->id_keahlian_mhs ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                        |
                        <a onclick="return confirm('Apakah kamu yakin akan menghapus data?');" href="<?php echo site_url('C_magang/delete_keahlian_mhs/' . $km->id_keahlian_mhs) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php foreach ($khmhs as $k) : ?>
    <div id="updatekeahlianmhs<?= $k->id_keahlian_mhs ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" role="form" action="<?= base_url('C_magang/update_keahlian_mhs') ?>" method="POST" enctype="multipart/form-data">
                    <input type="reset" class="hidden">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="smaller lighter blue no-margin">Update Keahlian Mahasiswa</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="alert alert-warning text-center">
                                <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                                <strong>Peringatan!</strong><br>
                                Kode Keahlian Mahasiswa Harap di isi<br>
                            </div>

                            <div class="col-md-12">
                                <label>Kode Keahlian Mahasiswa</label>
                                <input type="text" class="form-control" value="<?= $k->id_keahlian_mhs ?>" name="id_keahlian_mhs" placeholder="Kode Keahlian" required>
                            </div>

                            <!-- <div class="col-md-12">
                                    <label>Mahasiswa</label>
                                    <input type="text" class="form-control" id="id_mahasiswa" name="id_mahasiswa" placeholder="Kode Keahlian" required>
                                </div> -->

                            <div class="col-md-12">
                                <label>Mahasiswa</label>
                                <select name="id_mahasiswa" class="form-control" required>
                                    <option value="">--Pilih Mahasiswa--</option>
                                    <?php foreach ($mhs3 as $mhs) : ?>
                                        <option <?php if ($mhs->id_mahasiswa == $k->id_mahasiswa) {
                                                    echo 'selected="selected"';
                                                } ?> value="<?= $mhs->id_mahasiswa ?>"><?= $mhs->nama ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <!-- <button type="button" data-toggle="modal" data-target="#datamahasiswa" class="btn btn-primary btn-sm" style="margin-top: 5px;">
                                        <i class="fa fa-search-plus"></i>
                                    </button> -->
                            </div>

                            <div class="col-md-12">
                                <label>Keahlian</label>
                                <select name="id_keahlian" class="form-control" required>
                                    <option value="">--Pilih Keahlian--</option>
                                    <?php foreach ($vk2 as $vk) : ?>
                                        <option <?php if ($vk->id_keahlian == $k->id_keahlian) {
                                                    echo 'selected="selected"';
                                                } ?> value="<?= $vk->id_keahlian ?>"><?= $vk->nama_keahlian ?></option>
                                    <?php endforeach; ?>
                                </select>
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
<div class="row" style="margin-top: 50px;">
    <div class="col-md-12">
        <div style="padding-bottom: 10px;">
            <a href="#tambahkeahlian" role="button" class="btn btn-primary" data-toggle="modal">Tambah Keahlian Magang</a>
        </div>
        <div id="tambahkeahlian" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="form-horizontal" role="form" action="<?= base_url('C_magang/save_keahlian_magang') ?>" method="POST" enctype="multipart/form-data">
                        <input type="reset" class="hidden">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="smaller lighter blue no-margin">Tambah Keahlian</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <div class="alert alert-warning text-center">
                                    <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                                    <strong>Peringatan!</strong><br>
                                    Kode Keahlian Harap di isi<br>
                                </div>

                                <div class="col-md-12">
                                    <label>Kode Keahlian</label>
                                    <input type="text" class="form-control" value="KHN" name="id_keahlian" placeholder="Kode Keahlian" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Keahlian</label>
                                    <input type="text" class="form-control" name="nama_keahlian" placeholder="Nama Keahlian" required>
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
                <th>Kode Keahlian</th>
                <th>Nama Keahlian</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($keahlianmagang as $km) : ?>
                <tr>
                    <th><?= $no++ ?></th>
                    <th><?= $km->id_keahlian ?></th>
                    <th><?= $km->nama_keahlian ?></th>
                    <th>
                        <a href="" data-toggle="modal" data-target="#updatekm<?= $km->id_keahlian ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                        |
                        <a onclick="return confirm('Apakah kamu yakin akan menghapus data?');" href="<?php echo site_url('C_magang/delete_keahlian_magang/' . $km->id_keahlian) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php foreach ($ek as $ek) : ?>
    <div id="updatekm<?= $ek->id_keahlian ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" role="form" action="<?= base_url('C_magang/update_keahlian_magang') ?>" method="POST" enctype="multipart/form-data">
                    <input type="reset" class="hidden">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="smaller lighter blue no-margin">Update Keahlian Magang</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="alert alert-warning text-center">
                                <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                                <strong>Peringatan!</strong><br>
                                Kode Keahlian Harap di isi<br>
                            </div>

                            <div class="col-md-12">
                                <label>Kode Keahlian</label>
                                <input type="text" class="form-control" name="id_keahlian" value="<?= $ek->id_keahlian ?>" placeholder="Kode Keahlian" required>
                            </div>

                            <div class="col-md-12">
                                <label>Keahlian</label>
                                <input type="text" class="form-control" name="nama_keahlian" value="<?= $ek->nama_keahlian ?>" placeholder="Nama Keahlian" required>
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
        $('#keahlian').DataTable();
    });
</script>
<script>
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });

    $('.action-select').click(function(e) {
        e.preventDefault();
        var arr = [];
        var checkedValue = $(".check:checked").val();
        console.log('checked', checkedValue);
        $('#tambahkeahlianmhs').modal('show');
        $.ajax({
            url: "<?php echo base_url('C_magang/nama_mahasiswa/') ?>" + checkedValue,
            type: "GET",
            dataType: "JSON",
            success: function(result) {
                //$('[id="fv_nmpelanggan_view"]').val(result.fv_nmpelanggan);
                $('[id="id_mahasiswa"]').val(result.id_mahasiswa);
                $('[id="nama"]').val(result.nama);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Data Eror');
            }
        })
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