<?php $title = "<i class='fa fa-users'></i>&nbsp;Mahasiswa"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" media="screen">
<div class="page-header">
    <h1><?php echo $title; ?></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div style="padding-bottom: 10px;">
            <a href="#tambahmahasiswa" role="button" class="btn btn-primary" data-toggle="modal">Tambah Mahasiswa</a>
        </div>
        <div id="tambahmahasiswa" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="form-horizontal" role="form" action="<?= base_url('C_magang/save_mahasiswa') ?>" method="POST" enctype="multipart/form-data">
                        <input type="reset" class="hidden">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="smaller lighter blue no-margin">Tambah Jurusan</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">

                                <div class="col-md-12">
                                    <label>NIM</label>
                                    <input type="text" class="form-control" name="nim" placeholder="Nomor Induk Mahasiswa" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Alamat Rumah</label>
                                    <input type="text" class="form-control" name="alamat_rumah" placeholder="Alamat Rumah" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Alamat Tinggal</label>
                                    <input type="text" class="form-control" name="alamat_tinggal" placeholder="Alamat Tinggal" required>
                                </div>

                                <div class="col-md-12">
                                    <label>No Telepon</label>
                                    <input type="number" class="form-control" name="no_telepon" placeholder="No Telepon" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" required>
                                        <option value="">--Pilih Jenis Kelamin--</option>
                                        <option value="laki-laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label>Kampus</label>
                                    <select name="id_kampus" class="form-control" required>
                                        <option>--Pilih Kampus--</option>
                                        <?php foreach ($kampus as $k) : ?>
                                            <option value="<?= $k->id_kampus ?>"><?= $k->nama_kampus ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label>Fakultas</label>
                                    <select name="id_fakultas" class="form-control">
                                        <option value="">--Pilih Fakultas--</option>
                                        <?php foreach ($fklts as $f) : ?>
                                            <option value="<?= $f->id_fakultas ?>"><?= $f->nama_fakultas ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label>Jurusan</label>
                                    <select name="id_jurusan" class="form-control">
                                        <option>--Pilih Jurusan--</option>
                                        <?php foreach ($jrsn as $j) : ?>
                                            <option value="<?= $j->id_jurusan ?>"><?= $j->nama_jurusan ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label>Prodi</label>
                                    <select name="id_prodi" class="form-control" required>
                                        <option>--Pilih Prodi--</option>
                                        <?php foreach ($prd as $p) : ?>
                                            <option value="<?= $p->id_prodi ?>"><?= $p->nama_prodi ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-12">
                                    <label>Angkatan</label>
                                    <input type="text" class="form-control" name="angkatan" placeholder="Angkatan" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Keahlian Awal</label>
                                    <input type="text" class="form-control" name="keahlian_awal" placeholder="Keahlian Awal" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Tanggal Mulai</label>
                                    <input type="date" class="form-control" name="tanggal_mulai" placeholder="Tanggal Mulai" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Tanggal Selesai</label>
                                    <input type="date" class="form-control" name="tanggal_selesai" placeholder="Tanggal Selesai" required>
                                    <input type="hidden" value="1" name="status">
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
    <table class="table table-striped table-bordered table-hover" id="mahasiswa">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat Rumah</th>
                <th>Alamat Tinggal</th>
                <th>No Telepon</th>
                <th>Email</th>
                <th>Jenis Kelamin</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($mahasiswa as $mhs) : ?>
                <tr>
                    <th><?= $no++ ?></th>
                    <th><?= $mhs->nim ?></th>
                    <th><?= $mhs->nama ?></th>
                    <th><?= $mhs->alamat_rumah ?></th>
                    <th><?= $mhs->alamat_tinggal ?></th>
                    <th><?= $mhs->no_telepon ?></th>
                    <th><?= $mhs->email ?></th>
                    <th><?= $mhs->jenis_kelamin ?></th>
                    <th>
                        <a href="" data-toggle="modal" data-target="#updatemahasiswa<?= $mhs->id_mahasiswa ?>" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i></a>
                        |
                        <a onclick="return confirm('Apakah kamu yakin akan menghapus data?');" href="<?php echo site_url('C_magang/delete_mahasiswa/' . $mhs->id_mahasiswa) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                        |
                        <a href="" data-toggle="modal" data-target="#detailmahasiswa<?= $mhs->id_mahasiswa ?>" class="btn btn-xs btn-success"><i class="fa fa-eye"></i></a>
                        |
                        <a href="<?= base_url('C_magang/mahasiswa_selesai/' . $mhs->id_mahasiswa) ?>" class="btn btn-xs btn-yellow"><i class="fa fa-check"></i></a>
                    </th>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php foreach ($dtlmhs as $m) : $tanggal = $m->tanggal_mulai;
    $tanggal2 = $m->tanggal_selesai; ?> ?>
    <div id="detailmahasiswa<?= $m->id_mahasiswa ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <input type="reset" class="hidden">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h3 class="smaller lighter blue no-margin">Detail Mahasiswa <?= $m->nama ?></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <table class="table table-striped table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    <th>Kampus</th>
                                    <th>Fakultas</th>
                                    <th>Jurusan</th>
                                    <th>Prodi</th>
                                    <th>Angkatan</th>
                                    <th>Keahlian Awal</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Selesai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th><?= $m->nama_kampus ?></th>
                                    <th><?= $m->nama_fakultas ?></th>
                                    <th><?= $m->nama_jurusan ?></th>
                                    <th><?= $m->nama_prodi ?></th>
                                    <th><?= $m->angkatan ?></th>
                                    <th><?= $m->keahlian_awal ?></th>
                                    <th><?= date("d-m-yy", strtotime($tanggal)) ?></th>
                                    <th><?= date("d-m-yy", strtotime($tanggal2)) ?></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>
