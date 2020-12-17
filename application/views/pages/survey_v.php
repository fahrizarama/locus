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
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>artikel_c">Artikel</a></li> 
                                <li class="nav-item active"><a class="nav-link" href="<?php echo site_url(); ?>survey_c">Survey</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>recruitmen_c">Recruitment</a></li>
                            </ul>
                        </div> 
                    </div>
                </nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->	

		<!--================Home Banner Area =================-->
        <section class="home_banner_area blog_banner">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="blog_b_text text-center">
						<h2>Survey Pengunjung</h2>
						<p>Ayo bantu kami meninggkatkan kualitas produk dan layanan kami melalui survey. Setiap tanggapan yang Anda berikan akan menunjang kami memberikan pelayanan yang lebih baik</p>
						<!-- <a class="main_btn" href="#">View More</a> -->
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

         <!--================Blog Area =================-->
        <section class="blog_area single-post-area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <br> <br>
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget author_widget">
                                <h4>Ayo isi survey Anda!</h4>
                                <br>
                                <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits detractors.</p>
                            </aside>
                        </div>
                    </div>
                    <div class="col-lg-8 ">
                        <div class="comment-form">
                            <h4>Tinggalkan Tanggapan</h4>
                            <form method="post" action="">
                                <?= validation_errors() ? "<script>alert('Kirim Survey Gagal!!. Silahkan Ulangi Kembali'); </script>" : null ?>
                                <div class="form-group form-inline">
                                  <div class="form-group col-lg-6 col-md-6 name has-error">
                                    <input name="nama" type="text" class="form-control" value="<?= set_value('nama')?>" placeholder="Nama" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                                    <span><?= form_error('nama') ?></span>
                                  </div>
                                  <div class="form-group col-lg-6 col-md-6 email has-error">
                                    <input name="email" type="email" class="form-control" value="<?= set_value('email')?>" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                                    <span><?= form_error('email') ?></span>
                                  </div>                                        
                                </div>
                                <div class="form-group has-error">
                                    <input name="no_tlp" type="text" class="form-control" value="<?= set_value('no_tlp')?>" placeholder="No telepon" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter phone number'">
                                    <span><?= form_error('no_tlp') ?></span>
                                </div>
                                <div class="form-group has-error">
                                    <textarea name="deskripsi_survey" class="form-control mb-10" rows="5" placeholder="Pesan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter comment'"><?= set_value('deskripsi_survey')?></textarea>
                                    <span><?= form_error('deskripsi_survey') ?></span>
                                    <div align="center">
			                            <?php echo $widget;?>
										<?php echo $script;?>
									</div>
                                </div>
                                <button type="submit" class="primary-btn  submit_btn">Kirim Survey</button>  
                            </form>
                        </div>
                    </div>
            
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->