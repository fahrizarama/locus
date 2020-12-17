<?php

class Beranda_m extends CI_Model
{
	private $table = 'tb_slider';

	public function getAll2($id = ''){
		$this->db->select('*')
            ->from($this->table);

        if ($id) {
            $this->db->where('id_slider', $id);
        }

        return $this->db->get();
    }

    // //Tampilan Promo Terdekat Hari ini dan Mendatang
    //    public function getAll5(){
    // 		$this->db->select('*');
	//     	$this->db->from('tb_promo');
	// 	    $this->db->where('tanggal_mulai >= curdate()');
	// 	    $this->db->order_by('tanggal_promo DESC');
	// 	    $this->db->limit(3);

    // 		return $this->db->get();
    // }
    // //Tampilan Event Terdekat Hari ini dan Mendatang
    //     public function getAll6(){
    //         $this->db->select('*');
    //         $this->db->from('tb_event');
    //         $this->db->where('tanggal_event >= curdate()');
    //         $this->db->order_by('tanggal_event DESC');
    //         $this->db->limit(3);
    
    //         return $this->db->get();
    //     }
}