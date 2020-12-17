<?php

class Promo_m extends CI_Model
{
	public function getAll2(){
		$this->db->select('*');
		$this->db->from('tb_promo');
		$this->db->where('curdate() between tanggal_mulai and tanggal_akhir');
		$this->db->limit(3);

		return $this->db->get();
	}

	public function detail_promo($id = NULL){
		$query = $this->db->get_where('tb_promo', array('id_promo' => $id))-> row();
		return $query; 
	}
	public function getAll3(){
		$this->db->select('*');
		$this->db->from('tb_promo');
		$this->db->where('tanggal_mulai > curdate()');
		$this->db->limit(3);

		return $this->db->get();
	}
	public function getAll4(){
		$this->db->select('*');
		$this->db->from('tb_promo');
		$this->db->where('tanggal_akhir < curdate()');
		$this->db->order_by('tanggal_akhir DESC');
		$this->db->limit(3);

		return $this->db->get();
	}
	public function getAll5(){
		$where = ('curdate() <= tanggal_mulai OR curdate() between tanggal_mulai and tanggal_akhir');

		$this->db->select('*');
		$this->db->from('tb_promo');
		$this->db->where($where);
		$this->db->limit(3);
		$this->db->order_by('tanggal_mulai ASC');

		return $this->db->get();
	}

	public function getAll_promo_kosong(){

		$this->db->select('*');
		$this->db->from('tb_promo');
		$this->db->where('curdate() > tanggal_akhir');
		$this->db->limit(3);
		$this->db->order_by('tanggal_mulai desc');

		return $this->db->get();
	}

}