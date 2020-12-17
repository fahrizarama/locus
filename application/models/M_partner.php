<?php

class M_partner extends CI_Model
{
    private $table = 'tb_partner';

    public function partner($id = '')
    {
        $this->db->select('*')
            ->from($this->table);

        if ($id){
            $this->db->where('id_partner', $id);
        }

        return $this->db->get();
    }

    public function partnerFindByJenis($id = '')
    {
        $this->db->select('*')
            ->from('tb_partner a')
            ->join('tb_jenis_partner b', 'a.jenis_partner=b.id_jenis_partner');

        if ($id){
            $this->db->where('b.id_jenis_partner', $id);
        }

        return $this->db->get();
    }

    public function jenis_partner($id = '') {
        $this->db->select('*');
        $this->db->from('tb_jenis_partner');

        if($id) {
            $this->db->where('id_jenis_partner', $id);
        }

        $this->db->order_by('id_jenis_partner');
        return $this->db->get();
    }

    public function get_jenis_one($id = '') {
        $this->db->select('*');
        $this->db->from('tb_jenis_partner');

        if($id) {
            $this->db->where('id_jenis_partner', $id);
        }

        $this->db->limit('1');
        $this->db->order_by('id_jenis_partner');
        return $this->db->get();
    }

    public function insert_jenis_partner($data = array())
    {
        return $this->db->insert('tb_jenis_partner', $data);
    }

    public function delete_jenis_partner($id)
    {
        $this->db->where('id_jenis_partner', $id);
        return $this->db->delete('tb_jenis_partner');
    }

    public function update_jenis_partner($id, $data = array())
    {
        $this->db->set($data);
        $this->db->where('id_jenis_partner', $id);
        return $this->db->update('tb_jenis_partner');
    }

    public function insert($data = array())
    {
        return $this->db->insert($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id_partner', $id);
        return $this->db->delete($this->table);
    }

    public function update($id, $data = array())
    {
        $this->db->set($data);
        $this->db->where('id_partner', $id);
        return $this->db->update($this->table);
    }
}
