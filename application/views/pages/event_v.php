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
                                <li class="nav-item active"><a class="nav-link" href="<?php echo site_url(); ?>event_c">Event</a></li>
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
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>survey_c">Survey</a></li>
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
						<h2>Event Kami</h2>
						<div class="page_link">
							<a href="<?php echo base_url(); ?>beranda_c">Beranda</a>
							<a href="<?php echo base_url(); ?>event_c">Event</a>
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
                    <h2>Event Hari Ini</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                </div>        
                <div class="row latest_blog_inner">
                    <?php $a=0; $b=6; 
                    foreach ($event->result() as $result) { 
                      $a++; 
                      if ($a <= $b) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="l_blog_item">
                            <img class="img-fluid" src="<?php echo base_url('assets/'); ?>img/<?php echo $result->poster_event ?>" alt=" ">
                            <a class="date" href="<?php echo site_url('Event_c/detail/'.$result->id_event) ?>"><i class="lnr lnr-calendar-full" style="padding-right: 7px;"></i><?php echo date('d F Y', strtotime($result ->tanggal_event)) ?> &nbsp;&nbsp;|  <i class="lnr lnr-clock" style="padding-right: 7px; padding-left: 7px;"></i><?php echo $result->jam_event ?><h4><?php echo $result->judul_event ?></h4></a>
                        </div>
                    </div>
                 <?php } } ?>              
                </div>
                <br></break>
                <br></break>
                <div class="main_title">
                    <h2>Event Mendatang</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                </div>        
                <div class="row latest_blog_inner">
                    <?php $a=0; $b=6; 
                    foreach ($event2->result() as $result) { 
                      $a++; 
                      if ($a <= $b) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="l_blog_item">
                            <img class="img-fluid" src="<?php echo base_url('assets/'); ?>img/<?php echo $result->poster_event ?>" alt=" ">
                            <a class="date" href="<?php echo site_url('Event_c/detail/'.$result->id_event) ?>"><i class="lnr lnr-calendar-full" style="padding-right: 7px;"></i><?php echo date('d F Y', strtotime($result ->tanggal_event)) ?> &nbsp;&nbsp;|  <i class="lnr lnr-clock" style="padding-right: 7px; padding-left: 7px;"></i><?php echo $result->jam_event ?><h4><?php echo $result->judul_event ?></h4></a>
                        </div>
                    </div>
                 <?php } } ?>              
                </div>
                <br></break>
                <br></break>
                <div class="main_title">
                    <h2>Event Sebelumnya</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                </div>        
                <div class="row latest_blog_inner">
                    <?php $a=0; $b=6; 
                    foreach ($event3->result() as $result) { 
                      $a++; 
                      if ($a <= $b) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="l_blog_item">
                            <img class="img-fluid" src="<?php echo base_url('assets/'); ?>img/<?php echo $result->poster_event ?>" alt=" ">
                            <a class="date" href="<?php echo site_url('Event_c/detail/'.$result->id_event) ?>"><i class="lnr lnr-calendar-full" style="padding-right: 7px;"></i><?php echo date('d F Y', strtotime($result ->tanggal_event)) ?> &nbsp;&nbsp;|  <i class="lnr lnr-clock" style="padding-right: 7px; padding-left: 7px;"></i><?php echo $result->jam_event ?><h4><?php echo $result->judul_event ?></h4></a>
                        </div>
                    </div>
                 <?php } } ?>              
                </div>
            </div>
        </section>
        <!--================End Courses Area =================-->