<?php
defined('BASEPATH') or die('No direct script access allowed!');
?>
<?php $title = "<i class='fas fa-comment-dollar'></i>&nbsp;Data Piutang"; ?>
<div class="page-header">
    <h1><?php echo $title;?></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-bordered table-hover" id="datatablesPengalaman">
            <thead>
                <th>Nama</th>
                <th>Nilai</th>
                <th>Sisa</th>
                <th>Action</th>
            </thead>

            <tbody>
                <?php
                if (count($result) > 0) {
                    foreach ($result as $key => $value) { ?>
                        <tr>
                            <td><?= $value->nama ?></td>
                            <td><?= $value->nilai ?></td>
                            <td><?= $value->sisa ?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-xs" onclick="setor_piutang('<?= $value->id_piutang ?>')">
                                    <i class="fa fa-edit"> Setor Piutang</i>
                                </button>
                                <button type="button" class="btn btn-success btn-xs" onclick="detail_setor_piutang('<?= $value->id_piutang ?>')">
                                    <i class="fa fa-info"> Detail Penyetoran Piutang</i>
                                </button>
                                <button type="button" class="btn btn-danger btn-xs" onclick="delete_piutang('<?= $value->id_piutang ?>')">
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
<div id="modalresult" class="modal fade" tabindex="-1"></div>
<script>

    function delete_piutang(id) {
        let confirmation = confirm('Apakah anda yakin ingin menghapus data?');

        if (confirmation) {
            $.ajax({
                url: '<?= base_url('C_laporan/hapus_piutang') ?>',
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

    function setor_piutang(id) {
        $.ajax({
            url: '<?= base_url('C_laporan/modal_setor_piutang') ?>',
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

    function detail_setor_piutang(id) {
        $.ajax({
            url: '<?= base_url('C_laporan/modal_detail_setor_piutang') ?>',
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