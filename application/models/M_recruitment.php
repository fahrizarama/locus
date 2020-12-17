<?php

class M_recruitment extends CI_Model {

    public function get_data_pelamar() {

        $status = 'Pelamar';

        $this->db->select('*');
        $this->db->from('tbl_karyawan');
        $this->db->where('status', $status);
        $this->db->order_by('id_karyawan DESC');
        return $this->db->get();
    }

    public function get_detail_pelamar($id) {

        $status = 'Pelamar';

        $this->db->select('*');
        $this->db->from('tbl_karyawan');
        $this->db->where('status', $status);
        $this->db->where('id_karyawan', $id);
        return $this->db->get();
    }

    public function get_riwayat_kesehatan($id) {
        
        $this->db->select('*');
        $this->db->from('tbl_riwayat_kesehatan');
        $this->db->where('id_karyawan', $id);
        return $this->db->get();
    }

    public function get_pendidikan_formal($id) {

        $jenis = 'Formal';

        $this->db->select('*');
        $this->db->from('tbl_pendidikan');
        $this->db->where('id_karyawan', $id);
        $this->db->where('jenis_pendidikan', $jenis);
        $this->db->order_by('awal_tahun DESC');
        return $this->db->get();
    }

    public function get_pendidikan_non_formal($id) {

        $jenis = 'Non Formal';

        $this->db->select('*');
        $this->db->from('tbl_pendidikan');
        $this->db->where('id_karyawan', $id);
        $this->db->where('jenis_pendidikan', $jenis);
        $this->db->order_by('awal_tahun DESC');
        return $this->db->get();
    }

    public function get_riwayat_pekerjaan($id) {

        $this->db->select('*');
        $this->db->from('tbl_riwayat_pekerjaan');
        $this->db->where('id_karyawan', $id);
        return $this->db->get();
    }

    public function get_referensi_pekerjaan($id) {

        $this->db->select('*');
        $this->db->from('tbl_referensi_pekerjaan');
        $this->db->where('id_karyawan', $id);
        return $this->db->get();
    }

    public function get_pengalaman_organisasi($id) {

        $this->db->select('*');
        $this->db->from('tbl_pengalaman_organisasi');
        $this->db->where('id_karyawan', $id);
        return $this->db->get();
    }

    public function get_penguasaan_bahasa($id) {

        $this->db->select('*');
        $this->db->from('tbl_penguasaan');
        $this->db->where('id_karyawan', $id);
        return $this->db->get();
    }

    public function get_penguasaan_komputer($id) {

        $this->db->select('*');
        $this->db->from('tbl_penguasaan_komputer');
        $this->db->where('id_karyawan', $id);
        return $this->db->get();
    }

    public function get_kontak_darurat($id) {

        $this->db->select('*');
        $this->db->from('tbl_kontak_darurat');
        $this->db->where('id_karyawan', $id);
        return $this->db->get();
    }

    public function get_pemohon_pekerjaan($id) {

        $this->db->select('*');
        $this->db->from('tbl_pemohon_pekerjaan');
        $this->db->where('id_karyawan', $id);
        return $this->db->get();
    }

    public function get_daftar_jabatan() {
        $this->db->select('*');
        $this->db->from('tbl_jabatan');
        return $this->db->get();
    }

    public function confirm($id, $data = array())
    {
        $this->db->set($data);
        $this->db->where('id_karyawan', $id);
        return $this->db->update('tbl_karyawan');
    }

    public function delete($id)
    {
        $this->db->where('id_karyawan', $id);
        return $this->db->delete('tbl_karyawan');
    }
}