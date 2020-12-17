<?php

class M_artikel extends CI_Model
{
    private $table = 'tb_artikel';

    public function artikel($id = '')
    {
        $this->db->select('*')
            ->from($this->table);

        if ($id) {
            $this->db->where('id_artikel', $id);
        }

        return $this->db->get();
    }

    public function artikelfind($id = '')
    {
        $this->db->select('*')
            ->from('tb_member m')
            ->join('tb_artikel a','m.id_member = a.id_member ');

        if ($id){
            $this->db->where('a.id_artikel', $id);
        }

        return $this->db->get();
    }

    public function artikelFindByMembers($id_member) {
        $this->db->select('*');
        $this->db->from('tb_artikel a');
        $this->db->join('tb_member b', 'a.id_member=b.id_member');
        $this->db->where('a.id_member', $id_member);
        $this->db->order_by('a.tanggal_artikel');
        return $this->db->get();
    }

    public function insert($data = array())
    {
        return $this->db->insert($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id_artikel', $id);
        return $this->db->delete($this->table);
    }

    public function update($id, $data = array())
    {
        $this->db->set($data);
        $this->db->where('id_artikel', $id);
        return $this->db->update($this->table);
    }
}
