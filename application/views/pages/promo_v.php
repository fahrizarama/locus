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
                                <li class="nav-item active"><a class="nav-link" href="<?php echo site_url(); ?>promo_c">Promo</a></li>
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
						<h2>Promo Kami</h2>
						<div class="page_link">
							<a href="<?php echo base_url(); ?>beranda_c">Beranda</a>
							<a href="<?php echo base_url(); ?>promo_c">Promo</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->
        
        <!--================Courses Area =================-->
        <section class="courses_area p_120">
        	<div class="container">
        		<div class="main_title">
        			<h2>Promo Hari Ini</h2>
        			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
        		</div>
        		<div class="row courses_inner">
        			<div class="col-lg-12">
						<div class="grid_inner">
                            <?php foreach ($promo->result() as $value) : ?>
                                
							<div class="grid_item wd22">
								<div class="courses_item">
									<img src="<?php echo base_url('assets/'); ?>img/<?php echo $value->poster_promo ?>" alt="">
									<div class="hover_text">
										<a class="cat" href="<?php echo site_url('promo_c/detail_promo/'.$value->id_promo) ?>">Detail<i></i></a>
										<h4><?= $value->judul_promo ?></h4>
                                        <ul class="list">
                                            <li><a href="#"><i class="lnr lnr-calendar-full"></i> <?= date ('d F Y', strtotime($value->tanggal_mulai))?></a></li>
                                        </ul>
									</div>
								</div>
                            </div>

                            <?php endforeach; ?> 
						</div>
        			</div>
                </div>
                <tr></tr>
                <br></break>
                <br></break>
        		<div class="main_title">
        			<h2>Promo Mendatang</h2>
        			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
        		</div>
        		<div class="row courses_inner">
        			<div class="col-lg-12">
						<div class="grid_inner">
                            <?php foreach ($promo2->result() as $value) : ?>
                                
							<div class="grid_item wd22">
								<div class="courses_item">
									<img src="<?php echo base_url('assets/'); ?>img/<?php echo $value->poster_promo ?>" alt="">
									<div class="hover_text">
										<a class="cat" href="<?php echo site_url('promo_c/detail_promo/'.$value->id_promo) ?>">Detail<i></i></a>
										<h4><?= $value->judul_promo ?></h4>
                                        <ul class="list">
                                            <li><a href="#"><i class="lnr lnr-calendar-full"></i> <?= date ('d F Y', strtotime($value->tanggal_mulai))?></a></li>
                                        </ul>
									</div>
								</div>
                            </div>

                            <?php endforeach; ?> 
						</div>
        			</div>
                </div>
                <tr></tr>
                <br></break>
                <br></break>
                <div class="main_title">
        			<h2>Promo Selesai</h2>
        			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
        		</div>
        		<div class="row courses_inner promo_1">
        			<div class="col-lg-12">
						<div class="grid_inner">
                            <?php foreach ($promo3->result() as $value) : ?>
                                
							<div class="grid_item wd22">
								<div class="courses_item">
									<img src="<?php echo base_url('assets/'); ?>img/<?php echo $value->poster_promo ?>" alt="">
									<div class="hover_text">
										<a class="cat" href="<?php echo site_url('promo_c/detail_promo/'.$value->id_promo) ?>">Detail<i></i></a>
										<h4><?= $value->judul_promo ?></h4>
                                        <ul class="list">
                                            <li><a href="#"><i class="lnr lnr-calendar-full"></i> <?= date ('d F Y', strtotime($value->tanggal_mulai))?></a></li>
                                        </ul>
									</div>
								</div>
                            </div>

                            <?php endforeach; ?> 
						</div>
        			</div>
                </div>
                <tr></tr>
                <br></break>
                <br></break>

                </div>
        	</div>
        </section>


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
        <!--================End Courses Area =================
