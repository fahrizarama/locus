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
