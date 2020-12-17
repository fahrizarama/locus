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
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Merchant Partner</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>merchant_c/kuliner">Kuliner</a>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>merchant_c/it">IT</a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>merchant_c/legal">Legal</a></li>
                                    </ul>
                                </li> 
                                <li class="nav-item active"><a class="nav-link" href="<?php echo site_url(); ?>promo_c">Promo</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>galeri_c">Galeri</a></li> 
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>artikel_c">Artikel</a></li> 
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>survey_c">Survey</a></li> 
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
                        <h2>Detail Promo</h2>
                        <div class="page_link">
                            <a href="<?php echo base_url(); ?>beranda_c">Beranda</a>
                            <a href="<?php echo base_url(); ?>promo_c">Promo</a>
                            <a href="#">Detail Promo</a>
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
                    <div class="col-lg-12 posts-list">
                        <div class="single-post row">
                            <div class="col-lg-3">
                                <div class="feature-img" align="center">
                                    <img class="img-fluid" src="<?php echo base_url('assets/'); ?>img/<?= $detail->poster_promo ?>" alt="">
                                </div>									
                            </div>
                            <div class="col-lg-2  col-md-2">
                                <div class="blog_info text-left" style="padding-top: 15px;">
                                    <ul class="blog_meta_right list">
                                        <li><a href="#"><i class="lnr lnr-calendar-full"></i>Mulai <?= $detail->tanggal_mulai ?> </a></li>
                                        <li><a href="#"><i class="lnr lnr-calendar-full"></i>Akhir <?= $detail->tanggal_akhir ?></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-7 blog_details">
                                <h2><?= $detail->judul_promo ?></h2>
                                <p class="excert" align="justify">
                                   <?= $detail->deskripsi_promo.$detail->deskripsi_promo ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================