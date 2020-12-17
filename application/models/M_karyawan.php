<?php

class M_karyawan extends CI_Model {

    public function get_data_karyawan() {

        $status = 'Karyawan';

        $this->db->select('*');
        $this->db->from('tbl_karyawan');
        $this->db->where('status', $status);
        $this->db->order_by('id_karyawan DESC');
        return $this->db->get();
    }

    public function get_detail_karyawan($id) {

        $status = 'Karyawan';

        $this->db->select('*');
        $this->db->from('tbl_karyawan a');
        $this->db->join('tbl_jabatan b', 'a.id_jabatan=b.id_jabatan');
        $this->db->where('a.status', $status);
        $this->db->where('a.id_karyawan', $id);
        return $this->db->get();
    }

    public function get_daftar_jabatan($id = '') {
        $this->db->select('*');
        $this->db->from('tbl_jabatan');

        if($id) {
            $this->db->where('id_jabatan', $id);
        }

        $this->db->order_by('id_jabatan');

        return $this->db->get();
    }

    public function insert_jabatan($data = array())
    {
        return $this->db->insert('tbl_jabatan', $data);
    }

    public function delete_jabatan($id)
    {
        $this->db->where('id_jabatan', $id);
        return $this->db->delete('tbl_jabatan');
    }

    public function update_jabatan($id, $data = array())
    {
        $this->db->set($data);
        $this->db->where('id_jabatan', $id);
        return $this->db->update('tbl_jabatan');
    }
}