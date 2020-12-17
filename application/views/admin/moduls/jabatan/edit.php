<?php
defined('BASEPATH') or die('No direct script access allowed!');
?>

<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form class="form-horizontal" role="form" id="formEditJabatan" action="<?= base_url('C_karyawan/edit_jabatan') ?>" method="POST" enctype="multipart/form-data">
            <input type="reset" class="hidden">
            <input type="hidden" name="id_jabatan" value="<?= $data->id_jabatan ?>">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="smaller lighter blue no-margin">Edit Jabatan</h3>
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
                        <label>Icon</label>
                        <input type="file" class="form-control" name="icon_jabatan" value="<?= $data->icon ?>">
                    </div>  

                    <div class="col-md-12">
                        <label>Nama Jabatan</label>
                        <input class="form-control" name="nama_jabatan" value="<?= $data->nama_jabatan ?>" placeholder="Nama Jabatan">
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
<script>

    $('#formEditJabatan').submit(function(e) {
        e.preventDefault();
        tinyMCE.triggerSave();

        let formData = new FormData(this);
        let elementsForm = $(this).find('button, input, textarea, select');

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
                        $('#modalresult').modal('hide');
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
</script>