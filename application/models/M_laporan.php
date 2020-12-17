<?php

class M_laporan extends CI_Model {

    // CRUD JURNAL DAN DETAIL JURNAL
    public function get_jurnal_umum($tanggal = '', $id = '') {
        $this->db->select('*');
        $this->db->from('tbl_jurnal_umum a');
        $this->db->join('tbl_jurnal_umum_detail b', 'a.id_jurnal_umum=b.id_jurnal_umum', 'left');
        $this->db->join('tbl_akun c', 'b.id_akun=c.id_akun', 'left');

        if($tanggal) {
            $this->db->like('tanggal_transaksi', $tanggal);
        } else {
            $this->db->where('MONTH(tanggal_transaksi) = MONTH(CURDATE())');
            $this->db->where('YEAR(tanggal_transaksi) = YEAR(CURDATE())');
        }

        if($id) {
            $this->db->where('a.id_jurnal_umum', $id);
            $this->db->where('b.debit_kredit=1');
        }

        $this->db->order_by('tanggal_transaksi ASC');

        return $this->db->get();
    }

    public function get_akun_kredit($id) {
        $this->db->select('c.nama_akun');
        $this->db->from('tbl_jurnal_umum a');
        $this->db->join('tbl_jurnal_umum_detail b', 'a.id_jurnal_umum=b.id_jurnal_umum');
        $this->db->join('tbl_akun c', 'b.id_akun=c.id_akun');
        $this->db->where('a.id_jurnal_umum', $id);
        $this->db->where('b.debit_kredit=2');
        return $this->db->get()->row();
    }

    public function delete_jurnal($id) {
        $this->db->where('id_jurnal_umum', $id);
        return $this->db->delete('tbl_jurnal_umum');
    }

    public function delete_jurnal_detail($id) {
        $this->db->where('id_jurnal_umum', $id);
        return $this->db->delete('tbl_jurnal_umum_detail');
    }

    public function update_jurnal($id, $data = array())
    {
        $this->db->set($data);
        $this->db->where('id_jurnal_umum', $id);
        return $this->db->update('tbl_jurnal_umum');
    }

    public function update_jurnal_detail($id, $data = array())
    {
        $this->db->set($data);
        $this->db->where('id_jurnal_umum', $id);
        return $this->db->update('tbl_jurnal_umum_detail');
    }

    //BUKU BESAR
    public function get_buku_besar($id, $tanggal = '') {
        $this->db->select('*');
        $this->db->from('tbl_jurnal_umum_detail a');
        $this->db->join('tbl_jurnal_umum b', 'a.id_jurnal_umum=b.id_jurnal_umum');
        $this->db->where('a.id_akun', $id);

        if($tanggal) {
            $this->db->like('b.tanggal_transaksi', $tanggal);
        } else {
            $this->db->where('MONTH(b.tanggal_transaksi) = MONTH(CURDATE())');
            $this->db->where('YEAR(b.tanggal_transaksi) = YEAR(CURDATE())');
        }

        $this->db->order_by('b.tanggal_transaksi ASC');

        return $this->db->get();
    }

    public function get_saldo_awal_perbulan($id, $bulan = '', $tahun = '') {
        $this->db->select('SUM(IF(a.debit_kredit=1, a.nilai, 0)) AS debitTotal, SUM(IF(a.debit_kredit=2, a.nilai, 0)) AS kreditTotal');
        $this->db->from('tbl_jurnal_umum_detail a');
        $this->db->join('tbl_jurnal_umum b', 'a.id_jurnal_umum=b.id_jurnal_umum');
        $this->db->where('a.id_akun', $id);

        if ($bulan) {
            if ($tahun) {
                $this->db->where("MONTH(b.tanggal_transaksi) < $bulan");
                $this->db->where("YEAR(b.tanggal_transaksi) = $tahun");
            } else {
                $this->db->where("MONTH(b.tanggal_transaksi) < $bulan");
                $this->db->where("YEAR(b.tanggal_transaksi) = YEAR(CURDATE())");
            }
        } else {
            if ($tahun) {
                $this->db->where("MONTH(b.tanggal_transaksi) < MONTH(CURDATE())");
                $this->db->where("YEAR(b.tanggal_transaksi) = $tahun");
            } else {
                $this->db->where('MONTH(b.tanggal_transaksi) < MONTH(CURDATE())');
                $this->db->where('YEAR(b.tanggal_transaksi) = YEAR(CURDATE())');
            }
        }

        $this->db->order_by('b.tanggal_transaksi ASC');

        return $this->db->get();
    }

