<style>
body {
	background-color: #fff;
	font-size: 14px;
}
nav ul {
	list-style: none;
	margin: 0;
	padding: 0;
}
nav ul li a {
	display: block;
	background: #ebebeb;
	padding: 10px 15px;
	color: #333;
	text-decoration: none;
	-webkit-transition: 0.2s linear;
	-moz-transition: 0.2s linear;
	-ms-transition: 0.2s linear;
	-o-transition: 0.2s linear;
	transition: 0.2s linear;
}
nav ul li a:hover {
	background: #f8f8f8;
	color: #515151;
}
nav ul li a .fa {
	width: 16px;
	text-align: center;
	margin-right: 5px;
	float:right;
}
nav ul ul {
	background-color:#ebebeb;
}
nav ul li ul li a {
	background: #f8f8f8;
	border-left: 4px solid transparent;
	padding: 10px 20px;
}
nav ul li ul li a:hover {
	background: #ebebeb;
	border-left: 4px solid #3498db;
}
.tanggal-css {
    display: block;
	background: #ebebeb;
	padding: 10px 15px;
	color: #333;
	text-decoration: none;
	-webkit-transition: 0.2s linear;
	-moz-transition: 0.2s linear;
	-ms-transition: 0.2s linear;
	-o-transition: 0.2s linear;
	transition: 0.2s linear;
}
</style>
        <nav>
            <ul>
                <li class='sub-menu'><a href='#'>Aset<div class='fa fa-caret-down right'></div></a>
                    <ul>
                        <?php foreach($aset as $item) : ?>
                            <li><a href=<?= base_url ('C_laporan/buku_besar_akun/'.$item->id_akun) ?> ><?php echo $item->id_akun ?> - <?php echo $item->nama_akun ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class='sub-menu'><a href='#'>Modal<div class='fa fa-caret-down right'></div></a>
                    <ul>
                        <?php foreach($modal as $item) : ?>
                            <li><a href=<?= base_url ('C_laporan/buku_besar_akun/'.$item->id_akun) ?> ><?php echo $item->id_akun ?> - <?php echo $item->nama_akun ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class='sub-menu'><a href='#'>Pemasukan<div class='fa fa-caret-down right'></div></a>
                    <ul>
                        <?php foreach($pemasukan as $item) : ?>
                            <li><a href=<?= base_url ('C_laporan/buku_besar_akun/'.$item->id_akun) ?> ><?php echo $item->id_akun ?> - <?php echo $item->nama_akun ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class='sub-menu'><a href='#'>Pengeluaran<div class='fa fa-caret-down right'></div></a>
                    <ul>
                        <?php foreach($pengeluaran as $item) : ?>
                            <li><a href=<?= base_url ('C_laporan/buku_besar_akun/'.$item->id_akun) ?> ><?php echo $item->id_akun ?> - <?php echo $item->nama_akun ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class='sub-menu'><a href='#'>Hutang<div class='fa fa-caret-down right'></div></a>
                    <ul>
                        <?php foreach($hutang as $item) : ?>
                            <li><a href=<?= base_url ('C_laporan/buku_besar_akun/'.$item->id_akun) ?> ><?php echo $item->id_akun ?> - <?php echo $item->nama_akun ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <li class='sub-menu'><a href='#'>Piutang<div class='fa fa-caret-down right'></div></a>
                    <ul>
                        <?php foreach($piutang as $item) : ?>
                            <li><a href=<?= base_url ('C_laporan/buku_besar_akun/'.$item->id_akun) ?> ><?php echo $item->id_akun ?> - <?php echo $item->nama_akun ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
                <form action="<?= base_url('C_laporan/buku_besar_filter_tanggal') ?>" method="POST">
                    <li class="tanggal-css">
                        Pilih Bulan & Tahun :
                        <input name="monthYear" id="month" type="month" value="<?php echo set_value('monthYear'); ?>">
                        <?php foreach($akun as $item) : ?>
                            <input type="hidden" name="id_akun" value="<?php echo $item->id_akun ?>">
                        <?php endforeach; ?>
                        <button type="submit" class="btn btn-primary btn-sm pull-right" style="margin-right: 5px;">Submit</button>
                    </li>
                </form>
            </ul>
        </nav>

<script>
//Side Nav Dropdown
    $('.sub-menu ul').hide();
    $(".sub-menu a").click(function () {
	    $(this).parent(".sub-menu").children("ul").slideToggle("100");
	    $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/>
<script>
//DATEPICKER TAHUN
$("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});
</script>
<script>
const monthControl = document.querySelector('input[type="month"]');
const date= new Date()
const month=("0" + (date.getMonth() + 1)).slice(-2)
const year=date.getFullYear()
monthControl.value = `${year}-${month}`;
</script>