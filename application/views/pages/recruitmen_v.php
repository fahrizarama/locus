<style>
  .has-error span {
    color: #e74a3b;
    font-size: 13px;
    padding-left: 10px;
  }

  .tab {
    display: none;
  }
</style>
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
            <li class="nav-item active"><a class="nav-link" href="#recruit-form">Recruitment</a></li>

          </ul>
        </div>
      </div>
    </nav>
  </div>
</header>
<!--================Header Menu Area =================-->

<!--================Home Banner Area =================-->
<section class="home_banner_area blog_banner">
  <div class="banner_inner d-flex align-items-center">
    <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
    <div class="container">
      <div class="blog_b_text text-center">
        <h2>Rekrutmen</h2>
        <p>Ayo menjadi salah satu bagian dari LOCUS ID</p>
        <!-- <a class="main_btn" href="#">View More</a> -->
      </div>
    </div>
  </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Blog Area =================-->
<section class="blog_area single-post-area p_120">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
        <br> <br>
        <div class="blog_right_sidebar">
          <aside class="single_sidebar_widget author_widget">
            <h4>Ayo isi form data diri anda!</h4>
            <br>
            <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits detractors.</p>
          </aside>
        </div>
      </div>
      <div class="col-lg-8 " id="recruit-form">
        <div id="regForm" class="comment-form">



          <form method="post" action="lamaran-kerja">

            <!-- FORM DATA DIRI -->
            <div id="data_recruit1">
              <h4>Form Data Diri</h4>
              <?= validation_errors() ? "<script>alert('Kirim Lamaran Gagal!!. Silahkan Periksa Kembali'); </script>" : null ?>
              <div class="form-group form-inline">
                <div class="form-group col-lg-6 col-md-6 name has-error">
                  <input name="nama_lengkap" type="text" class="form-control" value="<?= set_value('nama_lengkap') ?>" placeholder="Nama Lengkap" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                  <span><?= form_error('nama_lengkap') ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 email has-error">
                  <input name="email" type="text" class="form-control" value="<?= set_value('email') ?>" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
                  <span><?= form_error('email') ?></span>
                </div>
              </div>
              <div class="form-group form-inline has-error">
                <input name="tempat_tgl_lahir" type="text" class="form-control" value="<?= set_value('tempat_tgl_lahir') ?>" placeholder="Tempat, Tanggal Lahir ex ( Malang, 24 Juli 1991 )" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter here ex ( Malang, 24 Juli 1991 )'">
                <span><?= form_error('tempat_tgl_lahir') ?></span>
              </div>
              <div class="form-group form-inline">
                <div class="form-group col-lg-6 col-md-6 name has-error">
                  <select name="jenis_kelamin">
                    <option disabled selected style="display: none;">Jenis Kelamin</option>
                    <option value="Laki-laki" <?php echo  set_select('jenis_kelamin', 'Laki-laki'); ?>>Laki-laki</option>
                    <option value="Perempuan" <?php echo  set_select('jenis_kelamin', 'Perempuan'); ?>>Perempuan</option>
                  </select>
                  <span><?= form_error('jenis_kelamin') ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 has-error">
                  <select name="agama">
                    <option disabled selected style="display: none;">Agama</option>
                    <option value="Islam" <?php echo  set_select('agama', 'Islam'); ?>>Islam</option>
                    <option value="Kristen" <?php echo  set_select('agama', 'Kristen'); ?>>Kristen</option>
                    <option value="Hindu" <?php echo  set_select('agama', 'Hindu'); ?>>Hindu</option>
                    <option value="Katholik" <?php echo  set_select('agama', 'Katholik'); ?>>Katholik</option>
                    <option value="Budha" <?php echo  set_select('agama', 'Budha'); ?>>Budha</option>
                    <option value="Konghucu" <?php echo  set_select('agama', 'Konghucu'); ?>>Konghucu</option>
                  </select>
                  <span><?= form_error('agama') ?></span>
                </div>
              </div>
              <div class="form-group form-inline">
                <div class="form-group col-lg-6 col-md-6 name has-error">
                  <input name="telephone" type="text" class="form-control" value="<?= set_value('telephone') ?>" placeholder="Telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Telephone'">
                  <span><?= form_error('telephone') ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 email has-error">
                  <input name="NPWP" type="text" class="form-control" value="<?= set_value('npwp') ?>" placeholder="NPWP" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter NPWP'">
                  <span><?= form_error('npwp') ?></span>
                </div>
              </div>

              <div class="form-group form-inline has-error">
                <textarea name="alamat" class="form-control mb-10" rows="5" value="<?= set_value('alamat') ?>" placeholder="Alamat tempat tinggal" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter alamat '"></textarea>
                <span><?= form_error('alamat') ?></span>
              </div>
              <div class="form-group form-inline">
                <div class="form-group col-lg-6 col-md-6 name has-error">
                  <select name="status_rumah">
                    <option disabled selected style="display: none;">Status Rumah Tempat Tinggal</option>
                    <option value="Pribadi" <?php echo  set_select('status_rumah', 'Pribadi'); ?>>Pribadi</option>
                    <option value="Sewa" <?php echo  set_select('status_rumah', 'Sewa'); ?>>Sewa</option>
                    <option value="Orang tua" <?php echo  set_select('status_rumah', 'Orang tua'); ?>>Ikut Orang Tua</option>
                    <option value="Kost/numpang" <?php echo  set_select('status_rumah', 'Kost/numpang'); ?>>Kost/numpang</option>
                  </select>
                  <span><?= form_error('status_rumah') ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 has-error">
                  <select name="status_nikah">
                    <option disabled selected style="display: none;">Status perkawinan</option>
                    <option value="Menikah" <?php echo  set_select('status_nikah', 'Menikah'); ?>>Menikah</option>
                    <option value="Belum menikah" <?php echo  set_select('status_nikah', 'Belum menikah'); ?>>Belum Menikah</option>
                    <option value="Cerai" <?php echo  set_select('status_nikah', 'Cerai'); ?>>Cerai</option>
                  </select>
                  <span><?= form_error('status_nikah') ?></span>
                </div>
              </div>

              <div class="form-group form-inline">
                <div class="form-group col-lg-6 col-md-6 name has-error">
                  <input name="kebangsaan" type="text" class="form-control" value="<?= set_value('kebangsaan') ?>" placeholder="Kebangsaan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Kebangsaan'">
                  <span><?= form_error('kebangsaan') ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 email has-error">
                  <input name="suku" type="text" class="form-control" value="<?= set_value('suku') ?>" placeholder="Suku" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Suku'">
                  <span><?= form_error('suku') ?></span>
                </div>
              </div>

              <div class="form-group form-inline">
                <div class="form-group col-lg-6 col-md-6 name has-error">
                  <input name="tinggi_badan" type="text" class="form-control" value="<?= set_value('tinggi_badan') ?>" placeholder="Tinggi Badan (ex 170cm)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Tinggi Badan (ex 170cm)'">
                  <span><?= form_error('tinggi_badan') ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 email has-error">
                  <input name="berat_badan" type="text" class="form-control" value="<?= set_value('berat_badan') ?>" placeholder="Berat Badan(ex 50kg)" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Berat Badan (ex 50kg)'">
                  <span><?= form_error('berat_badan') ?></span>
                </div>
              </div>

              <div class="form-group form-inline">
                <div class="form-group col-lg-6 col-md-6 name has-error">
                  <select name="merokok">
                    <option disabled selected style="display: none;">Merokok</option>
                    <option value="Ya" <?php echo  set_select('merokok', 'Ya'); ?>>Ya</option>
                    <option value="Tidak" <?php echo  set_select('merokok', 'Tidak'); ?>>Tidak</option>
                    <option value="Kadang" <?php echo  set_select('merokok', 'Kadang'); ?>>Kadang</option>
                  </select>
                  <span><?= form_error('merokok') ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 has-error">
                  <select name="alergi">
                    <option disabled selected style="display: none;">Alergi</option>
                    <option value="Tidak ada" <?php echo  set_select('alergi', 'Tidak ada'); ?>>Tidak Ada</option>
                    <option value="Debu" <?php echo  set_select('alergi', 'Debu'); ?>>Debu</option>
                    <option value="Obat" <?php echo  set_select('alergi', 'Obat'); ?>>Obat</option>
                    <option value="Makanan" <?php echo  set_select('alergi', 'Makanan'); ?>>Makanan</option>
                  </select>
                  <span><?= form_error('alergi') ?></span>
                </div>
              </div>

              <div class="form-group form-inline">
                <div class="form-group col-lg-6 col-md-6 name has-error">
                  <select name="cacat_fisik">
                    <option disabled selected style="display: none;">Cacat Fisik</option>
                    <option value="Tidak ada" <?php echo  set_select('cacat_fisik', 'Tidak ada'); ?>>Tidak Ada</option>
                    <option value="Berkacamata" <?php echo  set_select('cacat_fisik', 'Berkacamata'); ?>>Berkacamata</option>
                    <option value="Mata rabun" <?php echo  set_select('cacat_fisik', 'Mata rabun'); ?>>Mata Rabun</option>
                    <option value="Buta warna" <?php echo  set_select('cacat_fisik', 'Buta warna'); ?>>Buta Warna</option>
                    <option value="Pendengaran" <?php echo  set_select('cacat_fisik', 'Pendengaran'); ?>>Pendengaran</option>
                    <option value="Jantung" <?php echo  set_select('cacat_fisik', 'Jantung'); ?>>Jantung</option>
                    <option value="Liver" <?php echo  set_select('cacat_fisik', 'Liver'); ?>>Liver</option>
                    <option value="Diabetes" <?php echo  set_select('cacat_fisik', 'Diabetes'); ?>>Diabetes</option>
                    <option value="Polio" <?php echo  set_select('cacat_fisik', 'Polio'); ?>>Polio</option>
                    <option value="Paru-paru" <?php echo  set_select('cacat_fisik', 'Paru-paru'); ?>>Paru-Paru</option>
                    <option value="Organ tubuh tidak lengkap" <?php echo  set_select('cacat_fisik', 'Organ tubuh tidak lengkap'); ?>>Organ Tubuh Tidak Lengkap</option>
                  </select>
                  <span><?= form_error('cacat_fisik') ?></span>
                </div>
                <div class="form-group col-lg-6 col-md-6 has-error">
                  <select name="sakit_periodik">
                    <option disabled selected style="display: none;">Sakit yang sering muncul</option>
                    <option value="Tidak ada" <?php echo  set_select('sakit_periodik', 'Tidak ada'); ?>>Tidak Ada</option>
                    <option value="Asma" <?php echo  set_select('sakit_periodik', 'Asma'); ?>>Asma</option>
                    <option value="Flu" <?php echo  set_select('sakit_periodik', 'Flu'); ?>>Flu</option>
                    <option value="Ayan" <?php echo  set_select('sakit_periodik', 'Ayan'); ?>>Ayan</option>
                  </select>
                  <span><?= form_error('sakit_periodik') ?></span>
                </div>
              </div>
              <br></break>
              <button onclick="next1()" data-toggle="tab" style="float: right;" type="button" class="primary-btn  submit_btn">Selanjutnya</button>
              <br></break>
            </div>

            <!-- FORM DATA RIAYAT GANGGUAN Kesehatan -->
            <div class="tab" id="data_recruit2">
              <h4>Form Data Riwayat Gangguan Kesehatan</h4>

              <div id="dynamic_field">
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmore[0][tahun]" type="text" value="<?= set_value('addmore[0][tahun]') ?>" id="datepicker3" class="form-control" placeholder="Tahun" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Tahun'">
                    <span><?= form_error('addmore[0][tahun]') ?></span>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email has-error">
                    <input name="addmore[0][lama_sakit]" type="text" value="<?= set_value('addmore[0][lama_sakit]') ?>" class="form-control" placeholder="Lama Sakit" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Lama Sakit'">
                    <span><?= form_error('addmore[0][lama_sakit]') ?></span>
                  </div>
                </div>
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmore[0][nama_penyakit]" value="<?= set_value('addmore[0][nama_penyakit]') ?>" type="text" class="form-control" placeholder="Nama Penyakit" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Nama Penyakit'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email has-error">
                    <input name="addmore[0][cara_perawatan]" value="<?= set_value('addmore[0][cara_perawatan]') ?>" type="text" class="form-control" placeholder="Cara Perawatan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Cara Perawatan'">
                  </div>
                </div>
                <div class="form-group form-inline has-error">
                  <input name="addmore[0][hasil_perawatan]" value="<?= set_value('addmore[0][hasil_perawatan]') ?>" type="text" class="form-control" placeholder="Hasil Perawatan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Hasil Perawatan'">
                </div>
              </div>
              <br></break>
              <button type="button" name="add" id="add" class="btn btn-success">(+) Tambah Form</button>
              <button onclick="prev2()" style="float: left;" type="button" class="primary-btn  submit_btn">Sebelumnya</button>
              <button onclick="next2()" data-toggle="tab" style="float: right;" type="button" class="primary-btn  submit_btn">Selanjutnya</button>
            </div>

            <!-- FORM DATA RIWAYAT PENDIDIKAN FORMAL -->
            <div class="tab" id="data_recruit3">
              <h4>Form Data Riwayat Pendidikan Formal</h4>

              <div id="dynamic_field2">
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmore2[0][jenjang_formal]" type="text" class="form-control" placeholder="Jenjang" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Jenjang'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email has-error">
                    <input name="addmore2[0][nama_lembaga_pendidikan_formal]" type="text" class="form-control" placeholder="Nama Lembaga Pendidikan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Nama Lembaga Pendidikan'">
                  </div>
                </div>
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmore2[0][tahun_awal_formal]" type="text" id="datepicker1" class="form-control" placeholder="Dari Tahun" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Dari Tahun'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email has-error">
                    <input name="addmore2[0][tahun_akhir_formal]" type="text" id="datepicker2" class="form-control" placeholder="Sampai Tahun" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Sampai Tahun'">
                  </div>
                </div>
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmore2[0][alamat_lembaga_formal]" type="text" class="form-control" placeholder="Alamat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Alamat'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 has-error">
                    <select name="addmore2[0][status_formal]">
                      <option disabled selected style="display: none;">Status</option>
                      <option value="Lulus">Lulus(L)</option>
                      <option value="Belum Lulus">Belum Lulus(BL)</option>
                      <option value="Drop Out">Drop Out(DO)</option>
                    </select>
                  </div>
                </div>
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmor6[0][referensi_prestasi]" type="text" class="form-control" placeholder="Prestasi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Prestasi'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email has-error">
                    <input name="addmor6[0][referensi_foto_prestasi]" type="file" class="form-control" placeholder="Foto_Prestasi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Foto Prestasi'">
                  </div>
                </div>
              </div>
              <br></break>
              <button type="button" name="add2" id="add2" class="btn btn-success">(+) Tambah Form</button>
              <button onclick="prev3()" style="float: left;" type="button" class="primary-btn  submit_btn">Sebelumnya</button>
              <button onclick="next3()" data-toggle="tab" style="float: right;" type="button" class="primary-btn  submit_btn">Selanjutnya</button>
            </div>

            <!-- FORM DATA RIWAYAT PENDIDIKAN NON FORMAL -->
            <div class="tab" id="data_recruit4">
              <h4>Form Data Riwayat Pendidikan Non Formal</h4>

              <div id="dynamic_field3">
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmore3[0][jenjang_non_formal]" type="text" class="form-control" placeholder="Jenjang" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Jenjang'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email has-error">
                    <input name="addmore3[0][nama_lembaga_pendidikan_non_formal]" type="text" class="form-control" placeholder="Nama Lembaga Pendidikan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Nama Lembaga Pendidikan'">
                  </div>
                </div>
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmore3[0][tahun_awal_non_formal]" type="text" id="datepicker4" class="form-control" placeholder="Dari Tahun" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Dari Tahun'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email has-error">
                    <input name="addmore3[0][tahun_akhir_non_formal]" type="text" id="datepicker5" class="form-control" placeholder="Sampai Tahun" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Sampai Tahun'">
                  </div>
                </div>
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmore3[0][alamat_lembaga_non_formal]" type="text" class="form-control" placeholder="Alamat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Alamat'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 has-error">
                    <select name="addmore3[0][status_non_formal]">
                      <option disabled selected>Status</option>
                      <option value="Lulus">Lulus(L)</option>
                      <option value="Belum Lulus">Belum Lulus(BL)</option>
                      <option value="Drop Out">Drop Out(DO)</option>
                    </select>
                  </div>
                </div>
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmor6[0][referensi_prestasi]" type="text" class="form-control" placeholder="Prestasi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Prestasi'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email has-error">
                    <input name="addmor6[0][referensi_foto_prestasi]" type="file" class="form-control" placeholder="Foto_Prestasi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Foto Prestasi'">
                  </div>
                </div>
              </div>
              <br></break>
              <button type="button" name="add3" id="add3" class="btn btn-success">(+) Tambah Form</button>
              <button onclick="prev4()" style="float: left;" type="button" class="primary-btn  submit_btn">Sebelumnya</button>
              <button onclick="next4()" style="float: right;" type="button" class="primary-btn  submit_btn">Selanjutnya</button>
            </div>

            <!-- FORM DATA PENGUASAAN -->
            <div class="tab" id="data_recruit5">
              <h4>Form Data Penguasaan Bahasa</h4>

              <div id="dynamic_field7">
                <div class="form-group form-inline has-error">
                  <input name="addmore7[0][bahasa_asing]" type="text" class="form-control" placeholder="Bahasa Asing" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pilih Bahasa'">
                </div>

                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <select name="addmore7[0][penguasaaan_lisan]">
                      <option disabled selected style="display: none;">Lisan</option>
                      <option value="Baik">Baik</option>
                      <option value="Sedang">Sedang</option>
                      <option value="Kurang">Kurang</option>
                      <option value="Tidak">Tidak</option>
                    </select>
                  </div>
                  <div class="form-group col-lg-6 col-md-6 has-error">
                    <select name="addmore7[0][penguasaaan_tulisan]">
                      <option disabled selected style="display: none;">Tulisan</option>
                      <option value="Baik">Baik</option>
                      <option value="Sedang">Sedang</option>
                      <option value="Kurang">Kurang</option>
                      <option value="Tidak">Tidak</option>
                    </select>
                  </div>
                </div>
              </div>
              <button type="button" name="add7" id="add7" class="btn btn-success mb-4">(+) Tambah Form</button>

              <h4>Form Data Penguasaan Komputer dan lainnya</h4>
              <div id="dynamic_field8">
                <div class="form-group form-inline has-error">
                  <input name="addmore8[0][penguasaan_komputer]" type="text" class="form-control" placeholder="Penguasaan Komputer" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pilih Penguasaan Komputer'">
                </div>
              </div>

              <br></break>
              <button type="button" name="add8" id="add8" class="btn btn-success">(+) Tambah Form</button>
              <button onclick="prev5()" style="float: left;" type="button" class="primary-btn  submit_btn">Sebelumnya</button>
              <button onclick="next5()" data-toggle="tab" style="float: right;" type="button" class="primary-btn  submit_btn">Selanjutnya</button>
            </div>

            <!-- FORM DATA PENGALAMAN ORGANISASI -->
            <div class="tab" id="data_recruit6">
              <h4>Form Data Pengalaman Organisasi</h4>

              <div id="dynamic_field4">
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmore4[0][tahun_awal_organisasi]" type="text" id="datepicker6" class="form-control" placeholder="Dari Tahun" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Dari Tahun'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email has-error">
                    <input name="addmore4[0][tahun_akhir_organisasi]" type="text" id="datepicker7" class="form-control" placeholder="Sampai Tahun" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Sampai Tahun'">
                  </div>
                </div>
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmore4[0][nama_organisasi]" type="text" class="form-control" placeholder="Nama Organisasi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Nama Organisasi'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email has-error">
                    <input name="addmore4[0][alamat_organisasi]" type="text" class="form-control" placeholder="Alamat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter  Alamat Organisasi'">
                  </div>
                </div>
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmore4[0][bidang_organisasi]" type="text" class="form-control" placeholder="Bidang Organisasi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Bidang Organisasi'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email has-error">
                    <input name="addmore4[0][posisi_organisasi]" type="text" class="form-control" placeholder="Posisi/tugas" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter  Posisi/Tugas'">
                  </div>
                </div>
              </div>
              <br></break>
              <button type="button" name="add4" id="add4" class="btn btn-success">(+) Tambah Form</button>
              <button onclick="prev6()" style="float: left;" type="button" class="primary-btn  submit_btn">Sebelumnya</button>
              <button onclick="next6()" style="float: right;" type="button" class="primary-btn  submit_btn">Selanjutnya</button>
            </div>

            <!-- FORM DATA RIWAYAT PEKERJAAN -->
            <div class="tab" id="data_recruit7">
              <h4>Form Data Riwayat Pekerjaan</h4>

              <div id="dynamic_field5">
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmore5[0][tahun_awal_pekerjaan]" type="text" id="datepicker8" class="form-control" placeholder="Dari Tahun" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Dari Tahun'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email has-error">
                    <input name="addmore5[0][tahun_akhir_pekerjaan]" type="text" id="datepicker9" class="form-control" placeholder="Sampai Tahun" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Sampai Tahun'">
                  </div>
                </div>
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmore5[0][nama_instansi]" type="text" class="form-control" placeholder="Nama Instansi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Nama Instansi'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email has-error">
                    <input name="addmore5[0][alamat_instansi]" type="text" class="form-control" placeholder="Alamat Instansi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter  Alamat Instansi'">
                  </div>
                </div>
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmore5[0][riwayat_jabatan]" type="text" class="form-control" placeholder="Jabatan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Jabatan'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email has-error">
                    <input name="addmore5[0][riwayat_tugas]" type="text" class="form-control" placeholder="Tugas/Pengalaman" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Tugas/Pengalaman'">
                  </div>
                </div>
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmore5[0][alasan_berhenti]" type="text" class="form-control" placeholder="Alasan Berhenti" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Alasan Berhenti'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email has-error">
                    <input name="addmore5[0][total_penghasilan_sebelumnya]" type="text" class="form-control" placeholder="Total Penghasilan Sebelumnya" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Total Penghasilan'">
                  </div>
                </div>
              </div>
              <br></break>
              <button type="button" name="add5" id="add5" class="btn btn-success">(+) Tambah Form</button>
              <button onclick="prev7()" style="float: left;" type="button" class="primary-btn  submit_btn">Sebelumnya</button>
              <button onclick="next7()" style="float: right;" type="button" class="primary-btn  submit_btn">Selanjutnya</button>
            </div>

            <!-- FORM DATA REFERENSI -->
            <div class="tab" id="data_recruit8">
              <h4>Form Data Referensi(Berhubungan dengan Pekerjaan)</h4>

              <div id="dynamic_field6">
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmor6[0][referensi_nama]" type="text" class="form-control" placeholder="Nama" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Nama'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email has-error">
                    <input name="addmor6[0][referensi_alamat]" type="text" class="form-control" placeholder="Alamat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Alamat'">
                  </div>
                </div>
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmor6[0][referensi_telp]" type="text" class="form-control" placeholder="Nama Telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Nama Telephone'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email has-error">
                    <input name="addmor6[0][referensi_alamat_pekerjaan]" type="text" class="form-control" placeholder="Alamat Pekerjaan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter  Pekerjaan'">
                  </div>
                </div>
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmor6[0][referensi_jabatan]" type="text" class="form-control" placeholder="Jabatan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Jabatan'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email has-error">
                    <input name="addmor6[0][referensi_hubungan]" type="text" class="form-control" placeholder="Hubungan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Hubungan'">
                  </div>
                </div>
                <div class="form-group form-inline">
                  <div class="form-group col-lg-6 col-md-6 name has-error">
                    <input name="addmor6[0][referensi_prestasi]" type="text" class="form-control" placeholder="Prestasi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Prestasi'">
                  </div>
                  <div class="form-group col-lg-6 col-md-6 email has-error">
                    <input name="addmor6[0][referensi_foto_prestasi]" type="file" class="form-control" placeholder="Foto_Prestasi" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Foto Prestasi'">
                  </div>
                </div>
              </div>
              <br></break>
              <button type="button" name="add6" id="add6" class="btn btn-success">(+) Tambah Form</button>
              <button onclick="prev8()" style="float: left;" type="button" class="primary-btn  submit_btn">Sebelumnya</button>
              <button onclick="next8()" style="float: right;" type="button" class="primary-btn  submit_btn">Selanjutnya</button>
            </div>

            <!-- FORM DATA KONTAK DARURAT -->
            <div class="tab" id="data_recruit9">
              <h4>Form Data Kontak Apabila Keadaan Darurat</h4>

              <div class="form-group form-inline">
                <div class="form-group col-lg-6 col-md-6 name has-error">
                  <input name="nama_kontak_darurat" type="text" class="form-control" placeholder="Nama" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Nama'">
                </div>
                <div class="form-group col-lg-6 col-md-6 email has-error">
                  <input name="alamat_kontak_darurat" type="text" class="form-control" placeholder="Alamat" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Alamat'">
                </div>
              </div>
              <div class="form-group form-inline">
                <div class="form-group col-lg-6 col-md-6 name has-error">
                  <input name="telephone_kontak_darurat" type="text" class="form-control" placeholder="No Telephone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Nama Telephone'">
                </div>
                <div class="form-group col-lg-6 col-md-6 email has-error">
                  <input name="hubungan_kontak_darurat" type="text" class="form-control" placeholder="Hubungan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter  Hubungan'">
                </div>
              </div>
              <br></break>
              <button onclick="prev9()" style="float: left;" type="button" class="primary-btn  submit_btn">Sebelumnya</button>
              <button onclick="next9()" style="float: right;" type="button" class="primary-btn  submit_btn">Selanjutnya</button>
              <br></break>
            </div>

            <!-- FORM DATA PEMOHON PEKERJAAN -->
            <div class="tab" id="data_recruit10">
              <h4>Form Data Pemohon Pekerjaan</h4>


              <div class="form-group form-inline has-error">
                <input name="jabatan_harapan" type="text" class="form-control" placeholder="Jabatan yang Diinginkan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Jabatan yang Diinginkan'">
              </div>

              <div class="form-group form-inline">
                <div class="form-group col-lg-6 col-md-6 name has-error">
                  <input name="penghasilan_saat_ini" type="text" class="form-control" placeholder="Penghasilan Saat Ini" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Penghasilan Saat Ini'">
                </div>
                <div class="form-group col-lg-6 col-md-6 email has-error">
                  <input name="didapatkan_dari" type="text" class="form-control" placeholder="Didapatkan dari" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Didapatkan '">
                </div>
              </div>
              <div class="form-group form-inline">
                <div class="form-group col-lg-6 col-md-6 name has-error">
                  <input name="harapan_penghasilan" type="text" class="form-control" placeholder="Harapan penghasilan" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter harapan penghasilan'">
                </div>
                <div class="form-group col-lg-6 col-md-6 email has-error">
                  <input name="tanggal_siap_kerja" type="text" class="form-control" placeholder="Tanggal Siap Kerja" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Tanggal Siap Kerja'">
                </div>
              </div>
              <input type='checkbox' name='setuju' value='1' required <p> Saya menyatakan telah mengisi data ini dengan sebenar benarnya tanpa ada paksaaan dan tekanan dari pihak manapun</p>
              <br></break>
              <button onclick="prev10()" style="float: left;" type="button" class="primary-btn  submit_btn">Sebelumnya</button>
              <button type="submit" style="float: right;" class="primary-btn  submit_btn">Kirim Lamaran</button>
              <br></break>
            </div>








        </div>

        </form>
      </div>
    </div>

    <!-- <div id="dynamic_field">  
                    <div>  
                        <input type="text" name="addmore[0][umur]" placeholder="Enter your Age" class="form-control name_list" required="" />
                        <button type="button" name="add" id="add" class="btn btn-success">Add More</button>
                    </div>
                </div> -->


  </div>
  </div>
