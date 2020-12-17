<?php 
	class Survey_m extends CI_Model
	{
	public function getAll2(){
		return $this->db->get('tb_survey');
	}

    public function add_data($post){
    	$data['nama'] = $post['nama'];
    	$data['no_tlp'] = $post['no_tlp'];
    	$data['email'] = $post['email'];
    	$data['deskripsi_survey'] = $post['deskripsi_survey'];
    	$this->db->insert('tb_survey', $data);
    }

}
?>