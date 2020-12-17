        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                      <!-- Brand and toggle get grouped for better mobile display -->
                      <a class="navbar-brand logo_h" href="<?php echo site_url(); ?>komunitas_c"><img src="<?php echo base_url(); ?>assets/img/locus-logo.png" alt=""></a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <!-- Collect the nav links, forms, and other content for toggling -->
                      <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                          <ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>komunitas_c">Beranda</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url().'artikel_c/artikel/'.$this->session->userdata('id_member'); ?>">Artikel</a></li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Daftar Anggota</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>komunitas_c/anggota">Semua Anggota</a></li>
                                        <?php foreach($members as $member) { ?>
                                          <li class="nav-item"><a class="nav-link" href="<?php echo site_url().'komunitas_c/anggota/'.$member->id_kategori; ?>"><?= $member->kategori_member ?></a></li>
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


    <section class="home_banner_area">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">


      <div class="carousel-inner" role="listbox">
        <!-- Slide 1 -->
        <?php foreach ($slider->result() as $result):?>
          <?php 
          $slider1 = $result->id_slider == 1;
          if (!$slider1) {?>
        <div class="carousel-item">
          <div class="site-blocks-cover overlay" style="background-image: url(<?php echo base_url('assets/')?>img/<?php echo $result->foto_slider ?>" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
              <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-12" data-aos="fade-up" data-aos-delay="400">
                              
                  <div class="row justify-content-center mb-4">
                    <div class="col-md-8 text-center">
                      <h1>Selamat Datang, <?= $this->session->userdata('nama_member'); ?><span class="typed-words"></span></h1>
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
                      <h1>Selamat Datang, <span class="typed-words"></span></h1>
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

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>


  