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