<?php foreach ($em as $em) : ?>
    <div id="updatemahasiswa<?= $em->id_mahasiswa ?>" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form class="form-horizontal" role="form" action="<?= base_url('C_magang/update_mahasiswa') ?>" method="POST" enctype="multipart/form-data">
                    <input type="reset" class="hidden">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="smaller lighter blue no-margin">Tambah Jurusan</h3>
                    </div>
                    <div class="modal-body">
                        <div class="row">

                            <div class="col-md-12">
                                <label>NIM</label>
                                <input type="hidden" name="id_mahasiswa" value="<?= $em->id_mahasiswa ?>">
                                <input type="text" class="form-control" name="nim" value="<?= $em->nim ?>" placeholder="Nomor Induk Mahasiswa" required>
                            </div>

                            <div class="col-md-12">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama" value="<?= $em->nama ?>" placeholder="Nama Lengkap" required>
                            </div>

                            <div class="col-md-12">
                                <label>Alamat Rumah</label>
                                <input type="text" class="form-control" name="alamat_rumah" value="<?= $em->alamat_rumah ?>" placeholder="Alamat Rumah" required>
                            </div>

                            <div class="col-md-12">
                                <label>Alamat Tinggal</label>
                                <input type="text" class="form-control" name="alamat_tinggal" value="<?= $em->alamat_tinggal ?>" placeholder="Alamat Tinggal" required>
                            </div>

                            <div class="col-md-12">
                                <label>No Telepon</label>
                                <input type="number" class="form-control" name="no_telepon" value="<?= $em->no_telepon ?>" placeholder="No Telepon" required>
                            </div>

                            <div class="col-md-12">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" value="<?= $em->email ?>" placeholder="Email" required>
                            </div>

                            <div class="col-md-12">
                                <label>Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control" required>
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option <?php if ($em->jenis_kelamin == "laki-laki") {
                                                echo 'selected="selected"';
                                            } ?> value="laki-laki">Laki-Laki</option>
                                    <option <?php if ($em->jenis_kelamin == "Perempuan") {
                                                echo 'selected="selected"';
                                            } ?> value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label>Kampus</label>
                                <select name="id_kampus" class="form-control" required>
                                    <option value="">--Pilih Kampus--</option>
                                    <?php foreach ($ekampus as $k) : ?>
                                        <option <?php if ($k->id_kampus == $em->id_kampus) {
                                                    echo 'selected="selected"';
                                                } ?> value="<?= $k->id_kampus ?>"><?= $k->nama_kampus ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label>Fakultas</label>
                                <select name="id_fakultas" class="form-control">
                                    <option value="">--Pilih Fakultas--</option>
                                    <?php foreach ($eflkts as $f) : ?>
                                        <option <?php if ($f->id_fakultas == $em->id_fakultas) {
                                                    echo 'selected="selected"';
                                                } ?> value="<?= $f->id_fakultas ?>"><?= $f->nama_fakultas ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label>Jurusan</label>
                                <select name="id_jurusan" class="form-control">
                                    <option value="">--Pilih Jurusan--</option>
                                    <?php foreach ($ejrsn as $j) : ?>
                                        <option <?php if ($j->id_jurusan == $em->id_jurusan) {
                                                    echo 'selected="selected"';
                                                } ?> value="<?= $j->id_jurusan ?>"><?= $j->nama_jurusan ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label>Prodi</label>
                                <select name="id_prodi" class="form-control" required>
                                    <option value="">--Pilih Prodi--</option>
                                    <?php foreach ($eprd as $p) : ?>
                                        <option <?php if ($p->id_prodi == $em->id_prodi) {
                                                    echo 'selected="selected"';
                                                } ?> value="<?= $p->id_prodi ?>"><?= $p->nama_prodi ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label>Angkatan</label>
                                <input type="text" class="form-control" name="angkatan" value="<?= $em->angkatan ?>" placeholder="Angkatan" required>
                            </div>

                            <div class="col-md-12">
                                <label>Keahlian Awal</label>
                                <input type="text" class="form-control" name="keahlian_awal" value="<?= $em->keahlian_awal ?>" placeholder="Keahlian Awal" required>
                            </div>

                            <div class="col-md-12">
                                <label>Tanggal Mulai</label>
                                <input type="date" class="form-control" name="tanggal_mulai" placeholder="Tanggal Mulai" value="<?= $em->tanggal_mulai ?>" required>
                            </div>

                            <div class="col-md-12">
                                <label>Tanggal Selesai</label>
                                <input type="date" class="form-control" name="tanggal_selesai" value="<?= $em->tanggal_selesai ?>" placeholder="Tanggal Selesai" required>
                                <input type="hidden" value="<?= $em->status ?>" name="status">
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
        $('#mahasiswa').DataTable();
    });
</script>
<script src="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"></script>