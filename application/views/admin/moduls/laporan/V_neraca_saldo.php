<?php
defined('BASEPATH') or die('No direct script access allowed!');
?>
<?php $title = "<i class='fas fa-weight-hanging'></i>&nbsp;Neraca Saldo"; ?>
<div class="page-header">
    <h1><?php echo $title;?></h1>
</div>

<div class="row">
    <div class="col-md-12" style="margin-bottom: 10px">
        <form action="<?= base_url('C_laporan/neraca_saldo_filter_tanggal') ?>" method="POST">
            Pilih Bulan dan Tahun : 
            <input name="monthYear" id="month" type="month" value="<?php echo set_value('monthYear'); ?>">
            <button type="submit" class="btn btn-primary btn-sm" style="margin-right: 5px;">Submit</button>
        </form>
    </div>
    <div class="col-md-12">
        <table class="table table-striped table-bordered table-hover" id="tableView" cellspacing="0" width="100">
            <thead>
                <th>Keterangan</th>
                <th>Debit</th>
                <th>Kredit</th>
            </thead>

            <tbody>
                <?php
                if (count($result) > 0) {
                    foreach ($result as $key => $value) { ?>
                        <tr>
                            <td><?= $value->nama_akun ?></td>
                            <td>Rp. <?= number_format($value->debitTotal, 0, ".", ".") ?></td>
                            <td>Rp. <?= number_format($value->kreditTotal, 0, ".", ".") ?></td>
                        </tr>
                    <?php } ?>
                    <?php
                        $total_debit = 0;
                        $total_kredit = 0;
                        foreach ($result as $key => $value ) {
                            $total_debit +=$value->debitTotal;
                            $total_kredit +=$value->kreditTotal;
                        }
                    ?>
                        <tr>
                            <td><b>Total</b></td>
                            <td>Rp. <?php echo number_format($total_debit, 0, ".", ".") ?></td>
                            <td>Rp. <?php echo number_format($total_kredit, 0, ".", ".") ?></td>
                        </tr>
                        <tr>
                            <?php if ($total_debit == $total_kredit ) { ?>
                                <td colspan="3" style="text-align: center; background-color: green; color: white; font-size: 15px">SEIMBANG</td>
                            <?php } elseif ($total_debit < $total_kredit || $total_debit > $total_kredit) { ?>
                                <td colspan="3" style="text-align: center; background-color: red; color: white; font-size: 15px">TIDAK SEIMBANG</td>
                            <?php } ?>
                        </tr>
                <?php } else { ?>
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data yang tersedia</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div id="modalresult" class="modal fade" tabindex="-1"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
<script>
//DATEPICKER BULAN DAN TAHUN
const monthControl = document.querySelector('input[type="month"]');
const date= new Date()
const month=("0" + (date.getMonth() + 1)).slice(-2)
const year=date.getFullYear()
monthControl.value = `${year}-${month}`;
</script>
<script>

    $('#formAddAset').submit(function(e) {
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
</script>