    public function get_neraca_saldo($month = '', $year = '') {
        $this->db->select('*, SUM(IF(a.debit_kredit=1, a.nilai, 0)) AS debitTotal, SUM(IF(a.debit_kredit=2, a.nilai, 0)) AS kreditTotal');
        $this->db->from('tbl_jurnal_umum_detail a');
        $this->db->join('tbl_akun b', 'a.id_akun=b.id_akun', 'right');
        $this->db->join('tbl_jurnal_umum c', 'a.id_jurnal_umum=c.id_jurnal_umum', 'left');
        
        if($month && $year) {
            $this->db->group_start();
            $this->db->where("MONTH(c.tanggal_transaksi) <= $month");
            $this->db->where("YEAR(c.tanggal_transaksi) = $year");
            $this->db->or_where('c.tanggal_transaksi', NULL);
            $this->db->group_end();
        } else {
            $this->db->group_start();
            $this->db->where('MONTH(c.tanggal_transaksi) <= MONTH(CURDATE())');
            $this->db->where('YEAR(c.tanggal_transaksi) = YEAR(CURDATE())');
            $this->db->or_where('c.tanggal_transaksi', NULL);
            $this->db->group_end();
        }

        $this->db->group_by('b.id_akun');
        $this->db->order_by('b.kategori_akun asc');

        return $this->db->get();
    }

    public function get_neraca_akun_aktiva($month = '', $year = '') {
        $this->db->select('*, SUM(IF(a.debit_kredit=1, a.nilai, 0)) AS debitTotal, SUM(IF(a.debit_kredit=2, a.nilai, 0)) AS kreditTotal');
        $this->db->from('tbl_jurnal_umum_detail a');
        $this->db->join('tbl_akun b', 'a.id_akun=b.id_akun', 'right');
        $this->db->join('tbl_jurnal_umum c', 'a.id_jurnal_umum=c.id_jurnal_umum', 'left');

        if($month && $year) {
            $this->db->group_start();
            $this->db->where("MONTH(c.tanggal_transaksi) <= $month");
            $this->db->where("YEAR(c.tanggal_transaksi) = $year");
            $this->db->or_where('c.tanggal_transaksi', NULL);
            $this->db->group_end();
        } else {
            $this->db->group_start();
            $this->db->where('MONTH(c.tanggal_transaksi) <= MONTH(CURDATE())');
            $this->db->where('YEAR(c.tanggal_transaksi) = YEAR(CURDATE())');
            $this->db->or_where('c.tanggal_transaksi', NULL);
            $this->db->group_end();
        }

        $this->db->where('b.kategori_akun != 2');
        $this->db->where('b.kategori_akun != 3');
        $this->db->where('b.kategori_akun != 4');
        $this->db->where('b.kategori_akun != 5');
        $this->db->group_by('b.id_akun');
        $this->db->order_by('b.kategori_akun asc');

        return $this->db->get();
    }

    public function get_neraca_akun_pasiva($month = '', $year = '') {
        $this->db->select('*, SUM(IF(a.debit_kredit=1, a.nilai, 0)) AS debitTotal, SUM(IF(a.debit_kredit=2, a.nilai, 0)) AS kreditTotal');
        $this->db->from('tbl_jurnal_umum_detail a');
        $this->db->join('tbl_akun b', 'a.id_akun=b.id_akun', 'right');
        $this->db->join('tbl_jurnal_umum c', 'a.id_jurnal_umum=c.id_jurnal_umum', 'left');

        if($month && $year) {
            $this->db->group_start();
            $this->db->where("MONTH(c.tanggal_transaksi) <= $month");
            $this->db->where("YEAR(c.tanggal_transaksi) = $year");
            $this->db->or_where('c.tanggal_transaksi', NULL);
            $this->db->group_end();
        } else {
            $this->db->group_start();
            $this->db->where('MONTH(c.tanggal_transaksi) <= MONTH(CURDATE())');
            $this->db->where('YEAR(c.tanggal_transaksi) = YEAR(CURDATE())');
            $this->db->or_where('c.tanggal_transaksi', NULL);
            $this->db->group_end();
        }

        $this->db->where('b.kategori_akun != 1');
        $this->db->where('b.kategori_akun != 3');
        $this->db->where('b.kategori_akun != 4');
        $this->db->where('b.kategori_akun != 6');
        $this->db->group_by('b.id_akun');
        $this->db->order_by('b.kategori_akun asc');

        return $this->db->get();
    }

