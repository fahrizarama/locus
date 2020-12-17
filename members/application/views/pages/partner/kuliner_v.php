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
                                <li class="nav-item submenu dropdown active">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Merchant Partner</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>merchant_c/kuliner">Kuliner</a>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>merchant_c/it">IT</a></li>
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>merchant_c/legal">Legal</a></li>
                                    </ul>
                                </li> 
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>promo_c">Promo</a></li>
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
                        <h2>Merchant Partner Kami</h2>
                        <div class="page_link">
                            <a href="<?php echo site_url('Beranda_c') ?>">Beranda</a>
                            <a href="<?php echo site_url('merchant_c/kuliner') ?>">Merchant Partner Kuliner</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

        <!--================Kategori Area =================-->
        <section class="team_area p_120">
            <div class="container">
                <div class="main_title">
                    <h2>Kuliner Partner</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                </div>
                <div class="row team_inner">
                    <?php $a=0; $b=100; 
                    foreach ($kuliner_find->result() as $result) { 
                    $a++; 
                    if ($a <= $b) { ?>
                    <div class="col-lg-3 col-sm-6">
                        <div class="team_item">
                            <div class="team_img">
                                <img class="rounded-circle" src="<?php echo base_url('assets/'); ?>img/<?php echo $result->logo_partner ?>" alt="">
                                <div class="hover">
                                </div>
                            </div>
                            <div class="team_name">
                                <a href="<?php echo site_url('Merchant_c/detail/'.$result->id_partner) ?>"><h4><?php echo $result->nama_partner ?></h4></a>
                                <p><?php echo substr($result->deskripsi_partner, 0, 100). " ..... " ?></p>
                            </div>
                        </div>
                    </div>
                <?php } } ?>
                </div>
                <div class="clearfix"> </div>
            </div>
        </section>
        <!--================End Kategori Area =================-->