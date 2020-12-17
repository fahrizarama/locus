<?php

class Event_m extends CI_Model
{
	public function getAll2(){
		$this->db->select('*');
		$this->db->from('tb_event');
		$this->db->where('tanggal_event = curdate()');
		$this->db->limit(3);

		return $this->db->get();
	}
	public function detail_data($id = NULL){
		$query = $this->db->get_where('tb_event', array('id_event' => $id))-> row();
		return $query; 
	}
	public function getAll3(){
		$this->db->select('*');
		$this->db->from('tb_event');
		$this->db->where('tanggal_event > curdate()');
		$this->db->limit(3);

		return $this->db->get();
	}
	public function getAll4(){
		$this->db->select('*');
		$this->db->from('tb_event');
		$this->db->where('tanggal_event < curdate()');
		$this->db->order_by('tanggal_event DESC');
		$this->db->limit(3);

		return $this->db->get();
		
	}
	public function getAll5(){
		$this->db->select('*');
		$this->db->from('tb_event');
		$this->db->where('tanggal_event >= curdate()');
		$this->db->limit(3);

		return $this->db->get();

	}

	public function getAll_event_kosong(){
		$this->db->select('*');
		$this->db->from('tb_event');
		$this->db->where('tanggal_event < curdate()');
		$this->db->limit(3);

		$this->db->order_by('tanggal_event desc');

		return $this->db->get();

	}
}