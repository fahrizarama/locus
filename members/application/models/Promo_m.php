<?php

class Promo_m extends CI_Model
{
	public function getAll2(){
		return $this->db->get('tb_promo');
	}

	public function detail_promo($id = NULL){
		$query = $this->db->get_where('tb_promo', array('id_promo' => $id))-> row();
		return $query; 
	}
}