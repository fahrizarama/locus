<?php
defined('BASEPATH') or die('No direct script access allowed!');
?>

<div class="modal-dialog modal-lg">
    <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="smaller lighter blue no-margin">Detail Pembayaran Hutang</h3>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered table-hover" id="datatablesPengalaman">
                            <thead>
                                <th>Tanggal Transaksi</th>
                                <th>Nilai</th>
                                <th>Action</th>
                            </thead>

                            <tbody>
                                <?php
                                if (count($data) > 0) {
                                    foreach ($data as $key => $value) { ?>
                                        <tr>
                                            <td><?= $value->tanggal_transaksi ?></td>
                                            <td><?= $value->nilai ?></td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-xs" onclick="delete_detail_bayar_hutang('<?= $value->id_bayar_hutang ?>')">
                                                    <i class="fa fa-trash"> Hapus</i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data yang tersedia</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm pull-right" data-dismiss="modal">Close</button>
            </div>
    </div>
</div>
<script>

    function delete_detail_bayar_hutang(id) {
        let confirmation = confirm('Apakah anda yakin ingin menghapus detail? Pembayaran akan dikembalikan');

        if (confirmation) {
            $.ajax({
                url: '<?= base_url('C_laporan/hapus_detail_hutang') ?>',
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
</script>