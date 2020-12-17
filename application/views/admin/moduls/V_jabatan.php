<?php
defined('BASEPATH') or die('No direct script access allowed!');
?>
<?php $title = "<i class='fas fa-briefcase'></i>&nbsp;Daftar Jabatan"; ?>
<div class="page-header">
    <h1><?php echo $title;?></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div style="padding-bottom: 10px;">
            <a href="#tambahJabatan" role="button" class="btn btn-primary" data-toggle="modal">Tambah Jabatan</a>
        </div>

        <div id="tambahJabatan" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="form-horizontal" role="form" id="formAddJabatan" action="<?= base_url('C_karyawan/tambah_jabatan') ?>" method="POST" enctype="multipart/form-data">
                        <input type="reset" class="hidden">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="smaller lighter blue no-margin">Tambah Jabatan</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="alert alert-warning text-center">
                                <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                                    <strong>Peringatan!</strong><br>
                                        Max Dimension : 512 x 512 (px)<br>
                                        Allowed Image : PNG
                                </div>

                                <div class="col-md-12">
                                    <label>Icon (Opsional)</label>
                                    <input type="file" class="form-control" value="" name="icon_jabatan">
                                </div>

                                <div class="col-md-12">
                                    <label>Nama Jabatan</label>
                                    <input class="form-control" name="nama_jabatan" placeholder="Nama Jabatan" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-success btn-sm pull-right" style="margin-right: 5px;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-striped table-bordered table-hover" id="datatablesProdukKetersediaan">
            <thead>
                <th>No</th>
                <th>Icon</th>
                <th>Nama Jabatan</th>
                <th>Action</th>
            </thead>

            <tbody>
                <?php
                if (count($result) > 0) {
                    $start = 1;
                    foreach ($result as $key => $value) { ?>
                        <tr>
                            <td><?= $start++ ?></td>
                            <td class="text-center">
                                <?php if ($value->icon) { ?>
                                    <img src="<?= base_url('assets/icon_jabatan/' . $value->icon) ?>" width="32">
                                <?php } ?>
                            </td>
                             <td><?= $value->nama_jabatan ?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-xs" onclick="edit_jabatan('<?= $value->id_jabatan ?>')">
                                    <i class="fa fa-edit"> Edit</i>
                                </button>
                                <button type="button" class="btn btn-danger btn-xs" onclick="delete_jabatan('<?= $value->id_jabatan ?>')">
                                    <i class="fa fa-trash"> Hapus</i>
                                </button>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data yang tersedia</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div id="modalresult" class="modal fade" tabindex="-1"></div>
<script>

    $('#formAddJabatan').submit(function(e) {
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

    function delete_jabatan(id) {
        let confirmation = confirm('Apakah anda yakin ingin menghapus data?');

        if (confirmation) {
            $.ajax({
                url: '<?= base_url('C_karyawan/hapus_jabatan') ?>',
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

    function edit_jabatan(id) {
        $.ajax({
            url: '<?= base_url('C_karyawan/modal_edit_jabatan') ?>',
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
</script>