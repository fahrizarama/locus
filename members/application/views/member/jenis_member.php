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
  <link rel="stylesheet" href="<?php echo base_url(); ?>assetsadmin/css/all.css" />
<style>
:root {
	--white: #ffffff;
	--black: #000000;
	--grey: #ecedf3;
  --light-yellow: #f4ee14;
  --dark-yellow: #e6e600;
}
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

/* START JENIS MEMBER */
.section {
  position: relative;
	width: 100%;
	display: block;
	text-align: center;
	margin: 0 auto;
}
.for-checkbox-tools{
	position: relative;
	display: inline-block;
	padding: 20px;
	width: 130px;
	font-size: 14px;
	line-height: 30px;
	letter-spacing: 1px;
	margin: 0 auto;
	margin-left: 5px;
	margin-right: 5px;
	margin-bottom: 10px;
	text-align: center;
	border-radius: 4px;
	overflow: hidden;
	cursor: pointer;
	text-transform: uppercase;
	color: var(--black);
	-webkit-transition: all 300ms linear;
	transition: all 300ms linear; 
}
.for-checkbox-tools{
	background-color: var(--light-yellow);
	box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
}
.for-checkbox-tools:hover{
  background-color: var(--dark-yellow);
	box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}
/* END JENIS MEMBER*/
</style>
<body>
  <div class="container">
    <div id="login-form">
      <div class="col-md-12">
        <br><br>
        <div class="wow">
          <div align="center" style="margin: 0 0 15px 0;">
            <img src="<?= base_url();?>assets/img/locus-logo.png">
          </div>
          <div class="te">
            <div class="form-group">
              <h2 class="heading_a uk-margin-medium-bottom uk-text-center">Pilih Jenis Membership Registrasi</h2>
            </div>
          </div>
          <div class="section">
            <a href="<?php echo base_url(); ?>login/registrasi_personal">
              <label class="for-checkbox-tools">
                <i class="fas fa-user fa-2x"></i>
                PERSONAL
              </label>
            </a>
            <a href="<?php echo base_url(); ?>login/registrasi_komunitas">
              <label class="for-checkbox-tools">
                <i class="fas fa-comments fa-2x"></i>
                KOMUNITAS
              </label>
            </a>
          </div>
          <div class="section">
            <a href="<?php echo base_url(); ?>login/registrasi_perusahaan">
              <label class="for-checkbox-tools">
                <i class="fas fa-industry fa-2x"></i>
                PERUSAHAAN
              </label>
            </a>
            <a href="<?php echo base_url(); ?>login/registrasi_pendidikan">
              <label class="for-checkbox-tools">
                <i class="fas fa-book fa-2x"></i>
                PENDIDIKAN
              </label>
            </a>
          </div>
          <div class="juki uk-text-center">
            <p>Sudah punya akun? <a href="<?php echo base_url() ?>login">Login</a></p>
          </div>
        </div>
      </div>
    </div>    
  </div>
</body>
</html>


