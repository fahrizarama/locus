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
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>  
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
      <form action="<?= base_url('login/insert_registrasi_komunitas') ?>" method="POST" enctype="multipart/form-data">
      <div class="col-md-12">
            <br><br>
        <div class="wow">
          <div align="center" style="margin: 0 0 15px 0;">
                <img src="<?= base_url();?>assets/img/locus-logo.png">
            </div>
          <div class="te">
            <div class="form-group">
              <h2 class="heading_a uk-margin-medium-bottom uk-text-center">Registrasi Akun Membership Komunitas</h2>
            </div>
          </div>

            <div class="form-group <?= form_error('username') ? 'has-error' : null ?>">
              <label class="title-form">Username</label>
              <input type="text" class="form-control" name="username"  value="<?= set_value('username')?>" placeholder="Masukkan Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'maxlength="" username member'"/>
              <span class="has-error"><?= form_error('username')?></span>
            </div>

            <div class="<?= form_error('username') ? 'has-top' : null ?>">
              <div class="form-group <?= form_error('nama_member') ? 'has-error' : null ?>">
                <label class="title-form">Nama Member</label>
                <input type="text" class="form-control" name="nama_member"  value="<?= set_value('nama_member')?>" placeholder="Masukkan Nama " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan nama member'" />
                <span class="has-error"><?= form_error('nama_member')?></span>
              </div>
            </div>

            <div class="row"> 
              <div class="col-lg-6" style="margin-right: 10px; float: left;">
                <div class="form-group <?= form_error('nama_member') ? 'has-top' : null ?>">
                    <label class="title-form">Komunitas/Organisasi* </label>
                    <select name="anggota_id1" class="form-control">
                      <option disabled selected style="display: none;">-- Pilih Komunitas --</option>
                      <option value="0" <?= set_value('anggota_id1') == '0' ? "selected" : null?>>Tidak Ada</option>
                      <?php foreach ($komunitas->result() as $value) :?>
                      <option value="<?= $value->id_member ?>" <?= set_value('anggota_id1') == $value->id_member ? "selected" : null?> ><?= $value->nama_member ?></option>
                      <?php endforeach; ?>
                    </select>
                    <span class="has-false"><?= form_error('anggota_id1')?></span>
                </div>
              </div>

              <div class="row <?= form_error('nama_member') ? 'has-top' : null ?>">
                <div class="form-group <?= form_error('no_anggota') ? 'has-error' : null ?>">
                  <label class="title-form">Nomor Anggota* </label>
                  <input type="text" name="no_anggota" class="form-control title-form" value="<?= set_value('no_anggota')?>" placeholder="Masukkan Nomor Anggota" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan nomor anggota'"/>
                  <span class="has-false"><?= form_error('no_anggota')?></span>
                  <span class="has-success"><?= form_error('no_anggota') == TRUE && $this->input->post('no_anggota') == TRUE ? ('Nomor Anggota sesuai') : null ?></span>
                </div>
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

      
             <input type="hidden" name="id_kategori" value="2" />

             <div class="uk-margin-medium-top">
               <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large" name="signup">Daftar</button>
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
</html>


