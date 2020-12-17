<?php

class Beranda_m extends CI_Model
{
	private $table = 'tb_slider';

	public function getAll2($id = ''){
		$this->db->select('*')
            ->from($this->table);

        if ($id) {
            $this->db->where('id_slider', $id);
        }

        return $this->db->get();
	}
}