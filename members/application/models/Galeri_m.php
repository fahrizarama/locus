<?php

class Galeri_m extends CI_Model
{
	public function getAll2(){
		return $this->db->get('tb_galeri');
	}

	public function detail_data($id = NULL){
		$query = $this->db->get_where('tb_galeri', array('id_galeri' => $id))-> row();
		return $query; 
	}
}