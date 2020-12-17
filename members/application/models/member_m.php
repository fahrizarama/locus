<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_m extends CI_Model {

    private $table = 'tb_member';

    public function getAll($id = '')
    {
        $this->db->select('*')
            ->from('tb_member a')
            ->join('tb_kategori_member b', 'a.id_kategori=b.id_kategori');

        if ($id){
            $this->db->where('a.id_member', $id);
        }

        return $this->db->get();
    }

    public function getIdKategori($id = '')
    {
        $this->db->select('*')
            ->from('tb_member');

        if ($id){
            $this->db->where('id_kategori', $id);
        }

        return $this->db->get();
    }

    public function getAllKategori($id = '')
    {
        $this->db->select('*')
             ->from('tb_kategori_member');

        if ($id){
            $this->db->where('id_kategori', $id);
        }

        return $this->db->get();
    }

    public function getData($id = '')
    {
        $this->db->select('*')
            ->from('tb_member m')
            ->join('tb_kategori_member k','m.id_kategori = k.id_kategori ');

        if ($id){
            $this->db->where('k.id_kategori', $id);
        }

        return $this->db->get();
    }   

    public function getKategori($kategori = '')
    {
        $this->db->select('*')
            ->from('tb_member');

        if ($kategori){
            $this->db->where('id_kategori', $kategori);
        }

        return $this->db->get();
    }

    public function insert($data = array())
    {
        return $this->db->insert($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id_member', $id);
        return $this->db->delete($this->table);
    }

    public function update($id, $data = array())
    {
        $this->db->set($data);
        $this->db->where('id_member', $id);
        return $this->db->update($this->table);
    }

    public function insert_riwayat_pendidikan($data) {
		$this->db->insert('tm_riwayat_pendidikan', $data);
		return $this->db->insert_id();
	}

}

/* End of file member.php */
/* Location: ./application/models/member.php */ ?>