</section>
<!--================Blog Area =================-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet" />
<script>
  //SMOOTH SCROLLING
  $(document).ready(function() {
    // Add smooth scrolling to all links
    $("a").on('click', function(event) {

      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== "") {
        // Prevent default anchor click behavior
        event.preventDefault();

        // Store hash
        var hash = this.hash;

        // Using jQuery's animate() method to add smooth page scroll
        // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
        $('html, body').animate({
          scrollTop: $(hash).offset().top
        }, 800, function() {

          // Add hash (#) to URL when done scrolling (default click behavior)
          window.location.hash = hash;
        });
      } // End if
    });
  });

  //DATEPICKER YEAR ONLY
  $("#datepicker1, #datepicker2, #datepicker3, #datepicker4, #datepicker5, #datepicker6, #datepicker7, #datepicker8, #datepicker9").datepicker({
    format: "yyyy",
    viewMode: "years",
    minViewMode: "years"
  });
</script>
<script>
  function next1() {
    var x = document.getElementById("data_recruit1");
    var y = document.getElementById("data_recruit2");
    y.style.display = "block";
    x.style.display = "none";
  }

  function next2() {
    var x = document.getElementById("data_recruit2");
    var y = document.getElementById("data_recruit3");
    y.style.display = "block";
    x.style.display = "none";
  }

  function prev2() {
    var x = document.getElementById("data_recruit2");
    var y = document.getElementById("data_recruit1");
    y.style.display = "block";
    x.style.display = "none";
  }

  function next3() {
    var x = document.getElementById("data_recruit3");
    var y = document.getElementById("data_recruit4");
    y.style.display = "block";
    x.style.display = "none";
  }

  function prev3() {
    var x = document.getElementById("data_recruit3");
    var y = document.getElementById("data_recruit2");
    y.style.display = "block";
    x.style.display = "none";
  }

  function next4() {
    var x = document.getElementById("data_recruit4");
    var y = document.getElementById("data_recruit5");
    y.style.display = "block";
    x.style.display = "none";
  }

  function prev4() {
    var x = document.getElementById("data_recruit4");
    var y = document.getElementById("data_recruit3");
    y.style.display = "block";
    x.style.display = "none";
  }

  function next5() {
    var x = document.getElementById("data_recruit5");
    var y = document.getElementById("data_recruit6");
    y.style.display = "block";
    x.style.display = "none";
  }

  function prev5() {
    var x = document.getElementById("data_recruit5");
    var y = document.getElementById("data_recruit4");
    y.style.display = "block";
    x.style.display = "none";
  }

  function next6() {
    var x = document.getElementById("data_recruit6");
    var y = document.getElementById("data_recruit7");
    y.style.display = "block";
    x.style.display = "none";
  }

  function prev6() {
    var x = document.getElementById("data_recruit6");
    var y = document.getElementById("data_recruit5");
    y.style.display = "block";
    x.style.display = "none";
  }

  function next7() {
    var x = document.getElementById("data_recruit7");
    var y = document.getElementById("data_recruit8");
    y.style.display = "block";
    x.style.display = "none";
  }

  function prev7() {
    var x = document.getElementById("data_recruit7");
    var y = document.getElementById("data_recruit6");
    y.style.display = "block";
    x.style.display = "none";
  }

  function next8() {
    var x = document.getElementById("data_recruit8");
    var y = document.getElementById("data_recruit9");
    y.style.display = "block";
    x.style.display = "none";
  }

  function prev8() {
    var x = document.getElementById("data_recruit8");
    var y = document.getElementById("data_recruit7");
    y.style.display = "block";
    x.style.display = "none";
  }

  function next9() {
    var x = document.getElementById("data_recruit9");
    var y = document.getElementById("data_recruit10");
    y.style.display = "block";
    x.style.display = "none";
  }

  function prev9() {
    var x = document.getElementById("data_recruit9");
    var y = document.getElementById("data_recruit8");
    y.style.display = "block";
    x.style.display = "none";
  }

  function prev10() {
    var x = document.getElementById("data_recruit10");
    var y = document.getElementById("data_recruit9");
    y.style.display = "block";
    x.style.display = "none";
  }
