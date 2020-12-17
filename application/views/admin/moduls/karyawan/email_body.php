<!DOCTYPE html>
<style>
.email-body {
    Margin-top: 0;
    Margin-bottom: 25px;
    font-family: Georgia,serif;
    font-size: 16px;
    line-height: 25px;
}
</style>
<html>

<head>

    <meta charset="utf-8" />

    <title>Elecomp Software House - Codeigniter mail templates</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

</head>

<body>

    <div class="email-body">

        <p >Hey <?php echo $karyawan->nama_lengkap;?>, Congratulation you were pass our test</p>

        <p>You can login in our website locusid.com with this : </p>

        <p><b>Email :</b> <?php echo $karyawan->email;?></p>

        <p><b>Password :</b> <?php echo $karyawan->password;?></p>

        <p>Once you login, please change the password and update your information, otherwise you will not be able to use the feature inside the website.</p>

    </div>

</body>

</html>