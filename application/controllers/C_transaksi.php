<?php

class C_transaksi extends CI_Controller
{
    public $kategori_aset = '1';
    public $kategori_modal = '2';
    public $kategori_pemasukan = '3';
    public $kategori_pengeluaran = '4';
    public $kategori_hutang = '5';
    public $kategori_piutang = '6';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_akun_pembukuan', 'akun');
        $this->load->model('M_transaksi', 'transaksi');
        $this->load->model('M_laporan', 'laporan');
    }

    function kontak() {
        $data['view_file'] = 'admin/moduls/laporan/V_data_kontak';
        $data['result'] = $this->laporan->get_kontak()->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function pemasukan_tunai()
    {
        $data['view_file'] = 'admin/moduls/transaksi/V_pemasukan_tunai';
        $data['aset'] = $this->akun->get_akun($this->kategori_aset)->result();
        $data['pemasukan'] = $this->akun->get_akun($this->kategori_pemasukan)->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function pemasukan_piutang()
    {
        $checkKontak = $this->laporan->get_kontak();

        if($checkKontak->num_rows() == 0 ) {
            $this->kontak();
        } else {
            $data['view_file'] = 'admin/moduls/transaksi/V_pemasukan_piutang';
            $data['pemasukan'] = $this->akun->get_akun($this->kategori_pemasukan)->result();
            $data['piutang'] = $this->akun->get_akun($this->kategori_piutang)->result();
            $data['kontak'] = $this->laporan->get_kontak()->result();
            return $this->load->view('admin/admin_view', $data);
        }
    }

    public function pengeluaran_tunai()
    {
        $data['view_file'] = 'admin/moduls/transaksi/V_pengeluaran_tunai';
        $data['aset'] = $this->akun->get_akun($this->kategori_aset)->result();
        $data['pengeluaran'] = $this->akun->get_akun($this->kategori_pengeluaran)->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function pengeluaran_hutang()
    {
        $checkKontak = $this->laporan->get_kontak();

        if($checkKontak->num_rows() == 0 ) {
            $this->kontak();
        } else {
            $data['view_file'] = 'admin/moduls/transaksi/V_pengeluaran_hutang';
            $data['pengeluaran'] = $this->akun->get_akun($this->kategori_pengeluaran)->result();
            $data['hutang'] = $this->akun->get_akun($this->kategori_hutang)->result();
            $data['kontak'] = $this->laporan->get_kontak()->result();
            return $this->load->view('admin/admin_view', $data);
        }
    }

    public function tambah_hutang()
    {
        $checkKontak = $this->laporan->get_kontak();

        if($checkKontak->num_rows() == 0 ) {
            $this->kontak();
        } else {
            $data['view_file'] = 'admin/moduls/transaksi/V_tambah_hutang';
            $data['aset'] = $this->akun->get_akun($this->kategori_aset)->result();
            $data['hutang'] = $this->akun->get_akun($this->kategori_hutang)->result();
            $data['kontak'] = $this->laporan->get_kontak()->result();
            return $this->load->view('admin/admin_view', $data);
        }
    }

    public function tambah_piutang()
    {
        $checkKontak = $this->laporan->get_kontak();

        if($checkKontak->num_rows() == 0 ) {
            $this->kontak();
        } else {
            $data['view_file'] = 'admin/moduls/transaksi/V_tambah_piutang';
            $data['aset'] = $this->akun->get_akun($this->kategori_aset)->result();
            $data['piutang'] = $this->akun->get_akun($this->kategori_piutang)->result();
            $data['kontak'] = $this->laporan->get_kontak()->result();
            return $this->load->view('admin/admin_view', $data);
        }
    }

    public function tambah_modal()
    {
        $data['view_file'] = 'admin/moduls/transaksi/V_tambah_modal';
        $data['aset'] = $this->akun->get_akun($this->kategori_aset)->result();
        $data['modal'] = $this->akun->get_akun($this->kategori_modal)->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function tarik_modal()
    {
        $data['view_file'] = 'admin/moduls/transaksi/V_tarik_modal';
        $data['aset'] = $this->akun->get_akun($this->kategori_aset)->result();
        $data['modal'] = $this->akun->get_akun($this->kategori_modal)->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function alih_aset()
    {
        $data['view_file'] = 'admin/moduls/transaksi/V_alih_aset';
        $data['aset'] = $this->akun->get_akun($this->kategori_aset)->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function saldo_awal()
    {
        $data['view_file'] = 'admin/moduls/transaksi/V_saldo_awal';
        $data['akun'] = $this->akun->get_akun()->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function add_transaksi_pemasukan_tunai()
    {
        $tanggal = $this->input->post('tanggal_transaksi');       
        $akun_kredit = $this->input->post('id_akun_kredit');
        $akun_debit = $this->input->post('id_akun_debit');
        $nilai = $this->input->post('nilai');
        $referensi = $this->input->post('referensi');
        $keterangan = $this->input->post('keterangan');
        
        $dataInsert['tanggal_transaksi'] = $tanggal;
        $dataInsert['ref'] = $referensi;
        $dataInsert['keterangan'] = $keterangan;

        if ($this->transaksi->insert_laporan($dataInsert, $nilai, $akun_debit, $akun_kredit) && $this->transaksi->update_saldo_akun_plus($akun_debit, $nilai)) {
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

    public function add_transaksi_pemasukan_piutang()
    {
        $tanggal = $this->input->post('tanggal_transaksi');       
        $akun_kredit = $this->input->post('id_akun_kredit');
        $akun_debit = $this->input->post('id_akun_debit');
        $nilai = $this->input->post('nilai');
        $referensi = $this->input->post('referensi');
        $keterangan = $this->input->post('keterangan');
        $kontak = $this->input->post('id_kontak');
        
        $dataInsert['tanggal_transaksi'] = $tanggal;
        $dataInsert['ref'] = $referensi;
        $dataInsert['keterangan'] = $keterangan;

        if ($this->transaksi->insert_laporan_dan_data_piutang($dataInsert, $nilai, $akun_debit, $akun_kredit, $kontak)) {
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

    public function add_transaksi_pengeluaran_tunai()
    {
        $tanggal = $this->input->post('tanggal_transaksi');       
        $akun_kredit = $this->input->post('id_akun_kredit');
        $akun_debit = $this->input->post('id_akun_debit');
        $nilai = $this->input->post('nilai');
        $referensi = $this->input->post('referensi');
        $keterangan = $this->input->post('keterangan');
        
        $dataInsert['tanggal_transaksi'] = $tanggal;
        $dataInsert['ref'] = $referensi;
        $dataInsert['keterangan'] = $keterangan;

        $getSaldoAkun = $this->akun->get_akun($this->kategori_aset, $akun_kredit)->result();
        foreach ($getSaldoAkun as $item) {
            $cekSaldo = $item->saldo_akun;
        }
        
        if($cekSaldo < $nilai) {
            echo json_encode(array(
                'RESULT' => 'FAILED',
                'MESSAGE' => 'Saldo Tidak Mencukupi'
            ));
            exit;
        } else {
            if ($this->transaksi->insert_laporan($dataInsert, $nilai, $akun_debit, $akun_kredit) && $this->transaksi->update_saldo_akun_minus($akun_kredit, $nilai)) {
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
    }

    public function add_transaksi_pengeluaran_hutang()
    {
        $tanggal = $this->input->post('tanggal_transaksi');       
        $akun_kredit = $this->input->post('id_akun_kredit');
        $akun_debit = $this->input->post('id_akun_debit');
        $nilai = $this->input->post('nilai');
        $referensi = $this->input->post('referensi');
        $keterangan = $this->input->post('keterangan');
        $kontak = $this->input->post('id_kontak');
        
        $dataInsert['tanggal_transaksi'] = $tanggal;
        $dataInsert['ref'] = $referensi;
        $dataInsert['keterangan'] = $keterangan;

        if ($this->transaksi->insert_laporan_dan_data_hutang($dataInsert, $nilai, $akun_debit, $akun_kredit, $kontak)) {
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

    public function add_transaksi_tambah_hutang()
    {
        $tanggal = $this->input->post('tanggal_transaksi');       
        $akun_kredit = $this->input->post('id_akun_kredit');
        $akun_debit = $this->input->post('id_akun_debit');
        $nilai = $this->input->post('nilai');
        $referensi = $this->input->post('referensi');
        $keterangan = $this->input->post('keterangan');
        $kontak = $this->input->post('id_kontak');
        
        $dataInsert['tanggal_transaksi'] = $tanggal;
        $dataInsert['ref'] = $referensi;
        $dataInsert['keterangan'] = $keterangan;

        if ($this->transaksi->insert_laporan_dan_data_hutang($dataInsert, $nilai, $akun_debit, $akun_kredit, $kontak) && $this->transaksi->update_saldo_akun_plus($akun_debit, $nilai)) {
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

    public function add_transaksi_tambah_piutang()
    {
        $tanggal = $this->input->post('tanggal_transaksi');       
        $akun_kredit = $this->input->post('id_akun_kredit');
        $akun_debit = $this->input->post('id_akun_debit');
        $nilai = $this->input->post('nilai');
        $referensi = $this->input->post('referensi');
        $keterangan = $this->input->post('keterangan');
        $kontak = $this->input->post('id_kontak');
        
        $dataInsert['tanggal_transaksi'] = $tanggal;
        $dataInsert['ref'] = $referensi;
        $dataInsert['keterangan'] = $keterangan;

        $getSaldoAkun = $this->akun->get_akun($this->kategori_aset, $akun_kredit)->result();
        foreach ($getSaldoAkun as $item) {
            $cekSaldo = $item->saldo_akun;
        }

        if($cekSaldo < $nilai) {
            echo json_encode(array(
                'RESULT' => 'FAILED',
                'MESSAGE' => 'Saldo Tidak Mencukupi'
            ));
            exit;
        }else {
            if ($this->transaksi->insert_laporan_dan_data_piutang($dataInsert, $nilai, $akun_debit, $akun_kredit, $kontak) && $this->transaksi->update_saldo_akun_minus($akun_kredit, $nilai)) {
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
    }

    public function add_transaksi_tambah_modal()
    {
        $tanggal = $this->input->post('tanggal_transaksi');       
        $akun_kredit = $this->input->post('id_akun_kredit');
        $akun_debit = $this->input->post('id_akun_debit');
        $nilai = $this->input->post('nilai');
        $referensi = $this->input->post('referensi');
        $keterangan = $this->input->post('keterangan');
        
        $dataInsert['tanggal_transaksi'] = $tanggal;
        $dataInsert['ref'] = $referensi;
        $dataInsert['keterangan'] = $keterangan;

        if ($this->transaksi->insert_laporan($dataInsert, $nilai, $akun_debit, $akun_kredit) && $this->transaksi->update_saldo_akun_plus($akun_debit, $nilai)) {
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

    public function add_transaksi_tarik_modal()
    {
        $tanggal = $this->input->post('tanggal_transaksi');       
        $akun_kredit = $this->input->post('id_akun_kredit');
        $akun_debit = $this->input->post('id_akun_debit');
        $nilai = $this->input->post('nilai');
        $referensi = $this->input->post('referensi');
        $keterangan = $this->input->post('keterangan');
        
        $dataInsert['tanggal_transaksi'] = $tanggal;
        $dataInsert['ref'] = $referensi;
        $dataInsert['keterangan'] = $keterangan;

        $getSaldoAkun = $this->akun->get_akun($this->kategori_aset, $akun_kredit)->result();
        foreach ($getSaldoAkun as $item) {
            $cekSaldo = $item->saldo_akun;
        }

        if($cekSaldo < $nilai) {
            echo json_encode(array(
                'RESULT' => 'FAILED',
                'MESSAGE' => 'Saldo Tidak Mencukupi'
            ));
            exit;
        }else {
            if ($this->transaksi->insert_laporan($dataInsert, $nilai, $akun_debit, $akun_kredit) && $this->transaksi->update_saldo_akun_minus($akun_kredit, $nilai)) {
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
    }

    public function add_transaksi_alih_aset()
    {
        $tanggal = $this->input->post('tanggal_transaksi');       
        $akun_kredit = $this->input->post('id_akun_kredit');
        $akun_debit = $this->input->post('id_akun_debit');
        $nilai = $this->input->post('nilai');
        $referensi = $this->input->post('referensi');
        $keterangan = $this->input->post('keterangan');
        
        $dataInsert['tanggal_transaksi'] = $tanggal;
        $dataInsert['ref'] = $referensi;
        $dataInsert['keterangan'] = $keterangan;

        $getSaldoAkun = $this->akun->get_akun($this->kategori_aset, $akun_kredit)->result();
        foreach ($getSaldoAkun as $item) {
            $cekSaldo = $item->saldo_akun;
        }

        if($cekSaldo < $nilai) {
            echo json_encode(array(
                'RESULT' => 'FAILED',
                'MESSAGE' => 'Saldo Tidak Mencukupi'
            ));
            exit;
        }else {
            if ($this->transaksi->insert_laporan($dataInsert, $nilai, $akun_debit, $akun_kredit) && $this->transaksi->update_saldo_akun_minus($akun_kredit, $nilai) && $this->transaksi->update_saldo_akun_plus($akun_debit, $nilai)) {
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
    }

    public function add_transaksi_saldo_awal()
    {
        $tanggal = $this->input->post('tanggal_transaksi');       
        $akun_kredit = '0000';
        $akun_debit = $this->input->post('id_akun');
        $nilai = $this->input->post('nilai');
        $referensi = $this->input->post('referensi');
        $keterangan = $this->input->post('keterangan');
        
        $dataInsert['tanggal_transaksi'] = $tanggal;
        $dataInsert['ref'] = $referensi;
        $dataInsert['keterangan'] = $keterangan;

        if ($this->transaksi->insert_laporan($dataInsert, $nilai, $akun_debit, $akun_kredit) && $this->transaksi->update_saldo_akun_plus($akun_debit, $nilai)) {
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

}
