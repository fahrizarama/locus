<?php
defined('BASEPATH') or die('No direct script access allowed!');
?>

<style>
:root {
	--white: #ffffff;
	--black: #000000;
	--grey: #ecedf3;
    --light-blue: #24a0ed;
    --blue: #1183ca;
    --dark-blue: #0b5482;
}

.tab {
  /* overflow: hidden; */
  border: 1px solid #ccc;
  background-color: #f1f1f1;
  overflow: auto;
  white-space: nowrap;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  border: none;
  outline: none;
  cursor: pointer;
  color: var(--black);
  padding: 14px 16px;
  font-size: 14px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
  border: 1px solid #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: var(--blue);
  color: var(--white);
  border: 1px solid var(--blue);
}

/* Style the tab content */
.city {
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

/* START JABATAN */
.section {
    position: relative;
	width: 100%;
	display: block;
	text-align: center;
	margin: 0 auto;
}
[type="radio"]:checked,
[type="radio"]:not(:checked){
	position: absolute;
	width: 0;
	height: 0;
	visibility: hidden;
}
.checkbox-tools:checked + label,
.checkbox-tools:not(:checked) + label{
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
	color: var(--white);
	-webkit-transition: all 300ms linear;
	transition: all 300ms linear; 
}
.checkbox-tools:not(:checked) + label{
	background-color: var(--light-blue);
	box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.1);
}
.checkbox-tools:checked + label{
	background-color: var(--dark-blue);
	box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}
.checkbox-tools:not(:checked) + label:hover{
	box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}
/* END JABATAN*/

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-image-content {
    width: 100%;
  }
}
</style>

