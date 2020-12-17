<?php
defined('BASEPATH') or die('No direct script access allowed!');
?>
<?php $title = "<i class='fas fa-chart-bar'></i>&nbsp;Jurnal Umum"; ?>
<div class="page-header">
    <h1><?php echo $title;?></h1>
</div>

<div class="row">
    <div class="col-md-6" style="margin-bottom: 10px">
        <form action="<?= base_url('C_laporan/jurnal_umum_filter_tanggal') ?>" method="POST">
            Pilih Bulan dan Tahun : 
            <input name="monthYear" id="month" type="month" value="<?php echo set_value('monthYear'); ?>">
            <button type="submit" class="btn btn-primary btn-sm" style="margin-right: 5px;">Submit</button>
        </form>
    </div>
    <div class="col-md-6">
        <p class="text-right"><a class="btn btn-success btn-sm" href="<?php echo base_url('C_export/export_jurnal_umum'); ?>">Export Excel</a></p>
    </div>

    <div class="col-md-12">
        <table class="table table-striped table-bordered table-hover" id="tableView" cellspacing="0" width="100">
            <thead>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Nama Akun</th>
                <th>Ref</th>
                <th>Debit</th>
                <th>Kredit</th>
                <th>Action</th>
            </thead>

            <tbody>
                <?php
                $debit = 0;
                $kredit = 0;

                if (count($result) > 0) {
                    foreach ($result as $key => $value) { ?>
                        <tr>
                            <td><?= date('d-m-Y', strtotime($value->tanggal_transaksi)) ?></td>
                            <td><?= $value->keterangan ?></td>

                            <?php if($value->id_akun == 0) { ?>
                                <td><p style="text-indent: 5em;">─</p></td>
                            <?php } else { ?>
                                <?php if($value->debit_kredit == '1') { ?>
                                    <td><?= $value->nama_akun ?></td>
                                <?php } else { ?>
                                    <td><p style="text-indent: 5em;"><?= $value->nama_akun ?></p></td>
                                <?php } ?>
                            <?php } ?>

                            <td><?= $value->ref ?></td>

                            <?php if($value->debit_kredit == '1') { ?>
                                <td>Rp. <?= number_format($value->nilai, 0, ".", ".") ?></td>
                                <td>Rp. 0</td>
                            <?php } else { ?>
                                <td>Rp. 0</td>
                                <td>Rp. <?= number_format($value->nilai, 0, ".", ".") ?></td>
                            <?php } ?>

                            <td>
                                <button type="button" class="btn btn-primary btn-xs" onclick="edit_jurnal('<?= $value->id_jurnal_umum ?>')">
                                    <i class="fa fa-edit"> Edit</i>
                                </button>
                                <button type="button" class="btn btn-danger btn-xs" onclick="delete_jurnal('<?= $value->id_jurnal_umum ?>')">
                                    <i class="fa fa-trash"> Hapus</i>
                                </button>
                            </td>
                        </tr>
                            <?php
                                if($value->debit_kredit == '1' ) {
                                    $debit = $debit + $value->nilai;
                                }else{
                                    $kredit = $kredit + $value->nilai;
                                }
                            ?>
                    <?php } ?>
                        <tr>
                            <td colspan="3"></td>
                            <td>Total</td>
                            <td>Rp. <?= number_format($debit, 0, ".", ".") ?></td>
                            <td>Rp. <?= number_format($kredit, 0, ".", ".") ?></td>
                            <td>
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

    function delete_jurnal(id) {
        let confirmation = confirm('Apakah anda yakin ingin menghapus data?');

        if (confirmation) {
            $.ajax({
                url: '<?= base_url('C_laporan/hapus_jurnal') ?>',
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

    function edit_jurnal(id) {
        $.ajax({
            url: '<?= base_url('C_laporan/modal_edit_jurnal') ?>',
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