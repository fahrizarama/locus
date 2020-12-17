<?php

class M_komentar extends CI_Model
{
    private $table = 'tb_komentar';

    public function komentar($id = '')
    {
        $this->db->select('*')
            ->from($this->table);

        if ($id) {
            $this->db->where('id_komentar', $id);
        }

        return $this->db->get();
    }

    public function komentarfind($id = '', $id_artikel = '')
    {
        $this->db->select('*')
            ->from('tb_member m')
            ->join('tb_artikel a','m.id_member = a.id_member ')
            ->join('tb_komentar k','a.id_artikel = k.id_artikel ');

        if ($id){
            $this->db->where('k.id_komentar', $id);
        }

        if ($id_artikel){
            $this->db->where('k.id_artikel', $id_artikel);
        }

        return $this->db->get();
    }   

    public function insert($data = array())
    {
        return $this->db->insert($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id_komentar', $id);
        return $this->db->delete($this->table);
    }

    public function update($id, $data = array())
    {
        $this->db->set($data);
        $this->db->where('id_komentar', $id);
        return $this->db->update($this->table);
    }
}
