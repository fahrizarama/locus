<?php
defined('BASEPATH') or die('No direct script access allowed!');
?>

<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form class="form-horizontal" role="form" id="formEditArtikel" action="<?= base_url('Artikel_c/edit_artikel') ?>" method="POST" enctype="multipart/form-data">
            <!-- <input type="reset" class="hidden"> -->
            <input type="hidden" name="id_artikel" value="<?= $data->id_artikel ?>">
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
                        <label>Judul Artikel</label>
                        <input type="text" class="form-control" name="judul_artikel" placeholder="Judul Artikel" value="<?= $data->judul_artikel ?>" required>
                    </div>

                    <div class="col-md-12">
                        <label>Deskripsi Artikel</label>
                        <textarea class="form-control ckeditor" name="deskripsi_artikel" id="input_deskripsi" placeholder="Deskripsi Artikel"><?= $data->deskripsi_artikel ?></textarea>
                    </div>

                    <div class="col-md-12">
                        <label>Tanggal Artikel</label>
                        <input type="date" class="form-control" name="tanggal_artikel" placeholder="Tanggal Artikel" value="<?= $data->tanggal_artikel ?>" required>
                    </div>

                    <div class="col-md-12">
                        <label>Artikel Dilihat</label>
                        <input type="text" class="form-control" name="artikel_dilihat" placeholder="Artikel Dilihat" value="<?= $data->artikel_dilihat ?>" required>
                    </div>

                    <div class="col-md-12">
                        <label>Foto Artikel</label>
                        <input type="file" class="form-control" name="foto_artikel" id="edit_input_foto5">
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

    $('#formEditArtikel').submit(function(e) {
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