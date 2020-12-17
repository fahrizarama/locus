<?php

class Event_m extends CI_Model
{
	public function getAll2(){
		return $this->db->get('tb_event');
	}
	public function detail_data($id = NULL){
		$query = $this->db->get_where('tb_event', array('id_event' => $id))-> row();
		return $query; 
	}
}