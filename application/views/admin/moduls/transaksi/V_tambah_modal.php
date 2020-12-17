<?php
defined('BASEPATH') or die('No direct script access allowed!');
?>
<?php $title = "<i class='far fa-handshake'></i>&nbsp;Transaksi Tambah Modal"; ?>
<div class="page-header">
    <h1><?php echo $title;?></h1>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="container">
            <form class="form-horizontal" role="form" id="formTransaksi" action="<?= base_url('C_transaksi/add_transaksi_tambah_modal') ?>" method="POST" enctype="multipart/form-data">
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
                                <?php if(count($modal) > 0 ) { ?>
                                    <?php foreach ($modal as $row):?>
                                        <option value="<?= $row->id_akun?>"><?= $row->id_akun?> - <?= $row->nama_akun?></option>
                                    <?php endforeach; ?>
                                <?php } else { ?>
                                    <option value="" disabled selected>Akun Modal Tidak Tersedia, Silahkan Tambahkan Terlebih Dahulu</option>
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

    $('#formTransaksi').submit(function(e) {
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