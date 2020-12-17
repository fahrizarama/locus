<?php

class Merchant_m extends CI_Model
{
	public function getAll2(){
		return $this->db->get('tb_partner');
	}

	public function detail_data($id = NULL){
		$query = $this->db->get_where('tb_partner', array('id_partner' => $id))-> row();
		return $query; 
	}

	public function partnerfind($id = '')
    {
        $this->db->select('*')
            ->from('tb_partner');

        if ($id){
            $this->db->where('jenis_partner', $id);
        }

        return $this->db->get();
    }
}