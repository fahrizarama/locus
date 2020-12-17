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
                                <li class="nav-item active"><a class="nav-link" href="<?php echo site_url(); ?>beranda_c">Beranda</a></li> 
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
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>survey_c">Survey</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>recruitmen_c">Recruitment</a></li>
                          </ul>
                      </div> 
                  </div>
              </nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->


    <section class="home_banner_area">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">


      <div class="carousel-inner" role="listbox">
        <!-- Slide 1 -->
        <?php foreach ($slider->result() as $result):?>
          <?php 
          $slider1 = $result->id_slider == 3;
          if (!$slider1) {?>
        <div class="carousel-item">
          <div class="site-blocks-cover overlay" style="background-image: url(<?php echo base_url('assets/')?>img/<?php echo $result->foto_slider ?>" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
              <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">
                              
                  <div class="row justify-content-center mb-4">
                    <div class="col-md-8 text-center">
                      <h1>LOCUS Id Connection Lounge<span class="typed-words"></span></h1>
                      <div style="padding-top: 50px;"><a href="<#" class="btn btn-warning btn-md" >KONTAK KAMI</a></div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } else{?>
        <div class="carousel-item active">
          <div class="site-blocks-cover overlay" style="background-image: url(<?php echo base_url('assets/')?>img/<?php echo $result->foto_slider ?>" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
              <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">
                              
                  <div class="row justify-content-center mb-4">
                    <div class="col-md-8 text-center">
                      <h1>LOCUS Id <span class="typed-words"></span></h1>
                      <div style="padding-top: 50px;"><a href="#" class="btn btn-warning btn-md" >KONTAK KAMI</a></div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } endforeach; ?>
      </div> 

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon icofont-simple-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon icofont-simple-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>

  </section>
        <!--================Courses Area =================-->
        <section class="courses_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>P R O M O</h2>
        			<!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p> -->
        		</div>
        		<div class="row courses_inner promo_1">
        			<div class="col-lg-12">
						<div class="grid_inner">
            <?php if(COUNT($promo_beranda->result()) > 0 ) { ?>
             <?php foreach ($promo_beranda->result() as $value) : ?>                 
							<div class="grid_item wd22">
								<div class="courses_item">
									<img src="<?php echo base_url('assets/'); ?>img/<?php echo $value->poster_promo ?>" alt="">
									<div class="hover_text">
										<a class="cat" href="<?php echo site_url('promo_c/detail_promo/'.$value->id_promo) ?>">Detail<i></i></a>
										<h4><?= $value->judul_promo ?></h4>
                    <ul class="list">
                      <li><a><i class="lnr lnr-calendar-full"></i> <?= date ('d F Y', strtotime($value->tanggal_mulai))?> - <?= date ('d F Y', strtotime($value->tanggal_akhir))?></a></li>
                    </ul>
								  </div>
								</div>
             </div>
             <?php endforeach; ?>
            <?php } else { ?>
              <?php foreach ($promo_beranda_kosong->result() as $value) : ?>                 
							<div class="grid_item wd22">
								<div class="courses_item">
									<img src="<?php echo base_url('assets/'); ?>img/<?php echo $value->poster_promo ?>" alt="">
									<div class="hover_text">
										<a class="cat" href="<?php echo site_url('promo_c/detail_promo/'.$value->id_promo) ?>">Detail<i></i></a>
										<h4><?= $value->judul_promo ?></h4>
                    <ul class="list">
                      <li><a><i class="lnr lnr-calendar-full"></i> <?= date ('d F Y', strtotime($value->tanggal_mulai))?> - <?= date ('d F Y', strtotime($value->tanggal_akhir))?></a></li>
                    </ul>
								  </div>
								</div>
             </div>
             <?php endforeach; ?>
            <?php } ?>
						</div>
        			</div>
                </div>

                </div>
        	</div>
        </section>

        <section class="latest_blog_area p_120">
            <div class="container">
                <div class="main_title">
                    <h2>E V E N T</h2>
                    <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p> -->
                </div>        
                <div class="row latest_blog_inner">
                <?php if(COUNT($event_beranda->result()) > 0 ) { ?>
                    <?php foreach ($event_beranda->result() as $result) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="l_blog_item">
                            <img class="img-fluid" src="<?php echo base_url('assets/'); ?>img/<?php echo $result->poster_event ?>" alt=" ">
                            <a class="date" href="<?php echo site_url('Event_c/detail/'.$result->id_event) ?>"><i class="lnr lnr-calendar-full" style="padding-right: 7px;"></i><?php echo date('d F Y', strtotime($result ->tanggal_event)) ?> &nbsp;&nbsp;|  <i class="lnr lnr-clock" style="padding-right: 7px; padding-left: 7px;"></i><?php echo $result->jam_event ?><h4><?php echo $result->judul_event ?></h4></a>
                        </div>
                    </div>
                 <?php } ?>
                <?php } else { ?>
                  <?php foreach ($event_beranda_kosong->result() as $result) { ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="l_blog_item">
                            <img class="img-fluid" src="<?php echo base_url('assets/'); ?>img/<?php echo $result->poster_event ?>" alt=" ">
                            <a class="date" href="<?php echo site_url('Event_c/detail/'.$result->id_event) ?>"><i class="lnr lnr-calendar-full" style="padding-right: 7px;"></i><?php echo date('d F Y', strtotime($result ->tanggal_event)) ?> &nbsp;&nbsp;|  <i class="lnr lnr-clock" style="padding-right: 7px; padding-left: 7px;"></i><?php echo $result->jam_event ?><h4><?php echo $result->judul_event ?></h4></a>
                        </div>
                    </div>
                    <?php } ?>
                <?php } ?>            
                </div>
            </div>
        </section>


  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>




  <style>
            .promo_1 {
                    margin-left: -65px;
                  }
            .wd22 {
                 width: 380px;
                 
                 padding-left: 40px;
                 float: left;
                 object-fit: cover;
                margin-bottom: 30px; }

                .img {
                  width: 500px;
                  height: 200px;
                  object-fit: cover;
                }

                @media screen and (min-width: 400px) {
                    .promo_1 {
                    margin-left: -35px;
                  }
                }

                /* DESKTOP */
                @media screen and (min-width: 992px) {
                    .promo_1 {
                    margin-left: -30px;
                  }
                }
        </style>


  