<?php
defined('BASEPATH') or die('No direct script access allowed!');
?>
<?php $title = "<i class='far fa-handshake'></i>&nbsp;Transaksi Pemasukan Tunai"; ?>
<div class="page-header">
    <h1><?php echo $title;?></h1>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="container">
            <form class="form-horizontal" role="form" id="formTransaksiPemasukanTunai" action="<?= base_url('C_transaksi/add_transaksi_pemasukan_tunai') ?>" method="POST" enctype="multipart/form-data">
                <input type="reset" class="hidden">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Tanggal Transaksi</label>
                            <input type="date" class="form-control" id="datepicker" name="tanggal_transaksi" placeholder="Pilih Tanggal Transaksi" required>
                        </div>

                        <div class="col-md-12">
                            <label>Diterima Dari :</label>
                            <select id="id_akun_kredit"  name="id_akun_kredit"  class="form-control" required>
                                <option disabled selected style="display: none;" value="">Pilih Akun</option>
                                <?php if(count($pemasukan) > 0 ) { ?>
                                    <?php foreach ($pemasukan as $row):?>
                                        <option value="<?= $row->id_akun?>"><?= $row->id_akun?> - <?= $row->nama_akun?></option>
                                    <?php endforeach; ?>
                                <?php } else { ?>
                                    <option value="" disabled selected>Akun Pemasukan Tidak Tersedia, Silahkan Tambahkan Terlebih Dahulu</option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label>Disimpan ke :</label>
                            <select id="id_akun_debit" name="id_akun_debit"  class="form-control" required>
                                <option disabled selected style="display: none;" value="">Pilih Akun</option>
                                <?php if(count($aset) > 0 ) { ?>
                                    <?php foreach ($aset as $row):?>
                                        <option value="<?= $row->id_akun?>"><?= $row->id_akun?> - <?= $row->nama_akun?></option>
                                    <?php endforeach; ?>
                                <?php } else { ?>
                                    <option value="" disabled selected>Akun Aset Tidak Tersedia, Silahkan Tambahkan Terlebih Dahulu</option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label>Nilai</label>
                            <input type="text" class="form-control" name="nilai" placeholder="Masukkan Nilai" required>
                        </div>

                        <div class="col-md-12">
                            <label>Referensi</label>
                            <input type="text" class="form-control" name="referensi" placeholder="Masukkan Referensi (Opsional)">
                        </div>

                        <div class="col-md-12">
                            <label>Keterangan</label>
                            <input type="text" class="form-control" name="keterangan" placeholder="Tambahkan Keterangan" required>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm pull-right" style="margin-right: 5px;">Submit</button>
                </div>
            </form>
        </div>

    </div>
</div>
<div id="modalresult" class="modal fade" tabindex="-1"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    // Format mata uang.
    $( '#uang' ).mask('000.000.000.000.000.000', {reverse: true});
})
</script>
<script>
$("input[required], select[required]").attr("oninvalid", "this.setCustomValidity('Belum Diisi! Silahkan isi terlebih dahulu!')");
$("input[required], select[required]").attr("oninput", "setCustomValidity('')");
</script>
<script>

    $('#formTransaksiPemasukanTunai').submit(function(e) {
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
</script>