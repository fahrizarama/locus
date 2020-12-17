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
                                        <?php foreach ($jenis_partner as $jenis) { ?>
                                            <li class="nav-item"><a class="nav-link" href="<?php echo site_url() . 'merchant_c/partner/' . $jenis->id_jenis_partner; ?>"><?= $jenis->nama_jenis_partner ?></a></li>
                                        <?php } ?>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>produk_c">Daftar Produk</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>promo_c">Promo</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>galeri_c">Galeri</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>artikel_c">Artikel</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>survey_c">Survey</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>recruitmen_c">Recruitment</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Detail Produk</h2>
                        <div class="page_link">
                            <a href="<?php echo site_url('beranda_c') ?>">Beranda</a>
                            <a href="#">Detail Produk</a>
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
                            <div class="col-lg-4">
                                <div class="feature-img" align="center">
                                    <img class="img-fluid rounded-circle" src="<?php echo base_url('assets/foto_produk/'); ?><?php echo $detail->foto ?>" alt="">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 blog_details">
                                <h2><?= $detail->nama_produk ?></h2>
                                <p class="excert" align="justify">
                                    <strong> Rp. <?= number_format($detail->harga_publish, 0, ".", ".") ?> </strong>
                                    <?= $detail->deskripsi ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->