<!DOCTYPE html>
<html>
<head>
  <title><?= SITE_NAME ?></title>
  <link rel="stylesheet" href="<?php echo base_url(); ?>/assetslogin/css/bootstrap.min.css">  
  <meta charset="UTF-8">
  <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no"/>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo-head.png" type="image/x-icon" />
  <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>assetslogin/assets/images/favicon.png">
        
  <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assetslogin/components/uikit/css/uikit.almost-flat.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assetslogin/css/login_page.min.css" rel="stylesheet" type="text/css" />
  <script src="<?php echo base_url(); ?>assetsuser/js/jquery-3.3.1.min.js"></script>
<style>
      h4{
        font-family: Roboto, sans-serif; 
      }
      .container{
        width: 800px;
        margin: auto;        
        padding-bottom: 3%;
      }
      .te{
        text-align: center;
      }
      body{
        background-size: cover;
        padding: 0;
        background-image: url(<?= base_url() ?>assets/img/banner2.jpg);
        background-repeat: no-repeat;
        width: 100%;
        height: 100%;
        display: inline-block;
        background-color: rgba(0, 0, 0, .085);
        background-position: 50% 10%;
      }
      .wow{
        background: #fff;
        text-align: center;
        box-shadow: 0px 0px 2px #778899;
        padding: 30px;
        color: black;
      }
      .juki{
        color: #707070;
        margin: 20px 0 0 0;
      }
      .feature-img input{
        height: 36px;
      }
      label.title-form{
        text-decoration: none;
        font-weight: normal;
        float: left;
      }
      input.title-form{
        width: 44.5%;
        float: left;
      }

      span.has-error span.has-fail{
        color:#a94442;
        font-size: 13px;
        float: right;
        text-align: left;
        padding:10px 0 0 10px;
      }

      span.has-error{
        color:#a94442;
        font-size: 13px;
        float: right;
        text-align: left;
        padding:10px 0 0 10px;        
      }

      span.has-not{
        color:#a94442;
        font-size: 13px;
        float: left;
        text-align: left;
        padding:10px 0 0 110px;
      }

      span.has-false{
        color:#a94442;
        font-size: 13px;
        float: left;
        text-align: left;
        padding:10px 0 0 70px;
      }

      span.has-success{
        color: green;
        font-size: 13px;
        float: left;
        text-align: left;
        padding:10px 0 0 70px;
      }

      span.has-fail{
        color:#a94442;
        font-size: 13px;
        text-align: left;
        padding:10px 0 0 95px;
      }

      .has-error label.title-form{
        color:#a94442; 
        /*padding: 10px 0 0 0; */
      }

      .has-top label.title-form{
        padding: 13px 0 0 0;
      }

      .has-pd label.title-form{
        padding: 0 0 0 0;
      }

</style>
<body>

