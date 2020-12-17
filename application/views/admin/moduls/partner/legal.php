    <div id="Legal" class="city" style="display: none;">
      <div style="padding: 20px 0 25px 0;">
            <a href="#tambahproduklegal" role="button" class="btn btn-primary" data-toggle="modal">Tambah Partner Legal</a>
        </div>

        <div id="tambahproduklegal" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <form class="form-horizontal" role="form" id="formAddLegal" action="<?= base_url(uri_string() . '/add_produk') ?>" method="POST" enctype="multipart/form-data">
                        <input type="reset" class="hidden">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="smaller lighter blue no-margin">Tambah Partner Legal</h3>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="alert alert-warning text-center">
                                <!-- <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> -->
                                    <strong>Peringatan!</strong><br>
                                        Max Dimension : 800 x 533 (px)<br>
                                        Allowed Image : JPG | PNG
                                </div>

                                <div class="col-md-12">
                                    <label>Nama Partner</label>
                                    <input type="text" class="form-control" name="nama_partner" placeholder="Nama Partner" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Deskripsi Partner</label>
                                    <textarea class="form-control" name="deskripsi_partner" id="input_deskripsi_legal" placeholder="Deskripsi Partner"></textarea>
                                </div>

                                <div class="col-md-12">
                                    <label>Logo Partner</label>
                                    <input type="file" class="form-control" name="logo_partner" id="input_foto5" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Website Partner</label>
                                    <input type="website" class="form-control" name="website_partner" placeholder="Website Partner" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Email Partner</label>
                                    <input type="email" class="form-control" name="email_partner" placeholder="Email Partner" required>
                                </div>

                                <div class="col-md-12">
                                    <label>Kontak Partner</label>
                                    <input type="text" class="form-control" name="kontak_partner" placeholder="Kontak Partner" required>
                                </div>

                                <input type="hidden" class="form-control" name="jenis_partner" value="3">

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
                <th>Nama Partner</th>
                <th>Deskripsi Partner</th>
                <th>Logo Partner</th>
                <th>Website Partner</th>
                <th>Email Partner</th>
                <th>Kontak Partner</th>
                <th>Action</th>
            </thead>

            <tbody>
                <?php
                    $start = 1;
                    foreach ($result as $key => $eta) { 
                        if ($eta->jenis_partner == 3) {
                            ?>
                        
                        <tr>
                            <td><?= $start++ ?></td>
                            <td><?= $eta->nama_partner ?></td>
                            <td><?= $eta->deskripsi_partner ?></td>
                            <td class="text-center">
                                <?php if ($eta->logo_partner) { ?>
                                    <img src="<?= base_url('assets/img/' . $eta->logo_partner) ?>" width="100">
                                <?php } ?>
                            </td>
                            <td><?= $eta->website_partner ?></td>
                            <td><?= $eta->email_partner ?></td>
                            <td><?= $eta->kontak_partner?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-xs" onclick="edit_produk('<?= $eta->id_partner ?>')">
                                    <i class="fa fa-edit"> Edit</i>
                                </button>
                                <button type="button" class="btn btn-danger btn-xs" onclick="delete_produk('<?= $eta->id_partner ?>')">
                                    <i class="fa fa-trash"> Hapus</i>
                                </button>
                            </td>
                        </tr>
                    <?php }
                }?>
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function() {
        tinyMCE.init({
            mode: "exact",
            elements: "input_deskripsi_legal",
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

        $('#formAddLegal').submit(function(e) {
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

    $("a[href='#tambahproduklegal']").click(function() {
        $('input[type="reset"]').click();
    });
    </script>