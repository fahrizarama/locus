<?php

class Produk_m extends CI_Model
{

    public function get_all_produk()
    {
        $this->db->select('*');
        $this->db->from('tbl_produk');
        $this->db->order_by('RAND()');
        return $this->db->get();
    }
    public function detail_data($id = null)
    {
        $query = $this->db->get_where('tbl_produk', array('id_produk' => $id))->row();
        return $query;
    }
}
