<?php

class M_akun_pembukuan extends CI_Model
{

    //QUERY CRUD AKUN
    public function get_akun($kategori = '', $id = '') {
        
        $this->db->select('*');
        $this->db->from('tbl_akun');

        if($kategori) {
            $this->db->where('kategori_akun', $kategori);
        }

        if ($id){
            $this->db->where('id_akun', $id);
        }

        $this->db->order_by('kategori_akun');

        return $this->db->get();
    }

    public function get_akun_one($kategori = '') {
        
        $this->db->select('*');
        $this->db->from('tbl_akun');
        $this->db->where('kategori_akun', $kategori);
        $this->db->limit('1');

        return $this->db->get();
    }

    public function insert_akun($data = array())
    {
        return $this->db->insert('tbl_akun', $data);
    }

    public function delete_akun($id)
    {
        $this->db->where('id_akun', $id);
        return $this->db->delete('tbl_akun');
    }

    public function update_akun($id, $data = array())
    {
        $this->db->set($data);
        $this->db->where('id_akun', $id);
        return $this->db->update('tbl_akun');
    }
}
