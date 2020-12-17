<?php
defined('BASEPATH') or die('No direct script access allowed!');
?>

<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form class="form-horizontal" role="form" id="formEditMember" action="<?= base_url('personal_c/edit_member') ?>" method="POST" enctype="multipart/form-data">
            <input type="reset" class="hidden" style="display: none;">
            <input type="hidden" name="id_member" value="<?= $data->id_member ?>">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <!-- <h3 class="smaller lighter blue no-margin" style="text-align: left;">Edit Artikel</h3> -->
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="alert alert-warning text-center" style="margin: auto; width: 99%">
                    <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                        <strong>Peringatan!</strong><br>
                            Max Dimension : 800 x 533 (px)<br>
                            Allowed Image : JPG | PNG
                    </div>  
                    
                    <div class="col-md-12">
                        <label>Nama Member</label>
                        <input type="text" class="form-control" name="nama_member" placeholder="Nama Member" value="<?= $data->nama_member ?>" required>
                    </div>

                    <div class="col-md-12">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" placeholder="Username" value="<?= $data->username ?>" required>
                    </div>

                    <div class="col-md-12">
                        <label>Profesi</label>
                        <input type="text" class="form-control" name="profesi" placeholder="Profesi" value="<?= $data->profesi_member ?>">
                    </div>

                    <div class="col-md-12">
                        <label>Ganti Password (Opsional)</label>
                        <input type="password" class="form-control" name="password" placeholder="Ganti Password">
                    </div>

                    <div class="col-md-12">
                        <label>Ulangi Password</label>
                        <input type="password" class="form-control" name="ulangi_password" placeholder="Ulangi Password">
                    </div>

                    <div class="col-md-12">
                        <label>Foto</label>
                        <input type="file" class="form-control" name="foto_kta" id="edit_input_foto5">
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

    $('#formEditMember').submit(function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        let elementsForm = $(this).find('button, textarea, input');

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