</script>
<script type="text/javascript">
  //Add More Riwayat Penyakit
  $(document).ready(function() {
    var i = 0;

    $('#add').click(function() {
      i++;
      $('#dynamic_field').append(
        '<div id="row' + i + '" style="margin-top: 30px">' +
        '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove" style="float: left">(X) Hapus Form ' + i + '</button>' +
        '<br><br>' +
        '<div class="form-group form-inline">' +
        '<div class="form-group col-lg-6 col-md-6 name has-error">' +
        '<input name="addmore[' + i + '][tahun]" type="text" class="form-control" id="datepicker' + i + '" placeholder="Tahun">' +
        '</div>' +
        '<div class="form-group col-lg-6 col-md-6 email has-error">' +
        '<input name="addmore[' + i + '][lama_sakit]" type="text" class="form-control"  placeholder="Lama Sakit">' +
        '</div>' +
        '</div>' +
        '<div class="form-group form-inline">' +
        '<div class="form-group col-lg-6 col-md-6 name has-error">' +
        '<input name="addmore[' + i + '][nama_penyakit]" type="text" class="form-control"  placeholder="Nama Penyakit">' +
        '</div>' +
        '<div class="form-group col-lg-6 col-md-6 email has-error">' +
        '<input name="addmore[' + i + '][cara_perawatan]" type="text" class="form-control"  placeholder="Cara Perawatan">' +
        '</div>' +
        '</div>' +
        '<div class="form-group form-inline has-error">' +
        '<input name="addmore[' + i + '][hasil_perawatan]" type="text" class="form-control"  placeholder="Hasil Perawatan">' +
        '</div>' +
        '</div>'
      );
      $('#datepicker' + i + '').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
      });
    });

    $(document).on('click', '.btn_remove', function() {
      var button_id = $(this).attr("id");
      $('#row' + button_id + '').remove();
    });

  });

  //Add More Pendidikan Formal
  $(document).ready(function() {
    var i = 0;

    $('#add2').click(function() {
      i++;
      $('#dynamic_field2').append(
        '<div id="row2' + i + '" style="margin-top: 30px">' +
        '<button type="button" name="remove2" id="' + i + '" class="btn btn-danger btn_remove2" style="float: left">(X) Hapus Form ' + i + '</button>' +
        '<br><br>' +
        '<div class="form-group form-inline">' +
        '<div class="form-group col-lg-6 col-md-6 name has-error">' +
        '<input name="addmore2[' + i + '][jenjang_formal]" type="text" class="form-control"  placeholder="Jenjang">' +
        '</div>' +
        '<div class="form-group col-lg-6 col-md-6 email has-error">' +
        '<input name="addmore2[' + i + '][nama_lembaga_pendidikan_formal]" type="text" class="form-control"  placeholder="Nama Lembaga Pendidikan">' +
        '</div>' +
        '</div>' +
        '<div class="form-group form-inline">' +
        '<div class="form-group col-lg-6 col-md-6 name has-error">' +
        '<input name="addmore2[' + i + '][tahun_awal_formal]" id="datepicker1' + i + '" type="text" class="form-control"  placeholder="Dari Tahun">' +
        '</div>' +
        '<div class="form-group col-lg-6 col-md-6 email has-error">' +
        '<input name="addmore2[' + i + '][tahun_akhir_formal]" id="datepicker2' + i + '" type="text" class="form-control"  placeholder="Sampai Tahun">' +
        '</div>' +
        '</div>' +
        '<div class="form-group form-inline">' +
        '<div class="form-group col-lg-6 col-md-6 name has-error">' +
        '<input name="addmore2[' + i + '][alamat_lembaga_formal]" type="text" class="form-control"  placeholder="Alamat">' +
        '</div>' +
        '<div class="form-group col-lg-6 col-md-6 has-error"><select name="addmore2[' + i + '][status_formal]">' +
        '<option disabled selected style="display: none;">Status</option>' +
        '<option value="Lulus">Lulus(L)</option>' +
        '<option value="Belum Lulus">Belum Lulus(BL)</option>' +
        '<option value="Drop Out">Drop Out(DO)</option>' +
        '</select>' +
        '</div>' +
        '</div>' +
        '</div>'
      );
      $('#datepicker1' + i + ', #datepicker2' + i + '').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
      });
    });

    $(document).on('click', '.btn_remove2', function() {
      var button_id = $(this).attr("id");
      $('#row2' + button_id + '').remove();
    });

  });

  //ADD MORE PENDIDIKAN NON FORMAL
  $(document).ready(function() {
    var i = 0;

    $('#add3').click(function() {
      i++;
      $('#dynamic_field3').append(
        '<div id="row3' + i + '" style="margin-top: 30px">' +
        '<button type="button" name="remove3" id="' + i + '" class="btn btn-danger btn_remove3" style="float: left">(X) Hapus Form ' + i + '</button>' +
        '<br><br>' +
        '<div class="form-group form-inline">' +
        '<div class="form-group col-lg-6 col-md-6 name has-error">' +
        '<input name="addmore3[' + i + '][jenjang_non_formal]" type="text" class="form-control"  placeholder="Jenjang">' +
        '</div>' +
        '<div class="form-group col-lg-6 col-md-6 email has-error">' +
        '<input name="addmore3[' + i + '][nama_lembaga_pendidikan_non_formal]" type="text" class="form-control"  placeholder="Nama Lembaga Pendidikan">' +
        '</div>' +
        '</div>' +
        '<div class="form-group form-inline">' +
        '<div class="form-group col-lg-6 col-md-6 name has-error">' +
        '<input name="addmore3[' + i + '][tahun_awal_non_formal]" id="datepicker1' + i + '" type="text" class="form-control"  placeholder="Dari Tahun">' +
        '</div>' +
        '<div class="form-group col-lg-6 col-md-6 email has-error">' +
        '<input name="addmore3[' + i + '][tahun_akhir_non_formal]" id="datepicker2' + i + '" type="text" class="form-control"  placeholder="Sampai Tahun">' +
        '</div>' +
        '</div>' +
        '<div class="form-group form-inline">' +
        '<div class="form-group col-lg-6 col-md-6 name has-error">' +
        '<input name="addmore3[' + i + '][alamat_lembaga_non_formal]" type="text" class="form-control"  placeholder="Alamat">' +
        '</div>' +
        '<div class="form-group col-lg-6 col-md-6 has-error">' +
        '<select nama="addmore3[' + i + '][status_non_formal]">' +
        '<option disabled selected>Status</option>' +
        '<option value="Lulus">Lulus(L)</option>' +
        '<option value="Belum Lulus">Belum Lulus(BL)</option>' +
        '<option value="Drop Out">Drop Out(DO)</option>' +
        '</select>' +
        '</div>' +
        '</div>' +
        '</div>'
      );
      $('#datepicker1' + i + ', #datepicker2' + i + '').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
      });
    });

    $(document).on('click', '.btn_remove3', function() {
      var button_id = $(this).attr("id");
      $('#row3' + button_id + '').remove();
    });

  });

  //ADD MORE PENGALAMAN ORGANISASI
  $(document).ready(function() {
    var i = 0;

    $('#add4').click(function() {
      i++;
      $('#dynamic_field4').append(
        '<div id="row4' + i + '" style="margin-top: 30px">' +
        '<button type="button" name="remove4" id="' + i + '" class="btn btn-danger btn_remove4" style="float: left">(X) Hapus Form ' + i + '</button>' +
        '<br><br>' +
        '<div class="form-group form-inline">' +
        '<div class="form-group col-lg-6 col-md-6 name has-error">' +
        '<input name="addmore4[' + i + '][tahun_awal_organisasi]" id="datepicker1' + i + '" type="text" class="form-control"  placeholder="Dari Tahun">' +
        '</div>' +
        '<div class="form-group col-lg-6 col-md-6 email has-error">' +
        '<input name="addmore4[' + i + '][tahun_akhir_organisasi]" id="datepicker2' + i + '" type="text" class="form-control"  placeholder="Sampai Tahun">' +
        '</div></div><div class="form-group form-inline">' +
        '<div class="form-group col-lg-6 col-md-6 name has-error">' +
        '<input name="addmore4[' + i + '][nama_organisasi]" type="text" class="form-control"  placeholder="Nama Organisasi">' +
        '</div>' +
        '<div class="form-group col-lg-6 col-md-6 email has-error">' +
        '<input name="addmore4[' + i + '][alamat_organisasi]" type="text" class="form-control"  placeholder="Alamat">' +
        '</div>' +
        '</div>' +
        '<div class="form-group form-inline">' +
        '<div class="form-group col-lg-6 col-md-6 name has-error">' +
        '<input name="addmore4[' + i + '][bidang_organisasi]" type="text" class="form-control"  placeholder="Bidang Organisasi">' +
        '</div>' +
        '<div class="form-group col-lg-6 col-md-6 email has-error">' +
        '<input name="addmore4[' + i + '][posisi_organisasi]" type="text" class="form-control"  placeholder="Posisi/tugas">' +
        '</div>' +
        '</div>' +
        '</div>'
      );
      $('#datepicker1' + i + ', #datepicker2' + i + '').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
      });
    });

    $(document).on('click', '.btn_remove4', function() {
      var button_id = $(this).attr("id");
      $('#row4' + button_id + '').remove();
    });

  });

  //ADD MORE RIWAYAT PEKERJAAN
  $(document).ready(function() {
    var i = 0;

    $('#add5').click(function() {
      i++;
      $('#dynamic_field5').append(
        '<div id="row5' + i + '" style="margin-top: 30px">' +
        '<button type="button" name="remove5" id="' + i + '" class="btn btn-danger btn_remove5" style="float: left">(X) Hapus Form ' + i + '</button>' +
        '<br><br>' +
        '<div class="form-group form-inline">' +
        '<div class="form-group col-lg-6 col-md-6 name has-error">' +
        '<input name="addmore5[' + i + '][tahun_awal_pekerjaan]" id="datepicker1' + i + '" type="text" class="form-control"  placeholder="Dari Tahun">' +
        '</div>' +
        '<div class="form-group col-lg-6 col-md-6 email has-error">' +
        '<input name="addmore5[' + i + '][tahun_akhir_pekerjaan]" id="datepicker2' + i + '" type="text" class="form-control"  placeholder="Sampai Tahun">' +
        '</div>' +
        '</div>' +
        '<div class="form-group form-inline">' +
        '<div class="form-group col-lg-6 col-md-6 name has-error">' +
        '<input name="addmore5[' + i + '][nama_instansi]" type="text" class="form-control"  placeholder="Nama Instansi">' +
        '</div>' +
        '<div class="form-group col-lg-6 col-md-6 email has-error">' +
        '<input name="addmore5[' + i + '][alamat_instansi]" type="text" class="form-control"  placeholder="Alamat Instansi">' +
        '</div>' +
        '</div>' +
        '<div class="form-group form-inline">' +
        '<div class="form-group col-lg-6 col-md-6 name has-error">' +
        '<input name="addmore5[' + i + '][riwayat_jabatan]" type="text" class="form-control"  placeholder="Jabatan">' +
        '</div>' +
        '<div class="form-group col-lg-6 col-md-6 email has-error">' +
        '<input name="addmore5[' + i + '][riwayat_tugas]" type="text" class="form-control"  placeholder="Tugas/Pengalaman">' +
        '</div>' +
        '</div>' +
        '<div class="form-group form-inline">' +
        '<div class="form-group col-lg-6 col-md-6 name has-error">' +
        '<input name="addmore5[' + i + '][alasan_berhenti]" type="text" class="form-control"  placeholder="Alasan Berhenti">' +
        '</div>' +
        '<div class="form-group col-lg-6 col-md-6 email has-error">' +
        '<input name="addmore5[' + i + '][total_penghasilan_sebelumnya]" type="text" class="form-control"  placeholder="Total Penghasilan Sebelumnya">' +
        '</div>' +
        '</div>' +
        '</div>'
      );
      $('#datepicker1' + i + ', #datepicker2' + i + '').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
      });
    });

    $(document).on('click', '.btn_remove5', function() {
      var button_id = $(this).attr("id");
      $('#row5' + button_id + '').remove();
    });

  });

  //ADD MORE DATA REFERENSI
  $(document).ready(function() {
    var i = 0;

    $('#add6').click(function() {
      i++;
      $('#dynamic_field6').append(
        '<div id="row6' + i + '" style="margin-top: 30px">' +
        '<button type="button" name="remove6" id="' + i + '" class="btn btn-danger btn_remove6" style="float: left">(X) Hapus Form ' + i + '</button>' +
        '<br><br>' +
        '<div class="form-group form-inline">' +
        '<div class="form-group col-lg-6 col-md-6 name has-error">' +
        '<input name="addmor6[' + i + '][referensi_nama]" type="text" class="form-control"  placeholder="Nama">' +
        '</div>' +
        '<div class="form-group col-lg-6 col-md-6 email has-error">' +
        '<input name="addmor6[' + i + '][referensi_alamat]" type="text" class="form-control"  placeholder="Alamat">' +
        '</div>' +
        '</div>' +
        '<div class="form-group form-inline">' +
        '<div class="form-group col-lg-6 col-md-6 name has-error">' +
        '<input name="addmor6[' + i + '][referensi_telp]" type="text" class="form-control"  placeholder="Nama Telephone">' +
        '</div>' +
        '<div class="form-group col-lg-6 col-md-6 email has-error">' +
        '<input name="addmor6[' + i + '][referensi_alamat_pekerjaan]" type="text" class="form-control"  placeholder="Pekerjaan">' +
        '</div>' +
        '</div>' +
        '<div class="form-group form-inline">' +
        '<div class="form-group col-lg-6 col-md-6 name has-error">' +
        '<input name="addmor6[' + i + '][referensi_jabatan]" type="text" class="form-control"  placeholder="Jabatan">' +
        '</div>' +
        '<div class="form-group col-lg-6 col-md-6 email has-error">' +
        '<input name="addmor6[' + i + '][referensi_hubungan]" type="text" class="form-control"  placeholder="Hubungan">' +
        '</div>' +
        '</div>' +
        '</div>'
      );
    });

    $(document).on('click', '.btn_remove6', function() {
      var button_id = $(this).attr("id");
      $('#row6' + button_id + '').remove();
    });

  });

  //ADD MORE PENGUASAAN BAHASA
  $(document).ready(function() {
    var i = 0;

    $('#add7').click(function() {
      i++;
      $('#dynamic_field7').append(
        '<div id="row7' + i + '" style="margin-top: 30px">' +
        '<button type="button" name="remove7" id="' + i + '" class="btn btn-danger btn_remove7" style="float: left">(X) Hapus Form ' + i + '</button>' +
        '<br><br>' +
        '<div class="form-group form-inline has-error">' +
        '<input name="addmore7[' + i + '][bahasa_asing]" type="text" class="form-control"  placeholder="Bahasa Asing">' +
        '</div>' +
        '<div class="form-group form-inline">' +
        '<div class="form-group col-lg-6 col-md-6 name has-error">' +
        '<select name="addmore7[' + i + '][penguasaaan_lisan]">' +
        '<option disabled selected style="display: none;">Lisan</option>' +
        '<option value="Baik">Baik</option>' +
        '<option value="Sedang">Sedang</option>' +
        '<option value="Kurang">Kurang</option>' +
        '<option value="Tidak">Tidak</option>' +
        '</select>' +
        '</div>' +
        '<div class="form-group col-lg-6 col-md-6 has-error">' +
        '<select name="addmore7[' + i + '][penguasaaan_tulisan]">' +
        '<option disabled selected style="display: none;">Tulisan</option>' +
        '<option value="Baik">Baik</option>' +
        '<option value="Sedang">Sedang</option>' +
        '<option value="Kurang">Kurang</option>' +
        '<option value="Tidak">Tidak</option>' +
        '</select>' +
        '</div>' +
        '</div>' +
        '</div>'
      );
    });

    $(document).on('click', '.btn_remove7', function() {
      var button_id = $(this).attr("id");
      $('#row7' + button_id + '').remove();
    });

  });

  //ADD MORE PENGUASAAN BAHASA
  $(document).ready(function() {
    var i = 0;

    $('#add8').click(function() {
      i++;
      $('#dynamic_field8').append(
        '<div id="row8' + i + '">' +
        '<button type="button" name="remove8" id="' + i + '" class="btn btn-danger btn_remove8" style="float: left">(X) Hapus Form ' + i + '</button>' +
        '<br><br>' +
        '<div class="form-group form-inline has-error">' +
        '<input name="addmore8[' + i + '][penguasaan_komputer]" type="text" class="form-control"  placeholder="Penguasaan Komputer">' +
        '</div>' +
        '</div>'
      );
    });

    $(document).on('click', '.btn_remove8', function() {
      var button_id = $(this).attr("id");
      $('#row8' + button_id + '').remove();
    });

  });
</script>