    //GET LABA RUGI
    public function get_pemasukan($month = '', $year = '') {
        $this->db->select('*, SUM(IF(a.debit_kredit=1, a.nilai, 0)) AS debitTotal, SUM(IF(a.debit_kredit=2, a.nilai, 0)) AS kreditTotal');
        $this->db->from('tbl_jurnal_umum_detail a');
        $this->db->join('tbl_akun b', 'a.id_akun=b.id_akun', 'right');
        $this->db->join('tbl_jurnal_umum c', 'a.id_jurnal_umum=c.id_jurnal_umum', 'left');

        if($month && $year) {
            $this->db->group_start();
            $this->db->where("MONTH(c.tanggal_transaksi) <= $month");
            $this->db->where("YEAR(c.tanggal_transaksi) = $year");
            $this->db->or_where('c.tanggal_transaksi', NULL);
            $this->db->group_end();
        } else {
            $this->db->group_start();
            $this->db->where('MONTH(c.tanggal_transaksi) <= MONTH(CURDATE())');
            $this->db->where('YEAR(c.tanggal_transaksi) = YEAR(CURDATE())');
            $this->db->or_where('c.tanggal_transaksi', NULL);
            $this->db->group_end();
        }

        $this->db->where('b.kategori_akun = 3');
        $this->db->group_by('b.id_akun');
        $this->db->order_by('b.kategori_akun asc');

        return $this->db->get();
    }

    public function get_pengeluaran($month = '', $year = '') {
        $this->db->select('*, SUM(IF(a.debit_kredit=1, a.nilai, 0)) AS debitTotal, SUM(IF(a.debit_kredit=2, a.nilai, 0)) AS kreditTotal');
        $this->db->from('tbl_jurnal_umum_detail a');
        $this->db->join('tbl_akun b', 'a.id_akun=b.id_akun', 'right');
        $this->db->join('tbl_jurnal_umum c', 'a.id_jurnal_umum=c.id_jurnal_umum', 'left');

        if($month && $year) {
            $this->db->group_start();
            $this->db->where("MONTH(c.tanggal_transaksi) <= $month");
            $this->db->where("YEAR(c.tanggal_transaksi) = $year");
            $this->db->or_where('c.tanggal_transaksi', NULL);
            $this->db->group_end();
        } else {
            $this->db->group_start();
            $this->db->where('MONTH(c.tanggal_transaksi) <= MONTH(CURDATE())');
            $this->db->where('YEAR(c.tanggal_transaksi) = YEAR(CURDATE())');
            $this->db->or_where('c.tanggal_transaksi', NULL);
            $this->db->group_end();
        }
        $this->db->where('b.kategori_akun = 4');

        $this->db->group_by('b.id_akun');
        $this->db->order_by('b.kategori_akun asc');

        return $this->db->get();
    }

    //CRUD QUERY TABEL DATA HUTANG
    public function get_data_hutang($id = '') {
        $this->db->select('*');
        $this->db->from('tbl_data_hutang a');
        $this->db->join('tbl_kontak b', 'a.id_kontak=b.id');
        $this->db->join('tbl_jurnal_umum c', 'a.id_jurnal_umum=c.id_jurnal_umum');

        if ($id){
            $this->db->where('id_hutang', $id);
        }

        return $this->db->get();
    }

    public function get_detail_pembayaran_hutang($id) {
        $this->db->select('*');
        $this->db->from('tbl_data_pembayaran_hutang a');
        $this->db->join('tbl_jurnal_umum b', 'a.id_jurnal_umum=b.id_jurnal_umum');
        $this->db->join('tbl_jurnal_umum_detail c', 'b.id_jurnal_umum=c.id_jurnal_umum');
        $this->db->where('a.id_hutang', $id);
        $this->db->group_by('c.id_jurnal_umum');

        return $this->db->get();
    }