<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <form class="form-horizontal" role="form" id="formDetailPelamar" action="<?= base_url('C_karyawan/ganti_jabatan') ?>" method="POST" enctype="multipart/form-data">
            <input type="reset" class="hidden">
            <input type="hidden" name="id_karyawan" value="<?= $pelamar->id_karyawan ?>">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="smaller lighter blue no-margin">Data Karyawan</h3>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-5" style="margin-bottom: 20px;">
                        <img src="<?= base_url('assets/img/' . $pelamar->foto) ?>" width="100" style="float: right;">
                    </div>
                    <div class="col-md-7" style="float: left;">
                        <h4><strong><?= $pelamar->nama_lengkap ?></strong></h4>
                        <b>Jenis Kelamin   :</b><?= $pelamar->jenis_kelamin ?><br>
                        <b>TTL   :</b><?= $pelamar->tempat_tgl_lahir ?><br>
                        <b>Agama   :</b><?= $pelamar->agama ?><br>
                        <b>Email   :</b><?= $pelamar->email ?><br>
                        <b>No. Telp   :</b><?= $pelamar->telephone ?><br>
                        <b>Jabatan   :</b><?= $pelamar->nama_jabatan ?>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab" id="button_tab">
                                <button type="button" onclick="tab1()" class="tablink active">Riwayat Kesehatan</button>
                                <button type="button" onclick="tab2()" class="tablink">Riwayat Pendidikan</button>
                                <button type="button" onclick="tab3()" class="tablink">Riwayat Pekerjaan</button>
                                <button type="button" onclick="tab4()" class="tablink">Pengalaman Organisasi</button>
                                <button type="button" onclick="tab5()" class="tablink">Keahlian</button>
                                <button type="button" onclick="tab6()" class="tablink">Kontak Darurat</button>
                                <button type="button" onclick="tab7()" class="tablink">Pemohon Pekerjaan</button>
                            </div>

                            <div class="city" id="table_riwayat_kesehatan">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <th>No</th>
                                        <th>Tahun</th>
                                        <th>Lama Sakit</th>
                                        <th>Nama Penyakit</th>
                                        <th>Cara Perawatan</th>
                                        <th>Hasil Perawatan</th>
                                    </thead>
                                    <?php foreach($kesehatan as $row) { ?>
                                    <tbody>
                                        <?php $start = 1; ?>
                                        <td><?= $start++ ?></td>
                                        <td><?= $row->tahun ?></td>
                                        <td><?= $row->lama_sakit ?></td>
                                        <td><?= $row->nama_penyakit ?></td>
                                        <td><?= $row->cara_perawatan ?></td>
                                        <td><?= $row->hasil_perawatan ?></td>
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>

                            <div class="city" id="table_riwayat_pendidikan" style="display: none;">
                                <label> Pendidikan Formal </label>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <th>No</th>
                                        <th>Jenjang</th>
                                        <th>Tahun Awal</th>
                                        <th>Tahun Akhir</th>
                                        <th>Nama Lembaga</th>
                                        <th>Alamat Lembaga</th>
                                        <th>Status Pendidikan</th>
                                        <th>Prestasi</th>
                                        <th>Bukti Prestasi</th>
                                    </thead>
                                    <?php foreach($pendidikan_formal as $row) { ?>
                                    <tbody>
                                        <?php $start = 1; ?>
                                        <td><?= $start++ ?></td>
                                        <td><?= $row->jenjang ?></td>
                                        <td><?= $row->awal_tahun ?></td>
                                        <td><?= $row->akhir_tahun ?></td>
                                        <td><?= $row->nama_lembaga ?></td>
                                        <td><?= $row->alamat_lembaga ?></td>
                                        <td><?= $row->status_pendidikan ?></td>
                                        <td><?= $row->prestasi ?></td>
                                        <td><img id="myImg" src="<?= base_url('assets/img/' . $row->foto_pendidikan) ?>" style="width:100%;max-width:300px"></td>
                                    </tbody>
                                    <?php } ?>
                                </table>
                                <label> Pendidikan Non Formal </label>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <th>No</th>
                                        <th>Jenjang</th>
                                        <th>Tahun Awal</th>
                                        <th>Tahun Akhir</th>
                                        <th>Nama Lembaga</th>
                                        <th>Alamat Lembaga</th>
                                        <th>Status Pendidikan</th>
                                        <th>Prestasi</th>
                                        <th>Bukti Prestasi</th>
                                    </thead>
                                    <?php foreach($pendidikan_non_formal as $row) { ?>
                                    <tbody>
                                        <?php $start = 1; ?>
                                        <td><?= $start++ ?></td>
                                        <td><?= $row->jenjang ?></td>
                                        <td><?= $row->awal_tahun ?></td>
                                        <td><?= $row->akhir_tahun ?></td>
                                        <td><?= $row->nama_lembaga ?></td>
                                        <td><?= $row->alamat_lembaga ?></td>
                                        <td><?= $row->status_pendidikan ?></td>
                                        <td><?= $row->prestasi ?></td>
                                        <td></td>
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>

                            <div class="city" id="table_riwayat_pekerjaan" style="display: none;">
                                <label>Riwayat Pekerjaan</label>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <th>No</th>
                                        <th>Tahun Awal</th>
                                        <th>Tahun Akhir</th>
                                        <th>Nama Instansi</th>
                                        <th>Alamat Instansi</th>
                                        <th>Jabatan</th>
                                        <th>Tugas</th>
                                        <th>Alasan Berhenti</th>
                                        <th>Total Penghasilan</th>
                                    </thead>
                                    <?php foreach($pekerjaan as $data) { ?>
                                    <tbody>
                                        <?php $start = 1; ?>
                                        <td><?= $start++ ?></td>
                                        <td><?= $data->awal_tahun ?></td>
                                        <td><?= $data->akhir_tahun ?></td>
                                        <td><?= $data->nama_instansi ?></td>
                                        <td><?= $data->alamat_instansi ?></td>
                                        <td><?= $data->jabatan ?></td>
                                        <td><?= $data->tugas_pekerjaan ?></td>
                                        <td><?= $data->alasan_berhenti ?></td>
                                        <td><?= $data->total_penghasilan ?></td>
                                    </tbody>
                                    <?php } ?>
                                </table>
                                <label>Data Referensi Pekerjaan</label>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>No. Telp</th>
                                        <th>Pekerjaan</th>
                                        <th>Hubungan</th>
                                        <th>Jabatan</th>
                                        <th>Prestasi</th>
                                        <th>Bukti Prestasi</th>
                                    </thead>
                                    <?php foreach($referensi as $data) { ?>
                                    <tbody>
                                        <?php $start = 1; ?>
                                        <td><?= $start++ ?></td>
                                        <td><?= $data->nama ?></td>
                                        <td><?= $data->alamat ?></td>
                                        <td><?= $data->telp ?></td>
                                        <td><?= $data->pekerjaan ?></td>
                                        <td><?= $data->hubungan ?></td>
                                        <td><?= $data->jabatan ?></td>
                                        <td><?= $data->prestasi ?></td>
                                        <td><?= $data->foto_prestasi ?></td>
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>

                            <div class="city" id="table_pengalaman_organisasi" style="display: none;">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <th>No</th>
                                        <th>Tahun Awal</th>
                                        <th>Tahun Akhir</th>
                                        <th>Nama Organisasi</th>
                                        <th>Alamat Organisasi</th>
                                        <th>Bidang</th>
                                        <th>Posisi</th>
                                    </thead>
                                    <?php foreach($organisasi as $data) { ?>
                                    <tbody>
                                        <?php $start = 1; ?>
                                        <td><?= $start++ ?></td>
                                        <td><?= $data->tanggal_awal ?></td>
                                        <td><?= $data->tanggal_akhir ?></td>
                                        <td><?= $data->nama_organisasi ?></td>
                                        <td><?= $data->alamat_organisasi ?></td>
                                        <td><?= $data->bidang_organisasi ?></td>
                                        <td><?= $data->posisi ?></td>
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>

                            <div class="city" id="table_keahlian" style="display: none;">
                                <label>Keahlian Bahasa</label>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <th>No</th>
                                        <th>Bahasa Asing</th>
                                        <th>Kemampuan Lisan</th>
                                        <th>Kemampuan Tulis</th>
                                    </thead>
                                    <?php foreach($bahasa as $data) { ?>
                                    <tbody>
                                        <?php $start = 1; ?>
                                        <td><?= $start++ ?></td>
                                        <td><?= $data->bahasa_asing ?></td>
                                        <td><?= $data->lisan ?></td>
                                        <td><?= $data->tulis ?></td>
                                    </tbody>
                                    <?php } ?>
                                </table>
                                <label>Keahlian Aplikasi Komputer</label>
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama Aplikasi</th>
                                    </thead>
                                    <?php foreach($komputer as $data) { ?>
                                    <tbody>
                                        <?php $start = 1; ?>
                                        <td><?= $start++ ?></td>
                                        <td><?= $data->nama_aplikasi ?></td>
                                    </tbody>
                                    <?php } ?>
                                </table>
                            </div>

                            <div class="city" id="table_kontak_darurat" style="display: none;">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Hubungan</th>
                                        <th>Alamat</th>
                                        <th>No. Telp</th>
                                    </thead>
                                    <tbody>
                                        <?php $start = 1; ?>
                                        <td><?= $start++ ?></td>
                                        <td><?= $kontak_darurat->nama ?></td>
                                        <td><?= $kontak_darurat->hubungan ?></td>
                                        <td><?= $kontak_darurat->alamat ?></td>
                                        <td><?= $kontak_darurat->telephone ?></td>
                                    </tbody>
                                </table>
                            </div>

                            <div class="city" id="table_pemohon_pekerjaan" style="display: none;">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <th>No</th>
                                        <th>Jabatan Yang Diinginkan</th>
                                        <th>Gaji Saat Ini</th>
                                        <th>Perolehan Gaji Dari</th>
                                        <th>Harapan Penghasilan</th>
                                        <th>Tanggal Siap Kerja</th>
                                        <th>Transportasi</th>
                                    </thead>
                                    <tbody>
                                        <?php $start = 1; ?>
                                        <td><?= $start++ ?></td>
                                        <td><?= $pemohon_pekerjaan->jabatan_harapan ?></td>
                                        <td><?= $pemohon_pekerjaan->gaji_saat_ini ?></td>
                                        <td><?= $pemohon_pekerjaan->perolehan_gaji_dari ?></td>
                                        <td><?= $pemohon_pekerjaan->harapan_penghasilan ?></td>
                                        <td><?= $pemohon_pekerjaan->tanggal_siap_kerja ?></td>
                                        <td><?= $pemohon_pekerjaan->transportasi ?></td>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-sm pull-right" style="margin-left: 5px;" data-dismiss="modal">Cancel</button>
                <div>
                    <a href="#pilihJabatan" role="button" class="btn btn-primary btn-sm pull-right" data-toggle="modal">Ganti Jabatan</a>
                </div>
            </div>

            <div id="pilihJabatan" class="modal fade" tabindex="-1">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <input type="reset" class="hidden">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h3 class="smaller lighter blue no-margin">Ganti Jabatan</h3>
                    </div>
                    <div class="modal-body" >
                        <div class="row">
                            <div class="section">
                                <?php foreach($jabatan as $jabatan) { ?>
                                    <?php if($jabatan->id_jabatan == $pelamar->id_jabatan) {
                                        
                                    } else { ?>
                                        <input class="checkbox-tools" type="radio" name="jabatan" value="<?= $jabatan->id_jabatan; ?>" id="<?= $jabatan->id_jabatan; ?>">
                                        <label class="for-checkbox-tools" for="<?= $jabatan->id_jabatan; ?>">
                                            <?php if($jabatan->icon == NULL) { ?>

                                            <?php } else { ?>
                                                <img style="margin-bottom: 5px" src="<?= base_url('assets/icon_jabatan/' . $jabatan->icon) ?>" width="32" height="32"><br/>
                                            <?php } ?>
                                            <?= $jabatan->nama_jabatan; ?>
                                        </label>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm pull-right" style="margin-right: 5px;">Ganti Jabatan</button>
                    </div>
                </div>
            </div>
        </div>

        </form>
    </div>
</div>
<script>
//BUTTON ACTIVE
var header = document.getElementById("button_tab");
var btns = header.getElementsByClassName("tablink");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
  var current = document.getElementsByClassName("active");
  current[0].className = current[0].className.replace(" active", "");
  this.className += " active";
  });
}

function tab1() {
	var x = document.getElementById("table_riwayat_kesehatan");
	var y = document.getElementById("table_riwayat_pendidikan");
    var a = document.getElementById("table_riwayat_pekerjaan");
    var b = document.getElementById("table_pengalaman_organisasi");
    var c = document.getElementById("table_keahlian");
    var d = document.getElementById("table_kontak_darurat");
    var e = document.getElementById("table_pemohon_pekerjaan");
	x.style.display = "block";
	y.style.display = "none";
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "none";
    d.style.display = "none";
    e.style.display = "none";
}

function tab2() {
	var x = document.getElementById("table_riwayat_kesehatan");
	var y = document.getElementById("table_riwayat_pendidikan");
    var a = document.getElementById("table_riwayat_pekerjaan");
    var b = document.getElementById("table_pengalaman_organisasi");
    var c = document.getElementById("table_keahlian");
    var d = document.getElementById("table_kontak_darurat");
    var e = document.getElementById("table_pemohon_pekerjaan");
	x.style.display = "none";
	y.style.display = "block";
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "none";
    d.style.display = "none";
    e.style.display = "none";
}

function tab3() {
	var x = document.getElementById("table_riwayat_kesehatan");
	var y = document.getElementById("table_riwayat_pendidikan");
    var a = document.getElementById("table_riwayat_pekerjaan");
    var b = document.getElementById("table_pengalaman_organisasi");
    var c = document.getElementById("table_keahlian");
    var d = document.getElementById("table_kontak_darurat");
    var e = document.getElementById("table_pemohon_pekerjaan");
	x.style.display = "none";
	y.style.display = "none";
    a.style.display = "block";
    b.style.display = "none";
    c.style.display = "none";
    d.style.display = "none";
    e.style.display = "none";
}

function tab4() {
	var x = document.getElementById("table_riwayat_kesehatan");
	var y = document.getElementById("table_riwayat_pendidikan");
    var a = document.getElementById("table_riwayat_pekerjaan");
    var b = document.getElementById("table_pengalaman_organisasi");
    var c = document.getElementById("table_keahlian");
    var d = document.getElementById("table_kontak_darurat");
    var e = document.getElementById("table_pemohon_pekerjaan");
	x.style.display = "none";
	y.style.display = "none";
    a.style.display = "none";
    b.style.display = "block";
    c.style.display = "none";
    d.style.display = "none";
    e.style.display = "none";
}

function tab5() {
	var x = document.getElementById("table_riwayat_kesehatan");
	var y = document.getElementById("table_riwayat_pendidikan");
    var a = document.getElementById("table_riwayat_pekerjaan");
    var b = document.getElementById("table_pengalaman_organisasi");
    var c = document.getElementById("table_keahlian");
    var d = document.getElementById("table_kontak_darurat");
    var e = document.getElementById("table_pemohon_pekerjaan");
	x.style.display = "none";
	y.style.display = "none";
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "block";
    d.style.display = "none";
    e.style.display = "none";
}

function tab6() {
	var x = document.getElementById("table_riwayat_kesehatan");
	var y = document.getElementById("table_riwayat_pendidikan");
    var a = document.getElementById("table_riwayat_pekerjaan");
    var b = document.getElementById("table_pengalaman_organisasi");
    var c = document.getElementById("table_keahlian");
    var d = document.getElementById("table_kontak_darurat");
    var e = document.getElementById("table_pemohon_pekerjaan");
	x.style.display = "none";
	y.style.display = "none";
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "none";
    d.style.display = "block";
    e.style.display = "none";
}

function tab7() {
	var x = document.getElementById("table_riwayat_kesehatan");
	var y = document.getElementById("table_riwayat_pendidikan");
    var a = document.getElementById("table_riwayat_pekerjaan");
    var b = document.getElementById("table_pengalaman_organisasi");
    var c = document.getElementById("table_keahlian");
    var d = document.getElementById("table_kontak_darurat");
    var e = document.getElementById("table_pemohon_pekerjaan");
	x.style.display = "none";
	y.style.display = "none";
    a.style.display = "none";
    b.style.display = "none";
    c.style.display = "none";
    d.style.display = "none";
    e.style.display = "block";
}
</script>
<script>
$('#formDetailPelamar').submit(function(e) {
        e.preventDefault();
        tinyMCE.triggerSave();

        let formData = new FormData(this);
        let elementsForm = $(this).find('button, input, textarea, select');

        elementsForm.attr('disabled', true);

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            dataType: 'json',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                elementsForm.removeAttr('disabled');

                if (response.RESULT == 'OK') {
                    swal({
                        title: response.MESSAGE,
                        type: 'success'
                    }, function() {
                        $('#modalresult').modal('hide');
                        window.location.reload();
                    });
                } else {
                    swal({
                        title: response.MESSAGE,
                        type: 'error'
                    });
                }
            }
        }).fail(function() {
            elementsForm.removeAttr('disabled');
            swal({
                title: 'Terjadi kesalahan',
                type: 'error'
            });
        });
    });
</script>