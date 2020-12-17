<?php
defined('BASEPATH') or die('No direct script access allowed!');
?>

<div class="modal-dialog modal-lg">
    <div class="modal-content">
    <?php foreach($data as $data) { ?>
        <form class="form-horizontal" role="form" id="formEdit" action="<?= base_url('C_laporan/edit_jurnal') ?>" method="POST" enctype="multipart/form-data">
            <input type="reset" class="hidden">
            <input type="hidden" name="id_jurnal_umum" value="<?= $data->id_jurnal_umum?>">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="smaller lighter blue no-margin">Detail Transaksi</h3>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label>Tanggal Transaksi</label>
                        <input type="date" class="form-control" name="tanggal_transaksi" placeholder="Tanggal" value="<?= $data->tanggal_transaksi?>" required readonly>
                    </div>
                    <div class="col-md-12">
                        <label>Akun Kredit :</label>
                        <input type="text" class="form-control" name="id_akun_kredit" placeholder="Tanggal" value="<?= $akun_kredit->nama_akun?>" required readonly>
                    </div>
                    <div class="col-md-12">
                        <label>Akun Debit :</label>
                        <input type="text" class="form-control" name="id_akun_kredit" placeholder="Tanggal" value="<?= $data->nama_akun?>" required readonly>
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
    <?php } ?>
    </div>
</div>
<script>
    $(document).ready(function() {
        tinyMCE.init({
            mode: "exact",
            elements: "alamat_lengkap",
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