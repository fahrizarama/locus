<?php

class Galeri_m extends CI_Model
{
	public function getAll2(){
		$this->db->select('*');
		$this->db->from('tb_galeri');
		$this->db->order_by('tanggal_foto DESC');
		// $this->db->DESC('')
		$this->db->limit(6);

		return $this->db->get();
	}

	public function detail_data($id = NULL){
		$query = $this->db->get_where('tb_galeri', array('id_galeri' => $id))-> row();
		return $query; 
	}
}