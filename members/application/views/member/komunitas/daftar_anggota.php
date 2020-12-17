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
        
        <!--================Home Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
                <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
                <div class="container">
                    <div class="banner_content text-center">
                        <h2>Daftar Anggota Kami</h2>
                        <div class="page_link">
                            <a href="<?php echo base_url(); ?>komunitas_c">Beranda</a>
                            <a href="<?php echo base_url(); ?>komunitas_c/anggota">Daftar Anggota</a>
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
                    <h2>All Our Members</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris.</p>
                </div>        
                <div class="row latest_blog_inner">
                    <table datatable="ng" class="table table-hover table-bordered"> 
                        <thead class="thead-dark">
                            <tr>
                                <th class="head-text">#</th>
                                <th class="head-text">Nama Member</th>
                                <!-- <th class="head-text">Profesi Member</th> -->
                                <!-- <th class="head-text">Password</th> -->
                                <th class="head-text">Kategori Member</th>
                                <th class="head-text">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($result->result() as $row):?>
                            <tr>
                                <td><?= $no++?></td>
                                <td><?= $row->nama_member?></td>
                                <!-- <td><?= $row->profesi_member?></td> -->
                                <!-- <td><?= $row->view_password?></td> -->
                                <td><?= $row->kategori_member?></td>
                                <td>
                                <button type="button" class="btn btn-primary btn-xs" >
                                <span> Detail</span>
                                </button>
                            
                            
                            </td>
                            </tr>
                            <?php  endforeach;?>
                        </tbody>
                    </table>    
                </div>
            </div>
        </section>
        <!--================End Courses Area =================-->

        