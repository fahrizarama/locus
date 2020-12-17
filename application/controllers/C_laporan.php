<?php

class C_laporan extends CI_Controller {

    public $kategori_aset = '1';
    public $kategori_modal = '2';
    public $kategori_pemasukan = '3';
    public $kategori_pengeluaran = '4';
    public $kategori_hutang = '5';
    public $kategori_piutang = '6';

    public function __construct() {
        parent::__construct();
        $this->load->model('M_laporan', 'laporan');
        $this->load->model('M_akun_pembukuan', 'akun');
        $this->load->model('M_transaksi', 'transaksi');
    }

    public function jurnal_umum() {
        $data['view_file'] = 'admin/moduls/laporan/V_jurnal_umum';
        $data['result'] = $this->laporan->get_jurnal_umum()->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function jurnal_umum_filter_tanggal() {
        $monthYear = $this->input->post('monthYear');
        $month = date('m', strtotime($monthYear));
        $year = date('Y', strtotime($monthYear));

        $data['view_file'] = 'admin/moduls/laporan/V_jurnal_umum';
        $data['result'] = $this->laporan->get_jurnal_umum($monthYear)->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function buku_besar() {

        $getAkunOne = $this->akun->get_akun_one($this->kategori_aset)->result();
        foreach ($getAkunOne as $item) {
            $id_akun = $item->id_akun;
        }

        $data['tanggal_awal'] = date('01-m-Y');
        $data['view_file'] = 'admin/moduls/laporan/V_buku_besar';
        $data['sidenav'] = 'admin/moduls/laporan/sidenav';
        $data['result'] = $this->laporan->get_buku_besar($id_akun)->result();
        $data['saldo'] = $this->laporan->get_saldo_awal_perbulan($id_akun)->result();
        $data['akun'] = $this->akun->get_akun($kategori = '', $id_akun)->result();
        $data['aset'] = $this->akun->get_akun($this->kategori_aset)->result();
        $data['modal'] = $this->akun->get_akun($this->kategori_modal)->result();
        $data['pemasukan'] = $this->akun->get_akun($this->kategori_pemasukan)->result();
        $data['pengeluaran'] = $this->akun->get_akun($this->kategori_pengeluaran)->result();
        $data['hutang'] = $this->akun->get_akun($this->kategori_hutang)->result();
        $data['piutang'] = $this->akun->get_akun($this->kategori_piutang)->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function buku_besar_akun($id_akun) {
        $data['tanggal_awal'] = date('01-m-Y');
        $data['view_file'] = 'admin/moduls/laporan/V_buku_besar';
        $data['sidenav'] = 'admin/moduls/laporan/sidenav';
        $data['result'] = $this->laporan->get_buku_besar($id_akun)->result();
        $data['saldo'] = $this->laporan->get_saldo_awal_perbulan($id_akun)->result();
        $data['akun'] = $this->akun->get_akun($kategori = '', $id_akun)->result();
        $data['aset'] = $this->akun->get_akun($this->kategori_aset)->result();
        $data['modal'] = $this->akun->get_akun($this->kategori_modal)->result();
        $data['pemasukan'] = $this->akun->get_akun($this->kategori_pemasukan)->result();
        $data['pengeluaran'] = $this->akun->get_akun($this->kategori_pengeluaran)->result();
        $data['hutang'] = $this->akun->get_akun($this->kategori_hutang)->result();
        $data['piutang'] = $this->akun->get_akun($this->kategori_piutang)->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function buku_besar_filter_tanggal() {
        $id_akun = $this->input->post('id_akun');
        $monthYear = $this->input->post('monthYear');
        $month = date('m', strtotime($monthYear));
        $year = date('Y', strtotime($monthYear));
        $tanggal_awal = "01-$month-$year";

        $data['tanggal_awal'] = $tanggal_awal;
        $data['view_file'] = 'admin/moduls/laporan/V_buku_besar';
        $data['sidenav'] = 'admin/moduls/laporan/sidenav';
        $data['result'] = $this->laporan->get_buku_besar($id_akun, $monthYear)->result();
        $data['saldo'] = $this->laporan->get_saldo_awal_perbulan($id_akun, $month, $year)->result();
        $data['akun'] = $this->akun->get_akun($kategori = '', $id_akun)->result();
        $data['aset'] = $this->akun->get_akun($this->kategori_aset)->result();
        $data['modal'] = $this->akun->get_akun($this->kategori_modal)->result();
        $data['pemasukan'] = $this->akun->get_akun($this->kategori_pemasukan)->result();
        $data['pengeluaran'] = $this->akun->get_akun($this->kategori_pengeluaran)->result();
        $data['hutang'] = $this->akun->get_akun($this->kategori_hutang)->result();
        $data['piutang'] = $this->akun->get_akun($this->kategori_piutang)->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function neraca_saldo() {
        $data['view_file'] = 'admin/moduls/laporan/V_neraca_saldo';
        $data['result'] = $this->laporan->get_neraca_saldo()->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function neraca_saldo_filter_tanggal() {
        $monthYear = $this->input->post('monthYear');
        $month = date('m', strtotime($monthYear));
        $year = date('Y', strtotime($monthYear));

        $data['view_file'] = 'admin/moduls/laporan/V_neraca_saldo';
        $data['result'] = $this->laporan->get_neraca_saldo($month, $year)->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function neraca() {
        $data['view_file'] = 'admin/moduls/laporan/V_neraca';
        $data['aktiva'] = $this->laporan->get_neraca_akun_aktiva()->result();
        $data['pasiva'] = $this->laporan->get_neraca_akun_pasiva()->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function neraca_filter_tanggal() {
        $monthYear = $this->input->post('monthYear');
        $month = date('m', strtotime($monthYear));
        $year = date('Y', strtotime($monthYear));

        $data['view_file'] = 'admin/moduls/laporan/V_neraca';
        $data['aktiva'] = $this->laporan->get_neraca_akun_aktiva($month, $year)->result();
        $data['pasiva'] = $this->laporan->get_neraca_akun_pasiva($month, $year)->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function laba_rugi() {
        $data['view_file'] = 'admin/moduls/laporan/V_laba_rugi';
        $data['pemasukan'] = $this->laporan->get_pemasukan()->result();
        $data['pengeluaran'] = $this->laporan->get_pengeluaran()->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function laba_rugi_filter_tanggal() {
        $monthYear = $this->input->post('monthYear');
        $month = date('m', strtotime($monthYear));
        $year = date('Y', strtotime($monthYear));

        $data['view_file'] = 'admin/moduls/laporan/V_laba_rugi';
        $data['pemasukan'] = $this->laporan->get_pemasukan($month, $year)->result();
        $data['pengeluaran'] = $this->laporan->get_pengeluaran($month, $year)->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function data_hutang() {
        $data['view_file'] = 'admin/moduls/laporan/V_data_hutang';
        $data['result'] = $this->laporan->get_data_hutang()->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function data_piutang() {
        $data['view_file'] = 'admin/moduls/laporan/V_data_piutang';
        $data['result'] = $this->laporan->get_data_piutang()->result();
        return $this->load->view('admin/admin_view', $data);
    }

    //TABEL KONTAK
    public function data_kontak() {
        $data['view_file'] = 'admin/moduls/laporan/V_data_kontak';
        $data['result'] = $this->laporan->get_kontak()->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function add_kontak() {
        $nama = $this->input->post('nama');       
        $telp = $this->input->post('telp');
        $email = $this->input->post('email');
        $perusahaan = $this->input->post('perusahaan');
        $alamat = $this->input->post('alamat');

        $dataInsert['nama'] = $nama;
        $dataInsert['telp'] = $telp;
        $dataInsert['email'] = $email;
        $dataInsert['perusahaan'] = $perusahaan;
        $dataInsert['alamat'] = $alamat;

        if ($this->laporan->insert_kontak($dataInsert)) {
            echo json_encode(array(
                'RESULT' => 'OK',
                'MESSAGE' => 'Data berhasil ditambahkan'
            ));
            exit;
        } else {
            echo json_encode(array(
                'RESULT' => 'FAILED',
                'MESSAGE' => 'Gagal menambahkan data'
            ));
            exit;
        }
    }

    public function hapus_kontak()
    {
        $id = getPost('id', null);

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->laporan->get_kontak($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');
        }

        if ($this->laporan->delete_kontak($id)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }

    public function modal_edit_kontak()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->laporan->get_kontak($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['data'] = $getData->row();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/laporan/edit/edit_kontak', $data, true)
        ));
    }

    public function edit_kontak()
    {
        $id = getPost('id_kontak');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->laporan->get_kontak($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $nama = $this->input->post('nama');       
        $telp = $this->input->post('telp');
        $email = $this->input->post('email');
        $perusahaan = $this->input->post('perusahaan');
        $alamat = $this->input->post('alamat');

        $updateData['nama'] = $nama;
        $updateData['telp'] = $telp;
        $updateData['email'] = $email;
        $updateData['perusahaan'] = $perusahaan;
        $updateData['alamat'] = $alamat;

        if ($this->laporan->update_kontak($id, $updateData)) {
            return JSONResponseDefault('OK', 'Data berhasil diubah');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal mengubah data');
        }
    }

    //PENYETORAN PIUTANG
    public function hapus_piutang()
    {
        $id = getPost('id', null);

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->laporan->get_data_piutang($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');
        }

        if ($this->laporan->delete_data_piutang($id)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }

    public function modal_setor_piutang()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->laporan->get_data_piutang($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['aset'] = $this->akun->get_akun($this->kategori_aset)->result();
        $data['piutang'] = $this->akun->get_akun($this->kategori_piutang)->result();
        $data['data'] = $getData->row();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/laporan/edit/setor_piutang', $data, true)
        ));
    }

    public function setor_piutang()
    {
        $id = getPost('id_piutang');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->laporan->get_data_piutang($id)->result();

        $tanggal = $this->input->post('tanggal_transaksi');
        $akun_kredit = $this->input->post('id_akun_kredit');
        $akun_debit = $this->input->post('id_akun_debit');
        $nilai = $this->input->post('nilai');
        $referensi = $this->input->post('referensi');
        $keterangan = $this->input->post('keterangan');

        $dataInsert['tanggal_transaksi'] = $tanggal;
        $dataInsert['ref'] = $referensi;
        $dataInsert['keterangan'] = $keterangan;

        foreach($getData as $item) {
            $sisa = $item->sisa;
        }

        if($nilai > $sisa) {
            return JSONResponseDefault('FAILED', 'Penyetoran Melebihi Sisa');
        } else {
            if ($this->transaksi->insert_data_setor($dataInsert, $nilai, $akun_debit, $akun_kredit, $id) && $this->transaksi->update_data_piutang($id, $nilai) && $this->transaksi->update_saldo_akun_plus($akun_debit, $nilai)) {
                return JSONResponseDefault('OK', 'Penyetoran Berhasil');
            } else {
                return JSONResponseDefault('FAILED', 'Gagal mengubah data');
            }
        }
    }

    public function modal_detail_setor_piutang()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->laporan->get_detail_penyetoran_piutang($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan Penyetoran Belum Dilakukan');
        }

        $data['aset'] = $this->akun->get_akun($this->kategori_aset)->result();
        $data['piutang'] = $this->akun->get_akun($this->kategori_piutang)->result();
        $data['data'] = $getData->result();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/laporan/edit/detail_setor_piutang', $data, true)
        ));
    }

    public function hapus_detail_piutang()
    {
        $id = getPost('id', null);

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->laporan->get_detail_penyetoran_piutang_by_id($id)->result();

        foreach($getData as $item) {
            $id_jurnal_umum = $item->id_jurnal_umum;
            $id_piutang = $item->id_piutang;
            $nilai = $item->nilai;
            $akun_debit = $item->id_akun;
        }

        if ($this->laporan->delete_and_reverse_detail_piutang($id, $id_jurnal_umum, $id_piutang, $nilai) && $this->transaksi->update_saldo_akun_minus($akun_debit, $nilai)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }


    //BAYAR HUTANG
    public function hapus_hutang()
    {
        $id = getPost('id', null);

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->laporan->get_data_hutang($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');
        }

        if ($this->laporan->delete_data_piutang($id)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }

    public function modal_bayar_hutang()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->laporan->get_data_hutang($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['aset'] = $this->akun->get_akun($this->kategori_aset)->result();
        $data['hutang'] = $this->akun->get_akun($this->kategori_hutang)->result();
        $data['data'] = $getData->row();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/laporan/edit/bayar_hutang', $data, true)
        ));
    }

    public function bayar_hutang()
    {
        $id = getPost('id_hutang');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->laporan->get_data_hutang($id)->result();

        $tanggal = $this->input->post('tanggal_transaksi');
        $akun_kredit = $this->input->post('id_akun_kredit');
        $akun_debit = $this->input->post('id_akun_debit');
        $nilai = $this->input->post('nilai');
        $referensi = $this->input->post('referensi');
        $keterangan = $this->input->post('keterangan');

        $dataInsert['tanggal_transaksi'] = $tanggal;
        $dataInsert['ref'] = $referensi;
        $dataInsert['keterangan'] = $keterangan;

        foreach($getData as $item) {
            $sisa = $item->sisa;
        }

        if($nilai > $sisa) {
            return JSONResponseDefault('FAILED', 'Pembayaran Melebihi Sisa');
        } else {
            if ($this->transaksi->insert_data_bayar($dataInsert, $nilai, $akun_debit, $akun_kredit, $id) && $this->transaksi->update_data_hutang($id, $nilai) && $this->transaksi->update_saldo_akun_minus($akun_kredit, $nilai)) {
                return JSONResponseDefault('OK', 'Pembayaran Berhasil');
            } else {
                return JSONResponseDefault('FAILED', 'Gagal mengubah data');
            }
        }
    }

    public function modal_detail_bayar_hutang()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->laporan->get_detail_pembayaran_hutang($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan Pembayaran Belum Dilakukan');
        }

        $data['data'] = $getData->result();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/laporan/edit/detail_bayar_hutang', $data, true)
        ));
    }

    public function hapus_detail_hutang()
    {
        $id = getPost('id', null);

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->laporan->get_detail_pembayaran_hutang_by_id($id)->result();

        foreach($getData as $item) {
            $id_jurnal_umum = $item->id_jurnal_umum;
            $id_hutang = $item->id_hutang;
            $nilai = $item->nilai;
            $akun_kredit = $item->id_akun;
        }

        if ($this->laporan->delete_and_reverse_detail_hutang($id, $id_jurnal_umum, $id_hutang, $nilai) && $this->transaksi->update_saldo_akun_plus($akun_kredit, $nilai)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }

    //HAPUS DAN EDIT JURNAL DAN JURNAL DETAIL
    public function hapus_jurnal() {
        $id = getPost('id', null);

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        if ($this->laporan->delete_jurnal($id) && $this->laporan->delete_jurnal_detail($id)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }

    public function modal_edit_jurnal() {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->laporan->get_jurnal_umum('', $id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['akun_kredit'] = $this->laporan->get_akun_kredit($id);
        $data['data'] = $getData->result();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/laporan/edit/detail_jurnal', $data, true)
        ));
    }

    public function edit_jurnal()
    {
        $id = getPost('id_jurnal_umum');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $nilai = $this->input->post('nilai');       
        $ref = $this->input->post('referensi');
        $keterangan = $this->input->post('keterangan');

        $updateJurnal['keterangan'] = $keterangan;
        $updateJurnal['ref'] = $ref;

        $updateJurnalDetail['nilai'] = $nilai;

        if ($this->laporan->update_jurnal($id, $updateJurnal) && $this->laporan->update_jurnal_detail($id, $updateJurnalDetail)) {
            return JSONResponseDefault('OK', 'Data berhasil diubah');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal mengubah data');
        }
    }
}