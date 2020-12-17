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
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>promo_c">Promo</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>galeri_c">Galeri</a></li> 
                                <li class="nav-item active"><a class="nav-link" href="<?php echo site_url(); ?>artikel_c">Artikel</a></li> 
                                <li class="nav-item "><a class="nav-link" href="<?php echo site_url(); ?>survey_c">Survey</a></li> 
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
                        <h2>Artikel Kami</h2>
                        <div class="page_link">
                            <a href="<?php echo base_url(); ?>beranda_c">Beranda</a>
                            <a href="<?php echo base_url(); ?>artikel_c">Artikel</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Blog Area =================-->
        <section class="blog_area p_120">
            <div class="container">
                <div class="main_title">
                    <h2>All Our Articles</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                </div> 
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog_left_sidebar">
                            <?php foreach ($result->result() as $result) : ?>
                            <article class="row blog_item">
                               <div class="col-md-3">
                                   <div class="blog_info text-right">
                                        <ul class="blog_meta list">
                                        <li><a href="#"><?php echo $result->nama_member ?><i class="lnr lnr-user"></i></a></li>
                                        <li><a href="#"><?php echo $result->tanggal_artikel ?><i class="lnr lnr-calendar-full"></i></a></li>
                                        <li><a href="#"><?php echo $result->artikel_dilihat ?> Dilihat<i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#">0<?php echo $result->jml_komentar?> Komentar<i class="lnr lnr-bubble"></i></a></li>
                                        </ul>
                                    </div>
                               </div>
                                <div class="col-md-9">
                                    <div class="blog_post">
                                        <img src="<?php echo base_url('assets/'); ?>img/<?php echo $result->foto_artikel ?>">
                                        <div class="blog_details">
                                            <a href="<?php echo site_url('artikel_c/detail/'.$result->id_artikel) ?>"><h2><?php echo $result->judul_artikel ?></h2></a>
                                            <p><?php echo substr($result->deskripsi_artikel, 0, 100). " ..... " ?></p>
                                            <a href="<?php echo site_url('artikel_c/detail/'.$result->id_artikel) ?>" class="white_bg_btn">Tampilkan Lebih</a>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Artikel Populer</h3>
                                 <?php $a=0; $b=3;
                                 foreach ($data->result() as $data){
                                 $a++;
                                 if ($a <= $b) {?>
                                <div class="media post_item">
                                    <img src="<?php echo base_url('assets/'); ?>img/<?php echo $data->foto_artikel ?>" width="200px" alt="post">
                                    <div class="media-body">
                                        <a href="<?php echo site_url('artikel_c/detail/'.$data->id_artikel) ?>"><h3><?php echo $data->judul_artikel ?></h3></a>
                                        <p><?php echo $data->tanggal_artikel ?></p>
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