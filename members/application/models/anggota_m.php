<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_m extends CI_Model {

	public function getAll($id = '')
    {
        $this->db->select('no_anggota')
            ->from('tb_anggota');

        if ($id){
            $this->db->where('anggota_id', $id);
        }

        return $this->db->get();
    }

}

/* End of file anggota_m.php */
/* Location: ./application/models/anggota_m.php */ ?>