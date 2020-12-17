<style>
    .has-error span{
        color:#e74a3b;
        font-size: 13px;
        padding-left: 10px;
    }
</style>        
        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <a class="navbar-brand logo_h" href="<?php echo site_url(); ?>beranda_c"><img src="<?php echo base_url(); ?>assets/img/locus-logo.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                            <ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>beranda_c">Beranda</a></li> 
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>profil_c">Profil</a></li> 
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>event_c">Event</a></li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mitra Partner</a>
                                    <ul class="dropdown-menu">
                                        <?php foreach($jenis_partner as $jenis) { ?>
                                          <li class="nav-item"><a class="nav-link" href="<?php echo site_url().'merchant_c/partner/'.$jenis->id_jenis_partner; ?>"><?= $jenis->nama_jenis_partner ?></a></li>
                                        <?php } ?>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>produk_c">Daftar Produk</a></li>
                                    </ul>
                                </li> 
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>promo_c">Promo</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>galeri_c">Galeri</a></li> 
                                <li class="nav-item active"><a class="nav-link" href="<?php echo site_url(); ?>artikel_c">Artikel</a></li> 
                                <li class="nav-item "><a class="nav-link" href="<?php echo site_url(); ?>survey_c">Survey</a></li> 
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>recruitmen_c">Recruitment</a></li>
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
                        <h2>Detail Artikel</h2>
                        <div class="page_link">
                            <a href="<?php echo base_url(); ?>beranda_c">Beranda</a>
                            <a href="<?php echo base_url(); ?>artikel_c">Artikel</a>
                            <a href="#">Detail Artikel</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Blog Area =================-->
        <section class="blog_area single-post-area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 posts-list">
                        <div class="blog_left_sidebar">
                            <?php foreach ($result->result() as $result) : ?>
                            <article class="row blog_item">
                               <div class="col-md-3">
                                   <div class="blog_info text-right">
                                        <ul class="blog_meta list">
                                        <?php 
                                        $conn = mysqli_connect('localhost','root','','locus');

                                        $find_count = mysqli_query($conn, "SELECT artikel_dilihat FROM tb_artikel WHERE id_artikel = ".$result->artikel_id);

                                        while ($row = mysqli_fetch_assoc($find_count)) {
                                            $current_count = $row['artikel_dilihat'];
                                            $new_count = $current_count + 1;
                                            $update_count = mysqli_query($conn,"UPDATE tb_artikel SET artikel_dilihat = ".$new_count."  WHERE id_artikel = ".$result->artikel_id);
                                        }
                                         ?>
                                        <li><a href="#"><?php echo $result->nama_member ?><i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#"><?php echo date('d F Y', strtotime($result->tanggal_artikel)) ?><i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a href="#"><?php echo $new_count ?> Dilihat<i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#">0<?php echo $result->jml_komentar?> Komentar<i class="lnr lnr-bubble"></i></a></li>
                                        </ul>
                                    </div>
                               </div>
                                <div class="col-md-9">
                                    <div class="blog_post">
                                        <img src="<?php echo base_url('members/assets/'); ?>img/<?php echo $result->foto_artikel ?>">
                                        <div class="col-lg-12 col-md-12 blog_details">
                                            <h2><?php echo $result->judul_artikel ?></h2>
                                            <p class="excert"><?php echo $result->deskripsi_artikel ?></p>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <?php endforeach; ?>
                        </div>
                        <div class="comments-area">
                            <h4>0<?php echo $result->jml_komentar?> Komentar</h4>
                            <div class="comment-list">
                            <?php foreach ($komentar->result() as $komentar) : ?>
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="desc">
                                            <h5><a href="#"><?php echo $komentar->nama_komentar ?></a></h5>
                                            <p class="date"><?php echo date('d F Y', strtotime($komentar->tanggal_komentar)) ?></p>
                                            <p class="comment">
                                                <?php echo $komentar->deskripsi_komentar ?>
                                            </p>
                                        </div>
                                    </div>
                                </div> 
                            <?php endforeach; ?>
                            </div>  
                        </div>
                        <div class="comment-form">
                            <h4>Tinggalkan Tanggapan</h4>
                             <form method="post" action="">
                                <?= validation_errors() ? "<script>alert('Kirim Komentar Gagal!!. Silahkan Ulangi Kembali'); </script>" : null ?>
                                <input type="hidden" name="id_artikel" value="<?= $result->id_artikel ?>">
                                <div class="form-group form-inline has-error">
                                  <div class="form-group col-lg-6 col-md-6 name">
                                    <input name="nama_komentar" type="text" class="form-control" value="<?= set_value('nama_komentar')?>" placeholder="Nama" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                                    <span><?= form_error('nama_komentar')?></span>
                                  </div>
                                  <div class="form-group col-lg-6 col-md-6 email">
                                    <input name="email_komentar" type="email" class="form-control" value="<?= set_value('email_komentar')?>" placeholder="Alamat email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                                    <span><?= form_error('email_komentar')?></span>
                                  </div>                                        
                                </div>
                                <div class="form-group has-error">
                                    <input name="no_tlp" type="text" class="form-control" value="<?= set_value('no_tlp')?>" placeholder="No Telepon" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter phone number'">
                                    <span><?= form_error('no_tlp') ?></span>
                                </div>
                                <div class="form-group has-error">
                                    <textarea name="deskripsi_komentar" class="form-control mb-10" rows="5" placeholder="Tulis Komentar disini" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter comment'"><?= set_value('deskripsi_komentar')?></textarea>
                                    <span><?= form_error('deskripsi_komentar')?></span>
                                    <div align="center">
			                            <?php echo $widget;?>
										<?php echo $script;?>
									</div>
                                </div>
                                <button type="submit" class="primary-btn submit_btn">Kirim Komentar</button>  
                            </form>
                        </div> 
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget author_widget">
                                <h3 class="widget_title">Penulis</h3>
                                <img src="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_kta ?>">
                                <h4><?php echo $result->nama_member ?></h4>
                                <p><?php echo $result->profesi_member ?></p>                            
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Artikel Populer</h3>
                                <?php $a=0; $b=5;
                                 foreach ($data->result() as $data){
                                 $a++;
                                 if ($a <= $b) {?>
                                <div class="media post_item">
                                    <img src="<?php echo base_url('assets/'); ?>img/<?php echo $data->foto_artikel ?>" width="160px" alt="post">
                                    <div class="media-body">
                                        <a href="<?php echo site_url('artikel_c/detail/'.$data->id_artikel) ?>"><h3><?php echo $data->judul_artikel ?></h3></a>
                                        <p><?php echo date('d F Y', strtotime($data ->tanggal_artikel)) ?></p>
                                    </div>
                                </div>
                                     <?php }} ?>
                                <div class="br"></div>
                            </aside> 
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
