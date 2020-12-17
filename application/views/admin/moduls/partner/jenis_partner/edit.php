<?php
defined('BASEPATH') or die('No direct script access allowed!');
?>

<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form class="form-horizontal" role="form" id="formEdit" action="<?= base_url('C_partner/edit_jenis_partner') ?>" method="POST" enctype="multipart/form-data">
            <input type="reset" class="hidden">
            <input type="hidden" name="id_jenis_partner" value="<?= $data->id_jenis_partner?>">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="smaller lighter blue no-margin">Edit Jenis Partner</h3>
            </div>

            <div class="modal-body">
                <div class="row">      

                    <div class="col-md-12">
                        <label>Nama Jenis Partner</label>
                        <input type="text" class="form-control" name="nama_jenis_partner" placeholder="Nama Jenis Partner" value="<?= $data->nama_jenis_partner?>" required>
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

    $('#formEdit').submit(function(e) {
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