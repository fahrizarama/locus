<?php
defined('BASEPATH') or die('No direct script access allowed!');
?>
<?php $title = "<i class='fa fa-tags'></i>&nbsp;Daftar Produk"; ?>
<div class="page-header">
    <h1><?php echo $title;?></h1>
</div>

<div class="row">
    <div class="col-md-12">
        <div style="padding-bottom: 10px;">
            <a href="#tambahproduk" role="button" class="btn btn-primary" data-toggle="modal">Tambah Produk</a>
        </div>

        <div id="tambahproduk" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="form-horizontal" role="form" id="formAddProduk" action="<?= base_url(uri_string() . '/add_produk') ?>" method="POST" enctype="multipart/form-data">
                        <input type="reset" class="hidden">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="smaller lighter blue no-margin">Tambah Produk</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="alert alert-warning text-center">
                                    <strong>Peringatan!</strong><br>
                                        Max Dimension : 800 x 533 (px)<br>
                                        Allowed Image : JPEG | JPG | PNG
                                </div>
                                <div class="col-md-12">
                                    <label>Nama Merchant Partner</label>
                                    <select id="id_partner"  name="id_partner"  class="form-control" required>
                                        <option disabled selected style="display: none;" value="">Pilih Merchant Partner</option>
                                        <?php foreach ($partner as $row):?>
                                            <option value="<?= $row->id_partner?>"><?= $row->nama_partner?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label>Nama Produk</label>
                                    <input type="text" class="form-control" name="nama_produk" placeholder="Nama Produk" required>
                                </div>
                                <div class="col-md-12">
                                    <label>Deskripsi Produk</label>
                                    <textarea class="form-control" name="deskripsi_produk" id="input_deskripsi" placeholder="Deskripsi Produk"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label>Harga Pokok</label>
                                    <input type="text" class="form-control" name="harga_pokok" placeholder="Harga Pokok" required>
                                </div>
                                <div class="col-md-12">
                                    <label>Harga Jual Member</label>
                                    <input type="text" class="form-control" name="harga_member" placeholder="Harga Jual Member" required>
                                </div>
                                <div class="col-md-12">
                                    <label>Harga Publish</label>
                                    <input type="text" class="form-control" name="harga_publish" placeholder="Harga Publish" required>
                                </div>
                                <div class="col-md-12">
                                    <label>Foto Produk</label>
                                    <input type="file" class="form-control" name="foto_produk" required>
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
        </div>

        <table class="table table-striped table-bordered table-hover" id="datatablesPengalaman">
            <thead>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Foto Produk</th>
                <th>Deskripsi Produk</th>
                <th>Nama Merchant</th>
                <th>Harga Pokok</th>
                <th>Harga Jual Member</th>
                <th>Harga Publish</th>
                <th>Action</th>
            </thead>

            <tbody>
                <?php
                if (count($result) > 0) {
                    $start = 1;
                    foreach ($result as $key => $value) { ?>
                        <tr>
                            <td><?= $start++ ?></td>
                            <td><?= $value->nama_produk ?></td>
                            <td class="text-center">
                                <?php if ($value->foto) { ?>
                                    <img src="<?= base_url('assets/foto_produk/' . $value->foto) ?>" width="100">
                                <?php } ?>
                            </td>
                            <td><?= $value->deskripsi ?></td>
                            <td><?= $value->nama_partner ?></td>
                            <td>Rp. <?= number_format($value->harga_pokok, 0, ".", ".") ?></td>
                            <td>Rp. <?= number_format($value->harga_jual_member, 0, ".", ".") ?></td>
                            <td>Rp. <?= number_format($value->harga_publish, 0, ".", ".") ?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-xs" onclick="edit_produk('<?= $value->id_produk ?>')">
                                    <i class="fa fa-edit"> Edit</i>
                                </button>
                                <button type="button" class="btn btn-danger btn-xs" onclick="delete_produk('<?= $value->id_produk?>')">
                                    <i class="fa fa-trash"> Hapus</i>
                                </button>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="9" class="text-center">Tidak ada data yang tersedia</td>
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

    $('#formAddProduk').submit(function(e) {
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