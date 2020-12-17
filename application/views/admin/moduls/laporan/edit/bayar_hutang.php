<?php
defined('BASEPATH') or die('No direct script access allowed!');
?>

<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form class="form-horizontal" role="form" id="formEdit" action="<?= base_url('C_laporan/bayar_hutang') ?>" method="POST" enctype="multipart/form-data">
            <input type="reset" class="hidden">
            <input type="hidden" name="id_hutang" value="<?= $data->id_hutang?>">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="smaller lighter blue no-margin">Penyetoran Piutang</h3>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>Tanggal Transaksi</label>
                        <input type="date" class="form-control" name="tanggal_transaksi" placeholder="Tanggal" value="<?= $data->tanggal_transaksi?>" required>
                    </div>
                    <div class="col-md-12">
                        <label>Diambil Dari :</label>
                        <select id="id_akun_kredit"  name="id_akun_kredit"  class="form-control">
                            <option disabled selected style="display: none;" required>Pilih Akun</option>
                            <?php foreach ($aset as $row):?>
                                <option value="<?= $row->id_akun?>"><?= $row->id_akun?> - <?= $row->nama_akun?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-12">
                            <label>Untuk Pembayaran :</label>
                            <select id="id_akun_debit"  name="id_akun_debit"  class="form-control">
                                <option disabled selected style="display: none;" >Pilih Akun</option>
                                <?php foreach ($hutang as $row):?>
                                    <option value="<?= $row->id_akun?>"><?= $row->id_akun?> - <?= $row->nama_akun?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <div class="col-md-12">
                        <label>Nilai</label>
                        <input type="text" class="form-control" name="nilai" placeholder="Nilai" value="<?= $data->nilai?>" required>
                    </div>
                    <div class="col-md-12">
                        <label>Referensi</label>
                        <input type="text" class="form-control" name="referensi" placeholder="Referensi" value="<?= $data->ref?>">
                    </div>
                    <div class="col-md-12">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" placeholder="Keterangan" value="<?= $data->keterangan?>" required>
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