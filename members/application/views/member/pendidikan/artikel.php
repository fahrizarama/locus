<style>
.status-published {
    padding: 5px;
    background-color: #00c400;
    color: white;
    border-radius: 3px;
}
.status-pending {
    padding: 5px;
    background-color: #ffd700;
    color: black;
    border-radius: 3px;
}
.status-rejected {
    padding: 5px;
    background-color: #ff0000;
    color: white;
    border-radius: 3px;
}
</style>
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                      <!-- Brand and toggle get grouped for better mobile display -->
                      <a class="navbar-brand logo_h" href="<?php echo site_url(); ?>pendidikan_c"><img src="<?php echo base_url(); ?>assets/img/locus-logo.png" alt=""></a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <!-- Collect the nav links, forms, and other content for toggling -->
                      <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                          <ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>pendidikan_c">Beranda</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url().'artikel_c/artikel/'.$this->session->userdata('id_member'); ?>">Artikel</a></li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Daftar Anggota</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>pendidikan_c/anggota">Semua Anggota</a></li>
                                        <?php foreach($members as $member) { ?>
                                          <li class="nav-item"><a class="nav-link" href="<?php echo site_url().'pendidikan_c/anggota/'.$member->id_kategori; ?>"><?= $member->kategori_member ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </li>  
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url().'profil_c/profil_personal/'.$this->session->userdata('id_member'); ?>">Profil</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>login/logout">Logout</a></li> 
                          </ul>
                      </div> 
                  </div>
              </nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Daftar Artikel Anda</h2>
                        <div class="page_link">
                            <a href="<?php echo base_url(); ?>pendidikan_c">Beranda</a>
                            <a href="<?php echo site_url().'artikel_c/artikel/'.$this->session->userdata('id_member'); ?>">Artikel</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <!--================Courses Area =================-->
        <section class="latest_blog_area p_120">
            <div class="container">
                <div class="main_title">
                    <h2>All Your Articles</h2>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p> -->
                </div>

                <div style="padding-bottom: 10px;">
                    <a href="#tambahproduk" role="button" class="btn btn-primary" data-toggle="modal">Tambah Artikel</a>
                </div>

                <div id="tambahproduk" class="modal fade" tabindex="-1">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <form class="form-horizontal" role="form" id="formAddArtikel" action="<?= base_url('Artikel_c/add_artikel') ?>" method="POST" enctype="multipart/form-data">
                                <input type="reset" class="hidden" style="display: none;">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <!-- <h3 class="smaller lighter blue no-margin">Tambah Artikel</h3> -->
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="alert alert-warning text-center" style="margin: auto; width: 99%">
                                            <strong>Peringatan!</strong><br>
                                                Max Dimension : 800 x 533 (px)<br>
                                                Allowed Image : JPG | PNG
                                        </div>

                                        <div class="col-md-12">
                                            <label>Judul Artikel</label>
                                            <input type="text" class="form-control" name="judul_artikel" placeholder="Judul Artikel" required>
                                        </div>

                                        <div class="col-md-12">
                                            <label>Deskripsi Artikel</label>
                                            <textarea class="form-control ckeditor" name="deskripsi_artikel" id="input_deskripsi" placeholder="Deskripsi Artikel"></textarea>
                                        </div>

                                        <div class="col-md-12">
                                            <label>Tanggal Artikel</label>
                                            <input type="date" class="form-control" name="tanggal_artikel" placeholder="Tanggal Artikel" required>
                                        </div>

                                        <div class="col-md-12">
                                            <label>Foto Artikel</label>
                                            <input type="file" class="form-control" name="foto_artikel" id="input_foto5" required>
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

                <div class="row latest_blog_inner">
                    <table datatable="ng" class="table table-hover table-bordered"> 
                        <thead class="thead-dark">
                            <tr>
                                <th class="head-text">No</th>
                                <th class="head-text">Foto Artikel</th>
                                <th class="head-text">Judul Artikel</th>
                                <th class="head-text">Deskripsi</th>
                                <th class="head-text">Tanggal Artikel</th>
                                <th class="head-text">Artikel Dilihat</th>
                                <th class="head-text">Status Artikel</th>
                                <th class="head-text">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($result->result() as $row):?>
                            <?php if($row->id_member != $this->session->userdata('id_member')) { 
                            
                            } else { ?>
                                <tr>
                                    <td><?= $no++?></td>
                                    <td class="text-center">
                                        <?php if ($row->foto_artikel) { ?>
                                            <img src="<?= base_url('assets/img/' . $row->foto_artikel) ?>" width="100">
                                        <?php } ?>
                                    </td>
                                    <td><?= $row->judul_artikel?></td>
                                    <td><?= $row->deskripsi_artikel?></td>
                                    <td><?= $row->tanggal_artikel?></td>
                                    <td><?= $row->artikel_dilihat?></td>
                                    <?php if($row->status_artikel == '0') { ?>
                                        <td><p class="status-pending">Pending</p></td>
                                    <?php } elseif($row->status_artikel == '1') { ?>
                                        <td><p class="status-published">Published</p></td>
                                    <?php } else { ?>
                                        <td><p class="status-rejected">Rejected</p></td>
                                    <?php } ?>
                                    <td>
                                        <?php if($row->status_artikel == '1') { ?>
                                            <a href="<?= base_url('C_komentar/komentar_members/'.$row->id_artikel) ?>" class="btn btn-warning btn-xs" style="margin: 1px">
                                                <i class="fa fa-eye"> Comment</i>
                                            </a>
                                        <?php } ?>
                                        <button type="button" class="btn btn-primary btn-xs" style="margin: 1px" onclick="edit_artikel('<?= $row->id_artikel ?>')">
                                            <i class="fa fa-edit"> Edit</i>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-xs" style="margin: 1px" onclick="delete_artikel('<?= $row->id_artikel?>')">
                                            <i class="fa fa-trash"> Hapus</i>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                            <?php  endforeach;?>
                        </tbody>
                    </table>    
                </div>
                <div id="modalresult" class="modal fade" tabindex="-1"></div>
            </div>
        </section>
        
        <!--================End Courses Area =================-->
<script>

    $('#formAddArtikel').submit(function(e) {
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

    function delete_artikel(id) {
        let confirmation = confirm('Apakah anda yakin ingin menghapus data?');

        if (confirmation) {
            $.ajax({
                url: '<?= base_url('Artikel_c/hapus_artikel') ?>',
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

    function edit_artikel(id) {
        $.ajax({
            url: '<?= base_url('Artikel_c/modal_edit_artikel') ?>',
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