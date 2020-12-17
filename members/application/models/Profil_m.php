<?php

class Profil_m extends CI_Model
{
	

	public function getAll2(){
		return $this->db->get('tb_tentang');
	}
}