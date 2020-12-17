<?php
defined('BASEPATH') or die('No direct script access allowed!');
?>
<?php $title = "<i class='fas fa-balance-scale'></i>&nbsp;Neraca"; ?>
<div class="page-header">
    <h1><?php echo $title;?></h1>
</div>

<div class="row">
    <div class="col-md-12" style="margin-bottom: 10px">
        <form action="<?= base_url('C_laporan/neraca_filter_tanggal') ?>" method="POST">
            Pilih Bulan dan Tahun : 
            <input name="monthYear" id="month" type="month" value="<?php echo set_value('monthYear'); ?>">
            <button type="submit" class="btn btn-primary btn-sm" style="margin-right: 5px;">Submit</button>
        </form>
    </div>
    <div class="col-md-12">
        <table class="table table-striped table-bordered table-hover" id="tableView" cellspacing="0" width="100">
            <thead>
                <th>Kelompok</th>
                <th>Keterangan</th>
                <th>Saldo</th>
            </thead>

            <tbody>
                <!-- AKTIVA -->
                <tr>
                    <td colspan="3"><b>Aktiva</b></td>
                </tr>
                <?php
                if (count($aktiva) > 0) {
                    foreach ($aktiva as $key => $value) {
                        $saldoAktiva = $value->debitTotal - $value->kreditTotal; ?>
                        <tr>
                            <td></td>
                            <td><?= $value->id_akun ?> - <?= $value->nama_akun ?></td>
                            <td>Rp. <?= number_format(abs($saldoAktiva), 0, ".", ".") ?></td>
                        </tr>
                    <?php } ?>
                    <?php
                        $total_debit = 0;
                        $total_kredit = 0;
                        foreach ($aktiva as $key => $value ) {
                            $total_debit +=$value->debitTotal;
                            $total_kredit +=$value->kreditTotal;
                        }
                        $totalSaldoAktiva = $total_debit - $total_kredit;
                    ?>
                        <tr>
                            <td></td>
                            <td><b>Jumlah</b></td>
                            <td>Rp. <?php echo number_format(abs($totalSaldoAktiva), 0, ".", ".") ?></td>
                        </tr>
                <?php } else { ?>
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data yang tersedia</td>
                    </tr>
                <?php } ?>

                <!-- PASIVA -->
                <tr>
                    <td colspan="3"><b>Pasiva</b></td>
                </tr>
                <?php
                if (count($pasiva) > 0) {
                    foreach ($pasiva as $key => $value) { 
                        $saldoPasiva = $value->debitTotal - $value->kreditTotal; ?>
                        <tr>
                            <td></td>
                            <td><?= $value->id_akun ?> - <?= $value->nama_akun ?></td>
                            <td>Rp. <?= number_format(abs($saldoPasiva), 0, ".", ".") ?></td>
                        </tr>
                    <?php } ?>
                    <?php
                        $total_debit = 0;
                        $total_kredit = 0;
                        foreach ($pasiva as $key => $value ) {
                            $total_debit +=$value->debitTotal;
                            $total_kredit +=$value->kreditTotal;
                        }
                        $totalSaldoPasiva = $total_debit - $total_kredit;
                    ?>
                        <tr>
                            <td></td>
                            <td><b>Jumlah</b></td>
                            <td>Rp. <?php echo number_format(abs($totalSaldoPasiva), 0, ".", ".") ?></td>
                        </tr>
                <?php } else { ?>
                    <tr>
                        <td colspan="7" class="text-center">Tidak ada data yang tersedia</td>
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