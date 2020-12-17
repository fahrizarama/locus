<?php
defined('BASEPATH') or die('No direct script access allowed!');
?>
<div class="page-header">
    <h1><i class="fa fa-book"></i>&nbsp;Buku Besar</h1>
</div>
<div class="row">
    <div class="col-md-3">
        <?php $this->load->view($sidenav) ?>
    </div>

    <div class="col-md-9">

        <?php
            $bulan = date('m', strtotime($tanggal_awal));
            switch($bulan) { 
                case 1:
                    $bulanPilih = "Januari";
                break;
                case 2:
                    $bulanPilih = "Februari";
                break;
                case 3:
                    $bulanPilih = "Maret";
                break;
                case 4:
                    $bulanPilih = "April";
                break;
                case 5:
                    $bulanPilih = "Mei";
                break;
                case 6:
                    $bulanPilih = "Juni";
                break;
                case 7:
                    $bulanPilih = "Juli";
                break;
                case 8:
                    $bulanPilih = "Agustus";
                break;
                case 9:
                    $bulanPilih = "September";
                break;
                case 10:
                    $bulanPilih = "Oktober";
                break;
                case 11:
                    $bulanPilih = "November";
                break;
                case 12:
                    $bulanPilih = "Desember";
                break;
            } 
        ?>
        <?php foreach($akun as $item) { ?>
            <div class="col-md-3">
                <h5><b>Nama Akun &nbsp:</b> <?php echo $item->nama_akun ?></h5>
            </div>
            <div class="col-md-3">
                <h5><b>Kode Akun &nbsp:</b> <?php echo $item->id_akun ?></h5>
            </div>
            <div class="col-md-2">
                <h5><b>Bulan &nbsp:</b> <?php echo $bulanPilih ?></h5>
            </div>
            <div class="col-md-2">
                <h5><b>Tahun &nbsp:</b> <?php echo date('Y', strtotime($tanggal_awal)) ?></h5>
            </div>
            <div class="col-md-2">
                <p class="text-right"><a class="btn btn-success btn-sm" href="<?php echo base_url('C_export/export_buku_besar/'.$item->id_akun); ?>">Export Excel</a></p>
            </div>
        <?php } ?>
        
        
        <table class="table table-striped table-bordered table-hover" id="datatablesPengalaman">
            <thead>
                <tr>
                    <th style="text-align: center;">Tanggal</th>
                    <th style="text-align: center;">Keterangan</th>
                    <th style="text-align: center;">Debit</th>
                    <th style="text-align: center;">Kredit</th>
                    <th style="text-align: center;">Saldo</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>

            <tbody>
            <?php 
            if (count($saldo) > 0) {
                foreach ($saldo as $key => $value) { 
                    $saldoAwalBulan = $value->debitTotal - $value->kreditTotal; ?>
                    <tr>
                        <td><?= $tanggal_awal ?></td>
                        <td>Saldo Awal Bulan</td>
                        <?php if($saldoAwalBulan >= 0) { ?>
                            <td>Rp. <?= number_format($saldoAwalBulan, 0, ".", ".") ?></td>
                            <td>Rp. 0</td>
                        <?php } else { ?>
                            <td>Rp. 0</td>
                            <td>Rp. <?= number_format(abs($saldoAwalBulan), 0, ".", ".") ?></td>
                        <?php } ?>
                        <td>Rp. <?= number_format(abs($saldoAwalBulan), 0, ".", ".") ?></td>
                        <td></td>
                    </tr>
                <?php } ?>
            <?php } ?>

                <?php
                $debit = 0;
                $kredit = 0;

                if (count($result) > 0) {
                    foreach ($result as $key => $value) { ?>
                        <tr>
                            <td><?= date('d-m-Y', strtotime($value->tanggal_transaksi)) ?></td>
                            <td><?= $value->keterangan ?></td>

                            <?php if($value->debit_kredit == '1') { ?>
                                <td>Rp. <?= number_format($value->nilai, 0, ".", ".") ?></td>
                                <td>Rp. 0</td>
                            <?php } else { ?>
                                <td>Rp. 0</td>
                                <td>Rp. <?= number_format($value->nilai, 0, ".", ".") ?></td>
                            <?php } ?>
                            
                            <?php
                                if($value->debit_kredit == "1" ){
                                    $debit = $debit + $value->nilai;
                                }else{
                                    $kredit = $kredit + $value->nilai;
                                }
                                $hasil = $saldoAwalBulan+$debit-$kredit;
                            ?>

                            <?php if($hasil>=0){ ?>
                                <td><?= 'Rp. '.number_format($hasil,0,',','.') ?></td>
                            <?php } else { ?>
                                <td><?= 'Rp. '.number_format(abs($hasil),0,',','.') ?></td>
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
                    <?php } ?>
                    <!-- <?php
                    $total_debit = 0;
                    $total_kredit = 0;
                    foreach ($result as $key => $value ) {
                        $total_debit +=$value->debit;
                        $total_kredit +=$value->kredit;
                    } 
                    $grand_total = $total_debit - $total_kredit;?>
                        <tr>
                            <td colspan="2"></td>
                            <td colspan="2">Total</td>
                            <td colspan="2">Rp. <?php echo number_format($grand_total, 0, ".", ".") ?></td>
                        </tr> -->
                <?php } else { ?>
                    <tr>
                        <td colspan="6" class="text-center">Tidak ada data yang tersedia</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<div id="modalresult" class="modal fade" tabindex="-1"></div>
<script>
    $(document).ready(function() {
        tinyMCE.init({
            mode: "exact",
            elements: "input_deskripsi",
            theme: "advanced",
            plugins: "jbimages,autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",
            language: "en",
            theme_advanced_buttons1: "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
            theme_advanced_buttons2: "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
            theme_advanced_buttons3: "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
            theme_advanced_buttons4: "jbimg,|,insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
            theme_advanced_toolbar_location: "top",
            theme_advanced_toolbar_align: "left",
            theme_advanced_statusbar_location: "bottom",
            theme_advanced_resizing: true,
            relative_urls: false,
            width: '100%'
        });
    });

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