<div class="container">

  <div id="login-form">
      <form action="<?= base_url('login/insert_registrasi_personal') ?>" method="POST" enctype="multipart/form-data">
      <div class="col-md-12">
            <br><br>
        <div class="wow">
          <div align="center" style="margin: 0 0 15px 0;">
                <img src="<?= base_url();?>assets/img/locus-logo.png">
            </div>
          <div class="te">
            <div class="form-group">
              <h2 class="heading_a uk-margin-medium-bottom uk-text-center">Registrasi Akun Membership Personal</h2>
            </div>
          </div>
            <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
              <label class="title-form">Username</label>
              <input type="text" class="form-control" name="username"  value="<?= set_value('username')?>" placeholder="Masukkan Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'maxlength="" username member'"/>
              <span class="has-error"><?= form_error('username')?></span>
            </div>

            <div class="row">
              <div class="col-lg-6" style="margin-right: 10px; float: left;">
                <div class="<?= form_error('username') ? 'has-top' : null ?>">
                  <div class="form-group <?= form_error('nama_member') ? 'has-error' : null ?>">
                    <label class="title-form">Nama Member</label>
                    <input type="text" class="form-control" name="nama_member"  value="<?= set_value('nama_member')?>" placeholder="Masukkan Nama " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan nama member'" />
                    <span class="has-error"><?= form_error('nama_member')?></span>
                  </div>
                </div>
              </div>

              <div class="row <?= form_error('nama_member') ? 'has-top' : null ?>">
                <div class="form-group <?= form_error('email') ? 'has-error' : null ?>">
                  <label class="title-form">Email</label>
                  <input type="email" class="form-control title-form" id="fv_email" name="fv_email" placeholder="Email" required>
                  <span class="has-error"><?= form_error('email')?></span>
                </div>
              </div>
            </div>

            <div class="<?= form_error('email') ? 'has-top' : null ?>">
              <div class="form-group <?= form_error('alamat') ? 'has-error' : null ?>">
                <label class="title-form">Alamat</label>
                <input type="text" class="form-control" id="fv_alamat" name="fv_alamat" placeholder="Alamat" required>
                <span class="has-error"><?= form_error('alamat')?></span>
              </div>
            </div>

            <div class="form-group <?= form_error('password') ? 'has-error' : null ?>">
                <label class="title-form">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Masukkan Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan password'"/>
                <span class="has-error"><?= form_error('password')?></span>
            </div>

            <div class="<?= form_error('password') ? 'has-top' : null ?>">
              <div class="form-group <?= form_error('pasconf') ? 'has-error' : null ?>">
                  <label class="title-form">Konfirmasi Password</label>
                  <input type="password" name="pasconf" class="form-control" placeholder="Masukkan Konfirmasi Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan konfirmasi password'"/>
                  <span class="has-error"><?= form_error('pasconf')?></span>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6" style="margin-right: 10px; float: left;">
                <div class="<?= form_error('alamat') ? 'has-top' : null ?>">
                  <div class="form-group <?= form_error('noktp') ? 'has-error' : null ?>">
                    <label class="title-form">No. KTP</label>
                    <input type="text" class="form-control" id="fv_noktp" name="fv_noktp" placeholder="No.KTP" required>
                    <span class="has-error"><?= form_error('noktp')?></span>
                  </div>
                </div>
              </div>

              <div class="row <?= form_error('alamat') ? 'has-top' : null ?>">
                <div class="form-group <?= form_error('nohp') ? 'has-error' : null ?>">
                  <label class="title-form">No. Hp</label>
                  <input type="text" class="form-control title-form" id="fv_nohp" name="fv_nohp" placeholder="No.Hp" required>
                  <span class="has-error"><?= form_error('nohp')?></span>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6" style="margin-right: 10px; float: left;">
                <div class="<?= form_error('nohp') ? 'has-top' : null ?>">
                  <div class="form-group <?= form_error('gender') ? 'has-error' : null ?>">
                    <label class="title-form">Gender</label>
                    <select id="fv_gender" name="fv_gender" class="form-control" required>
                      <option selected disabled style="display: none">Pilih</option>
                      <option value="pria">Pria</option>
                      <option value="wanita">Wanita</option>
                    </select>
                    <span class="has-error"><?= form_error('gender')?></span>
                  </div>
                </div>
              </div>

              
              <div class="row <?= form_error('noktp') ? 'has-top' : null ?>">
                <div class="form-group <?= form_error('tgl_lahir') ? 'has-error' : null ?>">
                  <label class="title-form">Tanggal Lahir</label>
                  <input type="date" class="form-control title-form" id="fd_tgl_lahir" name="fd_tgl_lahir" placeholder="dd/mm/yyyy" required>
                  <span class="has-error"><?= form_error('tgl_lahir')?></span>
                </div>
              </div>
            </div>

            <div class="<?= form_error('tgl_lahir') ? 'has-top' : null ?>">
              <div class="form-group <?= form_error('riwayat_org') ? 'has-error' : null ?>">
                <label class="title-form">Riwayat Organisasi</label>
                <textarea class="form-control" id="fv_organisasi" name="fv_organisasi" rows="3" placeholder="namaOrganisasi(tahun aktif), namaOrganisasi(tahun aktif) dll"></textarea>
                <span class="has-error"><?= form_error('riwayat_org')?></span>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-6" style="margin-right: 10px; float: left;">
                <div class="<?= form_error('riwayat_org') ? 'has-top' : null ?>">
                  <div class="form-group <?= form_error('keahlian') ? 'has-error' : null ?>">
                    <label class="title-form">Keahlian</label>
                    <input type="text" class="form-control" id="fv_keahlian" name="fv_keahlian" placeholder="Programming, Speaking, etc">
                    <span class="has-error"><?= form_error('keahlian')?></span>
                  </div>
                </div>
              </div>

              <div class="row <?= form_error('keahlian') ? 'has-top' : null ?>">
                <div class="form-group <?= form_error('foto_ktp') ? 'has-error' : null ?>">
                  <label class="title-form">Foto KTP</label>
                  <input type="file" class="form-control title-form" id="exampleFormControlFile1" name="fcktp" required>
                  <span class="has-not"><?= form_error('foto_ktp')?></span>
                </div>
              </div>
            </div>

            <div  class="col-lg-12" style="padding-top: 10px; padding-bottom: 10px;">
              <h3>Riwayat Pendidikan</h3>
            </div>
                
            <div class="form-group col-md-6 " id="colSchool">
              <label class="title-form">Nama Institusi</label>
              <input type="text" class="form-control" name="sekolah[]" placeholder="">
              <span class="has-not"><?= form_error('institusi')?></span>
            </div>
            <div class="form-group col-md-2" id="colYear">
              <label class="title-form">Tahun</label>
              <input type="text" class="form-control" name="tahun[]"  placeholder="">
              <span class="has-not"><?= form_error('tahun')?></span>
            </div><br>
            <div class="dynamic">

            </div>
            <div class="col-md-12">
              <button type="button" onclick ="appendRow()" value="Add Row" class="btn btn-primary">Add Row</button>
            </div>

            <div class="form-group col-md-12">
                    <label class="title-form">Status</label>
                    <select id="status"  name="fv_status" class="form-control" required>
                        <option selected disabled>Pilih</option>
                        <option value="pekerja">Pekerja</option>
                        <option value="mahasiswa">Mahasiswa</option>
                    </select>
                </div>
                <div class="pekerjaBox" style="display:none">
                    <div class="col-md-12" style="padding-top: 10px; padding-bottom: 10px;">
                        <h3>Pekerjaan</h3>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="title-form">Nama Pekerjaan/Usaha</label>
                        <input type="text" class="form-control" id="inputKerjaan" name="nama_pekerjaan" placeholder="Nama PT/Usaha">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="title-form">Jabatan</label>
                        <input type="text" class="form-control" id="inputJabatan" name="jabatan" placeholder="CEO, Senior Programmer, dll">
                    </div>
                    <div class="form-group col-md-9">
                        <label class="title-form">Alamat Tempat Pekerjaan/Usaha</label>
                        <input type="text" class="form-control" id="inputAlamatUsaha" name="alamat_pekerjaan" placeholder="Alamat">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="title-form">No.Telp Kantor</label>
                        <input type="text" class="form-control" id="inputtelpusaha" name="notelp_pekerjaan" placeholder="">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="title-form">Bidang Pekerjaan/Usaha</label>
                        <input type="text" class="form-control" id="inputtelpusaha" name="bidang_pekerjaan" placeholder="Programming, Accounting, Ternak Lele, Dll">
                    </div>
                    <div class="form-group col-md-6">
                        <label class="title-form">Website PT/Usaha</label>
                        <input type="text" class="form-control" id="inputweb" name="web_pekerjaan" placeholder="">
                    </div>
                </div>
                
                <div class="mahasiswaBox" style="display: none">
                    <div  class="col-md-12" style="padding-top: 10px; padding-bottom: 10px;">
                        <h3>Mahasiswa</h3>
                    </div>
                    <div class="form-group col-md-5">
                        <label class="title-form">Nama Kampus</label>
                        <input type="text" class="form-control" name="nama_kampus" id="inputkampus" placeholder="">
                    </div>
                    <div class="form-group col-md-4">
                        <label class="title-form">Jurusan</label>
                        <input type="text" class="form-control" name="nama_jurusan" id="inputJurusan" placeholder="">
                    </div>
                    <div class="form-group col-md-3">
                        <label class="title-form">Tahun Masuk</label>
                        <input type="text" class="form-control" name="tahun_masuk_kampus" id="inputTM" placeholder="">
                    </div>
                </div>
      
            <input type="hidden" name="id_kategori" value="1" />

            <div class="uk-margin-medium-top">
              <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large" name="signup" style="margin-top: 40px">Daftar</button>
            </div>

            <div class="juki uk-text-center">
              <p>Sudah punya akun? <a href="<?php echo base_url() ?>login">Login</a></p>
              <p>Pilih Jenis Membership Lain? <a href="<?php echo base_url() ?>login/pilih_jenis_member">Klik Disini</a></p>
            </div>
        
        </div>
    <?php echo form_close() ?>
    </div>  
    
