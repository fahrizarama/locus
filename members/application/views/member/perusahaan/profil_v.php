        <!--================Header Menu Area =================-->
        <header class="header_area">
            <div class="main_menu">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                      <!-- Brand and toggle get grouped for better mobile display -->
                      <a class="navbar-brand logo_h" href="<?php echo site_url(); ?>perusahaan_c"><img src="<?php echo base_url(); ?>assets/img/locus-logo.png" alt=""></a>
                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                      </button>
                      <!-- Collect the nav links, forms, and other content for toggling -->
                      <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                          <ul class="nav navbar-nav menu_nav ml-auto">
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>perusahaan_c">Beranda</a></li>
                                <li class="nav-item"><a class="nav-link" href="<?php echo site_url().'artikel_c/artikel/'.$this->session->userdata('id_member'); ?>">Artikel</a></li>
                                <li class="nav-item submenu dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Daftar Anggota</a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="<?php echo site_url(); ?>perusahaan_c/anggota">Semua Anggota</a></li>
                                        <?php foreach($members as $member) { ?>
                                          <li class="nav-item"><a class="nav-link" href="<?php echo site_url().'perusahaan_c/anggota/'.$member->id_kategori; ?>"><?= $member->kategori_member ?></a></li>
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
						<h2>Profil Kami</h2>
						<div class="page_link">
							<a href="<?php echo base_url(); ?>beranda_c">Beranda</a>
							<a href="<?php echo base_url(); ?>profil_c">Profil</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End Home Banner Area =================-->

<!--================About Area =================-->
        <section class="about_area p_120">
        	<div class="container">
			<?php foreach ($profil->result() as $value) : ?>
				<?php if($value->id_member != $this->session->userdata('id_member')) { 
                            
				} else { ?>
        		<div class="main_title">
                    
        		</div>
        		<div class="row about_inner">
        			<div class="col-lg-6">
						<div class="accordion" id="accordionExample">
							<div class="card">
								<div class="card-header" id="headingOne">
									<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									Data Diri 
									<i class="lnr lnr-chevron-down"></i>
									<i class="lnr lnr-chevron-up"></i>
									</button>
								</div>

								<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
									<div class="card-body">
									<b>Nama &nbsp&nbsp:</b> <?= $value->nama_member?><br>
									<b>Profesi :</b> <?= $value->profesi_member?>
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header" id="headingTwo">
									<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
									Privasi
									<i class="lnr lnr-chevron-down"></i>
									<i class="lnr lnr-chevron-up"></i>
									</button>
								</div>
								<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
									<div class="card-body">
									<b>Username :</b> <?= $value->username?><br/>
									<b>Password :</b> *********************
									</div>
								</div>
							</div>
						</div>
        			</div>
        			<div class="col-lg-6">
        				<div class="video_area" id="video">
							<img class="img-fluid" src="<?php echo base_url('assets/'); ?>img/<?php echo $value->foto_kta ?>" alt="">
						</div>
        			</div>
        		</div>
        		<div class="about_details" align="justify">
					<button type="button" class="btn btn-warning btn-xs" style="margin: 1px" onclick="edit_member('<?= $this->session->userdata('id_member'); ?>')">
                        <i class="fa fa-edit"> Edit</i>
                	</button>
        		</div>
				<?php } ?>
        	</div>
        <?php  endforeach; ?>
        </section>
		<div id="modalresult" class="modal fade" tabindex="-1"></div>

<script>
    function edit_member(id) {
        $.ajax({
            url: '<?= base_url('perusahaan_c/modal_edit_member') ?>',
            method: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                if (response.RESULT == 'OK') {
                    $('#modalresult').html(response.HTML);
                    $('#modalresult').modal('show');
                } else {
                    swal({
                        title: response.MESSAGE,
                        type: 'error'
                    });
                }
            }
        }).fail(function() {
            swal({
                title: 'Terjadi kesalahan',
                type: 'error'
            });
        });
    }
</script>
        <!--================End About Area =================