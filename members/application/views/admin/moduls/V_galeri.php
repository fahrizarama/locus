<!DOCTYPE html>
<html>
<head>
  <title><?= SITE_NAME ?></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">  
  <meta charset="UTF-8">
  <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no"/>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/logo-head.png" type="image/x-icon" />
  <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>assetslogin/assets/images/favicon.png">
        
  <link href="http://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assetslogin/components/uikit/css/uikit.almost-flat.min.css" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url();?>assetslogin/css/login_page.min.css" rel="stylesheet" type="text/css" />
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
    </style>
<body>

<div class="container">

  <div id="login-form">
                    <form class="form-horizontal" role="form" id="formAddPengalaman" action="<?= base_url('login/add_produk') ?>" method="POST" enctype="multipart/form-data">
      <div class="col-md-12">
            <br><br>
        <div class="wow">
          <div align="center" style="margin: 0 0 15px 0;">
                <img src="<?= base_url();?>assets/img/locus-logo.png">
            </div>
          <div class="te">
            <div class="form-group">
              <h2 class="heading_a uk-margin-medium-bottom uk-text-center">Registrasi Akun Membership</h2>
            </div>
          </div>


            <div class="col-md-12">
                                    <label>Foto Galeri</label>
                                    <input type="file" class="form-control" name="foto_galeri" id="input_foto5" required>
                                </div>


<!--             <div class="form-group">
                <label class="title-form">Konfirmasi Password</label>
                <input type="password" name="conf_password" class="form-control" placeholder="Masukkan Konfirmasi Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukkan konfirmasi password'"/>
            </div>
 -->
      
             <input type="hidden" name="kategori_member" value="Personal" />

             <div class="uk-margin-medium-top">
               <button type="submit" class="md-btn md-btn-primary md-btn-block md-btn-large" name="signup">Daftar</button>
                </div>

                <div class="juki uk-text-center">
                    <p>Sudah punya akun? <a href="<?php echo base_url() ?>login">Login</a></p>
                </div>
        
        </div>
    <?php echo form_close() ?>
    </div>  

</div>
</body>
</html>
