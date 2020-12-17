<?php

class M_produk extends CI_Model {

    public function get_produk($id = '')
    {
        $this->db->select('*');
        $this->db->from('tbl_produk a');
        $this->db->join('tb_partner b', 'a.id_partner=b.id_partner');

        if ($id) {
            $this->db->where('a.id_produk', $id);
        }

        return $this->db->get();
    }

    public function insert_produk($data = array())
    {
        return $this->db->insert('tbl_produk', $data);
    }

    public function delete_produk($id)
    {
        $this->db->where('id_produk', $id);
        return $this->db->delete('tbl_produk');
    }

    public function update_produk($id, $data = array())
    {
        $this->db->set($data);
        $this->db->where('id_produk', $id);
        return $this->db->update('tbl_produk');
    }
}