</div>
</body>
<script type="text/javascript">
var x=1;
function appendRow()
{
  $('.dynamic').append(`
  <div class="dynamic-content">
    <div class="form-group col-md-6 " id="colSchool">
      <input type="text" class="form-control" name="sekolah[]" placeholder="">
      <span class="has-not"><?= form_error('institusi')?></span>
    </div>
    <div class="form-group col-md-2" id="colYear">
      <input type="text" class="form-control" name="tahun[]"  placeholder="">
      <span class="has-not"><?= form_error('tahun')?></span>
    </div>
    <div class="form-group col-md-2" >
      <button type="button" class="deleteRow btn btn-danger">Delete Row</button>
    </div><br>
  </div>
  `);
};

$(document).ready(function(){
                $('#status').on('change', function(){
                    if($(this).val()=='pekerja'){
                        $('.mahasiswaBox').hide();
                        $('.pekerjaBox').show();
                        $('[name="nama_pekerjaan"]').attr('required',true);
                        $('[name="jabatan"]').attr('required',true);
                        $('[name="alamat_pekerjaan"]').attr('required',true);
                        $('[name="notelp_pekerjaan"]').attr('required',true);
                        $('[name="bidang_pekerjaan"]').attr('required',true);
                        $('[name="web_pekerjaan"]').attr('required',true);

                        $('[name="nama_kampus"]').attr('required',false);
                        $('[name="nama_jurusan"]').attr('required',false);
                        $('[name="tahun_masuk_kampus"]').attr('required',false);
                    }else{
                        $('.mahasiswaBox').show();
                        $('.pekerjaBox').hide();

                        $('[name="nama_pekerjaan"]').attr('required',false);
                        $('[name="jabatan"]').attr('required',false);
                        $('[name="alamat_pekerjaan"]').attr('required',false);
                        $('[name="notelp_pekerjaan"]').attr('required',false);
                        $('[name="bidang_pekerjaan"]').attr('required',false);
                        $('[name="web_pekerjaan"]').attr('required',false);

                        $('[name="nama_kampus"]').attr('required',true);
                        $('[name="nama_jurusan"]').attr('required',true);
                        $('[name="tahun_masuk_kampus"]').attr('required',true);
                    }
                });

                $('body').on('click','.deleteRow', function(){
                    $(this).closest('.dynamic-content').remove();
                });



            });
</script>
</html>