    public function get_detail_pembayaran_hutang_by_id($id) {
        $this->db->select('*');
        $this->db->from('tbl_data_pembayaran_hutang a');
        $this->db->join('tbl_jurnal_umum b', 'a.id_jurnal_umum=b.id_jurnal_umum');
        $this->db->join('tbl_jurnal_umum_detail c', 'b.id_jurnal_umum=c.id_jurnal_umum');
        $this->db->where('a.id_bayar_hutang', $id);
        $this->db->where('c.debit_kredit=2');

        return $this->db->get();
    }

    public function delete_and_reverse_detail_hutang($id, $id_jurnal_umum, $id_hutang, $nilai)
    {
        $this->db->where('id_bayar_hutang', $id);
        $query = $this->db->delete('tbl_data_pembayaran_hutang');

        $this->db->where('id_jurnal_umum', $id_jurnal_umum);
        $query = $this->db->delete('tbl_jurnal_umum_detail');

        $this->db->where('id_jurnal_umum', $id_jurnal_umum);
        $query = $this->db->delete('tbl_jurnal_umum');

        $query = $this->db->query("UPDATE tbl_data_hutang SET sisa=sisa+$nilai WHERE id_hutang=$id_hutang");

        return $query;
    }

    //CRUD QUERY TABEL DATA PIUTANG
    public function get_data_piutang($id = '') {
        $this->db->select('*');
        $this->db->from('tbl_data_piutang a');
        $this->db->join('tbl_kontak b', 'a.id_kontak=b.id');
        $this->db->join('tbl_jurnal_umum c', 'a.id_jurnal_umum=c.id_jurnal_umum');

        if ($id){
            $this->db->where('id_piutang', $id);
        }

        return $this->db->get();
    }

    public function get_detail_penyetoran_piutang($id) {
        $this->db->select('*');
        $this->db->from('tbl_data_penyetoran_piutang a');
        $this->db->join('tbl_jurnal_umum b', 'a.id_jurnal_umum=b.id_jurnal_umum');
        $this->db->join('tbl_jurnal_umum_detail c', 'b.id_jurnal_umum=c.id_jurnal_umum');
        $this->db->where('a.id_piutang', $id);
        $this->db->group_by('c.id_jurnal_umum');

        return $this->db->get();
    }

    public function get_detail_penyetoran_piutang_by_id($id) {
        $this->db->select('*');
        $this->db->from('tbl_data_penyetoran_piutang a');
        $this->db->join('tbl_jurnal_umum b', 'a.id_jurnal_umum=b.id_jurnal_umum');
        $this->db->join('tbl_jurnal_umum_detail c', 'b.id_jurnal_umum=c.id_jurnal_umum');
        $this->db->where('a.id_penyetoran_piutang', $id);
        $this->db->where('c.debit_kredit=1');

        return $this->db->get();
    }

    public function delete_data_piutang($id)
    {
        $this->db->where('id_piutang', $id);
        return $this->db->delete('tbl_data_piutang');
    }

    public function delete_and_reverse_detail_piutang($id, $id_jurnal_umum, $id_piutang, $nilai)
    {
        $this->db->where('id_penyetoran_piutang', $id);
        $query = $this->db->delete('tbl_data_penyetoran_piutang');

        $this->db->where('id_jurnal_umum', $id_jurnal_umum);
        $query = $this->db->delete('tbl_jurnal_umum_detail');

        $this->db->where('id_jurnal_umum', $id_jurnal_umum);
        $query = $this->db->delete('tbl_jurnal_umum');

        $query = $this->db->query("UPDATE tbl_data_piutang SET sisa=sisa+$nilai WHERE id_piutang=$id_piutang");

        return $query;
    }

    //CRUD QUERY TABEL KONTAK
    public function get_kontak($id = '') {
        $this->db->select('*');
        $this->db->from('tbl_kontak');

        if ($id){
            $this->db->where('id', $id);
        }

        return $this->db->get();
    }

    public function insert_kontak($data) {
        return $this->db->insert('tbl_kontak', $data);
    }

    public function delete_kontak($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tbl_kontak');
    }

    public function update_kontak($id, $data = array())
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        return $this->db->update('tbl_kontak');
    }
}