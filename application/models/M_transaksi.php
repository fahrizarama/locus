<?php

class M_transaksi extends CI_Model {

    public function insert_jurnal_umum($data) {

        return $this->db->insert('tbl_jurnal_umum', $data);
    }

    public function insert_data_hutang($data) {

        return $this->db->insert('tbl_data_hutang', $data);
    }

    //INSERT DETAIL JURNAL
    public function insert_detail_jurnal($nilai, $akun_debit, $akun_kredit, $latestID) {

        $query = $this->db->query("INSERT INTO tbl_jurnal_umum_detail VALUES ('', '$latestID', '$akun_debit', '1', '$nilai', '')");

        $query = $this->db->query("INSERT INTO tbl_jurnal_umum_detail VALUES ('', '$latestID', '$akun_kredit', '2', '$nilai', '')");

        return $query;
    }

    //INSERT LAPORAN
    public function insert_laporan($dataInsert, $nilai, $akun_debit, $akun_kredit) {

        $query = $this->insert_jurnal_umum($dataInsert);

        $latestID = $this->db->insert_id();

        $query = $this->insert_detail_jurnal($nilai, $akun_debit, $akun_kredit, $latestID);

        return $query;
    }

    //UPDATE SALDO AKUN
    public function update_saldo_akun_minus($id_akun, $nilai) {

        return $this->db->query("UPDATE tbl_akun SET saldo_akun=saldo_akun-$nilai WHERE id_akun=$id_akun");
    }

    public function update_saldo_akun_plus($id_akun, $nilai) {

        return $this->db->query("UPDATE tbl_akun SET saldo_akun=saldo_akun+$nilai WHERE id_akun=$id_akun");
    }

    //QUERY DATA PIUTANG
    public function insert_laporan_dan_data_piutang($dataInsert, $nilai, $akun_debit, $akun_kredit, $kontak) {

        $query = $this->insert_jurnal_umum($dataInsert);

        $latestID = $this->db->insert_id();

        $query = $this->insert_detail_jurnal($nilai, $akun_debit, $akun_kredit, $latestID);

        $query = $this->db->query("INSERT INTO tbl_data_piutang VALUES('', '$latestID', '$kontak', '$nilai', '$nilai')");

        return $query;
    }

    public function update_data_piutang($id, $nilai) {
        
        return $this->db->query("UPDATE tbl_data_piutang SET sisa=sisa-$nilai WHERE id_piutang=$id");
    }

    public function insert_data_setor($dataInsert, $nilai, $akun_debit, $akun_kredit, $id_piutang) {

        $query = $this->insert_jurnal_umum($dataInsert);

        $latestID = $this->db->insert_id();

        $query = $this->insert_detail_jurnal($nilai, $akun_debit, $akun_kredit, $latestID);

        $query = $this->db->query("INSERT INTO tbl_data_penyetoran_piutang VALUES ('', '$latestID', '$id_piutang')");

        return $query;
    }

    //QUERY DATA HUTANG
    public function insert_laporan_dan_data_hutang($dataInsert, $nilai, $akun_debit, $akun_kredit, $kontak) {

        $query = $this->insert_jurnal_umum($dataInsert);

        $latestID = $this->db->insert_id();

        $query = $this->insert_detail_jurnal($nilai, $akun_debit, $akun_kredit, $latestID);

        $query = $this->db->query("INSERT INTO tbl_data_hutang VALUES('', '$latestID', '$kontak', '$nilai', '$nilai')");

        return $query;
    }

    public function update_data_hutang($id, $nilai) {
        
        return $this->db->query("UPDATE tbl_data_hutang SET sisa=sisa-$nilai WHERE id_hutang=$id");
    }

    public function insert_data_bayar($dataInsert, $nilai, $akun_debit, $akun_kredit, $id_hutang) {

        $query = $this->insert_jurnal_umum($dataInsert);

        $latestID = $this->db->insert_id();

        $query = $this->insert_detail_jurnal($nilai, $akun_debit, $akun_kredit, $latestID);

        $query = $this->db->query("INSERT INTO tbl_data_pembayaran_hutang VALUES ('', '$latestID', '$id_hutang')");

        return $query;
    }

}