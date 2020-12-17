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
        $this->db->select('*');
		$this->db->from('tb_partner a');
		$this->db->join('tb_jenis_partner b', 'a.jenis_partner=b.id_jenis_partner');
		$this->db->order_by('nama_partner ASC');


        if ($id){
            $this->db->where('a.jenis_partner', $id);
        }

        return $this->db->get();
	}
	
	public function jenis_partner() {
		$this->db->select('*');
		$this->db->from('tb_jenis_partner');
		return $this->db->get('');
	}
}